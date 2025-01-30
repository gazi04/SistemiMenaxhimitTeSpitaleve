<?php

namespace App\Http\Controllers;

use App\Mail\AppointmentCanceled;
use App\Models\Departament;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Mail\AppointmentChanged;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
        $currentTime = Carbon::now();

        $availableAppointments = [];

        while ($startDate->lte($endDate)) {
            $startTime = $startDate->copy()->setTime(8, 0);
            $endTime = $startDate->copy()->setTime(20, 0);

            while ($startTime->lt($endTime)) {
                $appointmentStart = $startTime->copy();
                $appointmentEnd = $startTime->copy()->addHours(2);

                if ($startDate->isSameDay($currentTime) && $appointmentStart->lt($currentTime)) {
                    $startTime->addHours(2);
                    continue;
                }

                $isTaken = Appointment::where(function ($query) use ($doctorId, $appointmentStart, $appointmentEnd) {
                    $query->where('doctor_id', $doctorId)
                        ->where(function ($q) use ($appointmentStart, $appointmentEnd) {
                            $q->where(function ($q2) use ($appointmentStart, $appointmentEnd) {
                                $q2->where('start_time', '<', $appointmentEnd)
                                    ->where('start_time', '>=', $appointmentStart);
                            })
                                ->orWhere(function ($q2) use ($appointmentStart, $appointmentEnd) {
                                    $q2->where('end_time', '>', $appointmentStart)
                                        ->where('end_time', '<=', $appointmentEnd);
                                })
                                ->orWhere(function ($q2) use ($appointmentStart, $appointmentEnd) {
                                    $q2->where('start_time', '<=', $appointmentStart)
                                        ->where('end_time', '>=', $appointmentEnd);
                                });
                        });
                })->orWhere(function ($query) use ($request, $appointmentStart, $appointmentEnd) {
                    $query->where('patient_id', Auth::guard('patient')->user()->id)
                        ->where(function ($q) use ($appointmentStart, $appointmentEnd) {
                            $q->where(function ($q2) use ($appointmentStart, $appointmentEnd) {
                                $q2->where('start_time', '<', $appointmentEnd)
                                    ->where('start_time', '>=', $appointmentStart);
                            })
                                ->orWhere(function ($q2) use ($appointmentStart, $appointmentEnd) {
                                    $q2->where('end_time', '>', $appointmentStart)
                                        ->where('end_time', '<=', $appointmentEnd);
                                })
                                ->orWhere(function ($q2) use ($appointmentStart, $appointmentEnd) {
                                    $q2->where('start_time', '<=', $appointmentStart)
                                        ->where('end_time', '>=', $appointmentEnd);
                                });
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
        try {
            $validated = $request->validate([
                'doctor_id' => 'required|exists:doctors,id',
                'date' => 'required|date',
                'start_time' => 'required',
                'end_time' => 'required',
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Ka ndodhur një gabim i sistemit, ju lutemi provoni përsëri më vonë.');
        }

        Appointment::create([
            'doctor_id' => $validated['doctor_id'],
            'patient_id' => Auth::guard('patient')->id(),
            'start_time' => $validated['date'] . ' ' . $validated['start_time'],
            'end_time' => $validated['date'] . ' ' . $validated['end_time'],
            /* TODO- NEED TO CHANGE THE PENDING STATUS TO ALBANIAN */
            'status' => 'pending',
        ]);

        return redirect()->route('patient-dashboard')->with('message', 'Takimi juaj është regjistruar me sukses në bazën e të dhënave.');
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
        try {
            $appointment = Appointment::findOrFail($request->appointmentId);
        } catch (ModelNotFoundException $ex) {
            return redirect()->route('manage-appointments-view')->with('error', 'Ka ndodhur nje gabim, nuk mund te gjindet termini ne databaze.');
        }
        return view('doctor.appointments.modify', ['appointment_id' => $appointment->id]);
    }

    public function getFreeAppointmentForDoctor(Request $request)
    {
        $validated = $request->validate([
            "start_date" => "required|date|after:yesterday",
            "end_date" => "required|date|after_or_equal:start_date",
        ]);

        $startDate = Carbon::parse($validated['start_date']);
        $endDate = Carbon::parse($validated['end_date']);

        try {
            $appointment = Appointment::findOrFail($request->appointment_id);
        } catch (ModelNotFoundException $ex) {
            return redirect()->route('manage-appointments-view')->with('error', 'Ndodhi një gabim, i paaftë për të gjetur takimin në bazën e të dhënave.');
        }

        $doctorId = $appointment->doctor_id;

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

        return view('doctor.appointments.available', [
            'availableAppointments' => $availableAppointments,
            'appointment' => $appointment,
        ]);
    }

    public function modifyAppointment(Request $request)
    {
        $validated = $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'new_start_time' => 'required|date',
        ]);

        $validated['new_end_time'] = Carbon::parse($request->new_start_time)->addHours(2);
        $validated['new_start_time'] = Carbon::parse($request->new_start_time);

        try {
            $appointment = Appointment::findOrFail($request->appointment_id);
        } catch (ModelNotFoundException $ex) {
            return redirect()->route('manage-appointments-view')->with('error', 'Ndodhi një gabim gjatë procesit, konsullata nuk mund të gjendet në bazën e të dhënave, provoni përsëri.');
        }

        $appointment->update([
            'start_time' => $validated['new_start_time'],
            'end_time' => $validated['new_end_time']
        ]);

        try {
            $doctor = Auth::guard('doctor')->user();
            $doctor_full_name = $doctor->first_name . ' ' . $doctor->last_name;
            Mail::to($appointment->patient->email)->send(new AppointmentChanged(
                $validated['new_start_time'],
                $doctor->email,
                $doctor_full_name,
                $appointment->patient->first_name
            ));
        } catch (\Exception $ex) {
            Log::error('Failed to send email to patient.', [
                'exception_code' => $ex->getCode(),
                'exception_message' => $ex->getMessage(),
                'stack_trace' => $ex->getTraceAsString(),
                'patient_email' => $appointment->patient->email ?? 'N/A',
                'doctor_email' => Auth::guard('doctor')->user()->email ?? 'N/A',
            ]);
            return redirect()->route('manage-appointments-view')->with('error', 'Takimi është modifikuar me sukses por, ndodhi një gabim gjatë dërgimit të emailit ju sugjerojmë të njoftoni pacientin përmes një mesazhi email.');
        }

        return redirect()->route('manage-appointments-view')->with('message', 'Data e takimit u modifikua me sukses dhe pacienti u njoftua me një email për ndryshimin.');
    }

    public function cancelAppointment(Request $request)
    {
        try {
            $appointment = Appointment::findOrFail($request->appointment_id);
        } catch (ModelNotFoundException $ex) {
            return redirect()->route('manage-appointments-view')->with('error', 'Ndodhi një gabim gjatë procesit, konsullata nuk mund të gjendet në bazën e të dhënave, provoni përsëri.');
        }

        $appointment->update(['status' => 'canceled']);

        try {
            $doctor = Auth::guard('doctor')->user();
            $doctor_full_name = $doctor->first_name . ' ' . $doctor->last_name;
            Mail::to($appointment->patient->email)->send(new AppointmentCanceled(
                $appointment->start_time,
                $doctor->email,
                $doctor_full_name,
                $appointment->patient->first_name
            ));
        } catch (\Exception $ex) {
            Log::error('Failed to send email to patient.', [
                'exception_code' => $ex->getCode(),
                'exception_message' => $ex->getMessage(),
                'stack_trace' => $ex->getTraceAsString(),
                'patient_email' => $appointment->patient->email ?? 'N/A',
                'doctor_email' => Auth::guard('doctor')->user()->email ?? 'N/A',
            ]);

            return redirect()->route('manage-appointments-view')->with('error', 'Takimi është anuluar me sukses por, ndodhi një gabim gjatë dërgimit të emailit ju sugjerojmë të njoftoni pacientin përmes një mesazhi email.');
        }

        return redirect()->route('manage-appointments-view')->with('message', 'Takimi u anulua me sukses.');
    }

}
