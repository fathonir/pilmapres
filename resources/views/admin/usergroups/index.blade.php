@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      User Groups
    </h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="{{URL::to('/user-groups')}}">List User Groups</a></li>
    </ol>
  </section>
	<section class="content">
	  <div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
					{!! Form::open(['method'=>'GET','url'=>'search-user-groups','role'=>'search'])  !!}
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
					<a href="{{URL::to('/user-groups/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> create</a>
				</div>
				<br>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
						 <th>No.</th>
			       <th><b>User</b></th>
			       <th><b>Group</b></th>
			       <th class='text-center' style='width:70px'>Actions</th>
						</tr>
					</thead>
					<tstatus>
				   @foreach($user_groups as $i=>$usergroup)
			     <tr>
			     		 <td>{{$start_page}}</td>
			         <td> {{ $usergroup->user->name }} </td>
			         <td> {{ $usergroup->group->name }} </td>	         
			         <td>
								<a href='{{URL::action("admin\UserGroupController@edit",array($usergroup->id))}}'>edit</a>		
								<a href='{{URL::action("admin\UserGroupController@show",array($usergroup->id))}}'>show</a>
								<form id="delete_usergroup{{$usergroup->id}}" action='{{URL::action("admin\UserGroupController@destroy",array($usergroup->id))}}' method="POST">
								    <input type="hidden" name="_method" value="delete">
								    <input type="hidden" name="_token" value="{{ csrf_token() }}">
								    <a href="#" onclick="document.getElementById('delete_usergroup{{$usergroup->id}}').submit();">delete</a>
								</form>
							  </td>
			     	</tr>
			     	<?php $start_page = $start_page+1 ?>
				   @endforeach
					</tstatus>
				</table>
				{!! $user_groups->render() !!}
			</div>
		</div>
	</section>
@endsection