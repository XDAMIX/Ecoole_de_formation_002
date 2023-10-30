@extends('layouts.connexion')
@section('content')

<div class="container" style="margin-top: 40px;">

    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        {{-- <div class="col-lg-6 d-none d-lg-block" style=" background-image: url('{{asset('assets/images/background/1.jpg')}}');background-position: center center;background-repeat: no-repeat;background-attachment: fixed;background-size: cover;"> --}}
                            <div class="col-lg-6 d-none d-lg-block" >
                                <img src="{{asset('assets/images/background/1.jpg')}}" alt="" class="img-fluid" style="height: 100%">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                    <h1>Connexion</h1>
                                    <h1 class="h4 text-gray-900 mb-4">Content de te revoir!</h1>
                                </div>
                                {{-- ------------------------------------------------------------------------------------ --}}
                                <form method="POST" action="{{ route('login') }}" class="user">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                            aria-describedby="emailHelp"
                                            placeholder="Adresse e-mail..." id="email" type="email" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                                        </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                           placeholder="Mot de passe..." id="password" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Se souvenir de moi') }}
                                                </label>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Connécter
                                        </button>


                                        @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Vous avez oublier votre mot de passe?') }}
                                        </a>
                                        @endif

                                </form>
                                {{-- ------------------------------------------------------------------------------------ --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>


@endsection





