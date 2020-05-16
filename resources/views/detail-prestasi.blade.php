@extends('layouts.home')

@section('content')

  <div class="page-header">
    <div class="container">
        <h1 class="title">{{ $prestasi->nama_prestasi }}</h1>
    </div>
    <div class="breadcrumb-box">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="/dashboard-finalis">{{ $user->name }}</a>
                </li>
                <li class="active">
                    Detail Prestasi
                </li>
            </ul>
        </div>
    </div>
</div>
<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="/dashboard-finalis" class="badge badge-primary back"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
            </div>      
        </div>      
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <div class="panel panel-primary">
                            <div class="panel-body table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td class="font-bold">Nama Prestasi</td>
                                            <td>:</td>
                                            <td>{{ $prestasi->nama_prestasi }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-bold">Tahun Perolehan</td>
                                            <td>:</td>
                                            <td>{{ $prestasi->tahun }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-bold">Pencapaian</td>
                                            <td>:</td>
                                            <td>{{ $prestasi->pencapaian }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-bold">Lembaga Pemberi/Event</td>
                                            <td>:</td>
                                            <td>{{ $prestasi->pemberi_event }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-bold">Individu/Kelompok</td>
                                            <td>:</td>
                                            <td><span class="label label-success">{{ $prestasi->individu_kelompok }}</span></td>
                                        </tr>
                                        <tr>
                                            <td class="font-bold">Tingkat</td>
                                            <td>:</td>
                                            <td>
                                              @if($prestasi->tingkat == 'Internasional')
                                                <span class="label label-danger">{{ $prestasi->tingkat }}</span>
                                              @elseif($prestasi->tingkat == 'Nasional')
                                                <span class="label label-info">{{ $prestasi->tingkat }}</span>
                                              @elseif($prestasi->tingkat == 'Propinsi')
                                                <span class="label label-warning">{{ $prestasi->tingkat }}</span>
                                              @else
                                                <span class="label label-default">{{ $prestasi->tingkat }}</span>
                                              @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="font-bold">Keterangan Tambahan</td>
                                            <td>:</td>
                                            <td>
                                              <p>
                                                {!! $prestasi->keterangan_tambahan !!}
                                              </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title" id="panel-title">Sertifikat</h3>
                            </div>
                            <div class="panel-body">
                                @if(pathinfo($prestasi->sertifikat, PATHINFO_EXTENSION) == 'png' || pathinfo($prestasi->sertifikat, PATHINFO_EXTENSION) == 'jpg' || pathinfo($prestasi->sertifikat, PATHINFO_EXTENSION) == 'jpeg')
                                  <div class="post-image opacity">
                                      <img src="/file/prestasi/{{ $prestasi->sertifikat }}" width="1170" height="382" alt="" title="">
                                  </div>
                                @else
                                <embed src="/file/prestasi/{{ $prestasi->sertifikat }}" type="application/pdf" width="100%" height="600px" />
                                @endif
                            </div>
                        </div>
                    </div>      
                </div>      
            </div>      
        </div>      
    </div>
</section>
@endsection