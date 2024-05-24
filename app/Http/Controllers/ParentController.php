<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function parents(){
        return view('admin.parent-info.parents');
    }
}

