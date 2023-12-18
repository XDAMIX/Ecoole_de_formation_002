<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicons -->
    <link href="{{ public_path('school-icon.ico') }}" rel="icon" type="image/x-icon">

    <!-- Google Fonts -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> --}}


    <!-- Include Bootstrap from CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">

    <!-- Include Bootstrap Icons from CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>CERTIFICAT DE FORMATION</title>

    {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@400;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@400;700&display=swap"
        rel="stylesheet">

    {{-- CSS  --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Great+Vibes:wght@400&family=Poppins:wght@400;700&display=swap');

        @font-face {
            font-family: 'Poppins';
            src: url('{{ $poppins }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'Poppins_bold';
            src: url('{{ $poppins_bold }}') format('truetype');
            font-weight: bold;
            font-style: bold;
        }

        @font-face {
            font-family: 'Great_Vibes';
            src: url('{{ $greatvibes }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }


        :root {
            --greatvibes: 'Great_Vibes', sans-serif;
            --poppins: 'Poppins', sans-serif;
            --poppins_bold: 'Poppins_bold', sans-serif;
        }

        html {
            margin: 0;
            padding: 0;
        }

        body {
            height: 210mm;
            width: 297mm;
            margin: 0;
            padding: 0;
            background-image: url('{{ $background }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: var(--poppins), 'Poppins', sans-serif;
            font-size: 18px;
        }

        .logo {
            height: 50px;
        }


        .blue {
            color: #243649;
        }

        .gold {
            color: #caa04a;
        }

        .black {
            color: #000000;
        }

        .handfont {
            font-family: var(--greatvibes), 'great_vibes', sans-serif;
            font-size: 60px;
        }

        .bold-text {
            font-family: var(--poppins_bold), 'Poppins', sans-serif;
        }

        .simple {
            font-family: sans-serif;
        }

        .centre {
            text-align: center;
        }

        .align-droite {
            float: right;
            padding: 20px;
        }

        .part {
            position: relative;
            margin: 0;
            padding: 0;
        }

        .colonne {
            margin: 0;
            padding: 0;
        }

        p {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>



    <div class="part part1" style="width:100%; margin-top:70px;height:130px;">
        <div class="parent text-center" style="float:right; margin-right:60px;">

            <div class="colonne">
                <img class="img-fluid logo" src="{{ public_path('storage/' . $informations->logo) }}" alt="logo">
            </div>
            <div class="colonne">
                <h3 class="blue">{{ $informations->nom }}</h3>
            </div>

        </div>
    </div>




    <div class="part part2" style="">

        <div class="parent text-center" style="width:100%;height: 50px;">
            <div class="colonne centre" style="float:right; margin-right:70px;">
                <p  class="blue">CODE : <span class="simple">{{ $code }}</span> </p>
            </div>
        </div>

        <div class="colonne centre" style="height:50px;">
            <p class="blue">C'EST AVEC UN GRAND HONNEUR QUE</p>
        </div>

        <div class="colonne centre" style="height:50px;margin-top:-20px;">
            <p class="gold">NOUS REMETTONS CE CERTIFICAT À</p>
        </div>

        <div class="colonne centre"  style="height:80px;margin-top:-20px;">
            <p class="handfont gold">{{ $sexe }} : {{ $nom }} {{ $prenom }}</p>
        </div>

    </div>





    <div class="part part3" style="margin-top:90px;">
        <div class="colonne centre">
            <p class="blue">Né(e) le : {{ $date_naissance }}<span>  à :  </span>  {{ $lieu_naissance }}</p>

        </div>

        <div class="colonne centre">
            <p class="blue">Pour avoir complété avec excellence sa formation en :</p>

        </div>

        <div class="colonne centre">
            <p class="blue"><span class="bold-text">{{ $formation }}</span> <span> ,  du :  </span> {{ $date_debut }} <span>   au :  </span> {{ $date_fin }}</p>

        </div>

    </div>




    <div class="part part4" style="">
        <div class="parent text-center" style="float:right; margin-right:320px; margin-top:5px;">
            <p  class="blue">{{ $wilaya }} le : {{ $date }}</p>
        </div>
    </div>



    <!-- Include Bootstrap JavaScript from CDN -->

    <script src="{{ public_path('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
