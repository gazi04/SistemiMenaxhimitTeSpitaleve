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
                <br>
                <div class="row"><h4>Diagnozat</h4></div>
                <div class="row">
                    @if($diagnoses->isEmpty())
                        <p>Nuk u gjetën diagnoza.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Doktori</th>
                                    <th>Diagnoza</th>
                                    <th>Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($diagnoses as $diagnosis)
                                    <tr>
                                        <td>{{ $diagnosis->doctor->first_name }} {{ $diagnosis->doctor->last_name }}</td>
                                        <td>{{ $diagnosis->notes }}</td>
                                        <td>{{ $diagnosis->created_at->format('m-d-Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
                <br>
                <div class="row"><h4>Terapite</h4></div>
                <div class="row">
                    @if($therapies->isEmpty())
                        <p>Nuk ka terapi të përshkruara.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Doktori</th>
                                    <th>Terapia</th>
                                    <th>Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($therapies as $therapy)
                                    <tr>
                                        <td>{{ $diagnosis->doctor->first_name }} {{ $diagnosis->doctor->last_name }}</td>
                                        <td>{{ $therapy->notes }}</td>
                                        <td>{{ $therapy->created_at->format('m-d-Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
                <br>
                <div class="row"><h4>Testet</h4></div>
                <div class="row">
                    @if($tests->isEmpty())
                        <p>Nuk u gjetën teste.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Teknologu</th>
                                    <th>Lloji i testit</th>
                                    <th>Rezultati</th>
                                    <th>Status</th>
                                    <th>Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tests as $test)
                                    <tr>
                                        <td>{{ $test->technologist->first_name }}{{ $test->technologist->last_name }}</td>
                                        <td>{{ $test->test_type }}</td>
                                        <td>{{ $test->results }}</td>
                                        <td>{{ ucfirst($test->status) }}</td>
                                        <td>{{ $test->created_at->format('Y-m-d') }}</td>
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
