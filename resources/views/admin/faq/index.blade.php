@extends('layouts.admin_menu')
@section('content')
    {{-- retour à l'acceuil  --}}
    <div class="container" id="titre-page">
        <div class="row">
            <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/') }}" class="btn btn-dark"><i class="bi bi-house"></i><span
                        class="btn-description">Acceuil</span></a>
            </div>
            <div class="col-10 text-center">
                <h2>Foire au questions</h2>
            </div>
        </div>
    </div>


    {{-- -------------------------------------------------------------------------------------- --}}

    <div class="container" style="padding-top: 10px;">
        <div class="row faq">

            <div class="col-12">

                <ul class="faq-list" style="width: 100%;">

                    @foreach ($questions as $question)
                        <div class="row">

                            <div class="col-12 animate__animated animate__backInLeft" style="margin-bottom: 10px;">

                                <div class="card shadow">

                                    <div class="card-body">
                                        <li>

                                            <div data-bs-toggle="collapse" class="collapsed question"
                                            href="{{ '#faq' . $question->id }}" style="padding:20px;">
                                            <i class="bi bi-chevron-down icon-show ifaq"></i><i
                                                class="bi bi-chevron-up icon-close ifaq"></i>
                                                <label for="">Question : {{ $question->id }}</label>
                                                <p>{{ $question->question }}</p>
                                            </div>

                                            <div id="{{ 'faq' . $question->id }}" class="collapse"
                                                data-bs-parent=".faq-list" style="padding-left:26px;color:rgb(55, 75, 172);">
                                                <label for="" style="padding-left: 26px;">Réponse :</label>
                                                <p>{{ $question->reponse }}</p>
                                            </div>

                                        </li>

                                        {{-- bouttons --}}
                                        <div class="form-group row" id="double-btn"
                                            style="padding-top:10px;text-align:center;">


                                            <div class="col-6">

                                                {{-- edit button    --}}
                                                <form class="edit-form" action="" data-id="{{ $question->id }}"
                                                    data-name="{{ $question->question }}" method="GET">
                                                    @csrf
                                                    <button type="button" onclick="edit_confirmation(this)"
                                                        class="btn btn-outline-primary alpa shadow"
                                                        style="margin-bottom: 5px;"><i class="bi bi-pen"></i> <span
                                                            class="btn-description">Modifier</span></button>
                                                </form>

                                            </div>


                                            <div class="col-6">

                                                {{-- delete button  --}}
                                                <form class="delete-form" action="" data-id="{{ $question->id }}"
                                                    data-name="{{ $question->question }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" onclick="supprimer_confirmation(this)"
                                                        class="btn btn-outline-danger alpa shadow"><i
                                                            class="bi bi-trash3"></i>
                                                        <span class="btn-description">Supprimer</span></button>
                                                </form>

                                            </div>

                                        </div>
                                        {{-- bouttons         --}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </ul>

            </div>
        </div>

    </div>

    {{-- -------------------------------------------------------------------------------------- --}}
    <style>
        /*--------------------------------------------------------------
          # Frequently Asked Questioins
          --------------------------------------------------------------*/
        .faq {
            padding: 60px 0;
        }

        .faq .faq-list {
            padding: 0;
            list-style: none;
        }

        .faq .faq-list li {
            border-bottom: 1px solid #d9f1f2;
            margin-bottom: 20px;
            padding-bottom: 20px;
            font-size: 18px;
        }

        .faq .faq-list .question {
            display: block;
            position: relative;
            font-family: var(--fontfr4);
            font-size: 18px;
            line-height: 24px;
            font-weight: 400;
            padding-left: 25px;
            cursor: pointer;
            color: var(--color4);
            transition: 0.3s;
        }

        .faq .faq-list .ifaq {
            font-size: 16px;
            position: relative;
            /* position: absolute; */
            /* left: 0;
            top: -2px; */
            padding-right: 5px;
        }

        .faq .faq-list p {
            margin-bottom: 0;
            padding: 10px 0 0 25px;
        }

        .faq .faq-list .icon-show {
            display: none;
        }

        .faq .faq-list .collapsed {
            color: black;
        }

        .faq .faq-list .collapsed:hover {
            color: var(--color4);
        }

        .faq .faq-list .collapsed .icon-show {
            display: inline-block;
            transition: 0.6s;
        }

        .faq .faq-list .collapsed .icon-close {
            display: none;
            transition: 0.2s;
        }
        label{
            text-transform: uppercase;
            font-weight: bold;
        }
    </style>


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
                        title: "Êtes-vous sûr(e) de vouloir supprimer cette Question/Réponse ?",
                        // text: name,
                        icon: "question",
                        showCancelButton: true,
                        confirmButtonColor: "#198754",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Oui, Supprime-la",
                        cancelButtonText: "Non, Annuler",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Mettez à jour l'action du formulaire avec l'ID et soumettez-le
                            form.action = `/admin/faq/${id}/delete`;
                            form.submit();
  
                            Swal.fire({
                                title: "Question/Réponse supprimée !",
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
                        title: "Êtes-vous sûr(e) de vouloir modifier cette Question/Réponse ?",
                        // text: name,
                        icon: "question",
                        showCancelButton: true,
                        confirmButtonColor: "#198754",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Oui",
                        cancelButtonText: "Non",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Mettez à jour l'action du formulaire avec l'ID et soumettez-le
                            form.action = `/admin/faq/${id}/edit`;
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
