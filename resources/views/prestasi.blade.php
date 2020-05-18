@extends('layouts.home')

@section('content')

  <div class="page-header">
    <div class="container">
        <h1 class="title">Karya Tulis</h1>
    </div>
    <div class="breadcrumb-box">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li class="active"><a href="/dashboard-finalis">{{ $user->name }}</a></li>
            </ul>
        </div>
    </div>
</div>
<section class="page-section">
    <div class="container shop grid-3">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="row">
                  <div class="panel panel-primary">
                     {{ Form::open(array('url' => '/prestasi-post', 'files' => true, 'method' => 'post')) }}
                      <div class="panel-body">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Prioritas</label>
                          <select class="form-control" name="prioritas">
                             <option>Pilih Urutan Prioritas</option>
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
                          <input type="text" class="form-control" name="nama_prestasi" id="exampleInputEmail1" placeholder="Masukan Nama Prestasi" required="">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Pencapaian</label>
                          <input type="text" class="form-control" name="pencapaian" id="exampleInputEmail1" placeholder="Masukan Pencapaian (Juara 1, Juara 2)" required="">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tahun</label>
                          <div class="input-group date date-picker">
                              <input type="text" class="form-control date-picker" name="tahun" required="">
                              <span class="input-group-addon">
                              <span class="icon-calendar12 fa-1x"></span>
                              </span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Tingkat</label>
                          <select class="form-control" name="tingkat" required="">
                             <option>Pilih Tingkat</option>
                             <option value="Internasional">Internasional</option>
                             <option value="Regional">Regional</option>
                             <option value="Nasional">Nasional</option>
                             <option value="Propinsi">Propinsi</option>
                           </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Lembaga Pemberi/Event</label>
                          <input type="text" class="form-control" name="pemberi_event" id="exampleInputEmail1" placeholder="Masukan Lembaga Pemberi/Event" required="">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Individu/Kelompok</label>
                          <select class="form-control" name="individu_kelompok" required="">
                             <option value="Individu">Individu</option>
                             <option value="Kelompok">Kelompok</option>
                           </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputFile">Sertifikat</label>
                          <input type="file" id="exampleInputFile" name="sertifikat" required="">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputFile">Keterangan Tambahan</label>
                          <textarea name="keterangan_tambahan" class="textarea-message form-control" placeholder="Keterangan Tambahan" rows="4" required=""></textarea>
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