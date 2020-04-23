@extends('layouts.admin')

@section('content')
	<section class="content-header">
	<h1>
	  Kategori Agenda
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="{{URL::to('/kategori-events/index')}}">Daftar Kategori Agenda</a></li>
	</ol>
	</section>
	<section class="content">
	  <div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'earchkategorievents','role'=>'search'])  !!}
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
				<a href="{{URL::to('/kategori-events/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> create</a>
			</div>
			<br>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
		       			<th><b>Kategori Berita</b></th>
		       			<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>
				<tstatus>
			   		@foreach($category as $i=>$category)
		     			<tr>
						     <td> {{ $i+1 }} </td>
		         			<td> {{ $category->judul }} </td>	         
		         			<td>
								<a href='{{URL::action("admin\CategoryEventController@edit",array($category->id_category_event))}}'>edit</a>
								<a href='{{URL::action("admin\CategoryEventController@show",array($category->id_category_event))}}'>show</a>
								<form id="delete_role{{$category->id_category_event}}" action='{{URL::action("admin\CategoryEventController@destroy",array($category->id_category_event))}}' method="POST">
								    <input type="hidden" name="_method" value="delete">
								    <input type="hidden" name="_token" value="{{ csrf_token() }}">
								    <a href="#" onclick="document.getElementById('delete_role{{$category->id_category_event}}').submit();">delete</a>
								</form>
						  	</td>
		     			</tr>
			   		@endforeach
				</tstatus>
			</table>
			</div>
		</div>
	</section>
@endsection
