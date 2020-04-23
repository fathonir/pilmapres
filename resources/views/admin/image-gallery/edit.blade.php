@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Edit Image Gallery
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{URL::to('image-gallery/index')}}">List Image Gallery</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
      	{!! Form::model($image_gallery,['method'=>'put', 'files'=> 'true', 'action'=>['admin\ImageGalleryController@update',$image_gallery->id]]) !!}

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Image Gallery</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Gallery</label>
                  {{ Form::select('gallery_id', $galleries, null,['class' => 'form-control required', 'placeholder' => 'Pilih Gallery', 'value' => $image_gallery->gallery_id]) }}
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">File</label>
                  <input type="file" id="exampleInputFile" name="image" value="{{{$image_gallery->image}}}">
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