@extends('layouts.app')

@section('title', 'Registrasi Mahasiswa')

@section('head')
{!! Html::style('css/sweetalert.css') !!}
{!! Html::style('vendor/select2/select2/dist/css/select2.min.css') !!}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <br><br>
        <div class="login-logo">
            <a href="#"><img class="site_logo" alt="Site Logo" src="front/img/FAI.png" style="width: 320px;"></a>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrasi Mahasiswa</div>
                <div class="panel-body">
                    {{ Form::open(['action' => 'RegisterPesertaController@store', 'class'=>'form-horizontal pushData', 'files' => true]) }}
                    
                    <input type="hidden" id="mahasiswaID" name="mahasiswa_id" />

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Data Mahasiswa</label>

                        <div class="col-md-6">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                                <i class="fa fa-fw fa-search"></i> Cari Data
                            </button>
                            <p style="color: red; display: none" class="cekDataMhs">
                                Cari Data Mahasiswa !
                            </p>
                            <p style="color: red; display: none" class="cekDataMhsNim">
                                Data Mahasiswa Yang Anda Pilih Telah Terdaftar !
                            </p>
                        </div>
                    </div>

                    <div class="copyForm" style="display: none;">
                        <div class="form-group form-pt">
                            <label for="email" class="col-md-4 control-label">Perguruan Tinggi</label>
                            <div class="col-md-6">
                                <input id="text" class="form-control nama_pt" name="nama_pt" value="" required readonly>
                                <input type="hidden" class="form-control id_pt" name="id_pt" value="">
                            </div>
                        </div>
                        <div class="form-group form-prodi">
                            <label for="email" class="col-md-4 control-label">Program Studi</label>
                            <div class="col-md-6">
                                <input id="text" class="form-control nama_prodi" name="nama_prodi" value="" readonly>
                                <input type="hidden" class="form-control id_prodi" name="id_prodi" value="">
                            </div>
                        </div>
                        <div class="form-group form-nama">
                            <label for="email" class="col-md-4 control-label">Nama</label>
                            <div class="col-md-6">
                                <input id="text" class="form-control mhs_nama" name="mhs_nama" value="" readonly>
                            </div>
                        </div>
                        <div class="form-group form-nim">
                            <label for="email" class="col-md-4 control-label">NIM</label>
                            <div class="col-md-6">
                                <input id="text" class="form-control mhs_nim" name="mhs_nim" value="" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">Alamat Email</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control email" name="email" value="{{ old('email') }}" required>
                            <p style="color: red; display: none" class="cekDataEmail">
                                Masukan Email !
                            </p>
                            <p style="color: red; display: none" class="cekDataEmailValid">
                                Masukan Email Dengan Benar !
                            </p>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Surat Pengantar Pimpinan PT</label>
                        <div class="col-md-6">
                            <input type="file" class="suratPengantar" name="file_pengantar" required>
                        </div>
                        <br>
                        <p style="color: red; display: none" class="cekDataSurat">
                            Unggah Surat Pengantar !
                        </p>
                    </div>
                    <span style="color: red;">{{ $errors->first('failed_auth') }}</span>
                    <div class="form-group">
                        <div class="col-md-offset-4 col-md-8">
                            <a class="btn btn-primary simpanData">Daftar</a>
                            <a class="btn btn-default" href="{{ route('login') }}">Ke Login</a>
                            <a class="btn btn-default" href="{{ url('/') }}">Ke Halaman Depan</a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-default" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Tutup</span>
                        </button>
                        <h4 class="modal-title" id="labelModalKu">Cari Data Mahasiswa</h4>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <p class="statusMsg"></p>
                        <div class="form-group">
                            <label for="masukkanNama">Perguruan Tinggi</label>
                            <select data-width="100%" name="select" class="form-control pt">
                                <option>Cari Perguruan Tinggi</option>
                                @if (count($perguruanTinggis) > 0)
                                    @foreach ($perguruanTinggis as $pt)
                                        <option value="{{ $pt->id }}">{{ $pt->nama_pt }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="masukkanNama">Program Studi</label>
                            <div class="loading" style="display: none;">
                                <center><i class="fa fa-refresh fa-spin"></i></center>
                            </div>
                            <div class="tabProdi">
                                <select data-width="100%" name="select" class="form-control prodi">
                                    <option>Cari Program Studi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>NIM</label>
                            <input type="text" class="form-control nim" placeholder="Masukkan NIM Anda"/>
                            <p style="color: red; display: none" class="NimNull">
                                Harap Masukan NIM !
                            </p>
                            <p style="color: red; display: none" class="MahasiswaFalse">
                                Data Mahasiswa ini Tidak Ditemukan! Pastikan Data Terdaftar Di PDDikti <a href="https://pddikti.kemdikbud.go.id" target="_blank">(https://pddikti.kemdikbud.go.id/)</a>
                            </p>
                        </div>
                        <div class="loadingSearchMahasiswa" style="display: none;">
                            <center><i class="fa fa-refresh fa-spin"></i></center>
                        </div>
                        <div class="confirmMahasiswa" style="display: none;">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control namaMahasiswa" disabled/>
                            </div>
                            <div class="form-group">
                                <label for="tanggalLahir">Tanggal Lahir</label>
                                <input type="text" class="form-control tanggalLahir" disabled/>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning pilihMahasiswa" data-dismiss="modal" style="display: none;"><i class="fa fa-check"></i> Pilih Data</button>
                        <button type="button" class="btn btn-primary cariMahasiswa"><i class="fa fa-fw fa-search"></i> Cari Data</button>
                    </div>
                </div>
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
</div>
@endsection

@section('js')
{!! Html::script('node_modules/sweetalert/dist/sweetalert.min.js') !!}
{!! Html::script('vendor/select2/select2/dist/js/select2.full.min.js') !!}
<script type="text/javascript">
	$(document).ready(function () {
		$('.pt').select2({
			minimumInputLength: 3
		});

		$('.prodi').select2();

		$('.pt').on('change', function (e) {
			$('.loading').show();
			$('.tabProdi').hide();
			var id = e.target.value;
			$.get('/api/pt/' + id + '/prodi', function (data) {
				$('.prodi').empty();
				$.each(data, function (index, value) {
					$('.prodi').append('<option value="' + value.id + '">' + value.nama_prodi + '</option>');
				});
				$('.loading').hide();
				$('.tabProdi').show();
			});
		});

		$('.cariMahasiswa').click(function (e) {
			var pt = $('.pt').val();
			var prodi = $('.prodi').val();
			var nim = encodeURIComponent($('.nim').val());
			$('.loadingSearchMahasiswa').show();

			if (nim === '') {
				$('.NimNull').show();
				$('.loadingSearchMahasiswa').hide();
				$('.confirmMahasiswa').hide();
				$('.pilihMahasiswa').hide();
			} else {
				$('.NimNull').hide();
				$.get('/api/pt/' + pt + '/prodi/' + prodi + '/mahasiswa', { nim: nim }, function (mahasiswa) {
					if (mahasiswa === '') {
						$('.MahasiswaFalse').show();
						$('.confirmMahasiswa').hide();
						$('.pilihMahasiswa').hide();
						$('.NimNull').hide();
						$('.loadingSearchMahasiswa').hide();
					} else {
						$('.MahasiswaFalse').hide();
						$('.NimNull').hide();
                        $('#mahasiswaID').val(mahasiswa.id);
                        $('.namaMahasiswa').val(mahasiswa.nama);
                        $('.tanggalLahir').val(mahasiswa.tgl_lahir);
                        $('.nama_pt').val(mahasiswa.perguruan_tinggi.nama_pt);
                        $('.nama_prodi').val(mahasiswa.program_studi.nama_prodi);
                        $('.mhs_nama').val(mahasiswa.nama);
                        $('.mhs_nim').val(mahasiswa.nim);
                        $('.id_prodi').val(mahasiswa.program_studi_id);
                        $('.id_pt').val(mahasiswa.perguruan_tinggi_id);
						$('.loadingSearchMahasiswa').hide();
						$('.confirmMahasiswa').show();
						$('.pilihMahasiswa').show();
						$('.copyForm').show();
					}
				}).fail(function() {
                    $('.MahasiswaFalse').show();
                    $('.loadingSearchMahasiswa').hide();
                });
			}

		});

		$('.pilihMahasiswa').click(function (e) {
            $('.cekDataMhsNim').hide();
		});

		var countFailedEmail = 0;
		$(function () {
			$('.simpanData').click(function (e) {
				var idPt = $('.id_pt').val();
				var email = $('.email').val();
				var filePengantar = $('.filePengantar').val();

				if (idPt === '') {
					$('.cekDataMhs').show();
				} else if (email === '') {
					$('.cekDataMhs').hide();
					$('.cekDataEmail').show();
				} else if (filePengantar === '') {
					$('.cekDataEmailValid').hide();
					$('.cekDataEmail').hide();
					$('.cekDataSurat').show();
				} else if (countFailedEmail === 1) {
					$('.cekDataEmailValid').hide();
					$('.cekDataEmail').hide();
					$('.cekDataSurat').hide();
					$('.cekDataEmailValid').show();
				} else {
					$(".pushData").submit();
				}

			});
		});

		$('.email').blur(function () {
			var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
			if (testEmail.test(this.value)) {
				$('.cekDataEmailValid').hide();
				countFailedEmail = 0;
			} else {
				countFailedEmail = 1;
				$('.cekDataEmailValid').show();
			}
		});

	});
</script>
    @include('sweet::alert')
@endsection