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
                <h2>Formations</h2>
            </div>
                        <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/formation/nouveau') }}" class="btn btn-success"><i class="fa-solid fa-plus fa-beat-fade"></i><span
                        class="btn-description">Ajouter </span></a>
            </div>
        </div>
    </div>


    {{-- --------------------------------------------------------------------------------------------------------------------------------- --}}

    <div class="container" style="padding-top: 10px;">
        <div class="row">


            @foreach ($formations as $formation)
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 animate__animated animate__backInLeft"
                    style="margin-bottom: 10px;">

                    <div class="card shadow">
                        <div class=""
                            style="background-image: url({{ asset('storage/' . $formation->photo) }} );background-size: cover;background-position: center;background-repeat: no-repeat;  height:400px; width:100%;border-top-left-radius: 5px;border-top-right-radius: 5px;">
                        </div>
                        {{-- <img src="{{ asset('storage/'.$photo->photo )}}" class="card-img-top" alt="..." style="height:100%;"> --}}
                        <div class="card-body">
                            <div class="form-group row">

                                <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                                    <label>Titre:</label>
                                    <h4 class="card-title">{{ $formation->titre }}</h4>
                                </div>
                                {{-- <div class="col-sm-6 mb-3 mb-sm-0 text-center">
                                    <label>Duré:</label>
                                    <h4 class="card-title">{{ $formation->dure }}</h4>

                                </div> --}}
                                <div style="text-align: center;align-items:center;">

                                    {{-- bouttons --}}
                                    <div class="form-group row" id="double-btn" style="padding-top:10px;">
                                        <div class="col-4">
                                            <a href="{{ url('/admin/formation/' . $formation->id . '/voir') }}"
                                                class="btn btn-outline-info alpa shadow" style="margin-bottom: 5px;"><i
                                                    class="bi bi-eye"></i> <span class="btn-description">Afficher</span></a>
                                        </div>


                                        <div class="col-4">

                                            {{-- edit button    --}}
                                            <form class="edit-form" action="" data-id="{{ $formation->id }}"
                                                data-name="{{ $formation->titre }}" method="GET">
                                                @csrf
                                                <button type="button" onclick="edit_confirmation(this)"
                                                    class="btn btn-outline-primary alpa shadow"
                                                    style="margin-bottom: 5px;"><i class="bi bi-pen"></i> <span
                                                        class="btn-description">Modifier</span></button>
                                            </form>

                                        </div>


                                        <div class="col-4">

                                            {{-- delete button  --}}
                                            <form class="delete-form" action="" data-id="{{ $formation->id }}"
                                                data-name="{{ $formation->titre }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="supprimer_confirmation(this)"
                                                    class="btn btn-outline-danger alpa shadow"><i
                                                        class="bi bi-trash3"></i> <span
                                                        class="btn-description">Supprimer</span></button>
                                            </form>

                                        </div>
                                        
                                    </div>
                                    {{-- bouttons         --}}


                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            @endforeach


        </div>
    </div>

    {{-- --------------------------------------------------------------------------------------------------------------------------------- --}}




        {{-- script suppression  --}}
        <script>
          function supprimer_confirmation(button) {
              // Utilisez le bouton pour obtenir le formulaire parent
              const form = button.closest('.delete-form');

              // Vérifiez si le formulaire a été trouvé
              if (form) {
                  // Utilisez le formulaire pour extraire l'ID
                  const id = form.dataset.id;
                  const name = form.dataset.name;

                  Swal.fire({
                      title: "Êtes-vous sûr(e) de vouloir supprimer cette formation?",
                      text: name,
                      icon: "question",
                      showCancelButton: true,
                      confirmButtonColor: "#198754",
                      cancelButtonColor: "#d33",
                      confirmButtonText: "Oui, Supprime-le",
                      cancelButtonText: "Non, Annuler",
                  }).then((result) => {
                      if (result.isConfirmed) {
                          // Mettez à jour l'action du formulaire avec l'ID et soumettez-le
                          form.action = `/admin/formation/${id}/delete`;
                          form.submit();

                          Swal.fire({
                              title: "Formation supprimée !",
                              icon: "success"
                          });
                      }
                  });
              } else {
                  console.error("Le formulaire n'a pas été trouvé.");
              }
          }
      </script>




      {{-- script modifier  --}}
      <script>
          function edit_confirmation(button) {
              // Utilisez le bouton pour obtenir le formulaire parent
              const form = button.closest('.edit-form');

              // Vérifiez si le formulaire a été trouvé
              if (form) {
                  // Utilisez le formulaire pour extraire l'ID
                  const id = form.dataset.id;
                  const name = form.dataset.name;

                  Swal.fire({
                      title: "Êtes-vous sûr(e) de vouloir modifier cette formation?",
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
                          form.action = `/admin/formation/${id}/edit`;
                          form.submit();
                      }
                  });
              } else {
                  console.error("Le formulaire n'a pas été trouvé.");
              }
          }
      </script>




    {{-- footer  --}}
    <div class="container" id="pied-page">
    @endsection
