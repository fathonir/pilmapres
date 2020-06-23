@extends('layouts.home')
@section('head')
    {!! Html::style('vendor/datatables/datatables/media/css/dataTables.bootstrap.min.css') !!}
@endsection
@section('content')
    <div class="page-header">
        <div class="container">
            <h1 class="title">Daftar Peserta PILMAPRES {{ $kegiatan->tahun }} <u>Hasil Verifikasi</u></h1>
        </div>
    </div>
    <section class="page-section">
        <div class="container">
            <div class="bs-callout bs-callout-info">
                <h4 id="no-default-class">Informasi Penting</h4>
                <p>Password standar untuk login ke sistem berformat TGLBLNTHN (6 digit). Sebagai contoh,
                    apabila tanggal lahir peserta 15 Agustus 1999, maka password standarnya adalah
                    <code>150899</code></p>
                <p>Silahkan <a href="{{ URL::to('login') }}" class="btn btn-xs btn-default">KLIK DISINI</a>
                    untuk menuju halaman login.</p>
            </div>
            <table class="table table-condensed table-bordered table-striped">
                <thead>
                <tr>
                    <th>Nama</th>
                    <th>Perguruan Tinggi</th>
                    <th>Program Studi</th>
                    <th class="text-center">Username</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($pesertas as $peserta)
                    <tr>
                        <td>{{ $peserta->nama }}</td>
                        <td>{{ $peserta->nama_pt }}</td>
                        <td>{{ $peserta->nama_prodi }}</td>
                        <td class="text-center"><code>{{ $peserta->username }}</code></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
@section('js')
    {!! Html::script('vendor/datatables/datatables/media/js/jquery.dataTables.min.js') !!}
    {!! Html::script('vendor/datatables/datatables/media/js/dataTables.bootstrap.min.js') !!}
    <script type="text/javascript">
        $(document).ready(function () {
            $('.table').DataTable();
        })
    </script>
@endsection