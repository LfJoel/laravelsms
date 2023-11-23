<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'Authlogin']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('forgot_password', [AuthController::class, 'forgotpassword']);
Route::post('forgot_password', [AuthController::class, 'postforgotpassword']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'postreset']);



Route::group(['middleware' => 'admin'], function(){
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/admin/list',[AdminController::class, 'list']);
    Route::get(' admin/admin/add',[AdminController::class, 'adminAdd']);
    Route::post('admin/admin/add',[AdminController::class, 'NewadminAdd']);
    
    Route::get(' admin/admin/edit/{id}',[AdminController::class, 'edit']);
    Route::get(' admin/admin/delete/{id}',[AdminController::class, 'delete']);
    Route::post(' admin/admin/edit/{id}',[AdminController::class, 'update']);

});
Route::group(['middleware' => 'teacher'], function(){
    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']);

    
});
Route::group(['middleware' => 'student'], function(){
    Route::get('student/dashboard', [DashboardController::class, 'dashboard']);

  
});
Route::group(['middleware' => 'parent'], function(){
    Route::get('parent/dashboard', [DashboardController::class, 'dashboard']);
    
});