@extends('layouts.home')

@section('content')
<div class="page-header-new col-md-12">
  <div class="col-md-4">
  {!! Form::open(['method'=>'GET','url'=>'/searchkategori-pengumuman-front','role'=>'search'])  !!}

  <select name="search" class="form-control">
    <option>Pilih Kategori</option>
    @foreach($list_kategori as $i=>$list_kategoris )
    <option value="{{ $list_kategoris->id }}">{{ $list_kategoris->nama }}</option>
    @endforeach
  </select>
</div>
  <div class="col-md-6">
    <button  class="btn btn-default big">
      <span>
        <i class="fa fa-search"></i>
      </span>
    </button>
  </div>
  {!! Form::close() !!}
  
<div class="breadcrumb-box">
      <div class="container">
          <ul class="breadcrumb">
              <li>
                  <a href="/home">Home</a>
              </li>
              <li class="active">Pengumuman</li>
          </ul>
      </div>
  </div>
</div>
<section id="blog" class="page-section light-bg top-destination">
  <div class="container">
      <div class="section-title" data-animation="fadeInUp">
          <!-- Heading -->
          <h2 class="title">PENGUMUMAN</h2>
      </div>
      <div class="row bottom-pad-30">
          <!-- <div class="col-sm-4 opacity" data-animation="fadeInUp">
              <p class="text-center">
                  <img src="img/sections/travel-2.jpg" width="370" height="185" alt="" />
              </p>
              <h4>
                  <a href="#" class="black">Curabitur nunc neque</a>
              </h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id pariatur molestiae illum cum facere deserunt a enim harum eaque fugit.</p>
              <a href="#" class="btn-link">Read More</a>
              <div class="meta top-pad-10"> -->
                  <!-- Meta Date -->
                  <!-- <span class="time">
                  <i class="icon-clock"></i> 18.11.2015</span> 
                  <span class="pull-right">
                  <i class="icon-comments2"></i> 
                  <a href="#">0 Comments</a></span>
              </div>
          </div> -->
          @foreach($pengumumans as $i=>$pengumuman )
            <div class="col-sm-4 opacity" data-animation="fadeInRight">
                <p class="text-center">
                    <img src="{{URL::to('images/pengumuman/thumbs').'/'.$pengumuman->file}}" width="370" height="185" alt="" />
                </p>
                <h4>
                    <a href="/detail-pengumuman/{{ $pengumuman->id_pengumuman }}" class="black">{{ $pengumuman->judul }}</a>
                </h4>
                <p>{!! str_limit($pengumuman->deskripsi, 150) !!}</p>
                <a href="/detail-pengumuman/{{ $pengumuman->id_pengumuman }}" class="btn-link">Read More</a>
                <div class="meta top-pad-10">
                    <!-- Meta Date -->
                    <span class="time">
                    <i class="icon-clock"></i> {{date('d.m.Y', strtotime($pengumuman->created_at))}}</span> 
                    <span class="pull-right">
                    <i class="icon-comments2"></i> 
                    <a href="#">0 Comments</a></span>
                </div>
            </div>
          @endforeach
      </div>
      <div class="clearfix"></div>
</section>
@endsection
