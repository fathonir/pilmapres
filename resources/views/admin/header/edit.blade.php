@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Edit Header
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{URL::to('header/index')}}">List Header</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
      	{!! Form::model($header,['method'=>'put', 'files'=> 'true', 'action'=>['admin\HeaderController@update',$header->id]]) !!}

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Header</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Judul</label>
                  <input type="text" name ="judul" class="form-control" id="exampleInputEmail1" placeholder="Masukan Judul" value="{{{$header->judul}}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Gambar</label>
                  <input type="file" id="exampleInputFile" name="image" value="{{{$header->gambar}}}">
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