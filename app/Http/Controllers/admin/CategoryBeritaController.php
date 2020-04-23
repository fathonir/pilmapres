<?php

namespace App\Http\Controllers\admin;

use DB;
use View;
use Auth;
use Input;
use App\CategoryBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class CategoryBeritaController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  
	public function index()
  {
    // if(Auth::user()->hasAnyRole('List Category')){
      $categories = CategoryBerita::orderBy('created_at', 'desc')->paginate(10);
      $start_page= (($categories->currentPage()-1) * 10) + 1;
      return view('admin.categories.index',array('categories' => $categories, 'start_page'=>$start_page));
    // }else{
      // return response ("ERROR PERMISSIONS", 401);
    // }
  } 

	public function create()
  {
    // if(Auth::user()->hasAnyRole('Create Category')){
      return View::make('admin.categories.create');
    // }else{
       // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function store(Request $request)
  {
    // if(Auth::user()->hasAnyRole('Create Category')){
      $this->validate($request,[
            'nama'           =>'required|unique:category_beritas,nama',
            ]);
      // store
      $category = new CategoryBerita;
      $category->nama       = Input::get('nama');
      $category->user_id    = Auth::id();
      $category->save();
      
      // redirect
      return Redirect::action('admin\CategoryController@index');
    // }else{
       // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function show($id)
  {
    // if(Auth::user()->hasAnyRole('Details Category')){
      $category = CategoryBerita::findOrFail($id);
      return view('admin.categories.show', array('category' => $category));
    // }else{
      // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function edit($id)
  {
    // if(Auth::user()->hasAnyRole('Edit Category')){
      $category = CategoryBerita::findOrFail($id);     
      return view('admin.categories.edit', array('category' => $category));
    // }else{
      // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function update(Request $request, $id)
  {
    // if(Auth::user()->hasAnyRole('Edit Category')){
      $this->validate($request,[
            'nama'           =>'required',
            ]);
      $category = CategoryBerita::findOrFail($id);
      $category->nama       = Input::get('nama');
      $category->user_id    = Auth::id();
      $category->save();
      
      // redirect
      return Redirect::action('admin\CategoryController@index');
    // }else{
      // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function destroy($id)
  {
    // if(Auth::user()->hasAnyRole('Delete Category')){
  	  $category = CategoryBerita::findOrFail($id);
  	  $categories = $category->categoryBerita;
      if(!$categories->isEmpty()){
          return Redirect::action('admin\CategoryController@index')->with('flash-error','Kategori ini sudah di pakai pada suatu berita');  
      }else{
          $category->delete();
          return Redirect::action('admin\CategoryController@index')->with('flash-success','The user has been deleted.');
      }
    // }else{
      // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function search(Request $request)
  {
      $search = $request->get('search');
      $categories = CategoryBerita::where('nama','LIKE','%'.$search.'%')->paginate(10);
      $start_page= (($categories->currentPage()-1) * 10) + 1;
        return view('admin.categories.index', compact('categories','start_page'));
  }
}
