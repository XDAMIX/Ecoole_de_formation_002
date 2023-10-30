@extends('layouts.admin_menu')
@section('content')

<div class="container" style="padding-top: 10px;">
    <div class="row">

    <div class="head">
        <h3 style="text-transform: uppercase;">boite de réception</h3>
    </div>

        <div class="col-md-12">

            <table class="table table-sm">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">N°</th>
                        <th scope="col">Nom</th>
                        <th scope="col">e-mail</th>
                        <th scope="col">N° de téléphone</th>
                        <th scope="col">Sujet</th>
                        <th scope="col">Date et Heure</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($messages as $message)
                    <tr>
                        <td>{{ $message->id }}</td>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->tel }}</td>
                        <td>{{ $message->subject }}</td>
                        <td>{{ $message->created_at }}</td>

                        <td>
                        <form action="{{ url('/admin/messages/'.$message->id.'/delete') }}" method="POST">
                            @csrf
                             @method('DELETE')
                            <a href="{{ url('/admin/messages/'.$message->id.'/show') }}" class="btn btn-primary" style="margin-bottom: 5px;" ><i class="bi bi-envelope-paper"></i>Ouvrir</a>
                            <button type="submit" onclick="return confirm('Êtes vous sure?')" class="btn btn-danger"><i class="bi bi-trash3"></i>Supprimer</button>
                         </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>


<style>

    .head{
        text-align: center;
        color: var(--color5);
    }
    table{
        background-color: white;
    }
    th{
        text-transform: uppercase;
        text-align: center;
        vertical-align: middle;
    }
    td{
        text-align: center;
        vertical-align: middle;
    }
</style>
@endsection
