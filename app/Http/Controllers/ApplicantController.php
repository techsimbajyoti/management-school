<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\BloodGroup;
use App\Models\Language;
use App\Models\Religion;
use App\Models\State;
use App\Models\Country;
use App\Models\StudentParent;

class ApplicantController extends Controller
{
    public function applicant(){
        return view('pages.applicant');
    }

    public function applicant_list(){
        return view('admin.applicant.applicant-list');
    }

    public function view_applicant(){
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

        $Religion = Religion::get();
        $BloodGroup = BloodGroup::get();

        $Language = Language::get();
        $lang = [];
        foreach($Language as $lng){
            $lang[] = $lng->name;
        }

        return view('admin.applicant.view-applicant',compact('lang','Language','BloodGroup','Religion','state','country','test','testing'));
    }

    public function edit_applicant(){
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

        $Religion = Religion::get();
        $BloodGroup = BloodGroup::get();

        $Language = Language::get();
        $lang = [];
        foreach($Language as $lng){
            $lang[] = $lng->name;
        }
        
        return view('admin.applicant.edit-applicant',compact('lang','Language','BloodGroup','Religion','state','country','test','testing'));
    }

    public function applicant_profile(){
        return view('admin.applicant.applicant-profile');
    }

    public function schedule_meeting(){
        return view('admin.applicant.schedule-meeting');
    }

    public function post_applicant_data(Request $request){
        $step = $request->input('current_step', 1);

        // Validate data according to the current step
        $validatedData = $request->validate([
            'parent_name' => 'required_if:current_step,1|min:3|max:50',
            'email' => 'required_if:current_step,1|email',
            'contact_number' => 'required_if:current_step,2|numeric',
            'profession' => 'required_if:current_step,2|string',
            'office_address' => 'required_if:current_step,3|string',
        ]);

        // Save data incrementally based on the step
        if ($step == 1) {
            $applicant = new StudentParent;

            $applicant->father_name = $request->input('parent_name');
            $applicant->father_mobile = $request->input('contact_number');
            $applicant->email = $request->input('email');
            $applicant->password = $request->input('password');
            $applicant->father_profession = $request->input('profession');
            $applicant->office_number = $request->input('office_number');
            $applicant->office_address = $request->input('office_address');
            $applicant->applicant_id = $request->input('applicant');
            $applicant->role_id = $request->input('role_id');
            $applicant->status = $request->input('status');
            $applicant->created_by = 'null';

            $applicant->save();

        } elseif ($step == 2) {
            $applicant->father_profession = $request->input('profession');
            $applicant->father_mobile = $request->input('contact_number');
        } elseif ($step == 3) {
            $applicant->office_address = $request->input('office_address');
        }

        return response()->json(['success'=>'Candidate registered successfully','next_step' => $step + 1]);
    }
}
