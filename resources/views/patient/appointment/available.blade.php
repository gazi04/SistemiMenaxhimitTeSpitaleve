@extends('layout')

@section('content')
    <div class="main-wrapper">
        @include('patient.includes.header')
        @include('patient.includes.sidebar')
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Keto jane terminet e lira, zgjidh njeren prej tyre</h4>
                    </div>
                </div>
                <div class="row">
                    @if (count($availableAppointments) > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Ora</th>
                                    <th>Veprimet</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($availableAppointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment['date'] }}</td>
                                        <td>{{ $appointment['start_time'] }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('set-appointment') }}">
                                                @csrf
                                                <input type="hidden" name="doctor_id" value="{{ $appointment['doctorId'] }}">
                                                <input type="hidden" name="date" value="{{ $appointment['date'] }}">
                                                <input type="hidden" name="start_time" value="{{ $appointment['start_time'] }}">
                                                <input type="hidden" name="end_time" value="{{ $appointment['end_time'] }}">
                                                <button type="submit" class="btn btn-primary">Cakto Terminin</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Nuk ka takime të disponueshme për mjekun e zgjedhur dhe intervalin e datave.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
