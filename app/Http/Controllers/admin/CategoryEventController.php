<?php

namespace App\Http\Controllers\admin;

use DB;
use View;
use Auth;
use Input;
use App\CategoryEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class CategoryEventController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  
	public function index()
  {
    // if(Auth::user()->hasAnyRole('List Category')){
      $category = CategoryEvent::orderBy('created_at', 'desc')->paginate(10);
      $start_page= (($category->currentPage()-1) * 10) + 1;
      return view('admin.categories-event.index',array('category' => $category, 'start_page'=>$start_page));
    // }else{
      // return response ("ERROR PERMISSIONS", 401);
    // }
  } 

	public function create()
  {
    // if(Auth::user()->hasAnyRole('Create Category')){
      return View::make('admin.categories-event.create');
    // }else{
       // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function store(Request $request)
  {
    // if(Auth::user()->hasAnyRole('Create Category')){
   
      // store
      $category = new CategoryEvent;
      $category->judul       = Input::get('judul');
      $category->save();
      
      // redirect
      return Redirect::action('admin\CategoryEventController@index');
    // }else{
       // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function show($id_category_event)
  {
    // if(Auth::user()->hasAnyRole('Details Category')){
      $category = CategoryEvent::findOrFail($id_category_event);
      return view('admin.categories-event.show', array('category' => $category));
    // }else{
      // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function edit($id_category_event)
  {
    // if(Auth::user()->hasAnyRole('Edit Category')){
      $category = CategoryEvent::findOrFail($id_category_event);     
      return view('admin.categories-event.edit', array('category' => $category));
    // }else{
      // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function update(Request $request, $id_category_event)
  {
    // if(Auth::user()->hasAnyRole('Edit Category')){
      $this->validate($request,[
            'judul'           =>'required',
            ]);
      $category = CategoryEvent::findOrFail($id_category_event);
      $category->judul       = Input::get('judul');
      $category->save();
      
      // redirect
      return Redirect::action('admin\CategoryEventController@index');
    // }else{
      // return response ("ERROR PERMISSIONS", 401);
    // }
  }

  public function destroy($id_category_event)
  {
    $category = CategoryEvent::where('id_category_event', $id_category_event)->firstOrFail();
    $category->delete();
    return Redirect::action('admin\CategoryEventController@index');
    
  }

  public function search(Request $request)
  {
      $search = $request->get('search');
      $category = CategoryEvent::where('judul','LIKE','%'.$search.'%')->paginate(10);
      $start_page= (($category->currentPage()-1) * 10) + 1;
        return view('admin.categories-event.index', compact('category','start_page'));
  }
}
