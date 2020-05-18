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
                    Edit Prestasi
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
                     {{ Form::open(array('url' => '/edit-prestasi-post/'.$prestasi->id, 'files' => true, 'method' => 'post')) }}
                      <div class="panel-body">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Prioritas</label>
                          <select class="form-control" name="prioritas">
                             <option value="{{ $prestasi->prioritas }}">{{ $prestasi->prioritas }}</option>
                             <option value="1">1</option>
                             <option value="2">2</option>
                             <option value="3">3</option>
                             <option value="4">4</option>
                             <option value="5">5</option>
                             <option value="6">6</option>
                             <option value="7">7</option>
                             <option value="8">8</option>
                             <option value="9">9</option>
                             <option value="10">10</option>
                           </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nama Prestasi</label>
                          <input type="text" class="form-control" name="nama_prestasi" id="exampleInputEmail1" value="{{ $prestasi->nama_prestasi }}" required="">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Pencapaian</label>
                          <input type="text" class="form-control" name="pencapaian" id="exampleInputEmail1" value="{{ $prestasi->pencapaian }}" required="">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tahun</label>
                          <div class="input-group date date-picker">
                              <input type="text" class="form-control date-picker" value="{{ $prestasi->tahun }}" name="tahun" required="">
                              <span class="input-group-addon">
                              <span class="icon-calendar12 fa-1x"></span>
                              </span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Tingkat</label>
                          <select class="form-control" name="tingkat" required="">
                            <option value="{{ $prestasi->tingkat }}">{{ $prestasi->tingkat }}</option>
                            @if($prestasi->tingkat == 'Internasional')
                              <option value="Regional">Regional</option>
                              <option value="Nasional">Nasional</option>
                              <option value="Propinsi">Propinsi</option>
                            @elseif($prestasi->tingkat == 'Regional')
                              <option value="Internasional">Internasional</option>
                              <option value="Nasional">Nasional</option>
                              <option value="Propinsi">Propinsi</option>
                            @elseif($prestasi->tingkat == 'Nasional')
                              <option value="Internasional">Internasional</option>
                              <option value="Regional">Regional</option>
                              <option value="Propinsi">Propinsi</option>
                            @elseif($prestasi->tingkat == 'Propinsi')
                              <option value="Internasional">Internasional</option>
                              <option value="Regional">Regional</option>
                              <option value="Nasional">Nasional</option>
                            @endif
                           </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Lembaga Pemberi/Event</label>
                          <input type="text" class="form-control" name="pemberi_event" id="exampleInputEmail1" value="{{ $prestasi->pemberi_event }}" required="">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Individu/Kelompok</label>
                          <select class="form-control" name="individu_kelompok" required="">
                            <option value="{{ $prestasi->individu_kelompok }}">{{ $prestasi->individu_kelompok }}</option>
                            @if($prestasi->individu_kelompok == 'Individu')
                              <option value="Kelompok">Kelompok</option>
                            @else
                              <option value="Individu">Individu</option>
                            @endif
                           </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputFile">Sertifikat</label>
                          <input type="file" id="exampleInputFile" name="sertifikat">
                          <br>
                          <a href="/file/prestasi/{{ $prestasi->sertifikat }}" target="_blank"> <i class="fa fa-cloud-download"></i> Unduh File Sebelumnya</a>
                          <br>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputFile">Keterangan Tambahan</label>
                          <textarea name="keterangan_tambahan" class="textarea-message form-control" rows="4" required="">{!! $prestasi->keterangan_tambahan !!}</textarea>
                        </div>
                        <button type="submit" class="btn btn-default btn-xs detail-prestasi"> <i class="fa fa-save"></i> Simpan</button>
                      </div>
                      {!! Form::close() !!}    
                    </div>      
                </div>      
            </div>      
        </div>      
    </div>
</section>
@endsection

@section('js')
<script type="text/javascript">
  $(".date-picker").datetimepicker( {
      format: 'YYYY'
  });
</script>
@endsection