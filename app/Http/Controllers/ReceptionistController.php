<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ReceptionistController extends Controller
{
    public function index()
    {
        $todaysAppointments = Appointment::whereDate('start_time', now()->toDateString())
            /* ->whereTime('start_time', '>=', now()->toTimeString()) */
            ->join('patients', 'appointments.patient_id', '=', 'patients.id')
            ->select('appointments.*', 'patients.first_name', 'patients.last_name')
            ->orderBy('start_time', 'asc')
            ->get();

        return view('receptionist.index', ['todaysAppointments' => $todaysAppointments]);
    }

    private function changeStatus($appointmentId)
    {
        $appointment = Appointment::find($appointmentId);

        if ($appointment) {
            $appointment->status = 'Mbërriti në spital';
            $appointment->save();
            return redirect()->route('receptionist-dashboard')->with('message', 'Statusi u ndryshua me sukses.');
        } else {
            return redirect()->route('receptionist-dashboard')->with('error', 'Termini nuk u gjet.');
        }
    }

    public function confirmPatientHasArrivedView(Request $request)
    {
        try { $request->validate(['appointment_id' => 'required|integer|exists:appointments,id']); }
        catch (ValidationException $ex) {
            return back()->with('error', "Informacioni i kërkuar për takimin është i pavlefshëm.");
        }

        try { $appointment = Appointment::findOrFail($request->appointment_id); }
        catch (ModelNotFoundException $ex) {
            return back()->with('error', "Të dhënat e takimit nuk u gjetën në bazën e të dhënave, ka një gabim me të dhënat e ofruara, ju lutemi provoni përsëri më vonë.");
        }

        return view('receptionist.confirm-appointment', ["appointment" => $appointment]);
    }

    public function confirmChageStatus(Request $request)
    {
        try {
            $request->validate([
                'appointment_id' => 'required|integer|exists:appointments,id',
                'numri_personal' => 'required|integer|exists:patients,personal_id'
            ]);
        }
        catch (ValidationException $ex) {
            return redirect()->route('receptionist-dashboard')->with('error', "Informacionet e kërkuara për takimin janë të pavlefshme, provoni përsëri më vonë.");
        }

        try { $appointment = Appointment::findOrFail($request->appointment_id); }
        catch (ModelNotFoundException $ex) {
            return redirect()->route('receptionist-dashboard')->with('error', "Të dhënat e takimit nuk u gjetën në bazën e të dhënave, ka një gabim me të dhënat e ofruara, ju lutemi provoni përsëri më vonë.");
        }

        if ($appointment->patient->personal_id == $request->numri_personal) {
            $this->changeStatus($appointment->id);
            return redirect()->route('receptionist-dashboard')->with('message', 'Numri personal i pacientit u konfirmua dhe statusi i tij i takimit ndryshoi gjithashtu në mbërritje.');
        }
        else {
            return redirect()->route('receptionist-dashboard')->with('error', "Numri personal e dhënë nuk është e njëjtë me numrin personal të pacientit që ka këtë takim.");
        }
        return $appointment->patient;

        return view('receptionist.confirm-appointment', ["appointment" => $appointment]);
    }
}
