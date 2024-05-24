<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function teachers(){
        return view('admin.teacher-info.teacher');
    }
}

