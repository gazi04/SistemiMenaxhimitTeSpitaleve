<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title', 'Sistemi per Menaxhimin e Spitalit')</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link
      href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="{{ asset('assets/home_page/css/open-iconic-bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/home_page/css/animate.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/home_page/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/home_page/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/home_page/css/magnific-popup.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/home_page/css/aos.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/home_page/css/ionicons.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/home_page/css/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/home_page/css/jquery.timepicker.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/home_page/css/flaticon.css') }}" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/flaticon/3.0.1/font/flaticon.css"
    />

    <link rel="stylesheet" href="{{ asset('assets/home_page/css/icomoon.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/home_page/css/style.css') }}" />
  </head>
  <body>
      @include('home.includes.header')
      @include('home.includes.menu')

    <section class="home-slider owl-carousel">
      <div
        class="slider-item"
        style="background-image: url({{ asset('assets/home_page/images/bg_1.jpg') }})"
        data-stellar-background-ratio="0.5"
      >
        <div class="overlay"></div>
        <div class="container">
          <div
            class="row no-gutters slider-text align-items-center justify-content-start"
            data-scrollax-parent="true"
          >
            <div class="col-md-6 text ftco-animate">
              <h1 class="mb-4">
                Ne kujdesemi <span>për mirëqenien tuaj</span>
              </h1>
              <h3 class="subheading">
                Çdo ditë sjellim shpresë dhe buzëqeshje për pacientët tanë.
              </h3>
              <!-- <p>
                <a href="#" class="btn btn-secondary px-4 py-3 mt-3"
                  >Shikoni punën tonë</a
                >
              </p> -->
            </div>
          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url({{ asset('assets/home_page/images/bg_2.jpg') }})">
        <div class="overlay"></div>
        <div class="container">
          <div
            class="row no-gutters slider-text align-items-center justify-content-start"
            data-scrollax-parent="true"
          >
            <div class="col-md-6 text ftco-animate">
              <h1 class="mb-4">Ne kujdesemi <span>për shëndetin tuaj</span></h1>
              <h3 class="subheading">Shëndeti juaj është prioriteti ynë.</h3>
              <p>
                <a href="#" class="btn btn-secondary px-4 py-3 mt-3"
                  >Shikoni punën tonë</a
                >
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-services ftco-no-pb">
      <div class="container">
        <div class="row no-gutters">
          <div
            class="col-md-3 d-flex services align-self-stretch p-4 ftco-animate"
          >
            <div class="media block-6 d-block text-center">
              <div
                class="icon d-flex justify-content-center align-items-center"
              >
                <span class="flaticon-doctor"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Mjeke te Kualifikuar</h3>
                <p>
                  Kujdesi jonë ofrohet nga mjekë të kualifikuar dhe
                  profesionistë, të gatshëm për të siguruar shërbimin më të mirë
                  për shëndetin tuaj.
                </p>
              </div>
            </div>
          </div>
          <div
            class="col-md-3 d-flex services align-self-stretch p-4 ftco-animate"
          >
            <div class="media block-6 d-block text-center">
              <div
                class="icon d-flex justify-content-center align-items-center"
              >
                <span class="flaticon-ambulance"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Emergjenca</h3>
                <p>
                  Shërbimi jonë i emergjencës është i disponueshëm 24 orë në
                  ditë për të siguruar ndihmën e menjëhershme për çdo rast
                  urgjent.
                </p>
              </div>
            </div>
          </div>
          <div
            class="col-md-3 d-flex services align-self-stretch p-4 ftco-animate"
          >
            <div class="media block-6 d-block text-center">
              <div
                class="icon d-flex justify-content-center align-items-center"
              >
                <span class="flaticon-stethoscope"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Mundësi kontrolle</h3>
                <p>
                  Mund të rezervoni një takim në çdo kohë që ju përshtatet, për
                  një shërbim fleksibil dhe të përshtatshëm.
                </p>
              </div>
            </div>
          </div>
          <div
            class="col-md-3 d-flex services align-self-stretch p-4 ftco-animate"
          >
            <div class="media block-6 d-block text-center">
              <div
                class="icon d-flex justify-content-center align-items-center"
              >
                <span class="flaticon-24-hours"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Shërbim 24 orë</h3>
                <p>
                  Ofrimi i shërbimeve gjatë gjithë ditës dhe natës, duke
                  siguruar mbështetje të pakufizuar dhe cilësore.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-no-pt ftc-no-pb">
      <div class="container">
        <div class="row no-gutters">
          <div
            class="col-md-5 p-md-5 img img-2 mt-5 mt-md-0"
            style="background-image: url({{ asset('assets/home_page/images/about.jpg') }})"
          ></div>
          <div class="col-md-7 wrap-about py-4 py-md-5 ftco-animate">
            <div class="heading-section mb-5">
              <div class="pl-md-5 ml-md-5">
                <span class="subheading">Rreth Spitalit</span>
                <h2 class="mb-4" style="font-size: 28px">
                  Ofrim kujdesi profesional për nevojat shëndetësore të çdo
                  pacienti.
                </h2>
              </div>
            </div>
            <div class="pl-md-5 ml-md-5 mb-5">
              <p>
                QKUK është spitali që ofron kujdes të plotë për të gjithë
                pacientët, nga trajtime të thjeshta deri te ato më komplekse, me
                përkushtim dhe profesionalizëm.
              </p>
              <div class="row mt-5 pt-2">
                <div class="col-lg-6">
                  <div class="services-2 d-flex">
                    <div
                      class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"
                    >
                      <span class="flaticon-first-aid-kit"></span>
                    </div>
                    <div class="text">
                      <h3>Kujdesi parësor</h3>
                      <p>
                      Kujdesi parësor është niveli i parë i shërbimeve shëndetësore, duke ofruar parandalim, diagnozë dhe trajtim për sëmundjet e zakonshme. Ai sigurohet nga mjekët e familjes dhe profesionistë të tjerë shëndetësorë, duke luajtur një rol kyç në menaxhimin e shëndetit dhe parandalimin e komplikacioneve.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="services-2 d-flex">
                    <div
                      class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"
                    >
                      <span class="flaticon-dropper"></span>
                    </div>
                    <div class="text">
                      <h3>Analiza në laborator</h3>
                      <p>
                        Ofron analiza të shpejta dhe të sakta për diagnoza të
                        sigurta.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="services-2 d-flex">
                    <div
                      class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"
                    >
                      <span class="flaticon-experiment-results"></span>
                    </div>
                    <div class="text">
                      <h3>Kontrollimi simptomave</h3>
                      <p>
                      Kontrolli i simptomave është procesi i vlerësimit dhe menaxhimit të shenjave dhe ankesa që një pacient ka për shkak të një sëmundjeje ose gjendje shëndetësore. Ky proces përfshin diagnostikimin e saktë të simptomave, përdorimin e trajtimeve të përshtatshme dhe monitorimin e përmirësimit të pacientit për të siguruar që simptomat të kontrollohen dhe të menaxhohen në mënyrë efikase.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="services-2 d-flex">
                    <div
                      class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"
                    >
                      <span class="flaticon-heart-rate"></span>
                    </div>
                    <div class="text">
                      <h3>Shërbim i Përshtatshëm</h3>
                      <p>
                        Ofroni shërbime shëndetësore të përshtatshme dhe
                        fleksibile.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section
      class="ftco-intro"
      style="background-image: url({{ asset('assets/home_page/images/bg_3.jpg') }})"
      data-stellar-background-ratio="0.5"
    >
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <h2>Ne ofrojmë konsulta falas për shëndetin tuaj</h2>
            <p class="mb-0">
              Shëndeti juaj është prioriteti ynë kryesor me shërbime mjekësore
              gjithëpërfshirëse dhe të përballueshme.
            </p>
            <p></p>
          </div>
          <div class="col-md-3 d-flex align-items-center">
            <p class="mb-0">
              <a href="{{ route('login') }}" class="btn btn-secondary px-4 py-3">Cakto termin</a>
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <span class="subheading">Departmentet</span>
            <h2 class="mb-4">Departmentet e Spitalit</h2>
            <p>
              Spitali ynë ofron shërbime të specializuara në disa departamente
              për t'u siguruar që çdo pacient të marrë kujdesin më të mirë. Ne
              sigurojmë trajtim dhe mbështetje për shërim të shpejtë dhe
              efektiv.
            </p>
          </div>
        </div>
       @include('home.includes.departamentet')
      </div>
    </section>

    <section class="ftco-section ftco-no-pt">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <span class="subheading">Mjekët</span>
            <h2 class="mb-4">Mjekë të kualifikuar</h2>
            <p>
              Ne ofrojmë kujdes shëndetësor nga mjekë me përvojë dhe të
              kualifikuar që janë gjithmonë të gatshëm të ofrojnë shërbimin më
              të mirë për ju.
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="staff">
              <div class="img-wrap d-flex align-items-stretch">
                <div
                  class="img align-self-stretch"
                  style="background-image: url({{ asset('assets/home_page/images/doc-1.jpg') }})"
                ></div>
              </div>
              <div class="text pt-3 text-center">
                <h3>Dr.Naim Zeka</h3>
                <span class="position mb-2">Neurologist</span>
                <div class="faded">
                  <p>
                  Unë jam Naim Zeka, neurolog me përvojë në diagnostikimin dhe trajtimin e çrregullimeve të sistemit nervor. Përkushtohem që të ofroj kujdes cilësor për pacientët dhe të përdor metodat më të fundit për menaxhimin e kushteve neurologjike. Gjatë karrierës sime, kam ndihmuar shumë pacientë të përballojnë sfida të ndryshme neurologjike dhe të përmirësojnë cilësinë e jetës së tyre.
                  </p>
                  <ul class="ftco-social text-center">
                    <li class="ftco-animate">
                      <a href="#"><span class="icon-twitter"></span></a>
                    </li>
                    <li class="ftco-animate">
                      <a href="#"><span class="icon-facebook"></span></a>
                    </li>
                    <li class="ftco-animate">
                      <a href="#"><span class="icon-google-plus"></span></a>
                    </li>
                    <li class="ftco-animate">
                      <a href="#"><span class="icon-instagram"></span></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="staff">
              <div class="img-wrap d-flex align-items-stretch">
                <div
                  class="img align-self-stretch"
                  style="background-image: url({{ asset('assets/home_page/images/doc-2.jpg') }})"
                ></div>
              </div>
              <div class="text pt-3 text-center">
                <h3>Dr.Ardian Shabani</h3>
                <span class="position mb-2">Oftamolog</span>
                <div class="faded">
                  <p>
                  Unë jam Ardian Shabani, oftamolog me përvojë në trajtimin e sëmundjeve të syrit. Kam aftësi të shkëlqyera në diagnostikimin dhe trajtimin e kushteve oftalmologjike, duke përdorur teknologji moderne. Përkushtohem të ofroj kujdes të shkëlqyer për pacientët dhe të ruaj shëndetin e syve të tyre.
                  </p>
                  <ul class="ftco-social text-center">
                    <li class="ftco-animate">
                      <a href="#"><span class="icon-twitter"></span></a>
                    </li>
                    <li class="ftco-animate">
                      <a href="#"><span class="icon-facebook"></span></a>
                    </li>
                    <li class="ftco-animate">
                      <a href="#"><span class="icon-google-plus"></span></a>
                    </li>
                    <li class="ftco-animate">
                      <a href="#"><span class="icon-instagram"></span></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="staff">
              <div class="img-wrap d-flex align-items-stretch">
                <div
                  class="img align-self-stretch"
                  style="background-image: url({{ asset('assets/home_page/images/doc-3.jpg') }})"
                ></div>
              </div>
              <div class="text pt-3 text-center">
                <h3>Dr.Bekim Kosumi</h3>
                <span class="position mb-2">Stomatolog</span>
                <div class="faded">
                  <p>
                  Unë jam Bekim Kosumi, stomatolog i specializuar në diagnostikimin dhe trajtimin e problemeve dentare. Përdor teknika moderne dhe qasje të kujdesshme për të ofruar trajtime pa dhimbje dhe efektive. Kam përkushtim të plotë në kujdesin për shëndetin e gojës dhe dhëmbëve të pacientëve të mi.
                  </p>
                  <ul class="ftco-social text-center">
                    <li class="ftco-animate">
                      <a href="#"><span class="icon-twitter"></span></a>
                    </li>
                    <li class="ftco-animate">
                      <a href="#"><span class="icon-facebook"></span></a>
                    </li>
                    <li class="ftco-animate">
                      <a href="#"><span class="icon-google-plus"></span></a>
                    </li>
                    <li class="ftco-animate">
                      <a href="#"><span class="icon-instagram"></span></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="staff">
              <div class="img-wrap d-flex align-items-stretch">
                <div
                  class="img align-self-stretch"
                  style="background-image: url({{ asset('assets/home_page/images/doc-4.jpg') }})"
                ></div>
              </div>
              <div class="text pt-3 text-center">
                <h3>Dr.Osman Ramadani</h3>
                <span class="position mb-2">Kardiolog</span>
                <div class="faded">
                  <p>
                  Unë jam Osman Ramadani, kardiolog me përvojë në trajtimin e problemeve të zemrës. Specializohem në diagnostikimin dhe menaxhimin e sëmundjeve kardiovaskulare, duke përdorur metoda moderne dhe teknika të avancuara. Jam i përkushtuar për të siguruar kujdes të shkëlqyer dhe për të ndihmuar pacientët të mbajnë zemrën e shëndetshme.
                  </p>
                  <ul class="ftco-social text-center">
                    <li class="ftco-animate">
                      <a href="#"><span class="icon-twitter"></span></a>
                    </li>
                    <li class="ftco-animate">
                      <a href="#"><span class="icon-facebook"></span></a>
                    </li>
                    <li class="ftco-animate">
                      <a href="#"><span class="icon-google-plus"></span></a>
                    </li>
                    <li class="ftco-animate">
                      <a href="#"><span class="icon-instagram"></span></a>
                    </li>
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
    <div id="ftco-loader" class="show fullscreen">
      <svg class="circular" width="48px" height="48px">
        <circle
          class="path-bg"
          cx="24"
          cy="24"
          r="22"
          fill="none"
          stroke-width="4"
          stroke="#eeeeee"
        />
        <circle
          class="path"
          cx="24"
          cy="24"
          r="22"
          fill="none"
          stroke-width="4"
          stroke-miterlimit="10"
          stroke="#F96D00"
        />
      </svg>
    </div>

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
