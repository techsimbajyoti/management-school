<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function parents(){
        return view('admin.parent-info.parents');
    }

    public function admit_parents(){
        return view('admin.parent-info.admit-parents');
    }

    public function view_parents(){
        return view('admin.parent-info.view-parents');
    }

    public function edit_parents(){
        return view('admin.parent-info.edit-parents');
    }

    public function delete_parents(){
    }

    public function view_teachers(){
        return view('admin.teacher-info.view-teachers');
    }

    public function edit_teachers(){
        return view('admin.teacher-info.edit-teachers');
    }

    public function delete_teachers(){
    }
}

