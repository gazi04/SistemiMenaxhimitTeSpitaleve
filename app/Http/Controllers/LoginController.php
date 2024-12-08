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
        $credentials = $request->validate([
            'id_number' => 'required',
            'personal_id' => 'required',
        ]);

        $admin = Admin::where($credentials)->first();
        if ($admin) {
            Auth::guard('admin')->login($admin);
            return redirect()->route('admin-dashboard');
        }
        $doctor = Doctor::where($credentials)->first();
        if ($doctor) {
            Auth::guard('doctor')->login($doctor);
            return redirect()->route('doctor-dashboard');
        }

        $patient = Patient::where($credentials)->first();
        if ($patient) {
            Auth::guard('patient')->login($patient);
            return redirect()->route('patient-dashboard');
        }

        $nurse = Nurse::where($credentials)->first();
        if ($nurse) {
            Auth::guard('nurse')->login($nurse);
            return redirect()->route('nurse-dashboard');
        }

        $technologist = Technologist::where($credentials)->first();
        if ($technologist) {
            Auth::guard('technologist')->login($technologist);
            return redirect()->route('technologist-dashboard');
        }

        $receptionist = Receptionist::where($credentials)->first();
        if ($receptionist) {
            Auth::guard('receptionist')->login($receptionist);
            return redirect()->route('receptionist-dashboard');
        }

        return back()->withErrors([
            'credentials' => 'Invalid ID Number or Personal ID.',
        ]);
    }

    public function logout(Request $request)
    {
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
