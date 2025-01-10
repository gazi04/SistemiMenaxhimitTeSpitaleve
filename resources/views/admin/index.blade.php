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
                        <h4 class="page-title">Administratoret</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="{{ url('shto-admin')}}" class="btn btn-primary btn-rounded float-right"><i
                                                         class="fa fa-plus"></i>
                            Shto një Admin</a>
                    </div>
                </div>
                <div class="row doctor-grid">
                    <div class="col-md-4 col-sm-4 col-lg-3">
                        <div class="profile-widget">
                            <div class="doctor-img">
                                <a class="avatar" href="{{ url('profile')}}">
                                    <img alt="" src="{{asset('assets/img/doctor-thumb-03.jpg')}}" />
                                </a>
                            </div>
                            <h4 class="doctor-name text-ellipsis">
                                <a href="{{ url('profile')}}">
                            </h4>
                            <!-- <div class="doc-prof">
                                <i class="fa fa-phone phone-icon">&nbsp;&nbsp;044-879-421</i>
                                </div> -->
                                <div class="user-country">
                                    <i class="fa fa-envelope"></i> cristina@gmail.com
                                </div>
                                <div class="action-buttons">
                                    <a href="{{ url('modifiko-admin')}}" class="btn btn-primary">
                                        <i class="fa fa-pencil"></i> Modifiko
                                    </a>
                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete_doctor">
                                        <i class="fa fa-trash-o"></i> Fshij
                                    </a>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-3">
                        <div class="profile-widget">
                            <div class="doctor-img">
                                <a class="avatar" href="{{ url('profile')}}">
                                    <img alt="" src="{{asset('assets/img/doctor-thumb-03.jpg')}}" />
                                </a>
                            </div>
                            <h4 class="doctor-name text-ellipsis">
                                <a href="{{ url('profile')}}">Cristina Groves</a>
                            </h4>
                            <!-- <div class="doc-prof">
                                <i class="fa fa-phone phone-icon">&nbsp;&nbsp;044-879-421</i>
                                </div> -->
                                <div class="user-country">
                                    <i class="fa fa-envelope"></i> cristina@gmail.com
                                </div>
                                <div class="action-buttons">
                                    <a href="{{ url('modifiko-admin')}}" class="btn btn-primary">
                                        <i class="fa fa-pencil"></i> Modifiko
                                    </a>
                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete_doctor">
                                        <i class="fa fa-trash-o"></i> Fshij
                                    </a>
                                </div>
                        </div>
                    </div>

                    <div id="delete_doctor" class="modal fade delete-modal" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    <img src="assets/img/sent.png" alt="" width="50" height="46" />
                                    <h3>A jeni i sigurt qe deshironi te fshini te dhenat e Adminit?</h3>
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
