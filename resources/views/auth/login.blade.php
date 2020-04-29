@extends('layouts.app')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="/"><img class="site_logo" alt="Site Logo" src="/front/img/FAI.png" style="width: 320px;"></a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg"><b>Sign in</b></p>
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
              <a href="#">I forgot my password</a>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat" style="color:white;background-color:#3294e7; border:2px">Sign In</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
    <div class="row">
        <div class="col-xs-12">
          Don't have account yet? <a href="/register-peserta">Register</a>
        </div>
    </div>
  </div>
  <!-- /.login-box-body -->
</div>
@endsection
