@extends('layouts.home')

@section('content')

  <div class="page-header">
    <div class="container">
        <h1 class="title">Edit Karya Tulis</h1>
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
                     {{ Form::open(array('url' => '/karya-tulis-edit-post', 'files' => true, 'method' => 'post')) }}
                      <div class="panel-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Judul</label>
                          <input type="hidden" name="id" value="{{ $karya_tulis->id }}">
                          <input type="text" class="form-control" name="judul" value="{{ $karya_tulis->judul }}" id="exampleInputEmail1" placeholder="Masukan Judul Karya Tulis">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Topik</label>
                          <select class="fancy-select form-control" name="topik_id">
                            <option value="{{ $karya_tulis->topik_id }}">{{ $karya_tulis->topik->nama }}</option>
                            @foreach($topiks as $i=>$topik)
                              @if($topik->id != $karya_tulis->topik_id)
                                <option value="{{ $topik->id }}">{{ $topik->nama }}</option>
                              @endif
                             @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Bidang</label>
                          <select class="fancy-select form-control" name="bidang_id">
                             <option value="{{ $karya_tulis->bidang_id }}">{{ $karya_tulis->bidang->nama }}</option>
                            @foreach($bidangs as $i=>$bidang)
                              @if($bidang->id != $karya_tulis->bidang_id)
                                <option value="{{ $bidang->id }}">{{ $bidang->nama }}</option>
                              @endif
                             @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputFile">File</label>
                          <input type="file" id="exampleInputFile" name="file">
                          <br>
                          <a href="/file/karya-tulis/{{ $karya_tulis->file }}" target="_blank"> <i class="fa fa-cloud-download"></i> Unduh File Sebelumnya</a>
                          <br>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputFile">Ringkasan</label>
                          <textarea name="ringkasan" class="textarea-message form-control" placeholder="Ringkasan KTI" rows="4" > {{ $karya_tulis->ringkasan }} </textarea>
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