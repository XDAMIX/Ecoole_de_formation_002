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
    <link href="{{ asset('school-icon.ico') }}" rel="icon" type="image/x-icon">


    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    {{-- assets  --}}
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">



    {{-- bootstrap --}}
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">


    {{-- autres assets --}}
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">


<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>



    {{-- fichiers de theme  --}}

    {{-- template sb_admin  --}}
    @vite(['resources/css/sb-admin-2.css', 'resources/sass/sb-admin/sb-admin-2.scss', 'resources/js/sb-admin-2.js', 'resources/js/sb-admin-2.min.js', 'resources/css/sb-admin-2.min.css'])

    {{-- nos resources --}}
    @vite(['resources/sass/admin.scss', 'resources/js/admin.js', 'resources/css/admin.css'])


    {{-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}


    {{-- ---------------------------------------------------------------------------------------------------------------------------------------------------------   --}}

    {{-- REMARQUE !!  --}}

    {{-- Lire depuis le dossier ressource  --}}
    {{-- @vite(['resources/autres/vendor/.....']) --}}

    {{-- Lire depuis le dossier public --}}
    {{-- <link href="{{ asset('assets/vendor/......') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ public_path('assets/vendor/......') }}" rel="stylesheet"> --}}

    {{-- ---------------------------------------------------------------------------------------------------------------------------------------------------------   --}}


    {{-- tarika jadida  --}}

    {{-- css datatables  --}}

    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css" rel="stylesheet">



    {{-- scripts par ordre --}}


    {{-- bootstrap js  --}}
    {{-- <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" rel="stylesheet"></script> --}}



    {{-- datatables  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"></script>

    {{-- sweetalert2  --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                <div class="sidebar-brand-text mx-2" style="font-size: 12px;">{{ config('app.name', 'Laravel') }}</div>

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


            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('/') }}" data-bs-toggle="collapse"
                    data-bs-target="#collapseSite" aria-expanded="true" aria-controls="collapseSite">
                    <i class="bi bi-globe"></i>
                    <span>SITE VITRINE</span>
                </a>
                <div id="collapseSite" class="collapse" aria-labelledby="headingSite"
                    data-bs-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Menu :</h6> --}}
                        <a class="collapse-item" href="{{ url('/') }}" target="_blank"><i
                                class="fa-solid fa-bars submenu-i"></i>Consulter</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#collapseInfo"
                    aria-expanded="true" aria-controls="collapseInfo">
                    <i class="fa-solid fa-gear"></i>
                    <span>INFORMATIONS</span>
                </a>
                <div id="collapseInfo" class="collapse" aria-labelledby="headingInfo"
                    data-bs-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Menu :</h6> --}}
                        <a class="collapse-item" href="{{ url('/admin/ecole') }}"><i
                                class="fa-solid fa-bars submenu-i"></i>Réglages Informations</a>
                        {{-- <a class="collapse-item" href=""><i class="fa-solid fa-phone submenu-i"></i>Numéros de téléphones</a>
                                    <a class="collapse-item" href=""><i class="fa-solid fa-share-from-square submenu-i"></i>Réseaux sociaux</a> --}}
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
                        {{-- <h6 class="collapse-header">Menu :</h6> --}}
                        {{-- <a class="collapse-item" href=""><i class="fa-solid fa-bars submenu-i"></i>Page d'acceuil</a> --}}
                        <a class="collapse-item" href="{{ url('/admin/ecole/presentation') }}"><i
                                class="fa-solid fa-bars submenu-i"></i>Présentation</a>
                        <a class="collapse-item" href="{{ url('/admin/ecole/presentation/nouveau') }}"><i
                                class="fa-regular fa-square-plus submenu-i"></i>Ajouter</a>

                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="" data-bs-toggle="collapse"
                    data-bs-target="#collapseActualites" aria-expanded="true" aria-controls="collapseActualites">
                    <i class="fa-solid fa-camera"></i>
                    <span>ACTUALITÉS</span>
                </a>
                <div id="collapseActualites" class="collapse" aria-labelledby="headingActualites"
                    data-bs-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Menu :</h6> --}}
                        <a class="collapse-item" href="{{ url('/admin/gallerie') }}"><i
                                class="fa-solid fa-bars submenu-i"></i>Liste des Actualites</a>
                        <a class="collapse-item" href="{{ url('/admin/gallerie/nouveau') }}"><i
                                class="fa-regular fa-square-plus submenu-i"></i>Ajouter</a>

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
                        {{-- <h6 class="collapse-header">Menu :</h6> --}}
                        <a class="collapse-item" href="{{ url('/admin/faq') }}"><i
                                class="fa-solid fa-bars submenu-i"></i>FAQ</a>
                        <a class="collapse-item" href="{{ url('/admin/faq/nouveau') }}"><i
                                class="fa-regular fa-square-plus submenu-i"></i>Ajouter</a>

                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="" data-bs-toggle="collapse"
                    data-bs-target="#collapseTemoignages" aria-expanded="true" aria-controls="collapseTemoignages">
                    <i class="fa-solid fa-user-group"></i>
                    <span>TÉMOIGNAGES</span>
                </a>
                <div id="collapseTemoignages" class="collapse" aria-labelledby="headingTemoignages"
                    data-bs-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Menu :</h6> --}}
                        <a class="collapse-item" href="{{ url('/admin/temoignages') }}"><i
                                class="fa-solid fa-bars submenu-i"></i>Liste des témoignages</a>
                        <a class="collapse-item" href="{{ url('/admin/temoignages/nouveau') }}"><i
                                class="fa-regular fa-square-plus submenu-i"></i>Ajouter</a>

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
                        {{-- <h6 class="collapse-header">Menu :</h6> --}}
                        <a class="collapse-item" href="{{ url('/admin/banners') }}"><i
                                class="fa-solid fa-bars submenu-i"></i>Liste des Pubs</a>
                        <a class="collapse-item" href="{{ url('/admin/banners/nouveau') }}"><i
                                class="fa-regular fa-square-plus submenu-i"></i>Ajouter</a>

                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="" data-bs-toggle="collapse"
                    data-bs-target="#collapseMessages" aria-expanded="true" aria-controls="collapseMessages">
                    <i class="fa-solid fa-envelope"></i>
                    <span>MESSAGES</span>
                </a>
                <div id="collapseMessages" class="collapse" aria-labelledby="headingMessages"
                    data-bs-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Menu :</h6> --}}
                        <a class="collapse-item" href="{{ url('/admin/messages') }}"><i
                                class="fa-solid fa-bars submenu-i"></i>Liste des Messages</a>
                        {{-- <a class="collapse-item" href="">Ajouter</a> --}}

                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="" data-bs-toggle="collapse"
                    data-bs-target="#collapseInscriptions" aria-expanded="true" aria-controls="collapseInscriptions">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <span>INSCRIPTIONS EN-LIGNE</span>
                </a>
                <div id="collapseInscriptions" class="collapse" aria-labelledby="headingInscriptions"
                    data-bs-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Menu :</h6> --}}
                        <a class="collapse-item" href="{{ url('/admin/inscriptions') }}"><i
                                class="fa-solid fa-bars submenu-i"></i>Liste des Inscriptions</a>
                        <a class="collapse-item" href="{{ url('/admin/inscriptions/nouveau') }}"><i
                                class="fa-regular fa-square-plus submenu-i"></i>Ajouter</a>

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
                <a class="nav-link collapsed" href="" data-bs-toggle="collapse"
                    data-bs-target="#collapseFormations" aria-expanded="true" aria-controls="collapseFormations">
                    <i class="fa-solid fa-award"></i>
                    <span>FORMATIONS</span>
                </a>
                <div id="collapseFormations" class="collapse" aria-labelledby="headingFormations"
                    data-bs-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Menu :</h6> --}}
                        <a class="collapse-item" href="{{ url('/admin/formations') }}"><i
                                class="fa-solid fa-bars submenu-i"></i>Liste des formations</a>
                        <a class="collapse-item" href="{{ url('/admin/formation/nouveau') }}"><i
                                class="fa-regular fa-square-plus submenu-i"></i>Ajouter</a>
                        <a class="collapse-item" href="{{ url('/admin/types_p') }}"><i
                                class="fa-regular fa-square-plus submenu-i"></i>type des paiement</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="" data-bs-toggle="collapse"
                    data-bs-target="#collapseProfs" aria-expanded="true" aria-controls="collapseProfs">
                    <i class="fa-solid fa-chalkboard-user"></i>
                    <span>PROFÉSSEURS</span>
                </a>
                <div id="collapseProfs" class="collapse" aria-labelledby="headingProfs"
                    data-bs-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Menu :</h6> --}}
                        <a class="collapse-item" href="{{ url('/admin/prof') }}"><i
                                class="fa-solid fa-bars submenu-i"></i>Liste des profésseurs</a>
                        <a class="collapse-item" href="{{ url('admin/prof/ajouter') }}"><i
                                class="fa-regular fa-square-plus submenu-i"></i>Ajouter</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="" data-bs-toggle="collapse"
                    data-bs-target="#collapseStagiaires" aria-expanded="true" aria-controls="collapseStagiaires">
                    <i class="fa-regular fa-address-card"></i>
                    <span>STAGIAIRES</span>
                </a>
                <div id="collapseStagiaires" class="collapse" aria-labelledby="headingStagiaires"
                    data-bs-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Menu :</h6> --}}
                        <a class="collapse-item" href="{{ url('/admin/etudiant') }}"><i
                                class="fa-solid fa-bars submenu-i"></i>Liste des stagiaires</a>
                        <a class="collapse-item" href="{{ url('/admin/etudiant/nouveau') }}"><i
                                class="fa-regular fa-square-plus submenu-i"></i>Nouveau Stagiaire</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="" data-bs-toggle="collapse"
                    data-bs-target="#collapseSessions" aria-expanded="true" aria-controls="collapseSessions">
                    <i class="fa-solid fa-people-group"></i>
                    <span>SESSIONS</span>
                </a>
                <div id="collapseSessions" class="collapse" aria-labelledby="headingSessions"
                    data-bs-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Menu :</h6> --}}
                        <a class="collapse-item" href="{{ url('/admin/session') }}"><i
                                class="fa-solid fa-bars submenu-i"></i>Liste des sessions</a>
                        <a class="collapse-item" href="{{ url('/admin/session/ajouter') }}"><i
                                class="fa-regular fa-square-plus submenu-i"></i>Nouvelle session</a>
                    </div>
                </div>
            </li>

                                    {{-- ------------------------ --}}
                                    {{-- --------paiement-------- --}}
                                    {{-- ------------------------ --}}
            {{-- <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('/admin/paiement') }}" >
                    <i class="fa-solid fa-people-group"></i>
                    <span>PAIEMENT</span>
                </a>

            </li> --}}

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="" data-bs-toggle="collapse"
                    data-bs-target="#collapsePaiements" aria-expanded="true" aria-controls="collapseCaisse">
                    <i class="bi bi-cash-stack"></i>
                    <span>PAIEMENTS</span>
                </a>
                <div id="collapsePaiements" class="collapse" aria-labelledby="headingCaisse"
                    data-bs-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Menu :</h6> --}}
                        <a class="collapse-item" href="{{ url('/admin/paiement') }}"><i
                                class="fa-solid fa-bars submenu-i"></i>Liste</a>
                    </div>
                </div>
            </li>


            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="" data-bs-toggle="collapse"
                    data-bs-target="#collapseCaisse" aria-expanded="true" aria-controls="collapseCaisse">
                    <i class="bi bi-cash-stack"></i>
                    <span>CAISSE</span>
                </a>
                <div id="collapseCaisse" class="collapse" aria-labelledby="headingCaisse"
                    data-bs-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Menu :</h6> --}}
                        <a class="collapse-item" href="{{ url('/admin/caisse') }}"><i
                                class="fa-solid fa-bars submenu-i"></i>Calcul</a>
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
                    <ul class="navbar-nav ml-auto" style="margin-right: 10px;">

                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-bs-haspopup="true" aria-bs-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('storage/public/images/user.png') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-bs-labelledby="userDropdown">
                                {{-- <a class="dropdown-item" href="#">
                                                <i class="fa-solid fa-user text-gray-400"></i>
                                                Profil
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fa-solid fa-user-plus text-gray-400"></i>
                                                Ajouter un nouveau utilisateur
                                            </a>
                                            <div class="dropdown-divider"></div> --}}
                                <a class="dropdown-item" href="" data-bs-toggle="modal"
                                    data-bs-target="#logoutModal">
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
        {{-- <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a> --}}

        <a class="scroll-to-top btn btn-dark" id="scrollToTopButton" href="#page-top"><i
                class="bi bi-arrow-up"></i></a>
        {{-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}

        <style>
            .scroll-to-top {
                display: none;
                position: fixed;
                bottom: 20px;
                right: 20px;
                z-index: 999;
                background: #181919;
                color: #fff;
                padding: 5px;
                border-radius: 50%;
                cursor: pointer;
                transition: background 0.3s, opacity 0.3s;
                font-size: 24px;
                font-weight: bold;
            }

            .scroll-to-top:hover {
                background: #424242;
            }
        </style>
        {{-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}



        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
            aria-bs-labelledby="exampleModalLabel" aria-bs-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Vous êtes prêt pour quitter?</h5>
                        <button class="close" type="button" data-bs-dismiss="modal" aria-bs-label="Close">
                            <span aria-bs-hidden="true">×</span>
                        </button>

                    </div>
                    <div class="modal-body">Selectionner "Déconnecter" si vous êtes prêt pour fermer votre session .

                        <div class="form-group row" id="double-btn" style="text-align: center;margin-top:50px;">

                            <div class="col-6" style="text-align: center;">
                                <a class="btn btn-danger shadow" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    style="width: 180px;border-radius: 40px; padding:10px 20px;"><i
                                        class="fa-solid fa-right-from-bracket" style="margin-right:10px;"></i>Déconnecter</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>

                            <div class="col-6" style="text-align: center;">
                                <button class="btn btn-success shadow" type="button" data-bs-dismiss="modal" style="width: 180px;border-radius: 40px; padding:10px 20px;"><i
                                        class="fa-solid fa-x" style="margin-right:10px;"></i>Annuler</button>
                            </div>

                        </div>

                    </div>

                    {{-- <div class="modal-footer"></div> --}}
                </div>
            </div>
        </div>









        


        {{-- --------------------------------------------------------------------------------------------------------------------------------- --}}

        <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/3.0.1/js.cookie.min.js"></script>
          {{-- avec l'aide de chatgpt --}}
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}" rel="stylesheet"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}" rel="stylesheet"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" rel="stylesheet"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}" rel="stylesheet"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}" rel="stylesheet"></script>




</body>




</html>
