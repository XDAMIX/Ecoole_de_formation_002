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
                <h2>Témoignages</h2>
            </div>
                        <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/temoignages/nouveau') }}" class="btn btn-success"><i class="fa-solid fa-plus fa-beat-fade"></i><span
                        class="btn-description">Ajouter </span></a>
            </div>
        </div>
    </div>
    {{-- ---------------------------------------------------------------------------------------------------- --}}

    <div class="container" style="padding-top: 10px;">
        <div class="row">


            @foreach ($temoignages as $temoignage)
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 animate__animated animate__backInLeft"
                    style="margin-bottom: 10px;">

                    <div class="card shadow">

                        <div class="row">
                            <div class="col-12 image-ronde text-center align-items-center shadow"
                                style="background-image: url({{ asset('storage/' . $temoignage->photo) }} );">

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                                    {{-- <label>Titre :</label> --}}
                                    <h4 class="card-title"
                                        style="text-transform: uppercase;font-weight:bold;padding-top:10px;">
                                        {{ $temoignage->nom }}<br>
                                        <span style="color: rgb(74, 74, 74);">{{ $temoignage->poste }}</span>
                                    </h4>
                                </div>
                                <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                                    {{-- <label>Mot :</label> --}}
                                    <div class="truncate-text" id="truncate-text{{ $temoignage->id }}">
                                        <p class="card-title">
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            {{ $temoignage->mot }}
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p>
                                        {{-- expand button  --}}
                                        <button class="btn btn-light" onclick="toggleText({{ $temoignage->id }})">Lire
                                            la suite</button>

                                    </div>


                                </div>

                            </div>

                            {{-- bouttons --}}
                            <div class="form-group row justify-content-center text-center">

                                <div class="col-6 col-sm-6 mb-3 mb-sm-0">
                                    {{-- edit button    --}}
                                    <form class="edit-form" action="" data-id="{{ $temoignage->id }}"
                                        data-name="{{ $temoignage->nom }}" method="GET">
                                        @csrf
                                        <button type="button" onclick="edit_confirmation(this)"
                                            class="btn btn-outline-primary alpa shadow" style="margin-bottom: 5px;"><i
                                                class="bi bi-pen"></i> <span
                                                class="btn-description">Modifier</span></button>
                                    </form>

                                </div>
                                <div class="col-6 col-sm-6">
                                    {{-- delete button  --}}
                                    <form class="delete-form" action="" data-id="{{ $temoignage->id }}"
                                        data-name="{{ $temoignage->nom }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="supprimer_confirmation(this)"
                                            class="btn btn-outline-danger alpa shadow"><i class="bi bi-trash3"></i>
                                            <span class="btn-description">Supprimer</span></button>
                                    </form>

                                </div>
                            </div>
                            {{-- bouttons         --}}

                        </div>

                    </div>

                </div>
            @endforeach


        </div>
    </div>



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
              title: "Êtes-vous sûr(e) de vouloir supprimer ce témoignage ?",
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
                  form.action = `/admin/temoignages/${id}/delete`;
                  form.submit();

                  Swal.fire({
                      title: "témoignage supprimée !",
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
              title: "Êtes-vous sûr(e) de vouloir modifier ce témoignage ?",
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
                  form.action = `/admin/temoignages/${id}/edit`;
                  form.submit();
              }
          });
      } else {
          console.error("Le formulaire n'a pas été trouvé.");
      }
  }
</script>



{{-- ---------------------------------------------------------------------------------------------------- --}}

    {{-- ---------------------------------------------------------------------------------------------------- --}}
    <script>
        function toggleText(id) {
            console.log("***ToggleText function called***");
            console.log('id : '+ id);

            var element = document.querySelector("#truncate-text" + id);

            if (element) {
                element.classList.toggle("expanded");
                console.log("L'élément a été trouvé et la classe est switché");
            } else {
                console.error();("L'élément n'a pas été trouvé.");
            }
        }
    </script>

{{-- ---------------------------------------------------------------------------------------------------- --}}
    <style>
        .truncate-text .card-title {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            /* Limit to three lines */
            -webkit-box-orient: vertical;
            max-height: calc(1.5em * 3);
            /* Adjust the line height accordingly */
            transition: max-height 0.3s ease;
            /* Add a smooth transition effect */
        }

        .truncate-text.expanded .card-title {
            max-height: none;
            -webkit-line-clamp: 100;
            /* Allow the full height for the expanded state */
        }

        .truncate-text.expanded button {
            display: inline-block;
            /* Hide the "Lire la suite" button by default */
        }

        .truncate-text button {
            display: inline-block;
            /* Display the "Lire la suite" button in expanded mode */
        }
    </style>

<style>
  .image-ronde {
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100px;
      width: 100px;
      left: 35%;
      margin-top: 5%;
      border-radius: 50%;
      text-align: center;
  }
</style>
    {{-- ---------------------------------------------------------------------------------------------------- --}}


    {{-- footer  --}}
    <div class="container" id="pied-page">
    @endsection
