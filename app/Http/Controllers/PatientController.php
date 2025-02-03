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

    public function indexForAdmin()
    {
        return view('admin.pacienti', ['patients' => Patient::lazy()]);
    }

    public function modifyPatientView($id)
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return redirect()->route('open-patient-view')->with('error', 'Ka një gabim në sistem, pacienti nuk u gjet.');
        }

        return view('admin.modifiko-pacientin', ['patient' => $patient]);
    }

    public function modifyPatient(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer',
            'numri_personal' => 'required|integer',
            'emri' => 'required|string',
            'mbiemri' => 'required|string',
            'email' => 'required|email:filter',
            'numri_kontaktues' => 'required|numeric|max_digits:15|min_digits:7',
            'gjinia' => 'numeric|in:0,1',
        ]);

        try { $patient = Patient::findOrFail($validated['id']); }
        catch(ModelNotFoundException $e){
            return redirect()->route('open-patient-view')->with('error', 'Nuk mund te perditesohet pacienti me ID '.$validated['id']);
        }

        $patient->update([
            'personal_id' => $validated['numri_personal'],
            'first_name' => $validated['emri'],
            'last_name' => $validated['mbiemri'],
            'phone_number' => $validated["numri_kontaktues"],
            'email' => $validated["email"],
            'gender' => $validated["gjinia"],
        ]);
        return redirect()->route('open-patient-view')->with('message', 'Pacienti eshte perditesuar me sukses');
    }

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

        if(Auth::guard('admin')->check()) {
            return view('admin.pacienti', ['patients' => $results]);
        }

        if(Auth::guard('doctor')->check()) {
            return view('doctor.patient.manage', ['patients' => $results]);
        }
    }

    public function showPatient(Request $request)
    {
        try {
            $patient = Patient::with(['appointments.doctor', 'appointments.diagnosis', 'appointments.therapy'])->findOrFail($request->id);

            $ongoingAppointment = Appointment::where('patient_id', $request->id)
                ->where('status', 'Mbërriti në spital')
                ->where('start_time', '<=', now())
                ->where('end_time', '>=', now())
                ->first();

            $appointments = Appointment::where('patient_id', $request->id)
                ->where('start_time', '<=', now())
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
        } catch (ValidationException $e) {
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
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Ka ndodhur një gabim sistemi, ku ID-të e pacientit dhe të takimit nuk gjenden në bazën e të dhënave.');
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
