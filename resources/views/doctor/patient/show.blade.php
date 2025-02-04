@extends('layout')

@section('content')
<div class="main-wrapper">
    @include('doctor.includes.header')
    @include('doctor.includes.sidebar')
    <div class="page-wrapper">
        <div class="content">
            @if (session('message'))
                <div id="notify" class="alert alert-success">
                    {{ session('message') }}
                </div>
            @elseif (session('error'))
                <div id="notify" class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h2 class="page-title">Pacienti</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="table-responsive">
                        <table class="table table-bordered tableColour-white">
                            <tbody>
                                <tr>
                                    <th>Patient ID</th>
                                    <td>{{ $patient->id_number }}</td>
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
            </div>
            @if ($ongoingAppointment)
                <div class="row">
                    <form method="GET" action="{{ route('treat-patient-view') }}">
                        @csrf
                        <div class="action-buttons">
                            <input type="hidden" name="patient_id" value="{{ $patient->id }}" />
                            <input type="hidden" name="appointment_id" value="{{ $ongoingAppointment->id }}" />
                            <input type="submit" class="btn btn-primary" value="Trajto Pacientin" />
                        </div>
                    </form>
                </div>
            @endif
            <br>
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h2 class="page-title">Historia Pacientit</h2>
                </div>
            </div>
            <div class="row">
                @if($appointments->isEmpty())
                    <p>Nuk u gjetën termine.</p>
                @else
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-border table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th>Doktori</th>
                                        <th>Diagnoza</th>
                                        <th>Terapia</th>
                                        <th>Data dhe Ora</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appointments as $appointment)
                                        <tr>
                                            <td>{{ $appointment->doctor->first_name }} {{ $appointment->doctor->last_name }}</td>
                                            <td>{{ $appointment->diagnosis ? $appointment->diagnosis->notes : 'Nuk ka diagnozë' }}</td>
                                            <td>{{ $appointment->therapy ? $appointment->therapy->notes : 'Nuk ka terapi' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($appointment->start_time)->format('d-m-Y H:i') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $appointments->appends(['id' => $patient->id, 'appointments_page' => request()->input('appointments_page')])->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                @endif
            </div>
            <br>
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h2 class="page-title">Analizat e Pacientit</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-border table-striped custom-table">
                            <thead>
                                <tr>
                                    <th>Pacienti</th>
                                    <th>Tipi i Analizës</th>
                                    <th>Rezultatet</th>
                                    <th>Data e Analizave</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tests as $test)
                                    <tr>
                                        <td>{{ $test->patient->first_name }} {{ $test->patient->last_name }}</td>
                                        <td>{{ $test->test_type }}</td>
                                        <td>{!! nl2br(e($test->results)) !!}</td>
                                        <td>{{ $test->created_at->format('d-m-Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $tests->appends(['id' => $patient->id, 'tests_page' => request()->input('tests_page')])->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
