<nav
      class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light"
      id="ftco-navbar"
    >
      <div class="container d-flex align-items-center">
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#ftco-nav"
          aria-controls="ftco-nav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="oi oi-menu"></span> Menu
        </button>
        <p class="button-custom order-lg-last mb-0">
          <a href="{{ route('login') }}" class="btn btn-secondary py-2 px-3"
            >Merr të dhënat mjeksore</a
          >
        </p>
        <!-- <p class="button-custom order-lg-last mb-0">
          <a href="appointment.html" class="btn btn-secondary py-2 px-3"
            >Cakto një termin</a
          > -->

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a href="{{ route('home-page') }}" class="nav-link pl-0">Ballina</a>
            </li>
            <li class="nav-item">
              <a href="about.html" class="nav-link">Rreth nesh</a>
            </li>
            <li class="nav-item">
              <a href="doctor.html" class="nav-link">Doktorët</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('departamentet-view') }}" class="nav-link">Departmentet</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
