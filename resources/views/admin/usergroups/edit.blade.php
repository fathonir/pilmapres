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
      	{!! Form::model($user_group,['method'=>'put','action'=>['admin\UserGroupController@update',$user_group->id]]) !!}
          <div class='form-group clearfix'>
            {{ Form::label("user_id", "User", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::select('user_id', $users, null,['class' => 'form-control required']) }}
              </div>
          </div>   
          <div class='form-group clearfix'>
          {{ Form::label("group_id", "Group", ['class' => 'col-md-2 control-label']) }}
            <div class='col-md-4'>
              {{ Form::select('group_id', $groups, null,['class' => 'form-control required']) }}
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