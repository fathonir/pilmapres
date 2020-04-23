@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Kategori Galeri
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('category-galleri/index')}}">List Kategori Galeri</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        {!! Form::model($categori_galleri,['method'=>'put', 'files'=> 'true', 'action'=>['admin\CategoryGalleriController@update',$categori_galleri->id_category_galleries]]) !!}
                        {{ csrf_field() }}

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Kategori Galeri</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Judul</label>
                  <input type="text" name ="judul" class="form-control" id="exampleInputEmail1" placeholder="Masukan Judul" value="{{{$categori_galleri->judul}}}">
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi" value="{{{$categori_galleri->deskripsi}}}"> {!!$categori_galleri->deskripsi!!} </textarea>
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