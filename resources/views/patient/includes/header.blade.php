<div class="header">
    <div class="header-left">
        <a href="{{ route('admin-dashboard') }}" class="logo">
            <img src="{{ asset('assets/img/logo.png') }}" width="35" height="35" alt="" />
            <span>SMS</span>
        </a>
    </div>
    <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
    <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
    <ul class="nav user-menu float-right">
        <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                <span class="user-img"><img class="rounded-circle" src="{{ asset('assets/img/doctor-thumb-03.jpg') }}"
                                                                   width="40" alt="Admin" />
                    <span class="status online"></span></span>
                <span>Pacienti/ja</span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('logout') }}">Çkyçu</a>
            </div>
        </li>
    </ul>
    <div class="dropdown mobile-user-menu float-right">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                                                            class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route('logout') }}">Çkyçu</a>
        </div>
    </div>
</div>
