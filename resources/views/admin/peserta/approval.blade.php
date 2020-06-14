@extends('layouts.admin')
@section('title', 'Peserta Registrasi')
@section('content')
    <section class="content-header">
        <h1>Peserta Registrasi <small>Data peserta yang melakukan registrasi yang memerlukan approval</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ URL::to('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Peserta</a></li>
            <li class="active">Peserta Registrasi</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Approval</h3>
                    </div>
                    <form method="post" action="{{ url()->full() }}" class="form-horizontal" id="approvalForm">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nama" class="col-sm-3 control-label">Nama</label>
                                <div class="col-sm-9">
                                    <p class="form-control-static">{{ $peserta->mahasiswa->nama }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nim" class="col-sm-3 control-label">NIM</label>
                                <div class="col-sm-9">
                                    <p class="form-control-static">{{ $peserta->mahasiswa->nim }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="prodi" class="col-sm-3 control-label">Program Studi</label>
                                <div class="col-sm-9">
                                    <p class="form-control-static">{{ $peserta->mahasiswa->programStudi->nama_prodi }}
                                        @if ($peserta->jenjangValid)
                                            <i class="fa fa-check-circle text-success"></i>
                                        @else
                                            <i class="fa fa-times-circle text-danger"></i>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pt" class="col-sm-3 control-label">Perguruan Tinggi</label>
                                <div class="col-sm-9">
                                    <p class="form-control-static">{{ $peserta->mahasiswa->perguruanTinggi->nama_pt }}
                                        [{{ $peserta->mahasiswa->perguruanTinggi->kode_pt }}]
                                        @if ($peserta->ptValid)
                                            <i class="fa fa-check-circle text-success"></i>
                                        @else
                                            <i class="fa fa-times-circle text-danger"></i>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ipk" class="col-sm-3 control-label">IPK</label>
                                <div class="col-sm-3">
                                    <p class="form-control-static">{{ $peserta->ipk }}
                                        @if ($peserta->ipkValid)
                                            <i class="fa fa-check-circle text-success"></i>
                                        @else
                                            <i class="fa fa-times-circle text-danger"></i>
                                        @endif
                                    </p>
                                </div>
                                <label for="semester" class="col-sm-3 control-label">Semester</label>
                                <div class="col-sm-3">
                                    <p class="form-control-static">{{ $peserta->semester_tempuh }}
                                        @if ($peserta->semesterValid)
                                            <i class="fa fa-check-circle text-success"></i>
                                        @else
                                            <i class="fa fa-times-circle text-danger"></i>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="umur" class="col-sm-3 control-label">Umur</label>
                                <div class="col-sm-3">
                                    <p class="form-control-static">{{ $peserta->umur }}
                                        @if ($peserta->umurValid)
                                            <i class="fa fa-check-circle text-success"></i>
                                        @else
                                            <i class="fa fa-times-circle text-danger"></i>
                                        @endif
                                    </p>
                                </div>
                                <label for="tgl_lahir" class="col-sm-3 control-label">Tanggal Lahir</label>
                                <div class="col-sm-3">
                                    <p class="form-control-static">{{ $peserta->mahasiswa->tgl_lahir }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <p class="form-control-static">{{ $peserta->mahasiswa->email }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="created_at" class="col-sm-3 control-label">Waktu Registrasi</label>
                                <div class="col-sm-9">
                                    <p class="form-control-static">{{ $peserta->created_at }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Keterangan Reject:</label>
                                    <textarea class="form-control" rows="3" name="keterangan_reject"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <a class="btn btn-default" href="{{ url('admin/peserta/register') }}">Kembali</a>
                            <input class="btn btn-success" type="submit" name="proses" value="Approve" />
                            <input class="btn btn-danger pull-right" type="submit" name="proses" value="Reject" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Surat Rekomendasi</h3>
                    </div>
                    <div class="box-body" style="">
                        <iframe src="{{ $peserta->filePengantarPeserta->nama_file }}" style="width: 100%; height: 600px"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">
        $('input[value="Reject"]').on('click', function(e) {
            if ($('textarea[name="keterangan_reject"]').val() === '') {
                e.preventDefault();
                swal({
                    title: 'Error',
                    text: 'Keterangan reject harus diisi',
                    icon: 'error'
                });
            }
        });
    </script>
@endsection