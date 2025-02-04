<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DiagnoseController;
use App\Http\Controllers\TherapyController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ReceptionistController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\TechnologistController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\DoctorMiddleware;
use App\Http\Middleware\PatientMiddleware;
use App\Http\Middleware\NurseMiddleware;
use App\Http\Middleware\TechnologistMiddleware;
use App\Http\Middleware\ReceptionistMiddleware;
use App\Models\Departament;
use Illuminate\Support\Facades\App;

Route::get('/', function () {
    return view('home.index', ['dep' => Departament::find(1)]);
})->name('home-page');

Route::get('/departamentet', function() {
    return view('home.departament', ['dep' => Departament::find(1)]);
})->name('departamentet-view');

Route::get('/doktoret', function() {
    return view('home.doctors');
})->name('doctors-view');

Route::get('/rreth-nesh', function() {
    return view('home.about');
})->name('about-view');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'openCreatePatientview'])->name('create-patient-view');
Route::post('/register', [LoginController::class, 'createPatient'])->name('create-patient');

Route::get('/email/verify', [EmailController::class, 'openVerifyEmailView'])->middleware('auth:patient')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [EmailController::class, 'verifyEmail'])->middleware(['auth:patient', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', [EmailController::class, 'ResendVerificationLink'])->middleware(['auth:patient', 'throttle:6,1'])->name('verification.send');

/* -------------------------------ADMIN DASHBOARD------------------------------- */
Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin-dashboard');
    Route::get('/show/patients', [PatientController::class, 'indexForAdmin'])->name('open-patient-view');
    Route::post('/show/patients', [PatientController::class, 'searchPatient'])->name('search-patients');
    Route::get('/modify/patient/{id}', [PatientController::class, 'modifyPatientView'])->name('modify-patient-view');
    Route::post('/modify/patient', [PatientController::class, 'modifyPatient'])->name('modify-patient');

    /* -------------------------------DEPARTAMENT MANAGEMENT------------------------------- */
    Route::get('/departaments', [AdminController::class, 'displayDepartaments'])->name('show-departaments');
    Route::delete('/departaments/delete/{id}', [AdminController::class, 'deleteDepartament'])->name('delete-departament');
    Route::get('/departaments/create', [AdminController::class, 'openCreateDepartamentView'])->name('create-departament-view');
    Route::post('/departaments/save', [AdminController::class, 'saveDepartament'])->name('save-departament');
    Route::get('/departaments/update/{id}', [AdminController::class, 'openEditDepartamentView'])->name('edit-departament-view');
    Route::post('/departaments/update', [AdminController::class, 'updateDepartament'])->name('update-departament');

    /* -------------------------------USER MANAGEMENT------------------------------- */
    Route::get('/users/admin', [AdminController::class, 'displayAdmins'])->name('open-admin-view');
    Route::get('/users/create/admin', [AdminController::class, 'openCreateAdminView'])->name('create-admin-view');
    Route::post('/users/create/admin', [AdminController::class, 'createAdmin'])->name('create-admin');
    Route::get('/users/edit/admin/{id}', [AdminController::class, 'openEditAdminView'])->name('edit-admin-view');
    Route::post('/users/edit/admin', [AdminController::class, 'editAdmin'])->name('edit-admin');
    Route::post('/users/fire/admin', [AdminController::class, 'fireAdmin'])->name('fire-admin');
    Route::post('/users/hire/admin', [AdminController::class, 'hireAdmin'])->name('hire-admin');

    Route::get('/users/doctor', [AdminController::class, 'displayDoctors'])->name('open-doctor-view');
    Route::get('/users/create/doctor', [AdminController::class, 'openCreateDoctorView'])->name('create-doctor-view');
    Route::post('/users/create/doctor', [AdminController::class, 'createDoctor'])->name('create-doctor');
    Route::delete('/doctor/delete/{id}', [AdminController::class, 'deleteDoctor'])->name('delete-doctor');
    Route::get('/users/edit/doctor/{id}', [AdminController::class, 'openEditDoctorView'])->name('edit-doctor-view');
    Route::post('/users/edit/doctor', [AdminController::class, 'editDoctor'])->name('edit-doctor');
    Route::post('/users/fire/doctor', [AdminController::class, 'fireDoctor'])->name('fire-doctor');
    Route::post('/users/hire/doctor', [AdminController::class, 'hireDoctor'])->name('hire-doctor');

    Route::get('/users/nurse', [AdminController::class, 'displayNurses'])->name('open-nurse-view');
    Route::get('/users/create/nurse', [AdminController::class, 'openCreateNurseView'])->name('create-nurse-view');
    Route::post('/users/create/nurse', [AdminController::class, 'createNurse'])->name('create-nurse');
    Route::delete('/nurse/delete/{id}', [AdminController::class, 'deleteNurse'])->name('delete-nurse');
    Route::get('/users/edit/nurse/{id}', [AdminController::class, 'openEditNurseView'])->name('edit-nurse-view');
    Route::post('/users/edit/nurse', [AdminController::class, 'editNurse'])->name('edit-nurse');
    Route::post('/users/fire/nurse', [AdminController::class, 'fireNurse'])->name('fire-nurse');
    Route::post('/users/hire/nurse', [AdminController::class, 'hireNurse'])->name('hire-nurse');

    Route::get('/users/receptionist', [AdminController::class, 'displayReceptionist'])->name('open-receptionist-view');
    Route::get('/users/create/receptionist', [AdminController::class, 'openCreateReceptionistView'])->name('create-receptionist-view');
    Route::post('/users/create/receptionist', [AdminController::class, 'createReceptionist'])->name('create-receptionist');
    Route::delete('/receptionist/delete/{id}', [AdminController::class, 'deleteReceptionist'])->name('delete-receptionist');
    Route::get('/users/edit/receptionist/{id}', [AdminController::class, 'openEditReceptionistView'])->name('edit-receptionist-view');
    Route::post('/users/edit/receptionist', [AdminController::class, 'editReceptionist'])->name('edit-receptionist');
    Route::post('/users/fire/receptionist', [AdminController::class, 'fireReceptionist'])->name('fire-receptionist');
    Route::post('/users/hire/receptionist', [AdminController::class, 'hireReceptionist'])->name('hire-receptionist');

    Route::get('/users/technologist', [AdminController::class, 'displayTechnologist'])->name('open-technologist-view');
    Route::get('/users/create/technologist', [AdminController::class, 'openCreateTechnologistView'])->name('create-technologist-view');
    Route::post('/users/create/technologist', [AdminController::class, 'createTechnologist'])->name('create-technologist');
    Route::delete('/technologist/delete/{id}', [AdminController::class, 'deleteTechnologist'])->name('delete-technologist');
    Route::get('/users/edit/technologist/{id}', [AdminController::class, 'openEditTechnologistView'])->name('edit-technologist-view');
    Route::post('/users/edit/technologist', [AdminController::class, 'editTechnologist'])->name('edit-technologist');
    Route::post('/users/fire/technologist', [AdminController::class, 'fireTechnologist'])->name('fire-technologist');
    Route::post('/users/hire/technologist', [AdminController::class, 'hireTechnologist'])->name('hire-technologist');

});

/* -------------------------------DOCTOR DASHBOARD------------------------------- */
Route::middleware(DoctorMiddleware::class)->group(function () {
    Route::get('/doctor/dashboard', [DoctorController::class, 'index'])->name('doctor-dashboard');

    Route::get('/patients', [DoctorController::class, 'openManagePatientView'])->name('manage-patients');
    Route::get('/patient', [PatientController::class, 'showPatient'])->name('show-patient');
    Route::get('/search/patient', [PatientController::class, 'searchPatient'])->name('search-patient');

    Route::get('/treat/patient', [PatientController::class, 'treatPatientView'])->name('treat-patient-view');
    Route::post('/treat/patient', [PatientController::class, 'treatPatient'])->name('treat-patient');

    Route::get('/manage/appointments', [AppointmentController::class, 'manageAppointmentsView'])->name('manage-appointments-view');
    Route::get('/modify/appointment', [AppointmentController::class, 'modifyAppointmentView'])->name('modify-appointment-view');
    Route::post('/available/appointments', [AppointmentController::class, 'getFreeAppointmentForDoctor'])->name('get-free-appointments-for-doctor');
    Route::post('/modify/appointment', [AppointmentController::class, 'modifyAppointment'])->name('modify-appointment');
    Route::post('/cancel/appointment', [AppointmentController::class, 'cancelAppointment'])->name('cancel-appointment');
});

/* -------------------------------PATIENT DASHBOARD------------------------------- */
Route::middleware(PatientMiddleware::class)->group(function () {
    Route::get('/patient/dashboard', [PatientController::class, 'index'])->name('patient-dashboard');
    Route::get('/make/appointment', [AppointmentController::class, 'index'])->name('make-appointment');
    Route::post('/get/avaible/appointments', [AppointmentController::class, 'getFreeAppointment'])->name('get-free-appointments');
    Route::post('/set/appointment', [AppointmentController::class, 'setAppointment'])->name('set-appointment');

    Route::get('/get/doctors/{departmentId}', [AppointmentController::class, 'getDoctorsByDepartment']);
    Route::get('/get/department/{doctorId}', [AppointmentController::class, 'getDepartmentByDoctor']);

    Route::get('/get/diagnoses', [DiagnoseController::class, 'displayDiagnosesView'])->name('display-diagnoses-view');
    Route::get('/get/tests', [TestController::class, 'displayTestView'])->name('displays-tests-view');
});

/* -------------------------------NURSE DASHBOARD------------------------------- */
Route::middleware(NurseMiddleware::class)->group(function () {
    Route::get('/nurse-dashboard', [NurseController::class, 'dashboard'])->name('nurse-dashboard');
    Route::get('/stoku', [NurseController::class, 'stoku'])->name('stoku');
    Route::get('/search-medication', [NurseController::class, 'searchMedication'])->name('search-medication');
    Route::get('/stoku', [NurseController::class, 'stoku'])->name('stoku');
    Route::post('/order-medication', [NurseController::class, 'orderMedication'])->name('order-medication');
    Route::get('/shtoMedikament', [NurseController::class, 'create'])->name('medications.create');
    Route::post('/shtoMedikament', [NurseController::class, 'store'])->name('medications.store');
    Route::post('/medications/use', [NurseController::class, 'useMedication'])->name('medications.use');

});

/* -------------------------------TECHNOLOGIST DASHBOARD------------------------------- */
Route::middleware(TechnologistMiddleware::class)->group(function () {
    Route::get('/dashboard', [TechnologistController::class, 'dashboard'])->name('technologist-dashboard');
    Route::get('/test/create', [TechnologistController::class, 'create'])->name('technologist.tests.create');
    Route::post('/test/create', [TechnologistController::class, 'store'])->name('technologist.tests.store');
    Route::post('/test', [TestController::class, 'searchTests'])->name('search-tests');
    Route::get('/tests/{id}', [TechnologistController::class, 'show'])->name('technologist.tests.show');
    Route::post('/send/test', [TechnologistController::class, 'sendTestToPatient'])->name('inform-patient');
});

/* -------------------------------RECEPTIONIST DASHBOARD------------------------------- */
Route::middleware(ReceptionistMiddleware::class)->group(function () {
    Route::get('/receptionist/dashboard', [ReceptionistController::class, 'index'])->name('receptionist-dashboard');
    Route::post('/change-status', [ReceptionistController::class, 'confirmPatientHasArrivedView'])->name('confirm-change-status');
    Route::post('/confirm/patient', [ReceptionistController::class, 'confirmChageStatus'])->name('confirm-appointment-status-change');
});
