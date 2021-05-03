<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

//FE
Route::get('/login', 'HomeController@login')->name('frontend.login');
Route::post('/login', 'HomeController@postLogin')->name('frontend.postLogin');
Route::get('/logout','HomeController@logout')->name('frontend.logout');
Route::group(['prefix' => 'student', 'middleware' => 'student'], function () {
    Route::get('/','HomeController@indexStudent')->name('frontend.indexStudent');
    Route::get('/class{id_class}','HomeController@StudentClassCourse')->name('frontend.StudentClassCourse');
    Route::get('/class{id_class}/course{id}', 'HomeController@studentViewEx')->name('frontend.studentViewEx');
    // Infor
    Route::get('/infor{id}','StudentController@inforStudent')->name('frontend.inforStudent');
    Route::post('/infor{id}','StudentController@editInforStudent')->name('frontend.editInforStudent');
});
Route::group(['prefix' => 'teacher', 'middleware' => 'teacher'], function () {
    Route::get('/','HomeController@indexTeacher')->name('frontend.indexTeacher');
    Route::get('/course{id}', 'HomeController@teacherEx')->name('frontend.teacherEx');
    Route::get('/classcourse{id}','HomeController@teacherAddExercise')->name('frontend.teacherAddExercise');
    Route::post('/classcourse{id}','HomeController@postTeacherAddExercise')->name('frontend.postTeacherAddExercise');
    // Infor
    Route::get('/infor{id}','TeacherController@inforTeacher')->name('frontend.inforTeacher');
    Route::post('/infor{id}','TeacherController@editInforTeacher')->name('frontend.editInforTeacher');
});
//BE
Route::get('/loginAdmin','AdminController@login')->name('backend.login');
Route::post('/loginAdmin','AdminController@postLogin')->name('backend.postLogin');
Route::get('/logoutAdmin','AdminController@logout')->name('backend.logout');
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/','AdminController@index')->name('backend.index');
    //Student
    Route::resource('student', 'StudentController');
    //Teacher
    Route::resource('teacher', 'TeacherController');
    //Course
    Route::resource('course', 'CourseController');
    //Class
    Route::resource('class', 'ClassController');
    Route::post('/class{id}/student{id_student}', 'ClassController@addStu')->name('backend.class.addStu');
    Route::delete('/class{id}/student{id_student}', 'ClassController@destroyStu')->name('backend.class.destroyStu');
    Route::post('/class{id}/course{id_course}', 'ClassController@addCourse')->name('backend.class.addCourse');
    Route::delete('/class{id}/course{id_course}', 'ClassController@destroyCourse')->name('backend.class.destroyCourse');
    Route::post('/class{id}/{id_class_course}', 'ClassController@addCourseDetail')->name('backend.class.addCourseDetail');
    Route::get('/class{id}/{id_class_course}', 'ClassController@addSchedule')->name('backend.class.addSchedule');
    Route::post('/class{id}/{id_class_course}', 'ClassController@postAddSchedule')->name('backend.class.postAddSchedule');
    //Staff
    Route::resource('staff', 'StaffController');

});

