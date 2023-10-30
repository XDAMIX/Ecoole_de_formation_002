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
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="../../css/actualites.css" rel="stylesheet">
  <!-- Scripts -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])


</head>

<body>




  <!-- ======= Header ======= -->
<!-- <header id="header" class="fixed-top d-flex align-items-center header-transparent"> -->
  <header id="header" class="fixed-top d-flex align-items-center">
           @include('sweetalert::alert')
    <div class="container-fluid">

      <div class="row justify-content-center align-items-center">
        <div class="col-xl-11 d-flex align-items-center justify-content-between">
          <a class="logo me-auto" data-bs-toggle="offcanvas" href="#offcanvasWithBothOptions" role="button" aria-controls="offcanvasWithBothOptions">
            <img src="{{asset('storage/'.$informations->logo)}}" alt="">
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
                      <p>{{$informations->email}}</p>
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

                      @if($lien->reseau_social == 'Twitter')
                      <a href="{{$lien->lien}}" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
                      @endif
                      @if($lien->reseau_social == 'Facebook')
                      <a href="{{$lien->lien}}" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
                      @endif
                      @if($lien->reseau_social == 'Instagram')
                      <a href="{{$lien->lien}}" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
                      @endif
                      @if($lien->reseau_social == 'Youtube')
                      <a href="{{$lien->lien}}" target="_blank" class="Youtube"><i class="bx bxl-youtube"></i></a>
                      @endif
                      @if($lien->reseau_social == 'Linkedin')
                      <a href="{{$lien->lien}}" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                      @endif
                      @if($lien->reseau_social == 'Tiktok')
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

          <nav id="navbar" class="navbar">
            <ul>
              <li> <a class="nav-link scrollto " href="{{url('/')}}"> <i class="fa-solid fa-house"> </i> Retour à l'acceuil</a></li>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>

          </nav>

          <!-- button inscription -->
          {{-- <a class="btn-inscrir" href="{{('/inscription/nouveau')}}">
            <h6><i class="bi bi-mortarboard-fill"></i>Inscription</h6>
          </a> --}}
          <!-- button inscription -->

          <!-- navbar -->
        </div>
      </div>

    </div>
  </header>
  <!-- End Header -->












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

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>


</body>

</html>
{{-- vite --}}

{{-- bootstrap --}}
@vite(['resources/autres/vendor/bootstrap-icons/bootstrap-icons.css'])
@vite(['resources/autres/vendor/bootstrap/css/bootstrap.min.css','resources/autres/vendor/bootstrap/js/bootstrap.bundle.min.js','resources/autres/vendor/bootstrap/scss/bootstrap.scss'])

{{-- datatables --}}
@vite(['resources/autres/vendor/datatables/dataTables.bootstrap4.min.css','resources/autres/vendor/datatables/dataTables.bootstrap4.min.js'])
@vite(['resources/autres/vendor/datatables/dataTables.bootstrap4.css','resources/autres/vendor/datatables/dataTables.bootstrap4.js'])
@vite(['resources/autres/vendor/datatables/jquery.dataTables.js','resources/autres/vendor/datatables/jquery.dataTables.min.js'])

{{-- jquery / jquery-easing--}}
{{-- @vite(['resources/autres/vendor/jquery/jquery.min.js', 'resources/autres/vendor/jquery-easing/jquery.easing.min.js']) --}}

{{-- chart --}}
@vite(['resources/autres/vendor/chart.js/Chart.min.js', 'resources/js/demo/chart-area-demo.js', 'resources/js/demo/chart-pie-demo.js'])

{{-- fontawesome --}}
@vite(['resources/autres/vendor/fontawesome-free/css/all.min.css'])


{{-- resources + template sb_admin --}}
{{-- @vite(['resources/js/sb-admin-2.min.js', 'resources/js/sb-admin-2.js', 'resources/css/sb-admin-2.min.css', 'resources/css/sb-admin-2.css', 'resources/sass/sb-admin/sb-admin-2.scss']) --}}
@vite(['resources/js/sb-admin-2.min.js', 'resources/css/sb-admin-2.min.css', 'resources/css/sb-admin-2.css', 'resources/sass/sb-admin/sb-admin-2.scss'])
@vite(['resources/sass/admin.scss', 'resources/js/admin.js', 'resources/css/admin.css'])

