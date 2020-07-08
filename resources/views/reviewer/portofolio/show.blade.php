@extends('layouts.reviewer')
@section('content')
    <section class="content-header">
        <h1>Penilaian Portofolio</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Portofolio</a></li>
            <li class="active">Penilaian Portofolio</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-body">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-2">Nama</label>
                                <p class="form-control-static col-md-4">{{ $peserta->mahasiswa->nama }}</p>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Prodi / PT</label>
                                <p class="form-control-static col-md-4">
                                    {{ $peserta->mahasiswa->programStudi->nama_prodi }} /
                                    {{ $peserta->mahasiswa->perguruanTinggi->nama_pt }}
                                </p>
                            </div>
                        </div>
                        <a href="{{ URL::to('reviewer/portofolio?kegiatan_id=1&tahapan_id=1') }}"
                           class="btn btn-default">Kembali</a>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Prestasi</th>
                                <th>Lembaga Pemberi / Nama Event</th>
                                <th>Kelompok</th>
                                <th>Tingkat</th>
                                <th>File</th>
                                <th>Nilai / Komentar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($peserta->filePesertas->sortBy('id') as $filePeserta)
                                <tr>
                                    <td class="text-center"><h4>{{ $loop->iteration }}</h4></td>
                                    <td>
                                        <h4>{{ $filePeserta->nama_prestasi }}</h4>
                                        Tahun: <span class="text-success">{{ $filePeserta->tahun }}</span><br/>
                                        Jenis: {{ $filePeserta->jenisPrestasi->jenis_prestasi }}
                                    </td>
                                    <td><h5>{{ $filePeserta->nama_lembaga_event }}</h5></td>
                                    <td><h5>{{ ($filePeserta->is_kelompok == 1) ? 'Kelompok' : 'Individu' }}</h5></td>
                                    <td><h5>{{ $filePeserta->tingkatPrestasi->tingkat_prestasi }}</h5></td>
                                    <td class="text-center">
                                        <h3>
                                            <a href="{{ URL::to($filePesertaPath.'/'.$filePeserta->nama_file) }}" target="_blank">
                                                <i class="fa fa-file-o"></i>
                                            </a>
                                        </h3>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ URL::current() }}" id="form-{{ $filePeserta->id }}" data-id="{{ $filePeserta->id }}">
                                            {{ method_field('PUT') }}
                                            {{ csrf_field() }}
                                            <input type="hidden" name="file_peserta_id" value="{{ $filePeserta->id }}" />
                                            <div class="form-group">
                                                <select name="skor_id" data-id="{{ $filePeserta->id }}" class="form-control input-sm" required>
                                                    <option value="">Pilih Nilai</option>
                                                    @foreach ($kelompokSkors as $kelompokSkor)
                                                        <optgroup label="{{ $kelompokSkor->kelompok_skor }}"></optgroup>
                                                        @foreach ($kelompokSkor->skors as $skor)
                                                            @if ($filePeserta->hasilPenilaian != null)
                                                                <option value="{{ $skor->id }}" {{ $filePeserta->hasilPenilaian->skor_id == $skor->id ? 'selected' : '' }}>{{ $skor->nama_skor }}</option>
                                                            @else
                                                                <option value="{{ $skor->id }}">{{ $skor->nama_skor }}</option>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <textarea name="komentar" data-id="{{ $filePeserta->id }}" class="form-control" style="width: 350px;"
                                                          required>{{ $filePeserta->hasilPenilaian ? $filePeserta->hasilPenilaian->komentar : '' }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" id="btn-{{ $filePeserta->id }}" class="btn btn-xs btn-primary" style="display: none" value="Simpan"/>
                                                <div class="alert alert-success alert-success-{{ $filePeserta->id }}" style="display: none">
                                                    Penilaian berhasil disimpan
                                                </div>
                                                <div class="alert alert-danger alert-danger-{{ $filePeserta->id }}" style="display: none">
                                                    Penilaian gagal disimpan
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer">
                        <a href="{{ URL::to('reviewer/portofolio?kegiatan_id=1&tahapan_id=1') }}"
                           class="btn btn-default">Kembali</a>
                        <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    {!! Html::script('node_modules/jquery-validation/dist/jquery.validate.min.js') !!}
    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="skor_id"]').on('change', function () {
                var id = $(this).data('id');
                $('#btn-' + id).show();
                $('.alert-success-' + id).hide();
                $('.alert-danger-' + id).hide();
            });
            $('textarea[name="komentar"]').on('change keyup paste', function () {
                var id = $(this).data('id');
                $('#btn-' + id).show();
                $('.alert-success-' + id).hide();
                $('.alert-danger-' + id).hide();
            });
            // Validate All Form
            $('form').each(function () {
                $(this).validate({
                    messages: {
                        nilai: {required: 'Harap pilih nilai'},
                        komentar: {required: 'Harap isi komentar'}
                    },
                    submitHandler: function (form) {
                        var id = $(form).data('id');
                        $.post(
                            form.action,
                            $(form).serialize(),
                            function (data) {
                                if (data === 1) {
                                    $('#btn-' + id).hide();
                                    $('.alert-success-' + id).show();
                                } else {
                                    $('#btn-' + id).hide();
                                    $('.alert-danger-' + id).show();
                                }
                            },
                            'json'
                        );
                        return false;
                    }
                });
            });
        });
    </script>
@endsection