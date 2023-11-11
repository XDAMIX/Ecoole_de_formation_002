@extends('layouts.admin_menu')

@section('content')

<div class="container" style="padding-top: 10px;">
    <div class="row">
        <div class="col text-center ">

            <div class="logo">
                @foreach($informations as $information)
                <img src="{{ asset('storage/'.$information->logo) }}" class="img-fluid" alt="logo" style="height: 200px;margin-bottom:30px;">
                @endforeach
            </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @auth
                    {{ __('Bienvenue ' ) }} <b>{{ Auth::user()->name }}</b>{{ __( ' Vous êtes maintenant connecté') }}
                    @endauth

        </div>
    </div>
</div>



<div class="teste_dompdf" style="width: 100%; text-align:center;padding:100px;">
    <a href="{{('/testepdf')}}" class="btn btn-warning">Teste Impression PDF</a>
</div>



{{-- --------------------------------------------------------------------------------------------------------------------------------------- --}}

                        <!-- Footer -->
                        <div class="container" style="width:100%;position: fixed;bottom:0;">
                                <div class="row">
                                    <div class="col-12" style="text-align:center;">
                                        <p>Copyright &copy; Infinity-Concepts 2022</p>
                                    </div>
                                </div>
                        </div>
                        <!-- End of Footer -->

{{-- --------------------------------------------------------------------------------------------------------------------------------------- --}}






<style>
    .card{
        text-align: center;
        background-color: white;
    }
</style>


@endsection
