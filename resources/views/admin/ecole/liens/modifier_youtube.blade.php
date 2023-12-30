@extends('layouts.admin_menu')
@section('content')


    <div class="container" id="titre-page">
        <div class="row">
            <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/ecole') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span
                        class="btn-description">Retour</span></a>
            </div>
            <div class="col-10 d-flex align-items-center">
                <h2>Modifier le lien vers le compte</h2>
            </div>
        </div>
    </div>

    <div class="container" style="padding-top: 10px;">
        <div class="row justify-content-center animate__animated animate__backInLeft">

            <div class="col-md-8">
                <div class="card shadow" style="background-color: #ffff;">
                    <div class="card-header"style="text-align:center;">
                        <a style="font-size: 20px;">Youtube</a>
                    </div>
                    <div class="card-body">

                        <form class="edit-form" action="{{ url('/admin/lien/' . $lien->id . '/Youtubesave') }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="">Lien de votre page:</label>
                                <input type="text" name="lien"
                                    class="form-control @if ($errors->get('lien')) is-invalid @endif"
                                    id="validationServer01" placeholder="Coller le lien ici" value="{{ $lien->lien }}">
                                <div id="validationServer01Feedback" class="invalid-feedback">
                                    @if ($errors->get('lien'))
                                        @foreach ($errors->get('lien') as $message)
                                            {{ $message }}
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <br>

                            <div class="form-group row justify-content-center text-center">
                                <div class="col-6">
                                    <button type="button" onclick="sauvegarder(this)" class="btn btn-outline-success alpa shadow"><i
                                        class="bi bi-check2"></i><span
                                        class="btn-description">Enregistrer</span></button>
                                </div>
                                <div class="col-6">
                                    <a class="btn btn-outline-danger alpa shadow" href="{{ '/admin/ecole' }}"><i
                                            class="bi bi-x"></i><span class="btn-description">Annuler</span></a>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
    {{-- --------------------------------------------------------------     --}}

    {{-- script sauvegarder  --}}
    <script>
        function sauvegarder(button) {
            // Utilisez le bouton pour obtenir le formulaire parent
            const form = button.closest('.edit-form');
    
            // Vérifiez si le formulaire a été trouvé
            if (form) {
    
                Swal.fire({
                    title: "Êtes-vous sûr(e) de vouloir enregistrer les modifications ?",
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



{{-- ------------------------------ --}}
    {{-- footer  --}}
<div class="container" id="pied-page">
@endsection
