@extends('layouts.admin')

@section('content')
  <section class="content">
    <div class="row">
      <div class="col-md-12"></br></br>
        {{ Form::open(array('url' => '/testimony/create', 'files' => true, 'method' => 'post')) }}


          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Testimony</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" name ="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Jabatan/Pekerjaan</label>
                  <input type="text" name ="jabatan" class="form-control" id="exampleInputEmail1" placeholder="Masukan Jabatan">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi"> </textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Pengalaman</label>
                <textarea name="pengalaman" class="form-control" id="pengalaman"> </textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Gambar</label>
                  <input type="file" id="exampleInputFile" name="image">
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

  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'pengalaman' );
    </script>
@endsection
