<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class TherapyController extends Controller
{
    public function index(Request $request)
    {
        return view('doctor.patient.create-therapy', ['patientId' => $request->patientId]);
    }

    public function createTherapy(Request $request)
    {
        $patient = Patient::find($request->patientId);

        if (!$patient) {
            return redirect()->back()->with('error', 'Patient not found.');
        }

        return redirect()->route('show-patient', ['id' => $patient->id])
            ->with('message', 'Terapia u krijua me sukses.');
    }
}
