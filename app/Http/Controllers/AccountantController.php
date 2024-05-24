<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountantController extends Controller
{
    public function accountant(){
        return view('admin.accountant-info.accountant');
    }
}

