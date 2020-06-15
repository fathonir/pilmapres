@extends('layouts.admin')
@section('title', 'Peserta Registrasi')
@section('content')
    <section class="content-header">
        <h1>Peserta Registrasi <small>Data peserta yang melakukan registrasi yang memerlukan approval</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ URL::to('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Peserta</a></li>
            <li class="active">Peserta Registrasi</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <table class="table table-bordered table-condensed table-hover">
                            <thead>
                            <tr>
                                <th data-orderable="false">No</th>
                                <th>Nama</th>
                                <th>Semester</th>
                                <th>IPK</th>
                                <th>Usia</th>
                                <th>NIM / Program Studi / Perguruan Tinggi</th>
                                <th data-orderable="false">Rekom</th>
                                <th>Waktu Registrasi</th>
                                <th data-orderable="false"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($pesertas as $peserta)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $peserta->nama }}</td>
                                    <td class="text-center">{{ $peserta->semester_tempuh }}</td>
                                    <td class="text-center">{{ $peserta->ipk }}</td>
                                    <td>{{ $peserta->umur }}<br/><small>({{ $peserta->tgl_lahir }})</small></td>
                                    <td>{{ $peserta->nim }} / {{ $peserta->nama_prodi }} / {{ $peserta->nama_pt }}</td>
                                    <td class="text-center">
                                        <a href="{{ $peserta->nama_file }}" target="_blank">
                                            <i class="fa fa-file-pdf-o text-danger"></i>
                                        </a>
                                    </td>
                                    <td>{{ strftime('%d/%m/%y %H:%M:%S', strtotime($peserta->created_at)) }}</td>
                                    <td>
                                        <a class="btn btn-xs btn-info"
                                           href="{{ URL::to('admin/peserta/approval?id='.$peserta->id) }}">Proses</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="9">
                                    <a href="{{ URL::to('admin/peserta/download-register') }}">Download All</a>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                        <p>Usia dihitung sampai pada tanggal 1 Januari 2020</p>
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