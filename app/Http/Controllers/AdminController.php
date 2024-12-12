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
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Ramsey\Uuid\Type\Integer;

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

    public function editAdminView($id)
    {
        try {
            $admin = Admin::findOrFail($id);
            return view('admin.user.editAdmin', ['adminName' => $admin->name, 'adminEmail' => $admin->email]);
        }
        catch(ModelNotFoundException $e){
            return 'ska admin me id '.$id;
        }
    }

    public function editAdmin(Request $request)
    {
        return 'wait editing admin';
    }

    public function deleteAdmin($id)
    {
        $admin = Admin::findOrFail($id);
        if ($admin) {
            $admin->delete();
            return redirect()->route('show-users')->with('success', 'Admin with id '.$id.'is deleted successfully');
        } else {
            return redirect()->route('show-users')->with('error', "Admin can't be deleted cause the id doesn't exists in the dabase");
        }
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

    public function editDoctorView($id)
    {
        try {
            $doctor = Doctor::findOrFail($id);
            return view('admin.user.editDoctor', ['doctorName' => $doctor->first_name, 'doctorEmail' => $doctor->email]);
        }
        catch(ModelNotFoundException $e){
            return 'ska admin me id '.$id;
        }
    }

    public function editDoctor(Request $request)
    {
        return 'wait editing doctor';
    }

    public function deleteDoctor($id)
    {
        $doctor = Doctor::findOrFail($id);
        if ($doctor) {
            $doctor->delete();
            return redirect()->route('show-users')->with('success', 'Doctor with id '.$id.'is deleted successfully');
        } else {
            return redirect()->route('show-users')->with('error', "Doctor can't be deleted cause the id doesn't exists in the dabase");
        }
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

    public function editNurseView($id)
    {
        try {
            $nurse = Nurse::findOrFail($id);
            return view('admin.user.editNurse', ['nurseName' => $nurse->first_name, 'nurseEmail' => $nurse->email]);
        }
        catch(ModelNotFoundException $e){
            return 'ska admin me id '.$id;
        }
    }

    public function editNurse(Request $request)
    {
        return 'wait editing nurse';
    }

    public function deleteNurse($id)
    {
        $nurse = Nurse::findOrFail($id);
        if ($nurse) {
            $nurse->delete();
            return redirect()->route('show-users')->with('success', 'Nurse with id '.$id.'is deleted successfully');
        } else {
            return redirect()->route('show-users')->with('error', "Nurse can't be deleted cause the id doesn't exists in the dabase");
        }
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

    public function editReceptionistView($id)
    {
        try {
            $receptionist = Receptionist::findOrFail($id);
            return view('admin.user.editReceptionist', ['receptionstName' => $receptionist->first_name, 'receptionstEmail' => $receptionist->email]);
        }
        catch(ModelNotFoundException $e){
            return 'ska receptionist me id '.$id;
        }
    }

    public function editReceptionist(Request $request)
    {
        return 'wait editing receptionist';
    }

    public function deleteReceptionist($id)
    {
        $receptionist = Receptionist::findOrFail($id);
        if ($receptionist) {
            $receptionist->delete();
            return redirect()->route('show-users')->with('success', 'Receptionist with id '.$id.'is deleted successfully');
        } else {
            return redirect()->route('show-users')->with('error', "Receptionist can't be deleted cause the id doesn't exists in the dabase");
        }
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

    public function editTechnologistView($id)
    {
        try {
            $technologist = Technologist::findOrFail($id);
            return view('admin.user.editTechnologist', ['technologistName' => $technologist->first_name, 'technologistEmail' => $technologist->email]);
        }
        catch(ModelNotFoundException $e){
            return 'ska teknologu me id '.$id;
        }
    }

    public function editTechnologist(Request $request)
    {
        return 'wait editing technologist';
    }

    public function deleteTechnologist($id)
    {
        $technologist = Technologist::findOrFail($id);
        if ($technologist) {
            $technologist->delete();
            return redirect()->route('show-users')->with('success', 'Technologist with id '.$id.'is deleted successfully');
        } else {
            return redirect()->route('show-users')->with('error', "Technologist can't be deleted cause the id doesn't exists in the dabase");
        }
    }
}
