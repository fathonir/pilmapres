@extends('layouts.admin')
@section('content')
  <section class="content-header">
    <h1>
      User Request Disetujui
    </h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="{{URL::to('/user-approved')}}">List User Request Disetujui</a></li>
    </ol>
  </section>
	<section class="content">
	  <div class="row">
	    <div class="col-md-12">
				<!-- <div class="box"> -->
			  <div class="row">
				  <div class="col-md-12 box-body table-responsive no-padding">
				  	<table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
					    <thead>
				        <tr>
			            <th>Nama</th>
			            <th>Email</th>
			            <th>Group</th>
			            <th>Tanggal Usul</th>
				        </tr>
					    </thead>
					    <tbody>
				        @foreach($user_approveds as $i=>$user_approved)
				      	<tr>
				            <td>{{ $user_approved->name }}</td>
				            <td>{{ $user_approved->email }}</td>
				            <td>{{ $user_approved->userHasGroup->group->name }}</td>
				            <td>{{ date("d F, Y", strtotime($user_approved->created_at)) }}</td>
				        </tr>
						   @endforeach
					    </tbody>
						</table>
				  </div>
				</div>
			</div>
		</div>
	</section>
@endsection
@section('js')
<script>
  $(document).ready(function(){
      $('#tabel-data').DataTable();
  });
</script>
@endsection