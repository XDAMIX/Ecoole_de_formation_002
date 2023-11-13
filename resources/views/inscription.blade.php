@extends('layouts.menu_paccino')
@section('content')

{{-- css de la page formulaire inscription --}}
<style>
  #titre-page{
    margin-top: 100px;
  }
  .icons{
        padding-right: 8px;
    }
  .espace-inputs{
    padding-bottom: 25px;
  }
  .formulaire-btn{
        text-align: center; 
    }
  .card{
        margin-top:20px;
        margin-bottom:50px;
    }
</style>


<div class="container" id="titre-page">
  <div class="row justify-content-center">

        <div class="col-12" style="text-align: center;">
            <h2><i class="fa-solid fa-file-pen icons"></i>  Formulaire d'inscription </h2>
        </div>

  </div>
</div>



<div class="container" style="padding-top: 10px;">
  <div class="row justify-content-center">
      <div class="col-md-8">
      <div class="card" style="background-color: #ffff;">
              {{-- <div class="card-header"style="text-align:center;">
                <a style="font-size: 20px;">Formulaire d'inscription</a>
              </div> --}}
              <div class="card-body">
  
<form action="{{url('/inscription/save')}}" method="POST" id="form_insc" >
@csrf

{{-- sexe ,nom ,prenom  --}}
{{-- ---------------------------------------------------------- --}}
<div class="row espace-inputs"> 
  
  <div class="col-md-12">
    <h5><i class="bi bi-person-fill"></i>  informations personnelles</h5>
    <hr>
  </div>

  <div class="col-md-4 form-group" id="sexe">
    <label for="">sexe :</label>

    <select class="form-control" name="sexe" >
      <option value="H">HOMME</option>
      <option value="F">FEMME</option>
    </select>
  </div>


  <div class="col-md-4 form-group" id="nom">
    <label for="">Nom :</label>

    <input type="text" name="nom" class="form-control @if($errors->get('nom')) is-invalid @endif" id="validationServer01" placeholder="Veuillez saisir votre nom ici">
    <div id="validationServer01Feedback" class="invalid-feedback">
        @if($errors->get('nom'))
        @foreach($errors->get('nom') as $message)
        {{ $message }}
        @endforeach
        @endif
    </div>

  </div>


  <div class="col-md-4 form-group" id="prenom">
    <label for="">Prénom :</label>

    <input type="text" name="prenom" class="form-control @if($errors->get('prenom')) is-invalid @endif" id="validationServer02" placeholder="Veuillez saisir votre prénom ici">
    <div id="validationServer02Feedback" class="invalid-feedback">
        @if($errors->get('prenom'))
        @foreach($errors->get('prenom') as $message)
        {{ $message }}
        @endforeach
        @endif
    </div>

  </div>


</div>



{{-- age ,wilaya  --}}
{{-- ---------------------------------------------------------- --}}
<div class="row espace-inputs"> 


  <div class="col-md-4 form-group" id="age">
    <label for="">Age :</label>

    <input type="number" name="age" class="form-control @if($errors->get('age')) is-invalid @endif" id="validationServer03" placeholder="" min="18" value="18">
    <div id="validationServer03Feedback" class="invalid-feedback">
        @if($errors->get('age'))
        @foreach($errors->get('age') as $message)
        {{ $message }}
        @endforeach
        @endif
    </div>

  </div>


  <div class="col-md-8 form-group" id="wilaya">
    <label for="">Wilaya de résidence :</label>

    <select class="form-control"  name="wilaya">
      <option value="Adrar">Adrar-01 </option>
      <option value="Chlef">Chlef-02 </option>
      <option value="Laghouat">Laghouat-03</option>
      <option value="Oum El Bouaghi">Oum El Bouaghi-04 </option>
      <option value="Batna">Batna-05 </option>
      <option value="Béjaïa">Béjaïa-06 </option>
      <option value="Biskra">Biskra-07 </option>
      <option value="Béchar">Béchar-08 </option>
      <option value="Blida">Blida-09 </option>
      <option value="Bouira">Bouira-10 </option>

      <option value="Tamanrasset">Tamanrasset-11 </option>
      <option value="Tébessa">Tébessa-12 </option>
      <option value="Tlemcen">Tlemcen-13 </option>
      <option value="Tiaret">Tiaret-14 </option>
      <option value="Tizi Ouzou">Tizi Ouzou-15</option>
      <option value="Alger" selected>Alger-16 </option>
      <option value="Djelfa">Djelfa-17 </option>
      <option value="Jijel">Jijel-18</option>
      <option value="Sétif">Sétif-19 </option>
      <option value="Saïda">Saïda-20 </option>

      <option value="Skikda">Skikda-21 </option>
      <option value="Sidi Bel Abbès">Sidi Bel Abbès-22 </option>
      <option value="Annaba">Annaba-23 </option>
      <option value="Guelma">Guelma-24 </option>
      <option value="Constantine">Constantine-25 </option>
      <option value="Médéa">Médéa-26 </option>
      <option value="Mostaganem">Mostaganem-27</option>
      <option value="M'Sila">M'Sila-28 </option>
      <option value="Mascara">Mascara-29 </option>
      <option value="Ouargla">Ouargla-30 </option>

      <option value="Oran">Oran-31 </option>
      <option value="El Bayadh">El Bayadh-32 </option>
      <option value="Illizi">Illizi-33</option>
      <option value="Bordj Bou Arreridj">Bordj Bou Arreridj-34 </option>
      <option value="Boumerdès">Boumerdès-35 </option>
      <option value="El Tarf">El Tarf-36 </option>
      <option value="Tindouf">Tindouf-37 </option>
      <option value="Tissemsilt">Tissemsilt-38 </option>
      <option value="El Oued">El Oued-39 </option>
      <option value="Khenchela">Khenchela-40 </option>

      <option value="Souk Ahras">Souk Ahras-41 </option>
      <option value="Tipaza">Tipaza-42 </option>
      <option value="Mila">Mila-43 </option>
      <option value="Aïn Defla">Aïn Defla-44 </option>
      <option value="Naâma">Naâma-45 </option>
      <option value="Aïn Témouchent">Aïn Témouchent-46 </option>
      <option value="Ghardaïa">Ghardaïa-47 </option>
      <option value="Relizane">Relizane-48 </option>
      <option value="Timimoun">Timimoun-49 </option>
      <option value="Bordj Badji Mokhtar">Bordj Badji Mokhtar-50 </option>

      <option value="Ouled Djellal">Ouled Djellal-51</option>
      <option value="Béni Abbès">Béni Abbès-52</option>
      <option value="In Salah ">In Salah-53</option>
      <option value="In Guezzam">In Guezzam-54</option>
      <option value="Touggourt ">Touggourt-55</option>
      <option value="Djanet">Djanet-56 </option>
      <option value="El M'Ghair">El M'Ghair-57 </option>
      <option value="El Meniaa">El Meniaa-58 </option>

      </select>

  </div>

</div>


{{-- ,profession --}}
{{-- -------------------------------------------------------------------------- --}}
<div class="row espace-inputs"> 

  <div class="col-md-12 form-group" id="profession">
    <label for="">Votre profession :</label>

    <input type="text" name="profession" class="form-control @if($errors->get('profession')) is-invalid @endif" id="validationServer04" placeholder="Veuillez saisir votre profession ici">
    <div id="validationServer04Feedback" class="invalid-feedback">
        @if($errors->get('profession'))
        @foreach($errors->get('profession') as $message)
        {{ $message }}
        @endforeach
        @endif
    </div>

  </div>

</div>



{{-- telephone ,email --}}
{{-- -------------------------------------------------------------------------- --}}
<div class="row espace-inputs"> 

  <div class="col-md-6 form-group" id="telephone">
    <label for="">Numéro de téléphone :</label>

    <input type="text" name="tel" class="form-control @if($errors->get('tel')) is-invalid @endif" id="validationServer05" placeholder="Veuillez saisir votre numéro de téléphone ici">
    <div id="validationServer05Feedback" class="invalid-feedback">
        @if($errors->get('tel'))
        @foreach($errors->get('tel') as $message)
        {{ $message }}
        @endforeach
        @endif
    </div>

  </div>
  <div class="col-md-6 form-group" id="email">
    <label for="">Adresse e-mail :</label>

    <input type="text" name="email" class="form-control @if($errors->get('email')) is-invalid @endif" id="validationServer06" placeholder="Veuillez saisir votre adresse e-mail ici">
    <div id="validationServer06Feedback" class="invalid-feedback">
        @if($errors->get('email'))
        @foreach($errors->get('email') as $message)
        {{ $message }}
        @endforeach
        @endif
    </div>

  </div>

</div>




{{-- formation --}}
{{-- -------------------------------------------------------------------------- --}}

<div class="row espace-inputs justify-content-center"> 

  <div class="col-md-12">
    <hr>  
    <h5 style="text-align: center"><i class="bi bi-mortarboard-fill"></i>  Formation</h5>
    <hr>
  </div>
  
  <div class="col-md-6 form-group" id="formation" style="text-align: center;">
    <label for="">Veuillez choisir la Formation auquelle vous êtes intéressé :</label>

    <select class="form-control" name="formation">
      @foreach($formations as $formation)
     <option value="{{ $formation->titre }}">{{ $formation->titre }}</option>
     @endforeach
    </select>
  </div>

</div>

<hr>

{{-- new code  --}}
<div style="text-align: center;">
  <div class="bt-en-ligne">
       <div class="bt-en-ligne-div">

       <!-- <button class="btn-mdf btn-r" id="btn-mdf-{{ $formation->id}}" type="button" onclick="window.location.href='{{ url('/admin/formation/'.$formation->id.'/edit') }}';"> -->
       <button class="btn-mdf btn-r" id="btn-mdf-{{ $formation->id}}" type="button">
          <span class="text">Enregistrer</span>
          <span class="icon">
              <i class="bi bi-pen"></i>
          </span>
       </button>

       </div>

       <div class="bt-en-ligne-div"   id="mydiv">
            <button class="btn-sup btn-r" id="btn-{{ $formation->id}}" type="button">
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
    //  var nomInput = document.getElementById("nom");
    //  var ageInput = document.getElementById("age");
    //  var telephoneInput = document.getElementById("tel");
     
    //  var nom = nomInput.value.trim();
    //  var age = parseInt(ageInput.value);
    //  var telephone = telephoneInput.value.trim();
    //  var isValid = true;
     
    //  if (nom === "") {
    //      nomInput.style.backgroundColor = 'red';
    //      isValid = false;
    //  } else {
    //      nomInput.style.backgroundColor = ''; // Reset background color
    //  }
     
    //  if (isNaN(age) || age <= 0) {
    //      ageInput.style.backgroundColor = 'red';
    //      isValid = false;
    //  } else {
    //      ageInput.style.backgroundColor = ''; // Reset background color
    //  }
     
    //  if (telephone === "") {
    //      telephoneInput.style.backgroundColor = 'red';
    //      isValid = false;
    //  } else {
    //      telephoneInput.style.backgroundColor = ''; // Reset background color
    //  }
     
    //  if (isValid) {
         const form = document.getElementById("form_insc");
         form.submit();
          // Attendre un court délai (par exemple 1000 ms) avant de rediriger
               setTimeout(function () {
                   window.location.href = '/';
               }, 1000);

    //  } else {
    //      swalWithBootstrapButtons.fire({
    //          icon: 'error',
    //          title: 'Champs invalides',
    //          text: 'Veuillez remplir tous les champs correctement.',
    //      });
    //  }
 } else if (result.dismiss === Swal.DismissReason.cancel) {
     // Action à prendre si l'utilisateur annule
 }
     })
 });


</script>


<style>
  * button modifer */

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
</style>








