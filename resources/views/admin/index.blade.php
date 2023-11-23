@extends('layouts.admin_menu')

@section('content')
    <div class="container">
        
        {{-- teste résumé --}}
        {{-- --------------------------------------------------------------------------------------------------------------------------------------- --}}
        
        <div class="row animate__animated animate__backInLeft" style="padding: 0;margin:0;">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-2 col-md-6 mb-1">
                <div class="card border-left-primary shadow h-80 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-center">
                                    Formations</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{ $totals['formations'] }}</div>
                            </div>
                            <div class="col-auto" style="padding-right: 5px;">
                                <i class="fas fa-award fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-2 col-md-6 mb-1">
                <div class="card border-left-dark shadow h-80 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1 text-center">
                                    Sessions</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{ $totals['sessions'] }}</div>
                            </div>
                            <div class="col-auto" style="padding-right: 5px;">
                                <i class="fas fa-people-group fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-2 col-md-6 mb-1">
                <div class="card border-left-success shadow h-80 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-center">
                                    Profésseurs</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{ $totals['profs'] }}</div>
                            </div>
                            <div class="col-auto" style="padding-right: 5px;">
                                <i class="fas fa-chalkboard-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-2 col-md-6 mb-1">
                <div class="card border-left-info shadow h-80 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1 text-center">
                                    Stagiaires</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{ $totals['etudiants'] }}</div>
                                </div>
                                <div class="col-auto" style="padding-right: 5px;">
                                    <i class="fas fa-address-card fa-2x text-gray-300"></i>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-2 col-md-6 mb-1">
                <div class="card border-left-secondary shadow h-80 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1 text-center">
                                    Inscriptions</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{ $totals['inscriptions'] }}</div>
                            </div>
                            <div class="col-auto" style="padding-right: 5px;">
                                <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-2 col-md-6 mb-1">
                <div class="card border-left-warning shadow h-80 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1 text-center">
                                    Messages</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{ $totals['messages'] }}</div>
                                </div>
                                <div class="col-auto" style="padding-right: 5px;">
                                <i class="fas fa-envelope fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        {{-- --------------------------------------------------------------------------------------------------------------------------------------- --}}



        <div class="row">
            <div class="col-12 text-center ">
                
                <div class="logo animate__animated animate__swing">
                    @foreach ($informations as $information)
                    <img src="{{ asset('storage/' . $information->logo) }}" class="img-fluid" alt="logo"
                    style="height: 150px;margin-bottom:30px;">
                    @endforeach
                </div>
                <div class="col-12 text-center">
                    <h1>{{$information->nom}}</h1>
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
        /* .card {
            text-align: center;
            background-color: white;
        } */
    </style>
@endsection
