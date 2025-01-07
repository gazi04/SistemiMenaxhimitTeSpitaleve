<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\DoctorMiddleware;
use App\Http\Middleware\PatientMiddleware;
use App\Http\Middleware\NurseMiddleware;
use App\Http\Middleware\TechnologistMiddleware;
use App\Http\Middleware\ReceptionistMiddleware;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'openCreatePatientview'])->name('create-patient-view');
Route::post('/register', [LoginController::class, 'createPatient'])->name('create-patient');

Route::get('/email/verify', [EmailController::class, 'openVerifyEmailView'])->middleware('auth:patient')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [EmailController::class, 'verifyEmail'])->middleware(['auth:patient', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', [EmailController::class, 'ResendVerificationLink'])->middleware(['auth:patient', 'throttle:6,1'])->name('verification.send');

/* -------------------------------ADMIN DASHBOARD------------------------------- */
Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin-dashboard');

    /* -------------------------------DEPARTAMENT MANAGEMENT------------------------------- */
    Route::get('/departaments', [AdminController::class, 'displayDepartaments'])->name('show-departaments');
    Route::delete('/departaments/delete/{id}', [AdminController::class, 'deleteDepartament'])->name('delete-departament');
    Route::get('/departaments/create', [AdminController::class, 'openCreateDepartamentView'])->name('create-departament-view');
    Route::post('/departaments/save', [AdminController::class, 'saveDepartament'])->name('save-departament');
    Route::get('/departaments/update/{id}', [AdminController::class, 'openEditDepartamentView'])->name('edit-departament-view');
    Route::post('/departaments/update', [AdminController::class, 'updateDepartament'])->name('update-departament');

    /* TODO- need to remove this endpoint below */
    Route::delete('/patient/delete/{id}', [AdminController::class, 'deletePatient'])->name('delete-patient');

    /* -------------------------------USER MANAGEMENT------------------------------- */
    Route::get('/users/admin', [AdminController::class, 'displayAdmins'])->name('open-admin-view');
    Route::get('/users/create/admin', [AdminController::class, 'openCreateAdminView'])->name('create-admin-view');
    Route::post('/users/create/admin', [AdminController::class, 'createAdmin'])->name('create-admin');
    Route::get('/users/edit/admin/{id}', [AdminController::class, 'openEditAdminView'])->name('edit-admin-view');
    Route::post('/users/edit/admin', [AdminController::class, 'editAdmin'])->name('edit-admin');
    Route::post('/users/fire/admin', [AdminController::class, 'fireAdmin'])->name('fire-admin');
    Route::post('/users/hire/admin', [AdminController::class, 'hireAdmin'])->name('hire-admin');

    Route::get('/users/doctor', [AdminController::class, 'displayDoctors'])->name('open-doctor-view');
    Route::get('/users/create/doctor', [AdminController::class, 'openCreateDoctorView'])->name('create-doctor-view');
    Route::post('/users/create/doctor', [AdminController::class, 'createDoctor'])->name('create-doctor');
    Route::delete('/doctor/delete/{id}', [AdminController::class, 'deleteDoctor'])->name('delete-doctor');
    Route::get('/users/edit/doctor/{id}', [AdminController::class, 'openEditDoctorView'])->name('edit-doctor-view');
    Route::post('/users/edit/doctor', [AdminController::class, 'editDoctor'])->name('edit-doctor');
    Route::post('/users/fire/doctor', [AdminController::class, 'fireDoctor'])->name('fire-doctor');
    Route::post('/users/hire/doctor', [AdminController::class, 'hireDoctor'])->name('hire-doctor');

    Route::get('/users/nurse', [AdminController::class, 'displayNurses'])->name('open-nurse-view');
    Route::get('/users/create/nurse', [AdminController::class, 'openCreateNurseView'])->name('create-nurse-view');
    Route::post('/users/create/nurse', [AdminController::class, 'createNurse'])->name('create-nurse');
    Route::delete('/nurse/delete/{id}', [AdminController::class, 'deleteNurse'])->name('delete-nurse');
    Route::get('/users/edit/nurse/{id}', [AdminController::class, 'openEditNurseView'])->name('edit-nurse-view');
    Route::post('/users/edit/nurse', [AdminController::class, 'editNurse'])->name('edit-nurse');
    Route::post('/users/fire/nurse', [AdminController::class, 'fireNurse'])->name('fire-nurse');
    Route::post('/users/hire/nurse', [AdminController::class, 'hireNurse'])->name('hire-nurse');

    Route::get('/users/receptionist', [AdminController::class, 'displayReceptionist'])->name('open-receptionist-view');
    Route::get('/users/create/receptionist', [AdminController::class, 'openCreateReceptionistView'])->name('create-receptionist-view');
    Route::post('/users/create/receptionist', [AdminController::class, 'createReceptionist'])->name('create-receptionist');
    Route::delete('/receptionist/delete/{id}', [AdminController::class, 'deleteReceptionist'])->name('delete-receptionist');
    Route::get('/users/edit/receptionist/{id}', [AdminController::class, 'openEditReceptionistView'])->name('edit-receptionist-view');
    Route::post('/users/edit/receptionist', [AdminController::class, 'editReceptionist'])->name('edit-receptionist');
    Route::post('/users/fire/receptionist', [AdminController::class, 'fireReceptionist'])->name('fire-receptionist');
    Route::post('/users/hire/receptionist', [AdminController::class, 'hireReceptionist'])->name('hire-receptionist');

    Route::get('/users/technologist', [AdminController::class, 'displayTechnologist'])->name('open-technologist-view');
    Route::get('/users/create/technologist', [AdminController::class, 'openCreateTechnologistView'])->name('create-technologist-view');
    Route::post('/users/create/technologist', [AdminController::class, 'createTechnologist'])->name('create-technologist');
    Route::delete('/technologist/delete/{id}', [AdminController::class, 'deleteTechnologist'])->name('delete-technologist');
    Route::get('/users/edit/technologist/{id}', [AdminController::class, 'openEditTechnologistView'])->name('edit-technologist-view');
    Route::post('/users/edit/technologist', [AdminController::class, 'editTechnologist'])->name('edit-technologist');
    Route::post('/users/fire/technologist', [AdminController::class, 'fireTechnologist'])->name('fire-technologist');
    Route::post('/users/hire/technologist', [AdminController::class, 'hireTechnologist'])->name('hire-technologist');
});

/* -------------------------------DOCTOR DASHBOARD------------------------------- */
Route::middleware(DoctorMiddleware::class)->group(function () {
    Route::get('/doctor/dashboard', [DoctorController::class, 'index'])->name('doctor-dashboard');

    Route::get('/patients', [DoctorController::class, 'openManagePatientView'])->name('manage-patients');
    Route::get('/patient', [PatientController::class, 'showPatient'])->name('show-patient');
    Route::get('/search/patient', [PatientController::class, 'searchPatient'])->name('search-patient');
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
