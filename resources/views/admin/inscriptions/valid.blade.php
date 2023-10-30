@extends('layouts.admin_menu')
@section('content')

<div class="container" style="padding-top: 120px;">
    <div class="row">
        <div class="col-md-12">
        <div class="card">


            
                <div class="card-body centered-container" style="padding-top:300px;">
  
<form class="form" id="form_insc" action="{{url('/admin/inscriptions/'.$inscription->id.'/valideupdate')}}" method="POST">
@csrf
@method('PUT')
<div class="card-header"style="text-align:center;">
  <!-- <a style="font-size: 20px;"><i class="bi bi-person"></i>Modifier les informations de la Formation</a> -->
    <h4>validation de candidat : {{ $inscription->nom }} {{ $inscription->prenom }} <i class="fa-solid fa-file-pen"></i></h4>

  
</div>

<div class="form__group field" >
      <h5 style="text-align: center">vous informations</h5>
      <br>
  {{-- information personnelle --}}
    
   </div>

{{--  nom et prenom --}}
      <label>
        <input class="input" id="nom" type="text" name="nom" placeholder="" required="" value="{{ $inscription->nom }}">
        <span>Nom</span>
    </label> 
      <label>
        <input class="input" id="prenom" type="text" name="prenom" placeholder="" required="" value="{{ $inscription->prenom }}">
        <span>Prénom</span>
    </label> 
   {{-- fin nom et prenom  --}}
   

<hr>


{{-- session avec boucle --}}
<div class="col form-group">
    <label style="color: white ; font-size: 20px" for="">Choisir une session : </label><br>
    <select class="form-control" name="session" id="session">
        {{-- <option value="{{ $inscription->formation }}" style="color: red">{{ $inscription->formation }}</option> --}}
     @foreach($sessions as $session)
    <option value="{{ $session->nom }}">{{ $session->nom }}-- {{ $session->formation }} --{{ $session->prof }} </option>
    
    @endforeach
    </select>


 
   
</div>
{{-- fin  --}}

<br>

<label for="montant"> Montant : </label>
<input type="text" id="montant" name="montant" placeholder="Saisissez le montant d'argent" />




<br>

    {{--  new --}}
    <div style="text-align: center;">
        <div class="bt-en-ligne">
             <div class="bt-en-ligne-div">

           
             <button class="btn-mdf btn-r" id="btn-val" type="button">
                <span class="text">Validé</span>
                <span class="icon">
                    <i class="bi bi-pen"></i>
                </span>
             </button>

             </div>

             <div class="bt-en-ligne-div"   id="mydiv">
                  <button class="btn-sup btn-r" id="btn" type="button">
                         <span class="text">Annuler</span>
                         <span class="icon">
                        <i class="bi bi-trash3"></i>
                         </span>
                 </button>
             </div>
         </div>

  </div>
  
{{-- fin --}}
</form>

                </div>
            </div>

        </div>
    </div>
</div>


<script>

    //    <!-- script pour le button annuler -->

       var bouton = document.getElementById("btn");
        bouton.addEventListener("click",function(){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'voulez vous annuler validation..?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'OUI',
                cancelButtonText: 'NO',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Soumettre le formulaire de suppression
                   
                    //  form.submit();
                    window.location.href="{{ url('/')}}"
                    swalWithBootstrapButtons.fire(
                        'Inscription annuler',
                        'Votre inscription a ete annuler',
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
    //    <!-- script pour le button  Modifier  -->



    // sripte pour le boutton valide 

     
//  new code 
    var boutonmdf = document.getElementById("btn-val");
boutonmdf.addEventListener("click", function () {
  
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
  })

  swalWithBootstrapButtons.fire({
    title: `Modifier ! `, // Utilisez la valeur sélectionnée ici
    text: `Voulez-vous valide l'inscription  ..?`,
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'OUI, valide',
    cancelButtonText: 'NO, Annuler !',
    reverseButtons: true
    // fin de new code 
            }).then((result) => {
                if (result.isConfirmed) {

                   // Validation des champs
            var montantInput = document.getElementById("montant");
            
            
            var montant = montantInput.value.trim();
       
            var isValid = true;
            
           
            
            if (isNaN(montant) || montant <= 0) {
              montantInput.style.backgroundColor = 'red';
                isValid = false;
            } else {
              montantInput.style.backgroundColor = ''; // Reset background color
            }
            
            if (isValid) {
                const form = document.getElementById("form_insc");
                form.submit();
                 // Attendre un court délai (par exemple 1000 ms) avant de rediriger
                      setTimeout(function () {
                          window.location.href = '/admin/inscriptions';
                      }, 1000);

            } else {
                swalWithBootstrapButtons.fire({
                    icon: 'error',
                    title: 'Champs invalides',
                    text: 'Veuillez remplir tous les champs correctement.',
                });
            }
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            // Action à prendre si l'utilisateur annule
        }
            })
        });


        //  script pour rendre la couleur white pour les input on clic
        
        var montantInput = document.getElementById("montant");
       
// Ajoutez des gestionnaires d'événements pour les événements de clic (ou focus)
montantInput.addEventListener("click", function () {
  montantInput.style.backgroundColor = "white";
});

    </script>
{{--  new projct css  --}}



<script>
  document.addEventListener("DOMContentLoaded", function() {
    var montantInput = document.getElementById("montant");
  
    // Écoutez l'événement de saisie de l'utilisateur
    montantInput.addEventListener("input", function() {
      // Remplacez tout ce qui n'est pas un nombre par du vide
      this.value = this.value.replace(/[^0-9]/g, "");
    });
  });
  </script>



<style>
    

/* center le div */
.centered-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 120vh; /* Hauteur équivalente à la hauteur de la fenêtre visible */
}



    /*  new project  */


    .form {
  display: flex;
  flex-direction: column;
  gap: 10px;
  max-width: 350px;
  background-color: #355891;
  padding: 20px;
  border-radius: 10px;
  position: relative;
}

.message {
  color: #355891;
  font-size: 14px;
}

.flex {
  display: flex;
  width: 100%;
  gap: 6px;
}

.form label {
  position: relative;
}

.form label .input {
  width: 100%;
  padding: 10px 10px 20px 10px;
  outline: 0;
  border: 1px solid #355891;
  border-radius: 5px;
}

.form label .input + span {
  position: absolute;
  left: 10px;
  top: 15px;
  color: #355891;
  font-size: 0.9em;
  cursor: text;
  transition: 0.3s ease;
}

.form label .input:placeholder-shown + span {
  top: 15px;
  font-size: 0.9em;
}

.form label .input:focus + span,.form label .input:valid + span {
  top: 30px;
  font-size: 0.7em;
  font-weight: 600;
}

.form label .input:valid + span {
  color: green;
}

.input01 {
  width: 100%;
  padding: 10px 10px 20px 10px;
  outline: 0;
  border: 1px solid #355891;
  border-radius: 5px;
}

.form label .input01 + span {
  position: absolute;
  left: 10px;
  top: 50px;
  color: #355891;
  font-size: 0.9em;
  cursor: text;
  transition: 0.3s ease;
}

.form label .input01:placeholder-shown + span {
  top: 40px;
  font-size: 0.9em;
}

.form label .input01:focus + span,.form label .input01:valid + span {
  top: 50px;
  font-size: 0.7em;
  font-weight: 600;
}

.form label .input01:valid + span {
  color: green;
}

.fancy {
  background-color: white;
  border: 2px solid #355891;
  border-radius: 0px;
  box-sizing: border-box;
  color: #355891;
  cursor: pointer;
  display: inline-block;
  font-weight: 390;
  letter-spacing: 2px;
  margin: 0;
  outline: none;
  overflow: visible;
  padding: 8px 30px;
  position: relative;
  text-align: center;
  text-decoration: none;
  text-transform: none;
  transition: all 0.3s ease-in-out;
  user-select: none;
  font-size: 13px;
}

.fancy::before {
  content: " ";
  width: 1.7rem;
  height: 2px;
  background: #355891;
  top: 50%;
  left: 1.5em;
  position: absolute;
  transform: translateY(-50%);
  transform: translateX(230%);
  transform-origin: center;
  transition: background 0.3s linear, width 0.3s linear;
}

.fancy .text {
  font-size: 1.125em;
  line-height: 1.33333em;
  padding-left: 2em;
  display: block;
  text-align: left;
  transition: all 0.3s ease-in-out;
  text-transform: lowercase;
  text-decoration: none;
  color: #355891;
  transform: translateX(30%);
}

.fancy .top-key {
  height: 2px;
  width: 1.5625rem;
  top: -2px;
  left: 0.625rem;
  position: absolute;
  background: #355891;
  transition: width 0.5s ease-out, left 0.3s ease-out;
}

.fancy .bottom-key-1 {
  height: 2px;
  width: 1.5625rem;
  right: 1.875rem;
  bottom: -2px;
  position: absolute;
  background: #355891;
  transition: width 0.5s ease-out, right 0.3s ease-out;
}

.fancy .bottom-key-2 {
  height: 2px;
  width: 0.625rem;
  right: 0.625rem;
  bottom: -2px;
  position: absolute;
  background: #355891;
  transition: width 0.5s ease-out, right 0.3s ease-out;
}

.fancy:hover {
  color: #355891;
  background: #5f82a9;
}

.fancy:hover::before {
  width: 1.5rem;
  background: #355891;
}

.fancy:hover .text {
  color: white;
  padding-left: 1.5em;
}

.fancy:hover .top-key {
  left: -2px;
  width: 0px;
}

.fancy:hover .bottom-key-1,
 .fancy:hover .bottom-key-2 {
  right: 0;
  width: 0;
}
/* fin */


.form__group {
  position: relative;
  padding: 20px 0px 5px;
  margin-top: 10px;
  width: 100%;
  max-width: 700px;
}


.form__label {
  position: absolute;
  display: block;
  transition: 0.40s;
  font-size: 20px;
  color: #116399;
  pointer-events: none;
  padding-bottom: 30px;
  top: -10px;
  font-weight: 700;
  padding-left: 5px;
}
.form__field {
  font-family: inherit;
  width: 100%;
  border: none;
  border-bottom:2px solid #9b9b9b;
  outline: 0;
  font-size: 22px;
  color: rgb(0, 0, 0);
  padding: 7px 0 ;
  background: transparent;
  transition: border-color 0.2s;
  font-weight: bold;
}
.form__field::placeholder {
  color: transparent;
}

.form__field:placeholder-shown ~ .form__label {
  font-size: 24px;
  cursor: text;
  top: 20px;

}
.form__field:focus ~ .form__label {
  position: absolute;
  top: -5px;
  display: block;
  transition: 0.2s;
  font-size: 17px;
  color: #38caef;
  font-weight: 700;
  
}
.form__field:required, .form__field:invalid {
  box-shadow: none;
}

/*  bouton enregistrier */

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


{{-- new project  --}}







@endsection
