@extends('layouts.home')

@section('content')
    <section class="slider" id="home">
        <div class="tp-banner">
            <ul>
                @if(!empty($sliders[0]->judul))
                    @foreach($sliders as $i=>$slider)
                        <li data-slotamount="6" data-masterspeed="1200" data-delay="7000" data-title="Features Slide">
                            <img src="{{URL::to('images/slider').'/'.$slider->gambar}}" alt=""
                                 data-bgposition="center top" data-kenburns="on"
                                 data-duration="16000" data-ease="Linear.easeNone" data-bgfit="110" data-bgfitend="100"
                                 data-bgpositionend="center center"/>
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
                                     data-speed="800" data-start="1400" data-easing="Power3.easeInOut"
                                     data-endspeed="300"
                                     style="z-index: 5">
                                    <a href="{{ url('/slider/detail/'.$slider->id) }}" class="btn btn-default btn-lg">Lihat
                                        Selengkapnya</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @else
                    <li data-slotamount="6" data-masterspeed="1200" data-delay="7000" data-title="Features Slide">
                        <img src="{{URL::to('/front/img/pilmapres.jpg')}}" alt="" data-bgposition="center top"
                             data-kenburns="on"
                             data-duration="16000" data-ease="Linear.easeNone" data-bgfit="110" data-bgfitend="100"
                             data-bgpositionend="center center"/>
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

    <section id="call-to-action" class="page-section no-pad bg-color">
        <div class="container">
            <div class="row">
                <div class="col-md-12 top-pad-20 bottom-pad-20 text-center">
                    <h3 class="text-capitalize inline-block tb-margin-20 black animated fadeInUp visible"
                        data-animation="fadeInUp">
                        Pengumuman daftar peserta PILMAPRES 2020 sudah bisa dilihat.
                    </h3>
                    <div class="inline-block lr-pad-20">
                        <a href="#" class="btn btn-transparent-black btn-lg animated fadeInDown visible"
                           data-animation="fadeInDown">Klik disini untuk mendapatkan Akun</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- call-to-action -->

    <section id="pengumuman" class="page-section">
        <div class="container">
            <div class="section-title animated fadeInUp visible" data-animation="fadeInUp">
                <h2 class="title">Pengumuman</h2>
            </div>
            <div class="row animated fadeInUp visible" data-animation="fadeInUp">
                @foreach($pengumumans as $pengumuman)
                    <div class="col-md-4">
                        <p class="text-center opacity">
                            @if ($pengumuman->file !== null)
                                <img alt="" src="{{ URL::to('images/pengumuman/'.$pengumuman->file) }}" width="370" height="185">
                            @else
                                <img alt="" src="https://via.placeholder.com/370x185.png?text=Pengumuman" width="370" height="185">
                            @endif
                        </p>
                        <h4><a class="black" href="#">{{ $pengumuman->judul }}</a></h4>
                        <p>{!! str_limit($pengumuman->deskripsi, 200) !!}</p>
                        <div class="meta top-pad-10">
                            <span class="time">{{ $pengumuman->user->name }}, {{ $pengumuman->updated_at }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- pengumuman -->
@endsection