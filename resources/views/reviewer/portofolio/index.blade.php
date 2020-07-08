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
                    <div class="box-header">
                        <form method="get" action="{{ URL::current() }}">
                            <div class="form-group">
                                <select class="form-control" name="kegiatan_id"
                                        style="display:inline-block; width: 300px">
                                    <option value="">-- Pilih Kegiatan --</option>
                                    @foreach ($kegiatans as $kegiatan)
                                        <option value="{{ $kegiatan->id }}"
                                                {{ $kegiatan->id == Request::get('kegiatan_id') ? 'selected' : '' }}>
                                            {{ $kegiatan->program->nama_program_singkat }} {{ $kegiatan->tahun }}
                                        </option>
                                    @endforeach
                                </select>
                                <select class="form-control" name="tahapan_id"
                                        style="display:inline-block; width: 200px">
                                    <option value="">-- Pilih Tahapan --</option>
                                    @foreach ($tahapans as $tahapan)
                                        <option value="{{ $tahapan->id }}"
                                                {{ $tahapan->id == Request::get('tahapan_id') ? 'selected' : '' }}>
                                            {{ $tahapan->nama_tahapan }}
                                        </option>
                                    @endforeach
                                </select>
                                <input type="submit" class="btn btn-default" value="Tampilkan" />
                            </div>
                        </form>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-condensed">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Peserta</th>
                                <th>Program Studi / Perguruan Tinggi</th>
                                <th class="text-center" data-orderable="false">Portofolio</th>
                                <th class="text-center" data-orderable="false">Dinilai</th>
                                <th class="text-center" data-orderable="false">Nilai Total</th>
                                <th data-orderable="false"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if ($pesertas)
                                @foreach ($pesertas as $peserta)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $peserta->nama }}</td>
                                        <td>{{ $peserta->nama_prodi }} / {{ $peserta->nama_pt }}</td>
                                        <td class="text-center">{{ $peserta->jumlah_file }}</td>
                                        <td class="text-center">{{ $peserta->jumlah_file_dinilai }}</td>
                                        <td class="text-center">{{ $peserta->nilai_reviewer }}</td>
                                        <td class="text-center">
                                            <a href="{{ URL::to('reviewer/portofolio/'.$peserta->id) }}" class="btn btn-xs btn-info">Nilai</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('table').DataTable({stateSave: true});
        });
    </script>
@endsection