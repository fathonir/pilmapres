@extends('layouts.mahasiswa')
@section('content')
    <section class="content-header">
        <h1>Poster Gagasan Kreatif <small>Peserta</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
            <li>Peserta</li>
            <li class="active">Poster Gagasan Kreatif</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-default">
                    <form method="post" action="{{ action('Mahasiswa\PosterGKController@store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <h4>Batas upload file :
                                {{ strftime('%d %B %Y %H:%M:%S', strtotime($jadwalKegiatan->tgl_awal_upload)) }}
                                s.d. {{ strftime('%d %B %Y %H:%M:%S', strtotime($jadwalKegiatan->tgl_akhir_upload)) }} </h4>
                            @if (session('alert-success'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-check"></i> File poster gagasan kreatif berhasil diupload!</h4>
                                    Anda masih bisa memperbarui file selama dalam masa periode upload.
                                </div>
                            @endif
                            @if ($isJadwalAvailable)
                                <div class="form-group">
                                    <label for="filePosterGK">Poster Gagasan Kreatif</label>
                                    <input type="file" id="filePosterGK" name="filePosterGK">
                                    <p class="help-block">Format file: {{ $syarat->allowed_types }} maksimum {{ $syarat->max_size_mb }}MB</p>
                                </div>
                            @endif
                            @if ($filePeserta)
                                <div class="form-group">
                                    <p class="form-control-static">
                                        <a href="{{ URL::to($filePesertaPath.'/'.$filePeserta->nama_file) }}">
                                            <i class="fa fa-file-pdf-o"></i>
                                            {{ $filePeserta->nama_asli }}
                                        </a>
                                    </p>
                                </div>
                            @endif
                            @if ($errors->has('filePosterGK'))
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-ban"></i> Upload Gagal</h4>
                                    {{ $errors->first('filePosterGK') }}
                                </div>
                            @endif
                            <ul>
                                <li>Pastikan mengupload pada batas waktu</li>
                                <li>Upload diluar batas waktu yang ditentukan tidak akan diterima oleh sistem</li>
                            </ul>
                        </div>
                        <div class="box-footer">
                            <a href="{{ URL::to('mahasiswa/home') }}" class="btn btn-default">Ke Beranda</a>
                            @if ($isJadwalAvailable)
                                <button type="submit" class="btn btn-primary pull-right">Upload</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection