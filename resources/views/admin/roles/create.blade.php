@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Roles
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('/roles')}}">List Roles</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        {!! Form::open(['action' => 'admin\RoleController@store']) !!}
          <div class='form-group clearfix'>
            {{ Form::label("name", "Role", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("name", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('name')}}</span>
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