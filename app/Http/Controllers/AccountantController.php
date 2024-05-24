<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountantController extends Controller
{
    public function accountant(){
        return view('admin.accountant-info.accountant');
    }

    public function view_accountant(){
        return view('admin.accountant-info.view-accountant');
    }

    public function edit_accountant(){
        return view('admin.accountant-info.edit-accountant');
    }

    public function admit_accountant(){
        return view('admin.accountant-info.admit-accountant');
    }

    public function delete_accountant(){
    }
}

