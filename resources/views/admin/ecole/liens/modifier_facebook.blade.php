@extends('layouts.admin_menu')
@section('content')


    <div class="container" id="titre-page">
        <div class="row">
            <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/ecole') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span
                        class="btn-description">Retour</span></a>
            </div>
            <div class="col-10 d-flex align-items-center">
                <h2>Modifier le lien vers le compte</h2>
            </div>
        </div>
    </div>

    <div class="container" style="padding-top: 10px;">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card" style="background-color: #ffff;">
                    <div class="card-header"style="text-align:center;">
                        <a style="font-size: 20px;">Facebook</a>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('/admin/lien/' . $lien->id . '/Facebooksave') }}" method="post">
                            @csrf
                            @method('PUT')
                            {{-- <div class="form-group">
                                <label for="">Réseau social:</label>
                                <p>{{ $lien->reseau_social }}</p>
                            </div> --}}
                            <div class="form-group">
                                <label for="">Lien de votre page:</label>
                                <input type="text" name="lien"
                                    class="form-control @if ($errors->get('lien')) is-invalid @endif"
                                    id="validationServer01" placeholder="Coller le lien ici" value="{{ $lien->lien }}">
                                <div id="validationServer01Feedback" class="invalid-feedback">
                                    @if ($errors->get('lien'))
                                        @foreach ($errors->get('lien') as $message)
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
