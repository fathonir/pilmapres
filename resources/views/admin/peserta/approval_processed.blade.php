@extends('layouts.admin')
@section('title', 'Peserta Registrasi')
@section('content')
    <section class="content-header">
        <h1>Peserta Registrasi <small>Data peserta yang melakukan registrasi yang memerlukan approval</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ URL::to('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Peserta</a></li>
            <li class="active">Peserta Registrasi</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Approval</h3>
                    </div>
                    <div class="box-body">
                        <div class="alert alert-info alert-dismissible">
                            <h4><i class="icon fa fa-info"></i> Peserta berhasil di proses!</h4>
                            Peserta sudah di proses {{ session('proses') }}. Email pemberitahuan akan dikirim ke peserta.
                        </div>
                        <a href="{{ URL::to('admin/peserta/register') }}" class="btn btn-default">
                            Kembali ke Daftar Peserta Registrasi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection