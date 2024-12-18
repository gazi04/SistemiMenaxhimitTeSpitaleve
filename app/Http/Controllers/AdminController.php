<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departament;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Nurse;
use App\Models\Patient;
use App\Models\Receptionist;
use App\Models\Technologist;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use PgSql\Lob;

use function Laravel\Prompts\error;

class AdminController extends Controller
{
    public function index() { return view('admin.index'); }

    public function showDepartaments() { return view('admin.departamentet', ['departaments' => Departament::all()]); }

    public function openCreateDepartamentView() { return view('admin.shto-departamente'); }

    public function saveDepartament(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:255',
        ]);
        Departament::create($validated);
        return redirect()->route('show-departaments')->with('message', 'Departamenti u krijua me sukses.');
    }

    public function openEditDepartamentView($id)
    {
        try { $dep = Departament::findOrFail($id); }
        catch(ModelNotFoundException $e) {
            return redirect()->route('show-departaments')->with('message', 'Nuk ekziston departamenti me ID '.$id.' ne databaze.');
        }
        return view('admin.modifiko-departament', ['departament' => $dep]);
    }

    public function updateDepartament(Request $request)
    {
        try {
            $validated = $request->validate([
                'id' => 'required|exists:departaments,id',
                'name' => 'required|string|max:100',
                'description' => 'required|string|max:255',
            ]);
            Log::info('Validation passed: ', $validated);
        } catch (ValidationException $e) {
            Log:info('Validation failed: ', $e->errors());
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        }

        try { $departament = Departament::findOrFail($validated['id']); }
        catch(ModelNotFoundException $e) {
            Log::error("departament not found");
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

    public function openAdminView() { return view('admin.administratoret', ['admins' => Admin::all()]); }

    public function createAdmin(Request $request)
    {
        $validated = $request->validate([
            'personal_id' => 'required|integer',
            'name' => 'required|string',
            'email' => 'required|email:filter|unique:admins,email'
        ]);

        Admin::create([
            'personal_id' => $validated['personal_id'],
            'name' => $validated['name'],
            'email' => $validated['email']
        ]);

        return redirect()->route('show-users')->with('message', 'Administratori eshte krijuar me sukses');
    }

    public function openEditAdminView($id)
    {
        try { $admin = Admin::findOrFail($id); }
        catch(ModelNotFoundException $e){
            return redirect()->route('show-users')->with('message', 'Nuk ekziston administratori me ID '.$id.' ne databaze.');
        }

        return view('admin.modifiko-admin', [
            'id' => $admin->id,
            'personal_id' => $admin->personal_id,
            'adminName' => $admin->name,
            'adminEmail' => $admin->email
        ]);
    }

    public function editAdmin(Request $request)
    {
        return 'test';
        $validated = $request->validate([
            'id' => 'required|integer',
            'personal_id' => 'required|integer',
            'name' => 'required|string',
            'email' => 'required|email:filter'
        ]);

        try { $admin = Admin::findOrFail($validated['id']); }
        catch(ModelNotFoundException $e){
            return redirect()->route('show-users')->with('message', 'Nuk mund te perditesohet administratori me ID '.$validated['id']);
        }

        $admin->update($validated);
        return redirect()->route('show-users')->with('message', 'Administratori eshte perditesuar me sukses');
    }

    public function fireAdmin(Request $request)
    {
        try {
            $validated = $request->validate([ 'id' => 'required|exists:admins,id' ]);
            $admin = Admin::findOrFail($validated['id']);
        }
        catch(Exception $e) {
            return redirect()->route('show-users')->with('message', 'Administratori nuk mund te pushohet nga puna se nuk ekziston ID '.$request['id'].' ne databaze');
        }
        $admin->update(['is_employed' => false]);
        return redirect()->route('show-users')->with('message', 'Administratori me ID '.$validated['id'].' eshte pushuar nga puna me sukses.');
    }

    public function hireAdmin(Request $request)
    {
        try {
            $validated = $request->validate([ 'id' => 'required|exists:admins,id' ]);
            $admin = Admin::findOrFail($validated['id']);
        }
        catch(Exception $e) {
            return redirect()->route('show-users')->with('message', 'Administratori nuk mund te punesohet se nuk ekziston ID '.$request['id'].' ne databaze.');
        }
        $admin->update(['is_employed' => true]);
        return redirect()->route('show-users')->with('message', 'Administratori me ID '.$validated['id'].' eshte punesuar me sukses.');
    }

    public function openDoctorView() { return view('admin.doktoret', ['admins' => Admin::all()]); }
    public function openCreateDoctorView() { return view('admin.user.createDoctor', ['departaments' => Departament::all()]); }

    public function createDoctor(Request $request)
    {
        $validated = $request->validate([
            'personal_id' => 'required|integer',
            'departament_id' => 'required|integer|exists:departaments,id',
            'name' => 'required|string',
            'surname' => 'required|string',
            'phoneNumber' => 'required|numeric|max_digits:15|min_digits:7',
            'email' => 'required|email:filter|unique:doctors,email'
        ]);

        Doctor::create([
            'personal_id' => $validated['personal_id'],
            'departament_id' => $validated['departament_id'],
            'first_name' => $validated['name'],
            'last_name' => $validated['surname'],
            'phone_number' => $validated['phoneNumber'],
            'email' => $validated['email']
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
            'doctorLastName' => $doctor->last_name,
            'doctorEmail' => $doctor->email,
            'phoneNumber' => $doctor->phone_number,
            'departaments' => Departament::all()
        ]);
    }

    public function editDoctor(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer',
            'personal_id' => 'required|integer',
            'name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email:filter',
            'phone_number' => 'required|numeric|max_digits:15|min_digits:7',
            'departament_id' => 'required|exists:departaments,id'
        ]);

        try { $doctor = Doctor::findOrFail($validated['id']); }
        catch(ModelNotFoundException $e){
            return redirect()->route('show-users')->with('message', 'Nuk mund te perditesohet doktori me ID '.$validated['id']);
        }

        $doctor->update($validated);
        return redirect()->route('show-users')->with('message', 'Doktori eshte perditesuar me sukses');
    }

    public function fireDoctor(Request $request)
    {
        try {
            $validated = $request->validate([ 'id' => 'required|exists:doctors,id' ]);
            $doctor = Doctor::findOrFail($validated['id']);
        }
        catch(Exception $e) {
            return redirect()->route('show-users')->with('message', 'Doktori nuk mund te pushohet nga puna se nuk ekziston doktori me ID '.$request['id'].' ne databaze');
        }
        $doctor->update(['is_employed' => false]);
        return redirect()->route('show-users')->with('message', 'Doktori me ID '.$validated['id'].' eshte pushuar nga puna me sukses.');
    }

    public function hireDoctor(Request $request)
    {
        try {
            $validated = $request->validate([ 'id' => 'required|exists:doctors,id' ]);
            $doctor = Doctor::findOrFail($validated['id']);
        }
        catch(Exception $e) {
            return redirect()->route('show-users')->with('message', 'Doktori nuk mund te punesohet se nuk ekziston doktori me ID '.$request['id'].' ne databaze.');
        }
        $doctor->update(['is_employed' => true]);
        return redirect()->route('show-users')->with('message', 'Doktori me ID '.$validated['id'].' eshte punesuar me sukses.');
    }

    public function createNurse(Request $request)
    {
        $validated = $request->validate([
            'personal_id' => 'required|integer',
            'name' => 'required|string',
            'surname' => 'required|string',
            'phoneNumber' => 'required|numeric|max_digits:15|min_digits:7',
            'email' => 'required|email:filter|unique:nurses,email'
        ]);

        Nurse::create([
            'personal_id' => $validated['personal_id'],
            'first_name' => $validated['name'],
            'last_name' => $validated['surname'],
            'phone_number' => $validated['phoneNumber'],
            'email' => $validated['email']
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
                'nurseLastName' => $nurse->last_name,
                'nurseEmail' => $nurse->email,
                'phoneNumber' => $nurse->phone_number
            ]);
        }
        catch(ModelNotFoundException $e){
            return redirect()->route('show-users')->with('message', 'Nuk ekziston infermieri/ja me ID '.$id.' ne databaze.');
        }
    }

    public function editNurse(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer',
            'personal_id' => 'required|integer',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email:filter',
            'phone_number' => 'required|numeric|max_digits:15|min_digits:7'
        ]);

        try { $nurse = Nurse::findOrFail($validated['id']); }
        catch(ModelNotFoundException $e){
            return redirect()->route('show-users')->with('message', 'Nuk mund te perditesohet infermieri/ja me ID '.$validated['id']);
        }

        $nurse->update($validated);
        return redirect()->route('show-users');
    }

    public function fireNurse(Request $request)
    {
        try {
            $validated = $request->validate([ 'id' => 'required|exists:nurses,id' ]);
            $nurse = Nurse::findOrFail($validated['id']);
        }
        catch(Exception $e) {
            return redirect()->route('show-users')->with('message', 'Infermieri/ja nuk mund te pushohet nga puna se nuk ekziston ID '.$request['id'].' ne databaze');
        }
        $nurse->update(['is_employed' => false]);
        return redirect()->route('show-users')->with('message', 'Infermieri/ja me ID '.$validated['id'].' eshte pushuar nga puna me sukses.');
    }

    public function hireNurse(Request $request)
    {
        try {
            $validated = $request->validate([ 'id' => 'required|exists:nurses,id' ]);
            $nurse = Nurse::findOrFail($validated['id']);
        }
        catch(Exception $e) {
            return redirect()->route('show-users')->with('message', 'Infermieri/ja nuk mund te punesohet se nuk ekziston ID '.$request['id'].' ne databaze.');
        }
        $nurse->update(['is_employed' => true]);
        return redirect()->route('show-users')->with('message', 'Infermieri/ja me ID '.$validated['id'].' eshte punesuar me sukses.');
    }

    public function createReceptionist(Request $request)
    {
        $validated = $request->validate([
            'personal_id' => 'required|integer',
            'name' => 'required|string',
            'surname' => 'required|string',
            'phoneNumber' => 'required|numeric|max_digits:15|min_digits:7',
            'email' => 'required|email:filter|unique:receptionists,email'
        ]);

        Receptionist::create([
            'personal_id' => $validated['personal_id'],
            'first_name' => $validated['name'],
            'last_name' => $validated['surname'],
            'phone_number' => $validated['phoneNumber'],
            'email' => $validated['email']
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
                'receptionistLastName' => $receptionist->last_name,
                'receptionistEmail' => $receptionist->email,
                'phoneNumber' => $receptionist->phone_number
            ]);
        }
        catch(ModelNotFoundException $e){
            return redirect()->route('show-users')->with('message', 'Nuk ekziston recepsionist me ID '.$id.' ne databaze.');
        }
    }

    public function editReceptionist(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer',
            'personal_id' => 'required|integer',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email:filter',
            'phone_number' => 'required|numeric|max_digits:15|min_digits:7'
        ]);

        try { $receptionist = Receptionist::findOrFail($validated['id']); }
        catch(ModelNotFoundException $e){
            return 'test';
            return redirect()->route('show-users')->with('message', 'Nuk mund te perditesohet recepsionisti me ID '.$validated['id']);
        }

        $receptionist->update($validated);
        return redirect()->route('show-users');
    }

    public function fireReceptionist(Request $request)
    {
        try {
            $validated = $request->validate([ 'id' => 'required|exists:receptionists,id' ]);
            $receptionist = Receptionist::findOrFail($validated['id']);
        }
        catch(Exception $e) {
            return redirect()->route('show-users')->with('message', 'Recepcionisti nuk mund te pushohet nga puna se nuk ekziston ID '.$request['id'].' ne databaze');
        }
        $receptionist->update(['is_employed' => false]);
        return redirect()->route('show-users')->with('message', 'Recepcionisti me ID '.$validated['id'].' eshte pushuar nga puna me sukses.');
    }

    public function hireReceptionist(Request $request)
    {
        try {
            $validated = $request->validate([ 'id' => 'required|exists:receptionists,id' ]);
            $receptionist = Receptionist::findOrFail($validated['id']);
        }
        catch(Exception $e) {
            return redirect()->route('show-users')->with('message', 'Recepcionisti nuk mund te punesohet se nuk ekziston ID '.$request['id'].' ne databaze.');
        }
        $receptionist->update(['is_employed' => true]);
        return redirect()->route('show-users')->with('message', 'Recepcionisti me ID '.$validated['id'].' eshte punesuar me sukses.');
    }

    public function createTechnologist(Request $request)
    {
        $validated = $request->validate([
            'personal_id' => 'required|integer',
            'name' => 'required|string',
            'surname' => 'required|string',
            'phoneNumber' => 'required|numeric|max_digits:15|min_digits:7',
            'email' => 'required|email:filter|unique:technologists,email'
        ]);

        Technologist::create([
            'personal_id' => $validated['personal_id'],
            'first_name' => $validated['name'],
            'last_name' => $validated['surname'],
            'phone_number' => $validated['phoneNumber'],
            'email' => $validated['email']
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
                'technologistLastName' => $technologist->last_name,
                'technologistEmail' => $technologist->email,
                'phoneNumber' => $technologist->phone_number
            ]);
        }
        catch(ModelNotFoundException $e){
            return redirect()->route('show-users')->with('message', 'Nuk ekziston teknologu me ID '.$id.' ne databaze.');
        }
    }

    public function editTechnologist(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer',
            'personal_id' => 'required|integer',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email:filter',
            'phone_number' => 'required|numeric|max_digits:15|min_digits:7'
        ]);

        try { $technologists = Technologist::findOrFail($validated['id']); }
        catch(ModelNotFoundException $e){
            return redirect()->route('show-users')->with('message', 'Nuk mund te perditesohet teknologu me ID '.$validated['id']);
        }

        $technologists->update($validated);
        return redirect()->route('show-users');
    }

    public function fireTechnologist(Request $request)
    {
        try {
            $validated = $request->validate([ 'id' => 'required|exists:technologists,id' ]);
            $technologist = Technologist::findOrFail($validated['id']);
        }
        catch(Exception $e) {
            return redirect()->route('show-users')->with('message', 'Teknologu nuk mund te pushohet nga puna se nuk ekziston ID '.$request['id'].' ne databaze');
        }
        $technologist->update(['is_employed' => false]);
        return redirect()->route('show-users')->with('message', 'Teknologu me ID '.$validated['id'].' eshte pushuar nga puna me sukses.');
    }

    public function hireTechnologist(Request $request)
    {
        try {
            $validated = $request->validate([ 'id' => 'required|exists:technologists,id' ]);
            $technologist = Technologist::findOrFail($validated['id']);
        }
        catch(Exception $e) {
            return redirect()->route('show-users')->with('message', 'Teknologu nuk mund te punesohet se nuk ekziston ID '.$request['id'].' ne databaze.');
        }
        $technologist->update(['is_employed' => true]);
        return redirect()->route('show-users')->with('message', 'Teknologu me ID '.$validated['id'].' eshte punesuar me sukses.');
    }
}
