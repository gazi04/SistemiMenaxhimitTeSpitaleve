@extends('layout')

@section('content')
    <div class="main-wrapper">
        @include('doctor.includes.header')
        @include('doctor.includes.sidebar')
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Terminet e sodit</h4>
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
                                        <th>Pacient</th>
                                        <th>Statusi terminit</th>
                                        <th>Veprimet</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($todaysAppointments as $appointment)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($appointment->start_time)->toDateString() }}</td>
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
                                                    <input type="submit" value="Shiko pacientin" />
                                                </form>
                                                @if (\Carbon\Carbon::now()->lessThan(\Carbon\Carbon::parse($appointment->start_time)))
                                                    <form method="GET" action="">
                                                        @csrf
                                                        <input type="hidden" name="appointmentId" value="{{ $appointment->id }}" />
                                                        <input type="submit" value="Anulo Terminin" />
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                                    @foreach ($upcomingAppointments as $appointment)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($appointment->start_time)->toDateString() }}</td>
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
                                                    <input type="submit" value="Shiko pacientin" />
                                                </form>
                                                @if (\Carbon\Carbon::now()->lessThan(\Carbon\Carbon::parse($appointment->start_time)))
                                                    {{--TODO- FUNKSIONILIZIMI I BUTONIT ANULO TERMININ DUKE NDRRUAR STATUSIN E TERMINIT DHE DUKE LAJMERUAR PACIENTIN ME EMAIL--}}
                                                    <form method="GET" action="">
                                                        @csrf
                                                        <input type="hidden" name="appointmentId" value="{{ $appointment->id }}" />
                                                        <input type="submit" value="Anulo Terminin" />
                                                    </form>
                                                @endif
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
