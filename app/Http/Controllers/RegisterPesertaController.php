<?php

namespace App\Http\Controllers;

use File;
use Input;
use Alert;
use App\User;
use App\Group;
use App\Mahasiswa;
use App\MahasiswaPt;
use App\ProgramStudi;
use App\UserMahasiswa;
use App\PerguruanTinggi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterPesertaController extends Controller
{
    public function register(PerguruanTinggi $perguruan_tinggi)
    {
        $perguruan_tinggis = $perguruan_tinggi->getPtAktif();

        return view('register-peserta', compact('perguruan_tinggis'));
    }

    public function registerSuccess()
    {
        Alert::success('Data anda akan segera kami proses. Mohon menunggu proses aktivasi akun dan segera melakukan verifikasi email anda. Kami telah mengirim email verifikasi ke  indra@gmail.com Berhasil!')->persistent("Tutup");

        // return view('register-peserta-sukses');
        return redirect('/');
    }

    public function postRegister(Request $request)
    {

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET','https://api.ristekdikti.go.id:8243/pddikti/1.0/pt/'.$request->id_pt.'/prodi/'.$request->id_prodi.'/mahasiswa/'.$request->mhs_nim, [
                    'verify'          => false,
                    'headers' => [
                    'Authorization' => 'Bearer d3f25dda-36dd-345c-89da-1473d5045f17',
                  ],
                ]);
        $json = $res->getBody()->getContents();
        $mahasiswa_forlap = json_decode($json);
        
        // store user
        $group_mhs  = Group::where('name', 'Peserta')->first();
        $user = new User();
        $user->name = $request->mhs_nama;
        $user->email = $request->email;
        $user->password = bcrypt('aaa123');
        $user->active = 0;
        $user->save();
        $user->groups()->attach($group_mhs);

        $mahasiswa = new Mahasiswa();
        $mahasiswa->id_pd               =   $mahasiswa_forlap[0]->id;
        $mahasiswa->nm_pd               =   $mahasiswa_forlap[0]->nama;
        $mahasiswa->jk                  =   $mahasiswa_forlap[0]->jenis_kelamin;
        $mahasiswa->nik                 =   $mahasiswa_forlap[0]->nik;
        $mahasiswa->tmpt_lahir          =   $mahasiswa_forlap[0]->tempat_lahir;
        $mahasiswa->tgl_lahir           =   $mahasiswa_forlap[0]->tgl_lahir;
        $mahasiswa->id_agama            =   $mahasiswa_forlap[0]->agama->id;
        $mahasiswa->nama_agama          =   $mahasiswa_forlap[0]->agama->nama;
        $mahasiswa->jln                 =   $mahasiswa_forlap[0]->alamat->jalan;
        $mahasiswa->rt                  =   $mahasiswa_forlap[0]->alamat->rt;
        $mahasiswa->rw                  =   $mahasiswa_forlap[0]->alamat->rw;
        $mahasiswa->nm_dsn              =   $mahasiswa_forlap[0]->alamat->dusun;
        $mahasiswa->ds_kel              =   $mahasiswa_forlap[0]->alamat->kelurahan;
        $mahasiswa->id_wil              =   $mahasiswa_forlap[0]->alamat->kab_kota->id;
        $mahasiswa->nama_wil            =   $mahasiswa_forlap[0]->alamat->kab_kota->nama;
        $mahasiswa->kode_pos            =   $mahasiswa_forlap[0]->alamat->kode_pos;
        $mahasiswa->id_jns_tinggal      =   $mahasiswa_forlap[0]->jenis_tinggal->id;
        $mahasiswa->nama_jns_tinggal    =   $mahasiswa_forlap[0]->jenis_tinggal->nama;
        $mahasiswa->telepon_rumah       =   $mahasiswa_forlap[0]->telepon;
        $mahasiswa->telepon_seluler     =   $mahasiswa_forlap[0]->handphone;
        $mahasiswa->email               =   $mahasiswa_forlap[0]->email;
        $mahasiswa->a_terima_kps        =   $mahasiswa_forlap[0]->penerima_kps;
        $mahasiswa->wna                 =   $mahasiswa_forlap[0]->wna;
        $mahasiswa->stat_pd             =   $mahasiswa_forlap[0]->terdaftar->status;
        $mahasiswa->nm_ibu_kandung      =   $mahasiswa_forlap[0]->ibu_kandung;
        $mahasiswa->kewarganegaraan     =   $mahasiswa_forlap[0]->kewarganegaraan;
        $mahasiswa->save();

        $mahasiswa_pt = new MahasiswaPt;
        $mahasiswa_pt->id_reg_pd            =   $mahasiswa_forlap[0]->terdaftar->id;
        $mahasiswa_pt->id_pd                =   $mahasiswa_forlap[0]->id;
        $mahasiswa_pt->nim                  =   $mahasiswa_forlap[0]->terdaftar->nim;
        $mahasiswa_pt->kode_pt              =   $mahasiswa_forlap[0]->terdaftar->kode_pt;
        $mahasiswa_pt->nama_pt              =   $mahasiswa_forlap[0]->terdaftar->nama_pt;
        $mahasiswa_pt->status_pt            =   $mahasiswa_forlap[0]->terdaftar->status_pt;
        $mahasiswa_pt->kode_prodi           =   $mahasiswa_forlap[0]->terdaftar->kode_prodi;
        $mahasiswa_pt->nama_prodi           =   $mahasiswa_forlap[0]->terdaftar->nama_prodi;
        $mahasiswa_pt->id_jns_daftar        =   $mahasiswa_forlap[0]->terdaftar->jenis_daftar->id;
        $mahasiswa_pt->nama_jns_daftar      =   $mahasiswa_forlap[0]->terdaftar->jenis_daftar->nama;
        $mahasiswa_pt->id_jenjang_didik     =   $mahasiswa_forlap[0]->terdaftar->jenjang_didik->id;
        $mahasiswa_pt->nama_jenjang_didik   =   $mahasiswa_forlap[0]->terdaftar->jenjang_didik->nama;
        $mahasiswa_pt->tgl_masuk_sp         =   $mahasiswa_forlap[0]->terdaftar->tgl_masuk;
        $mahasiswa_pt->id_jns_keluar        =   $mahasiswa_forlap[0]->terdaftar->jenis_keluar->id;
        $mahasiswa_pt->ket_jns_keluar       =   $mahasiswa_forlap[0]->terdaftar->jenis_keluar->ket;
        $mahasiswa_pt->tgl_keluar           =   $mahasiswa_forlap[0]->terdaftar->tgl_keluar;
        $mahasiswa_pt->smt_tempuh           =   $mahasiswa_forlap[0]->terdaftar->smt_tempuh;
        $mahasiswa_pt->mulai_smt            =   $mahasiswa_forlap[0]->terdaftar->smt_mulai;
        $mahasiswa_pt->status               =   $mahasiswa_forlap[0]->terdaftar->status;
        $mahasiswa_pt->sks_diakui           =   $mahasiswa_forlap[0]->terdaftar->sks;
        $mahasiswa_pt->tgl_sk_yudisium      =   $mahasiswa_forlap[0]->terdaftar->tgl_sk_yudisium;
        $mahasiswa_pt->ipk                  =   $mahasiswa_forlap[0]->terdaftar->ipk;
        $mahasiswa_pt->no_seri_ijazah       =   $mahasiswa_forlap[0]->terdaftar->no_ijazah;
        $mahasiswa_pt->last_update          =   $mahasiswa_forlap[0]->last_update;
        $mahasiswa_pt->save();

        $user_mahasiswa = new UserMahasiswa;
        $user_mahasiswa->users_id           =    $user->id;
        $user_mahasiswa->id_pd              =    $mahasiswa_forlap[0]->id;        
        $files = Input::file('surat_pengantar');

        if(isset($files)){
          $fileName = $files->getClientOriginalName();
          $destinationPath = public_path('/file/surat-pengantar');
          if(!File::exists($destinationPath)){
            if(File::makeDirectory($destinationPath,0777,true)){
                throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
            }
          }
          $files->move($destinationPath,$fileName);
          $user_mahasiswa->surat_pengantar   = $fileName;
        }

        $user_mahasiswa->save();

        $res = $client->request('GET','https://api.ristekdikti.go.id:8243/pddikti/1.0/pt/'.$request->id_pt.'/prodi/'.$request->id_prodi, [
                    'verify'          => false,
                    'headers' => [
                    'Authorization' => 'Bearer d3f25dda-36dd-345c-89da-1473d5045f17',
                  ],
                ]);
        $json = $res->getBody()->getContents();
        $prodi_forlap = json_decode($json);

        $program_studi_check = ProgramStudi::where('id', $prodi_forlap[0]->id);

        if (empty($program_studi_check)) {
            $program_studi = new ProgramStudi;
            $program_studi->id                  =   $prodi_forlap[0]->id;
            $program_studi->kode                =   $prodi_forlap[0]->kode;
            $program_studi->nama                =   $prodi_forlap[0]->nama;   
            $program_studi->status              =   $prodi_forlap[0]->status;   
            $program_studi->id_pt               =   $prodi_forlap[0]->pt->id;   
            $program_studi->kode_pt             =   $prodi_forlap[0]->pt->kode;   
            $program_studi->nama_pt             =   $prodi_forlap[0]->pt->nama;   
            $program_studi->visi                =   $prodi_forlap[0]->visi;   
            $program_studi->misi                =   $prodi_forlap[0]->misi;
            $program_studi->kompetensi          =   $prodi_forlap[0]->kompetensi;   
            $program_studi->jalan               =   $prodi_forlap[0]->jalan;   
            $program_studi->telepon             =   $prodi_forlap[0]->telepon;   
            $program_studi->faksimile           =   $prodi_forlap[0]->faksimile;   
            $program_studi->website             =   $prodi_forlap[0]->website;   
            $program_studi->email               =   $prodi_forlap[0]->email;  
            $program_studi->kab_kota_id         =   $prodi_forlap[0]->kab_kota->id;   
            $program_studi->kab_kota_nama       =   $prodi_forlap[0]->kab_kota->nama;   
            $program_studi->id_jenjang_didik    =   $prodi_forlap[0]->jenjang_didik->id;   
            $program_studi->nama_jenjang_didik  =   $prodi_forlap[0]->jenjang_didik->nama;   
            $program_studi->tgl_berdiri         =   $prodi_forlap[0]->tgl_berdiri;   
            $program_studi->sk_selenggara       =   $prodi_forlap[0]->sk_selenggara;   
            $program_studi->tgl_sk_selenggara   =   $prodi_forlap[0]->tgl_sk_selenggara;   
            $program_studi->sks_lulus           =   $prodi_forlap[0]->sks_lulus;   
            $program_studi->kode_pos            =   $prodi_forlap[0]->kode_pos;   
            $program_studi->last_update         =   $prodi_forlap[0]->last_update;   
            $program_studi->save();   
        }

        Alert::success('Data anda akan segera kami proses. Mohon menunggu proses aktivasi akun dan segera melakukan verifikasi email anda. Kami telah mengirim email verifikasi ke '.$request->email.' Berhasil!')->persistent("Tutup");

        return redirect('/');
    }
}
