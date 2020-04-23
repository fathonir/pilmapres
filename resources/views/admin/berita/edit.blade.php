@extends('layouts.admin')

@section('content')
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" rel="stylesheet">   
</head>
  <section class="content-header">
    <h1>
      Berita
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{URL::to('/news')}}">Daftar Berita</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
      	{!! Form::model($berita,['method'=>'put', 'files'=> 'true', 'action'=>['admin\BeritaController@update',$berita->id]]) !!}
	        <div class='form-group clearfix'>
            {{ Form::label("judul", "Judul", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("judul", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('judul')}}</span>
              </div>
          </div>
          <div class='form-group clearfix'>
            {{ Form::label("category_berita_id", "Kategori Berita", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::select('category_berita_id', $categories, null,['class' => 'form-control required']) }}
              </div>
          </div>
          <!-- <div class='form-group clearfix'>
            {{ Form::label("tanggal", "Tanggal Berita Upload", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("tanggal", null, ['class' => 'form-control required'],['is' => 'datepicker']) }}
                <span class="error">{{$errors->first('tanggal')}}</span>
              </div>
          </div> -->
          <div class='form-group  clearfix'>
            {{ Form::label("tanggal", "Tanggal Berita Upload", ['class' => 'col-md-2 control-label']) }}
              <input type="text" id="datepicker" name="tanggal" class="required datepicker" placeholder="Masukan Tanggal" value="{{{$berita->tanggal}}}">
            </div>
          <div class='form-group clearfix'>
            {{ Form::label("gambar", "Gambar", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-10'>
              <input type="file" name="gambar" accept="image/x-png, image/jpeg">
                <span class="error">{{$errors->first('gambar')}}</span>
              </div>
          </div>
          <div class='form-group clearfix'>
            {{ Form::label("file", "File", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-10'>
              <input type="file" name="file">
                <span class="error">{{$errors->first('file')}}</span>
              </div>
          </div>
          <div class='form-group clearfix'>
            {{ Form::label("isi_berita", "Isi Berita", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-10'>
                <textarea class="form-control required" id="isi_berita" name="isi_berita">{!! $berita->isi_berita !!}</textarea>
                <span class="error">{{$errors->first('isi_berita')}}</span>
              </div>
          </div>     
          <div class='form-group'>
          	<div class='col-md-4 col-md-offset-2'>
            	<button class='btn btn-primary' type='submit' name='save' id='save'><span class='glyphicon glyphicon-save'></span> Save</button>
          	</div>
        	</div>
        {!! Form::close() !!}
    	</div>
  	</div>
	</section>
@endsection
@section('js')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'isi_berita' );
</script>

<script type="text/javascript">
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: '-80:+0',
      dateFormat: "yy-mm-dd"
    });
    $( "#datepicker2" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: '-80:+0',
      dateFormat: "yy-mm-dd"
    });
</script>
<script>
    $(document).ready(function(){
      $("input[data-type='number']").keyup(function(event){
        // skip for arrow keys
        if(event.which >= 37 && event.which <= 40){
            event.preventDefault();
        }
        var $this = $(this);
        var num = $this.val().replace(/,/gi, "");
        var num2 = num.split(/(?=(?:\d{3})+$)/).join(",");
        console.log(num2);
        // the following line has been simplified. Revision history contains original.
        $this.val(num2);
        var bla = $('#id_step2-number_4').val(num);
        console.log(num);
      });
    });
</script>

@endsection