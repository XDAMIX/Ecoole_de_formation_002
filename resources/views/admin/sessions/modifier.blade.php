@extends('layouts.admin_menu')
@section('content')
<div class="divepo">
{{-- new style --}}
<form class="form" action="{{ url('/admin/session/'.$session->id.'/update') }}"id="enr-form" method="POST" enctype="multipart/form-data">
    <h1 class="title">Modifer la session <span style="font-weight: bold;">{{$session->nom}}</span></h1>
    
    @csrf
    @method('PUT')




    <label for="nom" style="color: rgb(14, 10, 10) ; font-size: 20px;font-weight: bold">Nom de la session</label>
    <div class="divepo">
        <input type="text" class="input" id="nom" name="nom" value="{{$session->nom}}" required>
    </div>
    <br>

    {{-- formtion avec boucle --}}
    <label  style="color: rgb(14, 10, 10) ; font-size: 20px;font-weight: bold" for="formation">Choisir une formation</label>
    <div class="col form-group">
        <select class="form-control" style="text-align: center;font-size: 15px;font-weight: bold" name="formation">
            <option style="color: white;background-color: #515969" value="{{ $session->formation }}" >{{ $session->formation }}</option>
        @foreach($formations as $formation)
        <option value="{{ $formation->titre }}">{{ $formation->titre }}</option>
        @endforeach
        </select>
        </div>
        <br>
        {{-- fin  --}}
        {{-- prof avec boucle --}}
        <label style="color: rgb(14, 10, 10) ; font-size: 20px;font-weight: bold" for="prof">Choisir un prof</label>
        <div class="col form-group" >
        <select class="form-control" style="text-align: center;font-size: 15px;font-weight: bold" name="prof">
            <option style="color: white;background-color: #515969" value="{{ $session->prof }}" >{{ $session->prof }}</option>
            @foreach($profs as $prof)
        <option value="{{ $prof->nom }} {{ $prof->prenom }}">{{ $prof->nom }} {{ $prof->prenom }}</option>
        @endforeach
        </select>
        </div>
        <br>
        {{-- fin  --}}
   
{{-- nouveaux bouton  --}}
    
        <div class="bt-en-ligne">
             <div class="bt-en-ligne-div">

          
             <button class="btn-mdf btn-r" id="btn-mdf" type="button">
                <span class="text">Modifier</span>
                <span class="icon">
                    <i class="bi bi-pen"></i>
                </span>
             </button>

             </div>

             <div class="bt-en-ligne-div"   id="mydiv">
                  <button class="btn-sup btn-r" id="btn_annuler" type="button">
                         <span class="text" >Annuler</span>
                         <span class="icon">
                                     <i class="bi bi-trash3"></i>
                         </span>
                 </button>
             </div>
         </div>


{{-- fin nouveau bouton  --}}

   


  </form>
</div>
{{-- fin new style --}}



<script>

    //    <!-- script pour le button Annuler  -->

       var bouton = document.getElementById("btn_annuler");
        bouton.addEventListener("click",function(){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Annuler ! ',
                text: "Voulez-vous Annuler  ",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'NO',
                confirmButtonText: 'OUI',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href="{{ url('/admin/session') }}"
                    
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                   
                }
            })
        });
    //    <!-- script pour le button modifer   -->

       var boutonmdf = document.getElementById("btn-mdf");
       boutonmdf.addEventListener("click",function(){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'MODIFER ! ',
                text: "Voulez-vous enregistrer les modification ..?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'OUI, Enregistrer',
                cancelButtonText: 'NO, Annuler',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Soumettre le formulaire de suppression
                    var form = document.getElementById("enr-form");
                                                             form.submit();
                                                            // swalWithBootstrapButtons.fire(
                                                            //     'modification enregistrée ',
                                                            //     'La session a été modifiée avec succès.',
                                                            //     'success'
                                                            // )

                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {

                }
            })
        });
    </script>







      <style>
        .form {
  max-width: 500px;
  width: 100%;
  background-color: #fff;
  padding: 10px;
  box-shadow: 0px 0px 0px 4px rgba(52, 52, 53, 0.185);
  display: flex;
  flex-direction: column;
  border-radius: 10px;
 
}

.title {
  text-align: center;
  font-size: 2rem;
  margin-bottom: 20px;
  color: #1a202c;
}

.label {
  color: rgb(0, 0, 0);
  margin-bottom: 4px;
}

.input {
  padding: 5px;
  /* margin-bottom: 3px; */
  width: 80%;
  font-size: 1.5rem;
  color: #4a5568;
  outline: none;
  border: 1px solid transparent;
  border-radius: 4px;
  transition: all 0.2s ease-in-out;
  text-align: center;


}

.input:focus {
  background-color: #fff;
  box-shadow: 0 0 0 2px #cbd5e0;
}

.input:valid {
  border: 1px solid green;
}

.input:invalid {
  border: 1px solid rgba(14, 14, 14, 0.205);
}

.submit {
  background-color: #1a202c;
  color: #fff;
  border: none;
  border-radius: 4px;
  padding: 10px 20px;
  font-size: 1.2rem;
  cursor: pointer;
  transition: all 0.2s ease-in-out;
}
    
    
    .divepo{
        display: flex;
        justify-content: center;
        align-items: center;
        /* height: 100vh; 100% de la hauteur de la vue */
        margin: 0;
    }


    /* boutton modifier / ajouter  */

   /* button modifer */

   .btn-mdf {
                              width: 150px;
                              height: 50px;
                              cursor: pointer;
                              display: flex;
                              align-items: center;
                              background: #5EB1FD;
                              border: none;
                              border-radius: 10px;
                              box-shadow: 1px 1px 3px rgba(0,0,0,0.15);
                              background:#3165F6;
                              white-space: nowrap; 
                              
                            }
                            .in{
                              position: absolute;
                              bottom: 0;
                              left: 0;
                              width: 100%;
                              padding: 10px;
                              
                            }
                            
                            .btn-mdf span {
                              transition: 200ms;
                            }
                            
                            .btn-mdf .text {
                              transform: translateX(20px);
                              color: white;
                              font-weight: bold;
                              text-align: center;
                            }

                            
                            .btn-mdf .icon {
                              position: absolute;
                              /* border-left: 1px solid #5EB1FD; */
                              transform: translateX(110px);
                              height: 40px;
                              width: 40px;
                              display: flex;
                              align-items: center;
                              justify-content: center;
                              /* padding-top: 70px; */
                            }
                            
                            .btn-mdf .i {
                              /* width: 15px; */
                              fill: #eee;
                            }
                            
                            .btn-mdf:hover {
                              background: #5EB1FD;
                            }
                            
                            .btn-mdf:hover .text {
                              color: transparent;
                            }
                            
                            .btn-mdf:hover .icon {
                              width: 150px;
                              border-left: none;
                              transform: translateX(0);
                            }
                            
                            .btn-mdf:focus {
                              outline: none;
                            }
                            
                            .btn-mdf:active .icon svg {
                              transform: scale(0.8);
                            }

                            /* -------fin mdf------ */
                              /* button supprimer */


                              .btn-sup {
                                        width: 150px;
                                        height: 50px;
                                        cursor: pointer;
                                        display: flex;
                                        align-items: center;
                                        background: red;
                                        border: none;
                                        border-radius: 10px;
                                        box-shadow: 1px 1px 3px rgba(0,0,0,0.15);
                                        background:#e62222;
                                        white-space: nowrap;  

                                                                          
                                      }
                                      
                                       
                                      .btn-sup span {
                                        transition: 200ms;
                                    
                                        
                                       }
                                       
                                       .btn-sup .text {
                                        transform: translateX(20px);
                                        color: white;
                                        font-weight: bold;
                                        text-align: center;
                           
                                       }
                                      
                                       
                                       .btn-sup .icon {
                                        position: absolute;
                                        /* border-left: 1px solid #5EB1FD; */
                                        transform: translateX(110px);
                                        height: 40px;
                                        width: 40px;
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;
                                        /* padding-top: 70px; */
                                       }
                                       
                                       .btn-sup .i {
                                        /* width: 15px; */
                                        fill: #eee;
                                       
                                       }
                                       
                                       .btn-sup:hover {
                                        background: #ff3636;
                                       }
                                       
                                       .btn-sup:hover .text {
                                        color: transparent;
                                       }
                                       
                                       .btn-sup:hover .icon {
                                        width: 150px;
                                        border-left: none;
                                        transform: translateX(0);
                                       }
                                       
                                       .btn-sup:focus {
                                        outline: none;
                                       }
                                       
                                       .btn-sup:active .icon svg {
                                        transform: scale(0.8);
                                       }
                                       /* fin btn sup */

                                                                                       /* aligniement de bouton sur les div  */
 .bt-en-ligne{

display: flex;

justify-content: center;
/* position: fixed; */
bottom: 0;
left: 0;
right: 0;
margin: auto;
}
.bt-en-ligne-div{
margin: 1%;
}

/* fin */


      </style>
      @endsection