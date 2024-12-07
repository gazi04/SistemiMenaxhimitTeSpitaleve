<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\DoctorMiddleware;
use App\Http\Middleware\PatientMiddleware;
use App\Http\Middleware\NurseMiddleware;
use App\Http\Middleware\TechnologitsMiddleware;
use App\Http\Middleware\ReceptionistMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/admin-dashboard',function(){ return 'admin dashboar';})->name('admin-dashboard')->middleware(AdminMiddleware::class);
Route::get('/doctor-dashboard',function(){ return 'doctor dashboar';})->name('doctor-dashboard')->middleware(DoctorMiddleware::class);
Route::get('/patient-dashboard',function(){ return 'patient dashboar';})->name('patient-dashboard')->middleware(PatientMiddleware::class);
Route::get('/nurse-dashboard',function(){ return 'nurse dashboar';})->name('nurse-dashboard')->middleware(NurseMiddleware::class);
Route::get('/technologist-dashboard',function(){ return 'techonolgists dashboar';})->name('technologist-dashboard')->middleware(TechnologitsMiddleware::class);
Route::get('/receptionist-dashboard',function(){ return 'receptionist dashboar';})->name('receptionist-dashboard')->middleware(ReceptionistMiddleware::class);
