@extends('layouts.home')

@section('content')

  <div class="page-header">
    <div class="container">
        <h1 class="title">{{ $slider->judul }}</h1>
    </div>
    <div class="breadcrumb-box">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li class="active">Detail Slider</li>
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
                            <img src="{{ asset('/images/slider/'.$slider->gambar)}}" width="790" height="440" alt="">
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-6"><h2>{{ $slider->judul }}</h2></div>
                    <div class="col-md-12">{!! $slider->deskripsi !!}</div>
                    <!-- <div class="col-sm-6 col-md-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem praesentium deleniti nostrum laborum rem id nihil tempora. Adipisci ea commodi unde nam placeat cupiditate quasi a ducimus rem consequuntur ex eligendi minima voluptatem assumenda voluptas quidem sit maiores odio velit voluptate.</div> -->
                </div>
                       <left> 
                            <a href="/home" class="btn btn-default"> Kembali</a> 
                       </left>
                <hr />
            </div>
            <div class="sidebar col-sm-12 col-md-3">
                <div class="widget">
                    <div class="widget-title">
                        <h3 class="title">Slider Terbaru</h3>
                    </div>
                    <div id="MainMenu">
                        <div class="list-group panel">
                            <div class="collapse in" id="demo4">
                                @foreach($list_slider as $i=>$list_sliders)
                                    <a href="/slider/detail/{{ $list_sliders->id }}" class="list-group-item">{{$list_sliders->judul}}</a> 
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- page-list -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection