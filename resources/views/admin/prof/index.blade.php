@extends('layouts.admin_menu')
@section('content')


{{-- retour à l'acceuil  --}}
<div class="container" id="titre-page">
    <div class="row">
        <div class="col-2 d-flex align-items-center">
            <a href="{{ url('/admin/') }}" class="btn btn-dark"><i class="bi bi-house"></i><span class="btn-description">Acceuil</span></a>
        </div>
        <div class="col-10 d-flex align-items-center">
            <h2>Profésseurs</h2>
        </div>
    </div>
</div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">liste des Profs</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                    <thead>
                                        <th>N°</th>
                                        <th >sexe</th>
                                        <th >nom</th>
                                        <th >Prénom</th>
                        
                                        <th >Âge</th>
                                        <th >email</th>
                                        <th >tel</th>
                                        <th >specialite</th>
                                        
                                       
                                        <th >action</th>
                                    </thead>
            
                                    <tbody>
                                        @foreach($profs as $prof)
                    <tr>
                        <td>{{ $prof->id }}</td>
                        <td>{{ $prof->sexe }}</td>
                        <td>{{ $prof->nom }}</td>
                        <td>{{ $prof->prenom }}</td>
                    
                        <td>{{ $prof->age }}</td>
                        <td>{{ $prof->email }}</td>
                        <td>{{ $prof->tel }}</td>
                        <td>{{ $prof->specialite }}</td>
                       
                

                        <td>
                                            <div style="text-align: center;">
                                                <form  id="delete-form-{{ $prof->id }}" action="{{ url('/admin/prof/'.$prof->id.'/delete') }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <div class="bt-en-ligne">
                                                     <div class="bt-en-ligne-div">
                            
                                                     <!-- <button class="btn-mdf btn-r" id="btn-mdf-{{ $prof->id}}" type="button" onclick="window.location.href='{{ url('/admin/prof/'.$prof->id.'/edit') }}';"> -->
                                                     <button class="btnmdf"  style="background-color: #347df1;" id="btn-mdf-{{$prof->id}}" type="button">
                                                        <span class="text"></span>
                                                        <span class="icon">
                                                            <i class="bi bi-pen"></i>
                                                        </span>
                                                     </button>
           
                                                          <button  class="btnsup" style="background-color: #e82121"  id="btn-{{$prof->id}}" type="button">
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


                    <script>

                        //    <!-- script pour le button supprimer  -->

                           var bouton = document.getElementById("btn-{{ $prof->id }}");
                            bouton.addEventListener("click",function(){
                                const swalWithBootstrapButtons = Swal.mixin({
                                    customClass: {
                                        confirmButton: 'btn btn-success',
                                        cancelButton: 'btn btn-danger'
                                    },
                                    buttonsStyling: false
                                })
                                swalWithBootstrapButtons.fire({
                                    title: 'Vous êtes sûr  !   {{ $prof->nom}}',
                                    text: "Voulez-vous supprimer le prof: {{ $prof->nom}}",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: 'Supprimer!',
                                    cancelButtonText: 'Annuler!',
                                    reverseButtons: true
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Soumettre le formulaire de suppression
                                        var form = document.getElementById("delete-form-{{ $prof->id}}");
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

                           var boutonmdf = document.getElementById("btn-mdf-{{ $prof->id}}");
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
                                    text: "Voulez-vous faire modifier les information de le prof: {{ $prof->nom }}",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: 'OUI, Modifer!',
                                    cancelButtonText: 'NO, Annuler!',
                                    reverseButtons: true
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href="{{ url('/admin/prof/'.$prof->id.'/edit') }}"

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



{{-- footer  --}}
<div class="container" id="pied-page">

@endsection