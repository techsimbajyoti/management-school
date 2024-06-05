<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function general_setting(){
        return view('admin.settings.general-setting');
    }
}
