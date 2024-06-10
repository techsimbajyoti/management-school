<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;

class AdminController extends Controller
{
    public function edit_admin(){
        return view('profile.edit-admin');
    }

    public function admin_edit(){
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

        return view('profile.admin-edit',compact('test','testing','country','state'));
    }
}
