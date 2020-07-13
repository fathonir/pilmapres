@extends('layouts.mahasiswa')
@section('content')
    <section class="content-header">
        <h1>Portofolio <small>Peserta</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Portofolio</a></li>
            <li class="active">Submit Portofolio</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 clas="box-title">Submit Portofolio</h3>
                    </div>
                    <div class="box-body">
                        <h4>Apakah anda yakin untuk melakukan submit file portofolio ?</h4>
                        <p>Setelah disubmit maka informasi portofolio tidak bisa diubah kembali</p>
                        <form method="post" action="{{ URL::to('mahasiswa/portofolio/submit-file') }}">
                            {{ csrf_field() }}
                            <a href="{{ URL::to('mahasiswa/portofolio') }}" class="btn btn-default">Kembali</a>
                            <input type="submit" value="Submit" class="btn btn-primary" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection