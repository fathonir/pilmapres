@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
       Testimony
    </h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="{{URL::to('testimony/index')}}">List Testimony</a></li>
    </ol>
  </section>

	<section class="content">
	  <div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
					{!! Form::open(['method'=>'GET','url'=>'searchtestimony','role'=>'search'])  !!}
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
					<a href="{{URL::to('testimony/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> create</a>
				</div>
				<br>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
				   <th>No</th>
			       <th><b>Nama</b></th>
			       <th><b>Jabatan/Pekerjaan</b></th>
			       <th><b>Deskripsi</b></th>
			       <th><b>Pengalaman</b></th>
			       <th><b>Gambar</b></th>
			       <th class='text-center' style='width:70px'>Actions</th>
						</tr>
					</thead>
					<tstatus>
				   		
				   @foreach($testimonis as $i=>$testimoni)
			     <tr>
					<td>{{$i+1}}</td>
					<td> {{ $testimoni->nama}} </td>
					<td> {{ $testimoni->jabatan}} </td>
					<td>{!! str_limit($testimoni->deskripsi, 200) !!} <a href='{{URL::action("admin\TestimonyController@show",array($testimoni->id))}}'> Lihat Selengkapnya</a></td>
					<td>{!! str_limit($testimoni->pengalaman, 200) !!} <a href='{{URL::action("admin\TestimonyController@show",array($testimoni->id))}}'> Lihat Selengkapnya</a></td>
					<td>
					<a class="img-responsive" target="_blank" href="#"> <img src="{{ asset('/images/testimony/thumbs/'.$testimoni->images)}}" style="max-height:100px;max-width:100px;margin-top:10px;">

					</td>
					<td> 
			         <a href='{{URL::action("admin\TestimonyController@edit",array($testimoni->id))}}'>edit</a>
					 <a href='{{URL::action("admin\TestimonyController@show",array($testimoni->id))}}'>show</a>
			         <form id="delete_testimoni{{$testimoni->id}}" action='{{URL::action("admin\TestimonyController@destroy",array($testimoni->id))}}' method="POST">
						    <input type="hidden" name="_method" value="delete">
						    <input type="hidden" name="_token" value="{{ csrf_token() }}">
						    <a href="#" onclick="document.getElementById('delete_testimoni{{$testimoni->id}}').submit();">delete</a>
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