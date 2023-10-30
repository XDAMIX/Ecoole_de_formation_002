@extends('layouts.admin_menu')
@section('content')

<div class="container" style="padding-top: 10px;">
<div class="row">

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
            <option value="Fix">Fax</option>

        </select>
    </div>

    <div class="form-group">
        <label for="">Numéro:</label>
        <input type="text" name="numero" class="form-control @if($errors->get('numero')) is-invalid @endif" id="validationServer01" placeholder="numéro" value="{{ $telephone->numero }}">
                <div id="validationServer01Feedback" class="invalid-feedback">
                    @if($errors->get('numero'))
                    @foreach($errors->get('numero') as $message)
                    {{ $message }}
                    @endforeach
                    @endif
                </div>
    </div>

    <br>
    <div class="form-group">
        <input type="submit" class="form-control btn btn-success" value="Enregistrer">
    </div>
    <br>
    <div class="">
        <a href="{{ url('/admin/ecole') }}" class="btn btn-secondary">Annuler</a>
    </div>

</form>

</div>
</div>
@endsection
