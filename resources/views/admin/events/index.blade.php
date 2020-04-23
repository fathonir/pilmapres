@extends('layouts.admin')

@section('content')
	<section class="content-header">
	<h1>
	  Events
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="{{URL::to('/events')}}">Daftar Events</a></li>
	</ol>
	</section>
	<section class="content">
	  <div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'search-events','role'=>'search'])  !!}
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
				<a href="{{URL::to('/events/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> create</a>
			</div>
			<br>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
		       			<th><b>Gambar</b></th>
		       			<th><b>Judul</b></th>
		       			<th><b>File</b></th>
		       			<th><b>Deskripsi</b></th>
		       			<th><b>Pembuat</b></th>
		       			<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>
				<tstatus>
			   		@foreach($events as $i=>$event)
		     			<tr>
		     		 		<td>{{$start_page}}</td>
		         			<td> <img src="{{URL::to('images/event/thumbs').'/'.$event->gambar}}" style="width:70px"> </td>	         
		         			<td> {{ $event->judul }} </td>	         
		         			<td> {{ $event->file }} </td>	         
		         			<td> {!! str_limit($event->deskripsi, 50) !!} </td>	         
		         			<td> {{ $event->username }} </td>	         
		         			<td>
								<a href='{{URL::action("admin\EventController@edit",array($event->id))}}'>edit</a>
								<form id="delete_role{{$event->id}}" action='{{URL::action("admin\EventController@destroy",array($event->id))}}' method="POST">
								    <input type="hidden" name="_method" value="delete">
								    <input type="hidden" name="_token" value="{{ csrf_token() }}">
								    <a href="#" onclick="document.getElementById('delete_role{{$event->id}}').submit();">delete</a>
								</form>
						  	</td>
		     			</tr>
		     			<?php $start_page = $start_page+1 ?>
			   		@endforeach
				</tstatus>
			</table>
			{!! $events->render() !!}
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