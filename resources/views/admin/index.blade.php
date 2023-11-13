@extends('layouts.admin_menu')

@section('content')
    <div class="container" style="padding-top: 10px;">

        {{-- teste résumé --}}
        {{-- --------------------------------------------------------------------------------------------------------------------------------------- --}}

        <div class="row" style="padding: 0;margin:0;">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-80 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total des Formations :</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-success shadow h-80 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total des Profésseurs :</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-info shadow h-80 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total des Stagiaires :
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-80 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    Total des Inscriptions :</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-80 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Total des Messages :</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-dark shadow h-80 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                    Sessions en cours :</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- --------------------------------------------------------------------------------------------------------------------------------------- --}}



        <div class="row">
            <div class="col text-center ">

                <div class="logo">
                    @foreach ($informations as $information)
                        <img src="{{ asset('storage/' . $information->logo) }}" class="img-fluid" alt="logo"
                            style="height: 150px;margin-bottom:30px;">
                    @endforeach
                </div>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @auth
                    {{ __('Bienvenue ') }} <b>{{ Auth::user()->name }}</b>{{ __(' Vous êtes maintenant connecté') }}
                @endauth

            </div>
        </div>
    </div>



    {{-- <div class="teste_dompdf" style="width: 100%; text-align:center;padding:100px;">
    <a href="{{('/testepdf')}}" class="btn btn-warning">Teste Impression PDF</a>
</div> --}}



    {{-- --------------------------------------------------------------------------------------------------------------------------------------- --}}

    <!-- Footer -->
    <div class="container" style="width:100%;position: fixed;bottom:0;text-align:center;">
        <div class="row">
            <div class="col-12" style="text-align:center;">
                <p>Copyright &copy; Infinity-Concepts 2022</p>
            </div>
        </div>
    </div>
    <!-- End of Footer -->

    {{-- --------------------------------------------------------------------------------------------------------------------------------------- --}}






    <style>
        .card {
            text-align: center;
            background-color: white;
        }
    </style>
@endsection
