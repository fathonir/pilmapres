<?php

namespace App\Http\Controllers\admin;

use DB;
use View;
use Auth;
use Input;
use File;
use App\CategoryBerita;
use App\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class BeritaController extends Controller
{
  
	public function index()
  {


     $user = Auth::user();

        if (($user)&&($user->hasAnyRole('Index Berita'))) {

      $beritas = Berita::join('category_beritas', 'category_beritas.id', '=', 'beritas.category_berita_id')
                       ->join('users', 'users.id', '=', 'beritas.user_id')
                       ->select('beritas.*', 'category_beritas.nama AS nama', 'users.name AS username')
                       ->orderBy('beritas.created_at', 'desc')
                       ->paginate(10);
      $start_page= (($beritas->currentPage()-1) * 10) + 1;
      return view('admin.berita.index',array('beritas' => $beritas, 'start_page'=>$start_page));

        }else{
            return Redirect::action('HomeController@blockAkses');
          }
  } 

	public function create()
  {

     $user = Auth::user();

      if (($user)&&($user->hasAnyRole('Create Berita'))) {

      $categories = CategoryBerita::pluck('nama', 'id');
      $categories->prepend('Pilih Kategori',0);
      return View::make('admin.berita.create', compact('categories'));

      }else{
            return Redirect::action('HomeController@blockAkses'); 
          }
  }

  public function store(Request $request)
  {
    // if(Auth::user()->hasAnyRole('Create Berita')){
      $this->validate($request,[
            'judul'           =>'required|unique:beritas,judul',
            'isi_berita'      =>'required',
            'gambar'          =>'required',
            ]);
      // store

      $berita = new Berita;
      $berita->judul       = Input::get('judul');
      $berita->isi_berita  = Input::get('isi_berita');
      $berita->tanggal     = Input::get('tanggal');
      if($request->hasFile('gambar')) {
        //image
        $image = $request->file('gambar');
        $fileName = str_random(10).'.'.$image->getClientOriginalExtension();
        // thumbs image
        $destinationPath = public_path('images/berita/thumbs');
        if(!File::exists($destinationPath)){
          if(File::makeDirectory($destinationPath,0777,true)){
              throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
          }
        }
        $img = Image::make($image->getRealPath());
        $img->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
              });
        $img->save($destinationPath.'/'.$fileName);
        // sava image
        if( $img = Image::make($image->getRealPath())->width()>500){
          $destinationPath = public_path('images/berita');
          if(!File::exists($destinationPath)){
            if(File::makeDirectory($destinationPath,0777,true)){
                throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
            }
          }
          $img = Image::make($image->getRealPath());
          // $img->resize(null, 800, function ($constraint) {
         //      $constraint->aspectRatio();
         //  });
          $img->save($destinationPath.'/'.$fileName);
        }else{
          $destinationPath = public_path('/images/berita');
          if(!File::exists($destinationPath)){
            if(File::makeDirectory($destinationPath,0777,true)){
                throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
            }
          }
          $image->move($destinationPath,$fileName);
        }
      $berita->gambar = $fileName;
      }
      $files = Input::file('file');
      if(isset($files)){
        $fileName = str_random(10).'.'.$files->getClientOriginalExtension();
        $destinationPath = public_path('/images/berita/file');
        if(!File::exists($destinationPath)){
          if(File::makeDirectory($destinationPath,0777,true)){
              throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
          }
        }
        $files->move($destinationPath,$fileName);
        $berita->file   = $fileName;
      }
      $berita->category_berita_id = Input::get('category_berita_id');
      $berita->user_id            = Auth::id();
      $berita->save();
      
      // redirect
      return Redirect::action('admin\BeritaController@index');
    // }else{
       // return response ("ERROR PERMISSIONS", 401);
    // }
  }

   public function show($id)
  {


    $user = Auth::user();

      if (($user)&&($user->hasAnyRole('Show Berita'))) {

      $berita = Berita::leftJoin('category_beritas', 'category_beritas.id', '=', 'beritas.category_berita_id')
                       ->leftJoin('users', 'users.id', '=', 'beritas.user_id')
                      ->orderBy('beritas.created_at', 'desc')
                      ->select(
                        'beritas.category_berita_id',  
                        'beritas.user_id',  
                        'beritas.judul', 
                        'beritas.isi_berita',
                        'beritas.gambar',
                        'beritas.viewers',
                        'beritas.file',
                        'beritas.tanggal',
                        'category_beritas.nama',
                        'users.name AS username'
                      )
                  ->findOrFail($id);


      return view('admin.berita.show', array('berita' => $berita));

      }else{
            return Redirect::action('HomeController@blockAkses'); 
          }
  }

  public function edit($id)
  {

     $user = Auth::user();

      if (($user)&&($user->hasAnyRole('Edit Berita'))) {

      $berita = Berita::findOrFail($id);
      $categories = CategoryBerita::pluck('nama', 'id');
      $categories->prepend('',0);     
      return view('admin.berita.edit', compact('berita', 'categories'));

      }else{
            return Redirect::action('HomeController@blockAkses'); 
          }
  }

  public function update(Request $request, $id)
  {
    // if(Auth::user()->hasAnyRole('Edit Berita')){
      $this->validate($request,[
            'judul'           =>'required',
            'isi_berita'      =>'required',
            ]);
      $berita = Berita::findOrFail($id);
      $berita->judul       = Input::get('judul');
      $berita->isi_berita  = Input::get('isi_berita');
      $berita->tanggal     = Input::get('tanggal');
      if($request->hasFile('gambar')) {
        //image
        $image = $request->file('gambar');
        $fileName = str_random(10).'.'.$image->getClientOriginalExtension();
        // thumbs image
        $destinationPath = public_path('images/berita/thumbs');
        if(!File::exists($destinationPath)){
          if(File::makeDirectory($destinationPath,0777,true)){
              throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
          }
        }
        $img = Image::make($image->getRealPath());
        $img->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
              });
        $img->save($destinationPath.'/'.$fileName);
        // sava image
        if( $img = Image::make($image->getRealPath())->width()>500){
          $destinationPath = public_path('images/berita');
          if(!File::exists($destinationPath)){
            if(File::makeDirectory($destinationPath,0777,true)){
                throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
            }
          }
          $img = Image::make($image->getRealPath());
          // $img->resize(null, 800, function ($constraint) {
         //      $constraint->aspectRatio();
         //  });
          $img->save($destinationPath.'/'.$fileName);
        }else{
          $destinationPath = public_path('/images/berita');
          if(!File::exists($destinationPath)){
            if(File::makeDirectory($destinationPath,0777,true)){
                throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
            }
          }
          $image->move($destinationPath,$fileName);
        }
      $berita->gambar = $fileName;
      }
      $files = Input::file('file');
      if(isset($files)){
        $fileName = str_random(10).'.'.$files->getClientOriginalExtension();
        $destinationPath = public_path('/images/berita/file');
        if(!File::exists($destinationPath)){
          if(File::makeDirectory($destinationPath,0777,true)){
              throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
          }
        }
        $files->move($destinationPath,$fileName);
        $berita->file   = $fileName;
      }
      $berita->category_berita_id = Input::get('category_berita_id');
      $berita->user_id    = Auth::id();
      $berita->save();
      
      // redirect
      return Redirect::action('admin\BeritaController@index');
    // }else{
      // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function destroy($id)
  {
    // if(Auth::user()->hasAnyRole('Delete Berita')){
  	  $berita = Berita::findOrFail($id);
      $berita->delete();
      return Redirect::action('admin\BeritaController@index')->with('flash-success','The user has been deleted.');
    
    // }else{
      // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function search(Request $request)
  {
      $search = $request->get('search');
      $beritas = Berita::where('judul','LIKE','%'.$search.'%')->paginate(10);
      $start_page= (($beritas->currentPage()-1) * 10) + 1;
        return view('admin.berita.index', compact('beritas','start_page'));
  }
}
