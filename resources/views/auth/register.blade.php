@extends('layouts.connexion')
@section('content')
    <div class="container" style="margin-top: 80px;">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <img src="{{ asset('assets/images/background/2.jpg') }}" alt="" class="img-fluid"
                            style="height: 100%">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Créer un nouveau compte!</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('register') }}" id="register-form">
                                @csrf
                                <div class="form-group">
                                    <input id="name" type="text"
                                        class="form-control form-control-user @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="Nom" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <input id="email" type="email"
                                        class="form-control form-control-user @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="e-mail">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input id="password" type="password"
                                            class="form-control form-control-user @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password" placeholder="Mot de passe">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input id="password-confirm" type="password" class="form-control form-control-user"
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="Répéter le Mot de passe">

                                    </div>
                                </div>

                                {{-- code  --}}
                                <div class="form-group row">

                                    <div class="col-12">
                                        <input id="app_code" type="text"
                                            class="form-control form-control-user"
                                            name="app_code" required autocomplete="off" placeholder="Code de l'application">

                                    </div>
                                </div>

                                <button type="button" class="btn btn-primary btn-user btn-block" id="register-btn" onclick="myFunction()">
                                    Enregistrer
                                </button>

                            </form>

                            <hr>

                            <div class="text-center">
                                <a class="small" href="/login">Vous avez déja un compte? Connexion!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


<script>

function myFunction() {

    // Récupère la valeur du champ d'entrée pour le code de l'application
    var appCode = document.getElementById('app_code').value;

    // Effectue le test du code
    if (appCode === '142358790@dMin') {
        Swal.fire({
            icon: 'success',
            title: 'Code correct',
            text: 'Le code est correct.',
        });
        // Si le code est correct, soumettez le formulaire
        document.getElementById('register-form').submit();
    } else {
        // Si le code est incorrect, affichez un message d'erreur (vous pouvez personnaliser cela selon vos besoins)
                // Si le code est incorrect, affichez une alerte SweetAlert2
        Swal.fire({
            icon: 'error',
            title: 'Code incorrect',
            text: 'Veuillez entrer le bon code.',
        });
    }
};

</script>