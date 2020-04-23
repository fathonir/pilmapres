@extends('layouts.home')

@section('content')
  <!-- Sticky Navbar -->
  <section class="slider" id="home">
      <div class="tp-banner">
          <ul>

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

                  <!-- Feature Slide Ends -->
              </ul>
              <div class="tp-bannertimer"></div>
          </div>
  </section>
  <!-- slider -->

  <section id="blog" class="page-section">
      <div class="container">
          <div class="section-title" data-animation="fadeInUp">
              <!-- Heading -->
              <h2 class="title">FINALIS</h2>
          </div>
          <div class="col-md-12">
          <!-- <div class="container work-section"> -->
              <ul role="tablist" class="nav nav-tabs" id="myTab">
                <li role="presentation" class="active"><a aria-controls="sarjana" data-toggle="tab" id="sarjana-tab" role="tab" href="#sarjana" aria-expanded="false">Sarjana</a></li>
                <li role="presentation" class=""><a aria-controls="diploma" data-toggle="tab" id="diploma-tab" role="tab" href="#diploma" aria-expanded="false">Diploma</a></li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div aria-labelledby="sarjana-tab" id="sarjana" class="tab-pane fade active in" role="tabpanel">
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                    <h3 class="panel-title" id="panel-title">Finalis Sarjana</h3>
                    </div>
                    <div class="panel-body table-responsive">
                      <table class="table table-striped">
                        <thead>
                        <tr>
                          <th>No.</th>
                          <th></th>
                          <th>Nama Peserta</th>
                          <th>Asal Perguruan Tinggi</th>
                          <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td><img class="img-circle" src="/front/img/xample-photo.png" width="40" height="40" alt=""></td>
                          <td>ANNISA DEWI NUGRAHANI</td>
                          <td>Universitas Padjadjaran</td>
                          <td>
                            <a href="/detail-finalis" class="btn btn-info btn-xs detail-prestasi" type="button"><b><i class="fa fa-search-plus"></i> DETAIL</b></a>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td><img class="img-circle" src="/front/img/xample-photo.png" width="40" height="40" alt=""></td>
                          <td>BIMA DEWANTO SRIWIBOWO</td>
                          <td>Universitas Negeri Jakarta</td>
                          <td>
                            <a href="/detail-finalis" class="btn btn-info btn-xs detail-prestasi" type="button"><b><i class="fa fa-search-plus"></i> DETAIL</b></a>
                          </td>
                        </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div aria-labelledby="diploma-tab" id="diploma" class="tab-pane fade" role="tabpanel">
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                    <h3 class="panel-title" id="panel-title">Finalis Diploma</h3>
                    </div>
                    <div class="panel-body table-responsive">
                      <table class="table table-striped">
                        <thead>
                        <tr>
                          <th>No.</th>
                          <th></th>
                          <th>Nama Peserta</th>
                          <th>Asal Perguruan Tinggi</th>
                          <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td><img class="img-circle" src="/front/img/xample-photo.png" width="40" height="40" alt=""></td>
                          <td>ANNISA DEWI NUGRAHANI</td>
                          <td>Universitas Padjadjaran</td>
                          <td>
                            <a href="/detail-finalis" class="btn btn-info btn-xs detail-prestasi" type="button"><b><i class="fa fa-search-plus"></i> DETAIL</b></a>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td><img class="img-circle" src="/front/img/xample-photo.png" width="40" height="40" alt=""></td>
                          <td>BIMA DEWANTO SRIWIBOWO</td>
                          <td>Universitas Negeri Jakarta</td>
                          <td>
                            <a href="/detail-finalis" class="btn btn-info btn-xs detail-prestasi" type="button"><b><i class="fa fa-search-plus"></i> DETAIL</b></a>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td><img class="img-circle" src="/front/img/xample-photo.png" width="40" height="40" alt=""></td>
                          <td>I GEDE STHITAPRAJNA VIRANANDA</td>
                          <td>Universitas Indonesia</td>
                          <td>
                            <a href="/detail-finalis" class="btn btn-info btn-xs detail-prestasi" type="button"><b><i class="fa fa-search-plus"></i> DETAIL</b></a>
                          </td>
                        </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>   
          </div>
      </div>
      <div class="clearfix">
      </div>
  </section>
@endsection