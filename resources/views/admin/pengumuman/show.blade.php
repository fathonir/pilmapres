@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Pengumuman
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('/pengumuman/index')}}">List Pengumuman</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="box box-primary">
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped table-hover">
           <tr>
              <td width="200px">Kategori Pengumuman</td>
              <td>
                {{{$pengumuman->nama}}}
              </td>
            </tr>
            <tr>
              <td width="200px">Judul</td>
              <td>
                {{{$pengumuman->judul}}}
              </td>
            </tr>
            <tr>
              <td width="200px">Deskripsi</td>
              <td>
                {!! $pengumuman->deskripsi !!}
              </td>
            </tr>
            <tr>
              <td width="200px">Gambar</td>
              <td>
                <a class="img-responsive"> <img src="{{ asset('/images/pengumuman/thumbs/'.$pengumuman->file)}}" style="max-height:100px;max-width:100px;margin-top:10px;">
              </td>
            </tr>
            <tr>
              <td width="200px">Created By</td>
              <td>
                {{{$pengumuman->name}}}
              </td>
            </tr>
          </table>
          <p align="center">
            <a href="{{URL::to('/pengumuman/index')}}" class="btn btn-primary" role="button">kembali</a>
          </p>
        
        </div>
      </div>
    </div>
  </section>
@endsection