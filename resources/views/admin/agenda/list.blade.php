@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Agenda
    </h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="{{URL::to('/agenda/index')}}">List agenda</a></li>
    </ol>
  </section>
	<section class="content">
	  <div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'searchagenda','role'=>'search'])  !!}
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
				<a href="{{URL::to('/agenda/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> create</a>
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
					   @foreach($agendas as $i=>$agenda)
						    <tr>
						     	<td> {{ $i+1 }} </td>
						        <td> {{ $agenda->judul }} </td>	
						        <td>{!! str_limit($agenda->deskripsi, 200) !!} <a href='{{URL::action("admin\AgendaController@show",array($agenda->id))}}'>Lihat Selengkapnya</a></td>	
						        <td>
									<a class="img-responsive"> <img src="{{ asset('/images/agenda/thumbs/'.$agenda->file)}}" style="max-height:100px;max-width:100px;margin-top:10px;">

								</td>
						        <td>
						        	<a href='{{URL::action("admin\AgendaController@edit",array($agenda->id))}}'>edit</a>
						        	<a href='{{URL::action("admin\AgendaController@show",array($agenda->id))}}'>show</a>
						        	<form id="delete_agenda{{$agenda->id}}" action='{{URL::action("admin\AgendaController@destroy",array($agenda->id))}}' method="POST">
									    <input type="hidden" name="_method" value="delete">
									    <input type="hidden" name="_token" value="{{ csrf_token() }}">
									    <a href="#" onclick="document.getElementById('delete_agenda{{$agenda->id}}').submit();">delete</a>
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
