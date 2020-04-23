@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Events
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{URL::to('/events')}}">Daftar Events</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
      	{!! Form::model($event,['method'=>'put','action'=>['admin\EventController@update',$event->id], 'files'=>true]) !!}
	        <div class='form-group clearfix'>
	          {{ Form::label("judul", "Judul", ['class' => 'col-md-2 control-label']) }}
	            <div class='col-md-4'>
	              {{ Form::text("judul", null,['class' => 'form-control required']) }}
	              <span class="error">{{$errors->first('judul')}}</span>
	            </div>
	        </div>
          <div class='form-group clearfix'>
            {{ Form::label("gambar", "Gambar", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-10'>
              <input type="file" name="gambar" accept="image/x-png, image/jpeg">
                <span class="error">{{$errors->first('gambar')}}</span>
              </div>
          </div>
          <div class='form-group clearfix'>
            {{ Form::label("file", "File", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-10'>
              <input type="file" name="file">
                <span class="error">{{$errors->first('file')}}</span>
              </div>
          </div>
          <div class='form-group clearfix'>
            {{ Form::label("deskripsi", "Deskripsi", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-10'>
                <textarea class="form-control required" id="isi_berita" name="deskripsi">{!! $event->deskripsi !!}</textarea>
                <span class="error">{{$errors->first('deskripsi')}}</span>
              </div>
          </div>     
          <div class='form-group'>
          	<div class='col-md-4 col-md-offset-2'>
            	<button class='btn btn-primary' type='submit' name='save' id='save'><span class='glyphicon glyphicon-save'></span> Save</button>
          	</div>
        	</div>
        {!! Form::close() !!}
    	</div>
  	</div>
	</section>
@endsection
@section('js')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'isi_berita' );
</script>
@endsection