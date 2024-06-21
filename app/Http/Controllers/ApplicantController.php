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

class ApplicantController extends Controller
{
    public function applicant(){
        return view('pages.applicant');
    }

    public function applicant_list(){
        
        return view('admin.applicant.applicant-list');
    }

    public function view_applicant(){
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

        return view('admin.applicant.view-applicant',compact('lang','Language','BloodGroup','Religion','state','country','test','testing'));
    }

    public function edit_applicant(){
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
        
        return view('admin.applicant.edit-applicant',compact('lang','Language','BloodGroup','Religion','state','country','test','testing'));
    }

    public function applicant_profile(){
        return view('admin.applicant.applicant-profile');
    }

    public function schedule_meeting(){
        return view('admin.applicant.schedule-meeting');
    }

    public function post_applicant_data(Request $request){
        
        $validatedData = $request->validate([
            'parent_name' => 'required|string|regex:/^[A-Za-z ]+$/',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password',
            'contact_number' => 'required|digits_between:10,15',
            'profession' => 'nullable|string|regex:/^[A-Za-z ]+$/',
        ]);
      
        // \Log::info('Validated Data:', ['data' => $data]);
   
        $applicant = new StudentParent;

        
        $email_exit = StudentParent::where('email', $request->email)->first();

        if($email_exit){
            return response()->json(['success'=>'true','action'=>$request->action]);
        }else{
      

        $randomApplicantId = Str::random(5);
                
        $applicant->father_name = $request->parent_name;
        $applicant->father_mobile = $request->contact_number;
        $applicant->email = $request->email;
        $applicant->password = Hash::make($request->password);
        $applicant->father_profession = $request->profession;
        $applicant->applicant_id = $randomApplicantId;
        $applicant->role_id = $request->role_id;
        $applicant->status = $request->status;
        $applicant->created_by = 'null';

        $applicant->save();
        Session::put('parent_id',$applicant->id);
        Session::put('applicant_id',$applicant->applicant_id);
        return response()->json(['success'=>'true','action'=>$request->action]);
        }
    }

    public function post_applicant_student_data(Request $request){
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
            'image' => 'required|image|mimes:jpg,png,jpeg|max:1024',
        ]);
    
       
        
        $parent_id = Session::get('parent_id');
        $applicant_id = Session::get('applicant_id');
        try {
            $student = new Student;
    
            if ($request->hasFile('image')) {
                $originalFileName = $request->file('image')->getClientOriginalName();
                $currentDateTime = now()->format('YmdHis');
                $profileImagePath = $request->file('image')->storeAs('public/student_photos', $currentDateTime . '_' . $originalFileName);
                $student->image = $originalFileName;
            } else {
                $student->image = null;
            }
    
            $randomPassword = Str::random(8);
            $hashPassword = Hash::make($randomPassword);

            $randomUsername = Str::random(8);

            $student->first_name = $request->first_name;
            $student->last_name = $request->last_name;
            $student->user_name = $randomUsername;
            $student->password = $hashPassword;
            $student->gender = $request->gender;
            $student->class = $request->class;
            $student->date_of_birth = $request->date_of_birth;
            $student->blood_group = $request->blood_group;
            $student->religion = $request->religion;
            $student->category = $request->category;
            $student->student_language = $request->student_language;
            $student->previous_school = $request->previous_school;
            $student->parent_id = $parent_id;
            $student->applicant_id = $applicant_id;
            $student->role_id = $request->role_id;
            $student->status = $request->status;
            $student->created_by = 'null';

            $student->save();
            Session::put(['student_id' => $student->id]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error saving student data:', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'errors' => $e->getMessage()]);
        }
    }
    
    public function post_applicant_contact_data(Request $request){
        $data = $request->validate([
               
                'residence_address' =>'required|string|regex:/^[A-Za-z ]+$/',
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
                    'file' => $originalFileName,
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


    public function meeting_status(){
     return view('admin.applicant.meeting-status');
    }

    public function change_meeting_status(){
        return view('admin.applicant.change-meeting-status');
    }

    public function meeting_tracking(){
        return view('admin.applicant.meeting-tracking');
    }

    public function applicant_parent_list(){
        return view('admin.applicant.applicant-parent-list');
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
        return view('admin.applicant.parent-meeting-track');
    }
 
 
}
