<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Country;
use App\Models\State;
use App\Models\Religion;
use App\Models\BloodGroup;
use App\Models\Language;
use Session;
use Auth;
use Hash;
use Http;

class StudentController extends Controller
{
    public function students(){
        return view('admin.student-info.students');
    }


    public function admit_student(){
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

        return view('admin.student-info.admit-student',compact('Language','BloodGroup','Religion','test','testing','country','state'));
    }

    public function view_student(){
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
        return view('admin.student-info.view-student',compact('Language','BloodGroup','Religion','test','testing','country','state'));
    }
    public function edit_student(){
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
        
        return view('admin.student-info.edit-student',compact('Language','BloodGroup','Religion','test','testing','country','state'));
    }

    public function delete_student(){
        return view('admin.student-info.students');
    }

    public function student_edit(){
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
        
        return view('students.edit-student',compact('Language','BloodGroup','Religion','test','testing','country','state'));
    }


    public function post_admit_student(Request $request){
        // $validated = $request->validate([
        //     'admission_no' => 'required',
        //     'first_name' => 'required|string|max:255|regex:/^[A-Za-z\s]+$/',
        //     'last_name' => 'required|string|max:255|regex:/^[A-Za-z\s]+$/',
        //     'mobile' => 'required|min:10|max:12',
        //     'email' => 'required|email',
        //     'password' => 'required',
        //     'class' => 'required',
        //     'section' => 'required',
        //     'date_of_birth' => 'required|date|before_or_equal:' . now()->toDateString(),
        //     'religion' => 'required',
        //     'gender' => 'required',
        //     'category' => 'required',
        //     'blood_group' => 'required',
        //     'admission_date' => 'required|date',
        //     'image' => 'required|image|mimes:jpg,png,jpeg|max:1024',
        //     'parent_name' => 'required|string|max:255|regex:/^[A-Za-z\s]+$/',
        //     'parent_mobile' => 'required|min:10|max:12',
        //     'place_of_birth' => 'required',
        //     'country' => 'required',
        //     'CPR_number' => 'required',
        //     'student_language' => 'required',
        //     'residence_address' => 'required|min:3|max:255',
        //     'document' => 'required|mimes:doc,pdf,docx,jpg,png,jpeg|max:1024',
        // ]);
    
        $student = new Student;
    
        if ($request->hasFile('image')) {
            $originalFileName = $request->file('image')->getClientOriginalName();
            $currentDateTime = now()->format('YmdHis');
            $profileImagePath = $request->file('image')->storeAs('public/student_photos', $currentDateTime . '_' . $originalFileName);
            $student->image = 'storage/student_photos/' . $currentDateTime . '_' . $originalFileName;
        } else {
            $student->image = null;
        }
        
        if ($request->hasFile('document')) {
            $originalFileName = $request->file('document')->getClientOriginalName();
            $currentDateTime = now()->format('YmdHis');
            $documentPath = $request->file('document')->storeAs('public/student_documents', $currentDateTime . '_' . $originalFileName);
            $student->document = $documentPath;
        } else {
            $student->document = null;
        }
        
        $student->admission_no = $request->admission_no;
        $student->roll_no = '2';
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->mobile = $request->mobile;
        $student->email = $request->email;
        $student->password = bcrypt($request->password);
        $student->class = $request->class;
        $student->section = $request->section;
        $student->date_of_birth = $request->date_of_birth;
        $student->religion = $request->religion;
        $student->gender = $request->gender;
        $student->category = $request->category;
        $student->blood_group = $request->blood_group;
        $student->admission_date = $request->admission_date;
        $student->parent_name = $request->parent_name;
        $student->parent_mobile = $request->parent_mobile;
        $student->place_of_birth = $request->place_of_birth;
        $student->country = $request->country;
        $student->CPR_number = $request->CPR_number;
        $student->student_language = $request->student_language;
        $student->residence_address = $request->residence_address;
        $student->image = $request->image;
        $student->document = $request->document;
        $student->status = 'active';
        $student->role_id = Auth::user()->id;
        $student->created_by = Auth::user()->id;
      
        
        
        $student->save();
        
        if ($student) {
            return redirect()->back()->with('status', 'Student Registered Successfully!!');
        } else {
            return redirect()->back()->with('status', 'Oops!! Registration Failed');
        }
    }

    public function disabled_students(){
        return view('admin.student-info.disabled-students');
    }


    public function promote_students(){
        return view('admin.student-info.promote-students');
    }
    
    public function student_parent_profile(){
        return view('students.student-parent-profile');
    }

    public function student_exam(){
        return view('students.student-exam');
    }

    public function student_attendance(){
        return view('students.student-attendance');
    }

    public function student_marksheet(){
        return view('students.student-marksheet');
    }

    public function student_event(){
        return view('students.student-event');
    }

    public function student_gallary(){
        return view('students.student-gallary');
    }

    public function view_student_image(){
        return view('students.view-student-image');
    }


    public function student_notification(){
        return view('students.student-notification');
    }

    public function student_message(){
        return view('students.student-message');
    }

    public function json_state(Request $request)
    {
        $states = State::where("id",$request->state_id)->first();
        $data['states'] = Country::where("id",$states->country_id)->get(["id", "country"]);
        return response()->json($data);
      
    }

    public function admin_student_profile(){
        return view('admin.student-info.student-profile');
    }


    public function subject(){
        return view('students.subject');
    }

    public function class_routine(){
        return view('students.class-routine');
    }
}
