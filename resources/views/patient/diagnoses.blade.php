@extends('layout')

@section('content')
    <div class="main-wrapper">
        @include('patient.includes.header')
        @include('patient.includes.sidebar')
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
                        <h4 class="page-title">Diagnozat e juaja</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        @if ($appointments->isEmpty())
                            <p>Nuk ka të dhëna shëndetësore për ju në sistem.</p>
                        @else
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Doktori</th>
                                        <th>Diagnoza</th>
                                        <th>Terapia</th>
                                        <th>Data</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appointments as $appointment)
                                        <tr>
                                            <td>{{ $appointment->doctor->first_name}}</td>
                                            <td>{{ $appointment->diagnosis ? $appointment->diagnosis->notes : 'Nuk ka diagnozë' }}</td>
                                            <td>{{ $appointment->therapy ? $appointment->therapy->notes : 'Nuk ka terapi' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($appointment->start_time)->format('m-d-Y') }}</td>
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
