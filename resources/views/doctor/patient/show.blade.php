@extends('layout')

@section('content')
    <div class="main-wrapper">
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
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Pacienti</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Patient ID</th>
                                    <td>{{ $patient->id }}</td>
                                </tr>
                                <tr>
                                    <th>Full Name</th>
                                    <td>{{ $patient->first_name }} {{ $patient->last_name }}</td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>{{ $patient->gender ? "Mashkull" : "Femer" }}</td>
                                </tr>
                                <tr>
                                    <th>Phone Number</th>
                                    <td>{{ $patient->phone_number }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $patient->email }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <form method="POST" action="{{ route('create-diagnosis-view') }}">
                        <div class="action-buttons">
                            @csrf
                            <input type="hidden" name="patientId" value="{{ $patient->id }}" />
                            <input type="submit" class="btn btn-primary" value="Jepini pacientit diagnozën" />
                        </div>
                    </form>
                </div>
                <br>
                <div class="row">
                    <form method="POST" action="{{ route('create-therapy-view') }}">
                        <div class="action-buttons">
                            @csrf
                            <input type="hidden" name="patientId" value="{{ $patient->id }}" />
                            <input type="submit" class="btn btn-primary" value="Jepini pacientit terapi" />
                        </div>
                    </form>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Historia Pacientit</h4>
                    </div>
                </div>
            </div>
        </div>
    @endsection
