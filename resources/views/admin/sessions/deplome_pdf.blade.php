<!-- Contenu du PDF -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ficher de préinscription </title>
</head>
<header>
    <div class="entete">
       <div class="logo">
               <img class="logoe" src="{{public_path('storage/'.$informations->logo)}}" alt="logo">
       </div>  
       
    </div>  
   </header>
<body>
<div >
    <div>
        <h2 class="titre">CERTIFICAT DE FORMATION</h2>
        <h2 class="titreformation">{{ $formation }} </h2>
    </div>

    <div>
        <h3 style="font-size: 170%;"> Informations Personnel </h3>
    </div>
    <div class="infop">
        <ul >
            <li>Sexe :  {{ $sexe }} </li>
            <li>Nom :  {{ $nom }} </li>
            <li>Prenom :  {{ $prenom }} </li>
            <li>date debut  :  {{ $date_deb }} </li>
            <li>date fin  :  {{ $date_fin }} </li>

                     <br>
            <li style="font-weight: bold;">Formation choise :  {{ $formation }}  </li>

        </ul>
    </div>
   

</div>
<div>     
    <h5 id="date-inscription" class="date">ALger le  :   <span id="date-valeur">{{ $date }}</span></h5>

</div>

</body>

<footer>
    <div class="info">
        <p>Telephone :{{$telephones->numero}} . Email : {{$informations->email}}  . Adresse : {{$informations->adresse}} . site web : www.formacorpor.com </p>
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
    img.logo{
       
        
          align-items: center;
          background-color: rgb(180, 28, 28);
         
    }
    .logoe{
        width: 200px;
            height: 100px;
            margin-right: 20px;
            display: inline-block;
            background-color: rgb(59, 59, 59);
    }
    /* .logo{
       
        width: 20%;
        max-height: 20%;
    } */
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

