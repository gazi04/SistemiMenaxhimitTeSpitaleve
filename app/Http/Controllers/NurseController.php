<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medication;

class NurseController extends Controller
{
    public function dashboard()
    {
        $medications = Medication::paginate(10);
        return view('nurse.nurse-dashboard', compact('medications'));
    }
    public function stoku()
    {
        $medications = Medication::all();
        $lowStockMedications = $medications->where('stock', '<', 10);
        return view('nurse.stoku', compact('medications', 'lowStockMedications'));
    }

    public function orderMedication(Request $request)
    {
        $medication = Medication::find($request->medication_id);
        $medication->stock += $request->quantity;
        $medication->save();

        return redirect()->route('stoku')->with('message', 'Porosia është vendosur me sukses!');
    }


    public function create()
    {
        return view('nurse.shtoMedikament');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:Injeksion,Infuzion',
            'dose' => 'required|string|max:255',
            'description' => 'required|string',
            'stock' => 'required|integer|min:1',
        ]);

        try {
            Medication::create($validated);

            return redirect()->route('nurse-dashboard')->with('message', 'Medikamenti u shtua me sukses!');
        } catch (\Exception $e) {
            return redirect()->route('nurse-dashboard')->with('error', 'Ka ndodhur një gabim. Provoni përsëri.');
        }
    }

    public function searchMedication(Request $request)
    {
        $searchingTerm = $request->input('searchingTerm');
        $medicationType = $request->input('medicationType');

        $query = Medication::query();

        if ($searchingTerm) {
            $query->where('name', 'LIKE', "%{$searchingTerm}%");
        }

        if ($medicationType) {
            $query->where('type', $medicationType);
        }

        $medications = $query->paginate(10);

        return view('nurse.nurse-dashboard', compact('medications'));
    }



    public function useMedication(Request $request)
    {
        // Validate the request for using medication
        $validated = $request->validate([
            'id' => 'required|exists:medications,id',
            'stock' => 'required|integer|min:1',
        ]);

        try {
            $medication = Medication::findOrFail($validated['id']);

            if ($validated['stock'] > $medication->stock) {
                return redirect()->route('nurse-dashboard')->with('error', 'Sasia e kërkuar tejkalon stokun aktual!');
            }

            $medication->stock -= $validated['stock'];
            $medication->save();

            return redirect()->route('nurse-dashboard')->with('message', 'Stoku u përditësua me sukses!');
        } catch (\Exception $e) {
            return redirect()->route('nurse-dashboard')->with('error', 'Ka ndodhur një gabim. Provoni përsëri.');
        }
    }
}
