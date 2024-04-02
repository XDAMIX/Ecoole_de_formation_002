@extends('layouts.admin_menu')
@section('content')

    <script>
        function previewImage() {
            var file = document.getElementById("validationServer06").files;
            if (file.length > 0) {
                var fileReader = new FileReader();

                fileReader.onload = function(event) {
                    document.getElementById("preview").setAttribute("src", event.target.result)
                };
                fileReader.readAsDataURL(file[0]);
            }
        }
    </script>

    {{-- -------------------------------------------------------------------------------------- --}}
    <div class="container" id="titre-page">
        <div class="row">
            <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/types_p') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span
                        class="btn-description">Retour</span></a>
            </div>
            <div class="col-10  text-center">
                <h2>Ajouter le titre de fichier a fournir </h2>
            </div>
        </div>
    </div>


{{-- -------------------------------------------------------------------------------------- --}}

    <div class="container-fluid d-flex justify-content-center align-items-center ">

        <div class="row animate__animated animate__backInLeft">
            <div class="col-md-12">
                <div class="card shadow" style="background-color: #ffff;">

                    <div class="card-body">




                        <form class="add-form" action="{{ url('/admin/dossier/save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Titre:</label>
                                <input type="text" name="titre"
                                    class="form-control @if ($errors->get('titre')) is-invalid @endif"
                                    id="ValidationTitre" placeholder="le titre" value="{{ old('titre') }}" required>
                                <div id="ValidationTitreFeedback" class="invalid-feedback">
                                    @if ($errors->get('titre'))
                                        @foreach ($errors->get('titre') as $message)
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
                                    <a class="btn btn-outline-danger alpa shadow" href="{{ '/admin/types_p' }}"><i
                                            class="bi bi-x"></i><span class="btn-description">Annuler</span></a>
                                </div>
                            </div>



                        </form>

                    </div>
                </div>

            </div>
        </div>


    </div>







    {{-- script sauvegarder  --}}
    <script>
        function sauvegarder(button) {
            // Utilisez le bouton pour obtenir le formulaire parent
            const form = button.closest('.add-form');
    
            // Vérifiez si le formulaire a été trouvé
            if (form) {
    
                Swal.fire({
                    title: "Êtes-vous sûr(e) de vouloir enregistrer cette formation ?",
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







    {{-- footer  --}}
    <div class="container" id="pied-page"></div>

    @endsection
