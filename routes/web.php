<?php

use App\Livewire\Demo;
use App\Models\AcademicClass;
use App\Models\Enrollment;
use App\Models\Student;
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

Route::get('/', function () {
    // dd(Enrollment::where('student_id', 1)->where('session_id', 1)->first());
    // $student = Student::first();
    // dd($student->academicClass);
    // $page = App\Models\Page::first();
    // dd($page->content);
    return view('welcome');
});

Route::get('/demo', Demo::class);
Route::redirect('/login', '/admin/login')->name('login');
