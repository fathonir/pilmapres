@extends('layouts.mahasiswa')
@section('content')
    <section class="content-header">
        <h1>Portofolio <small>Peserta</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Portofolio</a></li>
            <li class="active">Hapus Portofolio</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 clas="box-title">Hapus Portofolio</h3>
                    </div>
                    <form role="form" method="POST" action="{{ URL::to('mahasiswa/portofolio/'.$filePeserta->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="box-body">
                            <div class="form-group">
                                <label>Jenis Prestasi</label>
                                <p class="form-control-static">
                                    {{ $filePeserta->jenisPrestasi->kelompokPrestasi->kelompok_prestasi }} /
                                    {{ $filePeserta->jenisPrestasi->jenis_prestasi }}
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File Bukti (PDF)</label>
                                <p class="form-control-static">
                                    <a href="{{ $filePeserta->fileUrl }}" target="_blank">{{ $filePeserta->nama_asli }}</a>
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-sm-8 form-group">
                                    <label>Prestasi</label>
                                    <p class="form-control-static">{{ $filePeserta->nama_prestasi }}</p>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label>Tahun Perolehan</label>
                                    <p class="form-control-static">{{ $filePeserta->tahun }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8 form-group">
                                    <label>Lembaga Pemberi / Nama Event</label>
                                    <p class="form-control-static">{{ $filePeserta->nama_lembaga_event }}</p>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label>Individu / Kelompok</label>
                                    <p class="form-control-static">{{ $filePeserta->is_kelompok ? 'Kelompok' : 'Individu' }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label>Tingkat</label>
                                    <p class="form-control-static">{{ $filePeserta->tingkatPrestasi->tingkat_prestasi }}</p>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Jumlah Peserta</label>
                                    <p class="form-control-static">{{ $filePeserta->jumlah_peserta }}</p>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Jumlah Penghargaan pada Event</label>
                                    <p class="form-control-static">{{ $filePeserta->jumlah_penghargaan_pada_event }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <a href="{{ URL::to('mahasiswa/portofolio') }}" class="btn btn-default margin-r-5">Ke Data Portofolio</a>
                            <a href="{{ URL::to('mahasiswa/home') }}" class="btn btn-default">Ke Beranda</a>
                            <button type="submit" class="btn btn-danger pull-right">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection