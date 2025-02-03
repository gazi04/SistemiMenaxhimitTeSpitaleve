<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
{
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
