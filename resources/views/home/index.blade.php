<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Dr.care - Free Bootstrap 4 Template by Colorlib</title>
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
    <nav
      class="navbar py-4 navbar-expand-lg ftco_navbar navbar-light bg-light flex-row"
    >
      <div class="container">
        <div
          class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0"
        >
          <div class="col-lg-2 pr-4 align-items-center">
            <a class="navbar-brand" href="index.html">QK<span>UK</span></a>
          </div>
          <div class="col-lg-10 d-none d-md-block">
            <div class="row d-flex">
              <div class="col-md-4 pr-4 d-flex topper align-items-center">
                <div
                  class="icon bg-white mr-2 d-flex justify-content-center align-items-center"
                >
                  <span class="icon-map"></span>
                </div>
                <span class="text"
                  >Address: 198 West 21th Street, Suite 721 New York NY
                  10016</span
                >
              </div>
              <div class="col-md pr-4 d-flex topper align-items-center">
                <div
                  class="icon bg-white mr-2 d-flex justify-content-center align-items-center"
                >
                  <span class="icon-paper-plane"></span>
                </div>
                <span class="text">Email: emailiyt@email.com</span>
              </div>
              <div class="col-md pr-4 d-flex topper align-items-center">
                <div
                  class="icon bg-white mr-2 d-flex justify-content-center align-items-center"
                >
                  <span class="icon-phone2"></span>
                </div>
                <span class="text">Numri Telefonit: + 1235 2355 98</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
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
          <a href="appointment.html" class="btn btn-secondary py-2 px-3"
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
              <a href="index.html" class="nav-link pl-0">Ballina</a>
            </li>
            <li class="nav-item">
              <a href="about.html" class="nav-link">Rreth nesh</a>
            </li>
            <li class="nav-item">
              <a href="#doktoret" class="nav-link">Doktorët</a>
            </li>
            <li class="nav-item">
              <a href="#departamenti-section" class="nav-link">Departmentet</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->

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
                <h3 class="heading">Mundesi kontrolle</h3>
                <p>
                  Mund të rezervoni një takim në çdo kohë që ju përshtatet, për
                  një shërbim fleksibël dhe të përshtatshëm.
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
                <h3 class="heading">Sherbim 24-ore</h3>
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
                        Far far away, behind the word mountains, far from the
                        countries Vokalia.
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
                        Far far away, behind the word mountains, far from the
                        countries Vokalia.
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
              <a href="#" class="btn btn-secondary px-4 py-3">Cakto termin</a>
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section" id="departamenti-section">
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
        <div class="ftco-departments">
          <div class="row">
            <div class="col-md-12 nav-link-wrap">
              <div
                class="nav nav-pills d-flex text-center"
                id="v-pills-tab"
                role="tablist"
                aria-orientation="vertical"
              >
                <a
                  class="nav-link ftco-animate active"
                  id="v-pills-1-tab"
                  data-toggle="pill"
                  href="#v-pills-1"
                  role="tab"
                  aria-controls="v-pills-1"
                  aria-selected="true"
                  >Neurologjia</a
                >

                <a
                  class="nav-link ftco-animate"
                  id="v-pills-2-tab"
                  data-toggle="pill"
                  href="#v-pills-2"
                  role="tab"
                  aria-controls="v-pills-2"
                  aria-selected="false"
                  >Kirurgjia</a
                >

                <a
                  class="nav-link ftco-animate"
                  id="v-pills-3-tab"
                  data-toggle="pill"
                  href="#v-pills-3"
                  role="tab"
                  aria-controls="v-pills-3"
                  aria-selected="false"
                  >Stomatologu</a
                >

                <a
                  class="nav-link ftco-animate"
                  id="v-pills-4-tab"
                  data-toggle="pill"
                  href="#v-pills-4"
                  role="tab"
                  aria-controls="v-pills-4"
                  aria-selected="false"
                  >Oftamologu</a
                >

                <a
                  class="nav-link ftco-animate"
                  id="v-pills-5-tab"
                  data-toggle="pill"
                  href="#v-pills-5"
                  role="tab"
                  aria-controls="v-pills-5"
                  aria-selected="false"
                  >Kardiologjia</a
                >
              </div>
            </div>
            <div class="col-md-12 tab-wrap">
              <div
                class="tab-content bg-light p-4 p-md-5 ftco-animate"
                id="v-pills-tabContent"
              >
                <div
                  class="tab-pane py-2 fade show active"
                  id="v-pills-1"
                  role="tabpanel"
                  aria-labelledby="day-1-tab"
                >
                  <div class="row departments">
                    <div
                      class="col-lg-4 order-lg-last d-flex align-items-stretch"
                    >
                      <div
                        class="img d-flex align-self-stretch"
                        style="background-image: url({{ asset('assets/home_page/images/dept-1.jpg') }})"
                      ></div>
                    </div>
                    <div class="col-lg-8">
                      <h2>Departamenti i Neurologjis</h2>
                      <p>
                        Departamenti Neurologjik ofron kujdes të specializuar
                        për trajtimin dhe menaxhimin e çrregullimeve të sistemit
                        nervor, duke përdorur teknologjinë më të avancuar për
                        diagnostikim dhe trajtim.
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
                              <h3>Kujdes për Pacientët</h3>
                              <p>
                                Ofron kujdes të personalizuar dhe trajtim të
                                integruar për çdo pacient, bazuar në nevojat dhe
                                gjendjen e tij neurologjike.
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
                              <h3>Testime Neurologjike</h3>
                              <p>
                                Ofron testime të avancuara për vlerësimin e
                                shëndetit neurologjik, duke përfshirë analiza të
                                trurit dhe sistemit nervor për të diagnostikuar
                                dhe monitoruar çrregullimet neurologjike.
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
                              <h3>Diagnostikim i Avancuar</h3>
                              <p>
                                Përdorim teknologji moderne si MRI dhe EEG për
                                të diagnostikuar dhe vlerësuar saktësisht
                                gjendjen neurologjike të pacientëve.
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
                              <h3>Mbështetje dhe Trajtim Pas Diagnostikimit</h3>
                              <p>
                                Pas diagnostikimit, ofrojmë mbështetje të
                                vazhdueshme për trajtimin dhe përmirësimin e
                                shëndetit neurologjik të pacientëve.
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div
                  class="tab-pane fade"
                  id="v-pills-2"
                  role="tabpanel"
                  aria-labelledby="v-pills-day-2-tab"
                >
                  <div class="row departments">
                    <div
                      class="col-lg-4 order-lg-last d-flex align-items-stretch"
                    >
                      <div
                        class="img d-flex align-self-stretch"
                        style="background-image: url({{ asset('assets/home_page/images/dept-2.jpg') }})"
                      ></div>
                    </div>
                    <div class="col-md-8">
                      <h2>Departamenti i Kirurgjis</h2>
                      <p>
                        Departamenti Kirurgjik ofron një gamë të gjerë
                        shërbimesh kirurgjikale për trajtimin e pacientëve me
                        nevoja të ndryshme. Ne përdorim teknologji moderne dhe
                        metoda të avancuara për të siguruar kujdesin më të lartë
                        për pacientët tanë, përfshirë ndërhyrje kirurgjikale të
                        planifikuara dhe urgjente.
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
                              <h3>Kirurgjia dhe Kujdesi i Menjëhershëm</h3>
                              <p>
                                Ofrimi i kujdesit të menjëhershëm kirurgjik për
                                pacientët që kërkojnë ndërhyrje të shpejtë dhe
                                efikase pas aksidenteve ose lëndimeve.
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
                              <h3>Testime dhe Analiza Kirurgjikale</h3>
                              <p>
                                Ofrimi i testimeve dhe analizave për
                                diagnostikim dhe përgatitje para dhe pas
                                kirurgjisë.
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
                              <h3>Trajtimi Kirurgjik i Sëmundjeve</h3>
                              <p>
                                Ne ofrojmë trajtime kirurgjikale për një
                                shumëllojshmëri sëmundjesh që kërkojnë ndërhyrje
                                të specializuara për përmirësimin e shëndetit të
                                pacientëve.
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
                              <h3>Shërbimi Kirurgjik i Integruar</h3>
                              <p>
                                Ne sigurojmë shërbime kirurgjikale të
                                integruara, ku trajtimi i pacientëve bëhet në
                                bashkëpunim me departamente të tjera për një
                                kujdes të plotë dhe efikas.
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  class="tab-pane fade"
                  id="v-pills-3"
                  role="tabpanel"
                  aria-labelledby="v-pills-day-3-tab"
                >
                  <div class="row departments">
                    <div
                      class="col-lg-4 order-lg-last d-flex align-items-stretch"
                    >
                      <div
                        class="img d-flex align-self-stretch"
                        style="background-image: url({{ asset('assets/home_page/images/dept-3.jpg') }})"
                      ></div>
                    </div>
                    <div class="col-md-8">
                      <h2>Departamentet Dentale</h2>
                      <p>
                        On her way she met a copy. The copy warned the Little
                        Blind Text, that where it came from it would have been
                        rewritten a thousand times and everything that was left
                        from its origin would be the word.
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
                                Far far away, behind the word mountains, far
                                from the countries Vokalia.
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
                              <h3>Testi laboratorik</h3>
                              <p>
                                Far far away, behind the word mountains, far
                                from the countries Vokalia.
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
                              <h3>Kontrolli i simptomave</h3>
                              <p>
                                Far far away, behind the word mountains, far
                                from the countries Vokalia.
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
                              <h3>Rrahjet e zemrës</h3>
                              <p>
                                Far far away, behind the word mountains, far
                                from the countries Vokalia.
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div
                  class="tab-pane fade"
                  id="v-pills-4"
                  role="tabpanel"
                  aria-labelledby="v-pills-day-4-tab"
                >
                  <div class="row departments">
                    <div
                      class="col-lg-4 order-lg-last d-flex align-items-stretch"
                    >
                      <div
                        class="img d-flex align-self-stretch"
                        style="background-image: url({{ asset('assets/home_page/images/dept-4.jpg') }})"
                      ></div>
                    </div>
                    <div class="col-md-8">
                      <h2>Departamenti Oftamologjisë</h2>
                      <p>
                        Departamenti ynë i oftalmologjisë ofron shërbime të
                        avancuara për diagnostikimin dhe trajtimin e sëmundjeve
                        të syrit, përmes teknologjive të fundit dhe kujdesit të
                        specializuar.
                      </p>
                      <div class="row mt-5 pt-2">
                        <div class="col-lg-6">
                          <div class="services-2 d-flex">
                            <div
                              class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"
                            >
                              <span class="flaticon-eye-exam"></span>
                            </div>
                            <div class="text">
                              <h3>Ekzaminimi i Syve</h3>
                              <p>
                                Ofrimi i ekzaminimeve të shpejta dhe të sakta
                                për të kontrolluar shikimin dhe për të zbuluar
                                probleme të mundshme të syve.
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="services-2 d-flex">
                            <div
                              class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"
                            >
                              <span class="flaticon-eye-test"></span>
                            </div>
                            <div class="text">
                              <h3>Testimi i Dioptrisë</h3>
                              <p>
                                Përdorimi i teknologjisë moderne për të matur
                                dhe përcaktuar dioptrin e duhur për pacientët që
                                kanë nevojë për syze ose lente.
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
                              <h3>Kontrolli i simptomave</h3>
                              <p>
                                Far far away, behind the word mountains, far
                                from the countries Vokalia.
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="services-2 d-flex">
                            <div
                              class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"
                            >
                              <span class="flaticon-eye-care"></span>
                            </div>
                            <div class="text">
                              <h3>Kujdesi i Përgjithshëm i Syve</h3>
                              <p>
                                Kujdesi i plotë për shëndetin e syve, duke
                                përfshirë kontrolla të rregullta dhe trajtime të
                                ndryshme për probleme të zakonshme të syve.
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div
                  class="tab-pane fade"
                  id="v-pills-5"
                  role="tabpanel"
                  aria-labelledby="v-pills-day-5-tab"
                >
                  <div class="row departments">
                    <div
                      class="col-lg-4 order-lg-last d-flex align-items-stretch"
                    >
                      <div
                        class="img d-flex align-self-stretch"
                        style="background-image: url({{ asset('assets/home_page/images/dept-5.jpg') }})"
                      ></div>
                    </div>
                    <div class="col-md-8">
                      <h2>Departamentet e kardiologjisë</h2>
                      <p>
                        On her way she met a copy. The copy warned the Little
                        Blind Text, that where it came from it would have been
                        rewritten a thousand times and everything that was left
                        from its origin would be the word.
                      </p>
                      <div class="row mt-5 pt-2">
                        <div class="col-md-6">
                          <div class="services-2 d-flex">
                            <div
                              class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"
                            >
                              <span class="flaticon-idea"></span>
                            </div>
                            <div class="text">
                              <h3>Kujdesi parësor</h3>
                              <p>
                                Far far away, behind the word mountains, far
                                from the countries Vokalia.
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="services-2 d-flex">
                            <div
                              class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"
                            >
                              <span class="flaticon-idea"></span>
                            </div>
                            <div class="text">
                              <h3>Testi laboratorik</h3>
                              <p>
                                Far far away, behind the word mountains, far
                                from the countries Vokalia.
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="services-2 d-flex">
                            <div
                              class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"
                            >
                              <span class="flaticon-idea"></span>
                            </div>
                            <div class="text">
                              <h3>Kontrolli i simptomave</h3>
                              <p>
                                Far far away, behind the word mountains, far
                                from the countries Vokalia.
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="services-2 d-flex">
                            <div
                              class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"
                            >
                              <span class="flaticon-idea"></span>
                            </div>
                            <div class="text">
                              <h3>Rrahjet e zemrës</h3>
                              <p>
                                Far far away, behind the word mountains, far
                                from the countries Vokalia.
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-no-pt" id="doktoret">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <span class="subheading">Mjeket</span>
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
                <h3>Dr. Llyod Wilson</h3>
                <span class="position mb-2">Neurologist</span>
                <div class="faded">
                  <p>
                    I am an ambitious workaholic, but apart from that, pretty
                    simple person.
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
                <h3>Dr. Rachel Parker</h3>
                <span class="position mb-2">Oftamolog</span>
                <div class="faded">
                  <p>
                    I am an ambitious workaholic, but apart from that, pretty
                    simple person.
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
                <h3>Dr. Ian Smith</h3>
                <span class="position mb-2">Dentist</span>
                <div class="faded">
                  <p>
                    I am an ambitious workaholic, but apart from that, pretty
                    simple person.
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
                <h3>Dr. Alicia Henderson</h3>
                <span class="position mb-2">Pediatre</span>
                <div class="faded">
                  <p>
                    I am an ambitious workaholic, but apart from that, pretty
                    simple person.
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

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2 logo">Dr.<span>care</span></h2>
              <p>
                Far far away, behind the word mountains, far from the countries
                Vokalia and Consonantia, there live the blind texts.
              </p>
            </div>
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2">Parashtro pyetje?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li>
                    <span class="icon icon-map-marker"></span
                    ><span class="text"
                      >203 Fake St. Mountain View, San Francisco, California,
                      USA</span
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="icon icon-phone"></span
                      ><span class="text">+2 392 3929 210</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="icon icon-envelope"></span
                      ><span class="text">info@yourdomain.com</span></a
                    >
                  </li>
                </ul>
              </div>

              <ul
                class="ftco-footer-social list-unstyled float-md-left float-lft mt-3"
              >
                <li class="ftco-animate">
                  <a href="#"><span class="icon-twitter"></span></a>
                </li>
                <li class="ftco-animate">
                  <a href="#"><span class="icon-facebook"></span></a>
                </li>
                <li class="ftco-animate">
                  <a href="#"><span class="icon-instagram"></span></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-5 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li>
                  <a href="#"
                    ><span class="ion-ios-arrow-round-forward mr-2"></span
                    >Faqja e parë</a
                  >
                </li>
                <li>
                  <a href="#"
                    ><span class="ion-ios-arrow-round-forward mr-2"></span
                    >Rreth nesh</a
                  >
                </li>
                <li>
                  <a href="#"
                    ><span class="ion-ios-arrow-round-forward mr-2"></span
                    >Shërbimet</a
                  >
                </li>
                <li>
                  <a href="#"
                    ><span class="ion-ios-arrow-round-forward mr-2"></span
                    >Departamentet</a
                  >
                </li>
                <li>
                  <a href="#"
                    ><span class="ion-ios-arrow-round-forward mr-2"></span
                    >Kontakti</a
                  >
                </li>
              </ul>
            </div>
            <div class="ftco-footer-widget mb-5 ml-md-4">
              <h2 class="ftco-heading-2">Shërbimet</h2>
              <ul class="list-unstyled">
                <li>
                  <a href="#"
                    ><span class="ion-ios-arrow-round-forward mr-2"></span
                    >Neurologjia</a
                  >
                </li>
                <li>
                  <a href="#"
                    ><span class="ion-ios-arrow-round-forward mr-2"></span
                    >Dentist</a
                  >
                </li>
                <li>
                  <a href="#"
                    ><span class="ion-ios-arrow-round-forward mr-2"></span
                    >Oftamologjia</a
                  >
                </li>
                <li>
                  <a href="#"
                    ><span class="ion-ios-arrow-round-forward mr-2"></span
                    >Kardiologjia</a
                  >
                </li>
                <li>
                  <a href="#"
                    ><span class="ion-ios-arrow-round-forward mr-2"></span
                    >Operacionet</a
                  >
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2">Blogu i fundit</h2>
              <div class="block-21 mb-4 d-flex">
                <a
                  class="blog-img mr-4"
                  style="background-image: url({{ asset('assets/home_page/images/image_1.jpg') }})"
                ></a>
                <div class="text">
                  <h3 class="heading">
                    <a href="#"
                      >Even the all-powerful Pointing has no control about</a
                    >
                  </h3>
                  <div class="meta">
                    <div>
                      <a href="#"
                        ><span class="icon-calendar"></span> Dhje 25, 2018</a
                      >
                    </div>
                    <div>
                      <a href="#"><span class="icon-person"></span> Admin</a>
                    </div>
                    <div>
                      <a href="#"><span class="icon-chat"></span> 19</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-5 d-flex">
                <a
                  class="blog-img mr-4"
                  style="background-image: url({{ asset('assets/home_page/images/image_2.jpg') }})"
                ></a>
                <div class="text">
                  <h3 class="heading">
                    <a href="#"
                      >Even the all-powerful Pointing has no control about</a
                    >
                  </h3>
                  <div class="meta">
                    <div>
                      <a href="#"
                        ><span class="icon-calendar"></span> Dhje 25, 2018</a
                      >
                    </div>
                    <div>
                      <a href="#"><span class="icon-person"></span> Admin</a>
                    </div>
                    <div>
                      <a href="#"><span class="icon-chat"></span> 19</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2">Orët e hapjes</h2>
              <h3 class="open-hours pl-4">
                <span class="ion-ios-time mr-3"></span>Ne jemi hapur 24/7
              </h3>
            </div>
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2">Abonohuni</h2>
              <form action="#" class="subscribe-form">
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control mb-2 text-center"
                    placeholder="Enter email address"
                  />
                  <input
                    type="submit"
                    value="Subscribe"
                    class="form-control submit px-3"
                  />
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Të drejtat autoriale &copy;
              <script>
                document.write(new Date().getFullYear());
              </script>
              Të gjitha të drejtat e rezervuara | Ky shabllon është bërë
              <i class="icon-heart" aria-hidden="true"></i> nga
              <a href="https://colorlib.com" target="_blank">Colorlib</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
        </div>
      </div>
    </footer>

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
