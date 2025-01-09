<div class="header">
    <div class="header-left">
        <a href="{{ route('admin-dashboard') }}" class="logo">
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
                <span>Pacienti</span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ url('profile') }}">My Profile</a>
                <a class="dropdown-item" href="{{ url('edit-profile') }}">Edit Profile</a>
                <a class="dropdown-item" href="{{ url('settings') }}">Settings</a>
                <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
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
