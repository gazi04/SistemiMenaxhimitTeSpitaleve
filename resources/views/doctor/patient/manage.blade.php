@extends('layout')

@section('content')
@include('doctor.includes.header')
@include('doctor.includes.sidebar')
<div class="page-wrapper">
    <div class="container mt-5">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <h1 class="text-center">Kërko Pacientin</h1>

        <form method="GET" action="{{ route('search-patient') }}" class="mb-4">
            <div class="input-group">
                <input type="text" id="search-input" name="searchingTerm" class="form-control"
                    placeholder="Kerko sipas emrit ose email-it" autocomplete="off">
                &nbsp;&nbsp;
                <input class="btn btn-primary" type="submit" value="Kërko" />
            </div>
        </form>

        @if ($patients->isEmpty())
            <!-- Bootstrap danger alert -->
            <div class="alert alert-danger text-center" role="alert">
                Nuk u gjet asnje perdorues qe pershtatet me kerkimin tuaj.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-border custom-table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>ID Pacientit</th>
                            <th>Emri dhe Mbiemri</th>
                            <th>Gjinia</th>
                            <th>Numri Telefonit</th>
                            <th>Email</th>
                            <th>Email Verifikuar</th>
                            <th>Veprimet</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients as $patient)
                            <tr>
                                <td>{{ $patient->id_number }}</td>
                                <td>{{ $patient->first_name }} {{ $patient->last_name }}</td>
                                <td>{{ $patient->gender ? 'Mashkull' : 'Femer' }}</td>
                                <td>{{ $patient->phone_number }}</td>
                                <td>{{ $patient->email }}</td>
                                <td>{{ $patient->email_verified_at ? 'Yes' : 'No' }}</td>
                                <td>
                                    <form method="GET" action="{{ route('show-patient') }}">
                                        <input type="hidden" name="id" value="{{ $patient->id }}" />
                                        <input type="submit" class="btn btn-primary" value="Shiko pacientin" />
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
@endsection
