<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class DoctorController extends Controller
{
    public function index() { return redirect()->route('manage-appointments-view'); }


    public function openManagePatientView()
    {
        return view('doctor.patient.manage', ['patients' => Patient::all()]);
    }
}
