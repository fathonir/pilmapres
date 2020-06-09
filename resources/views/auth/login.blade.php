@extends('layouts.app')
@section('title', 'Login')
@section('head')
{!! Html::style('css/sweetalert.css') !!}
@endsection

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="#"><img class="site_logo" alt="Site Logo" src="front/img/FAI.png" style="width: 320px;"></a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg"><b>Login</b></p>
    
    <!-- form dari appp.blade -->
    <span style="color: red;">{{ $errors->first('failed_auth') }}</span>
    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email"  placeholder="Email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="row">
            <div class="col-xs-8">
              <a href="{{ url('register-peserta') }}">Ke Registrasi Mahasiswa</a>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat" style="color:white;background-color:#3294e7; border:2px">Login</button>
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-xs-12">
                <a href="{{ url('/') }}">Ke Halaman Depan</a>
            </div>
        </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
@endsection

@section('js')
{!! Html::script('js/sweetalert.min.js') !!}
@include('sweet::alert')
@endsection