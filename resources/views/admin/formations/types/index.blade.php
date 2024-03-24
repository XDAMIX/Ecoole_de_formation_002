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
                <h2>type des paiements</h2>
            </div>
                        <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/types_p/nouveau') }}" class="btn btn-success"><i class="fa-solid fa-plus fa-beat-fade"></i><span
                        class="btn-description">Ajouter </span></a>
            </div>
        </div>
    </div>


            
                    <div class="card shadow col-6 ">
 
                        <div class="card-body" style="text-align: center">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                    <thead style="text-align: center">

                                        <th >ID</th>
                                        <th >titre</th>
                                        <th >Actions</th>
                                    </thead>
            
                                    <tbody>
                                        @foreach($types as $type)
                    <tr>
                        <td>{{ $type->id }}</td>
                        <td>{{ $type->titre }}</td>

                        <td>
                            <div    style="text-align: center;">
                               
                                <form action="{{ url('/admin/types_p/'.$type->id.'/delete') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="stylediv">
                                            <a href="{{ url('/admin/types_p/'.$type->id.'/edit') }}" class="button-33" ><i class="bi bi-pen"></i></a>  
                                          
                                    </div>
                                    <div class="stylediv">
                                            <button type="submit" onclick="return confirm('Êtes vous sure?')" class="button-33"><i class="bi bi-trash3"></i></button>
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
