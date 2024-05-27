<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Country;
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

        $country=Country::get();
        return view('admin.student-info.admit-student',compact('country'));
    }

    public function view_student(){
        return view('admin.student-info.view-student');
    }
    public function edit_student(){
        return view('admin.student-info.edit-student');
    }

    public function delete_student(){
        return view('admin.student-info.students');
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
        //     'student_nationality' => 'required',
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
        $student->student_nationality = $request->student_nationality;
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
    
    


}
