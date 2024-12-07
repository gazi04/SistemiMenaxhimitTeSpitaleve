<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Technologist;
use App\Models\Nurse;
use App\Models\Receptionist;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        if(Auth::guard('admin')->check()) {
            return redirect()->route('admin-dashboard');
        }
        if(Auth::guard('doctor')->check()) {
            return redirect()->route('doctor-dashboard');
        }
        if(Auth::guard('patient')->check()) {
            return redirect()->route('patient-dashboard');
        }
        if(Auth::guard('nurse')->check()) {
            return redirect()->route('nurse-dashboard');
        }
        if(Auth::guard('technologist')->check()) {
            return redirect()->route('technologist-dashboard');
        }
        if(Auth::guard('receptionist')->check()) {
            return redirect()->route('receptionist-dashboard');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        /* TODO: need to change in all the table the role id to id_number */
        $credentials = $request->validate([
            'id_number' => 'required',
            'personal_id' => 'required',
        ]);

        $admin = Admin::where($credentials)->first();
        if ($admin) {
            Auth::guard('admin')->login($admin);
            return $admin;
        }
        $doctor = Doctor::where($credentials)->first();
        if ($doctor) {
            Auth::guard('doctor')->login($doctor);
            return $doctor;
        }

        $patient = Patient::where($credentials)->first();
        if ($patient) {
            Auth::guard('patient')->login($patient);
            return $patient;
        }

        $nurse = Nurse::where($credentials)->first();
        if ($nurse) {
            Auth::guard('nurse')->login($nurse);
            return $nurse;
        }

        $technologist = Technologist::where($credentials)->first();
        if ($technologist) {
            Auth::guard('technologist')->login($technologist);
            return $technologist;
        }

        $receptionist = Receptionist::where($credentials)->first();
        if ($receptionist) {
            Auth::guard('receptionist')->login($receptionist);
            return $receptionist;
        }



        // Check in Admin table first
        /* $admin = Admin::where('id_number', $credentials['id_number']) */
        /*     ->where('personal_id', $credentials['personal_id']) */
        /*     ->first(); */
        /**/
        /* Log::debug("LoginController Admin"); */
        /* Log::debug($admin); */
        /* Log::debug("--------------------------------------------------"); */
        /**/
        /* if ($admin) { */
        /*     Auth::guard('web')->login($admin); */
        /*     return redirect()->route('adminDash'); */
        /* } */
        /**/
        /* // Check in User table next */
        /* $user = User::where('id_number', $credentials['id_number']) */
        /*     ->where('personal_id', $credentials['personal_id']) */
        /*     ->first(); */
        /* Log::debug("LoginController User"); */
        /* Log::debug($user); */
        /* Log::debug("--------------------------------------------------"); */
        /**/
        /* if ($user) { */
        /*     Auth::guard('web')->login($user); */
        /*     return redirect()->route('userDash'); */
        /* } */

        return back()->withErrors([
            'credentials' => 'Invalid ID Number or Personal ID.',
        ]);
    }

    public function logout(Request $request)
    {
        /* Auth::logout(); */
        /* return redirect('/login'); */

        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }
        if (Auth::guard('doctor')->check()) {
            Auth::guard('doctor')->logout();
        }
        if (Auth::guard('patient')->check()) {
            Auth::guard('patient')->logout();
        }
        if (Auth::guard('nurse')->check()) {
            Auth::guard('nurse')->logout();
        }
        if (Auth::guard('technologist')->check()) {
            Auth::guard('technologist')->logout();
        }
        if (Auth::guard('receptionist')->check()) {
            Auth::guard('receptionist')->logout();
        }

        return redirect('/login');
    }
}
