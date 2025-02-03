<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Patient; // Add this line

class TechnologistController extends Controller
{
    public function dashboard(Request $request)
    {
        $search = $request->query('search');
        $tests = Test::with('patient')
            ->when($search, function ($query, $search) {
                return $query->whereHas('patient', function ($query) use ($search) {
                    $query->where('first_name', 'like', "%{$search}%")
                        ->orWhere('last_name', 'like', "%{$search}%");
                });
            })
            ->paginate(10);

        return view('technologist.tests.index', compact('tests'));
    }

    public function create()
    {
        $patients = Patient::all();
        return view('technologist.tests.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'technologist_id' => 'required|exists:technologists,id',
            'test_type' => 'required|string|max:100',
            'results' => 'nullable|string',
        ]);

        Test::create([
            'patient_id' => $request->patient_id,
            'technologist_id' => $request->technologist_id,
            'test_type' => $request->test_type,
            'results' => $request->results,
            'created_at' => now(),
        ]);

        return redirect()->route('technologist-dashboard')->with('success', 'Analiza u shtua me sukses!');
    }

    public function show($id)
    {
        $test = Test::with('patient')->findOrFail($id);
        $allTests = Test::with('patient')->where('id', '!=', $id)->get();

        return view('technologist.tests.show', compact('test', 'allTests'));
    }
}
