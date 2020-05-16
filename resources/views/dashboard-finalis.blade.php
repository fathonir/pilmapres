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
                        <h3 class="title text-center"><img class="img-circle" src="/front/img/xample-photo.png" alt=""></h3>
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
                                              <tr>
                                                  <td align="center">1</td>
                                                  <td>Juara 1</td>
                                                  <td>1st Winner of Online Social Campaign Competition World Antibiotic Awareness Week (WAAW) 2018</td>
                                                  <td>2018</td>
                                                  <td><span class="label label-danger">Internasional</span></td>
                                                  <td><a href="/detail-prestasi" class="badge badge-success detail-prestasi"><i class="icon-search"></i> Lihat</a></td>
                                              </tr>
                                              <tr>
                                                  <td align="center">2</td>
                                                  <td>Juara 1</td>
                                                  <td>Juara 1 Esai Ilmiah Interfaculty of Medicine Scientific Competition (Intermedisco) 2017</td>
                                                  <td>2017</td>
                                                  <td><span class="label label-info">Nasional</span></td>
                                                  <td><a href="/detail-prestasi" class="badge badge-success detail-prestasi"><i class="icon-search"></i> Lihat</a></td>
                                              </tr>
                                              <tr>
                                                  <td align="center">3</td>
                                                  <td>Chief Executive Officer / Ketua Organisasi</td>
                                                  <td>Chief Executive Officer of Science and Research Center (SRC) FK Universitas Padjadjaran 2018</td>
                                                  <td>2018</td>
                                                  <td><span class="label label-warning">Propinsi</span></td>
                                                  <td><a href="/detail-prestasi" class="badge badge-success detail-prestasi"><i class="icon-search"></i> Lihat</a></td>
                                              </tr>
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>  
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
        </div>
    </div>
</section>

@endsection