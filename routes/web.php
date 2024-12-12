<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PatientController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\DoctorMiddleware;
use App\Http\Middleware\PatientMiddleware;
use App\Http\Middleware\NurseMiddleware;
use App\Http\Middleware\TechnologistMiddleware;
use App\Http\Middleware\ReceptionistMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

/* Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard')->middleware(AdminMiddleware::class); */
Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');

    Route::get('/departaments', [AdminController::class, 'showDepartaments'])->name('show-departaments');
    Route::delete('/departaments/delete/{id}', [AdminController::class, 'deleteDepartament'])->name('delete-departament');
    Route::post('/departaments/save', [AdminController::class, 'saveDepartament'])->name('save-departament');
    Route::post('/departaments/update', [AdminController::class, 'updateDepartament'])->name('update-departament');

    Route::get('/users', [AdminController::class, 'showUsers'])->name('show-users');

    Route::delete('/patient/delete/{id}', [AdminController::class, 'deletePatient'])->name('delete-patient');

    Route::get('/users/create/admin', function(){return view('admin.user.createAdmin');})->name('create-admin');
    Route::post('/users/create/admin', [AdminController::class, 'createAdmin']);
    Route::delete('/admin/delete/{id}', [AdminController::class, 'deleteAdmin'])->name('delete-admin');
    Route::get('/users/edit/admin/{id}', [AdminController::class, 'editAdminView'])->name('edit-admin-view');
    Route::post('/users/edit/admin', [AdminController::class, 'editAdmin'])->name('edit-admin');

    Route::get('/users/create/doctor', [AdminController::class, 'createDoctorView'])->name('create-doctor');
    Route::post('/users/create/doctor', [AdminController::class, 'createDoctor']);
    Route::delete('/doctor/delete/{id}', [AdminController::class, 'deleteDoctor'])->name('delete-doctor');
    Route::get('/users/edit/doctor/{id}', [AdminController::class, 'editDoctorView'])->name('edit-doctor-view');
    Route::post('/users/edit/doctor', [AdminController::class, 'editDoctor'])->name('edit-doctor');

    Route::get('/users/create/nurse', function(){return view('admin.user.createNurse');})->name('create-nurse');
    Route::post('/users/create/nurse', [AdminController::class, 'createNurse']);
    Route::delete('/nurse/delete/{id}', [AdminController::class, 'deleteNurse'])->name('delete-nurse');
    Route::get('/users/edit/nurse/{id}', [AdminController::class, 'editNurseView'])->name('edit-nurse-view');
    Route::post('/users/edit/nurse', [AdminController::class, 'editNurse'])->name('edit-nurse');

    Route::get('/users/create/receptionist', function(){return view('admin.user.createReceptionist');})->name('create-receptionist');
    Route::post('/users/create/receptionist', [AdminController::class, 'createReceptionist']);
    Route::delete('/receptionist/delete/{id}', [AdminController::class, 'deleteReceptionist'])->name('delete-receptionist');
    Route::get('/users/edit/receptionist/{id}', [AdminController::class, 'editReceptionistView'])->name('edit-receptionist-view');
    Route::post('/users/edit/receptionist', [AdminController::class, 'editReceptionist'])->name('edit-receptionist');

    Route::get('/users/create/technologist', function(){return view('admin.user.createTechnologist');})->name('create-technologist');
    Route::post('/users/create/technologist', [AdminController::class, 'createTechnologist']);
    Route::delete('/technologist/delete/{id}', [AdminController::class, 'deleteTechnologist'])->name('delete-technologist');
    Route::get('/users/edit/technologist/{id}', [AdminController::class, 'editTechnologistView'])->name('edit-technologist-view');
    Route::post('/users/edit/technologist', [AdminController::class, 'editTechnologist'])->name('edit-technologist');
});

Route::middleware(DoctorMiddleware::class)->group(function () {
    Route::get('/doctor-dashboard',function(){ return 'doctor dashboar';})->name('doctor-dashboard');
});

Route::middleware(PatientMiddleware::class)->group(function () {
    Route::get('/patient/dashboard', [PatientController::class, 'index'])->name('patient-dashboard');
});

Route::middleware(NurseMiddleware::class)->group(function () {
    Route::get('/nurse-dashboard',function(){ return 'nurse dashboar';})->name('nurse-dashboard');
});

Route::middleware(TechnologistMiddleware::class)->group(function () {
    Route::get('/technologist-dashboard',function(){ return 'techonolgists dashboar';})->name('technologist-dashboard');
});

Route::middleware(ReceptionistMiddleware::class)->group(function () {
    Route::get('/receptionist-dashboard',function(){ return 'receptionist dashboar';})->name('receptionist-dashboard');
});
