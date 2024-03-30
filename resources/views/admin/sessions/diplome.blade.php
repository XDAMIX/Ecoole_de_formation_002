<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicons -->
    <link href="{{ public_path('school-icon.ico') }}" rel="icon" type="image/x-icon">


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
            height: 70px;
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
            margin: 0;
            padding: 0;
            width: 100%;
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



    <div class="part part1" style="margin-top:80px;margin-left:250px;margin-right:250px;height:100px;">


        <div class="colonne" style="height: 70px;float:left;">
            <img class="img-fluid logo" src="{{ public_path('storage/' . $informations->logo_couleurs) }}"
                alt="logo">
        </div>

        <div class="colonne" style="height: 70px;float:left;margin-top:-10px;text-align:center;">
            <p class="blue" style="font-family:sans-serif;font-size:22px;font-weight: bold; text-transform: uppercase;padding:0;margin-top:7px;">{{ $informations->nom }}</p>
            <p class="blue" style="padding:0;margin:0;">Établissement agréé par l'état </p>
            <p class="blue" style="padding:0;margin:0;">Agrément N° : {{ $informations->num_agrement }} | date : {{ $informations->date_agrement }} </p>
        </div>




    </div>




    <div class="part part2" style="margin-top:160px;">

        <div class="colonne centre">
            <p class="blue">CODE : <span style="font-family:sans-serif;">{{ $code }}</span>  </p>
            <p class="handfont gold" style="margin-top:-20px;">{{ $sexe }} : {{ $nom }} {{ $prenom }}</p>
        </div>

    </div>





    <div class="part part3">
        <div class="colonne centre">
            <p class="blue">Né(e) le : {{ $date_naissance }}<span> à : </span> {{ $lieu_naissance }}</p>

        </div>

        <div class="colonne centre">
            <p class="blue">Pour avoir complété avec excellence sa formation en :</p>

        </div>

        <div class="colonne centre">
            <p class="blue"><span class="bold-text">{{ $formation }}</span></p>
            <p class="blue"><span> du : </span> {{ $date_debut }} <span> au : </span> {{ $date_fin }}</p>

        </div>

    </div>




    <div class="part part4" style="">
        <div class="parent text-center" style="float:left; margin-left:270px; margin-top:24px;">
            <p class="blue">{{ $wilaya }} le : {{ $date }}</p>
        </div>
    </div>




</body>

</html>
