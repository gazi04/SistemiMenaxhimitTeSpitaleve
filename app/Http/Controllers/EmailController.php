<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPatinetId;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailController extends Controller
{
    public function openVerifyEmailView() { return view('auth.verify-email'); }

    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();

        $patient = Auth::guard('patient')->user();
        Mail::to(Auth::guard('patient')->user()->email)->send(new SendPatinetId($patient->id_number, $patient->first_name, $patient->last_name));
        return redirect('/patient/dashboard');
    }

    public function ResendVerificationLink(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }
}
