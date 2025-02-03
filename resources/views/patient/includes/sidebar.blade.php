<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Menyja Kryesore</li>
                <li>
                    <a href="{{ route('patient-dashboard') }}"><i class="fa fa-dashboard"></i>
                        <span>Paneli i Pacientit</span></a>
                </li>
                <li>
                    <a href="{{ route('make-appointment') }}"><i class="fa fa-dashboard"></i>
                        <span>Cakto Termine</span></a>
                </li>
                <li class="submenu">
                    {{--TODO- DIMALI DUHET ME NDREQ SUBMENYN IKON IDENTIFIKUESE ESHTE SHKRIR ME TEKSTIN--}}
                    <a href="#"><i class="fa fa-user"></i> <span> Të dhënat shëndetësore </span>
                        <span class="menu-arrow"></span></a>
                    <ul style="display: none">
                        <li><a href="{{ route('display-diagnoses-view') }}">Diagnozat</a></li>
                        <li><a href="{{ route('displays-tests-view') }}">Testet</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
