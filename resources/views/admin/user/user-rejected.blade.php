@extends('layouts.admin')
@section('content')
  <section class="content-header">
    <h1>
      User Request Ditolak
    </h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="{{URL::to('/user-rejected')}}">List User Request Ditolak</a></li>
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
				        @foreach($user_rejecteds as $i=>$user_rejected)
				      	<tr>
				            <td>{{ $user_rejected->name }}</td>
				            <td>{{ $user_rejected->email }}</td>
				            <td>{{ $user_rejected->userHasGroup->group->name }}</td>
				            <td>{{ date("d F, Y", strtotime($user_rejected->created_at)) }}</td>
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