@extends('layout')

@section('content')
@include('doctor.includes.header')
@include('doctor.includes.sidebar')
<div class="page-wrapper">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Trajtoni Pacientin</h1>
        <form method="POST" action="{{ route('treat-patient') }}" class="mb-4">
            @csrf
            <input type="hidden" name="patient_id" value="{{ $patient_id }}" />
            <input type="hidden" name="appointment_id" value="{{ $appointment_id }}" />

            <div class="row justify-content-center mb-3">
                <div class="col-12 col-md-12">
                    <label for="diagnose" class="form-label">Diagnoza</label>
                    <textarea id="diagnose" name="diagnose" class="form-control" rows="4" placeholder="Jep diagnozen"
                        required></textarea>
                </div>
            </div>

            <div class="row justify-content-center mb-4">
                <div class="col-12 col-md-12">
                    <label for="therapy" class="form-label">Terapia</label>
                    <textarea id="therapy" name="therapy" class="form-control" rows="4" placeholder="Jep terapinë"
                        required></textarea>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-6 col-md-6 text-center">
                    <button type="submit" class="btn btn-primary w-100">Ruani të dhënat</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection