<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeesController extends Controller
{
    public function group(){
        return view('admin.fees.group');
    }

    public function type(){
        return view('admin.fees.type');
    }

    public function master(){
        return view('admin.fees.master');
    }

    public function assign(){
        return  view('admin.fees.assign');
    }

    public function collect(){
        return  view('admin.fees.collect');
    }

    public function add_fees_group(){
        return  view('admin.fees.add-fees-group');
    }

    public function edit_fees_group(){
        return view('admin.fees.edit-fees-group');
    }

    public function delete_fees_group(){
        return view('admin.fees.delete-fees-group');
    }

    public function add_fees_type(){
        return  view('admin.fees.add-fees-type');
    }

    public function edit_fees_type(){
        return  view('admin.fees.edit-fees-type');
    }

    public function delete_fees_type(){
        // return  view('admin.fees.delete-fees-group');
    }

    public function add_master(){
        return  view('admin.fees.add-master');
    }

    public function add_fees_assign(){
        return  view('admin.fees.add-fees-assign');
    }

    public function student_payment(){
        return view('admin.fees.student-payment');
    }

    public function admin_manage_payment(){
        return view('admin.fees.admin-manage-payment');
    }
}
