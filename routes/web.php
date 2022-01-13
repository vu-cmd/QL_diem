<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->namespace('App\Http\Controllers')->group(function () {
    Route::get('/', function () {
        return redirect()->route('students');
    })->name('index');
    Route::get('/students', 'StudentController@index')->name('students');
    Route::get('/teachers', 'TeacherController@index')->name('teachers');
    Route::get('/classes', 'ClassroomController@index')->name('classes');
    Route::get('/subjects', 'SubjectController@index')->name('subjects');
    Route::get('/scores/subjects', 'ScoreController@viewSubjects')->name('scores.subjects');
    Route::get('/scores/subject/{id}', 'ScoreController@bySubject')->name('scores.subject');
    Route::get('/scores/students', 'ScoreController@viewStudents')->name('scores.students');
    Route::get('/scores/student/{id}', 'ScoreController@byStudent')->name('scores.student');
    Route::get('/scores/semesters', 'ScoreController@viewSemesters')->name('scores.semesters');
    Route::get('/scores/semester/{id}', 'ScoreController@bySemester')->name('scores.semester');
    Route::get('/scores/classrooms', 'ScoreController@viewClassrooms')->name('scores.classrooms');
    Route::get('/scores/classroom/{id}', 'ScoreController@byClassroom')->name('scores.classroom');
    Route::get('/logout', 'LoginController@logout')->name('logout');
});

Route::middleware('guest')->namespace('App\Http\Controllers')->group(function () {
    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::post('/login', 'LoginController@authenticate')->name('login.post');
});
