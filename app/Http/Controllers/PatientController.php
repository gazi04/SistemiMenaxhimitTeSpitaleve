<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Diagnosis;
use App\Models\Therapy;
use App\Models\Test;
use Exception;

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
            $patient = Patient::with(['appointments.doctor', 'appointments.diagnosis', 'appointments.therapy'])->findOrFail($request->id);

            $ongoingAppointment = Appointment::where('patient_id', $request->id)
                /* TODO- NEED ALSO TO CHANGE THE STATUS  */
                /* ->where('status', 'arrived') */
                ->where('start_time', '<=', now())
                ->where('end_time', '>=', now())
                ->first();

            $appointments = Appointment::where('patient_id', $request->id)
                ->with(['doctor', 'diagnosis', 'therapy'])
                ->orderBy('start_time', 'desc')
                ->get();
        } catch (ModelNotFoundException $ex) {
            return redirect()->route('manage-patients')->with('error', 'Ka ndodhur një gabim, nuk mund të gjindet pacienti në databazë.');
        }

        return view('doctor.patient.show', [
            'patient' => $patient,
            'appointments' => $appointments,
            'ongoingAppointment' => $ongoingAppointment,
        ]);
    }

    /* public function showPatient(Request $request) */
    /* { */
    /*     try { */
    /*         $patient = Patient::with(['appointments.doctor', 'diagnoses', 'therapies', 'tests'])->findOrFail($request->id); */
    /*         $ongoingAppointment = Appointment::where('patient_id', $request->id) */
    /*         ->where('status', 'arrived') */
    /*         ->where('start_time', '<=', now()) */
    /*         ->where('end_time', '>=', now()) */
    /*         ->first(); */
    /*         $diagnoses = Diagnosis::where('patient_id', $request->id)->with('doctor')->orderBy('created_at', 'desc')->get(); */
    /*         $therapies = Therapy::where('patient_id', $request->id)->with('doctor')->orderBy('created_at', 'desc')->get(); */
    /*         $tests = Test::where('patient_id', $request->id)->with('technologist')->orderBy('create_at', 'desc')->get(); */
    /*     } */
    /*     catch(ModelNotFoundException $ex) { */
    /*         return redirect()->route('manage-patients')->with('error', 'Ka ndodhur nje gabim, nuk mund te gjindet pacienti ne databaze.'); */
    /*     } */
    /**/
    /*     return view('doctor.patient.show', [ */
    /*         'patient' => $patient, */
    /*         'diagnoses' => $diagnoses, */
    /*         'therapies' => $therapies, */
    /*         'tests' => $tests, */
    /*         'ongoingAppointment' => $ongoingAppointment */
    /*     ]); */
    /* } */

    public function treatPatientView(Request $request)
    {
        try {
            $validated = $request->validate([
                'patient_id' => 'required|integer|exists:patients,id',
                'appointment_id' => 'required|integer|exists:appointments,id',
            ]);
        }
        catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Ka ndodhur nje gabim ne sistem, ku id pacientit dhe takimit nuk gjenden ne databaze');
        }
        return view('doctor.patient.treat', [
            'patient_id' => $validated['patient_id'],
            'appointment_id' => $validated['appointment_id']
        ]);
    }

    public function treatPatient(Request $request)
    {
        try {
            $request->validate([
                'patient_id' => 'required|exists:patients,id',
                'appointment_id' => 'required|exists:appointments,id',
                'diagnose' => 'required|string',
                'therapy' => 'required|string',
            ]);
        }
        catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Ka ndodhur nje gabim ne sistem, ku id pacientit dhe takimit nuk gjenden ne databaze');
        }

        $patient = Patient::findOrFail($request->patient_id);
        $appointment = Appointment::findOrFail($request->appointment_id);

        $doctor = Auth::guard('doctor')->user();

        $diagnosis = Diagnosis::create([
            'patient_id' => $patient->id,
            'doctor_id' => $doctor->id,
            'notes' => $request->diagnose,
        ]);

        $therapy = Therapy::create([
            'patient_id' => $patient->id,
            'doctor_id' => $doctor->id,
            'notes' => $request->therapy,
        ]);

        $appointment->update([
            'diagnoses_id' => $diagnosis->id,
            'therapy_id' => $therapy->id,
            'status' => 'completed',
        ]);

        return redirect()->route('manage-appointments-view')->with('success', 'Pacienti u trajtua me sukses');
    }
}
