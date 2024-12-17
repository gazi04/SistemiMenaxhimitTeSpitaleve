@extends('layout') 

@section('content') 
<div class="main-wrapper">
    <div class="header">
        <div class="header-left">
            <a href="{{ url('index') }}" class="logo">
                <img src="{{ asset('assets/img/logo.png') }}" width="35" height="35" alt="" />
                <span>Preclinic</span>
            </a>
        </div>
        <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
        <ul class="nav user-menu float-right">
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                    <span class="user-img"><img class="rounded-circle" src="{{ asset('assets/img/user.jpg') }}"
                            width="40" alt="Admin" />
                        <span class="status online"></span></span>
                    <span>Admin</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ url('profile') }}">My Profile</a>
                    <a class="dropdown-item" href="{{ url('edit-profile') }}">Edit Profile</a>
                    <a class="dropdown-item" href="{{ url('settings') }}">Settings</a>
                    <a class="dropdown-item" href="{{ url('login') }}">Logout</a>
                </div>
            </li>
        </ul>
        <div class="dropdown mobile-user-menu float-right">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                    class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ url('profile') }}">My Profile</a>
                <a class="dropdown-item" href="{{ url('edit-profile') }}">Edit Profile</a>
                <a class="dropdown-item" href="{{ url('settings') }}">Settings</a>
                <a class="dropdown-item" href="{{ url('login') }}">Logout</a>
            </div>
        </div>
    </div>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">Main</li>
                    <li>
                        <a href="{{ url('paneliAdmin') }}"><i class="fa fa-dashboard"></i>
                            <span>Paneli i Adminit</span></a>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fa fa-user"></i> <span> Stafi </span>
                            <span class="menu-arrow"></span></a>
                        <ul style="display: none">
                            <li><a href="{{ url('admin') }}">Administratoret</a></li>
                            <li><a href="{{ url('doktoret') }}">Doktoret</a></li>
                            <li><a href="{{ url('infermieret') }}">Infermieret</a></li>
                            <li class="active"><a href="{{ url('recepcionistet') }}">Recepcionistet</a></li>
                            <li>
                                <a href="{{ url('laborantet') }}">Laborantet</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('patients') }}"><i class="fa fa-wheelchair"></i> <span>Pacientet</span></a>
                    </li>
                    <li>
                        <a href="{{ url('departmentet') }}"><i class="fa fa-hospital-o"></i>
                            <span>Departmentet</span></a>
                    </li>
                    <li>
                        <a href="{{ url('appointments') }}"><i class="fa fa-calendar"></i> <span>Terminet</span></a>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fa fa-money"></i> <span> Accounts </span>
                            <span class="menu-arrow"></span></a>
                        <ul style="display: none">
                            <li><a href="{{ url('invoices') }}">Invoices</a></li>
                            <li><a href="{{ url('payments') }}">Payments</a></li>
                            <li><a href="{{ url('expenses') }}">Expenses</a></li>
                            <li><a href="{{ url('taxes') }}">Taxes</a></li>
                            <li><a href="{{ url('provident-fund') }}">Provident Fund</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="fa fa-flag-o"></i> <span> Raportet </span>
                            <span class="menu-arrow"></span></a>
                        <ul style="display: none">
                            <li><a href="{{ url('expense-reports') }}"> Expense Report </a></li>
                            <li><a href="{{ url('invoice-reports') }}"> Invoice Report </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('settings') }}"><i class="fa fa-cog"></i> <span>Settings</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Recepcionistet</h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="{{ url('shto-recepcionist')}}" class="btn btn-primary btn-rounded float-right"><i
                            class="fa fa-plus"></i> Shto një Recepcionist</a>
                </div>
            </div>
            <div class="row doctor-grid">
                <div class="col-md-4 col-sm-4 col-lg-3">
                    <div class="profile-widget">
                        <div class="doctor-img">
                            <a class="avatar" href="{{ url('profile') }}">
                                <img alt="" src="{{ asset('assets/img/doctor-thumb-03.jpg')}}" />
                            </a>
                        </div>
                        <h4 class="doctor-name text-ellipsis">
                            <a href="{{ url('profile')}}">Cristina Groves</a>
                        </h4>
                        <div class="doc-prof">
                            <span class="dep">Departamenti</span>
                            <span>Gynecologist</span>
                        </div>
                        <div class="user-country">
                            <i class="fa fa-envelope"></i> cristina@gmail.com
                        </div>
                        <div class="action-buttons">
                            <a href="{{ url('modifiko-recepcionist')}}" class="btn btn-primary">
                                <i class="fa fa-pencil"></i> Modifiko
                            </a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete_doctor">
                                <i class="fa fa-trash-o"></i> Fshij
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div id="delete_doctor" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img src="{{ asset('assets/img/sent.png')}}" alt="" width="50" height="46" />
                        <h3>A jeni i sigurte qe deshironi te fshini te dhenat e Recepcionistit</h3>
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