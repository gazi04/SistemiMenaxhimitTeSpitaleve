<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class AppointmentController extends Controller
{
    public function index()
    {
        return view('patient.appointment.index', [
            'patient' => Auth::guard('patient')->user(),
            'doctors' => Doctor::all(),
            'departaments' => Departament::all()
        ]);
    }

    public function getFreeAppointment(Request $request)
    {
        $validated = $request->validate([
            "start_date" => "required|date|after:yesterday",
            "end_date" => "required|date|after:start_date",
            "doctorId" => "required|integer|exists:doctors,id"
        ]);

        $startDate = Carbon::parse($validated['start_date']);
        $endDate = Carbon::parse($validated['end_date']);
        $doctorId = $validated['doctorId'];

        $availableAppointments = [];

        while ($startDate->lte($endDate)) {
            $startTime = $startDate->copy()->setTime(8, 0);
            $endTime = $startDate->copy()->setTime(20, 0);

            while ($startTime->lt($endTime)) {
                $appointmentStart = $startTime->copy();
                $appointmentEnd = $startTime->copy()->addHours(2);

                $isTaken = Appointment::where('doctor_id', $doctorId)
                    ->where(function ($query) use ($appointmentStart, $appointmentEnd) {
                        $query->whereBetween('start_time', [$appointmentStart, $appointmentEnd])
                            ->orWhereBetween('end_time', [$appointmentStart, $appointmentEnd]);
                    })->exists();

                if (!$isTaken) {
                    $availableAppointments[] = [
                        'doctorId' => $doctorId,
                        'date' => $startDate->toDateString(),
                        'start_time' => $appointmentStart->toTimeString(),
                        'end_time' => $appointmentEnd->toTimeString(),
                    ];
                }

                $startTime->addHours(2);
            }

            $startDate->addDay();
        }

        return view('patient.appointment.available', ['availableAppointments' => $availableAppointments]);
    }

    public function setAppointment(Request $request)
    {
        $validated = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        Appointment::create([
            'doctor_id' => $validated['doctor_id'],
            'patient_id' => Auth::guard('patient')->id(),
            'start_time' => $validated['date'] . ' ' . $validated['start_time'],
            'end_time' => $validated['date'] . ' ' . $validated['end_time'],
            'status' => 'pending',
        ]);

        return redirect()->route('patient-dashboard');
    }

    public function getDoctorsByDepartment($departamentId)
    {
        $doctors = Doctor::where('departament_id', $departamentId)->get(['id', 'first_name']);
        return response()->json(['doctors' => $doctors]);
    }

    public function getDepartmentByDoctor($doctorId)
    {
        $doctor = Doctor::find($doctorId);
        return response()->json(['department_id' => $doctor ? $doctor->department_id : null]);
    }

}
