@extends('layouts.home')

@section('content')
        <div class="container">
            <p>
                <h4 class="title">Contact Us</h4>
            </p>
        </div>
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="/home">Home</a></li>
                    <li class="active">Contact Us</li>
                </ul>
            </div>
            <!-- page-header -->
            <section id="contact-us" class="page-section top-pad-30">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 contact-info">
                            <div class="row text-center">
                                <address class="col-sm-6 col-md-6">
                                    <i class="fa fa-microphone i-9x icons-circle text-color light-bg hover-black"></i>
                                    <div class="title">Call Center</div>
                                    <div>Support: 126</div>
                                </address>
                                <address class="col-sm-6 col-md-6">
                                    <i class="fa fa-envelope i-9x icons-circle text-color light-bg hover-black"></i>
                                    <div class="title">Email Addresses</div>
                                    <div>Support: <a href="mailto:pilmapres@kemdikbud.go.id">pilmapres@kemdikbud.go.id</a></div>
                                </address>
                            </div>
                        </div>
                    </div>
                    <hr class="pad-10">
	                <div class="row">
	                    <div class="col-md-12 top-pad-">
	                        <div class="googlemap-responsive">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4385.660062612762!2d106.80081686657233!3d-6.224031157574709!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f14e1d707519%3A0x36c14295a96410d4!2sGedung%20Ristekdikti!5e0!3m2!1sid!2sid!4v1587827552031!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen></iframe>
	                        </div>
	                    </div><!-- map -->
	            	</div>
	            </div>
            </section><!-- page-section -->
@endsection
