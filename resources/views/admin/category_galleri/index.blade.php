@extends('layouts.admin')

@section('content')
	<section class="content-header">
	<h1>
	  Kategori Galeri
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="{{URL::to('category-galleri/index')}}">Daftar Kategori Galeri</a></li>
	</ol>
	</section>
	<section class="content">
	  <div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchcategorygalleri','role'=>'search'])  !!}
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
				<a href="{{URL::to('category-galleri/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> create</a>
			</div>
			<br>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
		       			<th><b>Judul</b></th>
		       			<th><b>Deskripsi</b></th>
		       			<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>
				<tstatus>
			   		@foreach($categori_galleri as $i=>$categori_galleris)
		     			<tr>
		     		 		<td>{{$start_page}}</td>
		         			<td> {{ $categori_galleris->judul }} </td>	         
		         			<td> {!! $categori_galleris->deskripsi !!} </td>	         
		         			<td>
								<a href='{{URL::action("admin\CategoryGalleriController@edit",array($categori_galleris->id_category_galleries))}}'>edit</a>
								<a href='{{URL::action("admin\CategoryGalleriController@show",array($categori_galleris->id_category_galleries))}}'>show</a>
								<form id="delete_role{{$categori_galleris->id_category_galleries}}" action='{{URL::action("admin\CategoryGalleriController@destroy",array($categori_galleris->id_category_galleries))}}' method="POST">
								    <input type="hidden" name="_method" value="delete">
								    <input type="hidden" name="_token" value="{{ csrf_token() }}">
								    <a href="#" onclick="document.getElementById('delete_role{{$categori_galleris->id_category_galleries}}').submit();">delete</a>
								</form>
						  	</td>
		     			</tr>
		     			<?php $start_page = $start_page+1 ?>
			   		@endforeach
				</tstatus>
			</table>
			{!! $categori_galleri->render() !!}
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