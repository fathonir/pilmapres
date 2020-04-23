@extends('layouts.home')
@section('content')
<section id="testimonials" class="page-section">
	<div class="container">
        <div class="row top-pad-30">
                    <div class="col-md-6 col-sm-6 text-center animated fadeInLeft visible" data-animation="fadeInLeft">
                        <!-- Image -->
                        <img class="img-circle" src="{{ asset('/images/testimony/thumbs/'.$testimonis->images)}}" style="width: 360px; height: 370px" alt="">
                    </div>
                    <div class="col-md-6 col-sm-6 animated fadeInRight visible" data-animation="fadeInRight">
	                    <div class="testmon">
	                    	<h1>{{ $testimonis->nama }}</h1>
	                    	<p>{{ $testimonis->jabatan }}</p>
	                    	<br>
	                        <p class="lead">
	                            <strong>{!! $testimonis->deskripsi !!}</strong>
	                        </p>
	                        <p>{!! $testimonis->pengalaman !!}</p>
	                        
	                    </div>
                    </div>
                </div>

    </div>
</section>









@endsection