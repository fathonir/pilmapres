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
    {!! Html::style('vendor/twitter/bootstrap/dist/css/bootstrap.min.css') !!}
    {!! Html::style('vendor/almasaeed2010/adminlte/dist/css/AdminLTE.min.css') !!}
    {!! Html::style('vendor/fortawesome/font-awesome/css/font-awesome.min.css') !!}
    @yield('head')
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    {!! Html::script('vendor/components/jquery/jquery.min.js') !!}
    {!! Html::script('vendor/twitter/bootstrap/dist/js/bootstrap.min.js') !!}
    {!! Html::script('vendor/almasaeed2010/adminlte/dist/js/adminlte.min.js') !!}
    {!! Html::script('js/icheck.min.js') !!}
    {!! Html::script('js/app.js') !!}
    @yield('js')
</body>
</html>
