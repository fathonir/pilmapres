@extends('layouts.admin')

@section('content')
<link rel="stylesheet" type="text/css" href="/pathto/css/sweetalert.css">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="assets/swal2/sweetalert2.min.css" type="text/css" />
  <section class="content-header">
    <h1>
      Gallery
    </h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="{{URL::to('/gallery/index')}}">List Gallery</a></li>
    </ol>
  </section>
	<section class="content">
	  <div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'searchgallery','role'=>'search'])  !!}
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
				<a href="{{URL::to('/gallery/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> create</a>
			</div><br>
			@if(session()->has('status'))
			  {{ session('status') }}
			@endif
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>No.</th>
					       	<th><b>Kategori</b></th>
					       	<th><b>Judul</b></th>
					       	<th><b>Deskripsi</b></th>
					       	<th><b>Sampul</b></th>
					       	<th class='text-center' style='width:70px'>Actions</th>
						</tr>
					</thead>
					<tstatus>
					   @foreach($galleries as $i=>$gallery)
						    <tr>
						     	<td> {{ $i+1 }} </td>
						        <td> {{ $gallery->judul_category }} </td>	
						        <td> {{ $gallery->judul }} </td>	
						        <td>
						        	{!! str_limit($gallery->deskripsi, 200) !!} <a href='{{URL::action("admin\GalleryController@show",array($gallery->id))}}'> Lihat Selengkapnya</a>
						        </td>	
						        <td>
									<a class="img-responsive"> <img src="{{ asset('/images/galleri/thumbs/'.$gallery->image)}}" style="max-height:100px;max-width:100px;margin-top:10px;">

								</td>	

						        <td>
						        	<a href='{{URL::action("admin\GalleryController@edit",array($gallery->id))}}' class="btn btn-success" role="button">edit</a>
						        	<a href='{{URL::action("admin\GalleryController@show",array($gallery->id))}}' class="btn btn-warning" role="button">show</a>
						        	{{ Form::open(array(
										'action'=>['admin\GalleryController@destroy', $gallery->id],
										'method'=>'DELETE',
										'id' => $gallery->id,
										'style' => 'display:inline'
									)) }}

									<button class='btn btn-sm btn-danger delete-btn'
									type='button'
									data-judulbuku='{{$gallery->judul}}'
									data-formid='{{$gallery->id}}'>
									<i class='fa fa-times-circle'></i> Hapus
									</button>
									{{ Form::close() }}
									<script>
									    $(".delete-btn").on("click", function (e) {
									    e.preventDefault();
									    var self = $(this);
									    var judul = $(this).attr("data-judulbuku");
									    var formid = $(this).attr("data-formid");
									        swal({
									            title: "HAPUS",
									            text: "Hapus Data Gallery Judul : "+judul+" ?", 
									            type: "warning",
									            showCancelButton: true,
									            confirmButtonColor: "#DD6B55",
									            confirmButtonText: "Ya, Hapus !",
									            closeOnConfirm: true
									        },
									                function () {
									                    $("#"+formid).submit();
									                });
									    });
									</script>
						        </td> 
					     	</tr>
					   @endforeach
					</tstatus>
				</table>
			</div>
		</div>
	</section>
@endsection
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/swal2/sweetalert2.min.js"></script>
<script src="/pathto/js/sweetalert.js"></script>



