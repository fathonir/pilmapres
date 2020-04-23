@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Kategori Agenda
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{URL::to('/kategori-events/index')}}">Daftar Kategori Agenda</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
      	{!! Form::model($category,['method'=>'put','action'=>['admin\CategoryEventController@update',$category->id_category_event]]) !!}
	        <div class='form-group clearfix'>
	          {{ Form::label("judul", "Nama", ['class' => 'col-md-2 control-label']) }}
	            <div class='col-md-4'>
	              {{ Form::text("judul", null,['class' => 'form-control required']) }}
	              <span class="error">{{$errors->first('judul')}}</span>
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