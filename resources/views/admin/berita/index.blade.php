@extends('layouts.admin')

@section('content')
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
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'search-news','role'=>'search'])  !!}
					<div class='form-group clearfix'>
						<div class='col-md-4'>
                			<div class="input-group custom-search-form">
                  				<input type="text" class="form-control" name="search" placeholder="Search...">
			                    <span class="input-group-btn">
			                    	<span class="input-group-btn">
								    	<button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Search</button>
								    </span>
			                    </span>
                			</div>
             			</div>
          			</div>
      			{!! Form::close() !!}
			</div>
			<div class='pull-right'>
				<a href="{{URL::to('/news/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> create</a>
			</div>
			<br>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
		       			<th><b>Kategori</b></th>
		       			<th><b>Judul</b></th>
		       			<th><b>Tanggal Upload</b></th>
		       			<th><b>Isi Berita</b></th>
		       			<th><b>Pembuat</b></th>
		       			<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>
				<tstatus>
			   		@foreach($beritas as $i=>$berita)
		     			<tr>
		     		 		<td>{{$start_page}}</td>
		         			<td> {{ $berita->nama }} </td>	         
		         			<td> {{ $berita->judul }} </td>	         
		         			<td> {{ $berita->tanggal }} </td>	         
		         			<td> {!! str_limit($berita->isi_berita, 50) !!} </td>	         
		         			<td> {{ $berita->username }} </td>	         
		         			<td>
								<a href='{{URL::action("admin\BeritaController@edit",array($berita->id))}}'>edit</a>
								<a href='{{URL::action("admin\BeritaController@show",array($berita->id))}}'>show</a>
								<form id="delete_role{{$berita->id}}" action='{{URL::action("admin\BeritaController@destroy",array($berita->id))}}' method="POST">
								    <input type="hidden" name="_method" value="delete">
								    <input type="hidden" name="_token" value="{{ csrf_token() }}">
								    <a href="#" onclick="document.getElementById('delete_role{{$berita->id}}').submit();">delete</a>
								</form>
						  	</td>
		     			</tr>
		     			<?php $start_page = $start_page+1 ?>
			   		@endforeach
				</tstatus>
			</table>
			{!! $beritas->render() !!}
			</div>
		</div>
	</section>
@endsection
@section('js')
<script>
	$( document ).ready(function() {
		var message = '{{session('flash-error')}}';
		if(message!=''){
			alert('{{session('flash-error')}}');
		}
	})
</script>
@endsection