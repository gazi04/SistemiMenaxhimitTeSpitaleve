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
                    <h4 class="page-title">Departamentet</h4>
                </div>
                <div class="col-sm-7 col-7 text-right m-b-30">
                    <a href="{{ route('create-departament-view' )}}" class="btn btn-primary btn-rounded">Shto Departament</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Emri i Departamentit</th>
                                    <th>Pershkrimi</th>
                                    <th class="text-right">Veprime</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departaments as $dep)
                                    <tr>
                                        <td>{{ $dep->id }}</td>
                                        <td>{{ $dep->name }}</td>
                                        <td class="sorting_1 description">{{ $dep->description }}</td>
                                        <td class="text-right">
                                            <div class="action-buttons">
                                                <a href="{{ route('edit-departament-view', $dep->id) }}" class="btn btn-primary">
                                                    <i class="fa fa-pencil"></i>
                                                    Modifiko
                                                </a>
                                                {{--<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete_doctor" data-id="{{ $dep->id }}">--}}
                                                    {{--    <i class="fa fa-trash-o"></i>--}}
                                                    {{--    Fshij--}}
                                                    {{--</a> --}}
                                                <form action="{{ route('delete-departament', $dep->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('A jeni i sigurt qe doni ta fshini?')">
                                                        <i class="fa fa-trash-o"></i> Fshij
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{ $departaments->links('pagination::bootstrap-4') }}
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
