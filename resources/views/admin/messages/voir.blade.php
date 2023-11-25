@extends('layouts.admin_menu')
@section('content')

<div class="container" id="titre-page">
    <div class="row">
        <div class="col-2 d-flex align-items-center">
            <a href="{{ url('/admin/messages') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span
                    class="btn-description">Retour</span></a>
        </div>
        <div class="col-10 d-flex align-items-center">
            <h2>Lire le message</h2>
        </div>
    </div>
</div>

{{-- ---------------------------------------------------------- --}}

<div class="container" style="padding-top: 10px;">
    <div class="row justify-content-center animate__animated animate__backInLeft">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">Message</div>
                <div class="card-body">
                 <label>date et heure:</label>
                 <p>{{$message->created_at}}</p>
                 <label>nom et prénom:</label>
                 <p>{{$message->name}}</p>
                 <label>n° de téléphone:</label>
                 <p>{{$message->tel}}</p>
                 <label>e-mail:</label>
                 <p>{{$message->email}}</p>
                 <hr>
                 <label>sujet:</label>
                 <p>{{$message->subject}}</p>
                 <label>message:</label>
                 <p>{{$message->texte}}</p>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    .card{
        text-align: center;
    }
    .card-body{
        padding: 10px;
    }
    label{
        font-weight: bold;
        text-transform: uppercase;
    }
    /* .button{
        padding: 10px;
        text-align: center;
    } */
</style>

@endsection
