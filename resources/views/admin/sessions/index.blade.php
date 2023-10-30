@extends('layouts.admin_menu')
@section('content')



                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 style="font-size: 25px;text-align: center">Liste des sessions</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" id="session-list">
                                <table class="table cell-border compact hover " id="example" width="100%" cellspacing="0">
                                    <thead>
                                       
                                        
                                        <th >ID</th>
                                        <th >nom</th>
                                        <th >prof</th>
                                        <th >formtion</th>

                                        <th >date debut</th>
                                        <th >date fin</th>
                                        <th >staut</th>
                                       
                                        
                                       
                                        <th >action</th>
                                    </thead>
            
                                    <tbody>
             @foreach($sessions as $session)
                    <tr class="ligne-session" style="cursor: pointer" data-session-id="{{ $session->id }}">
                       
                        <td>{{ $session->id }}</td>
                        <td>{{ $session->nom }}</td>
                        <td>{{ $session->prof }}</td>
                        <td>{{ $session->formation }}</td>
                    
                        <td>{{ $session->date_debut }}</td>
                        <td>{{ $session->date_fin }}</td>
                        {{-- <td>{{ $session->statut }}</td> --}}

                        {{-- <td style=" color: @if($session->statut == 'En attente') bg-secondary text-white; @elseif($session->statut == 'En cours') bg-primary text-white; @elseif($session->statut == 'Termine') bg-success text-white; @endif ">{{ $session->statut }}</td> --}}
                        <td class="@if($session->statut == 'En attente') bg-secondary text-white @elseif($session->statut == 'En cours') bg-primary text-white @elseif($session->statut == 'Termine') bg-danger text-white @endif"  class="action-column">{{ $session->statut }}</td>

                    
                       
                <td class="action-column">

                        
                                            <div style="text-align: center;">
                                                <form  id="delete-form-{{ $session->id }}" action="{{ url('/admin/session/'.$session->id.'/delete') }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="bt-en-ligne">
                                                     <div class="bt-en-ligne-div">
                            
                                                    
                                                     <button class="btnmdf"  style="background-color: #347df1;" id="btn-mdf-{{$session->id}}" type="button">
                                                        <span class="text"></span>
                                                        <span class="icon">
                                                            <i class="bi bi-pen"></i>
                                                        </span>
                                                     </button>
                            
                                                    
                                                          <button class="btnsup" style="background-color: #e82121" id="btn-{{$session->id}}" type="button">
                                                                 <span class="text"></span>
                                                                 <span class="icon">
                                                                <i class="bi bi-trash3"></i>
                                                                 </span>
                                                         </button>
                                                     </div>

                                                 </div>
                            
                            
                            
                            
                                                  </form>
                                            </div>
                        </td>
                    </tr>


{{-- scrype pour le clic sur le tableau --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var lignesSession = document.querySelectorAll(".ligne-session");

        // Ajoutez un gestionnaire d'événements aux lignes de session
        lignesSession.forEach(function (ligne) {
            ligne.addEventListener("click", function (event) {
                // Vérifiez si l'élément cliqué n'est pas dans la colonne d'action
                if (!event.target.closest(".action-column")) {
                    // Si l'élément cliqué n'est pas dans la colonne d'action, alors redirigez l'utilisateur
                    // Récupérez l'ID de la session à partir de l'attribut data
                    const sessionId = this.getAttribute("data-session-id");

                    // Redirigez l'utilisateur vers la page "Voir Session" avec l'ID en paramètre
                    window.location.href = "{{ url('/admin/session/voir') }}/" + sessionId;
                }
            });
        });
    });
</script>





                    <script>

                        //    <!-- script pour le button supprimer  -->

                           var bouton = document.getElementById("btn-{{ $session->id }}");
                            bouton.addEventListener("click",function(){
                                const swalWithBootstrapButtons = Swal.mixin({
                                    customClass: {
                                        confirmButton: 'btn btn-success',
                                        cancelButton: 'btn btn-danger'
                                    },
                                    buttonsStyling: false
                                })
                                swalWithBootstrapButtons.fire({
                                    title: 'Vous êtes sûr  !   {{ $session->nom}}',
                                    text: "Voulez-vous supprimer la session : {{ $session->nom}}",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: 'Supprimer!',
                                    cancelButtonText: 'Annuler!',
                                    reverseButtons: true
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Soumettre le formulaire de suppression
                                        var form = document.getElementById("delete-form-{{ $session->id}}");
                                         form.submit();
                                        swalWithBootstrapButtons.fire(
                                            'Supprimer !',
                                            'Votre session  {{ $session->nom }}  a ete supprime.',
                                            'success'
                                        )
                                    } else if (
                                        result.dismiss === Swal.DismissReason.cancel
                                    ) {
                                      
                                    }
                                })
                            });
                        //    <!-- script pour le button modifer   -->

                           var boutonmdf = document.getElementById("btn-mdf-{{ $session->id}}");
                           boutonmdf.addEventListener("click",function(){
                                const swalWithBootstrapButtons = Swal.mixin({
                                    customClass: {
                                        confirmButton: 'btn btn-success',
                                        cancelButton: 'btn btn-danger'
                                    },
                                    buttonsStyling: false
                                })
                                swalWithBootstrapButtons.fire({
                                    title: 'MODIFER !',
                                    text: "Voulez-vous  modifier la session : {{ $session->nom }}",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: 'OUI, Modifer!',
                                    cancelButtonText: 'NO, Annuler!',
                                    reverseButtons: true
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href="{{ url('/admin/session/'.$session->id.'/edit') }}"

                                    } else if (
                                        result.dismiss === Swal.DismissReason.cancel
                                    ) {

                                    }
                                })
                            });
                        //    <!-- script pour le button statut   -->
                        var boutonmdf = document.getElementById("btn-statut-{{ $session->id}}");
boutonmdf.addEventListener("click", function () {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger',
        },
        buttonsStyling: false,
    });

    swalWithBootstrapButtons
        .fire({
            title: 'STATUT de session {{ $session->nom }}',
            text: "Choisissez le statut de la session : {{ $session->nom }}",
            icon: 'warning',
            showCancelButton: true, // Ne pas afficher le bouton "Annuler"
            showConfirmButton:false,
            confirmButtonText: 'confirme',
            confirmButtonColor: '#6c757d', // Couleur personnalisée pour le bouton "En Attente"
            reverseButtons: true,
            focusConfirm: false, // N'active pas le bouton automatiquement
            html: `
                <button id="btn-attente" class="btn btn-secondary">En Attente</button>
                <button id="btn-cours" class="btn btn-primary">En Cours</button>
                <button id="btn-termine" class="btn btn-success">Terminé</button>
            `,
        })
        .then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ url('/admin/session/'.$session->id.'/statutatt') }}?status=attente";
                
            } else if (result.dismiss === Swal.DismissReason.close) {
                // L'utilisateur a fermé la boîte de dialogue
            }
        });

    // Ajouter des écouteurs d'événements aux boutons personnalisés
    const btnAttente = document.getElementById("btn-attente");
    btnAttente.addEventListener("click", function () {
        window.location.href = "{{ url('/admin/session/'.$session->id.'/statutatt') }}";
    });

    const btnCours = document.getElementById("btn-cours");
    btnCours.addEventListener("click", function () {
        window.location.href = "{{ url('/admin/session/'.$session->id.'/statutcour') }}";
    });

    const btnTermine = document.getElementById("btn-termine");
    btnTermine.addEventListener("click", function () {
        window.location.href = "{{ url('/admin/session/'.$session->id.'/statutterm') }}";
    });
});




function getColorClass($statut) {
    switch ($statut) {
        case 'En Attente':
            return 'bg-secondary text-white'; // Gris
        case 'En Cours':
            return 'bg-primary text-white';   // Bleu
        case 'Terminé':
            return 'bg-success text-white';  // Vert
        default:
            return 'bg-secondary text-white'; // Par défaut, utilisez la classe "bg-secondary"
    }
}


                        </script>






<!-- Ajoutez le code JavaScript après la création de la table -->

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Sélectionnez toutes les cellules de la colonne "Action" ayant la classe "btn-mdf"
        const actionCells = document.querySelectorAll(".btn-mdf");

        // Parcourez les cellules et empêchez le clic
        actionCells.forEach(function (cell) {
            cell.addEventListener("click", function (event) {
                // Empêchez le déclenchement de l'événement de clic
                event.stopPropagation();
            });
        });
    });
</script>






                        
                    @endforeach
                                    </tbody>
                                </table>


                                <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
                                <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
                                <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
                                <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
                                <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
                                <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
                                <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
                                <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
                                
 
                                <script>
                                    // scrypte pour bare de recherche et pdf print et excel
                                    $(document).ready(function() {
                                    $('#example').DataTable( {
                                        dom: 'Bfrtip',
                                        buttons: [
                                            'excel', 'pdf', 'print'
                                        ]
                                    } );
                                } );
                                </script>

                   


                            </div>
                        </div>
                    </div>

                </div>



                <!-- /.container-fluid -->


            {{-- css pour le bouton modifer --}}
            <style>
             .btnmdf{
             appearance: none;
             background-color: transparent;
             border: 0.125em solid #1A1A1A;
             border-radius: 0.9375em;
             box-sizing: border-box;
             color: #090606;
             cursor: pointer;
             display: inline-block;
             font-family: Roobert,-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
             font-size: 16px;
             font-weight: 600;
             line-height: normal;
             margin: 0;
             min-height: 1em;
             min-width: 0;
             outline: none;
             padding: 0.5em ;
             text-align: center;
             text-decoration: none;
             transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
             user-select: none;
             -webkit-user-select: none;
             touch-action: manipulation;
             will-change: transform;
            
            }
            
            .btnmdf:disabled {
             pointer-events: none;
            }
            
            .btnmdf:hover {
             color: #fff;
             background-color: #1A1A1A;
             box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
             transform: translateY(-2px);
            }
            
            .btnmdf:active {
             box-shadow: none;
             transform: translateY(0);
            }
            </style>
            
            {{-- style pour le bouton supprimer  --}}
            <style>
                .btnsup{
                    appearance: none;
             background-color: transparent;
             border: 0.125em solid #1A1A1A;
             border-radius: 0.9375em;
             box-sizing: border-box;
             color: #070707;
             cursor: pointer;
             display: inline-block;
             font-family: Roobert,-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
             font-size: 16px;
             font-weight: 600;
             line-height: normal;
             margin: 0;
             min-height: 1em;
             min-width: 0;
             outline: none;
             padding: 0.5em ;
             text-align: center;
             text-decoration: none;
             transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
             user-select: none;
             -webkit-user-select: none;
             touch-action: manipulation;
             will-change: transform;
            }
            
            .btnsup:disabled {
             pointer-events: none;
            }
            
            .btnsup:hover {
             color: #fff;
             background-color: #1A1A1A;
             box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
             transform: translateY(-2px);
            }
            
            .btnsup:active {
             box-shadow: none;
             transform: translateY(0);
            }
            </style>





<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Obtenez l'URL actuelle de la page
        const currentPageUrl = window.location.href;
    
        // Restaurer la position de défilement stockée en tant que cookie
        const scrollPosition = parseInt(localStorage.getItem(currentPageUrl) || 0);
        window.scrollTo(0, scrollPosition);
    
        // Enregistrer la position de défilement lorsque la page est défilée
        window.addEventListener("scroll", function () {
            const currentPosition = window.pageYOffset;
            localStorage.setItem(currentPageUrl, currentPosition);
        });
    });
    </script>
    
                    
                


@endsection