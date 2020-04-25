<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PILMAPRES 2020</title>
    <!-- Styles -->
    {!! Html::style('css/AdminLTE.min.css') !!}
    {!! Html::style('css/font-awesome.min.css') !!}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    {!! Html::script('js/jquery-2.2.3.min.js') !!}
    {!! Html::script('js/bootstrap.js') !!}
    {!! Html::script('js/adminlte.min.js') !!}
    {!! Html::script('js/icheck.min.js') !!}
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
