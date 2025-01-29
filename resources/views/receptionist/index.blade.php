@extends('layout')

@section('content')
    <div class="main-wrapper">
        @include('receptionist.includes.header')
        @include('receptionist.includes.sidebar')
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
                        <h4 class="page-title">Terminet e sodit</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        @if ($todaysAppointments->isEmpty())
                            <p>Nuk ka takime të tjera për sot.</p>
                        @else
                            <table class="table table-bordered">
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
                                                <form method="POST" action="{{ route('change-status') }}">
                                                    @csrf
                                                    <input type="hidden" name="appointment_id" value="{{ $appointment->id }}" />
                                                    <input type="submit" class="btn btn-primary" value="Pacienti ka ardh" />
                                                </form>
                                                <br>
                                            </td>
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
