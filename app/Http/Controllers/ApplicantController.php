<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\BloodGroup;
use App\Models\Language;
use App\Models\Religion;
use App\Models\State;
use App\Models\Country;

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
        $request->validate([
            'parent_name' => 'required|min:3|max:50',
            'email' => 'email',
            'password' => 'required|confirmed|min:6',
        ]);
    
        // Process the form data and save to the database
        $data = $request->all();
    
        // Assuming you have a model named `Applicant`
        $applicant = new Applicant();
        $applicant->parent_name = $data['parent_name'];
        $applicant->email = $data['email'];
        $applicant->password = bcrypt($data['password']);
        $applicant->save();
    
        // Handle the different actions
        if ($request->input('action') == 'save-continue') {
            // Redirect to the next step in the process
            return redirect()->route('next-step')->with('success', 'Data saved successfully, continue to the next step.');
        } else {
            // Redirect to a different page or show a success message
            return redirect()->route('applicant-form')->with('success', 'Data saved successfully.');
        }
    }
}
