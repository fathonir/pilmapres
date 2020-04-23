@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Group Roles
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{URL::to('/group-roles')}}">List Group Roles</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
      	{!! Form::model($group_role,['method'=>'put','action'=>['admin\GroupRoleController@update',$group_role->id]]) !!}
          <div class='form-group clearfix'>
            {{ Form::label("group_id", "Group", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::select('group_id', $groups, null,['class' => 'form-control required']) }}
              </div>
          </div>   
          <div class='form-group clearfix'>
          {{ Form::label("role_id", "Role", ['class' => 'col-md-2 control-label']) }}
            <div class='col-md-4'>
              {{ Form::select('role_id', $roles, null,['class' => 'form-control required']) }}
            </div>
          </div>   
          <div class='form-group'>
            <div class='col-md-4 col-md-offset-2'>
              <button class='btn btn-primary' type='submit' name='save' id='save'><span class='glyphicon glyphicon-save'></span> Save</button>
            </div>
          </div>
        {!! Form::close() !!}
    	</div>
  	</div>
	</section>
@endsection