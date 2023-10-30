@extends('layouts.admin_menu')
@section('content')

<div class="container" style="padding-top: 10px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
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
        <div class="col-md-8 button">
            <a href="{{url('/admin/messages')}}" class="btn btn-secondary">Retour</a>
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
    .button{
        padding: 10px;
        text-align: center;
    }
</style>

@endsection
