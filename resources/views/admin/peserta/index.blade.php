@extends('layouts.admin')
@section('title', 'Data Peserta')
@section('content')
    <section class="content-header">
        <h1>Data Peserta PILMAPRES <small>Tahun {{ $kegiatan->tahun }}</small></h1>
        <ol class="breadcrumb">
            <li><a href="{{ URL::to('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Peserta</a></li>
            <li class="active">Data Peserta</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th data-orderable="false">No</th>
                                <th>Nama</th>
                                <th>Semester</th>
                                <th>IPK</th>
                                <th>Usia</th>
                                <th>NIM / Program Studi / Perguruan Tinggi</th>
                                <th>Username</th>
                                <th data-orderable="false">Status</th>
                                <th data-orderable="false"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pesertas as $peserta)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $peserta->nama }}</td>
                                    <td>{{ $peserta->semester_tempuh }}</td>
                                    <td>{{ $peserta->ipk }}</td>
                                    <td>{{ $peserta->umur }}</td>
                                    <td>{{ $peserta->nim }} / {{ $peserta->nama_prodi }} / {{ $peserta->nama_pt }}</td>
                                    <td>{{ $peserta->username }}</td>
                                    <td></td>
                                    <td>
                                        <a href="{{ URL::to('admin/peserta/'.$peserta->id.'/edit') }}" class="btn btn-xs btn-info">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="9">
                                    <a href="#">Download All Peserta (CSV)</a>
                                </td>
                            </tr>
                            </tfoot>
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