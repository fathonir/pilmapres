@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Kategori Berita
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active"><a href="{{URL::to('/categories')}}">Daftar Kategori Berita</a></li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          <tr>
            <td>ID</td>
            <td>
              {{{$category->id}}}
            </td>
          </tr>
          <tr>
            <td width="200px">Kategori Berita</td>
            <td>
              {{{$category->nama}}}
            </td>
          </tr>
        </table>
      </div>
    </div>
  </section>
@endsection