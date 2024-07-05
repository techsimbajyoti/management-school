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
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicantRegistered;
use App\Mail\AdminNotification;
use App\Mail\ApplicantMeetingNotification;
use App\Mail\AdminMeetingNotification;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\ApplicantStatus;
use Illuminate\Support\Facades\DB;
use App\Models\MeetingStatus;
use PDF;


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
        return view('pages.applicant');
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
    
            
        return view('admin.applicant.applicant-list', compact('applicant_list'));
    }
        
    
        // if ($request->has('class') && $request->class != '') {
        //     $query->where('students.class', $request->class);
        // }
    
        // if ($request->has('status_form') && $request->status_form != '') {
        //     $query->where('applicant_statuses.status', $request->status_form);
        // }
    
        // // if ($request->has('applicantIds') && $request->applicantIds != '') {
        // //     $query->where('students.applicant_id', $request->applicantIds);
        // // }

        // if ($request->has('applicant_id') && $request->applicant_id != '') {
        //     $query->where('students.applicant_id', 'LIKE', "%{$request->applicant_id}%");
        // }
    
     
    
       
    
    
    public function view_applicant($id)
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
    
        $applicant_data = Student::join('student_parents', function ($join) use ($id) {
            $join->on('students.parent_id', '=', 'student_parents.id')
                 ->on('students.applicant_id', '=', 'student_parents.applicant_id')
                 ->where('student_parents.id', '=', $id);
        })
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
        
        return view('admin.applicant.edit-applicant',compact('lang','Language','BloodGroup','Religion','state','country','test','testing','student','parent','request'));
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

    public function update_student_applicant(Request $request ,$parent_id, $student_id)
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
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);
        
        // $ipAddress = $this->getPublicIpAddress();
        
        $parent_id = Session::get('parent_id');
      
        $student_update = Student::where('parent_id', $parent_id)->firstOrFail();
        
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
        $student_update->parent_id = $parent_id;
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


        Session::put(['student_id' => $student_update->id]);

        return response()->json(['success' => 'true', 'action' => $request->action, 'student_id'=>$student_id]);
    }
    

    public function update_contact_applicant(Request $request ,$parent_id)
    {
        $validatedData = $request->validate([
            'residence_address' =>'required|min:3|max:255',
            'country' => 'required|string|regex:/^[A-Za-z ]+$/',
            'state' => 'required',
            'city' => 'required',
            'pin_code' => 'required|digits:6',
        ]);
              
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
        if (is_null($request->student_id)) {
            return response()->json(['success' => false, 'errors' => 'Student ID not found']);
        }
    
        try {
            $student = Student::where('parent_id', $parent_id)
                ->where('id', $request->student_id)
                ->firstOrFail();
    
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
    
            // Calculate profile completion percentage
            $profileCompletionPercentage = $this->calculateProfileCompletionPercentage($student);
    
            // Update applicant status
            $applicantStatus = ApplicantStatus::firstOrNew(['student_id' => $student->id]);
            $applicantStatus->parent_id = $parent_id;
            $applicantStatus->applicant_id = $student->applicant_id;
            $applicantStatus->status = $profileCompletionPercentage >= 100 ? 'Complete' : 'Incomplete';
            $applicantStatus->note = $profileCompletionPercentage >= 100 ? 'Profile complete' : 'Profile incomplete';
            $applicantStatus->ip_address = $request->ip();
            $applicantStatus->created_by = auth()->guard('webparents')->user()->username;
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
                 ->on('students.applicant_id', '=', 'student_parents.applicant_id')
                 ->where('students.applicant_id', '=', $id);
        })
        ->select('students.*', 'student_parents.*','students.id as student_id')
        ->first();
        return view('admin.applicant.schedule-meeting',compact('meetingStatus','info','step1Data', 'step2Data',));
    }

    public function post_schedule_meeting_1(Request $request){

    $validatedData = $request->all();

    Session::put('step1', json_encode($validatedData));
   
    return response()->json(['status' => 'success','message'=>'value inserted']);
    
    }
     public function post_schedule_meeting_2(Request $request)
     {
         
        $validatedData = $request->all();

         Session::put('step2', json_encode($validatedData));
 
         return response()->json(['status' => 'success', 'message' => 'Data stored in session']);
     }

     public function final_submit(Request $request) {
       
        $step1Data = json_decode(Session::get('step1'), true);
        $step2Data = json_decode(Session::get('step2'), true);
    
        $combinedData = array_merge($step1Data, $step2Data);
        
        $meeting = new MeetingStatus();
      
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
        $parent_id = $request->input('parent_id');
        $applicant_id = $request->input('applicant_id');

        // $ipAddress = $this->getPublicIpAddress();

        $randomApplicantId = str_pad(random_int(0, 99999), 8, '0', STR_PAD_LEFT);
    
        $applicant_id = Session::get('applicant_id');

        $parent_student = StudentParent::where('email', $request->email)
        ->first();

        if($parent_student !== null){

            $applicant = StudentParent::where('email', $request->email)->update([
                'father_name' => $request->parent_name,
                'father_mobile' => $request->contact_number,
                'username' => $parent_student->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'father_profession' => $request->profession,
                'applicant_id' => $applicant_id,
                'role_id' => $request->role_id,
                'status' => $request->status,
                'applicant_status' => $request->applicant_status,                                                                                                           
                'ip_address' => '127.0.0.1',
                'created_by' => 'null',
            ]);

        return response()->json(['success'=>'true','action'=>$request->action, 'update'=>'yes','email'=>$request->email,]);

                
        }else{

            $randomuserId = Str::random(8);

        $validatedData = $request->validate([
            'parent_name' => 'required|string|regex:/^[A-Za-z ]+$/',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password',
            'contact_number' => 'required|digits_between:10,15',
            'profession' => 'nullable|string|regex:/^[A-Za-z ]+$/',
        ]);

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
                
        $applicant->father_name = $request->parent_name;
        $applicant->father_mobile = $request->contact_number;
        $applicant->username = $randomuserId;
        $applicant->email = $request->email;
        $applicant->password = Hash::make($request->password);
        $applicant->father_profession = $request->profession;
        $applicant->applicant_id = $randomApplicantId;
        $applicant->role_id = $request->role_id;
        $applicant->status = $request->status; 
        $applicant->applicant_status = $request->applicant_status;                                                                                                           
        $applicant->ip_address = '1';
        $applicant->created_by = 'null';

        $applicant->save();

        $app = new ApplicantStatus;
        $app->student_id = 'null';
        $app->parent_id = $applicant->id;
        $app->applicant_id = $applicant->applicant_id;
        $app->status = $status;
        $app->note = 'null';
        $app->ip_address = '1';
        $app->created_by = '1';
        $app->save();

        Mail::to('ts.juhiverma@gmail.com')->send(new AdminNotification($applicant));
      
        Mail::to($request->email)->send(new ApplicantRegistered($applicant));

        Session::put(['parent_id' => $applicant->id]);
        Session::put(['applicant_id' =>$applicant->applicant_id]);
        
        return response()->json(['success'=>'true','action'=>$request->action, 'parent_id' => $applicant->id, 'applicant_id' => $applicant->applicant_id]);

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

        $parent_id = Session::get('parent_id');
        $student_id = $request->input('student_id');
        $applicant_id = Session::get('applicant_id');

        $parentStudent = Student::where('id', $student_id)
        ->where('applicant_id', $applicant_id)
        ->first();

        $randomPassword = Str::random(8);
        $hashPassword = Hash::make($randomPassword);

        $randomUsername = Str::random(8);

        if($parentStudent !== null){

            $student = Student::where('id', $student_id)
            ->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'username' => $randomUsername,
                'password' => $hashPassword,
                'class' => $request->class,
                'date_of_birth' => $request->date_of_birth,
                'blood_group' => $request->blood_group,
                'student_language' => $request->student_language,
                'image' => $parentStudent->image,
                'previous_school' => $request->previous_school,
                'category' => $request->category,
                'parent_id' => $parent_id,
                'applicant_id' => $applicant_id,
                'role_id' => $request->role_id,
                'ip_address' => '1',
                'status' => $request->status,
                'applicant_status' => $request->applicant_status,
                'created_by' => 'null',
            ]);

            return response()->json(['success' => true]);

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
            $student->username = $randomUsername;
            $student->password = $hashPassword;
            $student->class = $request->class;
            $student->date_of_birth = $request->date_of_birth;
            $student->blood_group = $request->blood_group;
            $student->student_language = $request->student_language;
            $student->previous_school = $request->previous_school;
            $student->category = $request->category;
            $student->parent_id = $parent_id;
            $student->applicant_id = $applicant_id;
            $student->role_id = $request->role_id;
            $student->ip_address = '1';
            $student->status = $request->status;
            $student->applicant_status = $request->applicant_status;
            $student->created_by = 'null';

            if ($request->category === 'other') {
                $student->category = $request->other_category;
            } else {
                $student->category = $request->category;
            }

            if ($request->religion === 'other') {
                $student->religion = $request->other_religion;
            } else {
                $student->religion = $request->religion;
            }

            if ($request->gender === 'other') {
                $student->gender = $request->other_gender;
            } else {
                $student->gender = $request->gender;
            }

            $student->save();
            Session::put(['student_id' => $student->id]);
            
            return response()->json(['success' => true, 'student_id' => $student->id]);
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error saving student data:', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'errors' => $e->getMessage()]);
        }

        }
    }

    public function post_applicant_parent_data(Request $request){
        $parent_id = auth()->guard('webparents')->user()->id;
        
        $applicant_id = Str::random(8);

        // $parentStudent = Student::where('id', $student_id)
        // ->where('applicant_id', $applicant_id)
        // ->first();

        $randomPassword = Str::random(8);
        $hashPassword = Hash::make($randomPassword);

        $randomUsername = Str::random(8);

        // if($parentStudent !== null){

        //     $student = Student::where('id', $student_id)
        //     ->update([
        //         'first_name' => $request->first_name,
        //         'last_name' => $request->last_name,
        //         'username' => $randomUsername,
        //         'password' => $hashPassword,
        //         'class' => $request->class,
        //         'date_of_birth' => $request->date_of_birth,
        //         'blood_group' => $request->blood_group,
        //         'student_language' => $request->student_language,
        //         'image' => $parentStudent->image,
        //         'previous_school' => $request->previous_school,
        //         'category' => $request->category,
        //         'parent_id' => $parent_id,
        //         'applicant_id' => $applicant_id,
        //         'role_id' => $request->role_id,
        //         'ip_address' => '1',
        //         'status' => $request->status,
        //         'applicant_status' => $request->applicant_status,
        //         'created_by' => 'null',
        //     ]);

        //     return response()->json(['success' => true]);

        // }else{
       
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
            $student->username = $randomUsername;
            $student->password = $hashPassword;
            $student->class = $request->class;
            $student->date_of_birth = $request->date_of_birth;
            $student->blood_group = $request->blood_group;
            $student->student_language = $request->student_language;
            $student->previous_school = $request->previous_school;
            $student->category = $request->category;
            $student->parent_id = $parent_id;
            $student->applicant_id = '_'.$applicant_id;
            $student->role_id = $request->role_id;
            $student->ip_address = '1';
            $student->status = $request->status;
            $student->applicant_status = $request->applicant_status;
            $student->created_by = 'null';

            if ($request->category === 'other') {
                $student->category = $request->other_category;
            } else {
                $student->category = $request->category;
            }

            if ($request->religion === 'other') {
                $student->religion = $request->other_religion;
            } else {
                $student->religion = $request->religion;
            }

            if ($request->gender === 'other') {
                $student->gender = $request->other_gender;
            } else {
                $student->gender = $request->gender;
            }

            $student->save();
            Session::put(['student_id' => $student->id]);
            
            return response()->json(['success' => true, 'student_id' => $student->id]);
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error saving student data:', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'errors' => $e->getMessage()]);
        }

        // }
    }
    
    public function post_applicant_contact_data(Request $request){
        $data = $request->validate([
               
                'residence_address' =>'required|min:3|max:255',
                'country' => 'required|string|regex:/^[A-Za-z ]+$/',
                'state' => 'required',
                'city' => 'required',
                'pin_code' => 'required|digits:6',
               
            ],
                  
        );
        
        $student_id = session::get('student_id');

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
    
            return response()->json(['success' => true]);
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
            
            ],
                
        );
    
        $student_id = session::get('student_id');

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

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error saving student data:', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'errors' => $e->getMessage()]);
        }
    }
   
    public function post_applicant_document_data(Request $request)
    {
    $student_id = session::get('student_id');

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
        $student_id = session::get('student_id');

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
    
   
    return view('admin.applicant.meeting-status', compact('meeting_data'));
    }

    public function change_meeting_status(){
        return view('admin.applicant.change-meeting-status');
    }

    public function meeting_tracking(){
         // Example steps data
    $steps = [
        ['name' => 'New', 'date' => '01/01/2024', 'status' => 'completed'],
        ['name' => 'Accepted by Admin', 'date' => '02/01/2024', 'status' => 'completed'],
        ['name' => 'Meeting Schedule', 'date' => '03/01/2024', 'status' => 'completed'],
        ['name' => 'Accepted by Parent', 'date' => '00/00/0000', 'status' => 'completed'],
        ['name' => 'Approve by Parent', 'date' => '00/00/0000', 'status' => 'completed'],
        ['name' => 'Done', 'date' => '00/00/0000', 'status' => 'completed'],
    ];

        return view('admin.applicant.meeting-tracking',compact('steps'));
    }

    public function applicant_parent_list($id){
        // $studentDetails = Student::where('parent_id', $id)->get();

        $studentDetails = Student::select(
            'students.id',
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
        ->leftJoin('applicant_statuses', 'students.id', '=', 'applicant_statuses.student_id')
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

        $Language = Language::get();
        $lang = [];
        foreach($Language as $lng){
            $lang[] = $lng->name;
        }

        return view('admin.applicant.add-applicant',compact('lang','Language','BloodGroup','Religion','state','country','test','testing'));
    }

    public function parent_meeting_status(){
        return view('admin.applicant.parent-meeting-status');
    }

    public function parent_meeting_track(){
        $steps = [
            ['name' => 'New', 'date' => '01/01/2024', 'status' => 'completed'],
            ['name' => 'Accepted by Admin', 'date' => '02/01/2024', 'status' => 'completed'],
            ['name' => 'Meeting Schedule', 'date' => '03/01/2024', 'status' => 'completed'],
            ['name' => 'Accepted by Parent', 'date' => '00/00/0000', 'status' => 'completed'],
            ['name' => 'Approve by Parent', 'date' => '00/00/0000', 'status' => 'completed'],
            ['name' => 'Done', 'date' => '00/00/0000', 'status' => 'completed'],
        ];

        return view('admin.applicant.parent-meeting-track',compact('steps'));
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

        $student = new ApplicantStatus;
        $student->student_id = $request->student_id;
        $student->parent_id = $request->parent_id;
        $student->applicant_id = '1';
        $student->status = $request->status_update;
        $student->note = $request->note;
        $student->ip_address = '1';
        $student->created_by = 'null';

        $student->save();
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
                'username' => $parent_details->username,
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

    public function update_applicant_data($parent_id){
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

        $Language = Language::get();
        $lang = [];
        foreach($Language as $lng){
            $lang[] = $lng->name;
        }

        $parent = StudentParent::where('id',$parent_id)
                ->first();

        $student = Student::where('parent_id',$parent_id)
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
        
        return view('admin.applicant.update-applicant-data',compact('lang','Language','BloodGroup','Religion','state','country','test','testing','student','parent'));
        
    }
 
}
