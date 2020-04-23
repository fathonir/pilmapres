<?php

namespace App\Http\Controllers\admin;
use View;
use Auth;
use DB;
use App\Group;
use Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
class GroupController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  
	public function index()
  {
    if(Auth::user()->hasAnyRole('List Groups')){
      $groups = Group::orderBy('created_at', 'desc')->paginate(10);
      $start_page= (($groups->currentPage()-1) * 10) + 1;
      return view('admin.groups.index',array('groups'=>$groups,'start_page'=>$start_page));
    }else{
      return Redirect::action('admin\AdminController@memberfeed')->with('flash-error','ERROR PERMISSIONS.');
    }
  } 

	public function create()
  {
    if(Auth::user()->hasAnyRole('Create Group')){
      return View::make('admin.groups.create');
    }else{
      return Redirect::action('admin\AdminController@memberfeed')->with('flash-error','ERROR PERMISSIONS.');
    }
  }

  public function store(Request $request)
  {
    if(Auth::user()->hasAnyRole('Create Group')){
      $this->validate($request,[
            'name'           =>'required|unique:groups,name',
            ]);
      // store
      $group = new Group;
      $group ->name       = Input::get('name');
      $group ->save();
      
      // redirect
      return Redirect::action('admin\GroupController@index');
    }else{
      return Redirect::action('admin\AdminController@memberfeed')->with('flash-error','ERROR PERMISSIONS.');
    }
  }

  public function show($id)
  {
    if(Auth::user()->hasAnyRole('Details Group')){
      $group = Group::findOrFail($id);
      return view('admin.groups.show', array('group' => $group));
    }else{
      return Redirect::action('admin\AdminController@memberfeed')->with('flash-error','ERROR PERMISSIONS.');
    }
  }

  public function edit($id)
  {
    if(Auth::user()->hasAnyRole('Edit Group')){
      $group = Group::findOrFail($id);     
      return view('admin.groups.edit', array('group' => $group));
    }else{
      return Redirect::action('admin\AdminController@memberfeed')->with('flash-error','ERROR PERMISSIONS.');
    }
  }

  public function update(Request $request, $id)
  {
    if(Auth::user()->hasAnyRole('Edit Group')){
      $this->validate($request,[
            'name'           =>'required|unique:groups,name',
            ]);
      
      $group = Group::findOrFail($id);
      $group ->name          = Input::get('name');
      $group ->save();
      
      // redirect
      return Redirect::action('admin\GroupController@index');
    }else{
      return Redirect::action('admin\AdminController@memberfeed')->with('flash-error','ERROR PERMISSIONS.');
    }
  }

  public function destroy($id)
  {
    if(Auth::user()->hasAnyRole('Delete Group')){
  	  $group = Group::findOrFail($id);
      $group_role = $group->groupRole;
      if(!$group_role->isEmpty()){
          return Redirect::action('admin\GroupController@index')->with('flash-error','The group can not be removed because used in group roles.');  
      }else{
          $group->delete();
          return Redirect::action('admin\GroupController@index')->with('flash-success','The user has been deleted.');
      }
    }else{
      return Redirect::action('admin\AdminController@memberfeed')->with('flash-error','ERROR PERMISSIONS.');
    }
  }

  public function search(Request $request){
      $search = $request->get('search');
      $groups = Group::where('name','LIKE','%'.$search.'%')->paginate(10);
      return view('admin.groups.index', compact('groups'));
  }
}
