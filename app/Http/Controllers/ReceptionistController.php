<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class ReceptionistController extends Controller
{
    public function index()
    {
        $todaysAppointments = Appointment::whereDate('start_time', now()->toDateString())
            ->whereTime('start_time', '>=', now()->toTimeString())
            ->join('patients', 'appointments.patient_id', '=', 'patients.id')
            ->select('appointments.*', 'patients.first_name', 'patients.last_name')
            ->orderBy('start_time', 'asc')
            ->get();

        return view('receptionist.index', ['todaysAppointments' => $todaysAppointments]);
    }
    public function changeStatus(Request $request)
    {
        $appointmentId = $request->input('appointment_id');
        $appointment = Appointment::find($appointmentId);

        if ($appointment) {
            $appointment->status = 'Mbërriti në spital';
            $appointment->save();
            return redirect()->route('receptionist-dashboard')->with('message', 'Statusi u ndryshua me sukses.');
        } else {
            return redirect()->route('receptionist-dashboard')->with('error', 'Termini nuk u gjet.');
        }
    }
}
