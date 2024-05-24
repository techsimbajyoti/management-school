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

	Route::get('view-teachers', [ParentController::class, 'view_teachers'])->name('view-teachers');

	Route::get('edit-teachers', [ParentController::class, 'edit_teachers'])->name('edit-teachers');

	Route::get('delete-teachers', [ParentController::class, 'delete_teachers'])->name('delete-teachers');

});

Route::group(['middleware' => 'auth.webstudents'], function () {

	Route::get('student-dashboard', [HomeController::class, 'student_dashboard'])->name('student-dashboard');

});

Route::group(['middleware' => 'auth.webteachers'], function () {

	Route::get('teacher-dashboard', [HomeController::class, 'teacher_dashboard'])->name('teacher-dashboard');

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

