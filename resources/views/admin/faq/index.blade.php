@extends('layouts.admin_menu')
@section('content')

<div class="container-fluid" style="padding-top: 10px;">

    <div class="row">
        <div class="col-md-12">
        <div class="head">
            <h3 style="text-transform: uppercase;">foire aux question</h3>
            <h5>liste des réponses sur les questions les plus posés</h5>


                <div class="d-grid gap-1 d-md-flex justify-content-md-end" style="margin-top: 10px;margin-bottom: 10px;">
                        <button class="button-add-new s-titre" onclick="window.location.href='/admin/faq/nouveau';">Ajouter une question  <i class="fa-sharp fa-solid fa-file-circle-plus hichem"></i></button>
                </div>
        </div>
        <hr>
        </div>
    </div>




    <div class="row " style="justify-content: center; align-items: center;">
        @foreach($questions as $question)
        <div class="col-md-4">


            <div class="carde">
                <div class="temporary_text">
                    <h6 style="text-align: center;">Question</h6>
                    <p class="carde_quistion">{{$question->question}}</p>
                </div>
                <div class="carde_content">
                    <!-- <span class="carde_title" style="text-align: center;">Repnse</span> -->
                    <h6 style="text-align: center;">Réponse</h6>
                    <!-- <span class="carde_subtitle">Thsi is a subtitle of this page. Let us see how it looks on the Web.</span> -->
                    <p class="carde_description"> {{$question->reponse}} </p>

                    <div style="text-align: center;">
                        <form id="delete-form-{{ $question->id }}" action="{{ url('/admin/faq/'.$question->id.'/delete') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="bt-en-ligne">
                                <div class="bt-en-ligne-div">


                         <button class="btn-mdf btn-r" id="btn-mdf-{{$question->id}}" type="button">
                            <span class="text">Modifier</span>
                            <span class="icon">
                                <i class="bi bi-pen"></i>
                            </span>
                        </button>

                         </div>

                         <div class="bt-en-ligne-div"   id="mydiv">
                              <button class="btn-sup btn-r" id="btn-{{$question->id}}" type="button">
                                     <span class="text">Supprimer</span>
                                     <span class="icon">
                                    <i class="bi bi-trash3"></i>
                                     </span>
                             </button>
                         </div>
                    </div>




                    </form>
                    </div>
                                        </div>
              </div>




            <script>

                                               //    <!-- script pour le button supprimer  -->

                                                  var bouton = document.getElementById("btn-{{$question->id}}");
                                                   bouton.addEventListener("click",function(){
                                                       const swalWithBootstrapButtons = Swal.mixin({
                                                           customClass: {
                                                               confirmButton: 'btn btn-success',
                                                               cancelButton: 'btn btn-danger'
                                                           },
                                                           buttonsStyling: false
                                                       })
                                                       swalWithBootstrapButtons.fire({
                                                           title: 'Vous êtes sûr ! ',
                                                           text: "Voulez-vous supprimer cette question  .? ",
                                                           icon: 'warning',
                                                           showCancelButton: true,
                                                           confirmButtonText: 'OUI, Supprimer!',
                                                           cancelButtonText: 'NO, Annuler!',
                                                           reverseButtons: true
                                                       }).then((result) => {
                                                           if (result.isConfirmed) {
                                                               // Soumettre le formulaire de suppression
                                                               var form = document.getElementById("delete-form-{{ $question->id }}");
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

                                                  var boutonmdf = document.getElementById("btn-mdf-{{ $question->id}}");
                                                  boutonmdf.addEventListener("click",function(){
                                                       const swalWithBootstrapButtons = Swal.mixin({
                                                           customClass: {
                                                               confirmButton: 'btn btn-success',
                                                               cancelButton: 'btn btn-danger'
                                                           },
                                                           buttonsStyling: false
                                                       })
                                                       swalWithBootstrapButtons.fire({
                                                           title: 'MODIFER !   {{ $question->id}}',
                                                           text: "Voulez-vous faire des modifcation ",
                                                           icon: 'warning',
                                                           showCancelButton: true,
                                                           confirmButtonText: 'OUI, Modifer!',
                                                           cancelButtonText: 'NO, Annuler!',
                                                           reverseButtons: true
                                                       }).then((result) => {
                                                           if (result.isConfirmed) {
                                                               window.location.href="{{ url('/admin/faq/'.$question->id.'/edit') }}"

                                                           } else if (
                                                               result.dismiss === Swal.DismissReason.cancel
                                                           ) {

                                                           }
                                                       })
                                                   });
                                               </script>


</div>
        @endforeach
    </div>
</div>

<!-- css pour la nouvelle structure  -->

<style>
    .carde {
        position: relative;
        /* width: 400px; */
        height: 250px;
        color: #2e2d31;
        background: purple;
        overflow: hidden;
        border-radius: 20px;
        margin: 5px;
        box-shadow: 5px 5px 5px 5px gray;
    }

    .carde_quistion {
        font-size: 14px;
        text-decoration: none;
        position: absolute;
        padding-top: 2px;
    }

    .carde:hover .carde_quistion {
        opacity: 1;
        transition-delay: .25s;
    }

    .temporary_text {
        /* font-weight: bold; */
        font-size: 24px;
        padding: 6px 12px;
        color: #f8f8f8;
    }

    .carde_title {
        font-weight: bold;
    }

    .carde_content {
        /* position: absolute; */
        left: 0;
        bottom: 0;
        /* edit the width to fit card */
        width: 100%;
        height: 100%;
        padding: 20px;
        background: #f2f2f2;
        border-top-left-radius: 20px;
        /* edit here to change the height of the content box */
        transform: translateY(150px);
        transition: transform .25s;
    }

    .carde_content::before {
        content: '';
        position: absolute;
        top: -47px;
        right: -45px;
        width: 100px;
        height: 100px;
        transform: rotate(-175deg);
        border-radius: 50%;
        box-shadow: inset 48px 48px #f2f2f2;
    }

    .carde_title {
        color: #131313;
        line-height: 15px;
    }

    .carde_subtitle {
        display: block;
        font-size: 12px;
        margin-bottom: 10px;
    }

    .carde_description {
        font-size: 14px;
        opacity: 0;
        transition: opacity .5s;
    }

    .carde:hover .carde_content {
        transform: translateY(0);
    }

    .carde:hover .carde_description {
        opacity: 1;
        transition-delay: .25s;
    }
</style>


<style>
    .head {
        text-align: center;
        color: var(--color5);
    }

    .carde {
        /* text-align: center;
        margin-bottom: 10px;
        background-color: white; */
    }

    .carde-body {
        padding: 10px;
    }

    label {
        font-weight: bold;
        text-transform: uppercase;
    }

    .buttons {
        padding: 10px;
        text-align: center;
    }

    .grid {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    grid-template-rows: repeat(3, auto);
    gap: 20px;
  }
</style>
{{-- new style  --}}

<style>
    
  /* boutton ajouter une formation */

.button-add-new {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  padding: 15px 38px;
  border-radius: 16px;
  border: 1px solid transparent;
  color: #FFFFFF;
  background-color: #1DC9A0;
  font-size: 20px;
  letter-spacing: 1px;
  transition: all 0.15s linear;
 }
 
 .button-add-new:hover {
  background-color: rgba(29, 201, 160, 0.08);
  border-color: #1DC9A0;
  color: #1DC9A0;
  transform: translateY(-5px) scale(1.05);
 }
 
 .button-add-new:active {
  background-color: transparent;
  border-color: #1DC9A0;
  color: #1DC9A0;
  transform: translateY(5px) scale(0.95);
 }
 
 .button-add-new:disabled {
  background-color: rgba(255, 255, 255, 0.16);
  color: #8E8E93;
  border-color: #8E8E93;
 }
 /* -------------------  fin  ------------- */

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
                              padding-top: 0px;
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
                                        padding-top: 0px;
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
