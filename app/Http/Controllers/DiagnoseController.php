<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Diagnosis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiagnoseController extends Controller
{
    /* -------------------------------FOR PATIENT------------------------------- */
    public function displayDiagnosesView()
    {
        $appointments = Appointment::where('patient_id', Auth::guard('patient')->user()->id)
            ->with('therapy', 'doctor', 'diagnosis')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('patient.diagnoses', ['appointments' => $appointments]);
    }
}
