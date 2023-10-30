 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>inscriptions</title>

     <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
 <body>



   <style>
        h5{
            font-family: 'Poppins', sans-serif;
            text-align: center;
        }
        .table{
            font-family: 'Roboto', sans-serif;
            font-size: 12px;
            border-collapse: collapse;
        }
        th, td{
            border:1px solid rgb(63, 63, 63);
            padding:5px;
        }
    </style>

<div class="col-md-12 d-flex">
<h5 style="font-weight: bold; font-size:18px;">LISTE DES INSCRIPTIONS</h5>
<h5>
        <?php
            $now = now('Africa/Algiers');
            echo('Date et Heure:'.$now);
        ?>
</h5>
    <table class="table table-sm">
        <thead class="table-dark">
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Sexe</th>
                <th scope="col">Nom et Prénom</th>
                <th scope="col">Âge</th>
                <th scope="col">Wilaya</th>
                <th scope="col">Formation choisie</th>
                <th scope="col">N° de téléphone</th>
                <th scope="col">Cette personne à été contacté?</th>
                <th scope="col">Contact avec la personne: Détails et rendez-vous</th>
                <th scope="col">Date et Heure</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inscriptions as $inscription)
            <tr>
                <td>{{ $inscription->id }}</td>
                <td style=" color: @if($inscription->sexe == 'Monsieur') Blue; @elseif($inscription->sexe == 'Mademoiselle') DeepPink;@elseif($inscription->sexe == 'Madame') DarkRed; @endif ">{{ $inscription->sexe }}</td>
                <td>{{ $inscription->nom }}</td>
                <td>{{ $inscription->age }}</td>
                <td>{{ $inscription->wilaya }}</td>
                <td style="font-weight: bold;">{{ $inscription->formation }}</td>
                <td>{{ $inscription->tel }}</td>
                <td style=" color: @if($inscription->contact == 0) red; @else green; @endif ">@if($inscription->contact == 0) NON @else OUI @endif</td>
                <td></td>
                {{-- <td style=" color: @if($inscription->details == 'Nouvelle-inscription') red; @else green; @endif ">{{ $inscription->details }}</td> --}}
                <!-- <td>{{ $inscription->created_at }}</td> -->
                <td>{{ $inscription->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

</body>
</html>
