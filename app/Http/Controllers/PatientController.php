<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use App\Models\Patient;

class PatientController extends Controller
{
    public function index()
    {
        $user = Auth::guard('patient')->user();
        return view('patient.index', ['patient' => $user]);
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
            $patient = Patient::findOrFail($request->id);
        }
        catch(ModelNotFoundException $ex) {
            return redirect()->route('manage-patients')->with('error', 'Ka ndodhur nje gabim, nuk mund te gjindet pacienti ne databaze.');
        }

        return view('doctor.patient.show', ['patient' => $patient]);
    }
}
