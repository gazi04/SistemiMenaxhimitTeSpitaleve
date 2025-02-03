<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title', 'Sistemi per Menaxhimin e Spitalit')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/home_page/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home_page/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/home_page/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home_page/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home_page/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/home_page/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/home_page/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/home_page/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home_page/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/home_page/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home_page/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home_page/css/style.css') }}">
  </head>
  <body>
    @include('home.includes.header')
    @include('home.includes.menu')

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Departamenti Klinik</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home-page') }}">Faqja e parë <i class="ion-ios-arrow-forward"></i></a></span> <span>Departamentet <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

		<section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center mb-5 pb-2">
                    <div class="col-md-8 text-center heading-section ftco-animate">
                        <span class="subheading">Departmentet</span>
                        <h2 class="mb-4">Departamenti Klinik</h2>
                        <p>Departamenti Klinik është një njësi spitalore që ofron kujdes mjekësor direkt për pacientët, përfshirë diagnozën, trajtimin dhe menaxhimin e sëmundjeve. Ai përbëhet nga mjekë, infermierë dhe profesionistë të tjerë shëndetësorë që punojnë së bashku për trajtim efikas.</p>
                    </div>
                </div>

                @include('home.includes.departamentet')
            </div>
    </section>

   @include('home.includes.footer')

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{ asset('assets/home_page/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/home_page/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('assets/home_page/js/popper.min.js') }}"></script>
  <script src="{{ asset('assets/home_page/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/home_page/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('assets/home_page/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/home_page/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('assets/home_page/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/home_page/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('assets/home_page/js/aos.js') }}"></script>
  <script src="{{ asset('assets/home_page/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('assets/home_page/js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('assets/home_page/js/jquery.timepicker.min.js') }}"></script>
  <script src="{{ asset('assets/home_page/js/scrollax.min.js') }}"></script>
  <script src="{{ asset('assets/home_page/https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false') }}"></script>
  <script src="{{ asset('assets/home_page/js/google-map.js') }}"></script>
  <script src="{{ asset('assets/home_page/js/main.js') }}"></script>

  </body>
</html>
