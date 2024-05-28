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
});

Route::group(['middleware' => 'auth.webstudents'], function () {

	Route::get('student-dashboard', [HomeController::class, 'student_dashboard'])->name('student-dashboard');

	Route::get('student-edit', [StudentController::class, 'student_edit'])->name('student-edit');
});

Route::group(['middleware' => 'auth.webteachers'], function () {

	Route::get('teacher-dashboard', [HomeController::class, 'teacher_dashboard'])->name('teacher-dashboard');

	Route::get('edit-teacher',[TeacherController::class, 'edit_teacher'])->name('edit-teacher');

	Route::get('edit-teacher-profile',[TeacherController::class, 'edit_teacher_profile'])->name('edit-teacher-profile');
});

Route::group(['middleware' => 'auth.webparents'], function () {

	Route::get('parent-dashboard', [HomeController::class, 'parent_dashboard'])->name('parent-dashboard');

});

Route::group(['middleware' => 'auth.webaccountants'], function () {

	Route::get('accountant-dashboard', [HomeController::class, 'accountant_dashboard'])->name('accountant-dashboard');

});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

