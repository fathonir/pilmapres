@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Edit Agenda
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{URL::to('agenda/index')}}">List Agenda</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
      	{!! Form::model($agendas,['method'=>'put', 'files'=> 'true', 'action'=>['admin\AgendaController@update',$agendas->id]]) !!}

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Agenda</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Judul</label>
                  <input type="text" name ="judul" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama" value="{{{$agendas->judul}}}">
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi" value="{{{$agendas->deskripsi}}}"> {!!$agendas->deskripsi!!} </textarea>
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">Gambar</label>
                  <p><a class="img-responsive"> <img src="{{ asset('/images/agenda/thumbs/'.$agendas->file)}}" style="max-height:100px;max-width:100px;margin-top:10px;"> </p>
                  <input type="file" id="exampleInputFile" name="file" value="{{{$agendas->file}}}">
                  <input type="hidden" id="exampleInputFile" name="file" value="{{{$agendas->file}}}">
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