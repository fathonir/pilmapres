@extends('layouts.home')

@section('content')

  <div class="page-header">
    <div class="container">
        <h1 class="title">{{ $user->name }}</h1>
    </div>
    <div class="breadcrumb-box">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li class="active">Dashboard Finalis</li>
            </ul>
        </div>
    </div>
</div>
<section class="page-section">
    <div class="container shop grid-3">
        <div class="row">
            <div class="sidebar col-sm-12 col-md-3">
                <div class="widget">
                    <div class="widget-title">
                      @if(empty($user->userMahasiswa->foto))
                        <h3 class="title text-center"><img class="img-circle" src="/front/img/xample-photo.png" alt="" style="height: 210px;width: 210px;"></h3>
                      @else
                        <h3 class="title text-center"><img class="img-circle" src="/file/foto-profil-peserta/{{ $user->userMahasiswa->foto }}" alt="" style="height: 210px;width: 210px;"></h3>
                      @endif
                      <div class="text-right">
                        <a data-toggle="modal" data-target="#modal-default" class="badge badge-default detail-prestasi" style="background-color: darkgray;"><i class="icon-image"></i> Ubah</a>
                      </div>
                      <div class="text-center font-bold-large">{{ $user->name }}</div>
                      <div class="text-center">{{ $user->userMahasiswa->mahasiswaPt->nama_jenjang_didik }} - {{ $user->userMahasiswa->mahasiswaPt->nama_prodi }} </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-9">
                <div class="row">
                    <div class="col-md-12">
                      @if (Session::has('flash-success'))
                        <div role="alert" class="alert alert-success alert-dismissible">
                          <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
                          <strong>{{ Session::get('flash-success') }}</strong>
                        </div>
                      @endif
                      <div class="panel panel-primary">
                          <div class="panel-body">
                            <div class="tabpanel">
                              <ul role="tablist" class="nav nav-tabs">
                                <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#profile" aria-expanded="false"><i class="icon-user"></i> Profile</a></li>
                                <li role="presentation" class="active"><a aria-controls="karya" data-toggle="tab" id="karya-tab" role="tab" href="#karya" aria-expanded="false"><i class="icon-file-text"></i> Karya Tulis</a></li>
                                <li role="presentation" class=""><a aria-controls="prestasi" data-toggle="tab" id="prestasi-tab" role="tab" href="#prestasi" aria-expanded="false"><i class="icon-trophy"></i> Prestasi</a></li>
                                <li role="presentation" class=""><a aria-controls="video" data-toggle="tab" id="video-tab" role="tab" href="#video" aria-expanded="false"><i class="icon-film"></i> Video</a></li>
                              </ul>
                              <div class="tab-content" id="myTabContent">
                                <div aria-labelledby="profile-tab" id="profile" class="tab-pane fade" role="tabpanel">
                                  <div class="panel panel-info">
                                      <div class="panel-body">
                                          <table class="table table-striped">
                                              <tbody>
                                                  <tr>
                                                      <td class="font-bold">Asal Perguruan Tinggi</td>
                                                      <td>:</td>
                                                      <td>{{ $user->userMahasiswa->mahasiswaPt->nama_pt }}</td>
                                                  </tr>
                                                  <tr>
                                                      <td class="font-bold">Nama Prodi</td>
                                                      <td>:</td>
                                                      <td>{{ $user->userMahasiswa->mahasiswaPt->nama_prodi }}</td>
                                                  </tr>
                                                  <tr>
                                                      <td class="font-bold">Jenjang</td>
                                                      <td>:</td>
                                                      <td>{{ $user->userMahasiswa->mahasiswaPt->nama_jenjang_didik }}</td>
                                                  </tr>
                                                  <tr>
                                                      <td class="font-bold">Semester</td>
                                                      <td>:</td>
                                                      <td>{{ $user->userMahasiswa->mahasiswaPt->smt_tempuh }}</td>
                                                  </tr>
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>  
                                </div>
                                <div aria-labelledby="karya-tab" id="karya" class="tab-pane fade active in" role="tabpanel">
                                  @if($user->is_user_request == 0)
                                    @if(!empty($user->karyaTulis))
                                      <div class="panel panel-info">
                                          <div class="panel-body">
                                              <table class="table table-striped">
                                                  <tbody>
                                                      <tr>
                                                          <td class="font-bold">Judul Karya Tulis</td>
                                                          <td>:</td>
                                                          <td>{{ $user->karyaTulis->judul }}</td>
                                                      </tr>
                                                      <tr>
                                                          <td class="font-bold">Topik Karya Tulis</td>
                                                          <td>:</td>
                                                          <td>{{ $user->karyaTulis->topik->nama }}</td>
                                                      </tr>
                                                      <tr>
                                                          <td class="font-bold">Bidang Karya Tulis</td>
                                                          <td>:</td>
                                                          <td>{{ $user->karyaTulis->bidang->nama }}</td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>
                                      </div>
                                      <div class="panel panel-info">
                                          <div class="panel-body">
                                              <h5>File Karya Tulis Ilmiah</h5>
                                              <div class="baca_file_head" >
                                                  <p>
                                                      <button class="btn btn-info btn-xs baca_file" type="button"><b><i class="fa fa-file"></i> BACA FILE KARYA TULIS ILMIAH</b></button>
                                                  </p>
                                                  <p>
                                                      *Jika file tidak terbaca, silahkan tekan tombol "BACA FILE KARYA TULIS ILMIAH" berulang kali sampai file dapat terbaca.
                                                  </p>
                                              </div>
                                              <div class="file_read" style="display: none;">
                                                  <embed src="/file/karya-tulis/{{ $user->karyaTulis->file }}" type="application/pdf" width="100%" height="600px" />
                                                  <p>
                                                      <button class="btn btn-warning btn-xs baca_file_tutup" type="button"><b><i class="fa fa-close"></i> TUTUP BACA FILE</b></button>
                                                  </p>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="panel panel-info">
                                          <div class="panel-body">
                                            <h5>Ringkasan KTI</h5>
                                            <p>
                                              {!! $user->karyaTulis->ringkasan !!}  
                                            </p>
                                          </div>
                                      </div>
                                      <a type="button" href="/karya-tulis" class="btn btn-default btn-xs detail-prestasi"><b><i class="fa fa-edit"></i> Ubah Karya Tulis</b></a>
                                    @else
                                      <a type="button" href="/karya-tulis" class="btn btn-default btn-xs detail-prestasi"><b><i class="fa fa-plus"></i> Tambah Karya Tulis</b></a>
                                    @endif
                                  @else
                                    <div class="panel panel-info">
                                        <div class="panel-body">
                                            <h5>Anda Belum Diverifikasi, Data Anda Sedang Diproses.</h5>
                                        </div>
                                    </div>
                                  @endif
                                </div>
                                <div aria-labelledby="prestasi-tab" id="prestasi" class="tab-pane fade" role="tabpanel">
                                  @if($user->is_user_request == 0)
                                    <div class="panel panel-info">
                                        <div class="panel-body table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Prioritas</th>
                                                        <th>Pencapaian</th>
                                                        <th>Prestasi</th>
                                                        <th>Tahun</th>
                                                        <th>Tingkat</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach($user->prestasi as $i=>$prestasi)
                                                    <tr>
                                                      <td align="center">{{ $prestasi->prioritas }}</td>
                                                      <td>{{ $prestasi->pencapaian }}</td>
                                                      <td>{{ $prestasi->nama_prestasi }}</td>
                                                      <td>{{ $prestasi->tahun }}</td>
                                                      <td>
                                                        @if($prestasi->tingkat == 'Internasional')
                                                          <span class="label label-danger">{{ $prestasi->tingkat }}</span>
                                                        @elseif($prestasi->tingkat == 'Nasional')
                                                          <span class="label label-info">{{ $prestasi->tingkat }}</span>
                                                        @elseif($prestasi->tingkat == 'Propinsi')
                                                          <span class="label label-warning">{{ $prestasi->tingkat }}</span>
                                                        @else
                                                          <span class="label label-default">{{ $prestasi->tingkat }}</span>
                                                        @endif
                                                      </td>
                                                      <td>
                                                        <a href="/edit-prestasi/{{ $prestasi->id }}" class="badge badge-warning detail-prestasi" style="background-color: darkgoldenrod;"><i class="icon-edit"></i> Edit</a>
                                                        <a href="/detail-prestasi/{{ $prestasi->id }}" class="badge badge-success detail-prestasi"><i class="icon-search"></i> Lihat</a>
                                                      </td>
                                                    </tr>
                                                  @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>  
                                    <a type="button" href="/prestasi" class="btn btn-default btn-xs detail-prestasi"><b><i class="fa fa-plus"></i> Tambah Prestasi</b></a>
                                  @else
                                    <div class="panel panel-info">
                                        <div class="panel-body">
                                            <h5>Anda Belum Diverifikasi, Data Anda Sedang Diproses.</h5>
                                        </div>
                                    </div>
                                  @endif
                                </div>
                                <div aria-labelledby="video-tab" id="video" class="tab-pane fade" role="tabpanel">
                                  <div class="panel panel-info">
                                      <div class="panel-body">
                                          <div class="video-container">
                                              <iframe width="560" height="315" src="https://www.youtube.com/embed/RX3a88irkzA" frameborder="0" allowfullscreen>
                                              </iframe>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
            {!! Form::open(['action' => 'HomeController@EditFotoProfil', 'class'=>'form-horizontal pushData', 'files'=>true]) !!}
            <div class="modal fade" id="modal-default" style="display: none;">
              <div class="modal-dialog">
                <br><br><br>
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Tutup</span>
                        </button>
                        <h4 class="modal-title" id="labelModalKu">Ubah Foto Profil</h4>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body">
                      <div class="form-group">
                        <div class="col-md-2">
                          <label>Pilih Foto</label>
                        </div>
                        <div class="col-md-10">
                          <input type="file" name="foto" />
                        </div>
                      </div>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default btn-xs detail-prestasi"><i class="fa fa-fw fa-save"></i> Simpan</button>
                    </div>
                </div>
              </div>
            </div>
            {!! Form::close() !!}
          <!-- /.modal-dialog -->
        </div>
        </div>
    </div>
</section>

@endsection