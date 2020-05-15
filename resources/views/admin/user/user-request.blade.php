@extends('layouts.admin')
@section('content')
  <section class="content-header">
    <h1>
      User Request
    </h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="{{URL::to('/user-groups')}}">List User Request</a></li>
    </ol>
  </section>
	<section class="content">
	  <div class="row">
	    <div class="col-md-12">
				<div class='pull-left'>
					<a href="{{URL::to('/user-add')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah</a>
				</div>
				<br>
				<br>
				<br>
				<!-- <div class="box"> -->
			  <div class="row">
				  <div class="col-md-12 box-body table-responsive no-padding">
				  	<table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
					    <thead>
				        <tr>
			            <th>Perguruan Tinggi</th>
			            <th>Program Studi</th>
			            <th>Nama</th>
			            <th>NIM</th>
			            <th>Email</th>
                  <th>Surat Pengantar</th>
			            <th class="text-center">Aksi</th>
				        </tr>
					    </thead>
					    <tbody>
				        @foreach($user_requests as $i=>$user_request)
				      	<tr>
				            <td>{{ $user_request->userMahasiswa->mahasiswaPt->nama_pt }}</td>
				            <td>{{ $user_request->userMahasiswa->mahasiswaPt->nama_prodi }}</td>
				            <td>{{ $user_request->userMahasiswa->mahasiswa->nm_pd }}</td>
				            <td>{{ $user_request->userMahasiswa->mahasiswaPt->nim }}</td>
				            <td>{{ $user_request->email }}</td>
                    <td>
                      <a href="/file/surat-pengantar/{{ $user_request->userMahasiswa->surat_pengantar }}" target="_blank"> <i class="fa fa-cloud-download"></i> {{ $user_request->userMahasiswa->surat_pengantar }}</a>
                    </td>
				            <td>
				            	<a onclick="confirmApprove('setuju','{{ $user_request->id }}')" class="badge bg-green"><i class="fa fa-check"></i> Setujui</a>
				            	<a onclick="confirmApprove('tolak','{{ $user_request->id }}')" class="badge bg-red"><i class="fa fa-close"></i> Tolak</a>
				            </td>
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

    function confirmApprove(status, id) {
      var result;

      if (status == 'setuju') {
			 result = confirm("Apakah Anda Yakin Untuk Menyetujui Akun Ini?");
      }else{
       result = confirm("Apakah Anda Yakin Untuk Menolak Akun Ini?");
      }

			if (result) {
				var url      = window.location.href+'-post/'+status+'/'+id;
				window.location.href = url;
			}
      
		}

</script>
@endsection