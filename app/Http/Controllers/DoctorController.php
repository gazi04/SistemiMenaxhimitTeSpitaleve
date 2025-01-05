<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Patient;

class DoctorController extends Controller
{
    public function index()
    {
        $username = '';
        if (Auth::guard('doctor')->check()) {
            $username = Auth::guard('doctor')->user()->first_name;
        }
        return view('doctor.index', ['username'=>$username]);
    }

    public function openManagePatientView() { return view('doctor.manage-patient', ['patients' => Patient::all()]); }
}
