<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    /* -------------------------------FOR PATIENT------------------------------- */
    public function displayTestView()
    {
        $tests = Test::where('patient_id', Auth::guard('patient')->user()->id)
            ->with('technologist')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('patient.tests', ['tests' => $tests]);
    }

    /* -------------------------------FOR TECHNOLOGIST------------------------------- */
    public function searchTests(Request $request)
    {
        $query = $request->input('searchingTerm');
        $id = $request->input('patient_id');

        $allTests = Test::whereHas('patient', function ($patientQuery) use ($query) {
            $patientQuery->where('first_name', 'LIKE', "%{$query}%")
                ->orWhere('last_name', 'LIKE', "%{$query}%");
        })->get();

        $test = Test::with('patient')->findOrFail($id);

        return view('technologist.tests.show', compact('test', 'allTests'));
    }
}
