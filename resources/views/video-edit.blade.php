@extends('layouts.home')

@section('content')

  <div class="page-header">
    <div class="container">
        <h1 class="title">Edit Video</h1>
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
                     {{ Form::open(array('url' => '/video-edit-post', 'files' => true, 'method' => 'post')) }}
                      <div class="panel-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Judul</label>
                          <input type="hidden" name="id" value="{{ $video->id }}">
                          <input type="text" class="form-control" name="judul" id="exampleInputEmail1" value="{{ $video->judul }}" required="">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Link Youtube</label>
                          <input type="text" class="form-control" name="link" id="exampleInputEmail1" value="{{ $video->link }}" required="">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputFile">Keterangan Tambahan</label>
                          <textarea name="keterangan_tambahan" class="textarea-message form-control" rows="4" required="">{{ $video->keterangan_tambahan }}</textarea>
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