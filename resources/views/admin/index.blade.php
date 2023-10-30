@extends('layouts.admin_menu')

@section('content')

<div class="container" style="padding-top: 10px;">
    <div class="row">
        <div class="col text-center ">

            <div class="logo">
                <img src="{{asset('assets/images/logo/logo.png')}}" class="img-fluid" alt="logo" style="height: 200px;margin-bottom:30px;">
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
{{-- --------------------------------------------------------------------------------------------------------------------------------------- --}}

                        <!-- Footer -->
                        <footer class="sticky-footer bg-transparent">
                            <div class="container my-auto">
                                <div class="copyright text-center my-auto">
                                    <span>Copyright &copy; Infinity-Concepts 2022</span>
                                </div>
                            </div>
                        </footer>
                        <!-- End of Footer -->

{{-- --------------------------------------------------------------------------------------------------------------------------------------- --}}






<style>
    .card{
        text-align: center;
        background-color: white;
    }
</style>


@endsection
