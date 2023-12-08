@extends('layouts.admin_menu')
@section('content')
    {{-- retour en arrière  --}}
    <div class="container" id="titre-page">
        <div class="row">
            <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/session') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span
                        class="btn-description">Retour</span></a>
            </div>
            <div class="col-10 d-flex align-items-center">
                <h2>Modifier les informations de la session</h2>
            </div>
        </div>
    </div>



    {{-- -------------------------------------------------------------------------------------- --}}

    <div class="container" style="margin-top: 10px;">

        <div class="row animate__animated animate__backInLeft">

            <div class="card shadow">
                {{-- <div class="card-header">
      <h5>Nouvelle Publicité :</h5>
    </div> --}}

                <div class="card-body">

                    <form class="edit-form" action="{{ url('/admin/session/' . $session->id . '/update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="">Nom de la session:</label>
                            <input name="nom" type="text" placeholder="titre de la session" class="form-control"
                                required value="{{ $session->nom }}">
                        </div>





                        <!-- Votre formulaire HTML -->
                        <div class="form-group">
                            <label for="">Formation:</label>
                            <select class="form-control" id="formation" name="formation">
                                <option value="{{ $formation_session->id }}" style="display:none;" selected>
                                    {{ $formation_session->titre }}</option>
                                @foreach ($liste_formations as $formation)
                                    <option value="{{ $formation->id }}">{{ $formation->titre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Nom de professeur:</label>
                            <select class="form-control" id="profs" name="prof">
                                <option value="{{ $prof_session->id }}" style="display:none;" selected>
                                    {{ $prof_session->nom }}-{{ $prof_session->prenom }}</option>
                                <!-- Les professeurs filtrés seront affichés ici -->
                            </select>
                        </div>




                        {{-- bouttons --}}
                        <div class="form-group row justify-content-center text-center" id="double-btn">
                            <div class="col-6">
                                <button type="button" onclick="sauvegarder(this)"
                                    class="btn btn-outline-success alpa shadow"><i class="bi bi-check2"></i> <span
                                        class="btn-description">Enregistrer</span> </button>
                            </div>
                            <div class="col-6">
                                <a class="btn btn-outline-danger alpa shadow" href="{{ '/admin/session' }}"><i
                                        class="bi bi-x"></i><span class="btn-description">Annuler</span></a>
                            </div>
                        </div>
                        {{-- bouttons --}}

                    </form>
                </div>

            </div>


            {{-- ----------------------------------------------------------------------------------------------------   --}}








            {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}


            <script>
                // Fonction pour effectuer la requête AJAX
                function filtrerProfesseurs() {
                    var id_Formation = $('#formation').val();

                    $.ajax({
                        url: '/get-profs/' + id_Formation,
                        type: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            $('#profs').empty();
                            $.each(response.profs, function(key, value) {
                                $('#profs').append('<option value="' + value.id_prof +'">' +
                                    value.nom + ' ' + value.prenom + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }

                $(document).ready(function() {
                    // Appeler la fonction au chargement de la page
                    filtrerProfesseurs();

                    // Écouter les changements de la valeur de la formation
                    $('#formation').change(function() {
                        // Appeler la fonction lors du changement de la sélection
                        filtrerProfesseurs();
                    });
                });
            </script>



            {{-- script sauvegarder  --}}
            <script>
                function sauvegarder(button) {
                    // Utilisez le bouton pour obtenir le formulaire parent
                    const form = button.closest('.edit-form');

                    // Vérifiez si le formulaire a été trouvé
                    if (form) {

                        Swal.fire({
                            title: "Êtes-vous sûr(e) de vouloir enregistrer les modifications de cette session ?",
                            text: name,
                            icon: "question",
                            showCancelButton: true,
                            confirmButtonColor: "#198754",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Oui",
                            cancelButtonText: "Non",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                    } else {
                        console.error("Le formulaire n'a pas été trouvé.");
                    }
                }
            </script>







            {{-- -----------------------------------------------------------------------------------------------------    --}}



            {{-- footer  --}}
            <div class="container" id="pied-page">
            @endsection
