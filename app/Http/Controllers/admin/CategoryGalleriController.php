<?php

namespace App\Http\Controllers\admin;

use DB;
use View;
use Auth;
use Input;
use App\CategoryGallerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class CategoryGalleriController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  
	public function index()
  {
    
      $categori_galleri = CategoryGallerie::orderBy('created_at', 'desc')->paginate(10);
      $start_page= (($categori_galleri->currentPage()-1) * 10) + 1;
      return view('admin.category_galleri.index',array('categori_galleri' => $categori_galleri, 'start_page'=>$start_page));
  } 

	public function create()
  {
    $categori_galleri    = CategoryGallerie::pluck('judul', 'id_category_galleries');
    return View::make('admin.category_galleri.create', compact('categori_galleri'));
  }

  public function store(Request $request)
  {
    
      // store
      $categori_galleri = new CategoryGallerie;
      $categori_galleri->judul           = Input::get('judul');
      $categori_galleri->deskripsi       = Input::get('deskripsi');
      $categori_galleri->save();
      
      // redirect
      return Redirect::action('admin\CategoryGalleriController@index');
    // }else{
       // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function show($id_category_galleries)
  {
    // if(Auth::user()->hasAnyRole('Details Category')){
      $categori_galleri = CategoryGallerie::findOrFail($id_category_galleries);
      return view('admin.category_galleri.show', array('categori_galleri' => $categori_galleri));
    // }else{
      // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function edit($id_category_galleries)
  {
    // if(Auth::user()->hasAnyRole('Edit Category')){
      $categori_galleri = CategoryGallerie::findOrFail($id_category_galleries);     
      return view('admin.category_galleri.edit', array('categori_galleri' => $categori_galleri));
    // }else{
      // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function update(Request $request, $id_category_galleries)
  {
    
      $categori_galleri = CategoryGallerie::findOrFail($id_category_galleries);
      $categori_galleri->judul      = Input::get('judul');
      $categori_galleri->deskripsi  = Input::get('deskripsi');
      $categori_galleri->save();
      
      // redirect
      return Redirect::action('admin\CategoryGalleriController@index');
    // }else{
      // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function destroy($id_category_galleries)
    {
        $categori_galleri = CategoryGallerie::where('id_category_galleries', $id_category_galleries)->firstOrFail();
        $categori_galleri->delete();
        return Redirect::action('admin\CategoryGalleriController@index');
    }

  public function search(Request $request)
  {
      $search = $request->get('search');
      $categori_galleri = CategoryGallerie::where('judul','LIKE','%'.$search.'%')->paginate(10);
      $start_page= (($categori_galleri->currentPage()-1) * 10) + 1;
        return view('admin.category_galleri.index', compact('categori_galleri','start_page'));
  }
}
