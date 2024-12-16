<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $username = '';
        if (Auth::guard('doctor')->check()) {
            $username = Auth::guard('doctor')->user()->first_name;
        }
        return view('doctor.index', ['username'=>$username]);
    }
}
