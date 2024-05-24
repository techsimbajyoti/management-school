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
}
