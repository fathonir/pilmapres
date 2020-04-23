@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <section class="content-header">
    <h1>
      Testimony
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{URL::to('testimony/index')}}">List Testimony</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
         {!! Form::model($testimonis,['method'=>'put', 'files'=> 'true', 'action'=>['admin\TestimonyController@update',$testimonis->id]]) !!}
                        {{ csrf_field() }}

          <div class='form-group clearfix'>
              {{ Form::label("nama", "Nama", ['class' => 'col-md-2 control-label']) }}
                <div class='col-md-4'>
                  {{ Form::text("nama", null,['class' => 'form-control required']) }}
                  <span class="error">{{$errors->first('title')}}</span>
                </div>
            </div> 
             
             <div class='form-group clearfix'>
              {{ Form::label("jabatan", "Jabatan/Pekerjaan", ['class' => 'col-md-2 control-label']) }}
                <div class='col-md-4'>
                  {{ Form::text("jabatan", null,['class' => 'form-control required']) }}
                  <span class="error">{{$errors->first('title')}}</span>
                </div>
            </div> 

            <div class='form-group clearfix'>
              <div class="form-group">
              {{ Form::label("deskripsi", "Deskripsi", ['class' => 'col-md-2 control-label']) }}
                <div class='col-md-10'>
                  <textarea name="deskripsi" class="form-control" id="deskripsi" value="{{{$testimonis->deskripsi}}}"> {!!$testimonis->deskripsi!!} </textarea>
                </div>
              </div>
            </div>

             <div class='form-group clearfix'>
              <div class="form-group">
              {{ Form::label("pengalaman", "Pengalaman", ['class' => 'col-md-2 control-label']) }}
                <div class='col-md-10'>
                  <textarea name="pengalaman" class="form-control" id="pengalaman" value="{{{$testimonis->pengalaman}}}"> {!!$testimonis->pengalaman!!} </textarea>
                </div>
              </div>
            </div>

             <div class='form-group clearfix'>
                {{ Form::label("images", "Images", ['class' => 'col-md-2 control-label']) }}
                <div class='col-md-4'>
                  <input type="file" id="inputgambar" name="images" class="validate"/ value="{{{$testimonis->images}}}" >
                    <span class="error"></span>
                </div>
            </div
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

@section('js')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'deskripsi' );
    </script>
@endsection