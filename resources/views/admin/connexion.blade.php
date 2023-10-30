@extends('layouts.connexion')

@section('content')
<div class="container" style="margin-top: 10px;">
        <div class="row">
        @if (Route::has('login'))

        <img src="images/logo.png" class="img-fluid">

                <div class="col" style="margin-top:30px;text-align: center;">
                    @auth
                        <a href="{{ url('/admin') }}" class="btn btn-primary">Dashbord</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Connexion</a>

                        <!-- @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary">Inscription</a>
                        @endif -->
                    @endauth
                </div>
            @endif

<style>
    a{
        margin: 5px;
    }
</style>
@endsection
