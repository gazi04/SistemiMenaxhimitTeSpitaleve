@extends('layout')

@section('content')
    @include('doctor.includes.header')
    @include('doctor.includes.sidebar')
    <div class="page-wrapper">
        <div class="container mt-5">
            <h1 class="text-center">Trajtoni Pacientin</h1>
            <form method="POST" action="{{ route('treat-patient') }}" class="mb-4">
                @csrf
                <input type='hidden' name="patient_id" value="{{ $patient_id }}" />
                <input type='hidden' name="appointment_id" value="{{ $appointment_id }}" />
                <label>Diagnoza</label><br>
                <textarea name="diagnose" rows="4" cols="50" placeholder="Jep diagnozen" required></textarea><br>
                <label>Terapia</label><br>
                <textarea name="therapy" rows="4" cols="50" placeholder="Jep terapine" required></textarea><br>
                <input type="submit" value="Ruani të dhënat" />
            </form>
        </div>
    </div>
@endsection
