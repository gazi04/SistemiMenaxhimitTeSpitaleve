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
    public function index() { return redirect()->route('open-admin-view'); }

    /* -------------------------------DEPARTAMENTS CRUD OPERATIONS------------------------------- */
    public function displayDepartaments() { return view('admin.departamentet', ['departaments' => Departament::all()]); }

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
            return redirect()->route('show-departaments')->with('error', 'Nuk ekziston departamenti me ID '.$id.' ne databaze.');
        }
        return view('admin.modifiko-departament', ['departament' => $dep]);
    }

    public function updateDepartament(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:departaments,id',
            'emri_departamentit' => 'required|string|max:100',
            'pershkrimi_departamentit' => 'required|string|max:255',
        ]);

        try { $departament = Departament::findOrFail($validated['id']); }
        catch(ModelNotFoundException $e) {
            return redirect()->route('show-departaments')->with('error', 'Nuk ekziston departamenti me ID '.$validated['id'].' ne databaze.');
        }

        $departament->update([
            'name' => $validated['emri_departamentit'],
            'description' => $validated['pershkrimi_departamentit']
        ]);
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
            return redirect()->route('show-departaments')->with('error',  'Departamenti nuk mund te fshihet pasi nje mjek eshte ne ate departament. Emri i tij eshte '.$doctor->first_name);
        } else {
            $departament->delete();
            return redirect()->route('show-departaments')->with('message',  'Departamenti u fshi me sukses.');
        }

    }

    /* -------------------------------ADMINS CRUD OPERATIONS------------------------------- */
    public function displayAdmins() { return view('admin.administratoret', ['admins' => Admin::all()]); }

    public function openCreateAdminView() { return view('admin.shto-admin'); }

    public function createAdmin(Request $request)
    {
        $validated = $request->validate([
            'numri_personal' => 'required|integer',
            'emri' => 'required|string',
            'email' => 'required|email:filter|unique:admins,email'
        ]);

        Admin::create([
            'personal_id' => $validated['numri_personal'],
            'name' => $validated['emri'],
            'email' => $validated['email']
        ]);

        return redirect()->route('open-admin-view')->with('message', 'Administratori eshte krijuar me sukses');
    }

    public function openEditAdminView($id)
    {
        try { $admin = Admin::findOrFail($id); }
        catch(ModelNotFoundException $e){
            return redirect()->route('open-admin-view')->with('error', 'Nuk ekziston administratori me ID '.$id.' ne databaze.');
        }

        return view('admin.modifiko-admin', [
            'id' => $admin->id,
            'id_number' => $admin->id_number,
            'personal_id' => $admin->personal_id,
            'adminName' => $admin->name,
            'adminEmail' => $admin->email,
        ]);
    }

    public function editAdmin(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:admins,id',
            'numri_personal' => 'required|integer',
            'emri' => 'required|string',
            'email' => 'required|email:filter'
        ]);

        try { $admin = Admin::findOrFail($validated['id']); }
        catch(ModelNotFoundException $e){
            return redirect()->route('open-admin-view')->with('error', 'Nuk mund te perditesohet administratori me ID '.$validated['id']);
        }

        $admin->update([
            'personal_id' => $validated['numri_personal'],
            'name' => $validated['emri'],
            'email' => $validated['email']
        ]);
        return redirect()->route('open-admin-view')->with('message', 'Administratori eshte perditesuar me sukses');
    }

    public function fireAdmin(Request $request)
    {
        try {
            $validated = $request->validate([ 'id' => 'required|exists:admins,id' ]);
            $admin = Admin::findOrFail($validated['id']);
        }
        catch(Exception $e) {
            return redirect()->route('open-admin-view')->with('message', 'Administratori nuk mund te pushohet nga puna se nuk ekziston ID '.$request['id'].' ne databaze');
        }
        $admin->update(['is_employed' => false]);
        return redirect()->route('open-admin-view')->with('message', 'Administratori me ID '.$validated['id'].' eshte pushuar nga puna me sukses.');
    }

    public function hireAdmin(Request $request)
    {
        try {
            $validated = $request->validate([ 'id' => 'required|exists:admins,id' ]);
            $admin = Admin::findOrFail($validated['id']);
        }
        catch(Exception $e) {
            return redirect()->route('open-admin-view')->with('message', 'Administratori nuk mund te punesohet se nuk ekziston ID '.$request['id'].' ne databaze.');
        }
        $admin->update(['is_employed' => true]);
        return redirect()->route('open-admin-view')->with('message', 'Administratori me ID '.$validated['id'].' eshte punesuar me sukses.');
    }

    /* -------------------------------DOCTORS CRUD OPERATIONS------------------------------- */
    public function displayDoctors() { return view('admin.doktoret', ['doctors' => Doctor::all()]); }

    public function openCreateDoctorView() { return view('admin.shto-doktor', ['departaments' => Departament::all()]); }

    public function createDoctor(Request $request)
    {
        $validated = $request->validate([
            'numri_personal' => 'required|integer',
            'departamenti' => 'required|integer|exists:departaments,id',
            'emri' => 'required|string',
            'mbiemri' => 'required|string',
            'numri_kontaktues' => 'required|numeric|max_digits:15|min_digits:7',
            'email' => 'required|email:filter|unique:doctors,email'
        ]);

        Doctor::create([
            'personal_id' => $validated['numri_personal'],
            'departament_id' => $validated['departamenti'],
            'first_name' => $validated['emri'],
            'last_name' => $validated['mbiemri'],
            'phone_number' => $validated['numri_kontaktues'],
            'email' => $validated['email']
        ]);
        return redirect()->route('open-doctor-view')->with('message', 'Doktor eshte krijuar me sukses');
    }

    public function openEditDoctorView($id)
    {
        try { $doctor = Doctor::findOrFail($id); }
        catch(ModelNotFoundException $e) {
            return redirect()->route('open-doctor-view')->with('message', 'Nuk ekziston doktori me ID '.$id.' ne databaze.');
        }

        return view('admin.modifiko-doktor', [
            'id' => $doctor->id,
            'id_number' => $doctor->id_number,
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
            'numri_personal' => 'required|integer',
            'emri' => 'required|string',
            'mbiemri' => 'required|string',
            'email' => 'required|email:filter',
            'numri_kontaktues' => 'required|numeric|max_digits:15|min_digits:7',
            'departamenti' => 'required|exists:departaments,id'
        ]);

        try { $doctor = Doctor::findOrFail($validated['id']); }
        catch(ModelNotFoundException $e){
            return redirect()->route('open-doctor-view')->with('message', 'Nuk mund te perditesohet doktori me ID '.$validated['id']);
        }

        $doctor->update([
            'personal_id' => $validated['numri_personal'],
            'first_name' => $validated['emri'],
            'last_name' => $validated['mbiemri'],
            'phone_number' => $validated["numri_kontaktues"],
            'email' => $validated["email"],
            'departament_id' => $validated['departamenti']
        ]);
        return redirect()->route('open-doctor-view')->with('message', 'Doktori eshte perditesuar me sukses');
    }

    public function fireDoctor(Request $request)
    {
        try {
            $validated = $request->validate([ 'id' => 'required|exists:doctors,id' ]);
            $doctor = Doctor::findOrFail($validated['id']);
        }
        catch(Exception $e) {
            return redirect()->route('open-doctor-view')->with('message', 'Doktori nuk mund te pushohet nga puna se nuk ekziston doktori me ID '.$request['id'].' ne databaze');
        }
        $doctor->update(['is_employed' => false]);
        return redirect()->route('open-doctor-view')->with('message', 'Doktori '.$doctor->first_name.' eshte pushuar nga puna me sukses.');
    }

    public function hireDoctor(Request $request)
    {
        try {
            $validated = $request->validate([ 'id' => 'required|exists:doctors,id' ]);
            $doctor = Doctor::findOrFail($validated['id']);
        }
        catch(Exception $e) {
            return redirect()->route('open-doctor-view')->with('message', 'Doktori nuk mund te punesohet se nuk ekziston doktori me ID '.$request['id'].' ne databaze.');
        }
        $doctor->update(['is_employed' => true]);
        return redirect()->route('open-doctor-view')->with('message', 'Doktori '.$doctor->first_name.' eshte punesuar me sukses.');
    }

    /* -------------------------------NURSES CRUD OPERATIONS------------------------------- */
    public function displayNurses() { return view('admin.infermieret', ['nurses' => Nurse::all()]); }

    public function createNurse(Request $request)
    {
        $validated = $request->validate([
            'numri_personal' => 'required|integer',
            'emri' => 'required|string',
            'mbiemri' => 'required|string',
            'numri_kontaktues' => 'required|numeric|max_digits:15|min_digits:7',
            'email' => 'required|email:filter|unique:nurses,email'
        ]);

        $nurse = Nurse::create([
            'personal_id' => $validated['numri_personal'],
            'first_name' => $validated['emri'],
            'last_name' => $validated['mbiemri'],
            'phone_number' => $validated['numri_kontaktues'],
            'email' => $validated['email']
        ]);
        Log::info($nurse);

        return redirect()->route('open-nurse-view')->with('message', 'Infermieri/ja eshte krijuar me sukses');
    }

    public function openCreateNurseView() { return view('admin.shto-infermiere'); }

    public function openEditNurseView($id)
    {
        try {
            $nurse = Nurse::findOrFail($id);
            return view('admin.modifiko-infermiere', [
                'id' => $nurse->id,
                'id_number' => $nurse->id_number,
                'personal_id' => $nurse->personal_id,
                'nurseName' => $nurse->first_name,
                'nurseLastName' => $nurse->last_name,
                'nurseEmail' => $nurse->email,
                'phoneNumber' => $nurse->phone_number
            ]);
        }
        catch(ModelNotFoundException $e){
            return redirect()->route('open-nurse-view')->with('message', 'Nuk ekziston infermieri/ja me ID '.$id.' ne databaze.');
        }
    }

    public function editNurse(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer',
            'numri_personal' => 'required|integer',
            'emri' => 'required|string',
            'mbiemri' => 'required|string',
            'email' => 'required|email:filter',
            'numri_kontaktues' => 'required|numeric|max_digits:15|min_digits:7'
        ]);

        try { $nurse = Nurse::findOrFail($validated['id']); }
        catch(ModelNotFoundException $e){
            return redirect()->route('open-nurse-view')->with('message', 'Nuk mund te perditesohet infermieri/ja me ID '.$validated['id']);
        }

        $nurse->update([
            'personal_id' => $validated["numri_personal"],
            'first_name' => $validated["emri"],
            'last_name' => $validated["mbiemri"],
            'email' => $validated["email"],
            'phone_number' => $validated["numri_kontaktues"]
        ]);
        return redirect()->route('open-nurse-view')->with('message', 'Infermieri/ja eshte perditesuar me sukses');
    }

    public function fireNurse(Request $request)
    {
        try {
            $validated = $request->validate([ 'id' => 'required|exists:nurses,id' ]);
            $nurse = Nurse::findOrFail($validated['id']);
        }
        catch(Exception $e) {
            return redirect()->route('open-nurse-view')->with('message', 'Infermieri/ja nuk mund te pushohet nga puna se nuk ekziston ID '.$request['id'].' ne databaze');
        }
        $nurse->update(['is_employed' => false]);
        return redirect()->route('open-nurse-view')->with('message', 'Infermieri/ja me '.$nurse->first_name.' eshte pushuar nga puna me sukses.');
    }

    public function hireNurse(Request $request)
    {
        try {
            $validated = $request->validate([ 'id' => 'required|exists:nurses,id' ]);
            $nurse = Nurse::findOrFail($validated['id']);
        }
        catch(Exception $e) {
            return redirect()->route('open-nurse-view')->with('message', 'Infermieri/ja nuk mund te punesohet se nuk ekziston ID '.$request['id'].' ne databaze.');
        }
        $nurse->update(['is_employed' => true]);
        return redirect()->route('open-nurse-view')->with('message', 'Infermieri/ja me '.$nurse->first_name.' eshte punesuar me sukses.');
    }

    /* -------------------------------RECEPTIONISTS CRUD OPERATIONS------------------------------- */
    public function displayReceptionist() { return view('admin.recepcionistet', ['receptionists' => Receptionist::all()]); }

    public function openCreateReceptionistView() { return view('admin.shto-recepcionist'); }

    public function createReceptionist(Request $request)
    {
        $validated = $request->validate([
            'numri_personal' => 'required|integer',
            'emri' => 'required|string',
            'mbiemri' => 'required|string',
            'numri_kontaktues' => 'required|numeric|max_digits:15|min_digits:7',
            'email' => 'required|email:filter|unique:nurses,email'
        ]);

        Receptionist::create([
            'personal_id' => $validated['numri_personal'],
            'first_name' => $validated['emri'],
            'last_name' => $validated['mbiemri'],
            'phone_number' => $validated['numri_kontaktues'],
            'email' => $validated['email']
        ]);
        return redirect()->route('open-receptionist-view')->with('message', 'Recepsionisti eshte krijuar me sukses');
    }

    public function openEditReceptionistView($id)
    {
        try {
            $receptionist = Receptionist::findOrFail($id);
            return view('admin.modifiko-recepcionist', [
                'id' => $receptionist->id,
                'id_number' => $receptionist->id_number,
                'personal_id' => $receptionist->personal_id,
                'receptionistName' => $receptionist->first_name,
                'receptionistLastName' => $receptionist->last_name,
                'receptionistEmail' => $receptionist->email,
                'phoneNumber' => $receptionist->phone_number
            ]);
        }
        catch(ModelNotFoundException $e){
            return redirect()->route('open-receptionist-view')->with('message', 'Nuk ekziston recepsionist me ID '.$id.' ne databaze.');
        }
    }

    public function editReceptionist(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer',
            'numri_personal' => 'required|integer',
            'emri' => 'required|string',
            'mbiemri' => 'required|string',
            'email' => 'required|email:filter',
            'numri_kontaktues' => 'required|numeric|max_digits:15|min_digits:7'
        ]);

        try { $receptionist = Receptionist::findOrFail($validated['id']); }
        catch(ModelNotFoundException $e){
            return redirect()->route('open-receptionist-view')->with('message', 'Nuk mund te perditesohet recepsionisti me ID '.$validated['id']);
        }

        $receptionist->update([
            'personal_id' => $validated["numri_personal"],
            'first_name' => $validated["emri"],
            'last_name' => $validated["mbiemri"],
            'email' => $validated["email"],
            'phone_number' => $validated["numri_kontaktues"]
        ]);
        return redirect()->route('open-receptionist-view');
    }

    public function fireReceptionist(Request $request)
    {
        try {
            $validated = $request->validate([ 'id' => 'required|exists:receptionists,id' ]);
            $receptionist = Receptionist::findOrFail($validated['id']);
        }
        catch(Exception $e) {
            return redirect()->route('open-receptionist-view')->with('message', 'Recepcionisti nuk mund te pushohet nga puna se nuk ekziston ID '.$request['id'].' ne databaze');
        }
        $receptionist->update(['is_employed' => false]);
        return redirect()->route('open-receptionist-view')->with('message', 'Recepcionisti me '.$receptionist->first_name.' eshte pushuar nga puna me sukses.');
    }

    public function hireReceptionist(Request $request)
    {
        try {
            $validated = $request->validate([ 'id' => 'required|exists:receptionists,id' ]);
            $receptionist = Receptionist::findOrFail($validated['id']);
        }
        catch(Exception $e) {
            return redirect()->route('open-receptionist-view')->with('message', 'Recepcionisti nuk mund te punesohet se nuk ekziston ID '.$request['id'].' ne databaze.');
        }
        $receptionist->update(['is_employed' => true]);
        return redirect()->route('open-receptionist-view')->with('message', 'Recepcionisti me '.$receptionist->first_name.' eshte punesuar me sukses.');
    }

    /* -------------------------------TECHNOLOGISTS CRUD OPERATIONS------------------------------- */
    public function displayTechnologist() { return view('admin.laborantet', ['technologists' => Technologist::all()]); }

    public function openCreateTechnologistView() { return view('admin.shto-laborant'); }

    public function createTechnologist(Request $request)
    {
        $validated = $request->validate([
            'numri_personal' => 'required|integer',
            'emri' => 'required|string',
            'mbiemri' => 'required|string',
            'numri_kontaktues' => 'required|numeric|max_digits:15|min_digits:7',
            'email' => 'required|email:filter|unique:nurses,email'
        ]);

        Technologist::create([
            'personal_id' => $validated['numri_personal'],
            'first_name' => $validated['emri'],
            'last_name' => $validated['mbiemri'],
            'phone_number' => $validated['numri_kontaktues'],
            'email' => $validated['email']
        ]);

        return redirect()->route('open-technologist-view')->with('message', 'Teknologu eshte krijuar me sukses');
    }

    public function openEditTechnologistView($id)
    {
        try {
            $technologist = Technologist::findOrFail($id);
            return view('admin.modifiko-laborant', [
                'id' => $technologist->id,
                'id_number' => $technologist->id_number,
                'personal_id' => $technologist->personal_id,
                'technologistName' => $technologist->first_name,
                'technologistLastName' => $technologist->last_name,
                'technologistEmail' => $technologist->email,
                'phoneNumber' => $technologist->phone_number
            ]);
        }
        catch(ModelNotFoundException $e){
            return redirect()->route('open-technologist-view')->with('message', 'Nuk ekziston teknologu me ID '.$id.' ne databaze.');
        }
    }

    public function editTechnologist(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer',
            'numri_personal' => 'required|integer',
            'emri' => 'required|string',
            'mbiemri' => 'required|string',
            'email' => 'required|email:filter',
            'numri_kontaktues' => 'required|numeric|max_digits:15|min_digits:7'
        ]);

        try { $technologists = Technologist::findOrFail($validated['id']); }
        catch(ModelNotFoundException $e){
            return redirect()->route('open-technologist-view')->with('message', 'Nuk mund te perditesohet teknologu me ID '.$validated['id']);
        }

        $technologists->update([
            'personal_id' => $validated["numri_personal"],
            'first_name' => $validated["emri"],
            'last_name' => $validated["mbiemri"],
            'email' => $validated["email"],
            'phone_number' => $validated["numri_kontaktues"]
        ]);
        return redirect()->route('open-technologist-view');
    }

    public function fireTechnologist(Request $request)
    {
        try {
            $validated = $request->validate([ 'id' => 'required|exists:technologists,id' ]);
            $technologist = Technologist::findOrFail($validated['id']);
        }
        catch(Exception $e) {
            return redirect()->route('open-technologist-view')->with('message', 'Teknologu nuk mund te pushohet nga puna se nuk ekziston ID '.$request['id'].' ne databaze');
        }
        $technologist->update(['is_employed' => false]);
        return redirect()->route('open-technologist-view')->with('message', 'Teknologu me '.$technologist->first_name.' eshte pushuar nga puna me sukses.');
    }

    public function hireTechnologist(Request $request)
    {
        try {
            $validated = $request->validate([ 'id' => 'required|exists:technologists,id' ]);
            $technologist = Technologist::findOrFail($validated['id']);
        }
        catch(Exception $e) {
            return redirect()->route('open-technologist-view')->with('message', 'Teknologu nuk mund te punesohet se nuk ekziston ID '.$request['id'].' ne databaze.');
        }
        $technologist->update(['is_employed' => true]);
        return redirect()->route('open-technologist-view')->with('message', 'Teknologu me '.$technologist->first_name.' eshte punesuar me sukses.');
    }
}
