@extends('layouts.admin')

@section('content')
  <section class="content">
    <div class="row">
      <div class="col-md-12"></br></br>
        {{ Form::open(array('url' => '/image-gallery/create/'.$id, 'files' => true, 'method' => 'post')) }}
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Image Gallery</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">Gambar</label>
                  <input type="file" id="exampleInputFile" name="image">
                </div>
              </div>
              <!-- /.box-body -->

              <input type="hidden" name="gallery_id" value="{{{$id}}}">


              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><span class='glyphicon glyphicon-save'></span> Simpan</button>
              </div>
          </div>

        {!! Form::close() !!}    
      </div>
    </div>
  </section>
@endsection
