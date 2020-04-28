@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <br><br>
        <div class="login-logo">
            <a href="/"><img class="site_logo" alt="Site Logo" src="/front/img/FAI.png" style="width: 320px;"></a>
          </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Data Mahasiswa</label>

                            <div class="col-md-6">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                                    <i class="fa fa-fw fa-search"></i> Cari Data
                                  </button>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-4">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('login') }}">Login</a>
                                </div>
                            </div>
                        </div>
                    </form>
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
                            @foreach($perguruan_tinggis as $i=>$perguruan_tinggi)
                                <option>Cari Perguruan Tinggi</option>
                                <option value ="{{ $perguruan_tinggi->id }}">{{ $perguruan_tinggi->nama }}</option>
                            @endforeach
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
                            <label for="masukkanEmail">Tanggal Lahir</label>
                            <input type="text" class="form-control tanggalLahir" disabled/>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label for="masukkanEmail">Tanggal Lahir</label>
                        <input type="email" class="form-control" id="masukkanEmail" placeholder="Masukkan email Anda"/>
                    </div> -->
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary cariMahasiswa"><i class="fa fa-fw fa-search"></i> Cari Data</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
          <!-- /.modal-dialog -->
        </div>
    </div>
</div>
@endsection