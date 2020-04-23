@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Edit Type Banner
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{URL::to('type-banner/index')}}">List Type Banner</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
      	{!! Form::model($type_banner,['method'=>'put', 'files'=> 'true', 'action'=>['admin\TypeBannerController@update',$type_banner->id]]) !!}

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Type Related Link</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">ID</label>
                  <input type="text" name ="id" class="form-control" id="exampleInputEmail1" placeholder="Masukan ID" value="{{{$type_banner->id}}}">
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" name ="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama" value="{{{$type_banner->nama}}}">
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
