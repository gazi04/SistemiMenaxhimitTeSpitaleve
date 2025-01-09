<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use App\Models\Patient;
use App\Models\Diagnosis;
use App\Models\Therapy;
use App\Models\Test;

class PatientController extends Controller
{
    public function index()
    {
        $user = Auth::guard('patient')->user();
        $upcomingAppointments = Appointment::where('patient_id', $user->id)
            ->where('start_time', '>', now())
            ->orderBy('start_time', 'asc')
            ->get();

        return view('patient.index', [
            'patient' => $user,
            'upcomingAppointments' => $upcomingAppointments,
        ]);
    }

    public function searchPatient(Request $request)
    {
        $query = $request->input('searchingTerm');
        $results = Patient::where('id_number', 'LIKE', "%{$query}%")
            ->orWhere('first_name', 'LIKE', "%{$query}%")
            ->orWhere('last_name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->orWhere('phone_number', 'LIKE', "%{$query}%")
            ->get();

        return view('doctor.manage-patient', ['patients' => $results]);
    }

    public function showPatient(Request $request)
    {
        try {
            $patient = Patient::with(['appointments.doctor', 'diagnoses', 'therapies', 'tests'])->findOrFail($request->id);
            $diagnoses = Diagnosis::where('patient_id', $request->id)->with('doctor')->orderBy('created_at', 'desc')->get();
            $therapies = Therapy::where('patient_id', $request->id)->with('doctor')->orderBy('created_at', 'desc')->get();
            $tests = Test::where('patient_id', $request->id)->with('technologist')->orderBy('create_at', 'desc')->get();
        }
        catch(ModelNotFoundException $ex) {
            return redirect()->route('manage-patients')->with('error', 'Ka ndodhur nje gabim, nuk mund te gjindet pacienti ne databaze.');
        }

        return view('doctor.patient.show', ['patient' => $patient, 'diagnoses' => $diagnoses, 'therapies' => $therapies, 'tests' => $tests]);
    }
}
