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
        <link href="{{ public_path('school-icon.ico') }}" rel="icon" type="image/x-icon" >
      
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
            <img class="img-fluid" src="{{ public_path('storage/'.$informations->logo) }}" alt="logo" style="height: 100px;">

        </div>
        <div class="col-12">
            <h1>le nom de l'ecole ici</h1>
        </div>
        <div class="col-12">
            <h2>Reçu de l'inscription en ligne</h2>
        </div>
    </div>
    
    {{-- informations inscription  --}}
    <div class="row" id="informations">
        <div class="col-6 col-md-6 col-lg-6" id="from-database">
            <h3> Informations personnelles </h3>
            <p>Nom :  {{ $nom }} </p>
            <p>Prenom :  {{ $prenom }} </p>
            <p>Age : {{ $age }} </p>
            <p>Wilaya :{{ $wilaya }} </p>
            <p>Profession :{{ $profession }} </p>
            <p>N° Tel: {{ $tel }} </p>
            <p>E-mail : {{ $email }} </p>
            <p>Formation choisie :  <span style="font-family: 'Poppins-Bold',sans-serif; text-transform: uppercase;">{{ $formation }}  </span></p>
            <p>Date d'inscription :{{ $date }}</p>
        </div>
        
        <div class="col-6 col-md-6 col-lg-6">
            <h3> Dossier a fournir </h3>
            <p>-Copie de la pièce d'identité</p>
            <p>-Extrait de naissance</p>
            <p>-Fiche de résidence</p>
            <p>-(02) photos</p>
            <p>-CV</p>
        </div>
    </div>


</div>

{{-- <div class="container-fluid" id="teste">
    <div class="row justify-content-center text-center">
        <div class="col-12">
            <a href="#" class="btn btn-primary"><i class="bi bi-geo-alt"></i>  teste de bootstrap</a>
            <a href="#" class="btn btn-success"><i class="bi bi-phone"></i>  teste de bootstrap</a>
            <a href="#" class="btn btn-danger"><i class="bi bi-envelope"></i>  teste de bootstrap</a>
            <a href="#" class="btn btn-dark"><i class="bi bi-globe"></i>  teste de bootstrap</a>
        </div>
    </div>
</div> --}}


<footer>
    <div class="container-fluid" id="peidpage">
        <div class="row">
            <div class="col-12">
                
                <p id="contact" style="text-decoration: underline;">Contactez-nous sur :</p>

                <p id="contact">

                    <span><i class="bi bi-geo-alt"></i>  Adresse : {{$informations->adresse}}  </span>

                </p>
                <p id="contact">

                    <span><i class="bi bi-envelope"></i>  Email : {{$informations->email}}  -  </span> <span><i class="bi bi-globe"></i>  Site web : www.formacorpro.com </span>

                </p>
                <p id="contact">

                    <span><i class="bi bi-globe"></i>  Site web : www.formacorpro.com </span>

                </p>
                <p id="contact">

                    <span><i class="bi bi-phone"></i>  Telephone :{{$telephones->numero}}  </span>
                    
                </p>


            </div>
        </div>
    </div>
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
    font-family: 'bootstrap-icons',sans-serif;
    display: inline-block;
    /* font-size: 1rem; */
}

body{
    font-family: 'Poppins',sans-serif;
    background-color: #ffff;
    color: black;
    height: 100vh;
}
p{
    font-size: 14px;
    line-height: 10px;
}
h3,h5{
    font-family: 'Poppins-Bold',sans-serif;
}
h3{
    background-color: #aaaaaa;
    color: #ffff;
    line-height: 1rem;
    padding-left: 5px;
}
#entete{
    margin-top: 10px;
}
#informations{
    margin-top: 50px;
    margin-bottom: 10px;  
}
#informations #from-database{
    margin-bottom: 30px;  
}
#piedpage{
    margin-top: 10px;
}
#contact{
    font-size: 10px;
}
footer{
    margin-top: 10px;
    position: static;
    bottom: 0;
}
i{
    margin-right: 5px;
}
</style>


</body>






</html>





