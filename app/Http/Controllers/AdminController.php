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
    public function index() { return view('admin.dashboard'); }

    public function showDepartaments() { return view('admin.manageDepartaments', ['departaments' => Departament::all()]); }

    public function saveDepartament(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:255',
        ]);
        Departament::create($validated);
        return redirect()->route('show-departaments')->with('message', 'Departamenti u krijua me sukses.');
    }

    public function updateDepartament(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:departaments,id',
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:255',
        ]);

        try { $departament = Departament::findOrFail($validated['id']); }
        catch(ModelNotFoundException $e) {
            return redirect()->route('show-departaments')->with('message', 'Nuk ekziston departamenti me ID '.$validated['id'].' ne databaze.');
        }

        $departament->update($validated);
        return redirect()->route('show-departaments')->with('message', 'Departamenti u perditesua me sukses.');
    }

    public function deleteDepartament($id)
    {
        try { $departament = Departament::findOrFail($id); }
        catch(ModelNotFoundException $e) {
            return redirect()->route('show-departaments')->with('message', 'Nuk ekziston departamenti me ID '.$id.' ne databaze.');
        }

        $doctor = Doctor::where('departament_id', $id)->first();
        if ($doctor) {
            $message = 'Departamenti nuk mund te fshihet pasi nje mjek eshte ne ate departament. Emri i tij eshte '.$doctor->first_name;
        } else {
            $departament->delete();
            $message =  'Departamenti u fshi me sukses.';
        }

        return redirect()->route('show-departaments')->with('message', $message);
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
            'email' => 'required|email:filter|unique:admins,email'
        ]);

        Admin::create([
            'personal_id' => $valid['personal_id'],
            'name' => $valid['name'],
            'email' => $valid['email']
        ]);

        return redirect()->route('show-users')->with('message', 'Administratori eshte krijuar me sukses');
    }

    public function openEditAdminView($id)
    {
        try { $admin = Admin::findOrFail($id); }
        catch(ModelNotFoundException $e){
            return redirect()->route('show-users')->with('message', 'Nuk ekziston administratori me ID '.$id.' ne databaze.');
        }

        return view('admin.user.editAdmin', [
            'id' => $admin->id,
            'personal_id' => $admin->personal_id,
            'adminName' => $admin->name,
            'adminEmail' => $admin->email
        ]);
    }

    public function editAdmin(Request $request)
    {
        $valid = $request->validate([
            'id' => 'required|integer',
            'personal_id' => 'required|integer',
            'name' => 'required|string',
            'email' => 'required|email:filter'
        ]);

        try { $admin = Admin::findOrFail($request['id']); }
        catch(ModelNotFoundException $e){
            return redirect()->route('show-users')->with('message', 'Nuk mund te perditesohet administratori me ID '.$request['id']);
        }

        $admin->update($valid);
        return redirect()->route('show-users')->with('message', 'Administratori eshte perditesuar me sukses');
    }

    public function deleteAdmin($id)
    {
        /* todo- need to take the needed action to verify that the data can be deleted */
        $admin = Admin::findOrFail($id);
        if ($admin) {
            $admin->delete();
            $message = 'Administratori me ID '.$id.'eshte fshir me sukses';
        } else {
            $message = "Administratori nuk mund te fshihet sepse ID-ja nuk ekziston ne bazen e te dhenave";
        }
        return redirect()->route('show-users')->with('message', $message);
    }

    public function openCreateDoctorView() { return view('admin.user.createDoctor', ['departaments' => Departament::all()]); }

    public function createDoctor(Request $request)
    {
        $valid = $request->validate([
            'personal_id' => 'required|integer',
            'departament_id' => 'required|integer|exists:departaments,id',
            'name' => 'required|string',
            'surname' => 'required|string',
            'phoneNumber' => 'required|numeric|max_digits:15|min_digits:7',
            'email' => 'required|email:filter|unique:doctors,email'
        ]);

        Doctor::create([
            'personal_id' => $valid['personal_id'],
            'departament_id' => $valid['departament_id'],
            'first_name' => $valid['name'],
            'last_name' => $valid['surname'],
            'phone_number' => $valid['phoneNumber'],
            'email' => $valid['email']
        ]);
        return redirect()->route('show-users')->with('message', 'Doktor eshte krijuar me sukses');
    }

    public function openEditDoctorView($id)
    {
        try { $doctor = Doctor::findOrFail($id); }
        catch(ModelNotFoundException $e){
            return redirect()->route('show-users')->with('message', 'Nuk ekziston doktori me ID '.$id.' ne databaze.');
        }

        return view('admin.user.editDoctor', [
            'id' => $doctor->id,
            'personal_id' => $doctor->personal_id,
            'departament_id' => $doctor->departament_id,
            'doctorName' => $doctor->first_name,
            'doctorEmail' => $doctor->email,
            'departaments' => Departament::all()
        ]);
    }

    public function editDoctor(Request $request)
    {
        $valid = $request->validate([
            'id' => 'required|integer',
            'personal_id' => 'required|integer',
            'name' => 'required|string',
            'email' => 'required|email:filter',
            'departament_id' => 'required|exists:departaments,id'
        ]);

        try { $doctor = Doctor::findOrFail($request['id']); }
        catch(ModelNotFoundException $e){
            return redirect()->route('show-users')->with('message', 'Nuk mund te perditesohet doktori me ID '.$request['id']);
        }

        $doctor->update($valid);
        return redirect()->route('show-users')->with('message', 'Doktori eshte perditesuar me sukses');
    }

    public function deleteDoctor($id)
    {
        try { $doctor = Doctor::findOrFail($id); }
        catch(ModelNotFoundException $e){
            return 'Doktori me ID '.$id.' nuk ekziston';
        }

        $doctor->delete();
        return redirect()->route('show-users')->with('message', 'Doktori me ID '.$id.'eshte fshire me sukses.');
    }

    public function createNurse(Request $request)
    {
        $valid = $request->validate([
            'personal_id' => 'required|integer',
            'name' => 'required|string',
            'surname' => 'required|string',
            'phoneNumber' => 'required|numeric|max_digits:15|min_digits:7',
            'email' => 'required|email:filter|unique:nurses,email'
        ]);

        Nurse::create([
            'personal_id' => $valid['personal_id'],
            'first_name' => $valid['name'],
            'last_name' => $valid['surname'],
            'phone_number' => $valid['phoneNumber'],
            'email' => $valid['email']
        ]);

        return redirect()->route('show-users')->with('message', 'Infermieri/ja eshte krijuar me sukses');
    }

    public function openEditNurseView($id)
    {
        try {
            $nurse = Nurse::findOrFail($id);
            return view('admin.user.editNurse', [
                'id' => $nurse->id,
                'personal_id' => $nurse->personal_id,
                'nurseName' => $nurse->first_name,
                'nurseEmail' => $nurse->email
            ]);
        }
        catch(ModelNotFoundException $e){
            return redirect()->route('show-users')->with('message', 'Nuk ekziston infermieri/ja me ID '.$id.' ne databaze.');
        }
    }

    public function editNurse(Request $request)
    {
        $valid = $request->validate([
            'id' => 'required|integer',
            'personal_id' => 'required|integer',
            'name' => 'required|string',
            'email' => 'required|email:filter'
        ]);

        try { $nurse = Nurse::findOrFail($request['id']); }
        catch(ModelNotFoundException $e){
            return redirect()->route('show-users')->with('message', 'Nuk mund te perditesohet infermieri/ja me ID '.$request['id']);
        }

        $nurse->update($valid);
        return redirect()->route('show-users');
    }

    public function deleteNurse($id)
    {
        try { $nurse = Nurse::findOrFail($id); }
        catch(ModelNotFoundException $e){
            return 'Infermieri/ja me ID '.$id.' nuk ekziston';
        }

        $nurse->delete();
        return redirect()->route('show-users')->with('message', 'Infermieri/ja me ID-n '.$id.'eshte fshire me sukses.');
    }

    public function createReceptionist(Request $request)
    {
        $valid = $request->validate([
            'personal_id' => 'required|integer',
            'name' => 'required|string',
            'surname' => 'required|string',
            'phoneNumber' => 'required|numeric|max_digits:15|min_digits:7',
            'email' => 'required|email:filter|unique:receptionists,email'
        ]);

        Receptionist::create([
            'personal_id' => $valid['personal_id'],
            'first_name' => $valid['name'],
            'last_name' => $valid['surname'],
            'phone_number' => $valid['phoneNumber'],
            'email' => $valid['email']
        ]);
        return redirect()->route('show-users')->with('message', 'Recepsionisti eshte krijuar me sukses');
    }

    public function openEditReceptionistView($id)
    {
        try {
            $receptionist = Receptionist::findOrFail($id);
            return view('admin.user.editReceptionist', [
                'id' => $receptionist->id,
                'personal_id' => $receptionist->personal_id,
                'receptionistName' => $receptionist->first_name,
                'receptionistEmail' => $receptionist->email
            ]);
        }
        catch(ModelNotFoundException $e){
            return redirect()->route('show-users')->with('message', 'Nuk ekziston recepsionist me ID '.$id.' ne databaze.');
        }
    }

    public function editReceptionist(Request $request)
    {
        $valid = $request->validate([
            'id' => 'required|integer',
            'personal_id' => 'required|integer',
            'name' => 'required|string',
            'email' => 'required|email:filter'
        ]);

        try { $receptionist = Receptionist::findOrFail($request['id']); }
        catch(ModelNotFoundException $e){
            return redirect()->route('show-users')->with('message', 'Nuk mund te perditesohet recepsionisti me ID '.$request['id']);
        }

        $receptionist->update($valid);
        return redirect()->route('show-users');
    }

    public function deleteReceptionist($id)
    {
        try { $receptionist = Receptionist::findOrFail($id); }
        catch(ModelNotFoundException $e){
            return 'Recepsionist me ID '.$id.' nuk ekziston ne databaze';
        }

        $receptionist->delete();
        return redirect()->route('show-users')->with('message', 'Recepsionisti me ID '.$id.'eshte fshire me sukses.');
    }

    public function createTechnologist(Request $request)
    {
        $valid = $request->validate([
            'personal_id' => 'required|integer',
            'name' => 'required|string',
            'surname' => 'required|string',
            'phoneNumber' => 'required|numeric|max_digits:15|min_digits:7',
            'email' => 'required|email:filter|unique:technologists,email'
        ]);

        Technologist::create([
            'personal_id' => $valid['personal_id'],
            'first_name' => $valid['name'],
            'last_name' => $valid['surname'],
            'phone_number' => $valid['phoneNumber'],
            'email' => $valid['email']
        ]);

        return redirect()->route('show-users')->with('message', 'Teknologu eshte krijuar me sukses');
    }

    public function openEditTechnologistView($id)
    {
        try {
            $technologist = Technologist::findOrFail($id);
            return view('admin.user.editTechnologist', [
                'id' => $technologist->id,
                'personal_id' => $technologist->personal_id,
                'technologistName' => $technologist->first_name,
                'technologistEmail' => $technologist->email
            ]);
        }
        catch(ModelNotFoundException $e){
            return redirect()->route('show-users')->with('message', 'Nuk ekziston teknologu me ID '.$id.' ne databaze.');
        }
    }

    public function editTechnologist(Request $request)
    {
        $valid = $request->validate([
            'id' => 'required|integer',
            'personal_id' => 'required|integer',
            'name' => 'required|string',
            'email' => 'required|email:filter'
        ]);

        try { $technologists = Technologist::findOrFail($request['id']); }
        catch(ModelNotFoundException $e){
            return redirect()->route('show-users')->with('message', 'Nuk mund te perditesohet teknologu me ID '.$request['id']);
        }

        $technologists->update($valid);
        return redirect()->route('show-users');
    }

    public function deleteTechnologist($id)
    {
        try { $technologist = Technologist::findOrFail($id); }
        catch(ModelNotFoundException $e){
            return 'Teknologu me ID '.$id.' nuk ekziston ne databaze';
        }

        $technologist->delete();
        return redirect()->route('show-users')->with('message', 'Teknologu me ID '.$id.'eshte fshire me sukses.');
    }
}
