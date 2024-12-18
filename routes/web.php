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

/* -------------------------------ADMIN DASHBOARD------------------------------- */
Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin-dashboard');

    /* -------------------------------DEPARTAMENT MANAGEMENT------------------------------- */
    Route::get('/departaments', [AdminController::class, 'showDepartaments'])->name('show-departaments');
    Route::delete('/departaments/delete/{id}', [AdminController::class, 'deleteDepartament'])->name('delete-departament');
    Route::post('/departaments/save', [AdminController::class, 'saveDepartament'])->name('save-departament');
    Route::post('/departaments/update', [AdminController::class, 'updateDepartament'])->name('update-departament');

    /* -------------------------------USER MANAGEMENT------------------------------- */
    Route::get('/users', [AdminController::class, 'showUsers'])->name('show-users');

    Route::delete('/patient/delete/{id}', [AdminController::class, 'deletePatient'])->name('delete-patient');

    Route::get('/users/create/admin', function(){return view('admin.user.createAdmin');})->name('create-admin');
    Route::post('/users/create/admin', [AdminController::class, 'createAdmin']);
    Route::get('/users/edit/admin/{id}', [AdminController::class, 'openEditAdminView'])->name('edit-admin-view');
    Route::post('/users/edit/admin', [AdminController::class, 'editAdmin'])->name('edit-admin');
    Route::post('/users/fire/admin', [AdminController::class, 'fireAdmin'])->name('fire-admin');
    Route::post('/users/hire/admin', [AdminController::class, 'hireAdmin'])->name('hire-admin');

    Route::get('/users/create/doctor', [AdminController::class, 'openCreateDoctorView'])->name('create-doctor');
    Route::post('/users/create/doctor', [AdminController::class, 'createDoctor']);
    Route::delete('/doctor/delete/{id}', [AdminController::class, 'deleteDoctor'])->name('delete-doctor');
    Route::get('/users/edit/doctor/{id}', [AdminController::class, 'openEditDoctorView'])->name('edit-doctor-view');
    Route::post('/users/edit/doctor', [AdminController::class, 'editDoctor'])->name('edit-doctor');
    Route::post('/users/fire/doctor', [AdminController::class, 'fireDoctor'])->name('fire-doctor');
    Route::post('/users/hire/doctor', [AdminController::class, 'hireDoctor'])->name('hire-doctor');

    Route::get('/users/create/nurse', function(){return view('admin.user.createNurse');})->name('create-nurse');
    Route::post('/users/create/nurse', [AdminController::class, 'createNurse']);
    Route::delete('/nurse/delete/{id}', [AdminController::class, 'deleteNurse'])->name('delete-nurse');
    Route::get('/users/edit/nurse/{id}', [AdminController::class, 'openEditNurseView'])->name('edit-nurse-view');
    Route::post('/users/edit/nurse', [AdminController::class, 'editNurse'])->name('edit-nurse');
    Route::post('/users/fire/nurse', [AdminController::class, 'fireNurse'])->name('fire-nurse');
    Route::post('/users/hire/nurse', [AdminController::class, 'hireNurse'])->name('hire-nurse');

    Route::get('/users/create/receptionist', function(){return view('admin.user.createReceptionist');})->name('create-receptionist');
    Route::post('/users/create/receptionist', [AdminController::class, 'createReceptionist']);
    Route::delete('/receptionist/delete/{id}', [AdminController::class, 'deleteReceptionist'])->name('delete-receptionist');
    Route::get('/users/edit/receptionist/{id}', [AdminController::class, 'openEditReceptionistView'])->name('edit-receptionist-view');
    Route::post('/users/edit/receptionist', [AdminController::class, 'editReceptionist'])->name('edit-receptionist');
    Route::post('/users/fire/receptionist', [AdminController::class, 'fireReceptionist'])->name('fire-receptionist');
    Route::post('/users/hire/receptionist', [AdminController::class, 'hireReceptionist'])->name('hire-receptionist');

    Route::get('/users/create/technologist', function(){return view('admin.user.createTechnologist');})->name('create-technologist');
    Route::post('/users/create/technologist', [AdminController::class, 'createTechnologist']);
    Route::delete('/technologist/delete/{id}', [AdminController::class, 'deleteTechnologist'])->name('delete-technologist');
    Route::get('/users/edit/technologist/{id}', [AdminController::class, 'openEditTechnologistView'])->name('edit-technologist-view');
    Route::post('/users/edit/technologist', [AdminController::class, 'editTechnologist'])->name('edit-technologist');
    Route::post('/users/fire/technologist', [AdminController::class, 'fireTechnologist'])->name('fire-technologist');
    Route::post('/users/hire/technologist', [AdminController::class, 'hireTechnologist'])->name('hire-technologist');
});

/* -------------------------------DOCTOR DASHBOARD------------------------------- */
Route::middleware(DoctorMiddleware::class)->group(function () {
    Route::get('/doctor-dashboard',function(){ return 'doctor dashboar';})->name('doctor-dashboard');
});

/* -------------------------------PATIENT DASHBOARD------------------------------- */
Route::middleware(PatientMiddleware::class)->group(function () {
    Route::get('/patient/dashboard', [PatientController::class, 'index'])->name('patient-dashboard');
});

/* -------------------------------NURSE DASHBOARD------------------------------- */
Route::middleware(NurseMiddleware::class)->group(function () {
    Route::get('/nurse-dashboard',function(){ return 'nurse dashboar';})->name('nurse-dashboard');
});

/* -------------------------------TECHNOLOGIST DASHBOARD------------------------------- */
Route::middleware(TechnologistMiddleware::class)->group(function () {
    Route::get('/technologist-dashboard',function(){ return 'techonolgists dashboar';})->name('technologist-dashboard');
});

/* -------------------------------RECEPTIONIST DASHBOARD------------------------------- */
Route::middleware(ReceptionistMiddleware::class)->group(function () {
    Route::get('/receptionist-dashboard',function(){ return 'receptionist dashboar';})->name('receptionist-dashboard');
});
