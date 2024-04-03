@extends('layouts.admin_menu')
@section('content')
    {{-- retour en arrière  --}}
    <div class="container" id="titre-page">
        <div class="row">
            <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/session') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span
                        class="btn-description">Retour</span></a>
            </div>
            <div class="col-8  text-center">
                <h2>Ajouter une nouvelle session</h2>
            </div>
        </div>
    </div>



    {{-- -------------------------------------------------------------------------------------- --}}

    <div class="container" style="margin-top: 10px;">

        <div class="row animate__animated animate__backInLeft">

            <div class="card shadow" style="background-color: #ffff;">


                <div class="card-body">

                    <form action="{{ url('/admin/session/save') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="">Nom de la session:</label>
                            <input name="nom" type="text" placeholder="titre de la session" class="form-control"
                                required>
                        </div>





                        <!-- Votre formulaire HTML -->
                        <div class="form-group">
                            <label for="">Formation:</label>
                            <select class="form-control" id="formation" name="formation">
                                @foreach ($formations as $formation)
                                    <option value="{{ $formation->id }}">{{ $formation->titre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Nom de professeur:</label>
                            <select class="form-control" id="profs" name="prof">
                                <!-- Les professeurs filtrés seront affichés ici -->
                            </select>
                        </div>




                        {{-- bouttons --}}
                        <div class="form-group row justify-content-center text-center" id="double-btn">
                            <div class="col-6">
                                <button type="submit" class="btn btn-outline-success alpa shadow"><i
                                        class="bi bi-check2"></i> <span class="btn-description">Enregistrer</span> </button>
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






            {{-- -----------------------------------------------------------------------------------------------------    --}}



            {{-- footer  --}}
            <div class="container" id="pied-page">
            @endsection
