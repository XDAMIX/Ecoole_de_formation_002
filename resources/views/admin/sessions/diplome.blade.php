
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CERTIFICAT DE FORMATION</title>
</head>
<header>
    <div class="entete">
       <div class="logo">
        <img class="img-fluid" src="{{ public_path('storage/' . $informations->logo) }}" alt="logo" style="height: 50px;">
       </div>  
       
    </div>  
   </header>
<body>
<div >
    <div>
        
        <h2 class="titre">CERTIFICAT DE FORMATION</h2>
        <!-- <h2 class="titreformation">{{ $formation }} </h2> -->
    </div>

    <div class="infop">
        <ul >
            <li>{{ $sexe }} </li>
            <li>Nom :  {{ $nom }} </li>
            <li>Prenom :  {{ $prenom }} </li>
            <li>Date de naissance :  {{ $date_naissance }} </li>
            <li>Lieu de naissance :  {{ $lieu_naissance }} </li>
            
            <br>
            <li>Code certificat  :  {{ $code }} </li>
            <li>Formation  :  <span style="font-weight: bold;">{{ $formation }}</span>   </li>
            <li>Date debut  :  {{ $date_debut }} </li>
            <li>Date fin  :  {{ $date_fin }} </li>
            <li>Avec mention  :  {{ $mention }} </li>

        </ul>
    </div>
   

</div>
<div>     
    <h5 id="date-inscription" class="date">{{ $wilaya }} le :    <span id="date-valeur">{{ $date_obt }}</span></h5>

</div>

</body>

<footer>
    <div class="info">
         {{-- <p>Telephone :{{$telephones->numero}} . Email : {{$informations->email}}  . Adresse : {{$informations->adresse}} . site web : www.formacorpor.com </p>  --}}
    </div>
</footer>
</html>

<style>
 .entete{
          
          display: flex;
      
          align-items:  baseline;
          /* background-color: black; */
          padding: 10px 20px;
         height: 100px;
         width: 20%;
    }

    .info{
        /* background-color: aqua; */
        text-align: center;
        font-size: 13px;
        color: rgb(22, 54, 113);
    }
    .titre{
        text-align: center;
        font-weight: bold;
        font-size: 40px;
        font-family: alge;
    }
    .titreformation{
        text-align: center;
        font-weight: bold;
        font-size: 35px;
    }
    .date{
        text-align: right;
        padding: 2%;
       
    }

    .infop{
        padding-left: 10%;
        text-decoration: none;
        font-size:100% ;
    }
    .dos{
        padding-left: 10%;
        font-size:100% ;
        /* padding-bottom: 25%; */
    }
    .footer{
        /* padding-top: 30%; */
        position: fixed;
        bottom: 0;
        width: 100%,

    }
</style>

