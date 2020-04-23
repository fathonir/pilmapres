@extends('layouts.home')

@section('content')
<div class="page-header-new col-md-12">
{!! Form::open(['method'=>'GET','url'=>'/searchkategori-gallery-front','role'=>'search'])  !!}
  <div class="col-md-4">
  <select name="search" class="form-control">
    <option>Pilih Kategori</option>
    @foreach($list_kategori as $i=>$list_kategoris )
    <option value="{{ $list_kategoris->id_category_galleries }}">{{ $list_kategoris->judul }}</option>
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
              <li class="active">Gallery</li>
          </ul>
      </div>
  </div>
</div>
<section id="products" class="page-section light-bg border-tb">
                <div class="container">
                    <div class="section-title animated fadeInUp visible" data-animation="fadeInUp">
                        <!-- Heading -->
                        <h2 class="title">All Gallery</h2>
                    </div>
                    <div class="row shop">
                        @foreach($galleries as $i=>$gallery)
                        <?php $count = $image_galleries->where('gallery_id', $gallery->id)->count() ?> 
                            <div class="col-sm-4 col-md-3 animated fadeInLeft visible" data-animation="fadeInLeft">
                              <!-- Product Item-->
                              <div class="product-item bakery">
                                  <div class="product-img">
                                    <img src="/images/galleri/thumbs/{{ $gallery->image }}" alt="" class="img-responsive">
                                    <a href="/images/galleri/{{ $gallery->image }}" data-rel="prettyPhoto[portfolio1]">
                                    <a href="/images/galleri/{{ $gallery->image }}" data-rel="prettyPhoto[portfolio]"><i class="icon-magnifier bg-color text-white fa-2x icons-circle border-color"></i></a>
                                  </div>
                                  <div class="product-details" style="padding: 0px 30px;">
                                    <h4 href="#" class="role">{{$gallery->jabatan}}</h4>
                                    <h4 href="#" class="role">{{$gallery->judul}}</h4>
                                    <p>{!! str_limit($gallery->deskripsi, 150) !!}</p>
                                    <h5 class="fa fa-picture-o"> {{ $count }}</h5>
                                  </div>
                                    <a href="/gallery-detail/{{ $gallery->id }}" class="btn btn-default btn-block">Lihat Selengkapnya</a>
                                </div>
                            </div>
                            @endforeach

                    </div>
                        <div class="col-md-12" align="center">
                            <nav class="navbar-center">
            {!! $galleries->render() !!}
                        </nav>
                        </div>
                </div>
            </section>
@endsection