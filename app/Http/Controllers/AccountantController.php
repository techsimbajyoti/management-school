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
    public function manage_payment(){
        return view('accountants.manage-payment');
    }
    public function student_payment(){
        return view('accountants.student-payment');
    }

    public function accountant_gallery(){
        return view('accountants.accountant-gallery');
    }

    public function accountant_event(){
        return view('accountants.accountant-event');
    }

    public function accountant_student(){
        return view('accountants.accountant-student');
    }

    public function accountant_teacher(){
        return view('accountants.accountant-teacher');
    }
    public function accountant_event_detail_view(){
        return view('accountants.accountant-event-detail-view');
    }

    public function view_accountant_image(){
        return view('accountants.view-accountant-image');
    }
    public function view_accountant_video(){
        return view('accountants.view-accountant-video');
    }
    public function accountant_general_info_student(){
        return view('accountants.accountant-general-info-student');
    }
    
    public function view_payment_info(){
        return view('accountants.view-payment-info');
    }
  
    public function view_teachers_detail(){
        return view('accountants.view-teachers-detail');
    }
}





