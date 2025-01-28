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
            <div class="row">
                <div class="col-sm-5 col-5">
                    <h4 class="page-title">Pacientët</h4>
                </div>
            </div>
            <div class="row">
                Kërko Pacientin
                {{--TODO- TEK SEARCH BAR DUHET TE APLIKOHET TEMPLATI--}}
                <form method="GET" action="{{ route('search-patient') }}" class="mb-4">
                    <div class="input-group">
                        <input type="text" id="search-input" name="searchingTerm" class="form-control" placeholder="Kerko sipas emrit ose email-it" autocomplete="off">
                        <input type="submit" value="Kërko" />
                    </div>
                </form>
            </div>
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
                                        <td>{{ $patient->personal_id }}</td>
                                        <td>{{ $patient->id_number }}</td>
                                        <td>{{ $patient->first_name }} {{ $patient->last_name}}</td>
                                        <td>{{ $patient->gender ? "Mashkull" : "Femer" }}</td>
                                        <td>{{ $patient->phone_number }}</td>
                                        <td>{{ $patient->email }}</td>
                                        <td class="text-right">
                                            <div class="action-buttons">
                                                <a href="" class="btn btn-primary">
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
    <div id="delete_doctor" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="assets/img/sent.png" alt="" width="50" height="46" />
                    <h3>A jeni i sigurt qe deshironi te fshini dhenat e Departamentit?</h3>
                    <div class="m-t-20">
                        <a href="#" class="btn btn-white" data-dismiss="modal">Mbylle</a>
                        <form id="delete-form" action="{{ route('delete-departament', 0) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Fshij</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
