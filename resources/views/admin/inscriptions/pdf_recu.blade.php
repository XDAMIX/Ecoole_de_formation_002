{{-- VALIDATION STAGIAIRE  --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche d'inscription</title>

    <!-- Favicons -->
    <link href="{{ public_path('school-icon.ico') }}" rel="icon" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


    <!-- Include Bootstrap CSS -->
    {{-- <link href="{{ public_path('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> --}}



    <!-- Include Bootstrap Icons CSS laravel -->
    {{-- <link href="{{ public_path('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet"> --}}







    <!-- Include Bootstrap from CDN -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css"> --}}

    <!-- Include Bootstrap Icons from CDN -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"> --}}





</head>



<body>

    <div class="container-fluid" id="entete">
        {{-- logo et nom de ecole  --}}
        <div class="row justify-content-center text-center">

            <div class="col-3">
                {{-- <img class="img-fluid" src="{{public_path('storage/'.$informations->logo)}}" alt="logo" style="height: 100px;"> --}}
                <img class="img-fluid" src="{{ public_path('storage/' . $informations->logo_couleurs) }}" alt="logo"
                    style="height: 100px;">
            </div>

            <div class="col-9" style="float: right;margin-top:-150px;margin-right:160px;text-align:center;">
                <div class="row">
                    <div class="col-12">
                        <h1 style="font-weight: bold;padding-top:10px;">{{ $informations->nom }}</h1>
                    </div>
                    <div class="col-12">
                        <h3>Fiche d'inscription de stagiaire</h3>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid">
        {{-- informations inscription  --}}
        <div class="row" id="informations">
            <div class="col-12" id="from-database">
                <h3 class="titre text-light bg-dark"> Informations personnelles </h3>
                
                <div class="container-fluid">
                    <div class="row">

                        {{-- --------------------------------------  --}}
                        <div class="row">

                        </div>
                        <div class="col-12">
                            <p>Nom : {{ $nom }} </p>
                        </div>
                        <div class="col-12">
                            <p>Prénom : {{ $prenom }} </p>
                        </div>

                        <div class="part col-12 text-center">
                            <img class="img-fluid photo" style="" src="{{ public_path('storage/' . $photo) }}" alt="photo">
                        </div>
                        {{-- --------------------------------------  --}}
                        
                        <div class="col-6">
                            <p>Date et lieu de naissance : {{ $date_naissance }} à {{ $lieu_naissance }}</p>
                        </div>

                        <div class="col-6">
                            <p>Wilaya : {{ $wilaya }} </p>
                        </div>
                        
                        {{-- --------------------------------------  --}}
                        
                        <div class="col-12">
                            <p>Profession / Niveau d'études : {{ $profession }} </p>
                        </div>
                        
                        {{-- --------------------------------------  --}}
                        
                        <div class="col-6">
                            <p>N° Tel : {{ $tel }} </p>
                        </div>

                        <div class="col-6">
                            <p>E-mail : {{ $email }} </p>
                        </div>

                        {{-- --------------------------------------  --}}

                <h3 class="titre text-light bg-dark"> Formation :</h3>
                        <div class="col-6">
                            <p >Formation : <span
                            style="font-family: 'Poppins-Bold',sans-serif; text-transform: uppercase;">{{ $formation }}
                        </span></p>
                        </div>
                        {{-- --------------------------------------  --}}

                        <div class="col-6">
                            <p>Session : <span
                                    style="font-family: 'Poppins-Bold',sans-serif; text-transform: uppercase;">{{ $session }}
                                </span></p>
                        </div>
                        {{-- --------------------------------------  --}}

                        {{-- <div class="col-6">
                            <p>Montant payé : <span
                                    style="font-family: 'Poppins-Bold',sans-serif; text-transform: uppercase;">{{ $montant }} DA
                                </span></p>
                        </div> --}}

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
        <div class="container-fluid" id="peidpage">
            <div class="row">
                <div class="col-12">

                    <p class="contact-titre" style="text-decoration: underline;">Contactez-nous par :</p>

                    <p class="contact">

                        <span> <img src="{{ public_path('icones/position.png') }}" class="img-fluid icones"
                                alt="..."> Adresse : {{ $informations->adresse }} . </span>

                    </p>
                    <p class="contact">

                        <span> <img src="{{ public_path('icones/email.png') }}" class="img-fluid icones-lg"
                                alt="..."> Email : {{ $informations->email }} | </span> <img
                            src="{{ public_path('icones/globe.png') }}" class="img-fluid icones-lg" alt="..."> Site
                        web : {{ $informations->site_web }} </span>

                    </p>
                    <p class="contact">

                        <span> <img src="{{ public_path('icones/phone.png') }}" class="img-fluid icones"
                                alt="..."> Telephone : @foreach ($telephones as $telephone)
                                {{ $telephone->numero }} <span> | </span>
                            @endforeach </span>

                    </p>


                </div>
            </div>
        </div>
    </footer>




    <!-- Include Bootstrap JavaScript from CDN -->

    {{-- <script src="{{ public_path('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}





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


        .bi {
            font-family: 'bootstrap-icons', sans-serif;
            /* display: inline-block; */
            /* font-size: 1rem; */
            margin-bottom: 10px;
        }

        html{
            height: 297mm;
            width: 210mm;
            padding: 0;
            margin: 0;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffff;
            color: black;
            height: 100vh;
            width: 100vw;
            padding: 30px;
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
            position: static;
            padding-top: 30px;
            bottom: 0;
        }

        .icones {
            height: 12px;
            /* margin-bottom: -5; */
            justify-content: center;
            margin-right: 5px;
        }
        .icones-lg {
            height: 10px;
            /* margin-bottom: -5; */
            justify-content: center;
            margin-right: 5px;
        }
        .photo {
            float: right;
            right: 0;
            height: 150px;
            margin-right: 20px;
            margin-top: -60px;
        }
    </style>


</body>






</html>



{{-- --------------------------------------------------------------------------------------- --}}


