{{-- @php
error_reporting(E_ALL);
ini_set('display_errors', 1);
@endphp --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fichier d'inscription</title>

    <!-- Favicons -->
    <link href="{{ public_path('school-icon.ico') }}" rel="icon" type="image/x-icon">

    <!-- Google Fonts -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> --}}



    <!-- Include Bootstrap CSS -->
    {{-- <link href="{{ public_path('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> --}}



    <!-- Include Bootstrap Icons CSS laravel -->
    {{-- <link href="{{ public_path('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet"> --}}







    <!-- Include Bootstrap from CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">

    <!-- Include Bootstrap Icons from CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">





</head>



<body>

    <div class="container-fluid" id="entete">
        {{-- logo et nom de ecole  --}}
        <div class="row justify-content-center text-center">
            <div class="col-12">
                {{-- <img class="img-fluid" src="{{public_path('storage/'.$informations->logo)}}" alt="logo" style="height: 100px;"> --}}
                <img class="img-fluid" src="{{ public_path('storage/' . $informations->logo) }}" alt="logo"
                    style="height: 100px;">

            </div>
            <div class="col-12">
                <h1 style="font-weight: bold;padding-top:10px;">{{ $informations->nom }}</h1>
            </div>
            <div class="col-12">
                <h3>Fiche Profésseur</h3>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        {{-- informations inscription  --}}
        <div class="row" id="informations">
            <div class="col-12" id="from-database">
                <h3 class="titre"> Informations personnelles </h3>

                <div class="container-fluid">
                    <div class="row">

                        {{-- --------------------------------------  --}}

                        <div class="col-6">
                            <p>Nom : {{ $nom }} </p>
                        </div>
                        <div class="col-6">
                            <p>Prénom : {{ $prenom }} </p>
                        </div>
                        {{-- --------------------------------------  --}}

                        <div class="col-4">
                            <p>Age : {{ $age }} ans</p>
                        </div>

                        <div class="col-4">
                            <p>N° Tel: {{ $tel }} </p>
                        </div>

                        <div class="col-4">
                            <p>E-mail : {{ $email }} </p>
                        </div>

                        {{-- --------------------------------------  --}}

                        <div class="col-6">
                            <p>Spécialite : <span
                                    style="font-family: 'Poppins-Bold',sans-serif; text-transform: uppercase;text-weight:bold;">{{ $specialite }}
                                </span></p>
                        </div>

                        <div class="col-6">
                            <p>Date d'inscription : {{ $date }}</p>
                        </div>

                        {{-- --------------------------------------  --}}

                    </div>
                </div>
            </div>


        </div>


    </div>



    <footer>

    </footer>


    {{-- <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" rel="stylesheet"></script> --}}

    <!-- Include Bootstrap JavaScript from CDN -->

    <script src="{{ public_path('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> --}}




    {{-- css  --}}
    <style>
        @font-face {
            font-family: 'Poppins';
            src: url('/fonts/font-poppins/Poppins-Regular.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'Poppins-Bold';
            src: url('/fonts/font-poppins/Poppins-ExtraBold.ttf') format('truetype');
            font-weight: bold;
            font-style: bold;
        }

        /* @font-face {
    font-family: 'bootstrap-icons';
    src: url('/fonts/bootstrap-icons/bootstrap-icons.woff') format('woff'),
         url('/fonts/bootstrap-icons/bootstrap-icons.woff2') format('woff2');
    font-weight: normal;
    font-style: normal;
} */

        .bi {
            font-family: 'bootstrap-icons', sans-serif;
            display: inline-block;
            /* font-size: 1rem; */
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffff;
            color: black;
            height: 100vh;
        }

        p {
            font-size: 14px;
            line-height: 10px;
        }

        h3,
        h5 {
            font-family: 'Poppins-Bold', sans-serif;
        }

        .titre {
            background-color: #aaaaaa;
            color: #ffff;
            line-height: 1rem;
            padding-left: 5px;
        }

        #entete {
            margin-top: 10px;
        }

        #informations {
            margin-top: 50px;
            margin-bottom: 10px;
        }

        #informations #from-database {
            margin-bottom: 30px;
        }

        #piedpage {
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .contact {
            font-size: 10px;
        }

        .contact-titre {
            font-size: 14px;
        }

        footer {
            position: relative;
            padding-top: 30px;
        }

        .icones {
            height: 12px;
            margin-bottom: -5;
            justify-content: center;
            margin-right: 5px;
        }
        .icones-lg {
            height: 10px;
            margin-bottom: -5;
            justify-content: center;
            margin-right: 5px;
        }
    </style>


</body>






</html>
