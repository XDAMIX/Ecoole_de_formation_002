<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reçu de paiement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            width: 15cm;
            height: 13cm;
            margin: 0 auto;
            padding: 1cm;
            box-sizing: border-box;
            background-color: #f7f7f7;
            border: 2px solid #ccc;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            width: 150px;
            height: 80px;
            margin-right: 20px;
            display: inline-block;
            background-color: rgb(59, 59, 59);
        }

        .title {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-top: 5px;
        }

        .date {
            text-align: right;
            margin-top: 20px;
            margin-right: 10px;
            font-size: 14px;
            color: #555;
        }

        .info {
            margin-top: 20px;
        }
        .infocontact {
            text-align: center;
            font-size: 8px;
            color: rgb(23, 23, 109);
        }

        .info label {
            font-weight: bold;
            display: block;
        }

        .amount-container {
            text-align: right;
            margin-top: 20px;
        }

        .amount {
            font-size: 24px;
            font-weight: bold;
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            display: inline-block;
        }

        .footer {
            /* position: absolute; */
            bottom: 1cm;
            width: 100%;
        }

        .contact-info {
            font-size: 14px;
            color: #555;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <img class="logo" src="{{public_path('storage/'.$informations->logo)}}" alt="Logo de l'école">
    <div class="date">
        le :   <span id="date-valeur">{{ $date }}</span>
    </div>
    <div class="header">
        <div class="title">Reçu de paiement</div>
    </div>
    <div class="info">
        <label>Nom :    {{ $nom }}</label> <br>
        <label>Prénom : {{ $prenom }}</label> <br>
        <label>Formation: {{ $formation}}</label> <br>
        <label>Session :<strong> {{ $session }} </strong></label> <br>
    </div>
    <div class="amount-container">
       <h4>Montant verssé : <span class="amount">{{ $montant }} DA</span></h4> 
    </div>
    <div class="footer">
        <div class="infocontact">
           <p> Tél: {{$telephones->numero}} | Email: {{$informations->email}}  | Adresse: {{$informations->adresse}}| Site web: www.formacorpor.com </p>
        </div>
    </div>
</body>

</html>
