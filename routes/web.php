<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/admin-dashboard',function(){ return 'admin dashboar';})->name('admin-dashboard');
Route::get('/doctor-dashboard',function(){ return 'doctor dashboar';})->name('doctor-dashboard');
Route::get('/patient-dashboard',function(){ return 'patient dashboar';})->name('patient-dashboard');
Route::get('/nurse-dashboard',function(){ return 'nurse dashboar';})->name('nurse-dashboard');
Route::get('/technologist-dashboard',function(){ return 'techonolgists dashboar';})->name('technologist-dashboard');
Route::get('/receptionist-dashboard',function(){ return 'receptionist dashboar';})->name('receptionist-dashboard');
