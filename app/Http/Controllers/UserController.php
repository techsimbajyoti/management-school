<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\Country;
use App\Models\State;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function edit_admin_profile(){
        return view('admin.edit-admin-profile');
    }


    public function designation(){
        return view('admin.designation');
    }

    public function add_designation(){
        return view('admin.add-designation');
    }

    public function edit_designation(){
        return view('admin.edit-designation');
    }

    public function delete_designation(){
        // return view('admin.delete-designation');
    }

    public function department(){
        return view('admin.department');
    }

    public function add_department(){
        return view('admin.add-department');
    }

    public function edit_department(){
        return view('admin.edit-department');
    }

    public function delete_department(){
        // return view('admin.department');
    }

    public function class(){
        return view('admin.academic.class');
    }

    public function add_class(){
        return view('admin.academic.add-class');
    }

    public function edit_class(){
        return view('admin.academic.edit-class');
    }

    public function delete_class(){
        // return view('admin.academic.edit-class');
    }

    public function section(){
        return view('admin.academic.section');
    }

    public function subject(){
        return view('admin.academic.subject');
    }

    public function assign_subject(){
        return view('admin.academic.assign-subject');
    }

    public function add_section(){
        return view('admin.academic.add-section');
    }

    public function edit_section(){
        return view('admin.academic.edit-section');
    }

    public function delete_section(){
        // return view('admin.academic.section');
    }

    public function add_subject(){
        return view('admin.academic.add-subject');
    }

    public function edit_subject(){
        return view('admin.academic.edit-subject');
    }

    public function delete_subject(){
        // return view('admin.academic.subject');
    }

    public function add_subject_assign(){
        return view('admin.academic.add-subject-assign');
    }

    public function edit_subject_assign(){
        return view('admin.academic.edit-subject-assign');
    }

    public function delete_subject_assign(){
        // return view('admin.academic.add-section');
    }

    public function admin_attendance(){
        return view('admin.attendance.attendance');
    }

    public function admin_attendance_report(){
        return view('admin.attendance.admin-attendance-report');
    }
    public function shift(){
        return view('admin.academic.shift');
    }

    public function add_shift(){
        return view('admin.academic.add-shift');
    }

    public function edit_shift(){
        return view('admin.academic.edit-shift');
    }

    public function delete_shift(){
        return view('admin.academic.shift');
    }

    public function class_setup(){
        return view('admin.academic.class-setup');
    }

    public function add_class_setup(){
        return view('admin.academic.add-class-setup');
    }

    public function edit_class_setup(){
        return view('admin.academic.edit-class-setup');
    }
    public function delete_class_setup(){
        return view('admin.academic.lass-setup');
    }

    public function json_country(Request $request)
    {
        $country = Country::where('country', $request->country_id)->first();
        if ($country) {
            $states = State::where('country_id', $country->id)->get(['id', 'state']);
            return response()->json(['states' => $states]);
        } else {
            return response()->json(['states' => []]);
        }
    }

}
