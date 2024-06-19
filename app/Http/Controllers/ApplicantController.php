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
        // $data = $request->validate([
        //         'parent_name' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z\s]+$/'],
        //         'email' => 'required|email',
        //         'password' => 'required',
        //         'password_confirmation' => 'required|confirmed',
        //         'contact_number' => 'required|min:10|max:10',
        //         'profession' => 'required',
        //         'office_number' => 'required|min:10|max:10',
        //         'office_address' => 'required|min:3|max:255|',
        //         'role_id'=>'required',
        //         'applicant_id' => 'required',
        //         'status' => 'required',
        //         'created_by' => 'required',
        //     ],
        //     [
        //     'parent_name.regex' => 'The name field is required and must contain only letters and spaces.',
        //     ]           
        // );
        
        $applicant = new StudentParent;

        $applicant->father_name = $request->parent_name;
        $applicant->father_mobile = $request->contact_number;
        $applicant->email = $request->email;
        $applicant->password = $request->password;
        $applicant->father_profession = $request->profession;
        $applicant->office_number = $request->office_number;
        $applicant->office_address = $request->office_address;
        $applicant->applicant_id = $request->applicant_id;
        $applicant->role_id = $request->role_id;
        $applicant->status = $request->status;
        $applicant->created_by = 'null';

        $applicant->save();
        Session::put('parent_id',$applicant->id);
        return response()->json(['success'=>'true','action'=>$request->action]);
    }

    public function post_applicant_student_data(Request $request){
        // $data = $request->validate([
        //         'first_name' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z\s]+$/'],
        //         'last_name' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z\s]+$/'],
        //         'email' => 'required|email',
        //         'gender' => 'required',
        //         'class' => 'required|confirmed',
        //         'date_of_birth' => 'required',
         //         'image' => 'required|image|mimes:jpg,png,jpeg|max:1024',
        //         'role_id'=>'required',
        //         'applicant_id' => 'required',
        //         'status' => 'required',
        //         'created_by' => 'required',
        //     ],
        //     [
        //     'first_name.regex' => 'The first name field is required and must contain only letters and spaces.',
        //     'last_name.regex' => 'The last name field is required and must contain only letters and spaces.',
        //     ]           
        // );
        // dd($request->all());
        
        
        $parent_id = Session::get('parent_id');

        try {
            $student = new Student;
    
            if ($request->hasFile('image')) {
                $originalFileName = $request->file('image')->getClientOriginalName();
                $currentDateTime = now()->format('YmdHis');
                $profileImagePath = $request->file('image')->storeAs('public/student_photos', $currentDateTime . '_' . $originalFileName);
                $student->image = 'storage/student_photos/' . $currentDateTime . '_' . $originalFileName;
            } else {
                $student->image = null;
            }
    
            $student->first_name = $request->first_name;
            $student->last_name = $request->last_name;
            $student->email = $request->email;
            $student->gender = $request->gender;
            $student->class = $request->class;
            $student->date_of_birth = $request->date_of_birth;
            $student->blood_group = $request->blood_group;
            $student->religion = $request->religion;
            $student->category = $request->category;
            $student->student_language = $request->student_language;
            $student->parent_id = $parent_id;
            $student->applicant_id = $request->applicant_id;
            $student->role_id = $request->role_id;
            $student->status = $request->status;
            $student->created_by = 'null';

            $student->save();
            session(['student_id' => $student->id]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error saving student data:', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'errors' => $e->getMessage()]);
        }
    }
    
    public function post_applicant_contact_data(Request $request){
        // $data = $request->validate([
               
        //         'address' => 'required',
        //         'country' => 'required',
        //         'state' => 'required',
        //         'city' => 'required',
        //         'pin_code' => 'required|digits:6',
        //         'mobile' => 'required|digits:10',
        //         'parent_mobile' => 'required|digits:10',
        //     ],
                  
        // );
        // dd($request->all());
         
        $student_id = session('student_id');

        if (is_null($student_id)) {
          return response()->json(['success' => false, 'errors' => 'Student ID not found']);
         }
        try {
            
            $student = Student::findOrFail($student_id);
            
            $student->address = $request->address;
            $student->country = $request->country;
            $student->state = $request->state;
            $student->city = $request->city;
            $student->pin_code = $request->pin_code;
            $student->mobile = $request->mobile;
            $student->parent_mobile = $request->parent_mobile;
                    
    
            $student->save();
    
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error saving student data:', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'errors' => $e->getMessage()]);
        }
    }
   
            public function post_applicant_document_data(Request $request){
            
                $student_id = session('student_id');

                if (is_null($student_id)) {
                return response()->json(['success' => false, 'errors' => 'Student ID not found']);
                }
                try {
                    
                    if ($request->hasFile('document')) {
                        $originalFileName = $request->file('document')->getClientOriginalName();
                        $currentDateTime = now()->format('YmdHis');
                        $documentPath = $request->file('document')->storeAs('public/student_documents', $currentDateTime . '_' . $originalFileName);
                        $student->document = $documentPath;
                    } else {
                        $student->document = null;
                    }
                                        
            
                    $student->save();
            
                    return response()->json(['success' => true]);
                } catch (\Exception $e) {
                    // Log the error for debugging
                    \Log::error('Error saving student data:', ['error' => $e->getMessage()]);
                    return response()->json(['success' => false, 'errors' => $e->getMessage()]);
                }
            }



        public function meeting_status(){
            return view('admin.applicant.meeting-status');
        }

 
}
