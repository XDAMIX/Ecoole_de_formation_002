@extends('layouts.admin_menu')
@section('content')


{{-- retour à l'acceuil  --}}
<div class="container" id="titre-page">
    <div class="row">
        <div class="col-2 d-flex align-items-center">
            <a href="{{ url('/admin/') }}" class="btn btn-dark"><i class="bi bi-house"></i><span class="btn-description">Acceuil</span></a>
        </div>
        <div class="col-10 d-flex align-items-center">
            <h2>Stagiaires</h2>
        </div>
    </div>
</div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">liste des etudiants</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                    <thead>
                                        {{-- <th>N°</th>    --}}
                                        {{-- <th >sexe</th> --}}
                                        <th >nom</th>
                                        <th >Prénom</th>
                    
                                        <th >Âge</th>
                                        <th >Wilaya</th>
                                        <th >email</th>
                                        <th >Tel</th>
                                        <th >profession</th>
                             
                                        <th >Action</th>
                                    </thead>
            
                                    <tbody>
                                        @foreach($etudiants as $etudiant)
                    <tr>
                        {{-- <td>{{ $etudiant->id }}</td> --}}
                        {{-- <td>{{ $etudiant->sexe }}</td> --}}
                        <td>{{ $etudiant->nom }}</td>
                        <td>{{ $etudiant->prenom }}</td>
                        <td>{{ $etudiant->age }}</td>
                        <td>{{ $etudiant->wilaya}}</td>
                        <td>{{ $etudiant->email}}</td>
                        <td>{{ $etudiant->tel}}</td>
                        <td>{{ $etudiant->profession}}</td>
                   

                        <td>
                                            <div style="text-align: center;">
                                                <form  id="delete-form-{{ $etudiant->id }}" action="{{ url('/admin/etudiant/'.$etudiant->id.'/delete') }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="bt-en-ligne">
                                                     <div class="bt-en-ligne-div">
                            
                                                     <!-- <button class="btn-mdf btn-r" id="btn-mdf-{{ $etudiant->id}}" type="button" onclick="window.location.href='{{ url('/admin/etudiant/'.$etudiant->id.'/edit') }}';"> -->
                                                     <button class="btn-mdf btn-r" id="btn-mdf-{{$etudiant->id}}" type="button">
                                                        <span class="text">Modifier</span>
                                                        <span class="icon">
                                                            <i class="bi bi-pen"></i>
                                                        </span>
                                                     </button>
                            
                                                     </div>
                            
                                                     <div class="bt-en-ligne-div"   id="mydiv">
                                                          <button class="btn-sup btn-r" id="btn-{{$etudiant->id}}" type="button">
                                                                 <span class="text">Supprimer</span>
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


                    <script>

                        //    <!-- script pour le button supprimer  -->

                           var bouton = document.getElementById("btn-{{ $etudiant->id }}");
                            bouton.addEventListener("click",function(){
                                const swalWithBootstrapButtons = Swal.mixin({
                                    customClass: {
                                        confirmButton: 'btn btn-success',
                                        cancelButton: 'btn btn-danger'
                                    },
                                    buttonsStyling: false
                                })
                                swalWithBootstrapButtons.fire({
                                    title: 'Vous êtes sûr  !   {{ $etudiant->nom}}',
                                    text: "Voulez-vous supprimer l'etudiant : {{ $etudiant->nom}}",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: 'Supprimer!',
                                    cancelButtonText: 'Annuler!',
                                    reverseButtons: true
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Soumettre le formulaire de suppression
                                        var form = document.getElementById("delete-form-{{ $etudiant->id}}");
                                         form.submit();
                                        swalWithBootstrapButtons.fire(
                                            'Deleted!',
                                            'Your file has been deleted.',
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
                        //    <!-- script pour le button modifer   -->

                           var boutonmdf = document.getElementById("btn-mdf-{{ $etudiant->id}}");
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
                                    text: "Voulez-vous faire modifier les information de l'étudiant: {{ $etudiant->nom }}",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: 'OUI, Modifer!',
                                    cancelButtonText: 'NO, Annuler!',
                                    reverseButtons: true
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href="{{ url('/admin/etudiant/'.$etudiant->id.'/edit') }}"

                                    } else if (
                                        result.dismiss === Swal.DismissReason.cancel
                                    ) {

                                    }
                                })
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
                                    $(document).ready(function() {
                                    $('#example').DataTable( {
                                        dom: 'Bfrtip',
                                        buttons: [
                                            'copy', 'csv', 'excel', 'pdf', 'print'
                                        ]
                                    } );
                                } );
                                </script>
                                

                            </div>
                        </div>
                    </div>

                </div>



                <!-- /.container-fluid -->






{{-- footer  --}}
<div class="container" id="pied-page">
    

@endsection