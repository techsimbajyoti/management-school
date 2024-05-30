<?php

namespace App\Http\Controllers;
use App\Models\Accountant;
use App\Models\Country;
use Session;
use Auth;
use Hash;
use Http;

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

    public function accountant_edit(){
        $country = Country::get();
        return view('accountants.accountant-edit',compact('country'));
    }
    public function manage_fees(){
        return view('accountants.manage-fees');
    }

    public function accountant_report(){
        return view('accountants.accountant-report');
    }

    public function accountant_fees_challans(){
        return view('accountants.accountant-fees-challans');
    }
    public function add_fees(){
        return view('accountants.add-fees');
    }

}

