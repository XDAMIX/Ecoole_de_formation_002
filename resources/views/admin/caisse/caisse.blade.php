@extends('layouts.admin_menu')
@section('content')
    {{-- retour à l'acceuil  --}}
    <div class="container" id="titre-page">
        <div class="row">
            <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/') }}" class="btn btn-dark"><i class="bi bi-house"></i><span
                        class="btn-description">Acceuil</span></a>
            </div>
            <div class="col-8  text-center">
                <h2>Calcul du revenu</h2>
            </div>
        </div>
    </div>


    {{-- ---------------------------------------------------------------------------------------------------------------------- --}}
    <style>
        .buttons-container {
            text-align: left;
            margin-top: 10px;
            margin-bottom: 10px;
            background-color: rgb(255, 255, 255);
        }

        #titre-page {
            margin-bottom: 20px;
        }
    </style>
    {{-- ---------------------------------------------------------------------------------------------------------------------- --}}

    {{-- html  --}}
    <div class="container-fluid" style="padding-top:10px;padding-bottom:80px;">
        <div class="row animate__animated animate__backInLeft">
            <div class="col-md-12">
                <div class="card shadow" style="background-color: #ffff;padding:30px;">
                    <div class="card-body">


                        <div class="row mt-1 mb-5">
                            <div class="col-12 text-center text-primary">
                              
                                <h5 style="font-size: 35px">Résumé des paiements :</h5>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-6">
                                <h6>Aujourd'huit : {{ \Carbon\Carbon::now()->toDateString() }}</h6>
                            </div>
                            <div class="col-6 justify-content-center text-center">
                                <h6 style="color: green" id="jour">{{ $totalJour }} DA</h1>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-6">
                                <h6>En ce mois-ci : {{ \Carbon\Carbon::now()->format('F') }}</h6>
                            </div>
                            <div class="col-6 justify-content-center text-center">
                                <h6 style="color: green" id="moi">{{ $totalMoi }} DA</h6>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-6">
                                <h6>Cette année : <span>{{ \Carbon\Carbon::now()->format('Y') }}</span></h6>

                            </div>
                            <div class="col-6 justify-content-center text-center">
                                <h6 style="color: green" id="annee">{{ $totalAnnee }} DA</h6>
                            </div>
                        </div>

                        <hr>
                        {{-- ---------------------------------------------------------------------------------------------------------------------- --}}

                        {{-- les graphes  --}}

                        <div class="row">

                            <div class="col-6 text-primary mt-5 mb-5">
                                <h5>Graphe des paiements par jour:</h5>
                            </div>
                            <div class="col-6 mt-5 mb-5">
                                <label for="">Type de graphe :</label>
                                <select name="graphe1" id="graphe1">
                                    <option value="1" selected>Bars</option>
                                    <option value="2">Points</option>
                                </select>
                            </div>

                            <div class="col-12 mt-5 mb-5 text-center">
                                <canvas class="text-center" id="graphiqueTotalPaiementsJour"></canvas>
                            </div>
                        </div>

                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            // Extraction des données de $paiements_par_jour
                            var dates = [];
                            var totalPaiements = [];
                            @foreach ($paiements_par_jour as $paiement)
                                dates.push('{{ $paiement->date_paiement }}');
                                totalPaiements.push({{ $paiement->total_paiements }});
                            @endforeach

                            // Génération aléatoire de couleurs pour chaque ligne
                            var colors = [];
                            for (var i = 0; i < dates.length; i++) {
                                var randomColor = 'rgba(' + Math.floor(Math.random() * 256) + ', ' + Math.floor(Math.random() * 256) + ', ' +
                                    Math.floor(Math.random() * 256) + ', 0.7)';
                                colors.push(randomColor);
                            }

                            // Création du graphique des paiements par jour
                            var ctx = document.getElementById('graphiqueTotalPaiementsJour').getContext('2d');
                            var graphique = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: dates, // Dates sur l'axe des abscisses
                                    datasets: [{
                                        label: 'Total des paiements par jour',
                                        data: totalPaiements, // Données de total des paiements sur l'axe des ordonnées
                                        backgroundColor: colors, // Utilisation de la couleur générée aléatoirement
                                        borderColor: colors, // Utilisation de la couleur générée aléatoirement
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        },
                                        maintainAspectRatio: false,
                                        responsive: true,
                                        width: '100%',
                                        height: '300'
                                    }
                                }
                            });
                        </script>





                        <div class="row">

                            <div class="col-6 text-primary mt-5 mb-5">
                                <h5>Graphe des paiements par formation:</h5>
                            </div>
                            <div class="col-6 mt-5 mb-5">
                                <label for="">Type de graphe :</label>
                                <select name="graphe2" id="graphe2">
                                    <option value="1" selected>Donut</option>
                                    <option value="2">Bars</option>
                                </select>
                            </div>

                            <div class="col-12 mt-5 mb-5 text-center">
                                <canvas class="text-center" id="graphiqueTotalPaiementsFormation"></canvas>
                            </div>
                        </div>

                        <script>
                            // Extraction des données de $paiements_par_formation
                            var formations = [];
                            var totalPaiementsFormation = [];
                            @foreach ($paiements_par_formation as $paiement)
                                formations.push('{{ $paiement->titre }}');
                                totalPaiementsFormation.push({{ $paiement->total_paiements }});
                            @endforeach

                            // Génération aléatoire de couleurs pour chaque barre
                            var barColors = [];
                            for (var i = 0; i < formations.length; i++) {
                                var randomColor = 'rgba(' + Math.floor(Math.random() * 256) + ', ' + Math.floor(Math.random() * 256) + ', ' +
                                    Math.floor(Math.random() * 256) + ', 0.7)';
                                barColors.push(randomColor);
                            }

                            // Création du graphique des paiements par formation
                            var ctxFormation = document.getElementById('graphiqueTotalPaiementsFormation').getContext('2d');
                            var graphiqueFormation = new Chart(ctxFormation, {
                                type: 'doughnut',
                                data: {
                                    labels: formations,
                                    datasets: [{
                                        label: 'Revenus par formation',
                                        data: totalPaiementsFormation,
                                        backgroundColor: barColors,
                                        borderColor: 'rgba(54, 162, 235, 1)',
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        },
                                        maintainAspectRatio: false,
                                        responsive: true,
                                        width: '100%',
                                        height: '300'
                                    }
                                }
                            });
                        </script>








                        <div class="row mt-5 mb-5">
                            <div class="col-12 text-primary">
                                <h5>Calcul des paiements :</h5>
                            </div>
                            <div class="col-12">
                                <div class="row justify-content-center text-center p-3">
                                    <div class="col-12">
                                        <h5>Filtrage des paiements des stagiaires :</h5>
                                    </div>
                                    <div class="col-6">
                                        <label for="date-debut">Depuis le :</label>
                                        <input id="date-debut" type="date" class="form-control form-control-lg">
                                    </div>
                                    <div class="col-6">
                                        <label for="date-fin">Jusqu'au :</label>
                                        <input id="date-fin" type="date" class="form-control form-control-lg">
                                    </div>
                                </div>
                                <div class="row justify-content-center text-center p-3">
                                    <h5>Total des paiements filtrés = <span id="resultat" style="color: green;"></span>
                                    </h5>
                                </div>
                                <div class="row p-3">
                                    <div class="col-12">
                                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Date</th>
                                                    <th class="text-center">Encaissé par</th>
                                                    <th class="text-center">Montant</th>
                                                    {{-- <th>Actions</th> --}}
                                            </thead>

                                            <tbody class="text-center">
                                                @foreach ($paiements as $paiement)
                                                    <tr>

                                                        <td class="align-middle">{{ $paiement->date }}</td>
                                                        <td class="align-middle">{{ $paiement->user }}</td>
                                                        <td class="align-middle">{{ $paiement->montant }} DA</td>

                                                    </tr>
                                                @endforeach

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ---------------------------------------------------------------------------------------------------------------------- --}}
    {{-- filtrage et calcul de revenu --}}
    <script>
        $(document).ready(function() {
            const date_debut = document.querySelector('#date-debut');
            const date_fin = document.querySelector('#date-fin');
            const table = $('#example').DataTable({
                processing: true,

                // scroller
                scrollCollapse: true,
                scroller: true,
                scrollY: 400,
                // ----------
                // dom: '<"buttons-container"lBfrtip>', 
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ], // Specify the options
                buttons: [],
                language: {
                    "lengthMenu": "Afficher _MENU_ éléments par page",
                    "zeroRecords": "Aucun enregistrement trouvé",
                    "info": "Page _PAGE_ sur _PAGES_",
                    "infoEmpty": "Aucun enregistrement disponible",
                    "infoFiltered": "(filtré de _MAX_ total des enregistrements)",
                    "search": "Rechercher :",
                    "paginate": {
                        "first": "Premier",
                        "last": "Dernier",
                        "next": "Suivant",
                        "previous": "Précédent"
                    }
                },
                initComplete: function() {
                    // Ajouter des styles personnalisés
                    $('.dataTables_length select').css('width',
                        '60px'); // ajustez la largeur selon vos besoins
                },
            });

            // Fonction pour convertir une chaîne de texte en objet Date
            function parseDate(input) {
                var parts = input.split('-');
                // Note : les mois sont 0-indexés
                return new Date(parts[0], parts[1] - 1, parts[2]);
            }

            // Fonction pour calculer le total des montants dans le tableau
            function calculerTotalMontant() {
                var total = 0;
                table.rows({
                    search: 'applied'
                }).every(function() {
                    var data = this.data();
                    // Extraction du montant de la troisième colonne (index 2)
                    var montant = parseFloat(data[2].replace(' DA', '').replace(',', ''));
                    total += montant;
                });
                return total.toFixed(2); // Renvoyer le total avec deux décimales
            }

            // Fonction pour mettre à jour le total affiché
            function mettreAJourTotal() {
                var total = calculerTotalMontant();
                $('#resultat').text(total + ' DA').css('color', 'green');
            }

            // Calculer et mettre à jour le total lors du chargement initial de la page
            mettreAJourTotal();

            // Définition de la fonction de filtrage personnalisée
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var date_debut_value = parseDate(date_debut.value);
                    var date_fin_value = parseDate(date_fin.value);
                    var date_paiement = parseDate(data[0]) || 0;

                    if (
                        (isNaN(date_debut_value) && isNaN(date_fin_value)) ||
                        (isNaN(date_debut_value) && date_paiement <= date_fin_value) ||
                        (date_fin_value <= date_paiement && isNaN(date_fin_value)) ||
                        (date_debut_value <= date_paiement && date_paiement <= date_fin_value)
                    ) {
                        return true;
                    }

                    return false;
                }
            );

            // Écouteurs d'événements pour redessiner le tableau lors de la modification des dates
            date_debut.addEventListener('input', function() {
                table.draw();
                mettreAJourTotal();
            });

            date_fin.addEventListener('input', function() {
                table.draw();
                mettreAJourTotal();
            });

            // Événement de redessin du tableau pour mettre à jour le total après le filtrage
            table.on('draw', function() {
                mettreAJourTotal();
            });
        });
    </script>


    {{-- ---------------------------------------------------------------------------------------------------------------------- --}}
    {{-- pour les graphes  --}}

    <script>
        // Écouteur d'événements pour le changement de type de graphe pour graphiqueTotalPaiementsJour
        document.getElementById('graphe1').addEventListener('change', function() {
            var selectedType = this.value;
            graphique.destroy(); // Destruction du graphique existant
            graphique = new Chart(ctx, {
                type: selectedType === '1' ? 'bar' : 'line',
                data: {
                    labels: dates,
                    datasets: [{
                        label: 'Total des paiements par jour',
                        data: totalPaiements,
                        backgroundColor: colors,
                        borderColor: colors,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        },
                        maintainAspectRatio: false,
                        responsive: true,
                        width: '100%',
                        height: '300'
                    }
                }
            });
            graphique.canvas.id = 'graphiqueTotalPaiementsJour'; // Attribution de l'ID

        });

        // Écouteur d'événements pour le changement de type de graphe pour graphiqueTotalPaiementsFormation
        document.getElementById('graphe2').addEventListener('change', function() {
            var selectedType = this.value;
            graphiqueFormation.destroy(); // Destruction du graphique existant
            graphiqueFormation = new Chart(ctxFormation, {
                type: selectedType === '1' ? 'doughnut' : 'bar',
                data: {
                    labels: formations,
                    datasets: [{
                        label: 'Revenus par formation',
                        data: totalPaiementsFormation,
                        backgroundColor: barColors,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        },
                        maintainAspectRatio: false,
                        responsive: true,
                        width: '100%',
                        height: '300'
                    }
                }
            });
            graphiqueFormation.canvas.id = 'graphiqueTotalPaiementsFormation'; // Attribution de l'ID

        });
    </script>


<style>
    #graphiqueTotalPaiementsFormation {
    height: 500px !important;
    text-align: center !important;
    /* width: 100% !important; */
}
    #graphiqueTotalPaiementsJour {
    height: 500px !important;
    width: 100% !important;
}
</style>



    {{-- footer  --}}
    <div class="container" id="pied-page">
    @endsection
