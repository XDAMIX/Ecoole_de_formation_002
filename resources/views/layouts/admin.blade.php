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

{{-- datatable bouton  --}}
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

  <!-- Vendor CSS Files -->
  <!-- <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> -->


    @vite(['resources/sass/app.scss', 'resources/js/admin.js', 'resources/css/admin.css'])
    
    @vite(['resources/autres/vendor/fontawesome-free/css/all.min.css', 'resources/autres/vendor/animate.css/animate.min.css'])
    @vite(['resources/autres/vendor/bootstrap/css/bootstrap.min.css', 'resources/autres/vendor/bootstrap-icons/bootstrap-icons.css'])
    @vite(['resources/autres/vendor/aos/aos.css', 'resources/autres/vendor/boxicons/css/boxicons.min.css'])
    @vite(['resources/autres/vendor/glightbox/css/glightbox.min.css', 'resources/autres/vendor/swiper/swiper-bundle.min.css'])

    @vite(['resources/autres/vendor/purecounter/purecounter_vanilla.js', 'resources/autres/vendor/aos/aos.js'])
    @vite(['resources/autres/vendor/bootstrap/js/bootstrap.bundle.min.js', 'resources/autres/vendor/glightbox/js/glightbox.min.js'])
    @vite(['resources/autres/vendor/swiper/swiper-bundle.min.js'])
  
</head>
<body>
  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-center">

      <div class="align-items-center d-none d-md-flex">

      Éspace Administrateurs

      </div>

    </div>
  </div>
  <!-- ======= Top Bar ======= -->
 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top">
    <div class="container d-flex d-flex align-items-center justify-content-center justify-content-md-center">
<!-- 
      <a href="#" class="logo"><img src="assets/img/logo.png" alt="" style="height: 80px;"></a> -->

      <nav id="navbar" class="navbar justify-content-center">
        <ul>
          <li><a class="nav-link" href="{{ url('/admin') }}"><i class="bi bi-speedometer"></i> <span></span>Tableau-de-bord</a></li>  
          <li><a class="nav-link" href="/" target="_blank"><i class="bi bi-globe"></i> <span></span>site-web</a></li>
          <li><a class="nav-link" href="{{ url('/admin/ecole') }}"><i class="bi bi-building"></i> <span></span>école</a></li>
          <li><a class="nav-link" href="{{ url('/admin/formations') }}"><i class="bi bi-award"></i> <span></span>formations</a></li>
          <li><a class="nav-link" href="{{ url('/admin/gallerie') }}"><i class="bi bi-images"></i> <span></span>gallerie</a></li>
          <li><a class="nav-link" href="{{ url('/admin/faq') }}"><i class="bi bi-question-circle"></i> <span></span>faq</a></li>
          <li><a class="nav-link" href="{{ url('/admin/temoignages') }}"><i class="bi bi-person"></i> <span></span>Témoignages</a></li>
          <li><a class="nav-link" href="{{ url('/admin/banners') }}"><i class="bi bi-share"></i> <span></span>pub</a></li>
          <li><a class="nav-link" href="{{ url('/admin/messages') }}"><i class="bi bi-envelope"></i> <span></span>messages</a></li>
          <li><a class="nav-link" href="{{ url('/admin/inscriptions')}}"><i class="bi bi-mortarboard"></i> <span></span>pré-inscription</a></li>
          <li>


              <!-- offcanvas -->
              @Auth
              <a class="nav-link" data-bs-toggle="offcanvas"  href="#offcanvasWithBothOptions" role="button"  aria-controls="offcanvasWithBothOptions">
              <i class="bi bi-person-circle"></i> <span></span>compte {{ Auth::user()->name }}
              </a>
              @endauth
              <!-- offcanvas -->
              <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                  <div class="offcanvas-header" style="text-align: center;">
                      <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">
                        <a>CONNEXION</a>
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body">
                      <ul class="list-group">
                      @if (Route::has('register'))
                        <li class="list-group-item"><a class="offcanvas-link"  href="{{ url('/compte') }}"><i class="bi bi-person-plus"></i>Ajouter un nouveau utilisateur</a></li>
                      @endif
                        <li class="list-group-item"><a class="offcanvas-link" href="#"><i class="bi bi-shield-lock"></i>Modifier mon mot de passe</a></li>
                      </ul>
                      <hr>
                      <ul class="list-group">
                        <li class="list-group-item">
                          <a class="offcanvas-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-left"></i>{{ __('Se-Déconnecter') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                        </li>
                      </ul>
                  </div>
              </div>
              <!-- offcanvas -->  
          </li>

        </ul>

        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    <!-- connexion -->

    </div>
  </header>

            @yield('content')

            @include('sweetalert::alert')


<!-- <div id="preloader"></div> -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>            

<!-- <footer>
<div class="container-fluid fixed-bottom" id="footer" style="position: relative;z-index: 99;">
      <div class="copyright">
        &copy; Copyright <strong><span>FORMA-CORP</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="#">Imad-Mouloudj</a>
      </div>
</div>
</footer> -->


<script src="../../js/admin.js" defer></script>
<script src="../../js/image.js" defer></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>


<style>
#header{
  text-align: center;
  height: 50px;
  }
#navbar{
  text-align: center;
}

.offcanvas{
    background: var(--color1);
    padding: 5px;
    color: var(--color3);
}
span{
    width: 5px;
}

.list-group{
color: red;
}

.list-group-item{
  width: 100%;
}
</style>

<!-- google icons -->
<style>
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 48
}
</style>


  <!-- Vendor JS Files -->
  <!-- <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script> -->

<!-- VUE JS -->
<!-- <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script> -->
<!-- AXIOS -->
<!-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> -->



</body>
</html>
