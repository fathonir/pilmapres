@extends('layouts.home')

@section('content')
  <section id="popular-hotels" class="page-section light-bg top-destination">
          <div class="container hotel-tab" role="tabpanel">
              <div class="section-title" data-animation="fadeInUp">
                  <!-- Heading -->
                  <h2 class="title">Event</h2>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <ul class="nav nav-tabs" role="tablist">
                          <li role="presentation"><a href="#list" aria-controls="list" role="tab" data-toggle="tab"><i class="icon-th-list2 fa-2x"></i></a></li>
                          <li role="presentation" class="active"><a href="#grid" aria-controls="grid" role="tab" data-toggle="tab"><i class="icon-th fa-2x"></i></a></li>
                      </ul>
                  </div>
              </div>
              <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="grid">
                      <div class="row text-center top-pad-30">
                          <div class="col-sm-3 col-md-3" data-animation="fadeInLeft">
                              <!-- Image Wrapper -->
                              <div class="img-wrapper">
                                  <img src="img/sections/hotel-1.jpg" alt="" class="img-responsive">
                                  <a href="img/sections/hotel-1.jpg" data-rel="prettyPhoto[portfolio1]">
                                  <i class="icon-plus6 bg-color text-white fa-2x icons-circle border-color"></i>
                                  </a>
                              </div>
                              <!-- Destination Box -->
                              <div class="destination-box">
                                  <h5>Gran Canaria</h5>
                                  <p class="pull-right"><strong>Avg/Night - <span class="text-color">$150</span></strong></p>
                                  <div class="star-rating text-left">
                                      <i class="fa fa-star text-color"></i> 
                                      <i class="fa fa-star text-color"></i> 
                                      <i class="fa fa-star text-color"></i> 
                                      <i class="fa fa-star text-color"></i> 
                                      <i class="fa fa-star-half-o text-color"></i>
                                  </div>
                                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
                                  <a href="#" class="btn btn-default">Select</a>
                              </div>
                          </div>
                          <div class="col-sm-3 col-md-3" data-animation="fadeInRight">
                              <!-- Image Wrapper -->
                              <div class="img-wrapper">
                                  <img src="img/sections/hotel-2.jpg" alt="" class="img-responsive">
                                  <a href="img/sections/hotel-2.jpg" data-rel="prettyPhoto[portfolio1]">
                                  <i class="icon-plus6 bg-color text-white fa-2x icons-circle border-color"></i>
                                  </a>
                              </div>
                              <!-- Destination Box -->
                              <div class="destination-box">
                                  <h5>Cleopatra Resort</h5>
                                  <p class="pull-right"><strong>Avg/Night - <span class="text-color">$250</span></strong></p>
                                  <div class="star-rating text-left">
                                      <i class="fa fa-star text-color"></i> 
                                      <i class="fa fa-star text-color"></i> 
                                      <i class="fa fa-star text-color"></i> 
                                      <i class="fa fa-star text-color"></i> 
                                      <i class="fa fa-star-half-o text-color"></i>
                                  </div>
                                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
                                  <a href="#" class="btn btn-default">Select</a>
                              </div>
                          </div>
                          <div class="col-sm-3 col-md-3" data-animation="fadeInLeft">
                              <!-- Image Wrapper -->
                              <div class="img-wrapper">
                                  <img src="img/sections/hotel-3.jpg" alt="" class="img-responsive">
                                  <a href="img/sections/hotel-3.jpg" data-rel="prettyPhoto[portfolio1]">
                                  <i class="icon-plus6 bg-color text-white fa-2x icons-circle border-color"></i>
                                  </a>
                              </div>
                              <!-- Destination Box -->
                              <div class="destination-box">
                                  <h5>Forte Do Vale</h5>
                                  <p class="pull-right"><strong>Avg/Night - <span class="text-color">$280</span></strong></p>
                                  <div class="star-rating text-left">
                                      <i class="fa fa-star text-color"></i> 
                                      <i class="fa fa-star text-color"></i> 
                                      <i class="fa fa-star text-color"></i> 
                                      <i class="fa fa-star text-color"></i> 
                                      <i class="fa fa-star-half-o text-color"></i>
                                  </div>
                                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
                                  <a href="#" class="btn btn-default">Select</a>
                              </div>
                          </div>
                          <div class="col-sm-3 col-md-3" data-animation="fadeInRight">
                              <!-- Image Wrapper -->
                              <div class="img-wrapper">
                                  <img src="img/sections/hotel-4.jpg" alt="" class="img-responsive">
                                  <a href="img/sections/hotel-4.jpg" data-rel="prettyPhoto[portfolio1]">
                                  <i class="icon-plus6 bg-color text-white fa-2x icons-circle border-color"></i>
                                  </a>
                              </div>
                              <!-- Destination Box -->
                              <div class="destination-box">
                                  <h5>Le Ville Del Lido</h5>
                                  <p class="pull-right"><strong>Avg/Night - <span class="text-color">$340</span></strong></p>
                                  <div class="star-rating text-left">
                                      <i class="fa fa-star text-color"></i> 
                                      <i class="fa fa-star text-color"></i> 
                                      <i class="fa fa-star text-color"></i> 
                                      <i class="fa fa-star text-color"></i> 
                                      <i class="fa fa-star-half-o text-color"></i>
                                  </div>
                                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
                                  <a href="#" class="btn btn-default">Select</a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="list">
                      <article>
                          <div class="row">
                              <div class="col-md-3">
                                  <!-- Image Wrapper -->
                                  <div class="img-wrapper">
                                      <img src="img/sections/hotel-1.jpg" alt="" class="img-responsive">
                                      <a href="img/sections/hotel-1.jpg" data-rel="prettyPhoto[portfolio1]">
                                      <i class="icon-plus6 bg-color text-white fa-2x icons-circle border-color"></i>
                                      </a>
                                  </div>
                              </div>
                              <div class="col-md-9">
                                  <div class="destination-box">
                                      <h5>Hotel Hilton</h5>
                                      <p class="pull-right"><strong>Avg/Night - <span class="text-color">$340</span></strong></p>
                                      <div class="star-rating text-left">
                                          <i class="fa fa-star text-color"></i> 
                                          <i class="fa fa-star text-color"></i> 
                                          <i class="fa fa-star text-color"></i> 
                                          <i class="fa fa-star text-color"></i> 
                                          <i class="fa fa-star-half-o text-color"></i>
                                      </div>
                                      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                      <a href="#" class="btn btn-default">Select</a>
                                  </div>
                              </div>
                          </div>
                      </article>
                      <article>
                          <div class="row">
                              <div class="col-md-3">
                                  <!-- Image Wrapper -->
                                  <div class="img-wrapper">
                                      <img src="img/sections/hotel-2.jpg" alt="" class="img-responsive">
                                      <a href="img/sections/hotel-2.jpg" data-rel="prettyPhoto[portfolio1]">
                                      <i class="icon-plus6 bg-color text-white fa-2x icons-circle border-color"></i>
                                      </a>
                                  </div>
                              </div>
                              <div class="col-md-9">
                                  <div class="destination-box">
                                      <h5>Forte Do Vale</h5>
                                      <p class="pull-right"><strong>Avg/Night - <span class="text-color">$340</span></strong></p>
                                      <div class="star-rating text-left">
                                          <i class="fa fa-star text-color"></i> 
                                          <i class="fa fa-star text-color"></i> 
                                          <i class="fa fa-star text-color"></i> 
                                          <i class="fa fa-star text-color"></i> 
                                          <i class="fa fa-star-half-o text-color"></i>
                                      </div>
                                      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                      <a href="#" class="btn btn-default">Select</a>
                                  </div>
                              </div>
                          </div>
                      </article>
                      <article>
                          <div class="row">
                              <div class="col-md-3">
                                  <!-- Image Wrapper -->
                                  <div class="img-wrapper">
                                      <img src="img/sections/hotel-3.jpg" alt="" class="img-responsive">
                                      <a href="img/sections/hotel-3.jpg" data-rel="prettyPhoto[portfolio1]">
                                      <i class="icon-plus6 bg-color text-white fa-2x icons-circle border-color"></i>
                                      </a>
                                  </div>
                              </div>
                              <div class="col-md-9">
                                  <div class="destination-box">
                                      <h5>Costa Brava</h5>
                                      <p class="pull-right"><strong>Avg/Night - <span class="text-color">$340</span></strong></p>
                                      <div class="star-rating text-left">
                                          <i class="fa fa-star text-color"></i> 
                                          <i class="fa fa-star text-color"></i> 
                                          <i class="fa fa-star text-color"></i> 
                                          <i class="fa fa-star text-color"></i> 
                                          <i class="fa fa-star-half-o text-color"></i>
                                      </div>
                                      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                      <a href="#" class="btn btn-default">Select</a>
                                  </div>
                              </div>
                          </div>
                      </article>
                  </div>
              </div>
              <div class="clearfix"></div>
              <div class="section-title text-center">
                <a class="btn btn-default" href="{{ url('/allpimpinan/') }}" role="button">Lihat selengkapnya</a>
              </div>
          </div>
        </section>
@endsection
<!-- @section('js')
  <script>
    function addmoreNews(page){
      $.ajax({
        url: "/api/get/articles?page="+page,
        type: "GET",
        success: function(response){
          if(response.data.length > 0){
            // loop inject data here
            $(response.data).each(function(index, item){
              var template="<div class='cell-sm-6 cell-lg-3 height-fill offset-top-40 offset-lg-top-0'>";
                    template+="<article class='icon-box'>";
                      template+="<div class='box-top'>";
                        template+="<div class='box-icon'>";
                          template+="<img src='/images/berita/thumbs/"+item.gambar+"'>";
                        template+="</div>";
                        template+="<div class='box-header'>";
                          template+="<h5><a href='/article-detail/"+item.id+"'>"+item.judul+"</a></h5>";
                        template+="</div>";
                      template+="</div>";
                      template+="<div class='box-body'>";
                        template+="<p class='text-gray text-spacing-50'>"+item.isi_berita.substring(0, 100)+"..."+"</p>";
                      template+="</div>";
                    template+="</article>";
                  template+="</div>";
              $('.beritaContainer').append(template);
              if(response.next_page_url != null){
                $('.addMoreNews').attr('onclick', 'addmoreNews('+response.next_page_url.split("page=")[1]+')');
              }
            })
          }else{
            alert("Tidak ada berita terbaru");
          }
        }
      })
    }
  </script>
@endsection -->