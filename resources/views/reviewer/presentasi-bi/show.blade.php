@extends('layouts.reviewer')
@section('content')
    <section class="content-header">
        <h1>Presentasi Bahasa Inggris</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Penilaian Final</a></li>
            <li class="active">Presentasi Bahasa Inggris</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-body">

                        @if (session('alert-success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                                <p>Nilai berhasil disimpan.</p>
                                <a href="{{ URL::to('reviewer/presentasi-bi?kegiatan_id='.$peserta->kegiatan_id) }}">Kembali ke Daftar Peserta</a>
                            </div>
                        @endif

                        @if ($errors->count() > 0)
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-ban"></i> Gagal!</h4>
                                Masih terdapat isian nilai yang belum lengkap. Silahkan cek isian yang berwarna merah
                                untuk melanjutkan penilaian.
                            </div>
                        @endif

                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-2">Nama</label>
                                <p class="form-control-static col-md-4">{{ $peserta->mahasiswa->nama }}</p>
                                <label class="control-label col-md-2">Kelompok</label>
                                <p class="form-control-static col-md-4">{{ $peserta->kelompokPeserta->kelompok_peserta }}</p>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Prodi / PT</label>
                                <p class="form-control-static col-md-4">
                                    {{ $peserta->mahasiswa->programStudi->nama_prodi }} /
                                    {{ $peserta->mahasiswa->perguruanTinggi->nama_pt }}
                                </p>
                            </div>
                        </div>
                        <a href="{{ URL::to('reviewer/presentasi-bi?kegiatan_id='.$peserta->kegiatan_id) }}"
                           class="btn btn-default">Kembali</a>
                    </div>
                    <div class="box-body" id="panelPDF" style="display: none">
                        <a class="btn btn-default btn-sm pull-right" id="btnCloseFile">Tutup</a>
                        <iframe style="position: relative; width: 100%; height: 700px"></iframe>
                    </div>
                    <div class="box-body">
                        <form method="post" action="{{ URL::current() }}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}

                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Dimensi Penilaian</th>
                                    <th class="text-center" style="width: 100px">Skor</th>
                                    <th class="text-center">Nilai</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($penilaians as $penilaian)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{!! $penilaian->kriteria !!}</td>
                                        <td class="text-center">
                                            <div class="form-group {{ $errors->first('skor.'.$penilaian->id) ? 'has-error' : '' }}" >
                                                <input type="number" min="3" max="25" step="1" class="form-control" name="skor[{{ $penilaian->id }}]" value="{{ old('skor.'.$penilaian->id, $penilaian->skor) }}" data-id="{{ $penilaian->id }}" data-bobot="{{ $penilaian->bobot }}"/>
                                            </div>
                                        </td>
                                        <td class="text-center" style="font-size: larger">
                                            <label name="nilai[{{ $penilaian->id }}]">{{ old('skor.'.$penilaian->id) != '' ? (old('skor.'.$penilaian->id) * $penilaian->bobot) : $penilaian->nilai }}</label>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3"></td>
                                    <td class="text-center" style="font-size: larger">
                                        <label name="nilai_reviewer">{{ $plotReviewer->nilai_reviewer }}</label>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <div class="form-group {{ $errors->first('komentar') ? 'has-error' : '' }}">
                                <label class="control-label">Komentar</label>
                                <textarea class="form-control" name="komentar" rows="4">{{ old('komentar', $plotReviewer->komentar) }}</textarea>
                            </div>

                            <div class="form-group">
                                <a href="{{ URL::to('reviewer/presentasi-bi?kegiatan_id='.$peserta->kegiatan_id) }}" class="btn btn-default">Kembali</a>
                                <input type="submit" class="btn btn-primary" value="Simpan" />
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script type="text/javascript">
        $('#btnOpenFileGK').on('click', function() {
            $('#panelPDF').show();
            var filePath = $('#fileGK').attr('href');
            $('#panelPDF').find('iframe').attr('src', filePath);
        });
        $('#btnOpenFilePoster').on('click', function() {
            $('#panelPDF').show();
            var filePath = $('#filePoster').attr('href');
            $('#panelPDF').find('iframe').attr('src', filePath);
        });
        $('#btnCloseFile').on('click', function() {
            $('#panelPDF').hide();
        });
    </script>
@endsection