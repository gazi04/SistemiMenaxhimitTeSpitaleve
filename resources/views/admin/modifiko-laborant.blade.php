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
                            <li class="active"><a href="{{ url('doktoret') }}">Doktoret</a></li>
                            <li><a href="{{ url('infermieret') }}">Infermieret</a></li>
                            <li><a href="{{ url('recepcionistet') }}">Recepcionistet</a></li>
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
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Modifiko Laborantin/en</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{ route('your.route.name') }}" method="POST">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>ID e Laborantit<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" value="L0001" readonly="" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="from-group">
                                    <label>Numri Personal</label>
                                    <input class="form-control" type="text" placeholder="Shkruani numrin personal" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Emri <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Shkruani emrin" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="from-group">
                                    <label>Mbiemri</label>
                                    <input class="form-control" type="text" placeholder="Shkruani mbiemrin" />
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="from-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input class="form-control" type="email" placeholder="Shkruani email-in" />
                                </div>
                            </div>

                            <div class="col-sm-6 mt-4">
                                <div class="from-group">
                                    <label>Datëlindja</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker"
                                            placeholder="Zgjidhni datën" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mt-4">
                                <div class="from-group gender-select">
                                    <label class="gen-label">Gjinia:</label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="gender" class="form-check-input" />
                                            Mashkull
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="gender" class="form-check-input" />
                                            Femër
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 mt-4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="from-group">
                                            <label>Numri Kontaktues</label>
                                            <input class="form-control" type="text" placeholder="Shkruani numrin" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn">
                                Ruaj të dhënat
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
@endsection