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
            <h1 class="mb-2 bread">Rreth nesh</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home-page') }}">Faqja e parë <i class="ion-ios-arrow-forward"></i></a></span> <span>Rreth nesh <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

		<section class="ftco-section ftco-no-pt ftc-no-pb">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-5 p-md-5 img img-2 mt-5 mt-md-0" style="background-image: url({{ asset('assets/home_page/images/about.jpg') }});">
					</div>
					<div class="col-md-7 wrap-about py-4 py-md-5 ftco-animate">
	          <div class="heading-section mb-5">
	          	<div class="pl-md-5 ml-md-5">
		          	<span class="subheading">Rreth Dr.Agonit</span>
		            <h2 class="mb-4" style="font-size: 28px;">Specialiteti mjekësor që merret me kujdesin e pacientëve të shtruar në spital me sëmundje akute</h2>
	            </div>
	          </div>
	          <div class="pl-md-5 ml-md-5 mb-5">
							<p>Specialiteti mjekësor që merret me kujdesin e pacientëve të shtruar në spital me sëmundje akute është mjekësia e kujdesit të brendshëm ose mjekësia spitalore. Ky disiplinë fokusohet në diagnostikimin, trajtimin dhe menaxhimin e pacientëve me gjendje të rënda ose komplekse që kërkojnë hospitalizim. Mjekët spitalorë punojnë ngushtë me ekipe multidisiplinare për të siguruar trajtim të specializuar dhe për të përmirësuar rezultatet shëndetësore të pacientëve gjatë qëndrimit të tyre në spital.</p>
							<div class="row mt-5 pt-2">
								<div class="col-lg-6">
									<div class="services-2 d-flex">
										<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-first-aid-kit"></span></div>
										<div class="text">
											<h3>Kujdesi parësor</h3>
											<p>Kujdesi parësor është niveli i parë i shërbimeve shëndetësore, duke ofruar parandalim, diagnozë dhe trajtim për sëmundjet e zakonshme. Ai sigurohet nga mjekët e familjes dhe profesionistë të tjerë shëndetësorë, duke luajtur një rol kyç në menaxhimin e shëndetit dhe parandalimin e komplikacioneve.</p>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="services-2 d-flex">
										<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-dropper"></span></div>
										<div class="text">
											<h3>Testi laboratorik</h3>
											<p>Testi laboratorik është një procedurë diagnostikuese që përdor mostra të trupit, si gjak, urinën ose indet, për të analizuar dhe vlerësuar funksionin e organeve ose për të identifikuar sëmundje. Rezultatet e testeve laboratorike ndihmojnë mjekët të bëjnë diagnoza, të monitorojnë trajtimet dhe të parandalojnë komplikacione.</p>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="services-2 d-flex">
										<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-experiment-results"></span></div>
										<div class="text">
											<h3>Kontrolli i simptomave</h3>
											<p>Kontrolli i simptomave është procesi i vlerësimit dhe menaxhimit të shenjave dhe ankesa që një pacient ka për shkak të një sëmundjeje ose gjendje shëndetësore. Ky proces përfshin diagnostikimin e saktë të simptomave, përdorimin e trajtimeve të përshtatshme dhe monitorimin e përmirësimit të pacientit për të siguruar që simptomat të kontrollohen dhe të menaxhohen në mënyrë efikase.</p>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="services-2 d-flex">
										<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-heart-rate"></span></div>
										<div class="text">
											<h3>Rrahjet e zemrës<s></s></h3>
											<p>Rrahjet e zemrës janë numri i goditjeve që zemra bën brenda një minute për të pompuar gjak në trup. Ato matën zakonisht si frekuencë dhe mund të ndryshojnë në varësi të aktiviteteve fizike, emocioneve, gjendjes shëndetësore dhe faktorëve të tjerë. Rrahjet normale të zemrës për një individ të shëndetshëm janë zakonisht mes 60 dhe 100 rrahjeve në minutë. Rrahjet e shpejta ose të ngadalësuara mund të jenë tregues të problemeve të zemrës ose kushteve shëndetësore të tjera.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-intro" style="background-image: url({{ asset('assets/home_page/images/bg_3.jpg') }});" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<h2>Ne ofrojmë konsultim falas për kujdesin shëndetësor</h2>
						<p class="mb-0">Shëndeti juaj është prioriteti ynë kryesorë me mjekësi gjithëpërfshirëse dhe të përballueshme.</p>
						<p></p>
					</div>
					<div class="col-md-3 d-flex align-items-center">
						<p class="mb-0"><a href="{{ route('login') }}" class="btn btn-secondary px-4 py-3">Konsultim pa pagesë</a></p>
					</div>
				</div>
			</div>
		</section>


    <section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
          	<span class="subheading">Dëshmitë</span>
            <h2 class="mb-4">Pacientët tanë thonë për ne:</h2>
            <p>"Pacientët tanë thonë për ne: 'Shërbimi është i shkëlqyer, mjekët dhe stafi janë të kujdesshëm dhe profesionistë, gjithmonë të gatshëm për të ofruar mbështetje dhe trajtim të veçantë. Ata na ndihmojnë të kuptojmë më mirë diagnozën dhe na ofrojnë mundësi për të përmirësuar shëndetin tonë. Kemi ndjerë gjithmonë mbështetje dhe kujdes të veçantë, dhe jemi falenderues për vëmendjen dhe angazhimin e tyre.'"</p>
          </div>
        </div>
        <div class="row ftco-animate justify-content-center">
          <div class="col-md-8">
            <div class="carousel-testimony owl-carousel">
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url({{ asset('assets/home_page/images/person_1.jpg') }})">
                  </div>
                  <div class="text ml-2 bg-light">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p></p>
                    <p class="name">Osman Ramadani</p>
                    <span class="position">Kardiolog</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url({{ asset('assets/home_page/images/person_2.jpg') }})">
                  </div>
                  <div class="text ml-2 bg-light">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p></p>
                    <p class="name">Ardian Shabani</p>
                    <span class="position">Oftamolog</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url({{ asset('assets/home_page/images/person_3.jpg') }})">
                  </div>
                  <div class="text ml-2 bg-light">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>Ardian Shabani është një oftalmolog i njohur dhe i respektuar, me një eksperiencë të gjerë në diagnostikimin dhe trajtimin e sëmundjeve të syrit. Ai është i njohur për aftësitë e tij të jashtëzakonshme në trajtimin e kushteve të ndryshme oftalmologjike, duke përfshirë kirurgjitë komplekse dhe menaxhimin e problemeve të shikimit. Pacientët e tij vlerësojnë qasjen e tij të kujdesshme dhe empatik, si dhe komunikimin e shkëlqyer që ai ofron për të siguruar që ata të kuptojnë çdo fazë të trajtimit. Ardian Shabani është gjithashtu një mbështetës i rëndësishëm i parandalimit të sëmundjeve të syrit dhe edukatës shëndetësore, duke i ndihmuar pacientët të kujdesen për shëndetin e syrit të tyre dhe të parandalojnë probleme të mundshme në të ardhmen.</p>
                    <p class="name">Bekim Kosumi</p>
                    <span class="position">Stomatolog</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url({{ asset('assets/home_page/images/person_4.jpg') }})">
                  </div>
                  <div class="text ml-2 bg-light">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>Bekim Kosumi është një stomatolog i njohur dhe me një përvojë të thellë në trajtimin e problemeve dentare. Ai është i njohur për aftësitë e tij të jashtëzakonshme në diagnostikimin dhe trajtimin e sëmundjeve të gojës dhe dhëmbëve, duke ofruar shërbime të përshtatura për çdo pacient. Bekim Kosumi është i vlerësuar për qasjen e tij miqësore dhe të kujdesshme, duke siguruar që pacientët të ndihen të rehatshëm dhe të sigurt gjatë çdo procedure. Ai përdor teknologji moderne dhe teknika inovative për të ofruar trajtime efikase dhe pa dhimbje. Pacientët e tij theksojnë profesionalizmin dhe komunikimin e tij të shkëlqyer, duke e bërë atë një zgjedhje të preferuar për kujdesin dentar.</p>
                    <p class="name">Naim Zeka</p>
                    <span class="position">Neurolog</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url({{ asset('assets/home_page/images/person_1.jpg') }})">
                  </div>
                  <div class="text ml-2 bg-light">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>Naim Zeka është një neurolog i njohur dhe i respektuar, me një eksperiencë të pasur në diagnostikimin dhe trajtimin e çrregullimeve të sistemit nervor. Ai është i vlerësuar për aftësitë e tij të shkëlqyera në menaxhimin e kushteve neurologjike të ndryshme, duke përfshirë sëmundje të trurit, shtyllës kurrizore dhe nervave periferikë. Pacientët e tij e vlerësojnë për qasjen e tij të kujdesshme dhe empatik, si dhe për aftësinë për të shpjeguar me detaje çdo aspekt të diagnozës dhe trajtimit. Naim Zeka është gjithashtu i njohur për përdorimin e teknologjive më të fundit dhe metodave inovative për të siguruar trajtimin më të mirë të mundshëm. Ai është një profesionist i përkushtuar, i cili ndihmon pacientët të përballojnë sfidat neurologjike dhe të përmirësojnë cilësinë e jetës së tyre.</p>
                    <p class="name">Dr.Agon</p>
                    <span class="position">Menagjer</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="section-counter" style="background-image: url({{ asset('assets/home_page/images/bg_3.jpg') }});" data-stellar-background-ratio="0.5">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6 py-5 pr-md-5">
	          <div class="heading-section heading-section-white ftco-animate mb-5">
	          	<span class="subheading">Konsultat</span>
	            <h2 class="mb-4">Konsultim pa pagesë</h2>
	            <p>Konsultimi pa pagesë ofron mundësinë për pacientët të marrin një vlerësim mjekësor të parë pa kosto, duke diskutuar shqetësimet e tyre dhe duke marrë këshilla mbi hapat e ardhshëm.</p>
	          </div>
	          <form action="#" class="appointment-form ftco-animate">
	    				<div class="d-md-flex">
		    				<div class="form-group">
		    					<input type="text" class="form-control" placeholder="First Name">
		    				</div>
		    				<div class="form-group ml-md-4">
		    					<input type="text" class="form-control" placeholder="Last Name">
		    				</div>
	    				</div>
	    				<div class="d-md-flex">
	    					<div class="form-group">
		    					<div class="form-field">
          					<div class="select-wrap">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="" id="" class="form-control">
                      	<option value="">Zgjedh shërbimin</option>
                        <option value="">Neurologjia</option>
                        <option value="">Kardiologjia</option>
                        <option value="">Stomatologjia</option>
                        <option value="">Oftamologjia</option>
                        <option value="">Shërbime tjera</option>
                      </select>
                    </div>
		              </div>
		    				</div>
	    					<div class="form-group ml-md-4">
		    					<input type="text" class="form-control" placeholder="Phone">
		    				</div>
	    				</div>
	    				<div class="d-md-flex">
		    				<div class="form-group">
		    					<div class="input-wrap">
		            		<div class="icon"><span class="ion-md-calendar"></span></div>
		            		<input type="text" class="form-control appointment_date" placeholder="Date">
	            		</div>
		    				</div>
		    				<div class="form-group ml-md-4">
		    					<div class="input-wrap">
		            		<div class="icon"><span class="ion-ios-clock"></span></div>
		            		<input type="text" class="form-control appointment_time" placeholder="Time">
	            		</div>
		    				</div>
	    				</div>
	    				<div class="d-md-flex">
	    					<div class="form-group">
		              <textarea name="" id="" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
		            </div>
		            <div class="form-group ml-md-4">
		              <input type="submit" value="Appointment" class="btn btn-secondary py-3 px-4">
		            </div>
	    				</div>
	    			</form>
    			</div>
    			<div class="col-lg-6 p-5 bg-counter aside-stretch">
						<h3 class="vr">Fakte rreth Dr.Osmanit</h3>
    				<div class="row pt-4 mt-1">
		          <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 p-5 bg-light">
		              <div class="text">
		                <strong class="number" data-number="30">30</strong>
		                <span>Vite eksperiencë</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 p-5 bg-light">
		              <div class="text">
		                <strong class="number" data-number="4500">+5000</strong>
		                <span>Pacientët të lumtur</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 p-5 bg-light">
		              <div class="text">
		                <strong class="number" data-number="84">5</strong>
		                <span>Numri i mjekëve</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 p-5 bg-light">
		              <div class="text">
		                <strong class="number" data-number="300">32</strong>
		                <span>Numri i stafit</span>
		              </div>
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
              <h2 class="ftco-heading-2 logo">Dr.<span>Agoni</span></h2>
              <p>Dr. Agoni është menaxher i spitalit dhe mjekëve, i njohur për aftësitë e tij të shkëlqyera menaxheriale dhe koordinimin efikas të ekipit mjekësor. Ai siguron që operacionet e spitalit të zhvillohen në mënyrë të rregullt dhe të sigurt, duke mbështetur mjekët dhe stafin në ofrimin e kujdesit cilësor për pacientët. Dr. Agoni është gjithashtu i përkushtuar për përmirësimin e proceseve dhe shërbimeve spitalore, duke siguruar një mjedis të shëndetshëm dhe efikas për pacientët dhe stafin.
            </div>
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2">Parashtroni pyetje?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Adresa: Rruga Idriz Seferi, Gjilan</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+383 44 111 111</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">emaili@hotmail.com</span></a></li>
	              </ul>
	            </div>

	            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-5 ml-md-4">
              <h2 class="ftco-heading-2">Linqet</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Faqja e parë</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Rreth nesh</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Shërbimet</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Departamentet</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Kontakti</a></li>
              </ul>
            </div>
            <div class="ftco-footer-widget mb-5 ml-md-4">
              <h2 class="ftco-heading-2">Shërbimet</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Neurolgjia</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Stomatologjia</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Oftamologjia</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Kardiologjia</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Operacionet</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2">Blogu fundit</h2>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url({{ asset('assets/home_page/images/image_1.jpg') }});"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Dhje 25, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-5 d-flex">
                <a class="blog-img mr-4" style="background-image: url({{ asset('assets/home_page/images/image_2.jpg') }});"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Dhje 25, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md">
          	<div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2">Orët e hapjes</h2>
            	<h3 class="open-hours pl-4"><span class="ion-ios-time mr-3"></span>Jemi hapur 24/7</h3>
            </div>
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2">Abonohu!</h2>
              <form action="#" class="subscribe-form">
                <div class="form-group">
                  <input type="text" class="form-control mb-2 text-center" placeholder="Enter email address">
                  <input type="submit" value="Subscribe" class="form-control submit px-3">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Lidhja për në Colorlib nuk mund të hiqet. Modeli është i licencuar sipas CC BY 3.0. -->
  Të drejtat autoriale &copy;<script>document.write(new Date().getFullYear());</script> Të gjitha të drejtat e rezervuara | Ky shabllon është bërë me <i class="icon-heart" aria-hidden="true"></i> nga <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Lidhja për në Colorlib nuk mund të hiqet. Modeli është i licencuar sipas CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>



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
