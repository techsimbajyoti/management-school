<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentParent;
use App\Models\Student;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
Use Str;
Use Hash;
use Session;
use Illuminate\Auth\Events\PasswordReset;

class VerificationController extends Controller
{
    public function verifyRegistration($applicantId)
    {
        // Perform verification logic here, e.g., mark applicant as verified
        $applicant = StudentParent::where('applicant_id', $applicantId)->firstOrFail();
        $applicant->verified = true; // Example logic, adjust as per your requirements
        $applicant->save();

        // Redirect to a thank you page or display a confirmation message
        return view('verification.thank_you');
    }

    public function show()
    {
        // Validate the request
        $attributes = request()->validate([
            'email' => 'required|email',
        ]);
    
        // Check if a user with the provided email exists for each guard
        $user = null;
        $guard = 'users'; // Default guard
    
        if ($user = User::where('email', $attributes['email'])->first()) {
            // User found in default guard (admin)
            $guard = '';
        } elseif ($user = StudentParent::where('email', $attributes['email'])->first()) {
            // User found in webparents guard
            $guard = 'parents';
        } elseif ($user = Student::where('email', $attributes['email'])->first()) {
            // User found in webstudents guard
            $guard = 'students';
        } elseif ($user = Teacher::where('email', $attributes['email'])->first()) {
            // User found in webstudents guard
            $guard = 'teachers';
        } elseif ($user = Accountant::where('email', $attributes['email'])->first()) {
            // User found in webstudents guard
            $guard = 'accountants';
        }
    
        // If user is found, send password reset email
        if ($user) {
            // Send password reset link
            $status = Password::broker($guard)->sendResetLink(
                ['email' => $attributes['email']]
            );
    
            return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
        }
    
        // If user is not found, return with error
        return back()->withErrors(['email' => 'User not found']);
    }
    
    
    
    
    public function update()
    {
        // Validate the request
        request()->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
    
        // Determine the guard based on the email
        $email = request('email');
        $guard = null;
    
        if (User::where('email', $email)->exists()) {
            $guard = ''; // Default guard for admin
        } elseif (StudentParent::where('email', $email)->exists()) {
            $guard = 'parents'; // Guard for parents
        } elseif (Student::where('email', $email)->exists()) {
            $guard = 'students'; // Guard for students
        } elseif (Teacher::where('email', $email)->exists()) {
            $guard = 'teachers'; // Guard for teachers
        } elseif (Accountant::where('email', $email)->exists()) {
            $guard = 'accountants'; // Guard for accountants
        }
    
        if ($guard === null) {
            return back()->withErrors(['email' => ['No user found with this email address.']]);
        }
    
        // Use the identified guard to reset the password
        $status = Password::broker($guard)->reset(
            request()->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                event(new PasswordReset($user));
            }
        );
    
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
    
}


