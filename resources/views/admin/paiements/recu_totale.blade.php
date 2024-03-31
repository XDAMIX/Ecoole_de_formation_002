<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <title>Reçu de paiement</title>

    <style>

        @page {
            size: A4;
            margin: 0;
        }

        body {}

        table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

th, td {
    border: 1px solid #ddd;
    /* padding: 4px; */
}

th {
    background-color: #f2f2f2;
}
tr{
padding: 0;

}



        .header {
            text-align: center;
            margin-bottom: 5px;
        }

        .logo {
            width: 120px;
            height: 60px;
            margin-right: 20px;
            display: inline-block;
            /* background-color: rgb(59, 59, 59); */
        }

        .title {
            font-size: 21px;
            font-weight: bold;
            color: #333;
            margin-top: 0px;
            text-align: center;
        }

        .sous_titre {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .date {
            text-align: right;
            margin-top: 20px;
            margin-right: 10px;
            font-size: 14px;
            color: #555;
        }

        .info {
            padding: 5px;
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
            font-size: 14px;
        }

        .amount-container {
            text-align: right;
            margin-top: 1px;
        }

        .amount {
            font-size: 24px;
            font-weight: bold;
            /* background-color: #333; */
            color: #333;
            padding: 10px 20px;
            /* display: inline-block; */
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

        .okok {
            font-family: Arial, sans-serif;
            width: 19cm;
            height: auto;
            margin: 0.5cm;
            padding: 0.4cm;
            /* box-sizing: border-box; */
            /* background-color: #cdefd887; */
            border: 2px solid #ccc;
        }

        .container {
            /* width: 100%; */
            overflow: auto;
            margin-bottom: 20px
        }
        div.container div {
            width: 33%;
            float: left;
        }
        .alig{
            display: flex;
            justify-content: space-between;
        }

    </style>
</head>

<body>
    <div class="okok">
        <div class="container">
            <div>
                <img class="logo" src="{{ public_path('storage/' . $informations->logo_couleurs) }}" alt="Logo de l'école">
            </div>
            <div style=" padding-top: 20px; padding-bottom: 0; margin-bottom: 0;  text-align: center;">
                <label class="title">
                    Facture de paiement totale
                </label>
                
                <br>
            </div>
            <div class="date" style="float: right; width: auto; ">
                le : <span id="date-valeur">{{ $date }}</span>
            </div>
        </div>
        <br>
        <div class="info" style="padding: 0">
            <label style="float: right;">ID : {{ $id }}</label> <br>
            <label>Nom       : {{ $nom }}</label> <br>
            <label>Prénom    : {{ $prenom }}</label> <br>
            <label>Formation : {{ $formation }}</label> <br>
            <label>Session   : <strong> {{ $session }} </strong></label> <br>
        </div>
     
        <div class="container-fluid" style="padding-top:2px;padding-bottom:2px;">
            <div class="row">
                <div class="col-md-12">
                    <table id="example" class="table table-bordered"
                    style="width:100%">
                    <thead>
                        <tr>
                            
                          
                            <th>Encaissé par</th>
                            <th>Date</th>
                           
                            <th>Montant</th>
                          


                    </thead>

                    <tbody class="text-center" style="font-size: 14px; padding-right: 2px; ">
                        @foreach ($paiements as $paiement)
                            <tr>
                                <td class=" align-middle">{{ $paiement->user }}</td>

                                <td class="align-middle" style="text-align: center;">{{ \Carbon\Carbon::parse($paiement->date)->format('d/m/20y ') }}</td>

                                
                                <td class=" align-middle" style="text-align: center;">{{ $paiement->montant }} DA</td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>
                </div>
            </div>
        </div>

        <div class="alig">
  
            <div class="amount-container">
                <h4>Montant payé : <span class="amount">{{ $totalMontant}} DA</span></h4>    
            </div>
            
        </div>

        <div style="margin-top: 2px; left: -10;">
        </div>
</body>

</html>
