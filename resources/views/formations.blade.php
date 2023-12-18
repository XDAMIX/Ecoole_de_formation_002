@extends('layouts.menu_paccino')
@section('content')

<style>
    .btn{
      width:150px;
      padding: 10px 15px;
      border-radius: 50px;
      font-size: 16px;
      /* color: black;  */
      font-weight:bold; 
      text-transform: uppercase;
    }
    i{
      font-size: 18px;
    }
  </style>


    <div class="container" style="padding-top: 100px;">
        <div class="row">

            <div class="col-12 text-center">
                <h1 style="color: black; font-weight:bold; text-transform: uppercase;">Nos Formations</h1>
            </div>

            @foreach ($formations as $formation)
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 animate__animated animate__backInLeft"
                    style="margin-bottom: 10px;">

                    <div class="card shadow">
                        <div class=""
                            style="background-image: url({{ asset('storage/' . $formation->photo) }} );background-size: cover;background-position: center;background-repeat: no-repeat;  height:400px; width:100%;border-top-left-radius: 5px;border-top-right-radius: 5px;">
                        </div>
                        {{-- <img src="{{ asset('storage/'.$photo->photo )}}" class="card-img-top" alt="..." style="height:100%;"> --}}
                        <div class="card-body">
                            <div class="form-group row">

                                <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                                    <h4 class="card-title">{{ $formation->titre }}</h4>
                                </div>

                                <div style="text-align: center;align-items:center;">

                                    {{-- bouttons --}}
                                    <div class="form-group row" id="double-btn" style="padding-top:10px;">

                                        <div class="col-6">
                                            <a href="{{ url('/voirplus/' . $formation->id ) }}"
                                                class="btn btn-primary alpa shadow" style="margin-bottom: 5px;"><i
                                                    class="bi bi-eye"></i> <span class="btn-description">Lire</span></a>
                                        </div>
                                        <div class="col-6">

                                            {{-- register button    --}}
                                            <form class="register-form" action="" data-id="{{ $formation->id }}"
                                                data-name="{{ $formation->titre }}" method="GET">
                                                @csrf
                                                <button type="button" onclick="register_confirmation(this)"
                                                    class="btn btn-success alpa shadow"
                                                    style="margin-bottom: 5px;"><i class="bi bi-mortarboard-fill"></i> <span
                                                        class="btn-description">S'Inscrir</span></button>
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





    {{-- script register  --}}
    <script>
        function register_confirmation(button) {
            // Utilisez le bouton pour obtenir le formulaire parent
            const form = button.closest('.register-form');

            // Vérifiez si le formulaire a été trouvé
            if (form) {
                // Utilisez le formulaire pour extraire l'ID
                const id = form.dataset.id;
                const name = form.dataset.name;

                Swal.fire({
                    title: "Êtes-vous sûr(e) de vouloir faire votre inscription à cette formation?",
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
                        form.action = `/inscription/${id}`;
                        form.submit();
                    }
                });
            } else {
                console.error("Le formulaire n'a pas été trouvé.");
            }
        }
    </script>
@endsection
