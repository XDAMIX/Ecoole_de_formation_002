@extends('layouts.menu_paccino')
@section('content')
    <style>
        .btn {
            width: 150px;
            padding: 10px 15px;
            border-radius: 50px;
            font-size: 16px;
            /* color: black;  */
            font-weight: bold;
            text-transform: uppercase;
        }

        i {
            font-size: 18px;
        }

        .actualite {
            cursor: pointer;

        }
    </style>

    {{-- ---------------------------------------------------------------------------------------------------- --}}

    <div class="container" style="padding-top: 100px;">
        <div class="row">

            <div class="col-12 text-center">
                <h1 style="color: black; font-weight:bold; text-transform: uppercase;">Gallerie</h1>
            </div>

            @foreach ($photos as $photo)
                <div class="actualite col-lg-3 col-md-3 col-sm-12 col-xs-12 animate__animated animate__backInLeft"
                    style="margin-bottom: 10px;">
                    <form class="actualite-form" action="" data-id="{{ $photo->id }}"
                        data-name="{{ $photo->titre . ' : ' . $photo->emplacement . ' : ' . $photo->dure }}"
                        data-photo="{{ asset('storage/' . $photo->photo) }}" data-text="{{ $photo->description }}"
                        method="GET">
                        @csrf

                        <div class="card shadow" onclick="VoirActualite(this)">
                            <div class=""
                                style="background-image: url({{ asset('storage/' . $photo->photo) }} );background-size: cover;background-position: center;background-repeat: no-repeat;  height:400px; width:100%;border-top-left-radius: 5px;border-top-right-radius: 5px;">
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                                        <h4 class="card-title text-primary">{{ $photo->titre }}</h4>
                                    </div>
                                    <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                                        <h4 class="card-title">{{ $photo->emplacement }}</h4>
                                    </div>
                                    <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                                        <p class="card-text text-secondary">{{ $photo->dure }}</p>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </form>

                </div>
            @endforeach


        </div>
    </div>


    {{-- ---------------------------------------------------------------------------------------------------- --}}

    <script>
        function VoirActualite(button) {
            // Utilisez le bouton pour obtenir le formulaire parent
            const form = button.closest('.actualite-form');

            // Vérifiez si le formulaire a été trouvé
            if (form) {
                // Utilisez le formulaire pour extraire l'ID
                const id = form.dataset.id;
                const name = form.dataset.name;
                const text = form.dataset.text;
                const photo = form.dataset.photo;
                Swal.fire({
                    title: name,
                    text: text,
                    imageUrl: photo,
                    imageWidth: 400,
                    imageHeight: 300,
                    imageAlt: "gallerie image"
                });
            } else {
                console.error("Le formulaire n'a pas été trouvé.");
            }
        }
    </script>


    {{-- ---------------------------------------------------------------------------------------------------- --}}
@endsection
