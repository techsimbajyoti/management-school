<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;

class HomeController extends Controller
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
            }elseif ($user && $user->role_id == 6) { 
                // If the user's role_id is not 1, add the 'webcontactuser' middleware
                $this->middleware('webadmissions');
            }else{
                $this->middleware('auth');
            }

            return $next($request);
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.dashboard');
    }

    public function student_dashboard()
    {
        return view('students.students-dashboard');
    }

    public function change_password()
    {
        return view('admin.change-password');
    }


    public function parent_dashboard()
    {
        return view('parents.parents');
    }

    public function teacher_dashboard()
    {
        return view('teachers.teachers');
    }

    public function accountant_dashboard()
    {
        return view('accountants.accountants');
    }

    public function admission_dashboard()
    {
        return view('admissions.admissions');
    }

    public function gallery_category(){
        return view('admin.gallery.gallery-category');
    }

    public function image(){
        return view('admin.gallery.image');
    }

    public function add_gallery_category(){
        return view('admin.gallery.add-gallery-category');
    }

    public function edit_gallery_category(){
        return view('admin.gallery.edit-gallery-category');
    }

    public function delete_gallery_category(){
        // return view('admin.gallery.add-gallery-category');
    }

    public function add_image(){
        return view('admin.gallery.add-image');
    }

    public function edit_image(){
        return view('admin.gallery.edit-image');
    }

    public function delete_image(){
        
    }

    public function add_event(){
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

        return view('admin.event.add-event',compact('test','testing','country','state'));
    }

    public function calender(){
        return view('admin.event.calender');
    }

    public function type(){
        return view('admin.examination.type');
    }

    public function marks_grade(){
        return view('admin.examination.marks-grade');
    }

    public function add_type(){
        return view('admin.examination.add-type');
    }

    public function edit_type(){
        return view('admin.examination.edit-type');
    }

    public function delete_type(){
        // return view('admin.examination.delete_type');
    }

    public function add_marks_grade(){
        return view('admin.examination.add-marks-grade');
    }

    public function edit_mark_grade(){
        return view('admin.examination.edit-marks-grade');
    }

    public function delete_mark_grade(){
      
    }

    public function exam_assign(){
        return view('admin.examination.exam-assign');
    }

    public function mark_register(){
        return view('admin.examination.mark-register');
    }

    public function settings(){
        return view('admin.examination.settings');
    }

    public function add_exam_assign(){
        return view('admin.examination.add-exam-assign');
    }

    public function edit_exam_assign(){
        return view('admin.examination.edit-exam-assign');
    }

    public function delete_exam_assign(){
        
    }

    public function add_mark_register(){
        return view('admin.examination.add-mark-register');
    }

    public function edit_mark_register(){
        return view('admin.examination.edit-mark-register');
    }

    public function delete_mark_register(){
        return view('admin.examination.delete-mark-register');
    }

    public function edit_inactive_student(){
        return view('admin.student-info.edit-inactive-student');
    }

    public function view_image(){
        return view('admin.gallery.view-image');
    }

    public function lecture_plan(){
        return view('admin.academic.lecture-plan');
    }

    public function view_video(){
        return view('admin.gallery.view-video');
    }

    public function video(){
        return view('admin.gallery.video');
    }

    public function add_video(){
        return view('admin.gallery.add-video');
    }

    public function edit_video(){
        return view('admin.gallery.edit-video');
    }

    public function delete_video(){
        
    }

    public function admin_event(){
        return view('admin.event.admin-event');
    }

    public function edit_admin_event(){
        return view('admin.event.edit-admin-event');
    }

    public function admin_event_detail_view(){
        return view('admin.event.admin-event-detail-view');
    }
}
