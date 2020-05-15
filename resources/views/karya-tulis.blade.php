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
                     {{ Form::open(array('url' => '/karya-tulis-post', 'files' => true, 'method' => 'post')) }}
                      <div class="panel-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Judul</label>
                          <input type="text" class="form-control" name="judul" id="exampleInputEmail1" placeholder="Masukan Judul Karya Tulis">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Topik</label>
                          <select class="fancy-select form-control" name="topik_id">
                             <option>Pilih Topik</option>
                            @foreach($topiks as $i=>$topik)
                              <option value="{{ $topik->id }}">{{ $topik->nama }}</option>
                             @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Bidang</label>
                          <select class="fancy-select form-control" name="bidang_id">
                             <option>Pilih Bidang</option>
                            @foreach($bidangs as $i=>$bidang)
                              <option value="{{ $bidang->id }}">{{ $bidang->nama }}</option>
                             @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputFile">File</label>
                          <input type="file" id="exampleInputFile" name="file">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputFile">Ringkasan</label>
                          <textarea name="ringkasan" class="textarea-message form-control" placeholder="Ringkasan KTI" rows="4" ></textarea>
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