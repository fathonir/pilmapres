@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Gallery
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('/gallery/index')}}">List Gallery</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="box box-primary">
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped table-hover">
            <tr>
              <td width="200px">Kategori</td>
              <td>
                {{{$gallery->judul_category}}}
              </td>
            </tr>
            <tr>
            <tr>
              <td width="200px">Judul</td>
              <td>
                {{{$gallery->judul}}}
              </td>
            </tr>
            <tr>
              <td width="200px">Deskripsi</td>
              <td>
                {!! $gallery->deskripsi !!}
              </td>
            </tr>
            <tr>
              <td width="200px">Sampul</td>
              <td>
                <a class="img-responsive"> <img src="{{ asset('/images/galleri/thumbs/'.$gallery->image)}}" style="max-height:100px;max-width:100px;margin-top:10px;">
              </td>
            </tr>
          </table>

          <div class="row">
            <div class="col-md-12">
              <!-- The time line -->
              <ul class="timeline">
                <!-- timeline time label -->
                <li>
                  <i class="fa fa-camera bg-purple"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                    <h3 class="timeline-header"><a href="#">{{{$gallery->name}}}</a> uploaded new photos</h3>

                      @foreach($image_galleries as $i=>$image_gallery)
                      <!-- <img src="http://placehold.it/150x100" alt="..." class="margin"> -->
                        <div class="col-md-2">
                          <img src="{{ asset('/images/image-gallery/thumbs/'.$image_gallery->image)}}" style="max-height:100px;max-width:150px;margin-top:10px;" alt="..." class="margin">
                          <form id="delete_image_gallery{{$image_gallery->id}}" action='{{URL::action("admin\ImageGalleryController@destroy",array($image_gallery->id))}}' method="POST">
                              <input type="hidden" name="_method" value="delete">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input type="hidden" name="gallery_id" value="{{{$gallery->id}}}">
                              <a class="btn btn-danger btn-xs" href="#" onclick="document.getElementById('delete_image_gallery{{$image_gallery->id}}').submit();">delete</a>
                          </form>
                        </div>
                      @endforeach
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <!-- END timeline item -->
                <li>
                  <i class="fa fa-clock-o bg-gray"></i>
                </li>
              </ul>
              <ul>
                <div class="col-md-10">
                  <a href="{{URL::to('/image-gallery/create/'.$gallery->id)}}" class="btn btn-primary btn-xs">Tambah</a>
                </div>
              </ul>
            </div>
            <!-- /.col -->
          </div>

          <p align="center">
            <a href="{{URL::to('/gallery/index')}}" class="btn btn-primary" role="button">kembali</a>
          </p>
        
        </div>
      </div>
    </div>
  </section>
@endsection