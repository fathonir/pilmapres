@extends('layouts.home')

@section('type'){{"article"}}@stop
@section('title'){{str_replace('&nbsp;',' ',preg_replace('/\s+/',' ',substr(strip_tags(str_limit($pengumuman->judul, 200, $end = '...')),0,160)))}}@stop

@section('isi_berita'){{str_replace('&nbsp;',' ',preg_replace('/\s+/',' ',substr(strip_tags(str_limit($pengumuman->deskripsi, 1000, $end = '...')),0,160)))}}@stop

@if($pengumuman->file)
  @section('image:url'){{ url('images/pengumuman/'.$pengumuman->file) }}@stop
@endif

@if($pengumuman->file)
  @section('image'){{ url('images/pengumuman/'.$pengumuman->file) }}@stop
@endif

@section('fb_description'){{str_replace('&nbsp;',' ',preg_replace('/\s+/',' ',substr(strip_tags(str_limit($pengumuman->deskripsi, 1000, $end = '...')),0,160)))}}@stop

@section('url'){{ request()->url() }}@stop

@section('titletwit'){{ $pengumuman->judul }}@stop

@if($pengumuman->file)
    @section('image'){{ url('images/pengumuman/'.$pengumuman->file) }}@stop
@endif

@if($pengumuman->file)
    @section('thumbs'){{ url('images/pengumuman/thumbs/'.$pengumuman->file) }}@stop
@endif

@if($pengumuman->file)
  @section('imagetwit'){{ url('images/pengumuman/'.$pengumuman->file) }}@stop
@endif

@section('content')
<div class="page-header">
    <div class="container">
        <h1 class="title">{{{$pengumuman->judul}}}</h1>
    </div>
    <div class="breadcrumb-box">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="/tabel-list-pengumuman">Pages</a>
                </li>
                <li class="active">Detail Pengumuman</li>
            </ul>
        </div>
    </div>
</div>
<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-9">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <a href="portfolio-single.html" class="image">
                            <img src="{{ asset('/images/pengumuman/'.$pengumuman->file)}}" width="790" height="440" alt="">
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-6"><h2>{{{$pengumuman->judul}}}</h2></div>
                    <!-- <div class="col-sm-6 col-md-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem praesentium deleniti nostrum laborum rem id nihil tempora. Adipisci ea commodi unde nam placeat cupiditate quasi a ducimus rem consequuntur ex eligendi minima voluptatem assumenda voluptas quidem sit maiores odio velit voluptate.</div> -->
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-12">{!! $pengumuman->deskripsi !!}</div>
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
            </div>
            <div class="sidebar col-sm-12 col-md-3">
                <div class="widget">
                    <div class="widget-title">
                        <h3 class="title">Pengumuman Terbaru</h3>
                    </div>
                    <div id="MainMenu">
                        <div class="list-group panel">
                            <div class="collapse in" id="demo4">
                                @foreach($pengumumans as $i=>$pengumuman)
                                    <a href="/detail-pengumuman/{{ $pengumuman->id }}" class="list-group-item">{{$pengumuman->judul}}</a> 
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- page-list -->
                </div>
            </div>
        </div>
    </div>
    <center> 
         <a href="/home" class="btn btn-default"> Kembali</a> 
    </center>
</section>

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