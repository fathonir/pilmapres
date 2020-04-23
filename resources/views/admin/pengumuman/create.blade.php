@extends('layouts.admin')

@section('content')
  <section class="content">
    <div class="row">
      <div class="col-md-12"></br></br>
        {{ Form::open(array('url' => '/pengumuman/create', 'files' => true, 'method' => 'post')) }}
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Pengumuman</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Kategori Pengumuman</label>
                  {{ Form::select('id', $kategori_pengumuman, null,['class' => 'form-control required', 'placeholder' => 'Pilih Kategori']) }}
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Judul</label>
                  <input type="text" name ="judul" class="form-control" id="exampleInputEmail1" placeholder="Masukan Judul">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi"> </textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Gambar</label>
                  <input type="file" id="exampleInputFile" name="file">
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