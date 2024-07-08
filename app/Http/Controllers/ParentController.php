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
        $country = Country::get();

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

        return view('admin.parent-info.admit-parents',compact('test','testing','country','state'));
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
    
    public function parent_event(){
        
        return view('parents.parent-event');

    }
    
    public function parent_gallary(){
        
        return view('parents.parent-gallary');

    }

    public function view_parent_image(){
        
        return view('parents.view-parent-image');

    }
    public function view_parent_video(){
        
        return view('parents.view-parent-video');

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

    public function parent_profile_view(){
        return view('admin.parent-info.parent-profile-view');
    }
   
    public function parent_view_event(){
        return view('parents.parent-view-event');
    }

    public function detail_student_parent(){
        return view('parents.detail-student-parent');
    }

    public function student_subject(){
        return view('parents.student-subject');
    }

    public function student_class_routine(){
        return view('parents.student-class-routine');
    }


}

