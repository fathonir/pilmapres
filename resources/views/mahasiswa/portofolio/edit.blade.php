@extends('layouts.mahasiswa')
@section('content')
    <section class="content-header">
        <h1>Portofolio <small>Peserta</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Portofolio</a></li>
            <li class="active">Edit Portofolio</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 clas="box-title">Edit Portofolio</h3>
                    </div>
                    <form role="form" method="POST" action="{{ URL::to('mahasiswa/portofolio/'.$filePeserta->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="box-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group {{ $errors->has('jenis_prestasi_id') ? 'has-error' : '' }}">
                                <label>Jenis Prestasi</label>
                                <select class="form-control" name="jenis_prestasi_id">
                                    <option value="">-- PILIH --</option>
                                    @foreach ($kelompokPrestasis as $kelompokPrestasi)
                                        <optgroup label="{{ $kelompokPrestasi->kelompok_prestasi }}"></optgroup>
                                        @foreach ($kelompokPrestasi->jenisPrestasis as $jenisPrestasi)
                                            <option value="{{ $jenisPrestasi->id }}"
                                                    {{ $jenisPrestasi->id == old('jenis_prestasi_id', $filePeserta->jenis_prestasi_id) ? 'selected' : '' }}>
                                                {{ $jenisPrestasi->jenis_prestasi }}
                                            </option>
                                        @endforeach
                                    @endforeach
                                </select>
                                @if ($errors->has('jenis_prestasi_id'))
                                    <span class="help-block">{{ $errors->first('jenis_prestasi_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('file_bukti') ? 'has-error' : '' }}">
                                <label for="exampleInputFile">File Bukti (PDF)</label>
                                <input type="file" id="exampleInputFile" name="file_bukti">
                                <span><a href="{{ $filePeserta->fileUrl }}" target="_blank">{{ $filePeserta->nama_asli }}</a></span>
                            </div>
                            <div class="row">
                                <div class="col-sm-10 form-group {{ $errors->has('nama_prestasi') ? 'has-error' : '' }}">
                                    <label>Prestasi</label>
                                    <input type="text" class="form-control" name="nama_prestasi"
                                           placeholder="Tuliskan keterangan Prestasi. Misal, Juara 1 Renang"
                                           value="{{ old('nama_prestasi', $filePeserta->nama_prestasi) }}">
                                </div>
                                <div class="col-sm-2 form-group  {{ $errors->has('tahun') ? 'has-error' : '' }}">
                                    <label>Tahun Perolehan</label>
                                    <input type="text" class="form-control" name="tahun" placeholder="Cth. 2019"
                                           value="{{ old('tahun', $filePeserta->tahun) }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10 form-group {{ $errors->has('nama_lembaga_event') ? 'has-error' : '' }}">
                                    <label>Lembaga Pemberi / Nama Event</label>
                                    <input type="text" class="form-control" name="nama_lembaga_event"
                                           value="{{ old('nama_lembaga_event', $filePeserta->nama_lembaga_event) }}">
                                    <span class="help-block">Lembaga/Individu yang memberikan</span>
                                </div>
                                <div class="col-sm-2 form-group">
                                    <label>Individu / Kelompok</label>
                                    <select class="form-control" name="is_kelompok">
                                        <option value="0" {{ old('is_kelompok', $filePeserta->is_kelompok) == '0' ? 'selected':'' }}>Individu</option>
                                        <option value="1" {{ old('is_kelompok', $filePeserta->is_kelompok) == '1' ? 'selected':'' }}>Kelompok</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group {{ $errors->has('tingkat_prestasi_id') ? 'has-error' : '' }}">
                                    <label>Tingkat</label>
                                    <select class="form-control" name="tingkat_prestasi_id">
                                        <option value=""></option>
                                        @foreach ($tingkatPrestasis as $tingkatPrestasi)
                                            <option value="{{ $tingkatPrestasi->id }}"
                                                    {{ old('tingkat_prestasi_id', $filePeserta->tingkat_prestasi_id) == $tingkatPrestasi->id ? 'selected':'' }}>
                                                {{ $tingkatPrestasi->tingkat_prestasi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 form-group {{ $errors->has('jumlah_peserta') ? 'has-error' : '' }}">
                                    <label>Jumlah Peserta</label>
                                    <input type="text" class="form-control" name="jumlah_peserta"
                                           value="{{ old('jumlah_peserta', $filePeserta->jumlah_peserta) }}" placeholder="Contoh 100">
                                    <span class="help-block">Jumlah pada Event</span>
                                </div>
                                <div class="col-md-4 form-group {{ $errors->has('jumlah_penghargaan_pada_event') ? 'has-error' : '' }}">
                                    <label>Jumlah Penghargaan pada Event</label>
                                    <input type="text" class="form-control" name="jumlah_penghargaan_pada_event"
                                           value="{{ old('jumlah_penghargaan_pada_event', $filePeserta->jumlah_penghargaan_pada_event) }}" placeholder="Contoh. 3">
                                    <span class="help-block">Juara yg diberikan pada Event</span>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <a href="{{ URL::to('mahasiswa/portofolio') }}" class="btn btn-default margin-r-5">Ke Data Portofolio</a>
                            <a href="{{ URL::to('mahasiswa/home') }}" class="btn btn-default">Ke Beranda</a>
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection