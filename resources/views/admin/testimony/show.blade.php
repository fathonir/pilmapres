@extends('layouts.admin')

@section('content')
<section class="content-header">
    <h1>
      Testimony
    </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{URL::to('/testimony/index')}}">Daftar nama</a></li>
      </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          <tr>
             <td width="200px">Nama</td>
              <td>
                {{{$testimonis->nama}}}
              </td>
          </tr>
          <tr>
             <td width="200px">Jabatan/Pekerjaan</td>
              <td>
                {{{$testimonis->jabatan}}}
              </td>
          </tr>
          <tr>
             <td width="200px">Deskripsi</td>
              <td>
                {!! $testimonis->deskripsi !!}
              </td>
          </tr>
          <tr>
             <td width="200px">Pengalaman</td>
              <td>
                {!! $testimonis->pengalaman !!}
              </td>
          </tr>
          <tr>
          
          <tr>
            <td width="200px">Gambar</td>
          <td>
          <a class="img-responsive" target="_blank" href="#"> <img src="{{ asset('/images/testimony/'.$testimonis->images)}}" style="max-height:100px;max-width:100px;margin-top:10px;"></a>
          </td>
          </tr>
        </table>
        <p align="center">
          <a href="{{URL::to('testimony/index')}}" class="btn btn-primary" role="button">kembali</a>
          </p>
      </div>
    </div>
  </section>
@endsection