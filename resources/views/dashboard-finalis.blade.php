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
                                                      <td>Universitas Padjadjaran</td>
                                                  </tr>
                                                  <tr>
                                                      <td class="font-bold">Nama Prodi</td>
                                                      <td>:</td>
                                                      <td>Pendidikan Dokter</td>
                                                  </tr>
                                                  <tr>
                                                      <td class="font-bold">Jenjang</td>
                                                      <td>:</td>
                                                      <td>SARJANA</td>
                                                  </tr>
                                                  <tr>
                                                      <td class="font-bold">Semester</td>
                                                      <td>:</td>
                                                      <td>6</td>
                                                  </tr>
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>  
                                </div>
                                <div aria-labelledby="karya-tab" id="karya" class="tab-pane fade active in" role="tabpanel">
                                  @if($user->is_user_request == 0)
                                    <div class="panel panel-info">
                                        <div class="panel-body">
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td class="font-bold">Judul Karya Tulis</td>
                                                        <td>:</td>
                                                        <td>Metode Diagnostik Tuberkulosis dan Resistensinya melalui Fitur Sensor Kolorimetri Berbasis Nanopartikel Emas Terintegrasi mHealth</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-bold">Topik Karya Tulis</td>
                                                        <td>:</td>
                                                        <td>Kesehatan Masyarakat</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-bold">Bidang Karya Tulis</td>
                                                        <td>:</td>
                                                        <td>IPA</td>
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
                                                <embed src="/front/img/pdf-xample.pdf" type="application/pdf" width="100%" height="600px" />
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
                                                Global community should reflect the paradox that tuberculosis still remains as the major public health problem despite of the efforts in combating tuberculosis through several interventional programs. Tuberculosis is one of the communicable diseases that becomes the leading cause of morbidity and mortality. Currently, Indonesia is listed as the second highest tuberculosis-infected country while previously being at the fourth place. These problems are surely an indicative of some failures in tuberculosis control programs.  

                                                Studies show that the most essential component of tuberculosis control is prevention by early diagnosis. Early diagnosis will allow tuberculosis to be treated more effectively. However, there are still many tuberculosis patients who are late to be diagnosed due to some limitations of current tuberculosis diagnostic methods. The current gold standard for tuberculosis is the detection of Mycobacterium tuberculosis (Mtb) as the etiology of tuberculosis by culture or molecular methods. Culture method with sputum smear still has limited sensitivity due to its high false-negative results. Furthermore, molecular method for tuberculosis is still not affordable in price for many less-developed countries and requiring skillful operators. Therefore, these modalities are not ideal enough as screening methods in developing countries.  

                                                As a consequence of these limitations, patients are more likely to be treated late. Beside that, low drug compliance also remains as a problem for those who have been treated. As a result, they become more prone to develop resistances towards anti-tuberculosis regimens. These resistances are developed due to Mtb’s genetic mutation and it varies depending on the type of drugs used. Therefore, a novel strategy to increase the diagnostic efficacy and efficiency is urgently needed.  

                                                This paper comes up to deliver an applicative idea to enhance the efficacy and efficiency of tuberculosis and its resistances’ diagnosis in the era of industrial revolution 4.0. The idea is to use a colorimetric sensing strategy (a method of determining the concentration of a chemical compound in a solution with the aid of color reagents) employing gold nanoparticle. Gold nanoparticle also has surface plasmon resonance (SPR) thermal feature which is a collective oscillation of electron on its surface at a specific wavelength which will induce visible color changes. Gold nanoparticle has shown to have many advantages for colorimetric assay such as high sensitivity, naked-eye readout, and complex instrument free. Thereby, gold nanoparticle can be used as a diagnostic tool for tuberculosis.

                                                As a solution, the proposed idea is using a colorimetric sensing strategy employing gold nanoparticles with a paper-based analytical platform for the diagnosis of tuberculosis and its resistances. Prior to the surface plasmon resonance effect, gold nanoparticles are covered by single-stranded DNA (ssDNA) synthesized with a minimum reagent that is designed to bind complementary with target DNA of Mtb. In order to adapt this tuberculosis diagnosis method to resource-limited settings, this label-free single-stranded DNA (ssDNA) and unmodified gold nanoparticle solution-based technique are extended to a paper-based (cellulose paper) system. After the Mtb DNA (particularly dsDNA) is extracted from human blood, the dsDNA will be heated and mixed with the gold nanoparticle and ssDNA in a cellulose paper. This process will induce the hybridization of ssDNA probe molecules with targeted Mtb’s dsDNA that has already been separated due to heating process before. The hybridization event changes the surface charge density of the nanoparticles, causing them to aggregate to various degrees, which modifies the color of the solution. The result of this process is modification of paper’s color into various gradient color as qualitative data that should be quantified to determine the concentration of Mtb DNA and type of resistances.

                                                In the era of industrial revolution 4.0, digitalization of quantification method has increasingly widespread. Mobile health (mHealth) as a software for diagnostic on smartphone is a form of this adaptation. mHealth will quantify the qualitative results automatically that are obtained after being captured by smartphone’s camera. This method provides faster diagnostic results than previous methods with minimum reagents.

                                                Ultimately, this proposed strategy can potentially be applied by healthcare provider for everyone as an early diagnosis strategy of tuberculosis and its resistances. This strategy has many advantages including more practical and rapid diagnostic results with high accuracy. However, several recommendations for stakeholders of this technology application are elaborated to achieve Sustainable Development Goals number three.  
                                            </p>
                                        </div>
                                    </div>
                                    <a type="button" href="/karya-tulis" class="btn btn-default btn-xs detail-prestasi"><b><i class="fa fa-edit"></i> Tambah Karya Tulis</b></a>
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