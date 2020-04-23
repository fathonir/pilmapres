@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Type Banner
    </h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="{{URL::to('/type-banner/index')}}">List Type Banner</a></li>
    </ol>
  </section>
	<section class="content">
	  <div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'searchtypebanner','role'=>'search'])  !!}
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
				<a href="{{URL::to('/type-banner/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> create</a>
			</div><br>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>No.</th>
					       	<th><b>ID</b></th>
					       	<th><b>Nama</b></th>
					       	<th class='text-center' style='width:70px'>Actions</th>
						</tr>
					</thead>
					<tstatus>
					   @foreach($type_banners as $i=>$type_banner)
						    <tr>
						     	<td> {{ $i+1 }} </td>
						        <td> {{ $type_banner->id }} </td>	
						        <td> {{ $type_banner->nama }} </td>	
						        <td>
						        	<a href='{{URL::action("admin\TypeBannerController@edit",array($type_banner->id))}}'>edit</a>
						        	<a href='{{URL::action("admin\TypeBannerController@show",array($type_banner->id))}}'>show</a>
						        	<form id="delete_type_banner{{$type_banner->id}}" action='{{URL::action("admin\TypeBannerController@destroy",array($type_banner->id))}}' method="POST">
									    <input type="hidden" name="_method" value="delete">
									    <input type="hidden" name="_token" value="{{ csrf_token() }}">
									    <a href="#" onclick="document.getElementById('delete_type_banner{{$type_banner->id}}').submit();">delete</a>
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
