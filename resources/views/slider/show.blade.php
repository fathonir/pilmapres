@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Slider
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('slider/index')}}">List Slider</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="box box-primary">
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped table-hover">
            <tr>
              <td width="200px">Judul</td>
              <td>
                {{{$slider->judul}}}
              </td>
            </tr>
            <tr>
              <td width="200px">Deskripsi</td>
              <td>
                {!! $slider->deskripsi !!}
              </td>
            </tr>
            <tr>
              <td width="200px">Gambar</td>
              <td>
                <a class="img-responsive"> <img src="{{ asset('/images/slider/thumbs/'.$slider->gambar)}}" style="max-height:100px;max-width:100px;margin-top:10px;">
              </td>
            </tr>
          </table>
          <p align="center">
            <a href="{{URL::to('slider/index')}}" class="btn btn-primary" role="button">kembali</a>
          </p>
        
        </div>
      </div>
    </div>
  </section>
@endsection