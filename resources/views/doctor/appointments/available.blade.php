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
                        <h4 class="page-title">Terminet e lira</h4>
                    </div>
                </div>
                <div class="row">
                    <p>Takimi aktual:</p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Pacienti</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($appointment->start_time)->format('d-m-Y H:i') }}</td>
                                <td>{{ $appointment->patient->first_name }} {{ $appointment->patient->last_name }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <h4>Takimet e lira:</h4>
                    @if(empty($availableAppointments))
                        <p>Nuk ka takime të lira në intervalin e dhënë.</p>
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Ora e Fillimit</th>
                                    <th>Ora e Mbarimit</th>
                                    <th>Veprim</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($availableAppointments as $free)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($free['date'])->format('d-m-Y') }}</td>
                                        <td>{{ $free['start_time'] }}</td>
                                        <td>{{ $free['end_time'] }}</td>
                                        <td>
                                            {{--TODO-MAKE IT FUNCTIONAL TO CHANGE THE APPOINTMENT DATE--}}
                                            <form method="POST" action="">
                                                @csrf
                                                <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                                                <input type="hidden" name="new_start_time" value="{{ $free['date'] }} {{ $free['start_time'] }}">
                                                <button type="submit" class="btn btn-primary">Zgjidh</button>
                                            </form>
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
