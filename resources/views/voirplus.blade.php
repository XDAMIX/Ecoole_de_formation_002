@extends('layouts.menu_paccino')
@section('content')


<style>
  .btn{
    width:200px;
    padding: 10px 15px;
    border-radius: 50px;
    font-size: 16px;
    /* color: black;  */
    font-weight:bold; 
    text-transform: uppercase;
  }
  i{
    font-size: 18px;
  }
</style>

    <div class="container" style="padding-top: 100px;" id="titre-page">
        <div class="row">
            <div class="col-12 d-flex align-items-center">
                <a href="{{ url('/formations/') }}" class="btn btn-dark alpa shadow"
                    style="margin-bottom: 5px;"><i class="bi bi-arrow-left-circle-fill"></i> <span class="btn-description">Retour</span></a>
            </div>
            <div class=" d-flex align-items-center justify-content-center">
                <h1>{{ $formation->titre }}</h1>
        
            </div>
        </div>
    </div>


    <div class="container">

        <div class="row animate__animated animate__backInLeft">
            <div class="col-md-12">
                <div class="card shadow" style="background-color: #ffff;">
    
                    <div class="card-body">
    
                        <div class="row">
                            {{-- <div style="text-align: center">
                                <h3 style="color: rebeccapurple; font-size: 30px">{{ $formation->titre }}</h3>
                                
                            </div> --}}
                            <div class="col-md-6">
                                <div class="row">
                            
                                    <div>
                                        <h3><i class="fa-solid fa-people-group"></i> Public concerné :</h3>
                                        <p> {{ $formation->publique }} </p>
                                        
                                    </div>
                                    <div class="col-12 py-3">
                                        <h3> <i class="fa-solid fa-bullseye"></i> Objectifs :</h3>
                                        <p> {{ $formation->objectifs }} </p>
                                    </div>
                                    <div>
                                        <h3> <i
                                            class="fa-solid fa-stopwatch"></i> Duré :  {{ $formation->dure }}</h3>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <img id="imagePreview" class="img-fluid" src="{{ asset('storage/' . $formation->photo) }}" alt="L'image n'a pas été sélectionnée!" style="height: 300px;width: auto;">
                                </div>
                            </div>
                        </div>
                        <hr>
    
                        <div class="row">
                            
                        
        
                            <div class="col-12 py-3">
                                <h3>Description de la formation :</h3>
                                <p> {{ $formation->description }} </p>
                            </div>
        
                                {{-- ----------------- --}}
    <hr>
    <div class="col-12 py-5 text-center">

        {{-- edit button    --}}
        <form class="register-form" action="" data-id="{{ $formation->id }}"
            data-name="{{ $formation->titre }}" method="GET">
            @csrf
            <button type="button" onclick="register_confirmation(this)"
                class="btn btn-success alpa shadow"
                style="margin-bottom: 5px;"><i class="bi bi-mortarboard-fill"></i> <span
                    class="btn-description">S'Inscrir</span></button>
        </form>

    </div>
                               
                                {{-- ----------------- --}}
    
    
                        </div>
                    </div>
    
                </div>
            
    
    
         </div>
    
                        </div>
    
    
    
    
    
                        
                    </div>
                </div>
    
            </div>
        </div>
    
    
    </div>


     
  
  
  </div>


    {{-- script register  --}}
    <script>
      function register_confirmation(button) {
          // Utilisez le bouton pour obtenir le formulaire parent
          const form = button.closest('.register-form');

          // Vérifiez si le formulaire a été trouvé
          if (form) {
              // Utilisez le formulaire pour extraire l'ID
              const id = form.dataset.id;
              const name = form.dataset.name;

              Swal.fire({
                  title: "Êtes-vous sûr(e) de vouloir faire votre inscription à cette formation?",
                  text: name,
                  icon: "question",
                  showCancelButton: true,
                  confirmButtonColor: "#198754",
                  cancelButtonColor: "#d33",
                  confirmButtonText: "Oui",
                  cancelButtonText: "Non",
              }).then((result) => {
                  if (result.isConfirmed) {
                      // Mettez à jour l'action du formulaire avec l'ID et soumettez-le
                      form.action = `/inscription/${id}`;
                      form.submit();
                  }
              });
          } else {
              console.error("Le formulaire n'a pas été trouvé.");
          }
      }
  </script>

@endsection
