<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;


//------FrontEnd Start---

Route::get('/',[FrontEndController::class,'index'])->name('/');
Route::get('/about',[FrontEndController::class,'about'])->name('about');
Route::get('/doctors',[FrontEndController::class,'doctors'])->name('doctors');
Route::get('/news',[FrontEndController::class,'news'])->name('news');
Route::get('/contact',[FrontEndController::class,'contact'])->name('contact');
//-----user----
Route::get('user-login',[FrontEndController::class,'userLogin'])->name('user-login');
Route::post('user-login-form',[FrontEndController::class,'userLoginForm'])->name('user-login-form');
Route::get('user-register',[FrontEndController::class,'userRegister'])->name('user-register');
Route::post('user-register-form',[FrontEndController::class,'userRegisterForm'])->name('user-register-form');
Route::get('user-logout',[FrontEndController::class,'userLogout'])->name('user-logout');

//---Appointment----

Route::post('appointment',[FrontEndController::class,'appointment'])->name('appointment');
Route::get('my-appointment',[FrontEndController::class,'myAppointment'])->name('my-appointment');
Route::get('appointment-status/{id}',[FrontEndController::class,'appointmentStatus'])->name('appointment-status');
Route::post('appointment-delete',[FrontEndController::class,'appointmentDelete'])->name('appointment-delete');

//------FrontEnd End---

//------BackEnd start---

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('dashboard',[AdminController::class,'index'])->name('dashboard')->middleware('auth','verified');
    //-----user----
    Route::get('user',[UserController::class,'user'])->name('user');
    Route::get('user-edit/{id}',[UserController::class,'userEdit'])->name('user-edit');
    Route::post('user-update',[UserController::class,'userUpdate'])->name('user-update');
    Route::post('user-delete',[UserController::class,'userDelete'])->name('user-delete');

    //-----doctor----

    Route::get('doctor',[DoctorController::class,'doctor'])->name('doctor');
    Route::post('doctor-add',[DoctorController::class,'doctorAdd'])->name('doctor-add');
    Route::get('manage-doctor',[DoctorController::class,'manageDoctor'])->name('manage-doctor');
    Route::get('doctor-status/{id}',[DoctorController::class,'doctorStatus'])->name('doctor-status');
    Route::get('doctor-edit/{id}',[DoctorController::class,'doctorEdit'])->name('doctor-edit');
    Route::post('doctor-delete',[DoctorController::class,'doctorDelete'])->name('doctor-delete');
    Route::post('doctor-update',[DoctorController::class,'doctorUpdate'])->name('doctor-update');

    //-----appointment----

    Route::get('appointment',[AppointmentController::class,'appointment'])->name('appointment');
    Route::get('appointment-approve/{id}',[AppointmentController::class,'appointmentApprove'])->name('appointment-approve');
    Route::get('appointment-cancel/{id}',[AppointmentController::class,'appointmentCancel'])->name('appointment-cancel');

});
