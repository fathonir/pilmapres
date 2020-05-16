<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use File;
use Mapper;
use Response;
use App\Video; 
use App\Topik; 
use App\Bidang; 
use App\Slider; 
use App\Prestasi; 
use App\KaryaTulis; 
use App\MahasiswaPt;
use App\UserMahasiswa; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('created_at', 'desc')->get();
        
        return view('landing', compact('sliders'));
    }
    public function admin()
    {
        return view('layouts.admin');
    }
    public function blockAkses()
    {
        return view('302');
    }
    public function allTestimony()
    {
        $testimonis = Testimony::orderBy('created_at', 'desc')->paginate(6);

        return view('testimoni', compact('testimonis'));
    }
    public function detailTestimony($id)
    {
        $testimonis = Testimony::where('id', $id)->firstOrFail();
       

        return view('detail-testimony', compact('testimonis'));
    }
    public function galleryDetail()
    {
        return view('gallery-detail');
    }
    public function detailPengumuman($id)
    {
        $pengumuman = Pengumuman::where('id', $id)->firstOrFail();   
        $pengumumans = Pengumuman::orderBy('created_at', 'desc')->paginate(4);

        return view('detail-pengumuman', compact('pengumuman', 'pengumumans'));
    }
    public function contact_us()
    {
        Mapper::map(-6.2240103,106.8010528);
        return view('contact-us');
    }
    public function about_us()
    {
        return view('about-us');
    }
    public function listPengumuman()
    {
        $list_kategori = CategoryPengumuman::orderBy('nama','asc')
                        ->get();
        $pengumumans = Pengumuman::orderBy('created_at', 'desc')->get();
        return view('list-pengumuman', compact('pengumumans','list_kategori'));
    }
    public function gallery_detail($id)
    {
        $image_galleries = ImageGallery::where('gallery_id', $id)->get();   
        $galleries = Gallery::where('id', $id)->firstOrFail();
        return view('gallery-detail', compact('galleries', 'image_galleries'));
    }
    public function detailSlider($id)
    {
        $slider = Slider::where('sliders.id', $id)
                        ->join('users', 'users.id', '=', 'sliders.user_id') 
                        ->firstOrFail();

        $list_slider = Slider::orderBy('created_at', 'desc')->paginate(4);

        return view('detail-slider', compact('slider', 'list_slider'));
    }

    public function detailFinalis()
    {

      return view('detail-finalis');
    }

    public function dashboardFinalis()
    {
      $user = Auth::user();

      if (!empty($user->video->link)) {
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';

        if (preg_match($longUrlRegex, $user->video->link, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $user->video->link, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        $user->link_video = 'https://www.youtube.com/embed/' . $youtube_id;
      }

      return view('dashboard-finalis', compact('user'));
    }

    public function video()
    {
      $user = Auth::user();
      $video = Video::whereUsersId($user->id)->first();

      if (empty($video)) {
        
        return view('video', compact('user'));
      }else{

        return view('video-edit', compact('user', 'video'));
      }

    }
    
    public function videoPost(Request $request)
    {
      $user = Auth::user();

      $video                      = new Video;
      $video->users_id            = $user->id;
      $video->judul               = $request->judul;
      $video->link                = $request->link;
      $video->keterangan_tambahan = $request->keterangan_tambahan;
      $video->active = 1;
      $video->save();
      
      return Redirect::action('HomeController@dashboardFinalis')->with('flash-success','Video Berhasil Ditambahkan.');
    }

    public function videoEditPost(Request $request)
    {
      $video                      = Video::whereId($request->id)->first();
      $video->judul               = $request->judul;
      $video->link                = $request->link;
      $video->keterangan_tambahan = $request->keterangan_tambahan;
      $video->save();
      
      return Redirect::action('HomeController@dashboardFinalis')->with('flash-success','Video Berhasil Diubah.');
    }

    public function prestasi()
    {
      $user = Auth::user();

      return view('prestasi', compact('user'));
    }

    public function prestasiEdit($id)
    {
      $prestasi = Prestasi::whereId($id)->first();
      $user = Auth::user();

      return view('edit-prestasi', compact('prestasi', 'user'));
    }
    
    public function prestasiEditPost(Request $request, $id)
    {
      $user = Auth::user();

      $prestasi                     = Prestasi::whereId($id)->first();
      $prestasi->prioritas          = $request->prioritas;
      $prestasi->nama_prestasi      = $request->nama_prestasi;
      $prestasi->pencapaian         = $request->pencapaian;
      $prestasi->tahun              = $request->tahun;
      $prestasi->tingkat            = $request->tingkat;
      $prestasi->pemberi_event      = $request->pemberi_event;
      $prestasi->individu_kelompok  = $request->individu_kelompok;
      $prestasi->keterangan_tambahan= $request->keterangan_tambahan;
      $files = $request->sertifikat;

      if(isset($files)){
        $fileName = $files->getClientOriginalName();
        $destinationPath = public_path('/file/prestasi');
        if(!File::exists($destinationPath)){
          if(File::makeDirectory($destinationPath,0777,true)){
              throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
          }
        }
        $files->move($destinationPath,$fileName);
        $prestasi->sertifikat   = $fileName;
      }

      $prestasi->save();
      
      return Redirect::action('HomeController@dashboardFinalis')->with('flash-success','Prestasi Berhasil Diubah.');
    }

    public function prestasiDetail($id)
    {
      $prestasi = Prestasi::whereId($id)->first();
      $user = Auth::user();

      return view('detail-prestasi', compact('prestasi', 'user'));
    }
    
    public function prestasiPost(Request $request)
    {
      $user = Auth::user();

      $prestasi                     = new Prestasi;
      $prestasi->users_id           = $user->id;
      $prestasi->prioritas          = $request->prioritas;
      $prestasi->nama_prestasi      = $request->nama_prestasi;
      $prestasi->pencapaian         = $request->pencapaian;
      $prestasi->tahun              = $request->tahun;
      $prestasi->tingkat            = $request->tingkat;
      $prestasi->pemberi_event      = $request->pemberi_event;
      $prestasi->individu_kelompok  = $request->individu_kelompok;
      $prestasi->keterangan_tambahan= $request->keterangan_tambahan;
      $prestasi->active = 1;
      $files = $request->sertifikat;

      if(isset($files)){
        $fileName = $files->getClientOriginalName();
        $destinationPath = public_path('/file/prestasi');
        if(!File::exists($destinationPath)){
          if(File::makeDirectory($destinationPath,0777,true)){
              throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
          }
        }
        $files->move($destinationPath,$fileName);
        $prestasi->sertifikat   = $fileName;
      }

      $prestasi->save();
      
      return Redirect::action('HomeController@dashboardFinalis')->with('flash-success','Prestasi Berhasil Ditambahkan.');
    }


    public function karyaTulis()
    {
      $user = Auth::user();
      $topiks = Topik::whereActive(1)->get();
      $bidangs = Bidang::whereActive(1)->get();
      $karya_tulis = KaryaTulis::whereUsersId($user->id)->first();

      if (empty($karya_tulis)) {
        return view('karya-tulis', compact('user', 'bidangs', 'topiks'));
      }else{
        return view('karya-tulis-edit', compact('user', 'bidangs', 'topiks', 'karya_tulis'));
      }
      
    }

    public function karyaTulisPost(Request $request)
    {
      $user = Auth::user();

      $karya_tulis            = new KaryaTulis;
      $karya_tulis->judul     = $request->judul;
      $karya_tulis->users_id  = $user->id;
      $karya_tulis->topik_id  = $request->topik_id;
      $karya_tulis->bidang_id = $request->bidang_id;
      $karya_tulis->ringkasan = $request->ringkasan;
      $files = $request->file;

      if(isset($files)){
        $fileName = $files->getClientOriginalName();
        $destinationPath = public_path('/file/karya-tulis');
        if(!File::exists($destinationPath)){
          if(File::makeDirectory($destinationPath,0777,true)){
              throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
          }
        }
        $files->move($destinationPath,$fileName);
        $karya_tulis->file   = $fileName;
      }

      $karya_tulis->save();
      
      return Redirect::action('HomeController@dashboardFinalis')->with('flash-success','Karya Tulis Berhasil Ditambahkan.');
    }

    public function karyaTulisEditPost(Request $request)
    {
      $karya_tulis            = KaryaTulis::whereId($request->id)->first();
      $karya_tulis->judul     = $request->judul;
      $karya_tulis->topik_id  = $request->topik_id;
      $karya_tulis->bidang_id = $request->bidang_id;
      $karya_tulis->ringkasan = $request->ringkasan;
      $files = $request->file;

      if(isset($files)){
        $fileName = $files->getClientOriginalName();
        $destinationPath = public_path('/file/karya-tulis');
        if(!File::exists($destinationPath)){
          if(File::makeDirectory($destinationPath,0777,true)){
              throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
          }
        }
        $files->move($destinationPath,$fileName);
        $karya_tulis->file   = $fileName;
      }

      $karya_tulis->save();
      
      return Redirect::action('HomeController@dashboardFinalis')->with('flash-success','Karya Tulis Berhasil Diubah.');
    }

    public function EditFotoProfil(Request $request)
    {
      $user = Auth::user();

      $user_mahasiswa = UserMahasiswa::whereUsersId($user->id)->first();
      $files          = $request->foto;

      if(isset($files)){
        $fileName = $files->getClientOriginalName();
        $destinationPath = public_path('/file/foto-profil-peserta');
        if(!File::exists($destinationPath)){
          if(File::makeDirectory($destinationPath,0777,true)){
              throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
          }
        }
        $files->move($destinationPath,$fileName);
        $user_mahasiswa->foto   = $fileName;
        $user_mahasiswa->save();
      }
      
      return Redirect::action('HomeController@dashboardFinalis')->with('flash-success','Foto Profil Berhasil Diubah.');
    }

    public function searchKategoriGallery(Request $request)
    {
        $user = Auth::user();
        $search = $request->get('search');
        $galleries = Gallery::where('galleries.id_category_galleries','LIKE','%'.$search.'%')
                             ->leftJoin('category_galleries','category_galleries.id_category_galleries', '=', 'galleries.id_category_galleries')
                             ->leftJoin('users','users.id', '=', 'galleries.user_id')
                             ->select(
                                'galleries.id',
                                'galleries.judul',
                                'galleries.deskripsi',
                                'galleries.id_category_galleries',
                                'category_galleries.id_category_galleries',
                                'galleries.image',
                                'users.name'
                                )->paginate(8);

         $list_kategori = CategoryGallerie::orderBy('judul','asc')->get();

        $image_galleries = ImageGallery::orderBy('created_at', 'desc')->get();
        return view('all-gallery', compact('galleries', 'list_kategori','image_galleries'));                     
    }

    public function ajaxGetProdi(Request $request){ 

        $client = new \GuzzleHttp\Client();
        $total_page = 50;
        $data_prodi = [];

        for ($i=1; $i < $total_page ; $i++) {
            $res = $client->request('GET','https://api.ristekdikti.go.id:8243/pddikti/0.3/pt/'.$request->get('id').'/prodi?page='.$i.'&per-page=5', [
                            'verify'          => false,
                            'headers' => [
                            'Authorization' => 'Bearer d3f25dda-36dd-345c-89da-1473d5045f17',
                          ],
                        ]);
            $json = $res->getBody()->getContents();
            $objects = json_decode($json);

            foreach ($objects as $key => $value) {
                $data['id'] = $value->id;
                $data['nama'] = $value->nama;
                $data['jenjang_didik_nama'] = $value->jenjang_didik->nama;

                array_push($data_prodi, $data);
            }
        }

        return response()->json($data_prodi);
    }

    public function ajaxGetMahasiswaByNim(Request $request){ 

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET','https://api.ristekdikti.go.id:8243/pddikti/1.0/pt/'.$request->get('pt').'/prodi/'.$request->get('prodi').'/mahasiswa/'.$request->get('nim'), [
                        'verify'          => false,
                        'headers' => [
                        'Authorization' => 'Bearer d3f25dda-36dd-345c-89da-1473d5045f17',
                      ],
                    ]);
        $json = $res->getBody()->getContents();
        $objects = json_decode($json);

        return response()->json($objects);
    }

    public function ajaxCheckMahasiswaByNim(Request $request){ 
        $mahasiswa_pt = MahasiswaPt::whereNim($request->nim)->first();
        $status = 0;
        
        if ($mahasiswa_pt) {
            $status = 1;
        }

        return response()->json($status);
    }
}

























