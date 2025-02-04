<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Patient;
use App\Mail\SendTestResultsToPatient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

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

    public function sendTestToPatient(Request $request)
    {
        try { $request->validate(['test_id' => 'required|integer|exists:tests,id']); }
        catch (ValidationException $ex) {
            return back()->with('error', "Mesazhi i emailit nuk mund t'i dërgohet pacientit, sepse informacioni i nevojshëm për testin ishte i pavlefshëm.");
        }

        try { $test = Test::findOrFail($request->test_id); }
        catch (\Throwable $th) {
            return back()->with('error', "Email mesazhi nuk mund t'i dërgohet pacientit, sepse testi nuk u gjet në bazën e të dhënave, provoni më vonë.");
        }

        $techno = Auth::guard('technologist')->user();
        try {
            Mail::to($test->patient->email)->send(new SendTestResultsToPatient(
                $techno->first_name .' '. $techno->last_name,
                $techno->email,
                $test->patient->first_name,
                $test->patient->last_name,
                $test->test_type,
                $test->results
            ));
        } catch (\Exception $ex) {
            return back()->with('error', "Mesazhi i emailit nuk mund të dërgohet, ka një problem me sistemin, provoni më vonë ose dërgoni emailin në formë manuale.");
        }
        return back()->with('message', 'Email-i iu dërgua pacientit me sukses.');
    }
}
