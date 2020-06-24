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
                    <form role="form" method="POST" action="{{ URL::to('mahasiswa/portofolio') }}"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
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
                                            <option value="{{ $jenisPrestasi->id }}">
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
                            </div>
                            <div class="row">
                                <div class="col-sm-10 form-group {{ $errors->has('nama_prestasi') ? 'has-error' : '' }}">
                                    <label>Prestasi</label>
                                    <input type="text" class="form-control" name="nama_prestasi"
                                           placeholder="Tuliskan keterangan Prestasi. Misal, Juara 1 Renang"
                                           value="{{ old('nama_prestasi') }}">
                                </div>
                                <div class="col-sm-2 form-group  {{ $errors->has('tahun') ? 'has-error' : '' }}">
                                    <label>Tahun Perolehan</label>
                                    <input type="text" class="form-control" name="tahun" placeholder="Cth. 2019"
                                           value="{{ old('tahun') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10 form-group {{ $errors->has('nama_lembaga_event') ? 'has-error' : '' }}">
                                    <label>Lembaga Pemberi / Nama Event</label>
                                    <input type="text" class="form-control" name="nama_lembaga_event">
                                    <span class="help-block">Lembaga/Individu yang memberikan</span>
                                </div>
                                <div class="col-sm-2 form-group">
                                    <label>Individu / Kelompok</label>
                                    <select class="form-control" name="is_kelompok">
                                        <option value="0">Individu</option>
                                        <option value="1">Kelompok</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group {{ $errors->has('tingkat_prestasi_id') ? 'has-error' : '' }}">
                                    <label>Tingkat</label>
                                    <select class="form-control" name="tingkat_prestasi_id">
                                        <option value=""></option>
                                        @foreach ($tingkatPrestasis as $tingkatPrestasi)
                                            <option value="{{ $tingkatPrestasi->id }}">
                                                {{ $tingkatPrestasi->tingkat_prestasi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Jumlah Peserta</label>
                                    <input type="text" class="form-control" name="jumlah_peserta">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Jumlah Penghargaan pada Event</label>
                                    <input type="text" class="form-control" name="jumlah_penghargaan_pada_event">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ URL::to('mahasiswa/home') }}" class="btn btn-default pull-right">
                                Ke Beranda</a>
                            <a href="{{ URL::to('mahasiswa/portofolio') }}"
                               class="btn btn-default pull-right margin-r-5">
                                Ke Data Portofolio</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection