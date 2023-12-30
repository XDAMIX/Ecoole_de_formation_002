<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  {{-- <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}
  <link href="{{ asset('school-icon.ico') }}" rel="icon" type="image/x-icon" >

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

 


  {{-- avec l'aide de chatgpt --}}

  {{-- CSS  --}}
  <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Scripts -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])


</head>

<body>




  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid">

      <div class="row justify-content-center align-items-center">
        <div class="col-xl-11 d-flex align-items-center justify-content-between">
          <a class="logo me-auto" data-bs-toggle="offcanvas" href="#offcanvasWithBothOptions" role="button" aria-controls="offcanvasWithBothOptions">
            <img class="animate__animated animate__slideInDown" src="{{asset('storage/'.$informations->logo)}}" alt="logo">
          </a>
          <!-- <h3 class="nom me-auto">{{$informations->nom}}</h3> -->

          <!-- offcanvas -->
          <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header" style="text-align: center;">
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">


              <div class="container-fluid tout">
                <div class="row espace">
                  <div class="col-md-12">
                    <div class="info-box">
                      <i class="bx bx-map"></i>
                      <h3>Adresse</h3>
                      <p>{{$informations->adresse}}</p>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="info-box mt-4">
                      <i class="bx bx-envelope"></i>
                      <h3>Email</h3>
                      <p><a href="mailto:{{ $informations->email }}">{{ $informations->email }}</a></p>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="info-box mt-4">
                      <i class="bx bx-phone-call"></i>
                      <h3>Appellez Nous</h3>
                      @foreach($telephones as $telephone)
                      <p>{{$telephone->operateur}} : <a href="">{{$telephone->numero}}</a></p>
                      @endforeach
                    </div>
                  </div>
                </div>
                <div class="row espace">
                  <div class="col-lg-12 col-md-12" style="text-align: center;margin-top:10px;">
                    <p>
                      Rejoignez-Nous sur
                    </p>
                    <div class="social-links col-lg-12 col-md-12">
                      @foreach($liens as $lien)

                      @if($lien->reseau_social == 'Twitter' && $lien->lien !== '' )
                      <a href="{{$lien->lien}}" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
                      @endif
                      @if($lien->reseau_social == 'Facebook' && $lien->lien !== '' )
                      <a href="{{$lien->lien}}" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
                      @endif
                      @if($lien->reseau_social == 'Instagram' && $lien->lien !== '' )
                      <a href="{{$lien->lien}}" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
                      @endif
                      @if($lien->reseau_social == 'Youtube' && $lien->lien !== '' )
                      <a href="{{$lien->lien}}" target="_blank" class="Youtube"><i class="bx bxl-youtube"></i></a>
                      @endif
                      @if($lien->reseau_social == 'Linkedin' && $lien->lien !== '' )
                      <a href="{{$lien->lien}}" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                      @endif
                      @if($lien->reseau_social == 'Tiktok' && $lien->lien !== '' )
                      <a href="{{$lien->lien}}" target="_blank" class="tiktok"><i class="bx bxl-tiktok"></i></a>
                      @endif

                      @endforeach
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <!-- offcanvas -->

          <nav id="navbar" class="navbar animate__animated animate__slideInDown">
            <ul>
              <li><a class="nav-link scrollto " href="#hero">Acceuil</a></li>
              <li><a class="nav-link scrollto" href="#ecole">A propos de nous</a></li>
              <li><a class="nav-link scrollto" href="#formations">Formations</a></li>
              <li><a class="nav-link scrollto" href="/actualites">Gallerie</a></li>
              <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
              <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
              <li>
                <!-- button inscription -->
                {{-- href="{{('/inscription/nouveau')}}" --}}
                {{-- <i class="bi bi-mortarboard" style="margin-right:5px;font-size:16px;"></i> --}}
                {{-- animate__animated animate__rubberBand --}}
{{-- -------------------------------------------------------------------------------------------------------- --}}

<div class="btn-conteiner animate__animated animate__rubberBand">
  <a class="btn-content" href="{{('/inscription/nouveau')}}">
    <span class="btn-title" style="font-size: 20px;"><i class="bi bi-mortarboard" style="margin-right:5px;font-size: 22px;"></i> INSCRIPTION</span>
    <span class="icon-arrow">
      <svg width="66px" height="43px" viewBox="0 0 66 43" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g id="arrow" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <path id="arrow-icon-one" d="M40.1543933,3.89485454 L43.9763149,0.139296592 C44.1708311,-0.0518420739 44.4826329,-0.0518571125 44.6771675,0.139262789 L65.6916134,20.7848311 C66.0855801,21.1718824 66.0911863,21.8050225 65.704135,22.1989893 C65.7000188,22.2031791 65.6958657,22.2073326 65.6916762,22.2114492 L44.677098,42.8607841 C44.4825957,43.0519059 44.1708242,43.0519358 43.9762853,42.8608513 L40.1545186,39.1069479 C39.9575152,38.9134427 39.9546793,38.5968729 40.1481845,38.3998695 C40.1502893,38.3977268 40.1524132,38.395603 40.1545562,38.3934985 L56.9937789,21.8567812 C57.1908028,21.6632968 57.193672,21.3467273 57.0001876,21.1497035 C56.9980647,21.1475418 56.9959223,21.1453995 56.9937605,21.1432767 L40.1545208,4.60825197 C39.9574869,4.41477773 39.9546013,4.09820839 40.1480756,3.90117456 C40.1501626,3.89904911 40.1522686,3.89694235 40.1543933,3.89485454 Z" fill="#FFFFFF"></path>
          <path id="arrow-icon-two" d="M20.1543933,3.89485454 L23.9763149,0.139296592 C24.1708311,-0.0518420739 24.4826329,-0.0518571125 24.6771675,0.139262789 L45.6916134,20.7848311 C46.0855801,21.1718824 46.0911863,21.8050225 45.704135,22.1989893 C45.7000188,22.2031791 45.6958657,22.2073326 45.6916762,22.2114492 L24.677098,42.8607841 C24.4825957,43.0519059 24.1708242,43.0519358 23.9762853,42.8608513 L20.1545186,39.1069479 C19.9575152,38.9134427 19.9546793,38.5968729 20.1481845,38.3998695 C20.1502893,38.3977268 20.1524132,38.395603 20.1545562,38.3934985 L36.9937789,21.8567812 C37.1908028,21.6632968 37.193672,21.3467273 37.0001876,21.1497035 C36.9980647,21.1475418 36.9959223,21.1453995 36.9937605,21.1432767 L20.1545208,4.60825197 C19.9574869,4.41477773 19.9546013,4.09820839 20.1480756,3.90117456 C20.1501626,3.89904911 20.1522686,3.89694235 20.1543933,3.89485454 Z" fill="#FFFFFF"></path>
          <path id="arrow-icon-three" d="M0.154393339,3.89485454 L3.97631488,0.139296592 C4.17083111,-0.0518420739 4.48263286,-0.0518571125 4.67716753,0.139262789 L25.6916134,20.7848311 C26.0855801,21.1718824 26.0911863,21.8050225 25.704135,22.1989893 C25.7000188,22.2031791 25.6958657,22.2073326 25.6916762,22.2114492 L4.67709797,42.8607841 C4.48259567,43.0519059 4.17082418,43.0519358 3.97628526,42.8608513 L0.154518591,39.1069479 C-0.0424848215,38.9134427 -0.0453206733,38.5968729 0.148184538,38.3998695 C0.150289256,38.3977268 0.152413239,38.395603 0.154556228,38.3934985 L16.9937789,21.8567812 C17.1908028,21.6632968 17.193672,21.3467273 17.0001876,21.1497035 C16.9980647,21.1475418 16.9959223,21.1453995 16.9937605,21.1432767 L0.15452076,4.60825197 C-0.0425130651,4.41477773 -0.0453986756,4.09820839 0.148075568,3.90117456 C0.150162624,3.89904911 0.152268631,3.89694235 0.154393339,3.89485454 Z" fill="#FFFFFF"></path>
        </g>
      </svg>
    </span> 
  </a>
</div>

{{-- -------------------------------------------------------------------------------------------------------- --}}

                <!-- button inscription -->
              </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>

          </nav>


          <!-- .navbar -->
        </div>
      </div>

    </div>
  </header>
  <!-- End Header -->




  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="3000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url( {{asset('storage/'.$acceuil->photo)}} );">
          <div class="carousel-container">
            <div class="container">
              <img src="{{asset('storage/'.$informations->logo)}}" alt="logo" class="img-fluid" style="height: 200px;padding:30px;">
              <h2 class="">{{$acceuil->titre}}</h2>
              <p class="">{{$acceuil->sous_titre1}}</p>
              <p class="">{{$acceuil->sous_titre2}}</p>
            </div>
          </div>
        </div>

        @foreach($banners as $banner)
        <div class="carousel-item" data-aos="flip-up" style="background-image: url( {{asset('storage/'.$banner->photo)}} );">
        </div>
        @endforeach


      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section>
  <!-- End Hero -->







  <!-- style offcanvas -->
  <style>
    .offcanvas {
      background: var(--color1);
      padding: 5px;
      color: var(--color3);
    }

    .tout {
      margin: 0;
      padding: 0;
    }

    .espace {
      background: #fff;
      text-align: center;
      align-items: center;
      padding: 0;
      margin: 0;
    }

    .espace .col {
      padding-top: 5px;
      ;
      padding-bottom: 5px;
      background-color: var(--color1);
    }

    .espace h3 {
      font-family: var(--fontfr3);
      font-size: 16px;
      color: var(--color3);
      font-weight: 700;
    }

    .espace p {
      font-size: 11px;
      line-height: 20px;
      font-family: var(--fontfr4);
    }

    .espace .info-box i {
      font-size: 26px;
      color: var(--color4);
      border-radius: 50%;
      padding: 6px;
      border: 2px dotted var(--color4);
    }

    .espace .social-links a {
      font-size: 20px;
      display: inline-block;
      background: var(--color4);
      color: var(--color1);
      line-height: 1;
      padding: 8px 0;
      margin-right: 4px;
      border-radius: 4px;
      text-align: center;
      width: 36px;
      height: 36px;
      transition: 0.3s;
    }

    .espace .social-links a:hover {
      background: var(--color1);
      color: var(--color4);
      text-decoration: none;
    }
  </style>

  @yield('content')
  @include('sweetalert::alert')




  {{-- avec l'aide de chatgpt --}}
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}" rel="stylesheet"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}" rel="stylesheet"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" rel="stylesheet"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}" rel="stylesheet"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}" rel="stylesheet"></script>


</body>

</html>
