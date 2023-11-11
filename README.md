# Ecoole_de_formation_002
Un projet de gestion d'école de formation : interface utilisateur conviviale pour informations, inscriptions, localisation, et gestion administrative efficace des formations, enseignants, étudiants, et site web.

LOGO
-----------------
logo+coleur blanc


alPaccino---Pages Traitées:
---------------------------
informations
présentation






BUGS DE SITE COTé ADMINISTRATEUR:
--------------------------------------------------------------------------------------------------
*messages alert sont en anglais -> changer vers le français
*garder le menu vertical collapsed si son état est collapsed (petit just les icones qui apparaits)

-informations -> il manque les messages de sweet alert 
-informations -> il manque la suppression de réseau social

-présentation de l'école -> il manque l'affichage croisé


-affichage des pré-inscriptions
-lorsqu'on modifie la pré-inscription quand ont clique sur enregistrer/annuler elle renvoie vers le site clients
-lorsqu'on valide la pré-inscription quand ont clique sur enregistrer/annuler elle renvoie vers le site clients

-ajouter le transfer de la table pré-inscription vers la table etudiants
-ajouter un étudiant -> la requette donne erreure (il manque le champ formation)




------------------------------------------------------------------
script pour les boutons de imad:
--------------------------------
<script>

    //    <!-- script pour le button annuler -->

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
                title: 'voulez vous annuler l"linscription ..?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'OUI',
                cancelButtonText: 'NO',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Soumettre le formulaire de suppression
                    // var form = document.getElementById("delete-form-{{ $formation->id }}");
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
    //    <!-- script pour le button  enregistrier  -->

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
                title: 'enregister  !   {{ $formation->name}}',
                text: "Voulez-vous faire une inscription sur la formation {{ $formation->titre }}",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'OUI, Inscri!',
                cancelButtonText: 'NO, Annuler!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

                   // Validation des champs
            var nomInput = document.getElementById("nom");
            var ageInput = document.getElementById("age");
            var telephoneInput = document.getElementById("tel");
            
            var nom = nomInput.value.trim();
            var age = parseInt(ageInput.value);
            var telephone = telephoneInput.value.trim();
            var isValid = true;
            
            if (nom === "") {
                nomInput.style.backgroundColor = 'red';
                isValid = false;
            } else {
                nomInput.style.backgroundColor = ''; // Reset background color
            }
            
            if (isNaN(age) || age <= 0) {
                ageInput.style.backgroundColor = 'red';
                isValid = false;
            } else {
                ageInput.style.backgroundColor = ''; // Reset background color
            }
            
            if (telephone === "") {
                telephoneInput.style.backgroundColor = 'red';
                isValid = false;
            } else {
                telephoneInput.style.backgroundColor = ''; // Reset background color
            }
            
            if (isValid) {
                const form = document.getElementById("form_insc");
                form.submit();
                 // Attendre un court délai (par exemple 1000 ms) avant de rediriger
                      setTimeout(function () {
                          window.location.href = '/';
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
        
        var nomInput = document.getElementById("nom");
        var ageInput = document.getElementById("age");
        var telephoneInput = document.getElementById("tel");

// Ajoutez des gestionnaires d'événements pour les événements de clic (ou focus)
nomInput.addEventListener("click", function () {
    nomInput.style.backgroundColor = "white";
});

ageInput.addEventListener("click", function () {
    ageInput.style.backgroundColor = "white";
});

telephoneInput.addEventListener("click", function () {
    telephoneInput.style.backgroundColor = "white";
});
    </script>



    <style>
    








/* .message {
  color: #355891;
  font-size: 14px;
} */

/* .flex {
  display: flex;
  width: 100%;
  gap: 6px;
} */



/* .fancy {
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
} */

/* .fancy .text {
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
} */

/* .fancy .top-key {
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
} */
/* fin */

/* button modifer */

/* .btn-mdf {
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
                              transform: translateX(110px);
                              height: 40px;
                              width: 40px;
                              display: flex;
                              align-items: center;
                              justify-content: center;
                              padding-top: 0px;
                            }
                            
                            .btn-mdf .i {
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
                            } */

                            /* -------fin mdf------ */

                              /* button supprimer */


                              /* .btn-sup {
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
                                        transform: translateX(110px);
                                        height: 40px;
                                        width: 40px;
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;
                                        padding-top: 0px;
                                       }
                                       
                                       .btn-sup .i {
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
                                       .bt-en-ligne{

display: flex;

justify-content: center;
bottom: 0;
left: 0;
right: 0;
margin: auto;
}
.bt-en-ligne-div{
margin: 1%;
} */

/* fin */


</style>