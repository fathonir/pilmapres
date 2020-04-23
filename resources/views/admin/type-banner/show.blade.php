@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Type Banner
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('/type-banner/index')}}">List Type Banner</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="box box-primary">
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped table-hover">
            <tr>
              <td width="200px">ID</td>
              <td>
                {{{$type_banner->id}}}
              </td>
            </tr>
            <tr>
              <td width="200px">Nama</td>
              <td>
                {{{$type_banner->nama}}}
              </td>
            </tr>
          </table>
          <p align="center">
            <a href="{{URL::to('/type-banner/index')}}" class="btn btn-primary" role="button">kembali</a>
          </p>
        
        </div>
      </div>
    </div>
  </section>
@endsection