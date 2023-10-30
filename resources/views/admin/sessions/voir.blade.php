@extends('layouts.admin_menu')
@section('content')




                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-4'">
                               <h1 class="m-0 font-weight-bold " style="text-align: center"> {{ $sessions->nom}}</h1>
                        </div>
                      
                        
                        <div class="card-header py-3 d-flex justify-content-between">

                            <h5 class="m-0 font-weight-bold "> <i class="bi bi-award  fa-2xl" style="color: rgb(244, 176, 94)"></i>  Formation  :  <span style="text-align: center;font-size: 20px" > {{ $sessions->formation}}</span></h5>
                           
                            <div >
                                @if ($sessions->statut == 'En attente')
                                <h5 style="text-align: center;font-size: 20px;color: #656972;" class="font-weight-bold "> <i class="fa-solid fa-stopwatch fa-bounce fa-2xl" style="color: #656972;"></i> {{ $sessions->statut}}</h5>
                                @elseif ($sessions->statut == 'En cours')
                                <h5 style="text-align: center;font-size: 20px;color: #297ce8;" class="font-weight-bold "><i class="fa-solid fa-spinner fa-spin fa-2xl " style="color: #297ce8;"></i> {{ $sessions->statut}}</h5>
                                @elseif ($sessions->statut == 'Termine')
                                 <h5 style="text-align: center;font-size: 20px;color: #e82121;" class="font-weight-bold "> <i class="fa-solid fa-ban fa-shake  fa-2xl" style="color: #e82121;"></i> {{ $sessions->statut}}</h5>
                                @endif
                            </div>

                        </div>


                        <div class="card-header py-3 ">
                            <h5 class="m-0 font-weight-bold "> <i class="fa-solid fa-chalkboard-user  fa-2xl"></i>  Prof  : <span style="text-align: center;font-size: 20px" class="font-weight-bold ">{{ $sessions->prof}}</span>  </h5>
                        </div>


                        <div class="card-header py-3  d-flex justify-content-between">
                    
                            
                            <h6 class="m-0 font-weight-bold "> <i class="fas fa-calendar-day fa-2xl" style="color: #347df1;"></i> Debut  :  <span style="color:#347df1; ">{{ $sessions->date_debut}}</span></h6>
                            <h6 class="m-0 font-weight-bold "><i class="fas fa-calendar-day fa-2xl" style="color: #e82121;"></i> Fin  : <span style="color:#e82121; ">{{ $sessions->date_fin}}</span></h6>
                        </div>




                            <div >
                                @if ($sessions->statut == 'En attente')
                                                         <div style="text-align: center">
                                                            <button  class="dmr" id="dmr"> 
                                                                Demmarer la session
                                                            </button>
                                                        </div>  
                                @elseif ($sessions->statut == 'En cours')
                                                           <div style="text-align: center" >
                                                                <button class="trm" id="trm"> 
                                                                    terminre la session
                                                                </button>
                                                            </div> 
                                @elseif ($sessions->statut == 'Termine')
                                                        <div style="text-align: center" >
                                                            <button class="fin" id="fin"> 
                                                                session terminé
                                                            </button>
                                                        </div>  
                                @endif
                            </div>
                 
                         
                        <div class="card-header py-4">
                            
                        </div>
                            <h3 style="text-align: center;margin: 3px;">Liste des candidats</h3>
                        
                      
                        <div class="card-body">
                            <div class="table-responsive" id="session-list">
                                <table class="table cell-border compact hover " id="example" width="100%" cellspacing="0">
                                    <thead>
                                       
                                        
                                        {{-- <th >ID</th> --}}
                                        <th >nom</th>
                                        <th >prenom</th>
                                        <th >age</th>

                                        <th >tel</th>
                                    
  
                                        <th >action</th>
                                    </thead>
            
                                    <tbody>
                                        @foreach($inscriptions as $inscription)
                    {{-- <tr class="ligne-session" style="cursor: pointer" data-session-id="{{ $session->id }}"> --}}
                    <tr class="" style="cursor: pointer" >
                       
                        {{-- <td>{{ $inscription->id }}</td> --}}
                        <td>{{ $inscription->nom }}</td>
                        <td>{{ $inscription->prenom }}</td>
                        <td>{{ $inscription->age }}</td>
                        <td>{{ $inscription->tel }}</td>
                    
                        
                        {{-- <td class="@if($session->statut == 'En attente') bg-secondary text-white @elseif($session->statut == 'En cours') bg-primary text-white @elseif($session->statut == 'Termine') bg-success text-white @endif">{{ $session->statut }}</td> --}}

                    
                       
                <td>

                        
                                            <div style="text-align: center;">
                                                <form  id="delete-form-{{ $inscription->id }}" action="{{ url('/admin/inscriptions/'.$inscription->id.'/sup_ins_sesion') }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="bt-en-ligne">
                                                     
                                                    <div class="bt-en-ligne-div"   id="mydiv">
                                                    
                                                     
                            
                                                     
                                                                                            {{-- BOUTON SUPPRIMER --}}
                                                     
                                                          <button class="btnsup" style="background-color: #e82121 ;" class="btn-mdf btn-r" id="btn-{{$inscription->id}}" type="button">
                                                                 <span class="text"></span>
                                                                 <span class="icon">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                 </span>
                                                         </button>
                                                     
                                                                                                {{-- BOUTON PRINT --}}

                                                                                                @if ($sessions->statut == 'Termine')
                                                                                                        <button class="btnmdf" style="background-color: #347df1" id="btn-mdf-{{$inscription->id}}" type="button">
                                                                                                            <span class="text"></span>
                                                                                                            <span class="icon">
                                                                                                                <i class="fa-solid fa-print"></i>   
                                                                                                            </span>
                                                                                                        </button>
                                                                                                    @endif

                                                    </div>
      
                                                 </div>
                                                  </form>
                                                </div>
                        </td>
                    </tr>



                    <script>
                         //    <!-- script pour le button termine la session   -->

         var boutontrm = document.getElementById("trm");
                           boutontrm.addEventListener("click",function(){
                                const swalWithBootstrapButtons = Swal.mixin({
                                    customClass: {
                                        confirmButton: 'btn btn-success ',
                                        cancelButton: 'btn btn-danger'
                                    },
                                    buttonsStyling: false
                                })
                                swalWithBootstrapButtons.fire({
                                    title: 'cloturer la sessionla  ',
                                    text: "Voulez-vous cloturer la session  : {{ $sessions->nom }} ",
                                    icon: 'question',
                                    showCancelButton: true,
                                    confirmButtonText: 'OUI',
                                    cancelButtonText: 'NO',
                                    reverseButtons: true
                                  
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        
                                       
                                       
                                        window.location.href="{{ url('/admin/session/'.$sessions->id.'/statutterm') }}"

                                    } else if (
                                        result.dismiss === Swal.DismissReason.cancel
                                    ) {

                                    }
                                })
                            });
                    </script>

                    <script>
                          
        //    <!-- script pour le button demmarer la session  -->

        var boutondmr = document.getElementById("dmr");
                           boutondmr.addEventListener("click",function(){
                                const swalWithBootstrapButtons = Swal.mixin({
                                    customClass: {
                                        confirmButton: 'btn btn-success ',
                                        cancelButton: 'btn btn-danger'
                                    },
                                    buttonsStyling: false
                                })
                                swalWithBootstrapButtons.fire({
                                    title: 'Demmarer la session ',
                                    text: "Voulez-vous Demmare la session  : {{ $sessions->nom }} ",
                                    icon: 'question',
                                    showCancelButton: true,
                                    confirmButtonText: 'OUI',
                                    cancelButtonText: 'NO',
                                    reverseButtons: true
                                  
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // window.location.href="{{ url('/admin/inscriptions/'.$inscription->id.'/imprime1') }}"
                                        window.location.href="{{ url('/admin/session/'.$sessions->id.'/statutcour') }}"

                                    } else if (
                                        result.dismiss === Swal.DismissReason.cancel
                                    ) {

                                    }
                                })
                            });

                    </script>

                    <script>

                        //    <!-- script pour le button supprimer  -->

                           var bouton = document.getElementById("btn-{{ $inscription->id }}");
                            bouton.addEventListener("click",function(){
                                const swalWithBootstrapButtons = Swal.mixin({
                                    customClass: {
                                        confirmButton: 'btn btn-success',
                                        cancelButton: 'btn btn-danger'
                                    },
                                    buttonsStyling: false
                                })
                                swalWithBootstrapButtons.fire({
                                    
                                    title: ' supprimer !',
                                    text: "Voulez-vous supprimer {{ $inscription->nom}} {{ $inscription->prenom}}  de la session : {{ $sessions->nom}}",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: 'Supprimer',
                                    cancelButtonText: 'Annuler',
                                    reverseButtons: true
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Soumettre le formulaire de suppression
                                        var form = document.getElementById("delete-form-{{ $inscription->id}}");
                                         form.submit();
                                        swalWithBootstrapButtons.fire(
                                            'Supprimer !',
                                            'le condidat {{ $inscription->nom }} {{ $inscription->prenom }}  a ete supprime de la session {{ $sessions->nom }}.',
                                            'success'
                                        )
                                    } else if (
                                        result.dismiss === Swal.DismissReason.cancel
                                    ) {
                                        swalWithBootstrapButtons.fire(
                                            'Cancelled',
                                            'Your file is safe :)',
                                            'error'
                                        )
                                    }
                                })
                            });
                        //    <!-- script pour le button imprimier diplome 1   -->

                           var boutonmdf = document.getElementById("btn-mdf-{{ $inscription->id}}");
                           boutonmdf.addEventListener("click",function(){
                                const swalWithBootstrapButtons = Swal.mixin({
                                    customClass: {
                                        confirmButton: 'btn btn-success ',
                                        cancelButton: 'btn btn-danger ml-2'
                                    },
                                    buttonsStyling: false
                                })
                                swalWithBootstrapButtons.fire({
                                    title: 'imprimer Deplome !',
                                    text: "Voulez-vous  imprimer  deplope pour  : {{ $inscription->nom }} {{ $inscription->prenom }}",
                                    icon: 'question',
                                    showCancelButton: true,
                                    confirmButtonText: 'OUI',
                                    cancelButtonText: 'NO',
                                    reverseButtons: true
                                  
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href="{{ url('/admin/inscriptions/'.$inscription->id.'/imprime1') }}"
                                    } else if (
                                        result.dismiss === Swal.DismissReason.cancel
                                    ) {

                                    }
                                })
                            });
 
      
                     </script>

@if(session('telechargertout'))
    <script>
        // Redirection JavaScript vers l'URL spécifiée
        window.location.href = "{{ url('/admin/inscriptions/'.$sessions->id.'/imprimertout') }}";
        setTimeout(function() {
            location.reload();
        }, 1000); 
    </script>
   
@endif



{{-- scrype pour le clic sur le tableau --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const lignesSession = document.querySelectorAll(".ligne-session");

        // Ajoutez un gestionnaire d'événements aux lignes de session
        lignesSession.forEach(function (ligne) {
            ligne.addEventListener("click", function () {
                // Récupérez l'ID de la session à partir de l'attribut data
                const sessionId = this.getAttribute("data-session-id");

                // Redirigez l'utilisateur vers la page souhaitée avec l'ID en paramètre
                window.location.href = "{{ url('/admin/session/'.$inscription->id.'/voir') }}?session_id=" + sessionId;
              
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
                                    // Script pour la barre de recherche, PDF, impression et Excel
                                    $(document).ready(function() {
                                        $('#example').DataTable( {
                                            dom: 'Bfrtip',
                                            buttons: [
                                             
                                                {
                                                    extend: 'excel',
                                                    text: '<span class="button-text"><i class="fa-solid fa-table"></i> Excel</span>',
                                                    className: 'button-centered'
                                                },
                                                {
                                                    extend: 'pdf',
                                                    text: '<span class="button-text"><i class="fa-solid fa-file-pdf"></i> PDF</span>',
                                                    className: 'button-centered'
                                                },
                                                {
                                                    extend: 'print',
                                                    text: '<span class="button-text">   <i class="fa-solid fa-print"></i>  Impression</span>',
                                                    className: 'button-centered'
                                                },
                                               
                                                
                                            ]
                                        } );
                                    } );
                                </script>
                                
                                <style>
                                    .button-text {
                                        font-weight: bold;
                                    }
                                
                                    .button-centered {
                                        text-align: center;
                                    }
                                </style>

                   


                            </div>
                        </div>
                    </div>

                </div>



                <!-- /.container-fluid -->







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

                                                    {{-- bouton  --}}
<style>

/*  le nouveu bouton  */

/* style pour le bouton demmarer le session */
.dmr {
  font-size: 18px;
  letter-spacing: 2px;
  text-transform: uppercase;
  display: inline-block;
  text-align: center;
  font-weight: bold;
  padding: 0.7em 2em;
  border: 3px solid mediumturquoise;
  border-radius: 2px;
  position: relative;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.1);
  color: mediumturquoise;
  text-decoration: none;
  transition: 0.3s ease all;
  z-index: 1;
  cursor: pointer;
}

.dmr:before {
  transition: 0.5s all ease;
  position: absolute;
  top: 0;
  left: 50%;
  right: 50%;
  bottom: 0;
  opacity: 0;
  content: '';
  background-color: lightblue;
  z-index: -1;
}

.dmr:hover, button:focus {
  color: white;
}

.dmr:hover:before, button:focus:before {
  transition: 0.5s all ease;
  left: 0;
  right: 0;
  opacity: 1;
}

.dmr:active {
  transform: scale(0.9);
}
                            /* style pour le bouton terminerl la session */
.trm {
  font-size: 18px;
  letter-spacing: 2px;
  text-transform: uppercase;
  display: inline-block;
  text-align: center;
  font-weight: bold;
  padding: 0.7em 2em;
  border: 3px solid #e82121;
  border-radius: 2px;
  position: relative;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.1);
  color: #e82121;
  text-decoration: none;
  transition: 0.3s ease all;
  z-index: 1;
  cursor: pointer;
}

.trm:before {
  transition: 0.5s all ease;
  position: absolute;
  top: 0;
  left: 50%;
  right: 50%;
  bottom: 0;
  opacity: 0;
  content: '';
  background-color: #eb8282;
  z-index: -1;
}

.trm:hover, button:focus {
  color: white;
}

.trm:hover:before, button:focus:before {
  transition: 0.5s all ease;
  left: 0;
  right: 0;
  opacity: 1;
}

.trm:active {
  transform: scale(0.9);
}
                            /* style pour bouton fin  */
.fin {
  font-size: 18px;
  letter-spacing: 2px;
  text-transform: uppercase;
  display: inline-block;
  text-align: center;
  font-weight: bold;
  padding: 0.7em 2em;
  border: 3px solid #353232;
  border-radius: 2px;
  position: relative;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.1);
  color: #353232;
  text-decoration: none;
  transition: 0.3s ease all;
  z-index: 1;
  cursor: pointer;
  background-color: gray
}

</style>
{{-- css pour le bouton modifer --}}
<style>
 .btnmdf{
 appearance: none;
 background-color: transparent;
 border: 0.125em solid #1A1A1A;
 border-radius: 0.9375em;
 box-sizing: border-box;
 color: #000000;
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
 color: #000000;
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



    {{-- scripte pour changer le bouton  --}}
    <script>
        let sessionStarted = false;
        
        function toggleSession() {
          const button = document.getElementById("sessionButton");
        
          if (sessionStarted) {
            // Si la session est déjà démarrée, on la termine
            sessionStarted = false;
            button.innerHTML = "Démarrer la session";
            button.style.backgroundColor = "#4CAF50";
          } else {
            // Si la session n'est pas encore démarrée, on la démarre
            sessionStarted = true;
            button.innerHTML = "Terminer la session";
            button.style.backgroundColor = "#FF5733";
          }
        }
        </script>
      
        </body>
        </html>       
                


@endsection