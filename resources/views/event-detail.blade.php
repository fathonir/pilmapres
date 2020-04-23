@extends('layouts.home')
<!-- @section('type'){{"article"}}@stop
@section('title'){{str_replace('&nbsp;',' ',preg_replace('/\s+/',' ',substr(strip_tags(str_limit($berita->judul, 200, $end = '...')),0,160)))}}@stop

@section('isi_berita'){{str_replace('&nbsp;',' ',preg_replace('/\s+/',' ',substr(strip_tags(str_limit($berita->isi_berita, 1000, $end = '...')),0,160)))}}@stop

@if($berita->gambar)
  @section('image:url'){{ url('images/berita/'.$berita->gambar) }}@stop
@endif

@if($berita->gambar)
  @section('image'){{ url('images/berita/'.$berita->gambar) }}@stop
@endif

@section('fb_description'){{str_replace('&nbsp;',' ',preg_replace('/\s+/',' ',substr(strip_tags(str_limit($berita->isi_berita, 1000, $end = '...')),0,160)))}}@stop

@section('url'){{ request()->url() }}@stop

@section('titletwit'){{ $berita->judul }}@stop

@if($berita->gambar)
    @section('image'){{ url('images/berita/'.$berita->gambar) }}@stop
@endif

@if($berita->gambar)
    @section('thumbs'){{ url('images/berita/thumbs/'.$berita->gambar) }}@stop
@endif

@if($berita->gambar)
  @section('imagetwit'){{ url('images/berita/'.$berita->gambar) }}@stop
@endif -->

@section('content')
<div class="page-header">
    <div class="container">
        <h1 class="title">Detail Event</h1>
    </div>
    <div class="breadcrumb-box">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="#">Pages</a>
                </li>
                <li class="active">Detail Event</li>
            </ul>
        </div>
    </div>
</div>
<!-- page-header -->
<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-9">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <a href="portfolio-single.html" class="image">
                            <img src="http://placehold.it/790x440" width="790" height="440" alt="">
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem praesentium deleniti nostrum laborum rem id nihil tempora. Adipisci ea commodi unde nam placeat cupiditate quasi a ducimus rem consequuntur ex eligendi minima voluptatem assumenda voluptas quidem sit maiores odio velit voluptate.</div>
                    <div class="col-sm-6 col-md-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem praesentium deleniti nostrum laborum rem id nihil tempora. Adipisci ea commodi unde nam placeat cupiditate quasi a ducimus rem consequuntur ex eligendi minima voluptatem assumenda voluptas quidem sit maiores odio velit voluptate.</div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-12">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem praesentium deleniti nostrum laborum rem id nihil tempora. Adipisci ea commodi unde nam placeat cupiditate quasi a ducimus rem consequuntur ex eligendi minima voluptatem assumenda voluptas quidem sit maiores odio velit voluptate. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem praesentium deleniti nostrum laborum rem id nihil tempora. Adipisci ea commodi unde nam placeat cupiditate quasi a ducimus rem consequuntur ex eligendi minima voluptatem assumenda voluptas quidem sit maiores odio velit voluptate.</div>
                </div>
            </div>
            <div class="sidebar col-sm-12 col-md-3">
                <div class="widget">
                    <div class="widget-title">
                        <h3 class="title">Pages</h3>
                    </div>
                    <div id="MainMenu">
                        <div class="list-group panel">
                            <a href="#demo3" class="list-group-item" data-toggle="collapse" data-parent="#MainMenu">Pages List</a>
                            <div class="collapse in" id="demo3">
                            <a href="#SubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu1">Service 
                            <i class="fa fa-caret-down"></i></a>
                            <div class="collapse list-group-submenu" id="SubMenu1">
                            <a href="#" class="list-group-item" data-parent="#SubMenu1">Service Layout 1</a> 
                            <a href="#" class="list-group-item" data-parent="#SubMenu1">Service Layout 2</a> 
                            <a href="#" class="list-group-item" data-parent="#SubMenu1">Service Layout 3</a> 
                            <a href="#" class="list-group-item" data-parent="#SubMenu1">Service Layout 4</a> 
                            <a href="#" class="list-group-item" data-parent="#SubMenu1">Service Layout 5</a> 
                            <a href="#SubSubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubSubMenu1">Service 3 
                            <i class="fa fa-caret-down"></i></a>
                            <div class="collapse list-group-submenu list-group-submenu-1" id="SubSubMenu1">
                            <a href="#" class="list-group-item" data-parent="#SubSubMenu1">Features</a> 
                            <a href="#" class="list-group-item" data-parent="#SubSubMenu1">Careers</a></div></div>
                            <a href="javascript:;" class="list-group-item">Team</a> 
                            <a href="javascript:;" class="list-group-item">Testimonials</a></div>
                            <a href="#demo4" class="list-group-item" data-toggle="collapse" data-parent="#MainMenu">About Us</a>
                            <div class="collapse in" id="demo4">
                            <a href="" class="list-group-item">About US Layout 1</a> 
                            <a href="" class="list-group-item">About US Layout 2</a> 
                            <a href="" class="list-group-item">About US Layout 3</a></div>
                        </div>
                    </div>
                    <!-- page-list -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- page-section -->
@endsection
<!-- @section('js')
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.10&appId=1695128474132497';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
@endsection -->