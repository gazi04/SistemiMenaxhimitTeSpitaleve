<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class AppointmentController extends Controller
{
    /* ------------------------- THE METHODS DOWN ARE USED FOR THE PATIENT MODULE ------------------------- */
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
            "end_date" => "required|date|after_or_equal:start_date",
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
                        $query->where(function ($q) use ($appointmentStart, $appointmentEnd) {
                            $q->where('start_time', '<', $appointmentEnd)
                                ->where('start_time', '>=', $appointmentStart);
                        })
                            ->orWhere(function ($q) use ($appointmentStart, $appointmentEnd) {
                                $q->where('end_time', '>', $appointmentStart)
                                    ->where('end_time', '<=', $appointmentEnd);
                            })
                            ->orWhere(function ($q) use ($appointmentStart, $appointmentEnd) {
                                $q->where('start_time', '<=', $appointmentStart)
                                    ->where('end_time', '>=', $appointmentEnd);
                            });
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

        /* TODO- NEED TO CHECK IF THAT THE PATIENT DOESN'T HAVE ANY OTHER APPOINMENTS BY OTHER DOCTORS */
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

    /* ------------------------- THE METHODS DOWN ARE USED FOR THE DOCTOR MODULE ------------------------- */
    public function manageAppointmentsView()
    {
        $doctorId = Auth::guard('doctor')->id();

        $upcomingAppointments = Appointment::where('doctor_id', $doctorId)
            ->where('start_time', '>', now())
            ->join('patients', 'appointments.patient_id', '=', 'patients.id')
            ->select('appointments.*', 'patients.first_name', 'patients.last_name')
            ->orderBy('start_time', 'desc')
            ->get();

        $todaysAppointments = Appointment::where('doctor_id', $doctorId)
            ->whereDate('start_time', now()->toDateString())
            ->join('patients', 'appointments.patient_id', '=', 'patients.id')
            ->select('appointments.*', 'patients.first_name', 'patients.last_name')
            ->orderBy('start_time', 'desc')
            ->get();

        return view('doctor.appointments.index', compact('upcomingAppointments', 'todaysAppointments'));
    }

    public function modifyAppointmentView(Request $request)
    {
        try { $appointment = Appointment::findOrFail($request->appointmentId); }
        catch (ModelNotFoundException $ex)
        {
            return redirect()->route('manage-appointments-view')->with('error', 'Ka ndodhur nje gabim, nuk mund te gjindet termini ne databaze.');
        }
        return view('doctor.appointments.modify', ['appointment' => $appointment]);
    }
}
