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
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Laborantet</h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="{{ route('create-technologist-view') }}" class="btn btn-primary btn-rounded float-right"><i
                            class="fa fa-plus"></i> Shto një Laborant</a>
                </div>
            </div>
            <div class="row doctor-grid">
                @foreach ($technologists as $technologist)
                    <div class="col-md-4 col-sm-4 col-lg-3">
                        <div class="profile-widget">
                            <div class="doctor-img">
                                <a class="avatar" href="{{url('profile')}}">
                                    <img alt="" src="{{asset('assets/img/doctor-thumb-03.jpg')}}" />
                                </a>
                            </div>
                            <h4 class="doctor-name text-ellipsis">
                                <a href="{{ url('profile')}}">{{ $technologist->first_name }} {{ $technologist->last_name }}</a>
                            </h4>
                            <div class="doc-prof">
                                <span class="dep">Departamenti</span>
                                <span> </span>
                            </div>
                            <div class="user-country">
                                <i class="fa fa-envelope"></i> {{ $technologist->email }}
                            </div>
                            <div class="action-buttons">
                                <a href="{{ route('edit-technologist-view', $technologist->id) }}" class="btn btn-primary">
                                    <i class="fa fa-pencil"></i> Modifiko
                                </a>
                                @if ($technologist->is_employed)
                                    <form action="{{ route('fire-technologist', $technologist->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="id" id="form-id" value="{{ $technologist->id }}">
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Deshironi vertet te largoni punetorin nga puna.')">Largon nga puna</button>
                                    </form>
                                @else
                                    <form action="{{ route('hire-technologist', $technologist->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="id" id="form-id" value="{{ $technologist->id }}">
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Deshironi te punesoni punetorin')">Punëso</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
                <div id="delete_doctor" class="modal fade delete-modal" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <img src="{{ asset('assets/img/sent.png')}}" alt="" width="50" height="46" />
                                <h3>A jeni i sigurt qe deshironi te fshini te dhenat e Laborantit</h3>
                                <div class="m-t-20">
                                    <a href="#" class="btn btn-white" data-dismiss="modal">Mbylle</a>
                                    <button type="submit" class="btn btn-danger">Fshij</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
