@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Edit Gallery
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{URL::to('gallery/index')}}">List Gallery</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
      	{!! Form::model($gallery,['method'=>'put', 'files'=> 'true', 'action'=>['admin\GalleryController@update',$gallery->id]]) !!}

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Gallery</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Judul</label>
                  <input type="text" name ="judul" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama" value="{{{$gallery->judul}}}">
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi" value="{{{$gallery->deskripsi}}}"> {!!$gallery->deskripsi!!} </textarea>
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">Sampul</label>
                  <p><a class="img-responsive"> <img src="{{ asset('/images/galleri/thumbs/'.$gallery->image)}}" style="max-height:100px;max-width:100px;margin-top:10px;"> </p>
                  <input type="file" id="exampleInputFile" name="image" value="{{{$gallery->image}}}">
                  <input type="hidden" id="exampleInputFile" name="image" value="{{{$gallery->image}}}">
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