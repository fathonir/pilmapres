@extends('layouts.mahasiswa')
@section('content')
    <section class="content-header">
        <h1>Photo <small>Peserta</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
            <li>Peserta</li>
            <li class="active">Photo</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <form method="post" action="{{ action('Mahasiswa\PhotoController@store') }}"
                          class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group ">
                                <div class="col-md-4">
                                    @if ($photoExist)
                                        <img src="{{ $photoUrl }}" style="width: 128px; height: 128px;"/>
                                    @else
                                        <img src="https://via.placeholder.com/128" style="width: 128px; height: 128px;"/>
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <input type="file" name="photo" class="form-control"/>
                                    <span class="help-block">Format file: JPG (500x500) maks 1MB</span>
                                </div>
                            </div>
                            @if ($errors->has('photo'))
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button>
                                    <h4><i class="icon fa fa-ban"></i> Upload Gagal</h4>
                                    {{ $errors->first('photo') }}
                                </div>
                            @endif
                            @if (isset($uploadSuccess))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button>
                                    <h4><i class="icon fa fa-ban"></i> Upload Berhasil</h4>
                                </div>
                            @endif
                        </div>
                        <div class="box-footer">
                            <a href="{{ URL::to('mahasiswa/home') }}" class="btn btn-default">Ke Beranda</a>
                            <button type="submit" class="btn btn-primary pull-right">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection