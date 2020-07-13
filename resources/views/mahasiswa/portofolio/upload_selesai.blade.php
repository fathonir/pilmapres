@extends('layouts.mahasiswa')
@section('content')
    <section class="content-header">
        <h1>Portofolio <small>Peserta</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Portofolio</a></li>
            <li class="active">Unggah Portofolio</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 clas="box-title">Unggah Portofolio</h3>
                    </div>
                    <div class="box-body">
                        <div class="callout callout-info">
                            <h4>Batas waktu unggah portofolio telah berakhir</h4>
                            <p><a href="{{ URL::to('mahasiswa/portofolio') }}">Kembali ke Data Portofolio</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection