<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function getFreeAppointment()
    {
        return 'test';
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
