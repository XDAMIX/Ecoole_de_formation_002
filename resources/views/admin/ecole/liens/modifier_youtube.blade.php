@extends('layouts.admin_menu')
@section('content')

<div class="container" style="padding-top: 10px;">
<div class="row">

<form action="{{ url('/admin/lien/'.$lien->id.'/Youtubesave') }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Réseau social:</label>
        <p>{{ $lien->reseau_social }}</p>
    </div>
    <div class="form-group">
        <label for="">Lien de votre page:</label>
        <input type="text" name="lien" class="form-control @if($errors->get('lien')) is-invalid @endif" id="validationServer01" placeholder="numéro" value="{{ $lien->lien }}">
                <div id="validationServer01Feedback" class="invalid-feedback">
                    @if($errors->get('lien'))
                    @foreach($errors->get('lien') as $message)
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
