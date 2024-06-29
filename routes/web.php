<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\AccountantController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\FeesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\ChangePassword;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();


Route::post('verify', [VerificationController::class, 'show'])->middleware('guest');
Route::post('reset-password', [VerificationController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', function () {
	return view('auth.passwords.email');
})->middleware('guest')->name('verify'); 

Route::get('/reset-password/{token}', function ($token) {
	return view('auth.passwords.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');


Route::get('/verify-registration/{applicant_id}', [App\Http\Controllers\VerificationController::class, 'verifyRegistration'])->name('verify.registration');

// Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');

Route::get('register', 'App\Http\Controllers\Auth\RegisterController@register')->name('register');

Route::post('json-state', [UserController::class, 'json-state'])->name('json-state');

Route::post('json-country', [UserController::class, 'json_country'])->name('json-country');

Route::post('post-applicant-data',[ApplicantController::class,'post_applicant_data'])->name('post-applicant-data');

Route::post('post-applicant-student-data',[ApplicantController::class,'post_applicant_student_data'])->name('post-applicant-student-data');

Route::post('post-applicant-contact-data',[ApplicantController::class,'post_applicant_contact_data'])->name('post-applicant-contact-data');

Route::post('post-applicant-document-data',[ApplicantController::class,'post_applicant_document_data'])->name('post-applicant-document-data');

Route::get('students/{id}/documents', [ApplicantController::class, 'showApplicantDocuments'])->name('students.documents');

Route::delete('delete-applicant/{id}', [ApplicantController::class, 'delete_applicant'])->name('delete-applicant');

Route::post('/clear-session', [ApplicantController::class, 'clearSession'])->name('clear-session');


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

	Route::get('admin-download-profile',[ApplicantController::class, 'download_profile'])->name('admin-download-profile');

	Route::get('applicant', [ApplicantController::class, 'applicant'])->name('applicant');

	Route::get('applicant-list', [ApplicantController::class, 'applicant_list'])->name('applicant-list');

	Route::get('view-applicant/{id}', [ApplicantController::class, 'view_applicant'])->name('view-applicant');

	Route::get('edit-applicant/{id}', [ApplicantController::class, 'edit_applicant'])->name('edit-applicant');

	Route::post('update-applicant/{id}', [ApplicantController::class, 'update_applicant'])->name('update-applicant');

	Route::post('update-student-applicant/{id}', [ApplicantController::class, 'update_student_applicant'])->name('update-student-applicant');

	Route::post('update-contact-applicant/{id}', [ApplicantController::class, 'update_contact_applicant'])->name('update-contact-applicant');

	Route::post('update-document-applicant/{id}', [ApplicantController::class, 'update_document_applicant'])->name('update-document-applicant');

	Route::get('edit-admin', [AdminController::class, 'edit_admin'])->name('edit-admin');

	Route::get('admin-edit', [AdminController::class, 'admin_edit'])->name('admin-edit');

	Route::get('students', [StudentController::class, 'students'])->name('students');

	Route::get('admit-student', [StudentController::class, 'admit_student'])->name('admit-student');

	Route::get('view-student', [StudentController::class, 'view_student'])->name('view-student');

	Route::get('edit-student', [StudentController::class, 'edit_student'])->name('edit-student');

	Route::get('delete-student', [StudentController::class, 'delete_student'])->name('delete-student');

	Route::get('teachers', [TeacherController::class, 'teachers'])->name('teachers');

	Route::get('parents', [ParentController::class, 'parents'])->name('parents');

	Route::get('accountant', [AccountantController::class, 'accountant'])->name('accountant');

	Route::get('admit-parents', [ParentController::class, 'admit_parents'])->name('admit-parents');

	Route::get('view-parents', [ParentController::class, 'view_parents'])->name('view-parents');

	Route::get('edit-parents', [ParentController::class, 'edit_parents'])->name('edit-parents');

	Route::get('delete-parents', [ParentController::class, 'delete_parents'])->name('delete-parents');

	Route::get('view-teachers', [TeacherController::class, 'view_teachers'])->name('view-teachers');

	Route::get('edit-teachers', [TeacherController::class, 'edit_teachers'])->name('edit-teachers');

	Route::get('admit-teachers', [TeacherController::class, 'admit_teachers'])->name('admit-teachers');

	Route::post('post-admit-student', [StudentController::class, 'post_admit_student'])->name('post-admit-student');

	Route::get('delete-teachers', [TeacherController::class, 'delete_teachers'])->name('delete-teachers');

	Route::get('view-accountant', [AccountantController::class, 'view_accountant'])->name('view-accountant');

	Route::get('edit-accountant', [AccountantController::class, 'edit_accountant'])->name('edit-accountant');

	Route::get('admit-accountant', [AccountantController::class, 'admit_accountant'])->name('admit-accountant');

	Route::get('delete-accountant', [AccountantController::class, 'delete_accountant'])->name('delete-accountant');

	Route::get('edit-admin-profile', [UserController::class, 'edit_admin_profile'])->name('edit-admin-profile');


	Route::post('post-admit-student', [StudentController::class, 'post_admit_student'])->name('post-admit-student');

	Route::get('disabled-students', [StudentController::class, 'disabled_students'])->name('disabled-students');

	Route::get('promote-students', [StudentController::class, 'promote_students'])->name('promote-students');

	Route::get('designation', [UserController::class, 'designation'])->name('designation');

	Route::get('add-designation', [UserController::class, 'add_designation'])->name('add-designation');

	Route::get('edit-designation', [UserController::class, 'edit_designation'])->name('edit-designation');

	Route::get('delete-designation', [UserController::class, 'delete_designation'])->name('delete-designation');

	Route::get('department', [UserController::class, 'department'])->name('department');

	Route::get('add-department', [UserController::class, 'add_department'])->name('add-department');

	Route::get('edit-department', [UserController::class, 'edit_department'])->name('edit-department');

	Route::get('delete-department', [UserController::class, 'delete-department'])->name('delete-department');

	Route::get('class', [UserController::class, 'class'])->name('class');

	Route::get('section', [UserController::class, 'section'])->name('section');

	Route::get('admin-subject', [UserController::class, 'subject'])->name('admin-subject');

	Route::get('assign-subject', [UserController::class, 'assign_subject'])->name('assign-subject');

	Route::get('add-class', [UserController::class, 'add_class'])->name('add-class');

	Route::get('edit-class', [UserController::class, 'edit_class'])->name('edit-class');

	Route::get('delete-class', [UserController::class, 'delete_class'])->name('delete-class');

	Route::get('add-section', [UserController::class, 'add_section'])->name('add-section');

	Route::get('edit-section', [UserController::class, 'edit_section'])->name('edit-section');

	Route::get('delete-section', [UserController::class, 'delete_section'])->name('delete-section');

	Route::get('add-subject', [UserController::class, 'add_subject'])->name('add-subject');

	Route::get('edit-subject', [UserController::class, 'edit_subject'])->name('edit-subject');

	Route::get('delete-subject', [UserController::class, 'delete_subject'])->name('delete-subject');

	Route::get('add-subject-assign', [UserController::class, 'add_subject_assign'])->name('add-subject-assign');

	Route::get('edit-subject-assign', [UserController::class, 'edit_subject_assign'])->name('edit-subject-assign');

	Route::get('delete-subject-assign', [UserController::class, 'delete_subject_assign'])->name('delete-subject-assign');

	Route::get('admin-attendance', [UserController::class, 'admin_attendance'])->name('admin-attendance');

	Route::get('admin-attendance-report', [UserController::class, 'admin_attendance_report'])->name('admin-attendance-report');

	Route::get('gallery-category', [HomeController::class, 'gallery_category'])->name('gallery-category');

	Route::get('add-gallery-category', [HomeController::class, 'add_gallery_category'])->name('add-gallery-category');

	Route::get('edit-gallery-category', [HomeController::class, 'edit_gallery_category'])->name('edit-gallery-category');

	Route::get('delete-gallery-category', [HomeController::class, 'delete_gallery_category'])->name('delete-gallery-category');

	Route::get('image', [HomeController::class, 'image'])->name('image');

	Route::get('add-image', [HomeController::class, 'add_image'])->name('add-image');

	Route::get('edit-image', [HomeController::class, 'edit_image'])->name('edit-image');

	Route::get('delete-image', [HomeController::class, 'delete_image'])->name('delete-image');

	Route::get('add-event', [HomeController::class, 'add_event'])->name('add-event');

	Route::get('calender', [HomeController::class, 'calender'])->name('calender');

	Route::get('examination-type', [HomeController::class, 'type'])->name('examination-type');

	Route::get('add-type', [HomeController::class, 'add_type'])->name('add-type');

	Route::get('edit-type', [HomeController::class, 'edit_type'])->name('edit-type');

	Route::get('delete-type', [HomeController::class, 'delete_type'])->name('delete-type');

	Route::get('marks-grade', [HomeController::class, 'marks_grade'])->name('marks-grade');

	Route::get('add-marks-grade', [HomeController::class, 'add_marks_grade'])->name('add-marks-grade');

	Route::get('edit-mark-grade', [HomeController::class, 'edit_mark_grade'])->name('edit-mark-grade');

	Route::get('delete-mark-grade', [HomeController::class, 'delete_mark_grade'])->name('delete-mark-grade');

	Route::get('exam-assign', [HomeController::class, 'exam_assign'])->name('exam-assign');

	Route::get('mark-register', [HomeController::class, 'mark_register'])->name('mark-register');

	Route::get('settings', [HomeController::class, 'settings'])->name('settings');

	Route::get('add-exam-assign', [HomeController::class, 'add_exam_assign'])->name('add-exam-assign');

	Route::get('edit-exam-assign', [HomeController::class, 'edit_exam_assign'])->name('edit-exam-assign');

	Route::get('delete-exam-assign', [HomeController::class, 'delete_exam_assign'])->name('delete-exam-assign');

	Route::get('add-mark-register', [HomeController::class, 'add_mark_register'])->name('add-mark-register');

	Route::get('edit-mark-register', [HomeController::class, 'edit_mark_register'])->name('edit-mark-register');

	Route::get('delete-mark-register', [HomeController::class, 'delete_mark_register'])->name('delete-mark-register');
    
	Route::get('shift', [UserController::class, 'shift'])->name('shift');

	Route::get('add-shift', [UserController::class, 'add_shift'])->name('add-shift');

	Route::get('edit-shift', [UserController::class, 'edit_shift'])->name('edit-shift');

	Route::post('delete-shift', [UserController::class, 'delete_shift'])->name('delete-shift');

	Route::get('class-setup', [UserController::class, 'class_setup'])->name('class-setup');

	Route::get('add-class-setup', [UserController::class, 'add_class_setup'])->name('add-class-setup');

	Route::get('delete-class-setup', [UserController::class, 'delete-class-setup'])->name('delete-class-setup');

	Route::get('edit-class-setup', [UserController::class, 'edit_class_setup'])->name('edit-class-setup');
	
	Route::get('edit-inactive-student', [HomeController::class, 'edit_inactive_student'])->name('edit-inactive-student');
   
	Route::view('/specific-student', 'admin.student-info.specific-student');

	Route::get('/general-setting', [SettingController::class, 'general_setting'])->name('general-setting');

	Route::get('admin-student-profile', [StudentController::class, 'admin_student_profile'])->name('admin-student-profile');

	Route::get('/view-image', [HomeController::class, 'view_image'])->name('view-image');

	Route::get('/lecture-plan', [HomeController::class, 'lecture_plan'])->name('lecture-plan');

	Route::get('/group', [FeesController::class, 'group'])->name('group');

	Route::get('/type', [FeesController::class, 'type'])->name('type');

	Route::get('/master', [FeesController::class, 'master'])->name('master');

	Route::get('/assign', [FeesController::class, 'assign'])->name('assign');

	Route::get('/collect', [FeesController::class, 'collect'])->name('collect');

	Route::get('/add-fees-group', [FeesController::class, 'add_fees_group'])->name('add-fees-group');

	Route::get('/edit-fees-group', [FeesController::class, 'edit_fees_group'])->name('edit-fees-group');

	Route::get('/delete-fees-group', [FeesController::class, 'delete_fees_group'])->name('delete-fees-group');

	Route::get('add-fees-type', [FeesController::class, 'add_fees_type'])->name('add-fees-type');

	Route::get('edit-fees-type', [FeesController::class, 'edit_fees_type'])->name('edit-fees-type');

	Route::get('delete-fees-type', [FeesController::class, 'delete_fees_type'])->name('delete-fees-type');

	Route::get('add-master', [FeesController::class, 'add_master'])->name('add-master');

	Route::get('add-fees-assign', [FeesController::class, 'add_fees_assign'])->name('add-fees-assign');

	Route::get('student-fees-payment', [FeesController::class, 'student_payment'])->name('student-fees-payment');

	Route::get('admin-manage-payment', [FeesController::class, 'admin_manage_payment'])->name('admin-manage-payment');

	Route::post('update-password', [HomeController::class, 'update_password'])->name('update-password');

	Route::get('view-video', [HomeController::class, 'view_video'])->name('view-video');

	Route::get('video', [HomeController::class, 'video'])->name('video');

	Route::get('add-video', [HomeController::class, 'add_video'])->name('add-video');

	Route::get('edit-video', [HomeController::class, 'edit_video'])->name('edit-video');

	Route::get('delete-video', [HomeController::class, 'delete_video'])->name('delete-video');

	Route::get('parent-profile-view', [ParentController::class, 'parent_profile_view'])->name('parent-profile-view');

	Route::get('report-marksheet', [ReportController::class, 'report_marksheet'])->name('report-marksheet');

	Route::get('report-merit-list', [ReportController::class, 'report_merit_list'])->name('report-merit-list');

	Route::get('report-progress-card', [ReportController::class, 'report_progress_card'])->name('report-progress-card');

	Route::get('report-due-fees', [ReportController::class, 'report_due_fees'])->name('report-due-fees');

	Route::get('report-fees-collection', [ReportController::class, 'report_fees_collection'])->name('report-fees-collection');

	Route::get('report-account', [ReportController::class, 'report_account'])->name('report-account');

	Route::get('report-class-routine', [ReportController::class, 'report_class_routine'])->name('report-class-routine');

	Route::get('report-exam-routine', [ReportController::class, 'report_exam_routine'])->name('report-exam-routine');

	Route::get('report-attendance', [ReportController::class, 'report_attendance'])->name('report-attendance');

	Route::get('admin-event',[HomeController::class, 'admin_event'])->name('admin-event');

	Route::get('edit-admin-event',[HomeController::class, 'edit_admin_event'])->name('edit-admin-event');

	Route::get('admin-event-detail-view',[HomeController::class, 'admin_event_detail_view'])->name('admin-event-detail-view');

	Route::get('add-notification',[HomeController::class, 'add_notification'])->name('add-notification');

	Route::get('schedule-meeting/{id}',[ApplicantController::class, 'schedule_meeting'])->name('schedule-meeting');

	Route::get('meeting-status',[ApplicantController::class, 'meeting_status'])->name('meeting-status');

	Route::get('change-meeting-status',[ApplicantController::class, 'change_meeting_status'])->name('change-meeting-status');

	Route::get('meeting-tracking',[ApplicantController::class, 'meeting_tracking'])->name('meeting-tracking');
});

Route::group(['middleware' => 'auth.webstudents'], function () {

	Route::get('student-dashboard', [HomeController::class, 'student_dashboard'])->name('student-dashboard');

	Route::get('student-edit', [StudentController::class, 'student_edit'])->name('student-edit');

	Route::get('student-edit-profile', [StudentController::class, 'student_edit_profile'])->name('student-edit-profile');

	Route::get('parent-profile', [StudentController::class, 'student_parent_profile'])->name('parent-profile');

	Route::get('student-marksheet', [StudentController::class, 'student_marksheet'])->name('student-marksheet');

	Route::get('student-event', [StudentController::class, 'student_event'])->name('student-event');

	Route::get('student-gallary', [StudentController::class, 'student_gallary'])->name('student-gallary');

	Route::get('chat', [StudentController::class, 'student_message'])->name('chat');

	Route::get('student-attendance', [StudentController::class, 'student_attendance'])->name('student-attendance');

	Route::get('student-exam', [StudentController::class, 'student_exam'])->name('student-exam');

	Route::get('subject', [StudentController::class, 'subject'])->name('subject');

	Route::get('class-routine', [StudentController::class, 'class_routine'])->name('class-routine');

	Route::get('view-student-image', [StudentController::class, 'view_student_image'])->name('view-student-image');

	Route::get('view-student-video', [StudentController::class, 'view_student_video'])->name('view-student-video');

	Route::get('view-event', [StudentController::class, 'view_event'])->name('view-event');

	Route::get('detail-student-attendance', [StudentController::class, 'detail_student_attendance'])->name('detail-student-attendance');

});

Route::group(['middleware' => 'auth.webteachers'], function () {

    Route::get('teacher-admin-student-profile',[StudentController::class,'admin_student_profile'])->name('teacher-admin-student-profile');

	Route::get('teacher-dashboard', [HomeController::class, 'teacher_dashboard'])->name('teacher-dashboard');

	Route::get('edit-teacher',[TeacherController::class, 'edit_teacher'])->name('edit-teacher');

	Route::get('edit-teacher-profile',[TeacherController::class, 'edit_teacher_profile'])->name('edit-teacher-profile');

	Route::get('teacher-attendance',[TeacherController::class, 'teacher_attendance'])->name('teacher-attendance');

	Route::get('teacher-event',[TeacherController::class, 'teacher_event'])->name('teacher-event');

	Route::get('teacher-class-routine',[TeacherController::class, 'teacher_class_routine'])->name('teacher-class-routine');

	Route::get('teacher-exam-routine',[TeacherController::class, 'teacher_exam_routine'])->name('teacher-exam-routine');

	Route::get('teacher-attendance-list',[TeacherController::class, 'teacher_attendance_list'])->name('teacher-attendance-list');

	Route::get('teacher-attendance-report',[TeacherController::class, 'teacher_attendance_report'])->name('teacher-attendance-report');

	Route::get('teacher-mark-sheet',[TeacherController::class, 'teacher_mark_sheet'])->name('teacher-mark-sheet');

	Route::get('teacher-gallery-category',[TeacherController::class, 'teacher_gallery_category'])->name('teacher-gallery-category');

	Route::get('teacher-image',[TeacherController::class, 'teacher_image'])->name('teacher-image');

	Route::get('teacher-video',[TeacherController::class, 'teacher_video'])->name('teacher-video');

	Route::get('teacher-add-image',[HomeController::class, 'add_image'])->name('teacher-add-image');

	Route::get('teacher-add-video',[HomeController::class, 'add_video'])->name('teacher-add-video');

	Route::get('teacher-add-gallery-category', [HomeController::class, 'add_gallery_category'])->name('teacher-add-gallery-category');

	Route::get('teacher-add-event', [HomeController::class, 'add_event'])->name('teacher-add-event');

	Route::get('edit-teacher-event',[HomeController::class, 'edit_admin_event'])->name('edit-teacher-event');

	Route::get('teacher-calender', [TeacherController::class, 'teacher_calender'])->name('teacher-calender');

	Route::get('teacher-event-detail-view',[HomeController::class, 'admin_event_detail_view'])->name('teacher-event-detail-view');

	Route::get('parent-detail',[TeacherController::class, 'parent_detail'])->name('parent-detail');

	Route::get('student-detail',[TeacherController::class, 'student_detail'])->name('student-detail');

	Route::get('view-teacher-video',[TeacherController::class, 'view_teacher_video'])->name('view-teacher-video');

	Route::get('view-teacher-image',[TeacherController::class, 'view_teacher_image'])->name('view-teacher-image');
});

Route::group(['middleware' => 'auth.webparents'], function () {
	Route::get('download-profile',[ApplicantController::class, 'download_profile'])->name('download-profile');

	Route::get('applicant-student-profile',[ApplicantController::class, 'applicant_student_profile'])->name('applicant-student-profile');

	Route::get('parent-meeting-status', [ApplicantController::class, 'parent_meeting_status'])->name('parent-meeting-status');

	Route::get('parent-meeting-track', [ApplicantController::class, 'parent_meeting_track'])->name('parent-meeting-track');

	Route::get('add-applicant', [ApplicantController::class, 'add_applicant'])->name('add-applicant');

	Route::get('applicant-parent-list', [ApplicantController::class, 'applicant_parent_list'])->name('applicant-parent-list');

	Route::get('applicant-edit/{id}', [ApplicantController::class, 'edit_applicant'])->name('applicant-edit');

	Route::get('applicant-profile', [ApplicantController::class, 'applicant_profile'])->name('applicant-profile');

	Route::get('parent-dashboard', [HomeController::class, 'parent_dashboard'])->name('parent-dashboard');

	Route::get('student-profile', [ParentController::class, 'student_profile'])->name('student-profile');

	Route::get('edit-parent-profile', [ParentController::class, 'edit_parent_profile'])->name('edit-parent-profile');

	Route::get('edit-parent', [ParentController::class, 'edit_parent'])->name('edit-parent');

	Route::get('student-fees', [ParentController::class, 'student_fees'])->name('student-fees');

	Route::get('marksheet', [ParentController::class, 'marksheet'])->name('marksheet');
	
	Route::get('parent-event', [ParentController::class, 'parent_event'])->name('parent-event');
	
	Route::get('exam-routine', [ParentController::class, 'exam_routine'])->name('exam-routine');
	
	Route::get('attendance', [ParentController::class, 'attendance'])->name('attendance');

	Route::get('messages', [ParentController::class, 'messages'])->name('messages');
	
	Route::get('parent-gallary', [ParentController::class, 'parent_gallary'])->name('parent-gallary');
  
	Route::get('view-parent-image', [ParentController::class, 'view_parent_image'])->name('view-parent-image');

	Route::get('view-parent-video', [ParentController::class, 'view_parent_video'])->name('view-parent-video');

	Route::get('parent-view-event', [ParentController::class, 'parent_view_event'])->name('parent-view-event');

	Route::get('detail-student-parent', [ParentController::class, 'detail_student_parent'])->name('detail-student-parent');

	Route::get('student-subject', [ParentController::class, 'student_subject'])->name('student-subject');

	Route::get('student-class-routine', [ParentController::class, 'student_class_routine'])->name('student-class-routine');


});

Route::group(['middleware' => 'auth.webaccountants'], function () {

	Route::get('accountant-dashboard', [HomeController::class, 'accountant_dashboard'])->name('accountant-dashboard');

	Route::get('edit-accountant-profile', [AccountantController::class, 'edit_accountant_profile'])->name('edit-accountant-profile');

	Route::get('accountant-edit', [AccountantController::class, 'accountant_edit'])->name('accountant-edit');

	Route::get('manage-fees', [AccountantController::class, 'manage_fees'])->name('manage-fees');

	Route::get('add-fees', [AccountantController::class, 'add_fees'])->name('add-fees');

	Route::get('accountant-report', [AccountantController::class, 'accountant_report'])->name('accountant-report');

	Route::get('accountant-fees-challans', [AccountantController::class, 'accountant_fees_challans'])->name('accountant-fees-challans');

	Route::get('manage-payment', [AccountantController::class, 'manage_payment'])->name('manage-payment');

	Route::get('student-payment', [AccountantController::class, 'student_payment'])->name('student-payment');

	Route::get('accountant-gallery', [AccountantController::class, 'accountant_gallery'])->name('accountant-gallery');

	Route::get('accountant-event', [AccountantController::class, 'accountant_event'])->name('accountant-event');

	Route::get('accountant-student', [AccountantController::class, 'accountant_student'])->name('accountant-student');

	Route::get('accountant-teacher', [AccountantController::class, 'accountant_teacher'])->name('accountant-teacher');

	Route::get('accountant-event-detail-view', [AccountantController::class, 'accountant_event_detail_view'])->name('accountant-event-detail-view');

	Route::get('view-accountant-image', [AccountantController::class, 'view_accountant_image'])->name('view-accountant-image');

	Route::get('view-accountant-video', [AccountantController::class, 'view_accountant_video'])->name('view-accountant-video');

	Route::get('accountant-general-info-student', [AccountantController::class, 'accountant_general_info_student'])->name('accountant-general-info-student');

	Route::get('view-payment-info', [AccountantController::class, 'view_payment_info'])->name('view-payment-info');

	Route::get('view-teachers-detail', [AccountantController::class, 'view_teachers_detail'])->name('view-teachers-detail');


});


Route::group(['middleware' => 'auth.webadmissions'], function () {

	Route::get('admission-dashboard', [HomeController::class, 'admission_dashboard'])->name('admission-dashboard');

});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

