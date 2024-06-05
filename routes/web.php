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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

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

	Route::get('subject', [UserController::class, 'subject'])->name('subject');

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

	Route::get('type', [HomeController::class, 'type'])->name('type');

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

	Route::post('json-state', [UserController::class, 'json-state'])->name('json-state');

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
});

Route::group(['middleware' => 'auth.webstudents'], function () {

	Route::get('student-dashboard', [HomeController::class, 'student_dashboard'])->name('student-dashboard');

	Route::get('student-edit', [StudentController::class, 'student_edit'])->name('student-edit');

	Route::get('student-edit-profile', [StudentController::class, 'student_edit_profile'])->name('student-edit-profile');

	Route::get('parent-profile', [StudentController::class, 'student_parent_profile'])->name('parent-profile');

	Route::get('student-marksheet', [StudentController::class, 'student_marksheet'])->name('student-marksheet');

	Route::get('events', [StudentController::class, 'student_event'])->name('events');

	Route::get('student-gallary', [StudentController::class, 'student_gallary'])->name('student-gallary');

	Route::get('chat', [StudentController::class, 'student_message'])->name('chat');

	Route::get('student-attendance', [StudentController::class, 'student_attendance'])->name('student-attendance');

	Route::get('student-exam', [StudentController::class, 'student_exam'])->name('student-exam');

});

Route::group(['middleware' => 'auth.webteachers'], function () {

	Route::get('teacher-dashboard', [HomeController::class, 'teacher_dashboard'])->name('teacher-dashboard');

	Route::get('edit-teacher',[TeacherController::class, 'edit_teacher'])->name('edit-teacher');

	Route::get('edit-teacher-profile',[TeacherController::class, 'edit_teacher_profile'])->name('edit-teacher-profile');
});

Route::group(['middleware' => 'auth.webparents'], function () {

	Route::get('parent-dashboard', [HomeController::class, 'parent_dashboard'])->name('parent-dashboard');

	Route::get('student-profile', [ParentController::class, 'student_profile'])->name('student-profile');

	Route::get('edit-parent-profile', [ParentController::class, 'edit_parent_profile'])->name('edit-parent-profile');

	Route::get('edit-parent', [ParentController::class, 'edit_parent'])->name('edit-parent');

	Route::get('student-fees', [ParentController::class, 'student_fees'])->name('student-fees');

	Route::get('marksheet', [ParentController::class, 'marksheet'])->name('marksheet');
	
	Route::get('events', [ParentController::class, 'events'])->name('events');
	
	Route::get('exam-routine', [ParentController::class, 'exam_routine'])->name('exam-routine');
	
	Route::get('attendance', [ParentController::class, 'attendance'])->name('attendance');

	Route::get('messages', [ParentController::class, 'messages'])->name('messages');
	
	Route::get('gallary', [ParentController::class, 'gallary'])->name('gallary');

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
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

