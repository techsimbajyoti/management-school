<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\Currency;

class SettingController extends Controller
{
    public function general_setting(){
        $country = Country::get();

        $currency = Currency::get();
        $current = [];
        foreach($currency as $currencies){
            $current[] = $currencies->name;
        }

        $test = [];
        foreach($country as $count){
            $test[] = $count->country;
        }
        $state = State::get();
        
        $testing = [];
        foreach($state as $sta){
            $testing[] = $sta->state;
        }

        return view('admin.settings.general-setting',compact('current','test','testing','country','state'));
    }
}
