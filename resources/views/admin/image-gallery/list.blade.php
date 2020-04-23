@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Image Gallery
    </h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="{{URL::to('/image-gallery/index')}}">List Image Gallery</a></li>
    </ol>
  </section>
	<section class="content">
	  <div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'searchimagegallery','role'=>'search'])  !!}
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
				<a href="{{URL::to('/image-gallery/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> create</a>
			</div><br>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>No.</th>
					       	<th><b>Id Gallery</b></th>
					       	<th><b>Gambar</b></th>
					       	<th class='text-center' style='width:70px'>Actions</th>
						</tr>
					</thead>
					<tstatus>
					   @foreach($image_galleries as $i=>$image_gallery)
						    <tr>
						     	<td> {{ $i+1 }} </td>
						        <td> {{ $image_gallery->gallery_id }} </td>	
						        <td>
									<a class="img-responsive"> <img src="{{ asset('/images/image-gallery/thumbs/'.$image_gallery->image)}}" style="max-height:100px;max-width:100px;margin-top:10px;">

								</td>
						        <td>
						        	<a href='{{URL::action("admin\ImageGalleryController@edit",array($image_gallery->id))}}'>edit</a>
						        	<a href='{{URL::action("admin\ImageGalleryController@show",array($image_gallery->id))}}'>show</a>
						        	<form id="delete_image_gallery{{$image_gallery->id}}" action='{{URL::action("admin\ImageGalleryController@destroy",array($image_gallery->id))}}' method="POST">
									    <input type="hidden" name="_method" value="delete">
									    <input type="hidden" name="_token" value="{{ csrf_token() }}">
									    <a href="#" onclick="document.getElementById('delete_image_gallery{{$image_gallery->id}}').submit();">delete</a>
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
