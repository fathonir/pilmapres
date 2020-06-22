<?php

namespace App\Http\Controllers\admin;

use DB;
use View;
use Auth;
use Input;
use App\CategoryPengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class CategoryPengumumanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // if(Auth::user()->hasAnyRole('List Category')){
        $categories = CategoryPengumuman::orderBy('created_at', 'desc')->paginate(10);
        $start_page = (($categories->currentPage() - 1) * 10) + 1;
        return view('admin.category-pengumuman.index', array('categories' => $categories, 'start_page' => $start_page));
        // }else{
        // return response ("ERROR PERMISSIONS", 401);
        // }
    }

    public function create()
    {
        // if(Auth::user()->hasAnyRole('Create Category')){
        return View::make('admin.category-pengumuman.create');
        // }else{
        // return response ("ERROR PERMISSIONS", 401);
        // }
    }

    public function store(Request $request)
    {
        // if(Auth::user()->hasAnyRole('Create Category')){
        $this->validate($request, [
            'nama' => 'required|unique:category_pengumuman,nama',
        ]);
        // store
        $category = new CategoryPengumuman;
        $category->nama = Input::get('nama');
        $category->save();

        // redirect
        return Redirect::action('admin\CategoryPengumumanController@index');
        // }else{
        // return response ("ERROR PERMISSIONS", 401);
        // }
    }

    public function show($id)
    {
        // if(Auth::user()->hasAnyRole('Details Category')){
        $category = CategoryPengumuman::findOrFail($id);
        return view('admin.category-pengumuman.show', array('category' => $category));
        // }else{
        // return response ("ERROR PERMISSIONS", 401);
        // }
    }

    public function edit($id)
    {
        // if(Auth::user()->hasAnyRole('Edit Category')){
        $category = CategoryPengumuman::findOrFail($id);
        return view('admin.category-pengumuman.edit', array('category' => $category));
        // }else{
        // return response ("ERROR PERMISSIONS", 401);
        // }
    }

    public function update(Request $request, $id)
    {
        // if(Auth::user()->hasAnyRole('Edit Category')){
        $this->validate($request, [
            'nama' => 'required',
        ]);
        $category = CategoryPengumuman::findOrFail($id);
        $category->nama = Input::get('nama');
        $category->save();

        // redirect
        return Redirect::action('admin\CategoryPengumumanController@index');
        // }else{
        // return response ("ERROR PERMISSIONS", 401);
        // }
    }

    public function destroy($id)
    {
        // if(Auth::user()->hasAnyRole('Delete Category')){
        $category = CategoryPengumuman::findOrFail($id);
        $categories = $category->categoryPengumuman;
        if (!$categories->isEmpty()) {
            return Redirect::action('admin\CategoryPengumumanController@index')->with('flash-error', 'Kategori ini sudah di pakai pada suatu pengumuman');
        } else {
            $category->delete();
            return Redirect::action('admin\CategoryPengumumanController@index')->with('flash-success', 'The user has been deleted.');
        }
        // }else{
        // return response ("ERROR PERMISSIONS", 401);
        // }
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $categories = CategoryPengumuman::where('nama', 'LIKE', '%' . $search . '%')->paginate(10);
        $start_page = (($categories->currentPage() - 1) * 10) + 1;
        return view('admin.category-pengumuman.list', compact('categories', 'start_page'));
    }
}
