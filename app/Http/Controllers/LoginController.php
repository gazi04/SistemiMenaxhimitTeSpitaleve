<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Technologist;
use App\Models\Nurse;
use App\Models\Receptionist;
use Illuminate\Support\Facades\Log;

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
            if($this->isEmployed($admin) == 0) {
                return redirect()->route('login')->with('message', 'Ti nuk mund te kyqesh, je pushuar nga puna.');
            }

            try {Auth::guard('admin')->login($admin);}
            catch(Exception $e) {
                return redirect()->route('login')->with('message', 'Identifikimi deshtoi. Prove serish me vone.');
            }
            return redirect()->route('admin-dashboard');
        }

        $doctor = Doctor::where($credentials)->first();
        if ($doctor) {
            if($this->isEmployed($doctor) == 0) {
                return redirect()->route('login')->with('message', 'Ti nuk mund te kyqesh, je pushuar nga puna.');
            }

            try {Auth::guard('doctor')->login($doctor);}
            catch(Exception $e) {
                return redirect()->route('login')->with('message', 'Identifikimi deshtoi. Prove serish me vone.');
            }
            return redirect()->route('doctor-dashboard');
        }

        $patient = Patient::where($credentials)->first();
        if ($patient) {
            try {Auth::guard('patient')->login($patient);}
            catch(Exception $e) {
                return redirect()->route('login')->with('message', 'Identifikimi deshtoi. Prove serish me vone.');
            }
            return redirect()->route('patient-dashboard');
        }

        $nurse = Nurse::where($credentials)->first();
        if ($nurse) {
            if($this->isEmployed($nurse) == 0) {
                return redirect()->route('login')->with('message', 'Ti nuk mund te kyqesh, je pushuar nga puna.');
            }

            try {Auth::guard('nurse')->login($nurse);}
            catch(Exception $e) {
                return redirect()->route('login')->with('message', 'Identifikimi deshtoi. Prove serish me vone.');
            }
            return redirect()->route('nurse-dashboard');
        }

        $technologist = Technologist::where($credentials)->first();
        if ($technologist) {
            if($this->isEmployed($technologist) == 0) {
                return redirect()->route('login')->with('message', 'Ti nuk mund te kyqesh, je pushuar nga puna.');
            }

            try {Auth::guard('technologist')->login($technologist);}
            catch(Exception $e) {
                return redirect()->route('login')->with('message', 'Identifikimi deshtoi. Prove serish me vone.');
            }
            return redirect()->route('technologist-dashboard');
        }

        $receptionist = Receptionist::where($credentials)->first();
        if ($receptionist) {
            if($this->isEmployed($receptionist) == 0) {
                return redirect()->route('login')->with('message', 'Ti nuk mund te kyqesh, je pushuar nga puna.');
            }

            try {Auth::guard('receptionist')->login($receptionist);}
            catch(Exception $e) {
                return redirect()->route('login')->with('message', 'Identifikimi deshtoi. Prove serish me vone.');
            }
            return redirect()->route('receptionist-dashboard');
        }

        return redirect()->route('login')->with('error', 'Kredencialet e pavlefshme');
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

    private function isEmployed(Model $model)
    {
        Log::info(!$model->is_employed);
        return $model->is_employed;
    }

    public function openCreatePatientview()
    {
        return view('auth.register');
    }

    public function createPatient(Request $request)
    {
        $validated = $request->validate([
            'numri_personal' => 'required|integer|unique:patients,personal_id',
            'emri' => 'required|string',
            'mbiemri' => 'required|string',
            'gjinia' => 'required|integer|in:0,1',
            'numri_kontaktues' => 'required|numeric|max_digits:15|min_digits:7|unique:patients,phone_number',
            'email' => 'required|email:filter|unique:patients,email'
        ]);

        $patient = Patient::create([
            'personal_id' => $validated['numri_personal'],
            'first_name' => $validated['emri'],
            'last_name' => $validated['mbiemri'],
            'gender' => $validated['gjinia'],
            'phone_number' => $validated['numri_kontaktues'],
            'email' => $validated['email']
        ]);

        $patient->sendEmailVerificationNotification();

        try {Auth::guard('patient')->login($patient);}
        catch(Exception $e) {
            return redirect()->route('login')->with('message', 'Identifikimi deshtoi. Prove serish me vone.');
        }

        return redirect()->route('patient-dashboard');
    }
}
