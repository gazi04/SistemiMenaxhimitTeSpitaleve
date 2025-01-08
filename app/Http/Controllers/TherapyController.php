<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TherapyController extends Controller
{
    public function index(Request $request)
    {
        return $request;
        return view('doctor.patient.create-therapy');
    }
}
