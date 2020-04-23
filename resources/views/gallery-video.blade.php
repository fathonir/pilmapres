@extends('layouts.home')

@section('content')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <section class="section-60 videoList">
    @foreach($videos as $video)
    <div class="grid">
      <a class="video-cover" style="background: url(images/video/<?= isset($video) ? $video->cover : '' ?>) center center; background-size: cover;" data-lightbox="iframe" href="<?= isset($video) ? $video->link : ''?>">
        <span class="link-circle link-white"><span class="icon icon-xl mdi mdi-play"></span></span>
      </a>
      <p>{{$video->judul}}</p>
    </div>
    @endforeach
    <div class="clearfix lastClear"></div>
  </section>
  <div class="text-center">
    <button class="btn btn-default addMoreVideo" style="background: #ff6600; margin: 10px auto;" onclick="addmoreVideos(2)">Load More</button>
  </div>
@endsection
@section('js')
<script>
  function addmoreVideos(page){
    $.ajax({
      url: "/api/get/videos?page="+page,
      type: "GET",
      success: function(response){
        if(response.data.length > 0){
          // loop inject data here
          $(response.data).each(function(index, item){
            console.log(item)
            var template="<div class='grid'>";
                  template+="<a class='video-cover' style='background: url(images/video/"+item.cover+") center center; background-size: cover;' data-lightbox='iframe' href='"+item.link+"'>";
                    template+="<span class='link-circle link-white'><span class='icon icon-xl mdi mdi-play'></span></span>";
                  template+="</a>";
                  template+="<p>"+item.judul+"</p>";
                template+="</div>";
            $('.lastClear').prepend(template);
            if(response.next_page_url != null){
              $('.addMoreVideo').attr('onclick', 'addmoreVideos('+response.next_page_url.split("page=")[1]+')');
            }
          })
        }else{
          alert("Tidak ada berita terbaru");
        }
      }
    })
  }
</script>
@endsection