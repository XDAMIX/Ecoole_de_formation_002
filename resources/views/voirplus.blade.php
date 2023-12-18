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

    <div class="container" style="padding-top: 100px;">
        <div class="row">
            <div class="col-12 py-3 text-center">
                <a href="{{ url('/formations/') }}" class="btn btn-dark alpa shadow"
                    style="margin-bottom: 5px;"><i class="bi bi-arrow-left-circle-fill"></i> <span class="btn-description">Retour</span></a>
            </div>
            <div class="col-12 py-4 text-center">
                <h1 style="color: black; font-weight:bold; text-transform: uppercase;">Formation : {{ $formation->titre }}
                </h1>
            </div>
        </div>
    </div>


    <div class="container animate__animated animate__backInLeft">

      <div class="row justify-content-center ">

          <div class="col-md-8 text-center">
              <div class="card shadow text-center" style="background-color: #ffff;">
                  {{-- <div class="card-header"style="text-align:center;">
                <a style="font-size: 20px;">Nouveau bloc de présentation</a>
              </div> --}}
                  <div class="card-body text-center">
  
                      <div class="col-12">
                          <img id="imagePreview" class="" src="{{ asset('storage/' . $formation->photo) }}" alt="image manquante !"
                              style="height: 300px;width: auto;">
                      </div>
                      <hr>
  
                      <div class="row text-center">
                          
                          <div class="col-12 py-3">
                              <h3>Titre de la formation :</h3>
                              <h5> {{ $formation->titre }} </h5>
                          </div>
      
                          <div class="col-12 py-3">
                              <h3>La duré de la formation :</h3>
                              <h5> {{ $formation->dure }} </h5>
                          </div>
      
                          <div class="col-12 py-3">
                              <h3>Description de la formation :</h3>
                              <p> {{ $formation->description }} </p>
                          </div>
      
                          <div class="col-12 py-3">
                              <h3>Public concerné :</h3>
                              <p> {{ $formation->publique }} </p>
                          </div>
      
                          <div class="col-12 py-3">
                              <h3>Objectifs :</h3>
                              <p> {{ $formation->objectifs }} </p>
                          </div>
  

                          <div class="col-12 py-5">

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
