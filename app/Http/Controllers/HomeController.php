<?php

namespace App\Http\Controllers;

use DB;
use Mapper;
use Response;
use Auth;
use App\Slider; 
use Illuminate\Http\Request;

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
        Mapper::map(-6.945372, 107.644676);
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
}
