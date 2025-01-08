<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class DiagnoseController extends Controller
{
    public function index(Request $request)
    {
        return $request;
        return view('doctor.patient.create-diagnose');
    }
}
