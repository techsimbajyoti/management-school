<?php

namespace App\Http\Controllers;
use App\Models\Country;
use App\Models\State;
use App\Models\Religion;
use App\Models\BloodGroup;
use App\Models\Language;
use Session;
use Auth;
use Hash;
use Http;

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

    public function student_profile(){
        $country=Country::get();
 
        $test = [];
        foreach($country as $count){
            $test[] = $count->country;
        }
        $state = State::get();
        $testing = [];
        foreach($state as $sta){
            $testing[] = $sta->state;
        }
        $country = Country::get(['id','country']);
        $state = State::get(['id','state']);


        $Religion = Religion::get();
        $BloodGroup = BloodGroup::get();
        $Language = Language::get();
        return view('parents.view-student-profile',compact('Language','BloodGroup','Religion','test','testing','country','state'));

    }

     
    public function edit_parent_profile(){
        
        return view('parents.edit-parent-profile');

    }

    public function edit_parent(){
        
        return view('parents.edit-parent');

    }

    public function student_fees(){
        
        return view('parents.student-fees');

    }
    public function marksheet(){
        
        return view('parents.marksheet');

    }
    
    public function events(){
        
        return view('parents.events');

    }
    
    public function gallary(){
        
        return view('parents.gallary');

    }
    
    public function attendance(){
        
        return view('parents.attendance');

    }
    
    public function messages(){
        
        return view('parents.messages');

    }
    
    public function exam_routine(){
        
        return view('parents.exam');

    }
    
}

