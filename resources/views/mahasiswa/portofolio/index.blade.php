@extends('layouts.mahasiswa')
@section('content')
    <section class="content-header">
        <h1>Portofolio <small>Peserta</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Portofolio</a></li>
            <li class="active">Data Portofolio</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Portofolio</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Jenis Prestasi</th>
                                <th>Prestasi</th>
                                <th>Tahun</th>
                                <th>Lembaga Pemberi / Nama Event</th>
                                <th>Kelompok</th>
                                <th>Tingkat</th>
                                <th>File</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($peserta->filePesertas as $filePeserta)
                                <tr>
                                    <td>{{ $filePeserta->jenisPrestasi->jenis_prestasi }}</td>
                                    <td>{{ $filePeserta->nama_prestasi }}</td>
                                    <td>{{ $filePeserta->tahun }}</td>
                                    <td>{{ $filePeserta->nama_lembaga_event }}</td>
                                    <td>{{ ($filePeserta->is_kelompok == 1) ? 'Kelompok' : 'Individu' }}</td>
                                    <td>{{ $filePeserta->tingkatPrestasi->tingkat_prestasi }}</td>
                                    <td>
                                        <a href="{{ URL::to($filePesertaPath.'/'.$filePeserta->nama_file) }}"
                                           target="_blank">
                                            <i class="fa fa-file-o"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ URL::to('mahasiswa/portofolio/'.$filePeserta->id.'/edit') }}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer">
                        <a href="{{ URL::to('mahasiswa/portofolio/create') }}" class="btn btn-info">
                            <i class="fa fa-plus"></i> Tambah Portofolio
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection