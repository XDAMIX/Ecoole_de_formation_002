{{-- @php
error_reporting(E_ALL);
ini_set('display_errors', 1);
@endphp --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fiche Profésseur</title>

    <!-- Favicons -->
    <link href="{{ public_path('school-icon.ico') }}" rel="icon" type="image/x-icon">



    {{-- bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>






</head>



<body>

    <div class="container-fluid" id="entete">
        {{-- logo et nom de ecole  --}}
        <div class="row justify-content-center text-center">
            <div class="col col-11">
                {{-- <img class="img-fluid" src="{{public_path('storage/'.$informations->logo)}}" alt="logo" style="height: 100px;"> --}}
                <img class="img-fluid" src="{{ public_path('storage/' . $informations->logo_couleurs) }}" alt="logo"
                    style="height: 100px;">

            </div>
            {{-- <div class="col col-11">
                <h1 style="font-weight: bold;padding-top:10px;">{{ $informations->nom }}</h1>
            </div> --}}
            <div class="col col-11">
                <h3>Fiche Profésseur</h3>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        {{-- informations inscription  --}}
        <div class="row">

            <div class="col col-11">
                <p class="titre text-light bg-dark"> Informations personnelles </p>
            </div>

            <div class="part col-11">
                <div class="row">

                    <div class="col">
                        <p style="margin-left: 20px;">
                            @if ($sexe == 'H')
                                Mr
                            @else
                                Mme
                            @endif
                            <span class="nom"> {{ $nom }} {{ $prenom }} </span>
                        </p>
                    </div>
                </div>

            </div>
        </div>


        <img class="img-fluid photo" src="{{ public_path('storage/' . $photo) }}" alt="photo">






        <div class="row">
            <div class="col col-11">
                <p>date de naissance : {{ $date_naissance }} </p>
            </div>
            <div class="col col-11">
                <p>lieu de naissance : {{ $lieu_naissance }} </p>
            </div>
            <div class="col col-11">
                <p>wilaya : {{ $wilaya }} </p>
            </div>
            <div class="col col-11">
                <p>adresse : {{ $adresse }} </p>
            </div>
            <div class="col col-11">
                <p>N° Tel: {{ $tel }} </p>
            </div>

            <div class="col col-11">
                <p>E-mail : {{ $email }} </p>
            </div>
            <div class="col col-11">
                <p>Date d'ajout : {{ $date }}</p>
            </div>
        </div>
        {{-- --------------------------------------  --}}
        <div class="row">
            <div class="col col-11">
                <p class="titre text-light bg-dark"> Formations </p>
            </div>
            @foreach ($cours as $cour)
                <div class="col col-11 py-2">
                    <p style="font-family: 'Poppins-Bold',sans-serif; text-transform: uppercase;text-weight:bold;">
                        -{{ $cour->titre_formation }}</p>
                </div>
            @endforeach
        </div>









    </div>






    {{-- css  --}}
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css");

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

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffff;
            color: black;
            height: 100vh;
            width: 100vw;
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

        .photo {
            float: right;
            right: 0;
            height: 150px;
            margin-right: 40px;
            margin-top: -30px;
        }

        p {
            font-size: 16px;
        }

        .nom {
            font-weight: bold;
            text-transform: uppercase;
            font-size: 22px;
            margin-left: 20px;
        }

        .part {
            /* background-color: rgb(89, 255, 0); */
        }

        .col {
            padding: 0;
            margin: 0;
            /* background-color: aqua; */
        }
    </style>



</body>






</html>
