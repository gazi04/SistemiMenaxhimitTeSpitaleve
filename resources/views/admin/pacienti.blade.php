@extends('layout')

@section('content')
<div class="main-wrapper">
    @include('admin.includes.header')
    @include('admin.includes.sidebar')
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
            <h1 class="text-center">Kërko Pacientin</h1>
            <form method="POST" action="{{ route('search-patients') }}" class="mb-4">
                @csrf
                <div class="input-group">
                    <input type="text" id="search-input" name="searchingTerm" class="form-control" placeholder="Kerko sipas emrit ose email-it" autocomplete="off">
                    &nbsp;&nbsp;
                    <input class="btn btn-primary" type="submit" value="Kërko" />
                </div>
            </form>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID-ja Pacientit</th>
                                    <th>Numri Personal</th>
                                    <th>Emri Mbiemri</th>
                                    <th>Gjinia</th>
                                    <th>Numri telefonit</th>
                                    <th>Email</th>
                                    <th class="text-right">Veprime</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($patients as $patient)
                                    <tr>
                                        <td>{{ $patient->id }}</td>
                                        <td>{{ $patient->id_number }}</td>
                                        <td>{{ $patient->personal_id }}</td>
                                        <td>{{ $patient->first_name }} {{ $patient->last_name}}</td>
                                        <td>{{ $patient->gender ? "Mashkull" : "Femer" }}</td>
                                        <td>{{ $patient->phone_number }}</td>
                                        <td>{{ $patient->email }}</td>
                                        <td class="text-right">
                                            <div class="action-buttons">
                                                <a href="{{ route('modify-patient-view', $patient->id) }}" class="btn btn-primary">
                                                    <i class="fa fa-pencil"></i>
                                                    Modifiko
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
