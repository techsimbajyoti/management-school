<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\BloodGroup;
use App\Models\Language;
use App\Models\Religion;
use App\Models\State;
use App\Models\Country;
use App\Models\StudentParent;
use App\Models\Student;
use App\Models\ClassMaster;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicantRegistered;
use App\Mail\AdminNotification;
use App\Mail\ApplicantMeetingNotification;
use App\Mail\AdminMeetingNotification;
use App\Mail\ApplicantStatusUpdate;
use App\Mail\AdminStatusReceive;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\ApplicantStatus;
use Illuminate\Support\Facades\DB;
use App\Models\MeetingStatus;
use PDF;
use Carbon\Carbon;


class ApplicantController extends Controller
{
    public function getPublicIpAddress()
    {
            $response = Http::timeout(90) // Set the timeout to 30 seconds
            ->get('https://api64.ipify.org?format=json');

            $data = $response->json();
            $ipAddress = $data['ip'];
            return $ipAddress;
    }

    public function applicant(){

     $upcoming_data = Student::join('student_parents','students.parent_id','=','student_parents.id')
                      ->join('meeting_statuses', 'students.id', '=', 'meeting_statuses.student_id')
                      ->select(
                        'meeting_statuses.id',
                        'meeting_statuses.meeting_date',
                        'meeting_statuses.time_slot',
                        'meeting_statuses.purpose',
                        'meeting_statuses.mode',
                        'meeting_statuses.status',
                        'students.first_name',
                        'students.last_name',
                        'student_parents.father_name',
                        'students.applicant_id',
                        'students.class',
                        'student_parents.father_mobile'
                    )
                    ->where('meeting_statuses.status', 'Meeting Schedule')
                    ->whereIn('meeting_statuses.id', function ($query) {
                        $query->selectRaw('MAX(id)')
                            ->from('meeting_statuses')
                            ->groupBy('student_id');
                    })
                    ->distinct()
                    ->get();


            return view('pages.applicant', compact('upcoming_data'));
        }

    
    public function search_student(Request $request){

        $student_class = $request->input('student_class');
        $status = $request->input('status');
        $from = $request->input('from');
        $to = $request->input('to');
        $applicantid = $request->input('applicantid');

        $applicant_view = $request->input('applicant_view');
        $applicant_status = $request->input('applicant_status');

        if(($applicant_view != null && $applicant_status != null) && ($student_class || $status || $from || $to || $applicantid) == null){

            $applicant_list = DB::table('students')
            ->select(
                'students.id as student_id',
                'student_parents.id as parent_id',
                'students.*',
                'student_parents.*',
                'meeting_statuses.status as latest_status',
                'meeting_statuses.note as latest_note',
                'meeting_statuses.meeting_date as latest_date',
                'meeting_statuses.time_slot as latest_time_slot',
                'meeting_statuses.purpose as meeting_type',
                'meeting_statuses.mode as meeting_mode',
                'meeting_statuses.status as meeting_status',
            )
            ->join('student_parents', 'students.parent_id', '=', 'student_parents.id')
            ->join('meeting_statuses', 'students.id', '=', 'meeting_statuses.student_id')
            ->where('students.applicant_id', $applicant_view)
            ->where('meeting_statuses.status', $applicant_status)
            ->get();

        }else if(($applicant_view != null && $applicant_status == null) && ($student_class || $status || $from || $to || $applicantid) == null){
            $applicant_list = DB::table('students')
            ->select(
                'students.id as student_id',
                'student_parents.id as parent_id',
                'students.*',
                'student_parents.*',
                'meeting_statuses.status as latest_status',
                'meeting_statuses.note as latest_note',
                'meeting_statuses.meeting_date as meeting_date',
                'meeting_statuses.time_slot as time_slot',
                'meeting_statuses.purpose as meeting_type',
                'meeting_statuses.mode as meeting_mode',
                'meeting_statuses.status as meeting_status',
            )
            ->join('student_parents', 'students.parent_id', '=', 'student_parents.id')
            ->leftJoin('meeting_statuses', 'students.id', '=', 'meeting_statuses.student_id')
            ->where('students.applicant_id', $applicant_view)
            ->get();

        }else{

        // Subquery to get the latest status and note for each student
        $latestStatuses = DB::table('applicant_statuses as sub')
            ->select('sub.student_id', 'sub.status', 'sub.note')
            ->whereIn('id', function ($query) {
                $query->select(DB::raw('MAX(id)'))
                    ->from('applicant_statuses')
                    ->groupBy('student_id');
            });
        
            if($student_class != null && $status != null && $from != null && $to != null && $applicantid == null){
                $fromDate = $from . ' 00:00:00'; // Start of the day
                $toDate = $to . ' 23:59:59';     // End of the day

                // Subquery to get the latest status for each applicant
                $latestStatuses = DB::table('applicant_statuses as sub')
                    ->select('sub.applicant_id', DB::raw('MAX(sub.created_at) as latest_created_at'))
                    ->groupBy('sub.applicant_id');

                // Query to get the latest statuses joined with student and parent data
                $applicant_list = DB::table('student_parents')
                    ->join('students', 'students.parent_id', '=', 'student_parents.id')
                    ->join('applicant_statuses', function ($join) use ($latestStatuses) {
                        $join->on('students.applicant_id', '=', 'applicant_statuses.applicant_id')
                            ->joinSub($latestStatuses, 'latest', function ($join) {
                                $join->on('applicant_statuses.applicant_id', '=', 'latest.applicant_id')
                                    ->on('applicant_statuses.created_at', '=', 'latest.latest_created_at');
                            });
                    })
                    ->select(
                        'students.id as student_id',
                        'student_parents.id as parent_id',
                        'students.*',
                        'student_parents.*',
                        'applicant_statuses.status as latest_status',
                        'applicant_statuses.note as latest_note'
                    )
                    ->where('student_parents.created_at', '>=', $fromDate)
                    ->where('student_parents.created_at', '<=', $toDate);

                // Filter by student class
                if ($student_class) {
                    $applicant_list->where('students.class', $student_class);
                }

                // Filter by status
                if ($status) {
                    $applicant_list->where('applicant_statuses.status', $status);
                }

                $applicant_list = $applicant_list->distinct()->get();

                // Return or use $applicant_list as needed


            }else if($student_class == null && $status == null && $from != null && $to != null && $applicantid == null){

                $fromDate = $from . ' 00:00:00'; // Start of the day
                $toDate = $to . ' 23:59:59'; // End of the day

                // Subquery to get the latest status for each applicant
                $latestStatuses = DB::table('applicant_statuses as sub')
                    ->select('sub.applicant_id', DB::raw('MAX(sub.created_at) as latest_created_at'))
                    ->groupBy('sub.applicant_id');

                // Query to get the latest statuses joined with student and parent data
                $applicant_list = DB::table('student_parents')
                    ->join('students', 'students.parent_id', '=', 'student_parents.id')
                    ->join('applicant_statuses', function ($join) use ($latestStatuses) {
                        $join->on('students.applicant_id', '=', 'applicant_statuses.applicant_id')
                            ->joinSub($latestStatuses, 'latest', function ($join) {
                                $join->on('applicant_statuses.applicant_id', '=', 'latest.applicant_id')
                                    ->on('applicant_statuses.created_at', '=', 'latest.latest_created_at');
                            });
                    })
                    ->select(
                        'students.id as student_id',
                        'student_parents.id as parent_id',
                        'students.*',
                        'student_parents.*',
                        'applicant_statuses.status as latest_status',
                        'applicant_statuses.note as latest_note'
                    )
                    ->where('student_parents.created_at', '>=', $fromDate)
                    ->where('student_parents.created_at', '<=', $toDate)
                    ->distinct()
                    ->get();



            }else if($student_class != null && $status != null && $from == null && $to == null && $applicantid == null){
            $applicant_list = DB::table('students')
            ->select(
                'students.id as student_id', 
                'student_parents.id as parent_id', 
                'students.*', 
                'student_parents.*', 
                'latest.status as latest_status',
                'latest.note as latest_note'
            )
            ->join('student_parents', 'students.parent_id', '=', 'student_parents.id')
            ->leftJoinSub($latestStatuses, 'latest', function ($join) {
                $join->on('students.id', '=', 'latest.student_id');
            })
            ->where('students.class', $student_class)
            ->where('latest.status', $status) // Additional condition for status
            ->get();

        }else if($student_class != null && $status == null && $from == null && $to == null && $applicantid == null){
        // Main query to get applicant list with the latest status and note
        $applicant_list = DB::table('students')
            ->select(
                'students.id as student_id', 
                'student_parents.id as parent_id', 
                'students.*', 
                'student_parents.*', 
                'latest.status as latest_status',
                'latest.note as latest_note'
            )
            ->join('student_parents', 'students.parent_id', '=', 'student_parents.id')
            ->leftJoinSub($latestStatuses, 'latest', function ($join) {
                $join->on('students.id', '=', 'latest.student_id');
            })
            ->where('students.class', $student_class)
            ->get();
        }else if($student_class == null && $status != null && $from == null && $to == null && $applicantid == null){

            $applicant_list = DB::table('students')
            ->select(
                'students.id as student_id', 
                'student_parents.id as parent_id', 
                'students.*', 
                'student_parents.*', 
                'latest.status as latest_status',
                'latest.note as latest_note'
            )
            ->join('student_parents', 'students.parent_id', '=', 'student_parents.id')
            ->leftJoinSub($latestStatuses, 'latest', function ($join) {
                $join->on('students.id', '=', 'latest.student_id');
            })
            ->where('latest.status', $status)
            ->get();
        }else if($student_class == null && $status == null && $from == null && $to == null && $applicantid != null){

            $parts = explode(' - ', $applicantid);
            $id = $parts[0]; // This will be '00099111'
            $name = $parts[1]; // This will be 'john fd'

            $applicant_list = DB::table('students')
            ->select(
                'students.id as student_id', 
                'student_parents.id as parent_id', 
                'students.*', 
                'student_parents.*', 
                'latest.status as latest_status',
                'latest.note as latest_note'
            )
            ->join('student_parents', 'students.parent_id', '=', 'student_parents.id')
            ->leftJoinSub($latestStatuses, 'latest', function ($join) {
                $join->on('students.id', '=', 'latest.student_id');
            })
            ->where('students.applicant_id', $id)
            ->get();
        }
    }

        return response()->json(['success' => true, 'applicant_list' => $applicant_list]);

    }

    public function applicant_list(Request $request)
    {
       // Subquery to get the latest status for each student
       $latestStatuses = ApplicantStatus::select('status')
       ->whereColumn('student_id', 'students.id')
       ->orderBy('created_at', 'desc')
       ->limit(1);

   // Main query to get applicant list with the latest status
   $applicant_list = Student::select(
           'students.id as student_id', 
           'student_parents.id as parent_id', 
           'students.*', 
           'student_parents.*', 
           DB::raw("({$latestStatuses->toSql()}) as latest_status")
       )
       ->join('student_parents', 'students.parent_id', '=', 'student_parents.id')
       ->distinct()
       ->get();

        $parent_applicant_id = Student::get();
        $ApplicantId = [];
        foreach ($parent_applicant_id as $count) {
            $ApplicantId[] = $count->applicant_id;
        }
            
        return view('admin.applicant.applicant-list', compact('applicant_list','ApplicantId'));
    }
        
    
    public function view_applicant($student_id,$parent_id)
    {
        $country = Country::get();
        $test = [];
        foreach ($country as $count) {
            $test[] = $count->country;
        }
    
        $state = State::get();
        $testing = [];
        foreach ($state as $sta) {
            $testing[] = $sta->state;
        }
    
        $country = Country::get(['id', 'country']);
        $state = State::get(['id', 'state']);
    
        $Religion = Religion::get();
        $BloodGroup = BloodGroup::get();
    
        $Language = Language::get();
        $lang = [];
        foreach ($Language as $lng) {
            $lang[] = $lng->name;
        }
    
       

        $applicant_data = Student::join('student_parents', 'students.parent_id', '=', 'student_parents.id')
        ->where('student_parents.id', $parent_id)
        ->where('students.id', $student_id)
        ->select('students.*', 'student_parents.*')
        ->first();
       
        return view('admin.applicant.view-applicant', compact('lang', 'Language', 'BloodGroup', 'Religion', 'state', 'country', 'test', 'testing', 'applicant_data'));
    }
    
    public function edit_applicant( Request $request,$student_id, $parent_id){
        $country = Country::get();

        $test = [];
        foreach($country as $count){
            $test[] = $count->country;
        }
        $state = State::get();
        $testing = [];
        foreach($state as $sta){
            $testing[] = $sta->state;
        }
        $country = Country::get(['id','country']);
        $state = State::get(['id','state']);

        $class_master = ClassMaster::get();
        $Religion = Religion::get();
        $BloodGroup = BloodGroup::get();

        $Language = Language::get();
        $lang = [];
        foreach($Language as $lng){
            $lang[] = $lng->name;
        }

        $parent = StudentParent::where('id',$parent_id)
                ->first();

        $student = Student::where('parent_id',$parent_id)
                   ->where('id',$student_id)
                   ->first();        
        // $applicant_data = Student::join('student_parents', function ($join) use ($id) {
        //     $join->on('students.parent_id', '=', 'student_parents.id')
        //          ->on('students.applicant_id', '=', 'student_parents.applicant_id')
        //          ->where('student_parents.id', '=', $id);
        // })
        // ->select('students.*', 'student_parents.*')
        // ->first();

        // print_r($applicant_data);
        // exit;
        
        return view('admin.applicant.edit-applicant',compact('lang','Language','BloodGroup','Religion','state','country','test','testing','student','parent','request','class_master'));
    }


    public function applicant_edit(){
        return view('admin.applicant.applicant-edit');
    }

    public function delete_applicant($id)
    {
        // Find the student by parent_id
        $student = Student::where('parent_id', $id)->first();
        
        if (!$student) {
            return redirect()->back()->with('error', 'Student not found');
        }

        // Find the parent
        $parent = StudentParent::find($id);

        if (!$parent) {
            return redirect()->back()->with('error', 'Parent not found');
        }

        // Soft delete the student
        $student->delete();
        
        // Soft delete the parent
        $parent->delete();

        return redirect()->back()->with('status', 'Deleted Successfully');
    }

      

    public function update_applicant(Request $request, $id)
    {
        $validatedData = $request->validate([
            'parent_name' => 'required|string|regex:/^[A-Za-z ]+$/',
            'email' => 'required',
            'password' => 'required',
            'contact_number' => 'required|digits_between:10,15',
            'profession' => 'nullable|string|regex:/^[A-Za-z ]+$/',
           
        ], [
            'parent_name.required' => 'The parent name field is required.',
            'parent_name.string' => 'The parent name must be a string.',
            'parent_name.regex' => 'The parent name must only contain letters and spaces.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'password.required' => 'The password field is required.',
            'password.string' => 'The password must be a string.',
            'password.min' => 'The password must be at least 8 characters.',
            'password_confirmation.required' => 'The password confirmation field is required.',
            'password_confirmation.same' => 'The password confirmation does not match.',
            'contact_number.required' => 'The contact number field is required.',
            'contact_number.numeric' => 'The contact number field must contain only digits.',
            'contact_number.digits_between' => 'The contact number must be between 10 and 15 digits.',
            'profession.string' => 'The profession must be a string.',
            'profession.regex' => 'The profession must only contain letters and spaces.',
        ]);
        
    
        // $ipAddress = $this->getPublicIpAddress();
    
        $parent = StudentParent::findOrFail($id);
    
        $parent->father_name = $request->parent_name;
        $parent->father_mobile = $request->contact_number;
        $parent->email = $request->email;
        $parent->father_profession = $request->profession;
        $parent->role_id = $request->role_id;
        $parent->status = $request->status;
        $parent->ip_address = '1';
        $parent->created_by = 'null';
    
        $parent->save();
    
        Session::put('parent_id', $parent->id);
       
        if($request->applicant_parent == 'applicant-parent'){
            return redirect('applicant-profile')->with('status', 'Updated Successfully');
        }else{
            return response()->json(['success' => 'true', 'action' => $request->action]);
        }
    }

    public function update_student_applicant(Request $request ,$parent_id, $applicant_id)
    {
        $validatedData = $request->validate([
            'first_name' =>'required|string|regex:/^[A-Za-z ]+$/',
            'last_name' =>'required|string|regex:/^[A-Za-z ]+$/',
            'gender' => 'required',
            'class' => 'required',
            'date_of_birth' => 'required|date|before:' . now()->toDateString(),
            'student_language'=>'nullable|string',
            'category'=>'nullable|string',
            'blood_group'=>'nullable|string',
            'religion'=>'nullable|string',
            'previous_school'=>'nullable|string',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ],
      [
        
            'first_name.required' => 'The first name field is required.',
            'first_name.string' => 'The first name must be a string.',
            'first_name.regex' => 'The first name must only contain letters and spaces.',
            
            'last_name.required' => 'The last name field is required.',
            'last_name.string' => 'The last name must be a string.',
            'last_name.regex' => 'The last name must only contain letters and spaces.',
            
            'gender.required' => 'The gender field is required.',
            
            'class.required' => 'The class field is required.',
            
            'date_of_birth.required' => 'The date of birth field is required.',
            'date_of_birth.date' => 'The date of birth must be a valid date.',
            'date_of_birth.before' => 'The date of birth must be before today\'s date.',
            
            'student_language.string' => 'The student language must be a string.',
            
            'category.string' => 'The category must be a string.',
            
            'blood_group.string' => 'The blood group must be a string.',
            
            'religion.string' => 'The religion must be a string.',
            
            'previous_school.string' => 'The previous school must be a string.',
        
            'image.required' => 'The image field is required.',
            'image.image' => 'The image must be a valid image file.',
            'image.mimes' => 'The image must be a file of type: jpg, png, jpeg.',
            'image.uploaded' => 'The image must not be greater than 2 MB.',
        ]);
    
        
        // $ipAddress = $this->getPublicIpAddress();
        
        $parent_id = Session::get('parent_id');

        $student = Student::find($applicant_id);

        if($request->student_id != null){
        $student_update = Student::where('parent_id', $parent_id)
        ->where('id',$request->student_id)
        ->firstOrFail();
        
       
       
        if ($request->hasFile('image')) {
            // Delete existing image if it exists
            if (!is_null($student_update->image)) {
                if (Storage::exists('public/student_photos/' . $student_update->image)) {
                    Storage::delete('public/student_photos/' . $student_update->image);
                }
            }
          // Upload new image
            $originalFileName = $request->file('image')->getClientOriginalName();
            $currentDateTime = now()->format('YmdHis');
            $profileImagePath = $request->file('image')->storeAs('public/student_photos', $currentDateTime . '_' . $originalFileName);
            $student_update->image = $currentDateTime . '_' . $originalFileName;
        } else {
          
        }

        $student_update->first_name = $request->first_name;
        $student_update->last_name = $request->last_name;
         $student_update->class = $request->class;
        $student_update->date_of_birth = $request->date_of_birth;
        $student_update->blood_group = $request->blood_group;
        $student_update->student_language = $request->student_language;
        $student_update->previous_school = $request->previous_school;
        $student_update->parent_id = $parent_id;
        $student_update->role_id = $request->role_id;
        $student_update->ip_address = '1';
        $student_update->status = $request->status;
        $student_update->created_by = 'null';


        if ($request->category === 'other') {
            $student_update->category = $request->category;
            $student_update->other_category = $request->other_category;
        } else {
            $student_update->category = $request->category;
        }
        
        if ($request->religion === 'other') {
            $student_update->religion = $request->religion;
            $student_update->other_religion = $request->other_religion;
        } else {
            $student_update->religion = $request->religion;
        }
        
        if ($request->gender === 'other') {
            $student_update->gender = $request->gender;
            $student_update->other_gender = $request->other_gender;
        } else {
            $student_update->gender = $request->gender;
        }

        $student_update->save();

    }else{
            $student_update = new Student;

            $randomUsername = Str::random(8);

            $randomPassword = Str::random(8);
            $hashPassword = Hash::make($randomPassword);
    
            if ($request->hasFile('image')) {
                $originalFileName = $request->file('image')->getClientOriginalName();
                $currentDateTime = now()->format('YmdHis');
                $profileImagePath = $request->file('image')->storeAs('public/student_photos', $currentDateTime . '_' . $originalFileName);
                $student_update->image = $currentDateTime . '_' .$originalFileName;
            } else {
                $student_update->image = null;
            }

            $student_update->first_name = $request->first_name;
            $student_update->last_name = $request->last_name;
            $student_update->password = $hashPassword;
            $student_update->class = $request->class;
            $student_update->date_of_birth = $request->date_of_birth;
            $student_update->blood_group = $request->blood_group;
            $student_update->student_language = $request->student_language;
            $student_update->previous_school = $request->previous_school;
            $student_update->category = $request->category;
            $student_update->parent_id = $parent_id;

            $student_update->applicant_id = $applicant_id;
            $student_update->role_id = $request->role_id;
            $student_update->ip_address = '1';
            $student_update->status = $request->status;
            $student_update->applicant_status = $request->applicant_status;
            $student_update->created_by = 'null';

            if ($request->category === 'other') {
                $student_update->category = $request->other_category;
            } else {
                $student_update->category = $request->category;
            }

            if ($request->religion === 'other') {
                $student_update->religion = $request->other_religion;
            } else {
                $student_update->religion = $request->religion;
            }

            if ($request->gender === 'other') {
                $student_update->gender = $request->other_gender;
            } else {
                $student_update->gender = $request->gender;
            }

            $student_update->save();
    }


        Session::put(['student_id' => $student_update->id]);

        return response()->json(['success' => 'true', 'action' => $request->action, 'student_id'=>$student_update->id]);
    }
    

    public function update_contact_applicant(Request $request ,$parent_id)
    {
        $validatedData = $request->validate([
            'residence_address' =>'required|min:3|max:255',
            'country' => 'required|string|regex:/^[A-Za-z ]+$/',
            'state' => 'required',
            'city' => 'required',
            'pin_code' => 'required|digits:6',
        ],
       [
        'residence_address.required' => 'The residence address field is required.',
        'residence_address.min' => 'The residence address must be at least 3 characters long.',
        'residence_address.max' => 'The residence address must not exceed 255 characters.',
        'country.required' => 'The country field is required.',
        'country.string' => 'The country must be a valid string.',
        'country.regex' => 'The country must only contain letters and spaces.',
        'state.required' => 'The state field is required.',
        'city.required' => 'The city field is required.',
        'pin_code.required' => 'The pin code field is required.',
        'pin_code.digits' => 'The pin code must be exactly 6 digits.',
       ]
    );
              
        $student_id = $request->student_id;
      
        $contact_update = Student::where('parent_id', $parent_id)
                          ->where('id',$student_id)
                          ->firstOrFail();
        
                
            $contact_update->address = $request->residence_address;
            $contact_update->country = $request->country;
            $contact_update->state = $request->state;
            $contact_update->city = $request->city;
            $contact_update->pin_code = $request->pin_code;
            $contact_update->save();

        

        return response()->json(['success' => 'true', 'action' => $request->action, 'student_id' => $student_id]);
    }

   public function update_document_applicant(Request $request, $parent_id)
    {
        // $validatedData = $request->validate([
           
          
        //     'document_file' => 'required|array|min:1',
        //     'document_file.*' => 'required|file|mimes:jpg,png,jpeg,pdf|max:2048',
        // ], [
           
          
        //     'document_file.required' => 'At least one document file is required.',
        //     'document_file.*.required' => 'Each document file is required.',
        //     'document_file.*.mimes' => 'Each document file must be a file of type: jpg, png, jpeg, pdf.,.doc,.xls,.docx',
        //     'document_file.*.max' => 'Each document file must not be greater than 2 MB.',
        // ]);
    
        if (is_null($request->student_id)) {
            return response()->json(['success' => false, 'errors' => 'Student ID not found']);
        }
    
        try {
            $student = Student::where('parent_id', $parent_id)
                ->where('id', $request->student_id)
                ->firstOrFail();

                $parent_p = StudentParent::where('id', $parent_id)->first();
    
            if (!$student) {
                return response()->json(['success' => false, 'errors' => 'Student not found']);
            }
    
            $documents = !is_null($student->document) ? json_decode($student->document, true) : [];
    
            if ($request->hasFile('document_file')) {
                foreach ($request->file('document_file') as $key => $file) {
                    $originalFileName = $file->getClientOriginalName();
                    $currentDateTime = now()->format('YmdHis');
                    $documentPath = $file->storeAs('public/student_documents', $currentDateTime . '_' . $originalFileName);
    
                    // Delete the existing file if it exists
                    if (isset($documents[$key]) && Storage::exists('public/student_documents/' . $documents[$key]['file'])) {
                        Storage::delete('public/student_documents/' . $documents[$key]['file']);
                    }
    
                    $documents[$key] = [
                        'name' => $request->input('document_name')[$key],
                        'file' => $currentDateTime . '_' . $originalFileName,
                    ];
                }
            }
    
            $student->document = json_encode($documents);
            $student->save();

            $student_data = [
                'email' => $parent_p->email,
                'password' => $parent_p->password,
                'contact' => $parent_p->father_mobile,
                'parent_name' => $parent_p->father_name,
                'student_doc' => $student->document, // assuming document is already filled
                'student_pin_code' => $student->pin_code,
                'student_city' => $student->city,
                'student_state' => $student->state,
                'student_country' => $student->country,
                'student_dob' => $student->date_of_birth,
                'student_class' => $student->class,
                'student_name' => $student->first_name,
                'student_last_name' => $student->last_name,
                'student_address' => $student->address,
                'student_gender' => $student->gender,
            ];
            
            // Calculate profile completion percentage
            $profileCompletionPercentage = $this->calculateProfileCompletionPercentage((object)$student_data);            
    
            // Update applicant status
            $applicantStatus = new ApplicantStatus;
            $applicantStatus->student_id = $student->id;
            $applicantStatus->parent_id = $parent_id;
            $applicantStatus->applicant_id = $student->applicant_id;
            $applicantStatus->status = $profileCompletionPercentage >= 100 ? 'Complete' : 'Incomplete';
            $applicantStatus->note = $profileCompletionPercentage >= 100 ? 'Profile complete' : 'Profile incomplete';
            $applicantStatus->ip_address = $request->ip();
            $applicantStatus->created_by = '1';
            $applicantStatus->save();
    
            return response()->json(['success' => true, 'message' => 'Documents updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'errors' => $e->getMessage()]);
        }
    }


    public function applicant_profile(){
        return view('admin.applicant.applicant-profile');
    }

    public function schedule_meeting($id){
        $meetingStatus = $id;
        $step1Data = json_decode(Session::get('step1'), true) ?: [];
       
        $step2Data = json_decode(Session::get('step2'), true) ?: [];
        // dd($step1Data);
        $info = Student::join('student_parents', function ($join) use ($id) {
            $join->on('students.parent_id', '=', 'student_parents.id')
                //  ->on('students.applicant_id', '=', 'student_parents.applicant_id')
                 ->where('students.applicant_id', '=', $id);
        })
        ->select('students.*', 'student_parents.*','students.id as student_id')
        ->first();

        $parent_applicant_id = Student::select('applicant_id', 'first_name', 'last_name')->get();
        $ApplicantId = [];
        
        foreach ($parent_applicant_id as $count) {
            $ApplicantId[] = [
                'applicant_id' => $count->applicant_id,
                'name' => $count->first_name . ' ' . $count->last_name
            ];
        }


    //   $new_schedule_meeting = Student::join('student_parents','student.parent_id','=','student_parents.id')
    //                          ->where('student.applicant_id',$request->applicant_id)
    //                          ->where('student.first_name',$request->first_name)
    //                          ->where('student.last_name',$request->last_name)
    //                          ->select('student.*','student_parents.*')
    //                          ->first();

        return view('admin.applicant.schedule-meeting',compact('meetingStatus','info','step1Data', 'step2Data','ApplicantId'));
    }

                // public function get_Applicant_Id(Request $request){
         
                //      $applicant_id = $request->applicant_id;

                //          $new_schedule_meeting = Student::join('student_parents','student.parent_id','=','student_parents.id')
                //              ->On('meeting_statuses','students.id','=','meeting_statuses.student_id' )
                //              ->where('student.applicant_id',$applicant_id)
                //               ->select('student.*','student_parents.*')
                //              ->first();

                // }
 


    public function post_schedule_meeting_1(Request $request){

        $validatedData = $request->validate([
            'meeting_type' => 'required',
            'meeting_mode' => 'required',
        ], [
            'meeting_type.required' => 'The Purpose field is required.',
            'meeting_mode.required' => 'The Meeting mode field is required.',
        ]);

        
    $validatedData = $request->all();

    Session::put('step1', json_encode($validatedData));
   
    return response()->json(['status' => 'success','message'=>'value inserted']);
    
    }
     public function post_schedule_meeting_2(Request $request)
     {
        $validatedData = $request->validate([
            'meeting_date' =>'required',
            'meeting_time' => 'required',
            ],
        [
            'meeting_date.required' =>'The Meeting date field is required.',
            'meeting_time.required' => 'The Meeting time field is required.',
        ]
        );
        
           
        Session::put('step2', json_encode($validatedData));
 
        return response()->json(['status' => 'success', 'message' => 'Data stored in session']);
     }

     public function final_submit(Request $request) {
       
        $step1Data = json_decode(Session::get('step1'), true);
        $step2Data = json_decode(Session::get('step2'), true);
    
        $combinedData = array_merge($step1Data, $step2Data);
        
        $meeting = new MeetingStatus;
            
        $meeting->meeting_date = $combinedData['meeting_date']; 
        $meeting->time_slot = $combinedData['meeting_time']; 
        $meeting->student_id = $combinedData['student_id'];
        $meeting->parent_id = $combinedData['parent_id'];
        $meeting->applicant_id = $combinedData['applicant_id'];
        $meeting->purpose = $combinedData['meeting_type'];
        $meeting->mode = $combinedData['meeting_mode'];
        $meeting->other_purpose = $combinedData['meeting_other'];
        $meeting->location_url = $combinedData['meeting_mode'] === 'online' ? $combinedData['meeting_mode_other'] : $combinedData['meeting_location'];
        $meeting->status = 'active';
        $meeting->ip_address = '1';
        $meeting->created_by = 'null';
        $meeting->save();

      
        $email = StudentParent::where('student_parents.id',$combinedData['parent_id'])
                ->select('email')
                ->first();
        $applicant = Student::join('student_parents', 'students.parent_id', '=', 'student_parents.id')
                    ->where('students.id', $combinedData['student_id'])
                    ->where('students.parent_id', $combinedData['parent_id'])
                    ->first();

        Mail::to('ts.juhiverma@gmail.com')->send(new AdminMeetingNotification($meeting,$applicant));
        Mail::to($email)->send(new ApplicantMeetingNotification($meeting,$applicant));
           
        return response()->json(['status' => 'success', 'message' => 'Meeting Scheduled!!', 'data' => $combinedData]);
    }

    public function post_applicant_data(Request $request){
        $parent_student = StudentParent::where('email', $request->email)
        ->first();

        if($parent_student != null){
            return response()->json(['success'=>'false','message'=>'Email Already Exists.']);
        }else{

        $randomuserId = Str::random(8);

        $randomApplicantId = str_pad(random_int(0, 99999), 8, '0', STR_PAD_LEFT);

        $validatedData = $request->validate([
            'parent_name' => 'required|string|regex:/^[A-Za-z ]+$/',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password',
            'contact_number' => 'required|numeric|digits_between:10,15',
            'profession' => 'nullable|string|regex:/^[A-Za-z ]+$/',
        ], [
            'parent_name.required' => 'The parent name field is required.',
            'parent_name.string' => 'The parent name must be a string.',
            'parent_name.regex' => 'The parent name must only contain letters and spaces.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'password.required' => 'The password field is required.',
            'password.string' => 'The password must be a string.',
            'password.min' => 'The password must be at least 8 characters.',
            'password_confirmation.required' => 'The password confirmation field is required.',
            'password_confirmation.same' => 'The password confirmation does not match.',
            'contact_number.required' => 'The contact number field is required.',
            'contact_number.numeric' => 'The contact number field must contain only digits.',
            'contact_number.digits_between' => 'The contact number must be between 10 and 15 digits.',
            'profession.string' => 'The profession must be a string.',
            'profession.regex' => 'The profession must only contain letters and spaces.',
        ]);
        
        if (strtolower($request->email) !== $request->email) {
            return back()->withErrors(['email' => 'The email must be in lowercase.']);
        }
        
       

        $student_data = [
            'parent_name' => $request->parent_name,
            'contact' => $request->contact_number,
            'email' => $request->email,
            'password' => $request->password,
            'student_doc' => $request->student_doc,
            'student_pin_code' => $request->student_pin_code,
            'student_city' => $request->student_city,
            'student_state' => $request->student_state,
            'student_country' => $request->student_country,
            'student_dob' => $request->student_dob,
            'student_class' => $request->student_class,
            'student_name' => $request->student_name,
            'student_last_name' => $request->student_last_name,
            'student_address' => $request->student_address,
            'student_gender' => $request->student_gender,
        ];

        // Calculate profile completion percentage
        $profileCompletionPercentage = $this->calculateProfileCompletionPercentage((object)$student_data);
       
        // Determine status based on profile completion percentage
        $status = $profileCompletionPercentage < 100 ? 'Incomplete' : 'Complete';

        $applicant = new StudentParent;

        $plainPassword = $request->password; 
        
        $applicant->father_name = $request->parent_name;
        $applicant->father_mobile = $request->contact_number;
         $applicant->email = $request->email;
        $applicant->password =Crypt::encryptString($plainPassword);
        $applicant->father_profession = $request->profession;
        $applicant->role_id = $request->role_id;
        $applicant->status = $status; 
        $applicant->applicant_status = $request->applicant_status;                                                                                                           
        $applicant->ip_address = '1';
        $applicant->created_by = 'null';

        $applicant->save();

        $applicant_1 = new Student;

        $applicant_1->parent_id = $applicant->id;
        $applicant_1->applicant_id = $randomApplicantId;
        $applicant_1->applicant_status = $applicant->status;

        $applicant_1->save();

        $app = new ApplicantStatus;
        $app->student_id = $applicant_1->id;
        $app->parent_id = $applicant->id;
        $app->applicant_id = $applicant_1->applicant_id;
        $app->status = $status;
        $app->note = 'null';
        $app->ip_address = '1';
        $app->created_by = '1';
        $app->save();

        Mail::to('ts.juhiverma@gmail.com')->send(new AdminNotification($applicant));
      
        Mail::to($request->email)->send(new ApplicantRegistered($applicant,$plainPassword));
        
        return response()->json(['success'=>'true','action'=>$request->action,'student_id'=>$applicant_1->id, 'parent_id' => $applicant_1->parent_id, 'applicant_id' => $applicant_1->applicant_id]);
        }
    }

    // Function to calculate profile completion percentage based on fields
        private function calculateProfileCompletionPercentage($student_data)
        {
            if (!$student_data) {
                return 0; // If no data found, completeness is 0%
            }

            // Fields to check for completeness and their step increment for percentage calculation
            $fields = [
                'email','password','contact','parent_name','student_doc', 'student_pin_code', 'student_city', 'student_state', 'student_country',
                'student_dob', 'student_class', 'student_name', 'student_last_name',
                'student_address', 'student_gender'
            ];

            $profileCompletionPercentage = 0;
            $totalSteps = count($fields); // Total number of fields to check
            $stepIncrement = 100 / $totalSteps; // Increment for each field

            // Calculate profile completion percentage
            foreach ($fields as $field) {
                if (!empty($student_data->{$field})) {
                    $profileCompletionPercentage += $stepIncrement;
                }
            }

            // Round percentage to two decimal places
            $profileCompletionPercentage = round($profileCompletionPercentage, 2);

            return $profileCompletionPercentage;
        }

    public function post_applicant_student_data(Request $request){

        $parent_id = $request->input('parent_id');
        $student_id = $request->input('student_id');
        $applicant_id = $request->input('applicant_id');

        $parentStudent = Student::where('id', $student_id)
        ->where('applicant_id', $applicant_id)
        ->first();

        $randomPassword = Str::random(8);
        $hashPassword = Hash::make($randomPassword);

      

        $randomApplicantId = str_pad(random_int(0, 99999), 8, '0', STR_PAD_LEFT);

        if($parentStudent !== null){

            $student = Student::where('id', $student_id)
            ->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'password' => $parentStudent->password,
                'class' => $request->class,
                'religion' => $request->religion,
                'other_religion' => $request->religion === 'other' ? $request->other_religion : '',
                'gender' => $request->gender,
                'other_gender'=> $request->gender === 'other' ? $request->other_gender : '',
                'date_of_birth' => $request->date_of_birth,
                'blood_group' => $request->blood_group,
                'student_language' => $request->student_language,
                'image' => $parentStudent->image,
                'previous_school' => $request->previous_school,
                'category' => $request->category,
                'other_category' => $request->category === 'other' ? $request->other_category : '',
                'parent_id' => $parentStudent->parent_id,
                'applicant_id' => $parentStudent->applicant_id,
                'role_id' => $request->role_id,
                'ip_address' => '1',
                'status' => $request->status,
                'applicant_status' => $request->applicant_status,
                'created_by' => 'null',
            ]);

            return response()->json(['success' => true, 'student_id' => $parentStudent->id]);

        }else{
       
        $validatedData = $request->validate([
            'first_name' =>'required|string|regex:/^[A-Za-z ]+$/',
            'last_name' =>'required|string|regex:/^[A-Za-z ]+$/',
            'gender' => 'required',
            'class' => 'required',
            'date_of_birth' => 'required|date|before:' . now()->toDateString(),
            'student_language'=>'nullable|string',
            'category'=>'nullable|string',
            'blood_group'=>'nullable|string',
            'religion'=>'nullable|string',
            'previous_school'=>'nullable|string',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ],[
            'first_name.required' => 'The first name field is required.',
            'first_name.string' => 'The first name must be a string.',
            'first_name.regex' => 'The first name must only contain letters and spaces.',
            
            'last_name.required' => 'The last name field is required.',
            'last_name.string' => 'The last name must be a string.',
            'last_name.regex' => 'The last name must only contain letters and spaces.',
            
            'gender.required' => 'The gender field is required.',
            
            'class.required' => 'The class field is required.',
            
            'date_of_birth.required' => 'The date of birth field is required.',
            'date_of_birth.date' => 'The date of birth must be a valid date.',
            'date_of_birth.before' => 'The date of birth must be before today\'s date.',
            
            'student_language.string' => 'The student language must be a string.',
            
            'category.string' => 'The category must be a string.',
            
            'blood_group.string' => 'The blood group must be a string.',
            
            'religion.string' => 'The religion must be a string.',
            
            'previous_school.string' => 'The previous school must be a string.',
            
            'image.required' => 'The image field is required.',
            'image.image' => 'The image must be a valid image file.',
            'image.mimes' => 'The image must be a file of type: jpg, png, jpeg.',
            'image.max' => 'The image must not be greater than 2 MB.',
        ]
    );
       // $ipAddress = $this->getPublicIpAddress();
        try {
            // $student = new Student;
    
            // if ($request->hasFile('image')) {
            //     $originalFileName = $request->file('image')->getClientOriginalName();
            //     $currentDateTime = now()->format('YmdHis');
            //     $profileImagePath = $request->file('image')->storeAs('public/student_photos', $currentDateTime . '_' . $originalFileName);
            //     $student->image = $currentDateTime . '_' .$originalFileName;
            // } else {
            //     $student->image = null;
            // }

            // $student->first_name = $request->first_name;
            // $student->last_name = $request->last_name;
            // $student->username = $randomUsername;
            // $student->password = $hashPassword;
            // $student->class = $request->class;
            // $student->date_of_birth = $request->date_of_birth;
            // $student->blood_group = $request->blood_group;
            // $student->student_language = $request->student_language;
            // $student->previous_school = $request->previous_school;
            // $student->category = $request->category;
            // $student->parent_id = $parent_id;
            // $student->applicant_id = $randomApplicantId;
            // $student->role_id = $request->role_id;
            // $student->ip_address = '1';
            // $student->status = $request->status;
            // $student->applicant_status = $request->applicant_status;
            // $student->created_by = 'null';

            // if ($request->category === 'other') {
            //     $student->category = $request->other_category;
            // } else {
            //     $student->category = $request->category;
            // }

            // if ($request->religion === 'other') {
            //     $student->religion = $request->other_religion;
            // } else {
            //     $student->religion = $request->religion;
            // }

            // if ($request->gender === 'other') {
            //     $student->gender = $request->other_gender;
            // } else {
            //     $student->gender = $request->gender;
            // }

            // $student->save();


        $student_update = Student::where('parent_id', $parent_id)
        ->where('applicant_id',$applicant_id)
        ->firstOrFail();
        
        if ($request->hasFile('image')) {
            // Delete existing image if it exists
            if (!is_null($student_update->image)) {
                if (Storage::exists('public/student_photos/' . $student_update->image)) {
                    Storage::delete('public/student_photos/' . $student_update->image);
                }
            }
        
            // Upload new image
            $originalFileName = $request->file('image')->getClientOriginalName();
            $currentDateTime = now()->format('YmdHis');
            $profileImagePath = $request->file('image')->storeAs('public/student_photos', $currentDateTime . '_' . $originalFileName);
            $student_update->image = $currentDateTime . '_' . $originalFileName;
        } else {
            // No new image uploaded, do nothing
        }
        

        $student_update->first_name = $request->first_name;
        $student_update->last_name = $request->last_name;
        $student_update->class = $request->class;
        $student_update->date_of_birth = $request->date_of_birth;
        $student_update->blood_group = $request->blood_group;
        $student_update->student_language = $request->student_language;
        $student_update->previous_school = $request->previous_school;
        $student_update->parent_id = $student_update->parent_id;
        $student_update->applicant_id = $student_update->applicant_id;
        $student_update->role_id = $request->role_id;
        $student_update->ip_address = '1';
        $student_update->status = $request->status;
        $student_update->created_by = 'null';


        if ($request->category === 'other') {
            $student_update->category = $request->other_category;
        } else {
            $student_update->category = $request->category;
        }
        
        if ($request->religion === 'other') {
            $student_update->religion = $request->other_religion;
        } else {
            $student_update->religion = $request->religion;
        }
        
        if ($request->gender === 'other') {
            $student_update->gender = $request->other_gender;
        } else {
            $student_update->gender = $request->gender;
        }

        $student_update->save();
            
        return response()->json(['success' => true, 'student_id' => $student_update->id]);
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error saving student data:', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'errors' => $e->getMessage()]);
        }

        }
    }

    public function post_applicant_parent_data(Request $request){
        $parent_id = auth()->guard('webparents')->user()->id;
        
        // $applicant_id = str_pad(random_int(0, 99999), 8, '0', STR_PAD_LEFT);

        $student_id = $request->input('student_id');
        $applicant_id = $request->input('applicant_id');

        $parentStudent = Student::where('id', $student_id)
        ->first();

        if($parentStudent !== null){

            $student = Student::where('id', $student_id)
            ->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'password' => $parentStudent->password,
                'class' => $request->class,
                'date_of_birth' => $request->date_of_birth,
                'blood_group' => $request->blood_group,
                'student_language' => $request->student_language,
                'image' => $parentStudent->image,
                'previous_school' => $request->previous_school,
                'category' => $request->category,
                'parent_id' => $parentStudent->parent_id,
                'applicant_id' => $parentStudent->applicant_id,
                'role_id' => $request->role_id,
                'ip_address' => '1',
                'status' => $request->status,
                'applicant_status' => $request->applicant_status,
                'created_by' => 'null',
            ]);

            return response()->json(['success' => true, 'student_id' => $parentStudent->id, 'applicant_id'=>$parentStudent->applicant_id]);

        }else{
        $randomPassword = Str::random(8);
        $hashPassword = Hash::make($randomPassword);

        $randomUsername = Str::random(8);

        $randomApplicantId = str_pad(random_int(0, 99999), 8, '0', STR_PAD_LEFT);

        $validatedData = $request->validate([
            'first_name' =>'required|string|regex:/^[A-Za-z ]+$/',
            'last_name' =>'required|string|regex:/^[A-Za-z ]+$/',
            'gender' => 'required',
            'class' => 'required',
            'date_of_birth' => 'required|date|before:' . now()->toDateString(),
            'student_language'=>'nullable|string',
            'category'=>'nullable|string',
            'blood_group'=>'nullable|string',
            'religion'=>'nullable|string',
            'previous_school'=>'nullable|string',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ], [
        
            'first_name.required' => 'The first name field is required.',
            'first_name.string' => 'The first name must be a string.',
            'first_name.regex' => 'The first name must only contain letters and spaces.',
            
            'last_name.required' => 'The last name field is required.',
            'last_name.string' => 'The last name must be a string.',
            'last_name.regex' => 'The last name must only contain letters and spaces.',
            
            'gender.required' => 'The gender field is required.',
            
            'class.required' => 'The class field is required.',
            
            'date_of_birth.required' => 'The date of birth field is required.',
            'date_of_birth.date' => 'The date of birth must be a valid date.',
            'date_of_birth.before' => 'The date of birth must be before today\'s date.',
            
            'student_language.string' => 'The student language must be a string.',
            
            'category.string' => 'The category must be a string.',
            
            'blood_group.string' => 'The blood group must be a string.',
            
            'religion.string' => 'The religion must be a string.',
            
            'previous_school.string' => 'The previous school must be a string.',
        
            'image.required' => 'The image field is required.',
            'image.image' => 'The image must be a valid image file.',
            'image.mimes' => 'The image must be a file of type: jpg, png, jpeg.',
            'image.uploaded' => 'The image must not be greater than 2 MB.',
        ]);
    
    
        // $ipAddress = $this->getPublicIpAddress();
        try {
            $student = new Student;
    
            if ($request->hasFile('image')) {
                $originalFileName = $request->file('image')->getClientOriginalName();
                $currentDateTime = now()->format('YmdHis');
                $profileImagePath = $request->file('image')->storeAs('public/student_photos', $currentDateTime . '_' . $originalFileName);
                $student->image = $currentDateTime . '_' .$originalFileName;
            } else {
                $student->image = null;
            }

            $student->first_name = $request->first_name;
            $student->last_name = $request->last_name;
            $student->password = $hashPassword;
            $student->class = $request->class;
            $student->date_of_birth = $request->date_of_birth;
            $student->blood_group = $request->blood_group;
            $student->student_language = $request->student_language;
            $student->previous_school = $request->previous_school;
            $student->category = $request->category;
            $student->parent_id = $parent_id;
            $student->applicant_id = $randomApplicantId;
            $student->role_id = $request->role_id;
            $student->ip_address = '1';
            $student->status = $request->status;
            $student->applicant_status = $request->applicant_status;
            $student->created_by = 'null';

            if ($request->category === 'other') {
                $student->category = $request->category;
                $student->other_category = $request->other_category;
            } else {
                $student->category = $request->category;
            }

            if ($request->religion === 'other') {
                $student->religion = $request->religion;
                $student->other_religion = $request->other_religion;
            } else {
                $student->religion = $request->religion;
            }

            if ($request->gender === 'other') {
                $student->other_gender = $request->other_gender;
                $student->gender = $request->gender;
            } else {
                $student->gender = $request->gender;
            }

            $student->save();
            
            return response()->json(['success' => true, 'student_id' => $student->id, 'applicant_id'=>$student->applicant_id]);
            } catch (\Exception $e) {
                // Log the error for debugging
                \Log::error('Error saving student data:', ['error' => $e->getMessage()]);
                return response()->json(['success' => false, 'errors' => $e->getMessage()]);
            }

        }
    }
    
    public function post_applicant_contact_data(Request $request){
        $data = $request->validate([
               
                'residence_address' =>'required|min:3|max:255',
                'country' => 'required|string|regex:/^[A-Za-z ]+$/',
                'state' => 'required',
                'city' => 'required',
                'pin_code' => 'required|digits:6',
               
            ], 
            [
             'residence_address.required' => 'The residence address field is required.',
             'residence_address.min' => 'The residence address must be at least 3 characters long.',
             'residence_address.max' => 'The residence address must not exceed 255 characters.',
             'country.required' => 'The country field is required.',
             'country.string' => 'The country must be a valid string.',
             'country.regex' => 'The country must only contain letters and spaces.',
             'state.required' => 'The state field is required.',
             'city.required' => 'The city field is required.',
             'pin_code.required' => 'The pin code field is required.',
             'pin_code.digits' => 'The pin code must be exactly 6 digits.',
            ]
         );
                  
    
        $student_id = $request->input('student_id');

        if (is_null($student_id)) {
          return response()->json(['success' => false, 'errors' => 'Student ID not found']);
         }
        try {
            
            $student = Student::findOrFail($student_id);
            
            $student->address = $request->residence_address;
            $student->country = $request->country;
            $student->state = $request->state;
            $student->city = $request->city;
            $student->pin_code = $request->pin_code;
                          
    
            $student->save();
    
            return response()->json(['success' => true, 'student_id'=>$student_id]);
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error saving student data:', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'errors' => $e->getMessage()]);
        }
    }

    public function post_applicant_contact_parent_data(Request $request){
        $data = $request->validate([
                'residence_address' =>'required|min:3|max:255',
                'country' => 'required|string|regex:/^[A-Za-z ]+$/',
                'state' => 'required',
                'city' => 'required',
                'pin_code' => 'required|digits:6',
            
            ],[
                'residence_address.required' => 'The residence address field is required.',
                'residence_address.min' => 'The residence address must be at least 3 characters long.',
                'residence_address.max' => 'The residence address must not exceed 255 characters.',
                'country.required' => 'The country field is required.',
                'country.string' => 'The country must be a valid string.',
                'country.regex' => 'The country must only contain letters and spaces.',
                'state.required' => 'The state field is required.',
                'city.required' => 'The city field is required.',
                'pin_code.required' => 'The pin code field is required.',
                'pin_code.digits' => 'The pin code must be exactly 6 digits.',


            ]
                
        );
    
        $student_id = $request->input('student_id');

        if (is_null($student_id)) {
        return response()->json(['success' => false, 'errors' => 'Student ID not found']);
        }
        try {
            
            $student = Student::findOrFail($student_id);
            
            $student->address = $request->residence_address;
            $student->country = $request->country;
            $student->state = $request->state;
            $student->city = $request->city;
            $student->pin_code = $request->pin_code;
                        

            $student->save();

            return response()->json(['success' => true, 'student_id' => $student->id]);
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error saving student data:', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'errors' => $e->getMessage()]);
        }
    }
   
    public function post_applicant_document_data(Request $request)
    {
    $student_id = $request->input('student_id');

    if (is_null($student_id)) {
        return response()->json(['success' => false, 'errors' => 'Student ID not found']);
    }

    try {
        $student = Student::find($student_id);
        if (!$student) {
            return response()->json(['success' => false, 'errors' => 'Student not found']);
        }

        $documents = [];

        if ($request->hasFile('document_file')) {
            foreach ($request->file('document_file') as $key => $file) {
                $originalFileName = $file->getClientOriginalName();
                $currentDateTime = now()->format('YmdHis');
                $documentPath = $file->storeAs('public/student_documents', $currentDateTime . '_' . $originalFileName);

                $documents[] = [
                    'name' => $request->input('document_name')[$key],
                    'file' => $currentDateTime . '_' . $originalFileName,
                ];
            }

            // If documents already exist, merge them
            if (!is_null($student->document)) {
                $existingDocuments = json_decode($student->document, true);
                if (is_array($existingDocuments)) {
                    $documents = array_merge($existingDocuments, $documents);
                }
            }

            $student->document = json_encode($documents);
        }

        $student->save();

        return response()->json(['success' => true, 'message' => 'Form submitted successfully!']);
    } catch (\Exception $e) {
        // Log the error for debugging
        \Log::error('Error saving student data:', ['error' => $e->getMessage()]);
        return response()->json(['success' => false, 'errors' => $e->getMessage()]);
    }
}

    public function post_applicant_document_parent_data(Request $request){
        $student_id = $request->input('student_id');

        if (is_null($student_id)) {
        return response()->json(['success' => false, 'errors' => 'Student ID not found']);
        }

    try {
        $student = Student::find($student_id);
        if (!$student) {
            return response()->json(['success' => false, 'errors' => 'Student not found']);
        }

        $documents = [];

        if ($request->hasFile('document_file')) {
            foreach ($request->file('document_file') as $key => $file) {
                $originalFileName = $file->getClientOriginalName();
                $currentDateTime = now()->format('YmdHis');
                $documentPath = $file->storeAs('public/student_documents', $currentDateTime . '_' . $originalFileName);

                $documents[] = [
                    'name' => $request->input('document_name')[$key],
                    'file' => $currentDateTime . '_' . $originalFileName,
                ];
            }

            // If documents already exist, merge them
            if (!is_null($student->document)) {
                $existingDocuments = json_decode($student->document, true);
                if (is_array($existingDocuments)) {
                    $documents = array_merge($existingDocuments, $documents);
                }
            }

            $student->document = json_encode($documents);
        }

        $student->save();

        return response()->json(['success' => true, 'message' => 'Form submitted successfully!']);
    } catch (\Exception $e) {
        // Log the error for debugging
        \Log::error('Error saving student data:', ['error' => $e->getMessage()]);
        return response()->json(['success' => false, 'errors' => $e->getMessage()]);
    }
    }

    public function showApplicantDocuments($id)
    {
        $student = Student::where('parent_id', $id)->first();

        if (!$student) {
            return response()->json(['success' => false, 'errors' => 'Student not found']);
        }

        // Decode the documents JSON field
        $documents = json_decode($student->document, true);

        return response()->json(['success' => true, 'documents' => $documents]);
    }


    public function applicantId(Request $request)
    {
        $term = $request->input('term');
        $applicants = Student::where('applicant_id', 'like', '%' . $term . '%')
                     ->pluck('applicant_id');
        return response()->json($applicants);
    }
    

    public function meeting_status(){
        $meeting_data = MeetingStatus::join('students', 'meeting_statuses.student_id', '=', 'students.id')
        ->join('student_parents', 'meeting_statuses.parent_id', '=', 'student_parents.id')
        ->select(
            'meeting_statuses.id',
            'meeting_statuses.student_id',
            'meeting_statuses.parent_id',
            'meeting_statuses.meeting_date',
            'meeting_statuses.time_slot',
            'meeting_statuses.note as latest_note',
            'meeting_statuses.status as latest_status',
            'meeting_statuses.purpose',
            'meeting_statuses.mode',
            'meeting_statuses.status',
            'meeting_statuses.location_url',
            'students.first_name',
            'students.last_name',
            'student_parents.father_name',
            'students.applicant_id',
            'students.class',
            'student_parents.father_mobile'
        )
        ->whereIn('meeting_statuses.id', function ($query) {
            $query->selectRaw('MAX(id)')
                ->from('meeting_statuses')
                ->groupBy('student_id');
        })
        ->distinct()
        ->get();

        $ApplicantId = Student::select('applicant_id', 'first_name', 'last_name')->get();
   
        return view('admin.applicant.meeting-status', compact('meeting_data','ApplicantId'));
    }

    public function change_meeting_status(){
        return view('admin.applicant.change-meeting-status');
    }

    public function meeting_tracking(){

        $parent_applicant_id = Student::select('applicant_id', 'first_name', 'last_name')->get();
        $ApplicantId = [];
        
        foreach ($parent_applicant_id as $count) {
            $ApplicantId[] = [
                'applicant_id' => $count->applicant_id,
                'name' => $count->first_name . ' ' . $count->last_name
            ];
        }

        return view('admin.applicant.meeting-tracking',compact('ApplicantId'));
    }

    public function get_applicant_status(Request $request){

        $applicant_id = $request->input('applicant_id');

        $steps = DB::table('students')
            ->select(
                'students.id as student_id',
                'student_parents.id as parent_id',
                'students.*',
                'student_parents.*',
                'meeting_statuses.status as meeting_status',
                'meeting_statuses.note as meeting_note',
                'meeting_statuses.meeting_date',
                'meeting_statuses.time_slot',
                'applicant_statuses.status as applicant_status',
                'applicant_statuses.note as applicant_note'
            )
            ->join('student_parents', 'students.parent_id', '=', 'student_parents.id')
            ->leftJoin('meeting_statuses', function ($join) {
                $join->on('students.id', '=', 'meeting_statuses.student_id');
                $join->on('meeting_statuses.applicant_id', '=', 'students.applicant_id');
            })
            ->leftJoin('applicant_statuses', function ($join) {
                $join->on('students.id', '=', 'applicant_statuses.student_id');
                $join->on('applicant_statuses.applicant_id', '=', 'students.applicant_id');
            })
            ->where('students.applicant_id', $applicant_id)
            ->orderBy('meeting_statuses.meeting_date')
            ->orderBy('meeting_statuses.time_slot')
            ->get();
            
            return response()->json($steps);

    }

    public function applicant_parent_list($id){
        // $studentDetails = Student::where('parent_id', $id)->get();

        $studentDetails = Student::select(
            'students.id',
            'students.parent_id as parent_id',
            'students.applicant_id',
            'students.first_name',
            'students.last_name',
            'students.email',
            'students.mobile',
            'students.address',
            'students.gender',
            'students.class',
            'students.date_of_birth',
            'students.country',
            'students.state',
            'students.city',
            'students.pin_code',
            'students.document',
            'applicant_statuses.status as applicant_status',
            'applicant_statuses.note as applicant_note'
        )
        ->leftJoin('applicant_statuses', function($join) {
            $join->on('students.id', '=', 'applicant_statuses.student_id')
                 ->where('applicant_statuses.id', function($query) {
                     $query->select('id')
                           ->from('applicant_statuses')
                           ->whereColumn('student_id', 'students.id')
                           ->orderByDesc('created_at')
                           ->limit(1);
                 });
        })
        ->where('students.parent_id', $id)
        ->get();

    
        
        return view('admin.applicant.applicant-parent-list', compact('studentDetails'));
    }

    public function add_applicant(){
        $country = Country::get();

        $test = [];
        foreach($country as $count){
            $test[] = $count->country;
        }
        $state = State::get();
        $testing = [];
        foreach($state as $sta){
            $testing[] = $sta->state;
        }
        $country = Country::get(['id','country']);
        $state = State::get(['id','state']);

        $Religion = Religion::get();
        $BloodGroup = BloodGroup::get();

        $class_master = ClassMaster::get();

        $Language = Language::get();
        $lang = [];
        foreach($Language as $lng){
            $lang[] = $lng->name;
        }

        return view('admin.applicant.add-applicant',compact('lang','Language','BloodGroup','Religion','state','country','test','testing','class_master'));
    }

    public function parent_meeting_status() {
        $parent_id = auth()->guard('webparents')->user()->id;
    
        // Fetch students
        $students = StudentParent::join('students', 'students.parent_id', '=', 'student_parents.id')
            ->where('student_parents.id', $parent_id)
            ->get();
    
        // Fetch meeting statuses for each student
        $children = StudentParent::join('students', 'students.parent_id', '=', 'student_parents.id')
            ->leftJoin('meeting_statuses', 'meeting_statuses.student_id', '=', 'students.id')
            ->where('student_parents.id', $parent_id)
            ->select('students.*', 'meeting_statuses.meeting_date', 'meeting_statuses.time_slot', 'meeting_statuses.purpose', 'meeting_statuses.mode', 'meeting_statuses.status','meeting_statuses.id as meeting_id','meeting_statuses.note'
                       ,'meeting_statuses.other_purpose','meeting_statuses.location_url','meeting_statuses.note')
            ->distinct()
            ->orderBy('meeting_statuses.created_at','desc')
            ->get();
    
        return view('admin.applicant.parent-meeting-status', compact('students', 'children'));
    }
    
    public function parent_meeting_status_update(Request $request) {

        $parent_meeting_update = new MeetingStatus;
        $parent_meeting_update->student_id = $request->student_id;
        $parent_meeting_update->parent_id = $request->parent_id;
        $parent_meeting_update->applicant_id = $request->applicant_id;
        $parent_meeting_update->meeting_date = $request->meeting_date;
        $parent_meeting_update->time_slot = $request->time_slot;
        $parent_meeting_update->purpose = $request->purpose;
        $parent_meeting_update->other_purpose = $request->other_purpose;
        $parent_meeting_update->mode = $request->mode;
        $parent_meeting_update->location_url = $request->location_url;
        $parent_meeting_update->status = $request->status;
        $parent_meeting_update->note = $request->note;
        $parent_meeting_update->ip_address = '1';
        $parent_meeting_update->created_by = 'null';
        $parent_meeting_update->save();
            
        if($parent_meeting_update){
            return redirect()->back()->with('status', 'Meeting Status Updated Successfully!!');
        }else{
            return redirect()->back()->with('status', 'Failed to Update Meeting Status');
        }
    }



    public function parent_meeting_track(){
        $parent_applicant_id = Student::where('parent_id', auth()->guard('webparents')->user()->id)->select('applicant_id', 'first_name', 'last_name')->get();
        $ApplicantId = [];
        
        foreach ($parent_applicant_id as $count) {
            $ApplicantId[] = [
                'applicant_id' => $count->applicant_id,
                'name' => $count->first_name . ' ' . $count->last_name
            ];
        }

        return view('admin.applicant.parent-meeting-track',compact('ApplicantId'));
    }
 
    public function applicant_student_profile($id){
        $StudentView = Student::where('id', $id)->first();
        return view('admin.applicant.applicant-student-profile', compact('StudentView'));
    }

    public function delete_applicant_parent($id){
        // Find the student by parent_id
        $student = Student::where('id', $id)->first();
                
        if (!$student) {
            return redirect()->back()->with('error', 'Student not found');
        }

        // Soft delete the student
        $student->delete();

        return redirect()->back()->with('status', 'Deleted Successfully');
    }

    public function applicant_parent_status_update(Request $request){

        $applicant = Student::where('id', $request->student_id)->first();

        $parent = StudentParent::where('id', $request->parent_id)->first();

        $student = new ApplicantStatus;
        $student->student_id = $request->student_id;
        $student->parent_id = $request->parent_id;
        $student->applicant_id = $applicant->applicant_id;
        $student->status = $request->status_update;
        $student->note = $request->note;
        $student->ip_address = '1';
        $student->created_by = 'null';

        $student->save();

        Mail::to('ts.juhiverma@gmail.com')->send(new AdminStatusReceive($applicant, $student, $parent));
      
        Mail::to($parent->email)->send(new ApplicantStatusUpdate($applicant, $student, $parent));

        if($student){
            return redirect()->back()->with('status', 'Updated Successfully');
        }else{
            return redirect()->back()->with('status', 'Not Updated Successfully');
        }
    }

    public function applicant_meeting_status_update(Request $request){
        // $ipAddress = $this->getPublicIpAddress();

        $meeting_update = new MeetingStatus;
        $meeting_update->student_id = $request->student_id;
        $meeting_update->parent_id = $request->parent_id;
        $meeting_update->applicant_id = $request->applicant_id;
        $meeting_update->meeting_date = $request->meeting_date;
        $meeting_update->time_slot = $request->time_slot;
        $meeting_update->purpose = $request->purpose;
        $meeting_update->other_purpose = $request->other_purpose;
        $meeting_update->mode = $request->mode;
        $meeting_update->location_url = $request->location_url;
        $meeting_update->status = $request->status;
        $meeting_update->note = $request->note;
        $meeting_update->ip_address = '1';
        $meeting_update->created_by = 'null';
        $meeting_update->save();
            
        if($meeting_update){
            return redirect()->back()->with('status', 'Meeting Status Updated Successfully!!');
        }else{
            return redirect()->back()->with('status', 'Failed to Update Meeting Status');
        }
    }
   



    public function download_profile($student_id, $parent_id){
        $parent_details = StudentParent::find($parent_id);
        $student_details = Student::find($student_id);

        try {
            $decrypted_password = Crypt::decryptString($parent_details->password);
        } catch (DecryptException $e) {
            // Handle decryption failure (e.g., log error, set a default value)
            $decrypted_password = 'Decryption Error';
        }
    
        $data = [
            'title' => 'Parent and Student Information',
            'date' => $parent_details->created_at,
            'parent' => [
                'name' => $parent_details->father_name,
                'contact' => $parent_details->father_mobile,
                'profession' => $parent_details->father_profession,
                'email' => $parent_details->email,
                'phone' => '0000000000',
                'password' => $decrypted_password
            ],
            'student' => [
                'name' => $student_details->first_name . ' ' . $student_details->last_name,
                'gender' => $student_details->gender,
                'admission_for' => $student_details->class,
                'dob' => $student_details->date_of_birth,
                'blood_group' => $student_details->blood_group,
                'religion' => $student_details->religion,
                'category' => $student_details->category,
                'language' => $student_details->language,
                'previous_school' => $student_details->previous_school,
                'address' => $student_details->address,
                'country' => $student_details->country,
                'state' => $student_details->state,
                'city' => $student_details->city,
                'pin_code' => $student_details->pin_code,
            ]
        ];
        
        $pdf = PDF::loadView('pdf_view', $data);
        
        return $pdf->download('parent_student_information.pdf');
    }

    public function update_applicant_data($student_id,$parent_id){
        $country = Country::get();

        $test = [];
        foreach($country as $count){
            $test[] = $count->country;
        }
        $state = State::get();
        $testing = [];
        foreach($state as $sta){
            $testing[] = $sta->state;
        }
        $country = Country::get(['id','country']);
        $state = State::get(['id','state']);

       $class_master =  ClassMaster::get();

        $Religion = Religion::get();
        $BloodGroup = BloodGroup::get();

        $Language = Language::get();
        $lang = [];
        foreach($Language as $lng){
            $lang[] = $lng->name;
        }

        $parent = StudentParent::where('id',$parent_id)
                ->first();

        $student = Student::where('id',$student_id)
                   ->first();  
        // $applicant_data = Student::join('student_parents', function ($join) use ($id) {
        //     $join->on('students.parent_id', '=', 'student_parents.id')
        //          ->on('students.applicant_id', '=', 'student_parents.applicant_id')
        //          ->where('student_parents.id', '=', $id);
        // })
        // ->select('students.*', 'student_parents.*')
        // ->first();

        // print_r($applicant_data);
        // exit;
        
       $class_master =  ClassMaster::get();
        return view('admin.applicant.update-applicant-data',compact('lang','Language','BloodGroup','Religion','state','country','test','testing','student','parent','class_master'));
        
    }

    public function get_applicant_id(Request $request){
        $applicant_id = $request->input('applicant_id');

        $info = Student::join('student_parents', function ($join) use ($applicant_id) {
            $join->on('students.parent_id', '=', 'student_parents.id')
                //  ->on('students.applicant_id', '=', 'student_parents.applicant_id')
                 ->where('students.applicant_id', '=', $applicant_id);
        })
        ->select('students.*', 'student_parents.*','students.id as student_id')
        ->first();

        return response()->json(['success' => true, 'info' => $info]);
    }
 
}
