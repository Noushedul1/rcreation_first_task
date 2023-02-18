<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\StudentController;
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
// start for frontend 
Route::controller(FrontendController::class)->group(function(){
    Route::get('/','index');
});
// end for frontend 

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::controller(BackendController::class)->group(function(){
        Route::get('/dashboard','index')->name('dashboard');
        Route::get('/dashboard/student_manage','manage')->name('student_manage');
    });
    Route::controller(StudentController::class)->group(function(){
        Route::get('/dashboard/add_student','index')->name('add_student');
        Route::post('/dashboard/student_create','create')->name('student_create');
        Route::get('/dashboard/student_manage','manage')->name('student_manage');
        Route::get('/dashboard/student_edit/{id}','edit')->name('student_edit');
        Route::put('/dashboard/student_update/{id}','update')->name('student_update');
    });
    Route::controller(DepartmentController::class)->group(function(){
        Route::get('/dashboard/add_department','index')->name('add_department');
        Route::post('/dashboard/department_create','create')->name('department_create');
        Route::get('/dashboard/department_manage','manage')->name('department_manage');
        Route::get('/dashboard/department_delate/{id}','delete')->name('department_delete');
    });
});
