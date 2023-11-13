@extends('layouts.admin_menu')
@section('content')

<div class="container" id="titre-page">
    <div class="row">
        <div class="col-2 d-flex align-items-center">
            <a href="{{ url('/admin/ecole') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span class="btn-description">Retour</span></a>
        </div>
        <div class="col-10 d-flex align-items-center">
            <h2>Modification de numéro de téléphone</h2>
        </div>
    </div>
</div>

<div class="container" style="padding-top: 10px;">

<div class="row justify-content-center">
    
        <div class="col-md-6">
        <div class="card" style="background-color: #ffff;">
                {{-- <div class="card-header"style="text-align:center;">
                  <a style="font-size: 20px;">Numéro de téléphone</a>
                </div> --}}
                <div class="card-body">

<form action="{{ url('/admin/tel/'.$telephone->id.'/update') }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Opérateur:</label><br>
        <select name="operateur">
        <option value='{{ $telephone->operateur }}' selected hidden> {{ $telephone->operateur }}</option>
            <option value="Ooredoo">Ooredoo</option>
            <option value="Mobilis">Mobilis</option>
            <option value="Djezzy">Djezzy</option>
            <option value="Fix">Fix</option>
            <option value="Fax">Fax</option>

        </select>
    </div>

    <div class="form-group">
        <label for="">Numéro:</label>
        <input type="text" name="numero" class="form-control @if($errors->get('numero')) is-invalid @endif" id="validationServer01" placeholder="Veuillez saisir le numéro ici" value="{{ $telephone->numero }}">
                <div id="validationServer01Feedback" class="invalid-feedback">
                    @if($errors->get('numero'))
                    @foreach($errors->get('numero') as $message)
                    {{ $message }}
                    @endforeach
                    @endif
                </div>
    </div>


    <br>
    <div class="form-group row justify-content-center text-center">
        <div class="col-6">
            <button type="submit" class="btn btn-outline-success"><i class="bi bi-check2"></i><span
                    class="btn-description">Enregistrer</span></button>
        </div>
        <div class="col-6">
            <a class="btn btn-outline-danger" href="{{ '/admin/ecole' }}"><i
                    class="bi bi-x"></i><span class="btn-description">Annuler</span></a>
        </div>
    </div>


    </form>
    </div>
    </div>

    </div>
    </div>

</div>
{{-- footer  --}}
<div class="container" id="pied-page">
@endsection
