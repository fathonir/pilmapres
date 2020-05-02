@extends('layouts.admin')
@section('content')
  <section class="content-header">
    <h1>
      Tambah User 
    </h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="{{URL::to('/user-add')}}">Tambah User</a></li>
    </ol>
  </section>
	<section class="content">
	  <div class="row">
	    <div class="col-md-12">
			  <div class="row">
				  <div class="col-md-12 box-body table-responsive no-padding">
				  	{{ Form::open(array('url' => '/user-add-post', 'files' => true, 'method' => 'post')) }}
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Tambah User</h3>
                </div>
                @include('sweet::alert')
                  <div class="box-body">
                    <div class="form-group">
                      <label>User Grup</label>
                      <select class="form-control group" name="id_group" required="required">
                        <option value="">Pilih Grup</option>
                        @foreach($groups as $i=>$group)
                          <option value="{{ $group->id }}">{{ $group->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="formPt" style="display: none;">
                      <div class="form-group">
                        <label>Perguruan Tinggi</label><br>
                        <select class="form-control pt" name="id_pt" style="width: 100%;">
                          @foreach($perguruan_tinggis as $i=>$perguruan_tinggi)
                            <option value="">Pilih Perguruan Tinggi</option>
                            <option value="{{ $perguruan_tinggi->id }}">{{ $perguruan_tinggi->nama }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name ="name" class="form-control" placeholder="Masukan Nama" required>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name ="email" class="form-control" placeholder="Masukan Email" required>
                    </div>
                    <div class="form-group password" style="display: none;">
                      <label>Password</label>
                      <input type="password" name ="password" id="password" class="form-control" placeholder="Masukan Password" required>
                    </div>
                  </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><span class='glyphicon glyphicon-save'></span> Simpan</button>
                  </div>
              </div>

            {!! Form::close() !!}    
				  </div>
				</div>
			</div>
		</div>
	</section>
@endsection
@section('js')
<script>
  $(document).ready(function() {
      $('.group').select2();
  });
  $('.pt').select2({
      minimumInputLength: 3
  });
  $('.group').on('change',function(e){
    var namaGroup = $(".group option:selected").text();

    if (namaGroup == 'Reviewer' || namaGroup == 'Admin PT') {
      $('.formPt').show();
      $('.password').hide();
      document.getElementById("password").required = false;
    }else if(namaGroup == "Admin Master"){
      $('.formPt').hide();
      $('.password').show();
      document.getElementById("password").required = true;
    }

  });

  $( document ).ready(function() {
    var message = '{{session('flash-error')}}';
    if(message!=''){
      alert('{{session('flash-error')}}');
    }
  })
</script>
@endsection