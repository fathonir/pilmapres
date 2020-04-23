@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Slider
    </h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="{{URL::to('slider/index')}}">List Slider</a></li>
    </ol>
  </section>
	<section class="content">
	  <div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'searchslider','role'=>'search'])  !!}
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
				<a href="{{URL::to('slider/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> create</a>
			</div><br>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>No.</th>
					       	<th><b>Judul</b></th>
					       	<th><b>Deskripsi</b></th>
					       	<th><b>Gambar</b></th>
					       	<th class='text-center' style='width:70px'>Actions</th>
						</tr>
					</thead>
					<tstatus>
					   @foreach($sliders as $i=>$slider)
					    <tr>
					     	<td> {{ $i+1 }} </td>
					        <td> {{ $slider->judul }} </td>	
					     	<td>{!! str_limit($slider->deskripsi,250) !!}
								<a href='{{URL::action("SliderController@show",array($slider->id))}}'> Lihat Selengkapnya</a>
							</td>
					        <td>
								<a class="img-responsive"> <img src="{{ asset('/images/slider/thumbs/'.$slider->gambar)}}" style="max-height:100px;max-width:100px;margin-top:10px;">
							</td>	
					        <td>
					        	<a href='{{URL::action("SliderController@edit",array($slider->id))}}'>edit</a>
					        	<a href='{{URL::action("SliderController@show",array($slider->id))}}'>show</a>
					        	<form id="delete_slider{{$slider->id}}" action='{{URL::action("SliderController@destroy",array($slider->id))}}' method="POST">
								    <input type="hidden" name="_method" value="delete">
								    <input type="hidden" name="_token" value="{{ csrf_token() }}">
								    <a href="#" onclick="document.getElementById('delete_slider{{$slider->id}}').submit();">delete</a>
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