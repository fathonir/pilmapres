<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @if (App::environment() == 'production')
    <link rel="apple-touch-icon" sizes="57x57" href="https://www.kemdikbud.go.id/main/addons/shared_addons/themes/november_theme/img/icon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="https://www.kemdikbud.go.id/main/addons/shared_addons/themes/november_theme/img/icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="https://www.kemdikbud.go.id/main/addons/shared_addons/themes/november_theme/img/icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="https://www.kemdikbud.go.id/main/addons/shared_addons/themes/november_theme/img/icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="https://www.kemdikbud.go.id/main/addons/shared_addons/themes/november_theme/img/icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="https://www.kemdikbud.go.id/main/addons/shared_addons/themes/november_theme/img/icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="https://www.kemdikbud.go.id/main/addons/shared_addons/themes/november_theme/img/icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="https://www.kemdikbud.go.id/main/addons/shared_addons/themes/november_theme/img/icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="https://www.kemdikbud.go.id/main/addons/shared_addons/themes/november_theme/img/icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="https://www.kemdikbud.go.id/main/addons/shared_addons/themes/november_theme/img/icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://www.kemdikbud.go.id/main/addons/shared_addons/themes/november_theme/img/kemdikbud_32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="https://www.kemdikbud.go.id/main/addons/shared_addons/themes/november_theme/img/kemdikbud_64x64.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://www.kemdikbud.go.id/main/addons/shared_addons/themes/november_theme/img/kemdikbud_16x16.png">
    <link rel="manifest" href="https://www.kemdikbud.go.id/main/addons/shared_addons/themes/november_theme/img/icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="https://www.kemdikbud.go.id/main/addons/shared_addons/themes/november_theme/img/icon/ms-icon-144x144.png">
    @endif
    
    <title>PILMAPRES 2020 | @yield('title')</title>
    
    {!! Html::style('vendor/twitter/bootstrap/dist/css/bootstrap.min.css') !!}
    {!! Html::style('vendor/almasaeed2010/adminlte/dist/css/AdminLTE.min.css') !!}
    {!! Html::style('vendor/fortawesome/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('css/app.css') !!}
    
    @if (App::environment() == 'production')
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    @endif
    
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
    {!! Html::script('js/app.js') !!}
    @yield('js')
</body>
</html>
