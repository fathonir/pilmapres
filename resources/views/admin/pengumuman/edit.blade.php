@extends('layouts.admin')

@section('content')
  <section class="content">
    <div class="row">
      <div class="col-md-12"></br></br>
        {!! Form::model($pengumumans,['method'=>'put', 'files'=> 'true', 'action'=>['admin\PengumumanController@update',$pengumumans->id_pengumuman]]) !!}
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Pengumuman</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Kategori Pengumuman</label>
                  {{ Form::select('id', $kategori_pengumuman, null,['class' => 'form-control required', 'placeholder' => 'Pilih Kategori' , 'value'=>$pengumumans->kategori_pengumuman]) }}
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Judul</label>
                  <input type="text" name ="judul" class="form-control" id="exampleInputEmail1" placeholder="Masukan Judul" value="{{{$pengumumans->judul}}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi" value="{{{$pengumumans->deskripsi}}}" {!!$pengumumans->deskripsi!!} </textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Gambar</label>
                  <input type="file" id="exampleInputFile" name="file" value="{{{$pengumumans->file}}}">
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