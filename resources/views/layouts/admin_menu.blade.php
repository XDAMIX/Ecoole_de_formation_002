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

{{-- bootstrap --}}
@vite(['resources/autres/vendor/bootstrap-icons/bootstrap-icons.css'])
@vite(['resources/autres/vendor/bootstrap/css/bootstrap.min.css','resources/autres/vendor/bootstrap/js/bootstrap.bundle.min.js','resources/autres/vendor/bootstrap/scss/bootstrap.scss'])
{{-- chart --}}
@vite(['resources/autres/vendor/chart.js/Chart.min.js', 'resources/js/demo/chart-area-demo.js', 'resources/js/demo/chart-pie-demo.js'])
{{-- fontawesome --}}
@vite(['resources/autres/vendor/fontawesome-free/css/all.min.css'])



{{-- le problem de template  --}}

{{-- resources + template sb_admin --}}
{{-- @vite(['resources/js/sb-admin-2.min.js', 'resources/js/sb-admin-2.js', 'resources/css/sb-admin-2.min.css', 'resources/css/sb-admin-2.css', 'resources/sass/sb-admin/sb-admin-2.scss']) --}}
@vite([ 'resources/css/sb-admin-2.min.css', 'resources/css/sb-admin-2.css', 'resources/sass/sb-admin/sb-admin-2.scss'])
@vite(['resources/sass/admin.scss', 'resources/js/admin.js', 'resources/css/admin.css'])
 
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
 {{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min."> --}}
 <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

 {{-- kookies --}}

 <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/3.0.1/js.cookie.min.js"></script>

</head>


<body id="page-top">

                <!-- Page Wrapper -->
                <div id="wrapper">
{{-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------ --}}
                    <!-- Sidebar -->
                    {{-- <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"> --}}
                    <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

                        <!-- Sidebar - Brand -->
                        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/admin') }}">
                            <div class="sidebar-brand-icon rotate-n-15">
                                <i class="fas fa-fw fa-tachometer-alt"></i>
                            </div>
                            <div class="sidebar-brand-text mx-2">{{ config('app.name', 'Laravel') }}</div>
                        </a>

                        <!-- Divider -->
                        <hr class="sidebar-divider my-0">

                        <!-- Nav Item - Dashboard -->
                        {{-- <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/admin') }}">
                                <i class="fa-solid fa-house"></i>
                                <span>Dashboard</span></a>
                        </li> --}}

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Heading -->
                        <div class="sidebar-heading">
                            SITE WEB
                        </div>

                        <!-- Nav Item - Pages Collapse Menu -->
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#collapseInfo"
                                aria-expanded="true" aria-controls="collapseInfo">
                                <i class="fa-solid fa-gear"></i>
                                <span>INFORMATIONS</span>
                            </a>
                            <div id="collapseInfo" class="collapse" aria-labelledby="headingInfo" data-bs-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                    <h6 class="collapse-header">Menu :</h6>
                                    <a class="collapse-item" href="{{ url('/admin/ecole') }}"><i class="fa-solid fa-bars submenu-i"></i>Informations Génerale</a>
                                    <a class="collapse-item" href=""><i class="fa-solid fa-phone submenu-i"></i>Numéros de téléphones</a>
                                    <a class="collapse-item" href=""><i class="fa-solid fa-share-from-square submenu-i"></i>Réseaux sociaux</a>
                                </div>
                            </div>
                        </li>

                        <!-- Nav Item - Utilities Collapse Menu -->
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#collapseEcole"
                                aria-expanded="true" aria-controls="collapseEcole">
                                <i class="fa-solid fa-school"></i>
                                <span>A PROPOS</span>
                            </a>
                            <div id="collapseEcole" class="collapse" aria-labelledby="headingEcole"
                                data-bs-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                    <h6 class="collapse-header">Menu :</h6>
                                    <a class="collapse-item" href=""><i class="fa-solid fa-bars submenu-i"></i>Page d'acceuil</a>
                                    <a class="collapse-item" href=""><i class="fa-solid fa-bars submenu-i"></i>Présentations</a>

                                </div>
                            </div>
                        </li>

                        <!-- Nav Item - Utilities Collapse Menu -->
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#collapseActualites"
                                aria-expanded="true" aria-controls="collapseActualites">
                                <i class="fa-solid fa-camera"></i>
                                <span>ACTUALITES</span>
                            </a>
                            <div id="collapseActualites" class="collapse" aria-labelledby="headingActualites"
                                data-bs-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                    <h6 class="collapse-header">Menu :</h6>
                                    <a class="collapse-item" href="{{ url('/admin/gallerie') }}"><i class="fa-solid fa-bars submenu-i"></i>Liste des Actualites</a>
                                    <a class="collapse-item" href=""><i class="fa-regular fa-square-plus submenu-i"></i>Ajouter</a>

                                </div>
                            </div>
                        </li>

                        <!-- Nav Item - Utilities Collapse Menu -->
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#collapseFAQ"
                                aria-expanded="true" aria-controls="collapseFAQ">
                                <i class="fa-solid fa-circle-question"></i>
                                <span>FAQ</span>
                            </a>
                            <div id="collapseFAQ" class="collapse" aria-labelledby="headingFAQ"
                                data-bs-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                    <h6 class="collapse-header">Menu :</h6>
                                    <a class="collapse-item" href="{{ url('/admin/faq') }}"><i class="fa-solid fa-bars submenu-i"></i>FAQ</a>
                                    <a class="collapse-item" href=""><i class="fa-regular fa-square-plus submenu-i"></i>Ajouter</a>

                                </div>
                            </div>
                        </li>

                        <!-- Nav Item - Utilities Collapse Menu -->
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#collapseTemoignages"
                                aria-expanded="true" aria-controls="collapseTemoignages">
                                <i class="fa-solid fa-user-group"></i>
                                <span>TEMOIGNAGES</span>
                            </a>
                            <div id="collapseTemoignages" class="collapse" aria-labelledby="headingTemoignages"
                                data-bs-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                    <h6 class="collapse-header">Menu :</h6>
                                    <a class="collapse-item" href="{{ url('/admin/temoignages') }}"><i class="fa-solid fa-bars submenu-i"></i>Liste des témoignages</a>
                                    <a class="collapse-item" href=""><i class="fa-regular fa-square-plus submenu-i"></i>Ajouter</a>

                                </div>
                            </div>
                        </li>

                        <!-- Nav Item - Utilities Collapse Menu -->
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#collapsePUB"
                                aria-expanded="true" aria-controls="collapsePUB">
                                <i class="fa-solid fa-share-nodes"></i>
                                <span>PUBS</span>
                            </a>
                            <div id="collapsePUB" class="collapse" aria-labelledby="headingPUB"
                                data-bs-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                    <h6 class="collapse-header">Menu :</h6>
                                    <a class="collapse-item" href="{{ url('/admin/banners') }}"><i class="fa-solid fa-bars submenu-i"></i>Liste des Pubs</a>
                                    <a class="collapse-item" href="{{ url('/admin/banners/nouveau') }}"><i class="fa-regular fa-square-plus submenu-i"></i>Ajouter</a>

                                </div>
                            </div>
                        </li>

                        <!-- Nav Item - Utilities Collapse Menu -->
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#collapseMessages"
                                aria-expanded="true" aria-controls="collapseMessages">
                                <i class="fa-solid fa-envelope"></i>
                                <span>MESSAGES</span>
                            </a>
                            <div id="collapseMessages" class="collapse" aria-labelledby="headingMessages"
                                data-bs-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                    <h6 class="collapse-header">Menu :</h6>
                                    <a class="collapse-item" href="{{ url('/admin/messages') }}"><i class="fa-solid fa-bars submenu-i"></i>Liste des Messages</a>
                                    {{-- <a class="collapse-item" href="">Ajouter</a> --}}

                                </div>
                            </div>
                        </li>

                        <!-- Nav Item - Utilities Collapse Menu -->
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#collapseInscriptions"
                                aria-expanded="true" aria-controls="collapseInscriptions">
                                <i class="fa-solid fa-graduation-cap"></i>
                                <span>PRE-INSCRIPTIONS</span>
                            </a>
                            <div id="collapseInscriptions" class="collapse" aria-labelledby="headingInscriptions"
                                data-bs-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                    <h6 class="collapse-header">Menu :</h6>
                                    <a class="collapse-item" href="{{ url('/admin/inscriptions') }}"><i class="fa-solid fa-bars submenu-i"></i>Liste des Inscriptions</a>
                                    <a class="collapse-item" href=""><i class="fa-regular fa-square-plus submenu-i"></i>Ajouter</a>

                                </div>
                            </div>
                        </li>
{{-- --------------------------------------------------------------------------------------------------------------------------------- --}}
                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Heading -->
                        <div class="sidebar-heading">
                            MON-ECOLE
                        </div>

                        <!-- Nav Item - Utilities Collapse Menu -->
                        <li class="nav-item">
                                <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#collapseFormations"
                                 aria-expanded="true" aria-controls="collapseFormations">
                                <i class="fa-solid fa-award"></i>
                                <span>FORMATIONS</span>
                                </a>
                            <div id="collapseFormations" class="collapse" aria-labelledby="headingFormations"
                                data-bs-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Menu :</h6>
                                <a class="collapse-item" href="{{ url('/admin/formations') }}"><i class="fa-solid fa-bars submenu-i"></i>Liste des formations</a>
                                <a class="collapse-item" href=""><i class="fa-regular fa-square-plus submenu-i"></i>Ajouter</a>
                                </div>
                            </div>
                        </li>

                        <!-- Nav Item - Utilities Collapse Menu -->
                        <li class="nav-item">
                                <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#collapseProfs"
                                 aria-expanded="true" aria-controls="collapseProfs">
                                 <i class="fa-solid fa-chalkboard-user"></i>
                                <span>PROFESSEURS</span>
                                </a>
                            <div id="collapseProfs" class="collapse" aria-labelledby="headingProfs"
                                data-bs-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Menu :</h6>
                                <a class="collapse-item" href="{{ url('/admin/prof') }}"><i class="fa-solid fa-bars submenu-i"></i>Liste des profésseurs</a>
                                <a class="collapse-item" href="{{ url('admin/prof/ajouter') }}"><i class="fa-regular fa-square-plus submenu-i"></i>Ajouter</a>
                                </div>
                            </div>
                        </li>

                        <!-- Nav Item - Utilities Collapse Menu -->
                        <li class="nav-item">
                                <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#collapseEmplyes"
                                 aria-expanded="true" aria-controls="collapseEmplyes">
                                 <i class="fa-solid fa-people-group"></i>
                                <span>SESSION</span>
                                </a>
                            <div id="collapseEmplyes" class="collapse" aria-labelledby="headingEmplyes"
                                data-bs-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Menu :</h6>
                                <a class="collapse-item" href="{{ url('/admin/session') }}"><i class="fa-solid fa-bars submenu-i"></i>Liste des sessions</a>
                                <a class="collapse-item" href="{{ url('/admin/session/ajouter') }}"><i class="fa-regular fa-square-plus submenu-i"></i>Nouvelle session</a>
                                </div>
                            </div>
                        </li>

                        <!-- Nav Item - Utilities Collapse Menu -->
                        <li class="nav-item">
                                <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#collapseStagiaires"
                                 aria-expanded="true" aria-controls="collapseStagiaires">
                                <i class="fa-regular fa-address-card"></i>
                                <span>STAGIAIRES</span>
                                </a>
                            <div id="collapseStagiaires" class="collapse" aria-labelledby="headingStagiaires"
                                data-bs-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Menu :</h6>
                                <a class="collapse-item" href="{{ url('/admin/etudiant') }}"><i class="fa-solid fa-bars submenu-i"></i>Liste des stagiaires</a>
                                <a class="collapse-item" href="{{ url('/admin/etudiant/nouveau') }}"><i class="fa-regular fa-square-plus submenu-i"></i>Nouveau Stagiaire</a>
                                </div>
                            </div>
                        </li>

                        <!-- Divider -->
                        <hr class="sidebar-divider d-none d-md-block">

                        <!-- Sidebar Toggler (Sidebar) -->
                        <div class="text-center d-none d-md-inline">
                            <button class="rounded-circle border-0" id="sidebarToggle"></button>
                        </div>



                    </ul>
                    <!-- End of Sidebar -->
{{-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}



                    <!-- Content Wrapper -->
                    <div id="content-wrapper" class="d-flex flex-column">

                        <!-- Main Content -->
                        <div id="content">

                            <!-- Topbar -->
                            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                                <!-- Sidebar Toggle (Topbar) -->
                                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                    <i class="fa fa-bars"></i>
                                </button>

                                <!-- Topbar Navbar -->
                                <ul class="navbar-nav ml-auto">

                                    <div class="topbar-divider d-none d-sm-block"></div>
                                    <!-- Nav Item - User Information -->
                                    <li class="nav-item dropdown no-arrow">
                                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                            data-bs-toggle="dropdown" aria-bs-haspopup="true" aria-bs-expanded="false">
                                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                            <img class="img-profile rounded-circle"
                                                src="img/undraw_profile.svg">
                                        </a>
                                        <!-- Dropdown - User Information -->
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                            aria-bs-labelledby="userDropdown">
                                            <a class="dropdown-item" href="#">
                                                <i class="fa-solid fa-user text-gray-400"></i>
                                                Profil
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fa-solid fa-user-plus text-gray-400"></i>
                                                Ajouter un nouveau utilisateur
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                                <i class="fa-solid fa-right-from-bracket text-gray-400"></i>
                                                Déconnecter
                                            </a>
                                        </div>
                                    </li>

                                </ul>

                            </nav>
                            <!-- End of Topbar -->

{{-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}


                            <!-- Begin Page Content -->
                            <div class="container-fluid">

                                <!-- Page Heading -->
                                {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                        <i class="fa-sharp fa-solid fa-arrow-left"></i> Retour</a>
                                    <h1 class="h3 mb-0 text-gray-800">Nom de la page</h1>
                                </div> --}}





                                                @yield('content')

                                                @include('sweetalert::alert')




                            </div>
                                <!-- /.container-fluid -->

                        <!-- End of Main Content -->



                    </div>
                    <!-- End of Content Wrapper -->

                </div>
                <!-- End of Page Wrapper -->
{{-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
{{-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}



                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-bs-labelledby="exampleModalLabel"
                    aria-bs-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Vous êtes prêt pour quitter?</h5>
                                <button class="close" type="button" data-bs-dismiss="modal" aria-bs-label="Close">
                                    <span aria-bs-hidden="true">×</span>
                                </button>

                            </div>
                            <div class="modal-body">Selectionner "Déconnecter" si vous êtes prêt pour fermer votre session .</div>
                            <div class="modal-footer">


                                <div class="form-group row" id="double-btn">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><i class="fa-solid fa-ban"></i>Annuler</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa-solid fa-right-from-bracket"></i>Déconnecter</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>





{{-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}


<style>
    .submenu-i{
        margin-right: 5px;
    }

</style>


</body>


<script>
    
!function(l){
    "use strict";
l("#sidebarToggle, #sidebarToggleTop").on("click",function(e){l("body").toggleClass("sidebar-toggled"),
l(".sidebar").toggleClass("toggled"),
l(".sidebar").hasClass("toggled")&&l(".sidebar .collapse").collapse("hide")}),
l(window).resize(function(){l(window).width()<768&&l(".sidebar .collapse").collapse("hide"),
l(window).width()<480&&!l(".sidebar").hasClass("toggled")&&(l("body").addClass("sidebar-toggled"),
l(".sidebar").addClass("toggled"),l(".sidebar .collapse").collapse("hide"))}),
l("body.fixed-nav .sidebar").on("mousewheel DOMMouseScroll wheel",
function(e){
    var o;
    768<l(window).width()&&(o=(o=e.originalEvent).wheelDelta||-o.detail,this.scrollTop+=30*(o<0?1:-1),
    e.preventDefault())}),l(document).on("scroll",
    function(){
        100<l(this).scrollTop()?l(".scroll-to-top").fadeIn():l(".scroll-to-top").fadeOut()}),l(document).on("click","a.scroll-to-top",
        function(e){
            var o=l(this);
            l("html, body").stop().animate({scrollTop:l(o.attr("href")).offset().top},
            1e3,"easeInOutExpo"),e.preventDefault()})}(jQuery);

</script>
{{-- le jquery --}}
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}




</html>

