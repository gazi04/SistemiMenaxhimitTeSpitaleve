<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;

class DiagnoseController extends Controller
{
    public function index(Request $request)
    {
        return view('doctor.patient.create-diagnose', ['patientId' => $request->patientId]);
    }

    public function createDiagnoses(Request $request)
    {
        $patient = Patient::find($request->patientId);

        if (!$patient) {
            return redirect()->back()->with('error', 'Patient not found.');
        }

        $validated = $request->validate(['notes' => 'required|string']);

        Diagnosis::create([
            'patient_id' => $request->patientId,
            'doctor_id' => Auth::guard('doctor')->user()->id,
            'notes' => $validated['notes']
        ]);

        return redirect()->route('show-patient', ['id' => $patient->id])
            ->with('message', 'Terapia u krijua me sukses.');
    }
}
