@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Edit Slider
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{URL::to('slider/index')}}">List Slider</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
      	{!! Form::model($slider,['method'=>'put', 'files'=> 'true', 'action'=>['SliderController@update',$slider->id]]) !!}

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Slider</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Judul</label>
                  <input type="text" name ="judul" class="form-control" id="exampleInputEmail1" placeholder="Masukan Judul" value="{{{$slider->judul}}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Deskripsi</label>
                  <textarea name="deskripsi" class="form-control" id="deskripsi" value="{{{$slider->deskripsi}}}"> {!!$slider->deskripsi!!} </textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Gambar</label>
                  <input type="file" id="exampleInputFile" name="image" value="{{{$slider->gambar}}}">
                  <input type="hidden" id="exampleInputFile" name="image" value="{{{$slider->gambar}}}">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><span class='glyphicon glyphicon-save'></span> Simpan</button>
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
        CKEDITOR.replace( 'deskripsi' );
    </script>
@endsection
