@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Kategori Berita
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{URL::to('/categories')}}">Daftar Kategori Berita</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
      	{!! Form::model($category,['method'=>'put','action'=>['admin\CategoryController@update',$category->id]]) !!}
	        <div class='form-group clearfix'>
	          {{ Form::label("nama", "Nama", ['class' => 'col-md-2 control-label']) }}
	            <div class='col-md-4'>
	              {{ Form::text("nama", null,['class' => 'form-control required']) }}
	              <span class="error">{{$errors->first('nama')}}</span>
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