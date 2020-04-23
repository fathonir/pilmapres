@extends('layouts.home')

@section('type'){{"article"}}@stop
@section('title'){{str_replace('&nbsp;',' ',preg_replace('/\s+/',' ',substr(strip_tags(str_limit($galleries->judul, 200, $end = '...')),0,160)))}}@stop

@section('deskripsi'){{str_replace('&nbsp;',' ',preg_replace('/\s+/',' ',substr(strip_tags(str_limit($galleries->deskripsi, 1000, $end = '...')),0,160)))}}@stop

@if($galleries->image)
  @section('image:url'){{ url('images/galleri/'.$galleries->image) }}@stop
@endif

@if($galleries->image)
  @section('image'){{ url('images/galleri/'.$galleries->image) }}@stop
@endif

@section('fb_description'){{str_replace('&nbsp;',' ',preg_replace('/\s+/',' ',substr(strip_tags(str_limit($galleries->deskripsi, 1000, $end = '...')),0,160)))}}@stop

@section('url'){{ request()->url() }}@stop

@section('titletwit'){{ $galleries->judul }}@stop

@if($galleries->image)
    @section('image'){{ url('images/galleri/'.$galleries->image) }}@stop
@endif

@if($galleries->image)
    @section('thumbs'){{ url('images/galleri/thumbs/'.$galleries->image) }}@stop
@endif

@if($galleries->image)
  @section('imagetwit'){{ url('images/galleri/'.$galleries->image) }}@stop
@endif

@section('content')
        <div class="page-header">
            <div class="container">
                <h1 class="title"></h1>
            </div>
            <div class="breadcrumb-box">
                <div class="container">
                    <ul class="breadcrumb">
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li>
                            <a href="/all-gallery">Pages</a>
                        </li>
                        <li class="active">Detail Gallery</li>
                    </ul>
                </div>
            </div>
        </div>
          <section id="about-us" class="page-section" data-animation="fadeInUp">
            <div class="container">
                <div class="row">
                    <div data-appear-animation="fadeInLeft" class="col-md-6 text-center appear-animation fadeInLeft appear-animation-visible">
                        <!-- Image -->
                        <img width="960" height="960" alt="" src="/images/galleri/{{ $galleries->image }}" alt="" class="img-responsive">
                    </div>
                    <div class="col-md-6">
                        <div class="section-title text-left" data-animation="fadeInUp">
                            <!-- Title -->
                                <h4 href="#" class="role">{{$galleries->judul}}</h4>
                        </div>
                        <!-- Content -->
                        <div data-animation="fadeInDown">
                                <p> {!! $galleries->deskripsi !!}</p>
                        </div>
                          <div class="post-footer">
                          <h5>Share this post:</h5>
                          <ul class="list-inline list-inline-xs">
                            <li>
                              <a href="javascript:window.open('https://www.facebook.com/sharer/sharer.php?u={{ request()->url() }}','Facebook Share','width=500,height=500')" class="fa fa-facebook">
                              </a>
                            </li>
                            <li>
                              <a href="javascript:window.open('https://plus.google.com/share?url={{ request()->url() }}','Google plus Share','width=500,height=500')" class="fa fa-google-plus">
                              </a>
                            </li>
                            <li>
                              <a href="javascript:window.open('https://twitter.com/intent/tweet?url={{ request()->url() }}','Twitter Share','width=500,height=500')" class="fa fa-twitter">
                              </a>
                            </li>
                            <li>
                              <a href="javascript:window.open('whatsapp://send?text={{ request()->url() }}','Whatsapp Share','width=500,height=500')" class="fa fa-whatsapp">
                              </a>
                            </li>
                          </ul>
                        </div>
                        <!-- Features -->
                    </div>
                </div>
            </div>
        </section>
            <!-- about-us -->

        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="owl-carousel pagination-1" data-pagination="true" data-items="6" data-autoplay="true" data-navigation="false">
                    @foreach($image_galleries as $i=>$image_gallery)

                        <div class="col-sm-4 col-md-3 animated fadeInLeft visible" data-animation="fadeInLeft">
                          <!-- Product Item-->
                          <div class="product-item bakery">
                              <div class="product-img">
                                <img src="/images/image-gallery/thumbs/{{ $image_gallery->image }}" alt="" class="img-responsive">
                                <a href="/images/image-gallery/{{ $image_gallery->image }}" data-rel="prettyPhoto[portfolio1]">
                                <a href="/images/image-gallery/{{ $image_gallery->image }}" data-rel="prettyPhoto[portfolio]"><i class="icon-magnifier bg-color text-white fa-2x icons-circle border-color"></i></a>
                              </div>
                            </div>
                        </div>
                    @endforeach 
                    </div>
                </div>
            </div>
        </div>

@endsection
@section('js')
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.10&appId=1695128474132497';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
@endsection