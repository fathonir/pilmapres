@extends('layouts.mahasiswa')
@section('content')
    <section class="content-header">
        <h1>Beranda <small>Peserta</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        @if ($mahasiswa->photoExist)
                            <img class="profile-user-img img-responsive img-circle"
                                 src="{{ $mahasiswa->photoUrl }}">
                        @else
                            <img class="profile-user-img img-responsive img-circle"
                                 src="https://via.placeholder.com/128">
                        @endif

                        <h3 class="profile-username text-center">{{ $mahasiswa->nama }}</h3>
                        <p class="text-muted text-center">{{ $mahasiswa->programStudi->nama_prodi }}</p>
                        <p class="text-muted text-center">{{ $mahasiswa->perguruanTinggi->nama_pt }}</p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>IPK</b> <a class="pull-right">{{ $peserta->ipk }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Tingkat Semester</b> <a class="pull-right">{{ $peserta->semester_tempuh }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Umur</b> <a class="pull-right">{{ $mahasiswa->umur }}</a>
                            </li>
                        </ul>
                        <h4 class="text-center">Tahap 1</h4>
                        <p class="text-center">
                            <a href="{{ URL::to('mahasiswa/photo') }}" class="btn btn-primary">Update Pas Foto</a>
                            <a href="{{ URL::to('mahasiswa/portofolio/create') }}" class="btn btn-default">
                                <i class="fa fa-upload"></i> Unggah Portofolio</a>
                            <a href="{{ URL::to('mahasiswa/portofolio') }}" class="btn btn-default">
                                <i class="fa fa-folder-o"></i> Data Portofolio</a>
                        </p>
                        @if ($isLolosTahap2)
                            <hr/>
                            <h4 class="text-center">Tahap 2</h4>
                            <p class="text-center">
                                <a href="{{ URL::to('mahasiswa/gagasan-kreatif') }}" class="btn btn-info">
                                    <i class="fa fa-upload"></i> Unggah Gagasan Kreatif</a>
                            </p>
                        @endif
                        @if ($isLolosTahapFinal)
                            <hr/>
                            <h4 class="text-center">Tahap Final</h4>
                            <p class="text-center">
                                <a href="{{ URL::to('mahasiswa/biodata') }}" class="btn btn-default">
                                    <i class="fa fa-upload"></i> Biodata
                                </a>
                                <a href="{{ URL::to('mahasiswa/poster-gk') }}" class="btn btn-default">
                                    <i class="fa fa-upload"></i> Poster Gagasan Kreatif
                                </a>
                                <a href="{{ URL::to('mahasiswa/poster-diri') }}" class="btn btn-default">
                                    <i class="fa fa-upload"></i> Poster Diri
                                </a>
                                <a href="{{ URL::to('mahasiswa/pakta-integritas') }}" class="btn btn-default">
                                    <i class="fa fa-upload"></i> Pakta Integritas
                                </a>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Biodata</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-calendar-o margin-r-5"></i> Tempat &amp; Tanggal Lahir</strong>
                        <p class="text-muted">{{ $mahasiswa->tempat_lahir }}, {{ $mahasiswa->tgl_lahir_formated }}</p>
                        <hr>
                        <strong><i class="fa fa-envelope-square margin-r-5"></i> Email</strong>
                        <p class="text-muted">{{ $mahasiswa->email }}</p>
                        <strong><i class="fa fa-phone margin-r-5"></i> No HP</strong>
                        <p class="text-muted">{{ $mahasiswa->no_hp }}</p>
                        <hr>
                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Surat Rekomendasi</strong>
                        <p>
                            @if ($peserta->filePengantarPeserta != null)
                            <a href="{{ URL::to('file/surat-pengantar/'.$peserta->filePengantarPeserta->nama_file) }}" target="_blank">
                                {{ $peserta->filePengantarPeserta->nama_asli }}
                            </a>
                            @else
                                Sudah diverifikasi
                            @endif
                        </p>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
@endsection