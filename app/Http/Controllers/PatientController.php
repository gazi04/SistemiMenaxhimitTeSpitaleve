<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;

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
}
