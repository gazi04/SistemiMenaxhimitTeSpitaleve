@extends('layout')

@section('content')
    <div class="main-wrapper">
        @include('patient.includes.header')
        @include('patient.includes.sidebar')
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h2 class="page-title">Pershendetje {{ $patient->first_name }}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Terminet e ardhshme</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        @if ($upcomingAppointments->isEmpty())
                            <p>Nuk ka takime të ardhshme.</p>
                        @else
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Data</th>
                                        <th>Koha e fillimit</th>
                                        <th>Koha e përfundimit</th>
                                        <th>Doktori</th>
                                        <th>Statusi terminit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($upcomingAppointments as $appointment)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($appointment->start_time)->toDateString() }}</td>
                                            <td>{{ \Carbon\Carbon::parse($appointment->start_time)->toTimeString() }}</td>
                                            <td>{{ \Carbon\Carbon::parse($appointment->end_time)->toTimeString() }}</td>
                                            <td>
                                                @php
                                                    $doctor = \App\Models\Doctor::find($appointment->doctor_id);
                                                @endphp
                                                {{ $doctor->first_name }} {{ $doctor->last_name }}
                                            </td>
                                            <td>{{ ucfirst($appointment->status) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
