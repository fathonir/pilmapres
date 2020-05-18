@extends('layouts.home')

@section('content')
  <!-- Sticky Navbar -->
  <section class="slider" id="home">
      <div class="tp-banner">
          <ul>
                @if(!empty($sliders[0]->judul))
                   @foreach($sliders as $i=>$slider)
                      <li data-slotamount="6" data-masterspeed="1200" data-delay="7000" data-title="Features Slide">
                          <img src="{{URL::to('images/slider').'/'.$slider->gambar}}" alt="" data-bgposition="center top" data-kenburns="on"
                          data-duration="16000" data-ease="Linear.easeNone" data-bgfit="110" data-bgfitend="100"
                          data-bgpositionend="center center" />
                          <div class="elements">
                              <h2 class="tp-caption white text-shadow tp-resizeme sft skewtotop title text-uppercase customin customout rs-parallaxlevel-1"
                              data-hoffset="0" data-voffset="0" data-x="right" data-y="375"
                              data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                              data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                              data-speed="800" data-start="800" data-startslide="1" data-easing="Power4.easeOut"
                              data-endspeed="500" data-endeasing="Power4.easeIn"> 
                              <b class="text-color">{{ $slider->judul }}</b></h2>
                              <!-- <div class="tp-caption white tp-resizeme lfr skewtoright description text-right rs-parallaxlevel-2"
                              data-x="right" data-y="440" data-speed="800" data-start="1200" data-easing="Power4.easeOut"
                              data-endspeed="500" data-endeasing="Power1.easeIn" style="max-width: 600px">
                                  <p>{!! str_limit($slider->deskripsi, 200) !!}</p>
                              </div> -->
                              <div class="tp-caption tp-resizeme customin customout rs-parallaxlevel-3" data-x="right"
                              data-y="540"
                              data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                              data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                              data-speed="800" data-start="1400" data-easing="Power3.easeInOut" data-endspeed="300"
                              style="z-index: 5">
                                  <a href="{{ url('/slider/detail/'.$slider->id) }}" class="btn btn-default btn-lg">Lihat Selengkapnya</a>
                              </div>
                          </div>
                      </li>
                      @endforeach
                  @else
                    <li data-slotamount="6" data-masterspeed="1200" data-delay="7000" data-title="Features Slide">
                      <img src="{{URL::to('/front/img/pilmapres.jpg')}}" alt="" data-bgposition="center top" data-kenburns="on"
                      data-duration="16000" data-ease="Linear.easeNone" data-bgfit="110" data-bgfitend="100"
                      data-bgpositionend="center center" />
                      <div class="elements">
                          <h2 class="tp-caption white text-shadow tp-resizeme sft skewtotop title text-uppercase customin customout rs-parallaxlevel-1"
                          data-hoffset="0" data-voffset="0" data-x="right" data-y="375"
                          data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                          data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                          data-speed="800" data-start="800" data-startslide="1" data-easing="Power4.easeOut"
                          data-endspeed="500" data-endeasing="Power4.easeIn"> 
                          <b class="text-color"></b></h2>
                      </div>
                    </li>                
                  @endif

                  <!-- Feature Slide Ends -->
              </ul>
              <div class="tp-bannertimer"></div>
          </div>
  </section>
  <!-- slider -->
  @include('sweet::alert')
  
@endsection