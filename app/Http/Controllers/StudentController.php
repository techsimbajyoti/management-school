<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function students(){
        return view('admin.student-info.students');
    }


    public function admit_student(){
        return view('admin.student-info.admit-student');
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

    public function student_edit(){
        return view('students.edit-student');
    }
}
