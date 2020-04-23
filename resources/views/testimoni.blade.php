@extends('layouts.home')

@section('content')
<section id="testimonials" class="page-section light-bg top-destination">
          <div class="section-title" data-animation="fadeInUp">
              <!-- Heading -->
              <h2 class="title">Apa Kata Alumni ?</h2>
          </div>
          <div class="container">
              <div class="row">
                  <div class="testimonails" data-animation="fadeInUp">
                  		<br>
                        @foreach($testimonis as $i=>$testimoni)
                          <div class="item col-md-4">
                               <div class="desc-border bottom-arrow light">
                                  <blockquote class="small-text text-center">{!! str_limit($testimoni->deskripsi, 150) !!}</blockquote>
                                  <div class="star-rating text-center">
                                  <i class="fa fa-star text-color"></i> 
                                  <i class="fa fa-star text-color"></i> 
                                  <i class="fa fa-star text-color"></i> 
                                  <i class="fa fa-star text-color"></i> 
                                  <i class="fa fa-star-half-o text-color"></i></div>
                              </div>
                              <div class="client-details text-center">
                                  <div class="client-image">
                                      <!-- Image -->
                                      <img class="img-circle" src="/images/testimony/{{ $testimoni->images }}" style="width: 80px;height: 80px;"
                                      alt="" />
                                  </div>
                                  <div class="client-details">
                                  <!-- Name -->
                                  <a href="/detail-testimony/{{ $testimoni->id }}"><strong class="text-color">{{ $testimoni->nama }}</strong></a>
                                  <!-- Company -->
                                   
                                  <span>{{ $testimoni->jabatan }}</span></div>
                              </div>
                          </div>
                        @endforeach
                        </div>
                        <div class="col-md-12" align="center">
                            <nav class="navbar-center">
           					{!! $testimonis->render() !!}
                        </nav>
                        </div>
                  	</div>
              	</div>
          	</div>
          	<div class="col-md-12" align="center">
                <nav class="navbar-center">
                <!-- paginet -->
            	</nav>
            </div>
      	</div>
</section>
@endsection