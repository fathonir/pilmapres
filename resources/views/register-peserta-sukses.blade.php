@extends('layouts.home')
{!! Html::style('css/sweetalert.css') !!}
{!! Html::script('js/sweetalert.min.js') !!}
@section('content')
@include('sweet::alert')
@endsection