<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Routes related to login authentication both for admin and student
Route::get('/', [AuthController::class,'student_login'])->name('login_page');
Route::get('/login', [AuthController::class, 'login_page'])->name('login_page');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/student_login',[AuthController::class,'student_login'])->name('student_login');
Route::post('/authenticate_student',[AuthController::class,'authenticate_student'])->name('authenticate_student');

Route::post('/authenticate',[AuthController::class,'authenticate'])->name('authenticate');

// Routes related to Admin Dashboard
Route::get('/admin_panel',[AdminController::class,'admin_panel'])->name('admin_panel');

// Routes related to Student Dashboard
Route::get('/student_panel',[StudentController::class,'student_panel'])->name('student_panel');




// Routes related to students
Route::get('/new_student',[StudentController::class,'registration_form'])->name('new_student');
Route::post('/register_student',[StudentController::class,'register_student'])->name('register_student');
Route::get('/all_students',[StudentController::class,'all_student'])->name('all_students');
Route::get('/update_student/{id}',[StudentController::class,'update_student'])->name('update_student');
Route::post('/save_student_update/{id}',[StudentController::class,'save_student_update'])->name('save_student_update');
Route::get('/delete_student/{id}',[StudentController::class,'delete_student'])->name('delete_student');

// Routes related to courses
Route::get('/new_course',[CourseController::class,'new_course'])->name('new_course');
Route::post('/save_course',[CourseController::class,'save_course'])->name('save_course');
Route::get('/all_courses',[CourseController::class,'all_courses'])->name('all_courses');
Route::get('/update_course/{id}',[CourseController::class,'update_course'])->name('update_course');
Route::post('/save_course_update/{id}',[CourseController::class,'save_course_update'])->name('save_course_update');


// Routes related to new section
Route::get('/new_update',[NewsController::class,'new_update'])->name('new_update');
Route::post('/save_news',[NewsController::class,'save_news'])->name('save_news');
Route::get('/all_news',[NewsController::class,'all_news'])->name('all_news');
Route::get('/update_news/{id}',[NewsController::class,'update_news'])->name('update_news');
Route::post('/save_news_update',[NewsController::class,'save_news_update'])->name('save_news_update');
Route::get('/delete_news/{id}',[NewsController::class,'delete_news'])->name('delete_news');



// Route for viewing courses (student's course listing)
Route::get('/view_courses', [CourseController::class, 'view_courses'])->name('view_courses');
Route::post('/enroll_course/{course_id}', [StudentController::class, 'enroll_in_course'])->name('enroll_course');



// Routes related to Student Dashboard
Route::get('/student_panel', [StudentController::class, 'student_panel'])->name('student_panel');
// Courses
Route::get('/view_courses', [CourseController::class, 'view_courses'])->name('view_courses');
Route::post('/enroll_course/{course_id}', [StudentController::class, 'enroll_in_course'])->name('enroll_course');
// Profile Management
Route::post('/update_profile', [StudentController::class, 'update_profile'])->name('update_profile');