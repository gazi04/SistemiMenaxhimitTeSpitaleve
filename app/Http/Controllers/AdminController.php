<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departament;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Nurse;
use App\Models\Patient;
use App\Models\Reception;
use App\Models\Receptionist;
use App\Models\Technologist;

class AdminController extends Controller
{
    public function dashboard() { return view('admin.dashboard'); }

    public function showDepartaments() { return view('admin.manageDepartaments', ['departaments' => Departament::all()]); }

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

    public function showUsers()
    {
        $data =  [
            'admins' => Admin::all(),
            'doctors' => Doctor::all(),
            'patients' => Patient::all(),
            'nurses' => Nurse::all(),
            'receptionists' => Receptionist::all(),
            'technologists' => Technologist::all()
        ];
        return view('admin.manageUsers', $data);
    }

    public function createAdmin(Request $request)
    {
        $valid = $request->validate([
            'personal_id' => 'required|integer',
            'name' => 'required|string',
            'email' => 'required|email:filter'
        ]);

        Admin::create([
            'personal_id' => $valid['personal_id'],
            'name' => $valid['name'],
            'email' => $valid['email']
        ]);
        return redirect()->route('show-users')->with('success', 'Admin is created successfully');
    }

    public function createDoctorView()
    {
        return view('admin.user.createDoctor', ['departaments' => Departament::all()]);
    }
    public function createDoctor(Request $request)
    {
        $valid = $request->validate([
            'personal_id' => 'required|integer',
            'departament_id' => 'required|integer|exists:departaments,id',
            'name' => 'required|string',
            'surname' => 'required|string',
            'phoneNumber' => 'required|numeric|max_digits:15|min_digits:7',
            'email' => 'required|email:filter'
        ]);

        Doctor::create([
            'personal_id' => $valid['personal_id'],
            'departament_id' => $valid['departament_id'],
            'first_name' => $valid['name'],
            'last_name' => $valid['surname'],
            'phone_number' => $valid['phoneNumber'],
            'email' => $valid['email']
        ]);
        return redirect()->route('show-users')->with('success', 'Doctor is created successfully');
    }

    public function createNurse(Request $request)
    {
        $valid = $request->validate([
            'personal_id' => 'required|integer',
            'name' => 'required|string',
            'surname' => 'required|string',
            'phoneNumber' => 'required|numeric|max_digits:15|min_digits:7',
            'email' => 'required|email:filter'
        ]);

        Nurse::create([
            'personal_id' => $valid['personal_id'],
            'first_name' => $valid['name'],
            'last_name' => $valid['surname'],
            'phone_number' => $valid['phoneNumber'],
            'email' => $valid['email']
        ]);
        return redirect()->route('show-users')->with('success', 'Nurse is created successfully');
    }

    public function createReceptionist(Request $request)
    {
        $valid = $request->validate([
            'personal_id' => 'required|integer',
            'name' => 'required|string',
            'surname' => 'required|string',
            'phoneNumber' => 'required|numeric|max_digits:15|min_digits:7',
            'email' => 'required|email:filter'
        ]);

        Receptionist::create([
            'personal_id' => $valid['personal_id'],
            'first_name' => $valid['name'],
            'last_name' => $valid['surname'],
            'phone_number' => $valid['phoneNumber'],
            'email' => $valid['email']
        ]);
        return redirect()->route('show-users')->with('success', 'Receptionist is created successfully');
    }

    public function createTechnologist(Request $request)
    {
        $valid = $request->validate([
            'personal_id' => 'required|integer',
            'name' => 'required|string',
            'surname' => 'required|string',
            'phoneNumber' => 'required|numeric|max_digits:15|min_digits:7',
            'email' => 'required|email:filter'
        ]);

        Technologist::create([
            'personal_id' => $valid['personal_id'],
            'first_name' => $valid['name'],
            'last_name' => $valid['surname'],
            'phone_number' => $valid['phoneNumber'],
            'email' => $valid['email']
        ]);
        return redirect()->route('show-users')->with('success', 'Technologist is created successfully');
    }
}
