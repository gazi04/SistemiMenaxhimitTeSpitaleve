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
                    <h4 class="page-title">Infermieret</h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="{{ route('create-nurse-view') }}" class="btn btn-primary btn-rounded float-right"><i
                                                               class="fa fa-plus"></i> Shto një infermier/e</a>
                </div>
            </div>
            <div class="row doctor-grid">
                @foreach ($nurses as $nurse)
                    <div class="col-md-4 col-sm-4 col-lg-3">
                        <div class="profile-widget">
                            <div class="doctor-img">
                                <a class="avatar" href="{{url('profile')}}">
                                    <img alt="" src="{{asset('assets/img/doctor-thumb-03.jpg')}}" />
                                </a>
                            </div>
                            <h4 class="doctor-name text-ellipsis">
                                <a href="{{ url('profile')}}">{{ $nurse->first_name }} {{ $nurse->last_name }}</a>
                            </h4>
                            <div class="user-country">
                                <i class="fa fa-envelope"></i> {{ $nurse->email }}
                            </div>
                            <div class="action-buttons">
                                <a href="{{ route('edit-nurse-view', $nurse->id) }}" class="btn btn-primary">
                                    <i class="fa fa-pencil"></i> Modifiko
                                </a>
                                @if ($nurse->is_employed)
                                    <form action="{{ route('fire-nurse', $nurse->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="id" id="form-id" value="{{ $nurse->id }}">
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Deshironi vertet te largoni punetorin nga puna.')">Largon nga puna</button>
                                    </form>
                                @else
                                    <form action="{{ route('hire-nurse', $nurse->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="id" id="form-id" value="{{ $nurse->id }}">
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
                                <img src="{{ asset('assets/img/sent.png"')}}" alt="" width=" 50" height="46" />
                                <h3>A jeni i sigurte qe deshironi te fshini te dhenat e infermierit</h3>
                                <div class="m-t-20">
                                    <a href="#" class="btn btn-white" data-dismiss="modal">Mbylle</a>
                                    <button type="submit" class="btn btn-danger">Fshij</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
