@extends('layouts.app')

@section('title', 'Registrasi Mahasiswa')

@section('content')
<div class="container">
    <div class="row">
        <br><br>
        <div class="login-logo">
            <a href="#"><img class="site_logo" alt="Site Logo" src="front/img/FAI.png" style="width: 320px;"></a>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrasi Mahasiswa</div>
                <div class="panel-body">
                    <div class="alert alert-{{ $alert_type }}" role="alert">{{ $alert_message }}</div>
                    <a class="btn btn-default" href="{{ url('register-peserta') }}">Kembali ke Registrasi</a>
                    <a class="btn btn-default" href="{{ URL::to('/') }}">Kembali ke Halaman Depan</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection