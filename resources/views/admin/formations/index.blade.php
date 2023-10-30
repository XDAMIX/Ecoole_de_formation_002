@extends('layouts.admin_menu')
@section('content')

<div class="container" style="padding-top: 10px;">

    <div class="head">
        <h3 style="text-transform: uppercase;">liste des formations</h3>
    </div>

    <div class="d-grid gap-1 d-md-flex justify-content-md-end" style="margin-top: 10px;margin-bottom: 10px;">
        <!-- <a href="{{ url('/admin/formation/nouveau') }}" class="btn btn-success">Ajouter</a> -->
        <button class="button-add-new s-titre" onclick="window.location.href='/admin/formation/nouveau';">Ajouter une formation  <i class="fa-sharp fa-solid fa-file-circle-plus hichem"></i></button>
    </div>


        <div class="row ">
                        @foreach($formations as $formation)
                    <div class="flip-card ">
                <div class="flip-card-inner">
                    <div class="flip-card-front image_size" style="background-image: url({{asset('storage/' .$formation->photo ) }}) ;">
                        <div class="opa">

                            <div class="formation-titel" >
                                  <h3> {{ $formation->titre }}</h3>
                            </div>

                        </div>
                        <div class="dure">
                           <h3> Duré : {{ $formation->dure }}</h3>
                           </div>
                        </div>
                    <div class="flip-card-back">

                                <div class="accordion-card-wrapper ">
                                    <div class="accordion-card">
                                        <input  class="input-card" type="radio" name="radio-a" id="{{ $formation->description }}1" checked>
                                        <label class="accordion-card-label s-titre" for="{{ $formation->description }}1"> <h4 class="s-titre">Description: </h4> </label>
                                        <div class="accordion-card-content">
                                          <p class="texte">{{ $formation->description }}</p>
                                        </div>
                                    </div>
                                    <div class="accordion-card">
                                        <input  class="input-card"  type="radio" name="radio-a" id="{{ $formation->description }}2">
                                        <label class="accordion-card-label s-titre" for="{{ $formation->description }}2">  <h4 class="s-titre">Publique conçerné:</h4>  </label>
                                        <div class="accordion-card-content">
                                        <p class="texte">{{ $formation->publique }}</p>
                                        </div>
                                    </div>
                                    <div class="accordion-card">
                                        <input class="input-card"  type="radio" name="radio-a" id="{{ $formation->description }}3">
                                        <label class="accordion-card-label s-titre" for="{{ $formation->description }}3"> <h4 class="s-titre">Objectifs:</h4>  </label>
                                        <div class="accordion-card-content">
                                          <p class="texte">{{ $formation->objectifs }}</p>
                                        </div>
                                    </div>
                                    </div>


             <div style="text-align: center;">
                    <form  id="delete-form-{{ $formation->id }}" action="{{ url('/admin/formation/'.$formation->id.'/delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="bt-en-ligne">
                         <div class="bt-en-ligne-div">

                         <!-- <button class="btn-mdf btn-r" id="btn-mdf-{{ $formation->id}}" type="button" onclick="window.location.href='{{ url('/admin/formation/'.$formation->id.'/edit') }}';"> -->
                         <button class="btn-mdf btn-r" id="btn-mdf-{{ $formation->id}}" type="button">
                            <span class="text">Modifier</span>
                            <span class="icon">
                                <i class="bi bi-pen"></i>
                            </span>
                         </button>

                         </div>

                         <div class="bt-en-ligne-div"   id="mydiv">
                              <button class="btn-sup btn-r" id="btn-{{ $formation->id}}" type="button">
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
        </div>





              <script>

                                            //    <!-- script pour le button supprimer  -->

                                               var bouton = document.getElementById("btn-{{ $formation->id }}");
                                                bouton.addEventListener("click",function(){
                                                    const swalWithBootstrapButtons = Swal.mixin({
                                                        customClass: {
                                                            confirmButton: 'btn btn-success',
                                                            cancelButton: 'btn btn-danger'
                                                        },
                                                        buttonsStyling: false
                                                    })
                                                    swalWithBootstrapButtons.fire({
                                                        title: 'Vous êtes sûr !   {{ $formation->id}}',
                                                        text: "Voulez-vous supprimer la formation : {{ $formation->titre }}",
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonText: 'OUI, Supprimer!',
                                                        cancelButtonText: 'NO, Annuler!',
                                                        reverseButtons: true
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            // Soumettre le formulaire de suppression
                                                            var form = document.getElementById("delete-form-{{ $formation->id }}");
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

                                               var boutonmdf = document.getElementById("btn-mdf-{{ $formation->id}}");
                                               boutonmdf.addEventListener("click",function(){
                                                    const swalWithBootstrapButtons = Swal.mixin({
                                                        customClass: {
                                                            confirmButton: 'btn btn-success',
                                                            cancelButton: 'btn btn-danger'
                                                        },
                                                        buttonsStyling: false
                                                    })
                                                    swalWithBootstrapButtons.fire({
                                                        title: 'MODIFER !   {{ $formation->id}}',
                                                        text: "Voulez-vous faire des modifcation sur la formation : {{ $formation->titre }}",
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonText: 'OUI, Modifer!',
                                                        cancelButtonText: 'NO, Annuler!',
                                                        reverseButtons: true
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            window.location.href="{{ url('/admin/formation/'.$formation->id.'/edit') }}"

                                                        } else if (
                                                            result.dismiss === Swal.DismissReason.cancel
                                                        ) {

                                                        }
                                                    })
                                                });
                                            </script>


        @endforeach


        <!-- <button id="okok">silver</button> -->
    </div>




</div>

<style>
    label{
        text-transform: uppercase;
        font-weight: bold;
    }
    h3{
        padding: 10px;
        color: var(--color5);
    }
    .head{
        text-align: center;
        color: var(--color5);
    }
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
 /* flip card  */

 .flip-card {
  background-color: transparent;
  width: 340px;
  height: 500px;
  perspective: 1000px;
  font-family: sans-serif;
  padding-bottom: 1%; 
  
 
}

.title {
  font-size: 1.5em;
  font-weight: 900;
  text-align: center;
  margin: 0;
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
  border-radius: 20px;
  
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  display: flex;
  flex-direction: column;
  justify-content: center;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  /* border: 3px solid #541AE5; */
  border-radius: 1rem;
  box-shadow: 10px 5px 10px 5px gray;
  /* box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset; */
}

.flip-card-front {
  background: linear-gradient(120deg, bisque 60%, rgb(255, 231, 222) 88%,
     rgb(255, 211, 195) 40%, rgba(255, 127, 80, 0.603) 48%);
  color: coral;


}

.flip-card-back {
  padding: 5px;
  background: linear-gradient(120deg, #3E40AD 30%, #15145F 88%);
  color: white;
  transform: rotateY(180deg);


}
.flip-card-back i {
  color: white;
  width: 200px;
  height: 100px;
}

.flip-card-back h3 {
    font-size: 14px;
}
 

/* opacite div */
.opa {
   /* background-color: white; */
   background-color: rgba(255, 255, 255, 0.5); 
   /* opacity: 0.5; */
   height: 50%;
   vertical-align: auto;
   display: flex;
   justify-content: center;
   align-items: center; 
   
}
.formation-titel h3{
  color: black;
  opacity: inherit; 
}
.image_size{
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  padding: 1%;
}
.dure{
  background-color: rgba(255, 255, 255, 0.5); 
  float: left;
  display: flex;
  padding-left: 3%;
}
.dure h3{
    color: black;
    font-size: x-large;
    
}

.flip-card-back h3{
  color: white;
  font-size: x-large;

}

/* acodion  */

.accordion-card {
  width: 600px;
  margin: auto;
}
.accordion-card section a {
  background: #fff;
  color: #000;
  text-decoration: none;
  text-align: center;
  padding: 10px;
  display: block;
  font-size: 1.3em;
  letter-spacing: 3px;
  overflow: hidden;
  border-bottom: 3px solid #aaa69d;
}
.accordion-card section p {
  padding: 10px;
  
  overflow: hidden;
  height: 0;
  opacity: 0;
  background: #27ae60;
  color: #fff;
  overflow: hidden;
  letter-spacing: 2px;
  transition: 2s;
}
.accordion-card section:target p {
  height: 10em;
  opacity: 1;
  padding: 20px;
}

/* accordion V2 */


.input-card {
  position: absolute;
  opacity: 0;
  z-index: -1;
}
.accordion-card-wrapper {
  border-radius: 8px;
  overflow: hidden;
  /* box-shadow: 0 4px 4px -2px rgba(0, 0, 0, 0.5); */
  width: 0 auto;
  margin:0 auto;
}
.accordion-card {
  width: 100%;
  color: white;
  overflow: hidden;
  margin-bottom: 16px;
}
.accordion-card:last-child{
  margin-bottom: 0;
}
.accordion-card-label {
  display: flex;
  -webkit-box-pack: justify;
  justify-content: space-between;
  padding: 16px;
  background: rgba(4,57,94,.8);
  font-weight: bold;
  cursor: pointer;
  font-size: 20px;
}
.accordion-card-label:hover {
  background: rgba(4,57,94,1);
}
.accordion-card-label::after {
  content: "\276F";
  width: 16px;
  height: 16px;
  text-align: center;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
}
.accordion-card-content {
  max-height: 0;
  padding: 0 16px;
  color: rgba(4,57,94,1);
  background: white;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
}
.accordion-card-content p{
  margin: 0;

}
input:checked + .accordion-card-label {
  background: rgba(4,57,94,1);
}
input:checked + .accordion-card-label::after {
  -webkit-transform: rotate(90deg);
  transform: rotate(90deg);
}
input:checked ~ .accordion-card-content {
  max-height: 100vh;
  padding: 16px;
}



/* fin */


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
                              padding-top: 70px;
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
                                        padding-top: 70px;
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
