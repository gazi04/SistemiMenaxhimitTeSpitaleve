<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;
use Illuminate\Support\Facades\Log;

class PatientController extends Controller
{
    public function index()
    {
        $user = Auth::guard('patient')->user();
        return view('patient.index', ['patient' => $user]);
    }

    public function searchPatient(Request $request)
    {
        Log::info($request);
        $query = $request->input('query');
        $results = Patient::where('id_number', 'LIKE', "%{$query}%")
            ->orWhere('first_name', 'LIKE', "%{$query}%")
            ->orWhere('last_name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->get();

        return response()->json($results);
    }
}
