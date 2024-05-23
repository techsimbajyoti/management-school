<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $user = auth()->user();

            // Check if the user's role_id is 1 (example)
            if ($user && $user->role_id == 2) {
                // If the user's role_id is 1, add the 'webfranchiseuser' middleware
                $this->middleware('webteachers');
            } elseif ($user && $user->role_id == 3) { 
                // If the user's role_id is not 1, add the 'webcontactuser' middleware
                $this->middleware('webaccountants');
            }elseif ($user && $user->role_id == 4) { 
                // If the user's role_id is not 1, add the 'webcontactuser' middleware
                $this->middleware('webstudents');
            }elseif ($user && $user->role_id == 5) { 
                // If the user's role_id is not 1, add the 'webcontactuser' middleware
                $this->middleware('webparents');
            }else{
                $this->middleware('auth');
            }

            return $next($request);
        });
    }

    /**
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function index(string $page)
    {
        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}");
        }

        return abort(404);
    }
}
