@extends('layouts.admin_menu')
@section('content')


<div class="container" id="titre-page">
    <div class="row">
        <div class="col-2 d-flex align-items-center">
            <a href="{{ url('/admin/faq') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span
                    class="btn-description">Retour</span></a>
        </div>
        <div class="col-10 text-center">
            <h2>Ajouter une nouvelle Question / Réponse</h2>
        </div>
    </div>
</div>


{{-- -------------------------------------------------------------------------------------- --}}

<div class="container">

    <div class="row animate__animated animate__backInLeft">
        <div class="col-md-12">
            <div class="card shadow" style="background-color: #ffff;">
                {{-- <div class="card-header"style="text-align:center;">
              <a style="font-size: 20px;">Nouveau bloc de présentation</a>
            </div> --}}
                <div class="card-body">


                    <form class="add-form" action="{{ url('/admin/faq/save') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <label for="">Question:</label>
                            <textarea type="text" name="question" class="form-control @if ($errors->get('question')) is-invalid @endif"
                                id="validationQuestion" placeholder="la question" value="" required>{{ old('question') }}</textarea>
                            <div id="validationQuestionFeedback" class="invalid-feedback">
                                @if ($errors->get('question'))
                                    @foreach ($errors->get('question') as $message)
                                        {{ $message }}
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <label for="">Sa Réponse:</label>
                            <textarea type="text" name="reponse" class="form-control @if ($errors->get('reponse')) is-invalid @endif"
                                id="validationReponse" placeholder="le réponse" value="" required>{{ old('reponse') }}</textarea>
                            <div id="validationReponseFeedback" class="invalid-feedback">
                                @if ($errors->get('reponse'))
                                    @foreach ($errors->get('reponse') as $message)
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
                                <a class="btn btn-outline-danger alpa shadow" href="{{ '/admin/faq' }}"><i
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
                    title: "Êtes-vous sûr(e) de vouloir enregistrer cette Question/Réponse ?",
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
    <div class="container" id="pied-page">


@endsection
