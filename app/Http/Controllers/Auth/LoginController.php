<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // $this->middleware('guest.webstudents')->except('logout');
        // $this->middleware('guest:webteachers')->except('logout');
        // $this->middleware('guest:webparents')->except('logout');
        // $this->middleware('guest:webaccountants')->except('logout');
    }

    // protected function authenticated(Request $request, $user)
    // {

    //     $credentials = $request->only('email', 'password');

    //     if (Auth::guard('webstudent')->attempt($credentials)) {
    //         if (Auth::guard('webstudent')->user()->role_id == 4) {
    //             return redirect()->route('student-dashboard');
    //         }
    //     }

    //     if (Auth::guard('webteachers')->attempt($credentials)) {
    //         if (Auth::guard('webteachers')->user()->role_id == 2) {
    //             return redirect()->route('teacher-dashboard');
    //         }
    //     }

    //     if (Auth::guard('webparents')->attempt($credentials)) {
    //         if (Auth::guard('webparents')->user()->role_id == 5) {
    //             return redirect()->route('parent-dashboard');
    //         }
    //     }

    //     if (Auth::guard('webaccountants')->attempt($credentials)) {
    //         if (Auth::guard('webaccountants')->user()->role_id == 3) {
    //             return redirect()->route('accountant-dashboard');
    //         }
    //     }

    //     return redirect($this->redirectTo);
    // }


    public function login(Request $request)
    {
        $loginField = $request->input('login');
        $password = $request->input('password');
    
        // Determine if the input is an email or username
        $field = filter_var($loginField, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
  
        // Attempt login based on the determined field
        $credentials = [
            $field => $loginField,
            'password' => $password,
        ];
    
      
        // Attempt login for different guards
        if (Auth::guard('webstudents')->attempt($credentials)) {
            if (Auth::guard('webstudents')->user()->role_id == 4) {
                return redirect()->route('student-dashboard');
            }
        } elseif (Auth::guard('webteachers')->attempt($credentials)) {
            if (Auth::guard('webteachers')->user()->role_id == 2) {
                return redirect()->route('teacher-dashboard');
            }
        } elseif (Auth::guard('webparents')->attempt($credentials)) {
            if (Auth::guard('webparents')->user()->role_id == 5) {
                return redirect()->route('parent-dashboard');
            }
        } elseif (Auth::guard('webaccountants')->attempt($credentials)) {
            if (Auth::guard('webaccountants')->user()->role_id == 3) {
                return redirect()->route('accountant-dashboard');
            }
        } elseif (Auth::guard('webadmissions')->attempt($credentials)) {
            if (Auth::guard('webadmissions')->user()->role_id == 6) {
                return redirect()->route('admission-dashboard');
            }
        } elseif (Auth::attempt($credentials)) {
            if (Auth::user()->role_id == 1) {
                return redirect('/dashboard');
            }
        }
    
        // If the authentication fails or the role is not correct, redirect to the login page
        return redirect('/')->withErrors(['email_or_username' => 'Your provided credentials could not be verified.']);
    }
    
}
