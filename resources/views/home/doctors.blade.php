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

    <section class="hero-wrap hero-wrap-2" style="background-image: url({{ asset('assets/home_page/images/bg_1.jpg') }});" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Mjekët e kualifikuar</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home-page') }}">Faqja e parë <i class="ion-ios-arrow-forward"></i></a></span> <span>Mjeku <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

		<section class="ftco-section">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url({{ asset('assets/home_page/images/doc-1.jpg') }});"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>Dr.Naim Zeka</h3>
								<span class="position mb-2">Neurolog</span>
								<div class="faded">
									<p>Unë jam Naim Zeka, neurolog me përvojë në diagnostikimin dhe trajtimin e çrregullimeve të sistemit nervor. Përkushtohem që të ofroj kujdes cilësor për pacientët dhe të përdor metodat më të fundit për menaxhimin e kushteve neurologjike. Gjatë karrierës sime, kam ndihmuar shumë pacientë të përballojnë sfida të ndryshme neurologjike dhe të përmirësojnë cilësinë e jetës së tyre.</p>
									<ul class="ftco-social text-center">
		                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		              </ul>
	              </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url({{ asset('assets/home_page/images/doc-2.jpg') }});"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>Dr.Ardian Shabani</h3>
								<span class="position mb-2">Oftamolog</span>
								<div class="faded">
									<p>Unë jam Ardian Shabani, oftamolog me përvojë në trajtimin e sëmundjeve të syrit. Kam aftësi të shkëlqyera në diagnostikimin dhe trajtimin e kushteve oftalmologjike, duke përdorur teknologji moderne. Përkushtohem të ofroj kujdes të shkëlqyer për pacientët dhe të ruaj shëndetin e syve të tyre.</p>
									<ul class="ftco-social text-center">
		                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		              </ul>
	              </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url({{ asset('assets/home_page/images/doc-3.jpg') }});"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>Dr.Bekim Kosumi</h3>
								<span class="position mb-2">Stomatolog</span>
								<div class="faded">
									<p>Unë jam Bekim Kosumi, stomatolog i specializuar në diagnostikimin dhe trajtimin e problemeve dentare. Përdor teknika moderne dhe qasje të kujdesshme për të ofruar trajtime pa dhimbje dhe efektive. Kam përkushtim të plotë në kujdesin për shëndetin e gojës dhe dhëmbëve të pacientëve të mi.</p>
									<ul class="ftco-social text-center">
		                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		              </ul>
	              </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url({{ asset('assets/home_page/images/doc-4.jpg') }});"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>Dr.Osman Ramadani</h3>
								<span class="position mb-2">Kardiolog</span>
								<div class="faded">
									<p>Unë jam Osman Ramadani, kardiolog me përvojë në trajtimin e problemeve të zemrës. Specializohem në diagnostikimin dhe menaxhimin e sëmundjeve kardiovaskulare, duke përdorur metoda moderne dhe teknika të avancuara. Jam i përkushtuar për të siguruar kujdes të shkëlqyer dhe për të ndihmuar pacientët të mbajnë zemrën e shëndetshme.</p>
									<ul class="ftco-social text-center">
		                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		              </ul>
	              </div>
							</div>
						</div>
					</div>

					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url({{ asset('assets/home_page/images/doc-5.jpg') }});"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>Dr.Naim Zeka</h3>
								<span class="position mb-2">Neurolog</span>
								<div class="faded">
									<p>Unë jam Naim Zeka, neurolog me përvojë në diagnostikimin dhe trajtimin e çrregullimeve të sistemit nervor. Përkushtohem që të ofroj kujdes cilësor për pacientët dhe të përdor metodat më të fundit për menaxhimin e kushteve neurologjike. Gjatë karrierës sime, kam ndihmuar shumë pacientë të përballojnë sfida të ndryshme neurologjike dhe të përmirësojnë cilësinë e jetës së tyre.</p>
									<ul class="ftco-social text-center">
		                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		              </ul>
	              </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url({{ asset('assets/home_page/images/doc-6.jpg') }});"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>Dr.Ardian Shabani</h3>
								<span class="position mb-2">Oftamolog</span>
								<div class="faded">
									<p>Unë jam Ardian Shabani, oftamolog me përvojë në trajtimin e sëmundjeve të syrit. Kam aftësi të shkëlqyera në diagnostikimin dhe trajtimin e kushteve oftalmologjike, duke përdorur teknologji moderne. Përkushtohem të ofroj kujdes të shkëlqyer për pacientët dhe të ruaj shëndetin e syve të tyre.</p>
									<ul class="ftco-social text-center">
		                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		              </ul>
	              </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url({{ asset('assets/home_page/images/doc-7.jpg') }});"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>Dr.Bekim Kosumi</h3>
								<span class="position mb-2">Stomatolog</span>
								<div class="faded">
									<p>Unë jam Bekim Kosumi, stomatolog i specializuar në diagnostikimin dhe trajtimin e problemeve dentare. Përdor teknika moderne dhe qasje të kujdesshme për të ofruar trajtime pa dhimbje dhe efektive. Kam përkushtim të plotë në kujdesin për shëndetin e gojës dhe dhëmbëve të pacientëve të mi.</p>
									<ul class="ftco-social text-center">
		                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		              </ul>
	              </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url({{ asset('assets/home_page/images/doc-8.jpg') }});"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>Dr.Osman Ramadani</h3>
								<span class="position mb-2">Kardiolog</span>
								<div class="faded">
									<p>Unë jam Osman Ramadani, kardiolog me përvojë në trajtimin e problemeve të zemrës. Specializohem në diagnostikimin dhe menaxhimin e sëmundjeve kardiovaskulare, duke përdorur metoda moderne dhe teknika të avancuara. Jam i përkushtuar për të siguruar kujdes të shkëlqyer dhe për të ndihmuar pacientët të mbajnë zemrën e shëndetshme.</p>
									<ul class="ftco-social text-center">
		                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		              </ul>
	              </div>
							</div>
						</div>
					</div>
				</div>

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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('assets/home_page/js/google-map.js') }}"></script>
  <script src="{{ asset('assets/home_page/js/main.js') }}"></script>

  </body>
</html>
