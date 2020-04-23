<?php

namespace App\Http\Controllers\admin;

use DB;
use View;
use Auth;
use Input;
use File;
use App\ListPengumuman;
use App\CategoryPengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class ListPengumumanController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  
	public function index()
  {

        // echo "<pre>";
        // print_r('$pengumumans');
        // echo "</pre>";
        // exit();
    // if(Auth::user()->hasAnyRole('List FilePaslon')){
      $list_pengumumans = ListPengumuman::leftJoin('category_pengumuman', 'category_pengumuman.id', '=', 'list_pengumuman.category_pengumuman_id')->select('list_pengumuman.*', 'category_pengumuman.nama AS category')->orderBy('created_at', 'desc')
                                ->paginate(10);
      $start_page= (($list_pengumumans->currentPage()-1) * 10) + 1;
      return view('admin.list-pengumuman.index',compact('list_pengumumans', 'start_page'));
    // }else{
      // return response ("ERROR PERMISSIONS", 401);
    // }
  } 

	public function create()
  {
    // if(Auth::user()->hasAnyRole('Create FilePaslon')){
      $categories = CategoryPengumuman::pluck('nama', 'id');
      $categories->prepend('',0);
      return View::make('admin.list-pengumuman.create', compact('categories'));
    // }else{
       // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function store(Request $request)
  {
    // if(Auth::user()->hasAnyRole('Create FilePaslon')){
      $this->validate($request,[
            'judul'   =>'required',
            ]);
      // store

      $list_pengumuman = new ListPengumuman;
      $list_pengumuman->judul      = Input::get('judul');
      $list_pengumuman->category_pengumuman_id  = Input::get('category_pengumuman_id');
      $files = Input::file('file');
      if(isset($files)){
        $fileName = $files->getClientOriginalName();
        $destinationPath = public_path('/images/pengumuman/file');
        if(!File::exists($destinationPath)){
          if(File::makeDirectory($destinationPath,0777,true)){
              throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
          }
        }
        $files->move($destinationPath,$fileName);
        $list_pengumuman->file   = $fileName;
      }
      $list_pengumuman->save();
      
      // redirect
      return Redirect::action('admin\ListPengumumanController@index');
    // }else{
       // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function show($id)
  {
    // if(Auth::user()->hasAnyRole('Details FilePaslon')){
      $list_pengumuman = ListPengumuman::findOrFail($id);
      return view('admin.list-pengumuman.show', compact('list_pengumuman'));
    // }else{
      // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function edit($id)
  {
    // if(Auth::user()->hasAnyRole('Edit FilePaslon')){
      $list_pengumuman = ListPengumuman::findOrFail($id);
      $categories = CategoryPengumuman::pluck('nama', 'id');
      $categories->prepend('',0);  
      return view('admin.list-pengumuman.edit', compact('list_pengumuman', 'categories'));
    // }else{
      // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function update(Request $request, $id)
  {
    // if(Auth::user()->hasAnyRole('Edit Event')){
      $this->validate($request,[
            'judul'    =>'required',
            ]);

      $list_pengumuman = ListPengumuman::findOrFail($id);
      $list_pengumuman->judul     = Input::get('judul');
      $list_pengumuman->category_pengumuman_id  = Input::get('category_pengumuman_id');
      $files = Input::file('file');
      if(isset($files)){
        $fileName = $files->getClientOriginalName();
        $destinationPath = public_path('/images/pengumuman/file');
        if(!File::exists($destinationPath)){
          if(File::makeDirectory($destinationPath,0777,true)){
              throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
          }
        }
        $files->move($destinationPath,$fileName);
        $list_pengumuman->file   = $fileName;
      }
      $list_pengumuman->save();
      
      // redirect
      return Redirect::action('admin\ListPengumumanController@index');
    // }else{
      // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function destroy($id)
  {
    // if(Auth::user()->hasAnyRole('Delete FilePaslon')){
  	  $list_pengumuman = ListPengumuman::findOrFail($id);
      $list_pengumuman->delete();
      return Redirect::action('admin\ListPengumumanController@index')->with('flash-success','The user has been deleted.');
    
    // }else{
      // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function search(Request $request)
  {
      $search = $request->get('search');
      $list_pengumumans = ListPengumuman::where('nama','LIKE','%'.$search.'%')->paginate(10);
      $start_page= (($list_pengumumans->currentPage()-1) * 10) + 1;
        return view('admin.list-pengumuman.index', compact('list_pengumuman','start_page'));
  }
}
