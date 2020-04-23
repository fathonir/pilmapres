@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Show Kategori Galeri
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active"><a href="{{URL::to('category-galleri/index')}}">Daftar Kategori Galeri</a></li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          <tr>
            <td>Judul</td>
            <td>
              {{{$categori_galleri->judul}}}
            </td>
          </tr>
          <tr>
            <td width="200px">Deskripsi</td>
            <td>
              {!! $categori_galleri->deskripsi !!}
            </td>
          </tr>
        </table>
      </div>
    </div>
  </section>
@endsection