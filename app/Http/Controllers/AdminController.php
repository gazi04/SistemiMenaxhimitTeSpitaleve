<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departament;
use App\Models\Doctor;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function showDepartaments()
    {
        return view('admin.manageDepartaments', ['departaments' => Departament::all()]);
    }

    public function saveDepartament(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:255',
        ]);
        Departament::create($validated);
        return redirect()->route('show-departaments')->with('success', 'Departament inserted successfully.');
    }

    public function updateDepartament(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:departaments,id',
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:255',
        ]);
        $departament = Departament::findOrFail($validated['id']);
        $departament->update($validated);
        return redirect()->route('show-departaments')->with('success', 'Departament updated successfully.');
    }

    public function deleteDepartament($id)
    {
        $departament = Departament::findOrFail($id);
        $doctor = Doctor::where('departament_id', $id)->first();
        if ($doctor) {
            $message = 'Departament can\'t be deleted since a doctor is in that departament. His name is '.$doctor->first_name;
            return redirect()->route('show-departaments')->with('test', $message);
        } else {
            $departament->delete();
            return redirect()->route('show-departaments')->with('test', 'Departament deleted successfully.');
        }
    }
}
