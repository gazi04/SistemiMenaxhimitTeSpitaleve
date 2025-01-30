<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Menyja Kryesore</li>
                <li>
                    <a href="{{ route('admin-dashboard') }}"><i class="fa fa-dashboard"></i>
                        <span>Paneli i Adminit</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-user"></i> <span> Stafi </span>
                        <span class="menu-arrow"></span></a>
                    <ul style="display: none">
                        <li><a href="{{ route('open-admin-view') }}">Administratoret</a></li>
                        <li><a href="{{ route('open-doctor-view') }}">Doktoret</a></li>
                        <li><a href="{{ route('open-nurse-view') }}">Infermieret</a></li>
                        <li><a href="{{ route('open-receptionist-view') }}">Recepcionistet</a></li>
                        <li><a href="{{ route('open-technologist-view') }}">Laborantet</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('open-patient-view') }}"><i class="fa fa-wheelchair"></i> <span>Pacientet</span></a>
                </li>
                <li>
                    <a href="{{ route('show-departaments') }}">
                        <i class="fa fa-hospital-o" class="active"></i>
                        <span>Departmentet</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('appointments') }}"><i class="fa fa-calendar"></i> <span>Terminet</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
