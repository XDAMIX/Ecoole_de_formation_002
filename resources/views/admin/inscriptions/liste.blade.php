@extends('layouts.admin_menu')
@section('content')




<div class="container" id="titre-page">
    <div class="row">
        <div class="col-2 d-flex align-items-center">
            <a href="{{ url('/admin/') }}" class="btn btn-dark"><i class="bi bi-house"></i><span class="btn-description">Acceuil</span></a>
        </div>
        <div class="col-10 d-flex align-items-center">
            <h2>Liste des inscriptions</h2>
        </div>
    </div>
</div>


{{-- javascript DataTables --}}




<script>
    $(document).ready(function() {
    $('#example').DataTable( {
        processing: true,
        dom: '<"buttons-container"lBfrtip>', // Custom button container
        lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ], // Specify the options
        buttons: [
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel"></i> Excel',
                        className: 'btn btn-dark'
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf"></i> PDF',
                        className: 'btn btn-dark'
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print"></i> Imprimer',
                        className: 'btn btn-dark'
                    },
                    {
                        extend: 'colvis',
                        text: '<i class="fas fa-columns"></i> Affichage des Colonnes',
                        className: 'btn btn-dark'
                    },
        ],
        columnDefs: [
            {
                targets: 1, // Assuming your date column is at index 0
                type: 'date-eu' // 'date-eu' is for European date format, adjust accordingly
            }
        ]                

        
    } );
} );

</script>

<style>
    .buttons-container {
        text-align: center;
        margin-top: 10px;
        margin-bottom: 10px;
        background-color: rgb(255, 255, 255);
    }
    #titre-page{
        margin-bottom: 20px;
    }
</style>


{{-- html  --}}
<div class="container-fluid" style="background-color: #ffff;padding-top:10px;padding-bottom:80px;">
    <div class="row">
        <div class="col-md-12">
            <table id="example" class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>id</th>
                        {{-- <th>Date</th> --}}
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Age</th>
                        <th>Wilaya</th>
                        {{-- <th>Profession</th> --}}
                        <th>Formation</th>
                        {{-- <th>Contacté</th> --}}
                        {{-- <th>Validé</th> --}}
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($inscriptions as $inscription)
                    <tr>
                        <td>{{ $inscription->id }}</td>
                        {{-- <td>{{ $inscription->created_at }}</td> --}}
                        <td>{{ $inscription->nom }}</td>
                        <td>{{ $inscription->prenom }}</td>
                        <td>{{ $inscription->age }}</td>
                        <td>{{ $inscription->wilaya }}</td>
                        {{-- <td>{{ $inscription->profession }}</td> --}}
                        <td style="font-weight: bold;">{{ $inscription->formation }}</td>
                        {{-- <td  style=" color: @if($inscription->contact == 0) red; @else green; @endif ">
                            @if($inscription->contact == 0) NON @else OUI @endif</td>

                        <td  style=" color: @if($inscription->contact == 0) red; @else green; @endif ">
                            @if($inscription->contact == 0) NON @else OUI @endif</td> --}}

                        <td>

                            <div class="container">
                               <div class="row">   

                                            <div class="col-4">
                                            <a href="{{ url('/admin/inscriptions/'.$inscription->id.'/edit') }}" class="btn btn-outline-primary alpa" ><i class="bi bi-pen"></i></a>                                    
                                            </div>

                                            <div class="col-4">
                                                <form action="{{ url('/admin/inscriptions/'.$inscription->id.'/delete') }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Êtes vous sure?')" class="btn btn-outline-danger alpa"><i class="bi bi-trash3"></i></button>
                                                    </form>
                                            </div>
                                            
                                            <div class="col-4">
                                                <a href="{{ url('/admin/inscriptions/'.$inscription->id.'/valide') }}" class="btn btn-outline-success alpa" ><i class="bi bi-mortarboard"></i></a>  
                                            </div>

                               </div>
                            </div>


                        </td>
                    </tr>
                    @endforeach
                    
                    
                </tbody>

                <tfoot>
                    <tr>
                        <th>id</th>
                        {{-- <th>Date</th> --}}
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Age</th>
                        <th>Wilaya</th>
                        {{-- <th>Profession</th> --}}
                        <th>Formation</th>
                        {{-- <th>Contacté</th> --}}
                        {{-- <th>Validé</th> --}}
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<div class="container" id="pied-page">

@endsection