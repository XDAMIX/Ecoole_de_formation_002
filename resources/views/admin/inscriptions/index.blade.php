@extends('layouts.admin_menu')
@section('content')


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Preinscriptin</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                    <thead>
                                        {{-- <th>N°</th>
                                        <th >Sexe</th> --}}
                                        <th >ID</th>
                                        <th >Nom</th>
                                        <th >Prénom</th>
                                        <th >Âge</th>
                                        <th >Wilaya</th>
                                        <th >Formation</th>
                                        <th >Tel</th>
                                        <th >email</th>
                                        {{-- <th >date</th> --}}
                                        {{-- <th >Contacté?</th>
                                        <th >Détails</th>
                                        <th >Date et Heure</th> --}}
                                        <th >Actions</th>
                                    </thead>
            
                                    <tbody>
                                        @foreach($inscriptions as $inscription)
                    <tr>
                        {{-- <td>{{ $inscription->id }}</td> --}}
                        {{-- <td style=" color: @if($inscription->sexe == 'Monsieur') Blue; @elseif($inscription->sexe == 'Mademoiselle') DeepPink;@elseif($inscription->sexe == 'Madame') DarkRed; @endif ">{{ $inscription->sexe }}</td> --}}
                        <td>{{ $inscription->id }}</td>
                        <td>{{ $inscription->nom }}</td>
                        <td>{{ $inscription->prenom }}</td>
                        <td>{{ $inscription->age }}</td>
                        <td>{{ $inscription->wilaya }}</td>
                        <td style="font-weight: bold;">{{ $inscription->formation }}</td>
                        <td>{{ $inscription->tel }}</td>
                        <td>{{ $inscription->email }}</td>
                        {{-- <td>{{ $inscription->date }}</td> --}}
                        {{-- <td style=" color: @if($inscription->contact == 0) red; @else green; @endif ">@if($inscription->contact == 0) NON @else OUI @endif</td>
                        <td style=" color: @if($inscription->details == 'Nouvelle-inscription') red; @else green; @endif ">{{ $inscription->details }}</td>
                        <!-- <td>{{ $inscription->created_at }}</td> -->
                        <td>{{ $inscription->date }}</td> --}}
                        <td>
                            <div   class="stylediv" style="text-align: center;">
                               
                                <form action="{{ url('/admin/inscriptions/'.$inscription->id.'/delete') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="stylediv">
                                            <a href="{{ url('/admin/inscriptions/'.$inscription->id.'/edit') }}" class="button-33" ><i class="bi bi-pen"></i></a>  
                                            {{-- <a href="{{ url('/admin/inscriptions/'.$inscription->id.'/edit') }}"  class="btn btn-primary btn-circle"><i class="fab fa-facebook-f"></i>Modifier</a>   --}}
                                    </div>
                                    <div class="stylediv">
                                            <button type="submit" onclick="return confirm('Êtes vous sure?')" class="button-33"><i class="bi bi-trash3"></i></button>
                                    </div>
                                    
                                    <div class="stylediv">
                                        <a href="{{ url('/admin/inscriptions/'.$inscription->id.'/valide') }}" class="button-33" ><i class="bi bi-pen"></i></a>  
                                </div>
                                </form>
                            </div>
                        </td>
                    </tr>
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
                                             'excel', 'pdf', 'print',
                                                                                {
                                                    extend: 'spacer',
                                                    style: 'bar',
                                                    text: 'les colon a afficher'
                                                },
                                            'colvis'
                                        ]
                                  

                                        
                                    } );
                                } );
                              

                                // showing colon

                                
2
3
4
5
6
7
8

                                </script>
                                

                            </div>
                        </div>
                    </div>

                </div>

                <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
                <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
                

                <!-- /.container-fluid -->


                <style>
          

/* CSS */
.button-33 {
    
  background-color: #c2fbd7;
  border-radius: 100px;
  box-shadow: rgba(44, 187, 99, .2) 0 -25px 18px -14px inset,rgba(44, 187, 99, .15) 0 1px 2px,rgba(44, 187, 99, .15) 0 2px 4px,rgba(44, 187, 99, .15) 0 4px 8px,rgba(44, 187, 99, .15) 0 8px 16px,rgba(44, 187, 99, .15) 0 16px 32px;
  color: green;
  cursor: pointer;
  display: inline-block;
  font-family: CerebriSans-Regular,-apple-system,system-ui,Roboto,sans-serif;
  padding: 7px 20px;
  text-align: center;
  text-decoration: none;
  transition: all 250ms;
  border: 0;
  font-size: 16px;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-33:hover {
  box-shadow: rgba(44,187,99,.35) 0 -25px 18px -14px inset,rgba(44,187,99,.25) 0 1px 2px,rgba(44,187,99,.25) 0 2px 4px,rgba(44,187,99,.25) 0 4px 8px,rgba(44,187,99,.25) 0 8px 16px,rgba(44,187,99,.25) 0 16px 32px;
  transform: scale(1.05) rotate(-1deg);
}

/* style de dive  */

.stylediv{
   
    display: inline-block;
        margin-right: 10px;
}
                </style>


    
@endsection
