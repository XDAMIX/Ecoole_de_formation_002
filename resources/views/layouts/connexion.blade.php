<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">



{{-- vite --}}

{{-- bootstrap --}}
@vite(['resources/autres/vendor/bootstrap-icons/bootstrap-icons.css'])
@vite(['resources/autres/vendor/bootstrap/css/bootstrap.min.css','resources/autres/vendor/bootstrap/js/bootstrap.bundle.min.js','resources/autres/vendor/bootstrap/scss/bootstrap.scss'])

{{-- jquery --}}
@vite(['resources/autres/vendor/jquery/jquery.min.js', 'resources/autres/vendor/jquery-easing/jquery.easing.min.js'])

{{-- chart --}}
@vite(['resources/autres/vendor/chart.js/Chart.min.js', 'resources/js/demo/chart-area-demo.js', 'resources/js/demo/chart-pie-demo.js'])

{{-- fontawesome --}}
@vite(['resources/autres/vendor/fontawesome-free/css/all.min.css'])


{{-- resources + template sb_admin --}}
@vite(['resources/js/sb-admin-2.min.js', 'resources/css/sb-admin-2.min.css', 'resources/css/sb-admin-2.css', 'resources/sass/sb-admin/sb-admin-2.scss'])

</head>
<body class="bg-gradient-primary">


    @yield('content')

    @include('sweetalert::alert')


</body>
</html>
