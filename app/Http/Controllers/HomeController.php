<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use File;
use Mapper;
use Response;
use App\Topik; 
use App\Bidang; 
use App\Slider; 
use App\KaryaTulis; 
use App\MahasiswaPt;
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

      if ($user->is_user_request) {
        $check_verfication = false;
      }else{
        $check_verfication = true;
      }

      // echo "<pre>";
      //   print_r($check_verfication);
      // echo "</pre>";
      // exit();

      // // print_r($check_verfication);
      // // exit();

      return view('dashboard-finalis', compact('user'));
    }

    public function karyaTulis()
    {
      $user = Auth::user();
      $topiks = Topik::whereActive(1)->get();
      $bidangs = Bidang::whereActive(1)->get();
      
      return view('karya-tulis', compact('user', 'bidangs', 'topiks'));
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

    public function detailPrestasi()
    {
        return view('detail-prestasi');
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

























