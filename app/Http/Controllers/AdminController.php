<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function edit_admin(){
        $admin_id = auth()->user()->id;
       
        $admin_info = User::where('id',$admin_id)->first();

        return view('profile.edit-admin',compact('admin_info'));
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


        $admin_id = auth()->user()->id;
       
        $admin_info = User::where('id',$admin_id)->first();


        return view('profile.admin-edit',compact('test','testing','country','state','admin_info'));
    }


    public function update_admin_profile(Request $request,$id){
       
        $data = $request->validate([
            'name' =>'required|string|regex:/^[A-Za-z ]+$/',
            'gender' => 'required',
            'date_of_birth' => 'nullable|date|before:' . now()->toDateString(),
            'address'=>'required|string',
            'phone'=>'required|numeric|digits_between:10,12',
            'country'=>'required|string',
            'state'=>'required|string',
            'city'=>'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ], [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.regex' => 'The name may only contain letters and spaces.',
            'gender.required' => 'The gender field is required.',
            'date_of_birth.date' => 'The date of birth is not a valid date.',
            'date_of_birth.before' => 'The date of birth must be a date before today.',
            'address.required' => 'The address field is required.',
            'address.string' => 'The address must be a string.',
            'phone.required' => 'The contact number field is required.',
            'phone.numeric' => 'The contact number field must contain only digits.',
            'phone.digits_between' => 'The contact number must be between 10 and 12 digits.',
            'country.required' => 'The country field is required.',
            'country.string' => 'The country must be a string.',
            'state.required' => 'The state field is required.',
            'state.string' => 'The state must be a string.',
            'city.required' => 'The city field is required.',
            'city.string' => 'The city must be a string.',
            // 'image.required' => 'The image field is required.',
            'image.image' => 'The image must be a valid image file.',
            'image.mimes' => 'The image must be a file of type: jpg, png, jpeg.',
            'image.uploaded' => 'The image must not be greater than 2 MB.',
        ]);

    $user = User::find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'User not found.');
    }

    if ($request->hasFile('image')) {
        if (!is_null($user->image) && Storage::exists('public/student_photos/' . $user->image)) {
            Storage::delete('public/student_photos/' . $user->image);
        }

        $originalFileName = $request->file('image')->getClientOriginalName();
        $currentDateTime = now()->format('YmdHis');
        $profileImagePath = $request->file('image')->storeAs('public/student_photos', $currentDateTime . '_' . $originalFileName);
        $user->image = $currentDateTime . '_' . $originalFileName;
    }

    $user->update([
        'name' => $request->name,
        'gender' => $request->gender,
        'dob' => $request->date_of_birth,
        'address' => $request->address,
        'contact' => $request->phone,
        'country' => $request->country,
        'state' => $request->state,
        'city' => $request->city,
    ]);

    if ($user) {
        return redirect()->back()->with('status', 'Records Updated Successfully!');
    } else {
        return redirect()->back()->with('error', 'Error in Updating the Data. Try Again later.');
    }
}
}
