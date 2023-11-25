@extends('layouts.admin_menu')
@section('content')
    {{-- retour à l'acceuil  --}}
    <div class="container" id="titre-page">
        <div class="row">
            <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/') }}" class="btn btn-dark"><i class="bi bi-house"></i><span
                        class="btn-description">Acceuil</span></a>
            </div>
            <div class="col-10 d-flex align-items-center">
                <h2>Calcul du revenu</h2>
            </div>
        </div>
    </div>
{{-- ---------------------------------------------------------------------------------------------------------------------- --}}

<div class="container bg-white animate__animated animate__backInLeft" style="padding: 50px;margin-top:10px;">

<hr>

    <div class="row">

        <div class="col-6">
            <h1>Aujourd'huit : {{ \Carbon\Carbon::now()->toDateString() }}</h1>
        </div>
        <div class="col-6 justify-content-center text-center">
            <h1 style="color: green" id="jour">{{ $totalJour }} DA</h1>
        </div>
    </div>

<hr>

    <div class="row">
        <div class="col-6">
            <h1>En ce mois-ci : {{ \Carbon\Carbon::now()->format('F') }}</h1>
        </div>
        <div class="col-6 justify-content-center text-center">
            <h1 style="color: green" id="moi">{{ $totalMoi }} DA</h1>
        </div>
    </div>

<hr>

    <div class="row">
        <div class="col-6">
            <h1>Cette année : <span>{{ \Carbon\Carbon::now()->format('Y') }}</span></h1>
            
        </div>
        <div class="col-6 justify-content-center text-center">
            <h1 style="color: green" id="annee">{{ $totalAnnee }} DA</h1>
        </div>
    </div>

<hr>
    


</div>



    
    {{-- footer  --}}
    <div class="container" id="pied-page">
    @endsection