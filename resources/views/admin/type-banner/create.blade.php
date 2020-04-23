@extends('layouts.admin')

@section('content')
  <section class="content">
    <div class="row">
      <div class="col-md-12"></br></br>
        {{ Form::open(array('url' => '/type-banner/create', 'files' => true, 'method' => 'post')) }}
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Type Banner</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" name ="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama">
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
