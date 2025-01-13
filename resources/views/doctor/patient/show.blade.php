@extends('layout')

@section('content')
    <div class="main-wrapper">
        @include('doctor.includes.header')
        @include('doctor.includes.sidebar')
        @if (session('message') || isset($message))
            <div class="alert alert-success">
                {{ session('message') ?? $message }}
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
                        <h2 class="page-title">Pacienti</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <table class="table table-bordered">
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
                {{--TODO-THE DOCTOR CAN WRITE A DIAGNOSE AND A THERAPY ONLY IF THE PATIENT HAS AN APPOINTMENT AND IF HE HAS ARRIVED --}}
                @if ($ongoingAppointment)
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
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Data dhe Ora</th>
                                    <th>Doktori</th>
                                    <th>Diagnoza</th>
                                    <th>Terapia</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointments as $appointment)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($appointment->start_time)->format('d-m-Y H:i') }}</td>
                                        <td>{{ $appointment->doctor->first_name }} {{ $appointment->doctor->last_name }}</td>
                                        <td>{{ $appointment->diagnosis ? $appointment->diagnosis->notes : 'Nuk ka diagnozë' }}</td>
                                        <td>{{ $appointment->therapy ? $appointment->therapy->notes : 'Nuk ka terapi' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
