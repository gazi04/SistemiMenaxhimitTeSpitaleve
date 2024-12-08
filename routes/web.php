<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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

    Route::get('/users', function(){return 'menagjo perdoruesit';})->name('manage-users');
});

Route::middleware(DoctorMiddleware::class)->group(function () {
    Route::get('/doctor-dashboard',function(){ return 'doctor dashboar';})->name('doctor-dashboard');
});

Route::middleware(PatientMiddleware::class)->group(function () {
    Route::get('/patient-dashboard',function(){ return 'patient dashboar';})->name('patient-dashboard');
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
