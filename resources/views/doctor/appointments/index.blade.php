@extends('layout')

@section('content')
    <div class="main-wrapper">
        @include('doctor.includes.header')
        @include('doctor.includes.sidebar')
        <div class="page-wrapper">
            <div class="content">
                @if (session('message'))
                    <div id="notify" class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @elseif (session('error'))
                    <div id="notify" class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h2 class="page-title">Përshëndetje {{ Auth::guard('doctor')->user()->first_name }} {{ Auth::guard('doctor')->user()->last_name }}!</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Terminet e sotit</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        @if ($todaysAppointments->isEmpty())
                            <p>Nuk ka takime të tjera për sot.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered custom-table">
                                    <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th>Koha e fillimit</th>
                                            <th>Koha e përfundimit</th>
                                            <th>Pacient</th>
                                            <th>Statusi terminit</th>
                                            <th>Veprimet</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($todaysAppointments as $appointment)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($appointment->start_time)->format('m-d-Y') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($appointment->start_time)->toTimeString() }}</td>
                                                <td>{{ \Carbon\Carbon::parse($appointment->end_time)->toTimeString() }}</td>
                                                <td>
                                                    @php
                                                        $patient = \App\Models\Patient::find($appointment->patient_id);
                                                    @endphp
                                                    {{ $patient->first_name }} {{ $patient->last_name }}
                                                </td>
                                                <td>{{ ucfirst($appointment->status) }}</td>
                                                <td>
                                                    <form method="GET" action="{{ route('show-patient') }}">
                                                        <input type="hidden" name="id" value="{{ $patient->id }}" />
                                                        <input type="submit" class="btn btn-primary" value="Shiko pacientin" />
                                                    </form>
                                                    <br>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
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
                            <div class="table-responsive">
                                <table class="table table-border table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th>Koha e fillimit</th>
                                            <th>Koha e përfundimit</th>
                                            <th>Pacient</th>
                                            <th>Statusi terminit</th>
                                            <th>Veprimet</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($upcomingAppointments as $appointment)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($appointment->start_time)->format('m-d-Y') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($appointment->start_time)->toTimeString() }}</td>
                                                <td>{{ \Carbon\Carbon::parse($appointment->end_time)->toTimeString() }}</td>
                                                <td>
                                                    @php
                                                        $patient = \App\Models\Patient::find($appointment->patient_id);
                                                    @endphp
                                                    {{ $patient->first_name }} {{ $patient->last_name }}
                                                </td>
                                                <td>{{ ucfirst($appointment->status) }}</td>
                                                <td>
                                                    <form method="GET" action="{{ route('show-patient') }}">
                                                        <input type="hidden" name="id" value="{{ $patient->id }}" />
                                                        <input type="submit" class="btn btn-primary" value="Shiko pacientin" />
                                                    </form>
                                                    <br>
                                                    <form method="GET" action="{{ route('modify-appointment-view') }}">
                                                        @csrf
                                                        <input type="hidden" name="appointmentId" value="{{ $appointment->id }}" />
                                                        <input type="submit" class="btn btn-primary" value="Ndrysho Terminin" />
                                                    </form>
                                                    <br>
                                                    <form method="POST" action="{{ route('cancel-appointment') }}">
                                                        @csrf
                                                        <input type="hidden" name="appointment_id" value="{{ $appointment->id }}" />
                                                        <input type="submit" class="btn btn-primary" value="Anulo Terminin" />
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
