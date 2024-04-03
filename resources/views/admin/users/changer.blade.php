@extends('layouts.admin_menu')
@section('content')
    {{-- retour en arrière  --}}
    <div class="container" id="titre-page">
        <div class="row">
            <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/user/' . $user->id) }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span
                        class="btn-description">Retour</span></a>
            </div>
            <div class="col-8  text-center">
                <h2>Modifier le mot de passe</h2>
            </div>
        </div>
    </div>

    {{-- -------------------------------------------------------------------------------------- --}}

    <div class="container" style="margin-top: 10px;">

        <div class="row justify-content-center animate__animated animate__backInLeft">

            <div class="col-12 col-md-8 card shadow" style="background-color: #ffff;">

                <div class="card-body">

                    <form class="changer-mdp" action="{{ url('/admin/user/' . $user->id . '/changer-mot-de-passe') }}" data-id="{{ $user->id }}"
                        data-name="{{ $user->name }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="row">

                            <!-- Champ pour le mot de passe actuel -->
                            <div class="col-12 form-group">
                                <label for="mot_de_passe_actuel">Mot de passe actuel :</label>
                                <input type="password" name="mot_de_passe_actuel" id="mot_de_passe_actuel"
                                    class="form-control">
                                @error('mot_de_passe_actuel')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Champ pour le nouveau mot de passe -->
                            <div class="col-12 form-group">
                                <label for="nouveau_mot_de_passe">Nouveau mot de passe :</label>
                                <input type="password" name="nouveau_mot_de_passe" id="nouveau_mot_de_passe"
                                    class="form-control">
                                @error('nouveau_mot_de_passe')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Champ pour la confirmation du nouveau mot de passe -->
                            <div class="col-12 form-group">
                                <label for="nouveau_mot_de_passe_confirmation">Confirmer le nouveau mot de passe :</label>
                                <input type="password" name="nouveau_mot_de_passe_confirmation"
                                    id="nouveau_mot_de_passe_confirmation" class="form-control">
                                    @error('nouveau_mot_de_passe_confirmation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-12">
                                <div class="row d-flex justify-content-center align-items-center text-center">
                                    <div class="col-6">
                                        {{-- save button    --}}

                                        <button type="button" onclick="changer_mdp_confirmation(this)"
                                            class="btn btn-outline-success btn-lg shadow mt-3 ml-1 alpa">
                                            <i class="bi bi-pen"></i>
                                            <span class="btn-description">Enregistrer</span>
                                        </button>

                                    </div>

                                    <div class="col-6">
                                        {{-- annuler button    --}}
                                        <a class="btn btn-outline-danger btn-lg alpa shadow mt-3"
                                            href="{{ url('/admin/user/' . $user->id) }}">
                                            <i class="bi bi-x"></i>
                                            <span class="btn-description">Annuler</span>
                                        </a>

                                    </div>
                                </div>
                            </div>



                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>

    {{-- -------------------------------------------------------------------------------------- --}}
    {{-- script sauvegarder  --}}
    <script>
        function changer_mdp_confirmation(button) {
            
            const form = button.closest('.changer-mdp');
            
            if (form) {

                const id = form.dataset.id;
                const name = form.dataset.name;

                Swal.fire({
                    title: "Êtes-vous sûr(e) de vouloir changer le mot de passe ?",
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

    {{-- -------------------------------------------------------------------------------------- --}}

    {{-- footer  --}}
    <div class="container" id="pied-page">
    @endsection
