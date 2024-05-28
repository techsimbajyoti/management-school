<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function teachers(){
        return view('admin.teacher-info.teacher');
    }

    public function view_teachers(){
        return view('admin.teacher-info.view-teachers');
    }

    public function edit_teachers(){
        return view('admin.teacher-info.edit-teachers');
    }

    public function admit_teachers(){
        return view('admin.teacher-info.admit-teachers');
    }

    public function delete_teachers(){
    }

    public function edit_teacher(){
        return view('teachers.edit-teacher');
    }


}

