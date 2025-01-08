@extends('layout')

@section('content')
    @include('doctor.includes.header')
    @include('doctor.includes.sidebar')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="page-wrapper">
        <div class="container mt-5">
            <h1 class="text-center">Krijo Diagnozen</h1>
            <form method="POST" action="{{ route('create-diagnose') }}" class="mb-4">
                @csrf
                <input type='hidden' name="patientId" value="{{ $patientId }}" />
                <input type="submit" value="Krijo Diagnozen" />
            </form>
        </div>
    </div>
@endsection
