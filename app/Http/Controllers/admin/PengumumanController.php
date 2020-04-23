<?php

namespace App\Http\Controllers\admin;


use Auth;
use View;
use App\Pengumuman;
use App\CategoryPengumuman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use File;
use Image;

class PengumumanController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (($user)&&($user->hasAnyRole('Index Pengumuman'))) {

        $pengumumans = Pengumuman::orderBy('pengumumen.created_at', 'desc')
                     ->leftJoin('category_pengumuman', 'category_pengumuman.id', '=', 'pengumumen.kategori_pengumuman')
                     ->leftJoin('users', 'users.id', '=', 'pengumumen.user_id')
                     ->select(
                       'pengumumen.id',
                       'pengumumen.judul',
                       'pengumumen.deskripsi',
                       'pengumumen.file',
                       'category_pengumuman.nama',
                       'users.name'
                        )
                     ->get();
        // echo "<pre>";
        // print_r($pengumumans);
        // echo "</pre>";
        // exit();
        return view('admin.pengumuman.list',array('pengumumans'=>$pengumumans, 'user' => $user));

        }else{
            // flash()->overlay('Anda tidak bisa melihat halaman ini. Silahkan login sebagai Mahasiswa!', 'Perhatian!')->error();
        return Redirect::action('HomeController@blockAkses');
        }
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        if (($user)&&($user->hasAnyRole('Create Pengumuman'))) {

        $kategori_pengumuman    = CategoryPengumuman::pluck('nama', 'id');
        return View::make('admin.pengumuman.create', compact('kategori_pengumuman','user'));

        }else{
            // flash()->overlay('Anda tidak bisa melihat halaman ini. Silahkan login sebagai Mahasiswa!', 'Perhatian!')->error();
        return Redirect::action('HomeController@blockAkses');
        }
    }

    public function store(Request $request)
    {
    	// echo "<pre>";
     //    print_r($request->all());
     //    echo "</pre>";
     //    exit();
		$user = Auth::user();

        // store
        $pengumumans = new Pengumuman;
		$pengumumans ->user_id              = $user->id;
        $pengumumans ->judul    	        = Input::get('judul');
        $pengumumans ->deskripsi            = Input::get('deskripsi');
        $pengumumans ->kategori_pengumuman  = Input::get('id');

        $img = $request->file('file');
            $imageName = time().'.'.$img->getClientOriginalExtension();

            //thumbs
            $destinationPath = public_path('images/pengumuman/thumbs');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
              $image = Image::make($img->getRealPath());
              $image->fit(200, 200);
              $image->save($destinationPath.'/'.$imageName);

            //original
            $destinationPath = public_path('images/pengumuman');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $pengumumans->file = $imageName;

            $pengumumans->save();
            return Redirect::action('admin\PengumumanController@index');
        }

    public function show($id)
    {
        $user = Auth::user();

        if (($user)&&($user->hasAnyRole('Show Pengumuman'))) {

        $pengumuman = Pengumuman::where('pengumumen.id', $id)
                     ->leftJoin('category_pengumuman', 'category_pengumuman.id', '=', 'pengumumen.kategori_pengumuman')
                     ->leftJoin('users', 'users.id', '=', 'pengumumen.user_id')
                     ->select(
                       'pengumumen.id',
                       'pengumumen.judul',
                       'pengumumen.deskripsi',
                       'pengumumen.file',
                       'category_pengumuman.nama',
                       'pengumumen.kategori_pengumuman',
                       'users.name')   
                     ->firstOrFail();   
        return view('admin.pengumuman.show', compact('pengumuman'),array('user' => $user));

        }else{
            // flash()->overlay('Anda tidak bisa melihat halaman ini. Silahkan login sebagai Mahasiswa!', 'Perhatian!')->error();
        return Redirect::action('HomeController@blockAkses');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $user = Auth::user();

        if (($user)&&($user->hasAnyRole('Edit Pengumuman'))) {

        $kategori_pengumuman    = CategoryPengumuman::pluck('nama', 'id');
        $pengumumans = Pengumuman::where('pengumumen.id', $id)
                     ->leftJoin('category_pengumuman', 'category_pengumuman.id', '=', 'pengumumen.kategori_pengumuman')
                     ->leftJoin('users', 'users.id', '=', 'pengumumen.user_id')
                     ->select(
                       'pengumumen.id as id_pengumuman',
                       'pengumumen.judul',
                       'pengumumen.deskripsi',
                       'pengumumen.file',
                       'category_pengumuman.nama',
                       'category_pengumuman.id',
                       'pengumumen.kategori_pengumuman',
                       'users.name'
                        )->firstOrFail();   
        return view('admin.pengumuman.edit', compact('pengumumans','kategori_pengumuman'),array('user' => $user));

        }else{
            // flash()->overlay('Anda tidak bisa melihat halaman ini. Silahkan login sebagai Mahasiswa!', 'Perhatian!')->error();
        return Redirect::action('HomeController@blockAkses');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $pengumumans = Pengumuman::findOrFail($id); 
        $pengumumans ->user_id              = $user->id;
        $pengumumans ->judul    	        = Input::get('judul');
        $pengumumans ->deskripsi            = Input::get('deskripsi');
        $pengumumans ->kategori_pengumuman  = Input::get('id');

        $img = $request->file('file');
            $imageName = time().'.'.$img->getClientOriginalExtension();

            //thumbs
            $destinationPath = public_path('images/pengumuman/thumbs');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
              $image = Image::make($img->getRealPath());
              $image->fit(200, 200);
              $image->save($destinationPath.'/'.$imageName);

            //original
            $destinationPath = public_path('images/pengumuman');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $pengumumans->file = $imageName;

            $pengumumans->save();
            return Redirect::action('admin\PengumumanController@index');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $pengumuman = Pengumuman::where('id', $id)->firstOrFail();
        $pengumuman->delete();
        return Redirect::action('admin\PengumumanController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request){
        $user = Auth::user();
        $search = $request->get('search');
        $pengumumans = Pengumuman::where('pengumumen.judul','LIKE','%'.$search.'%')
                                  ->orWhere('pengumumen.deskripsi', 'LIKE', '%'.$search.'%')
                                  ->orWhere('category_pengumuman.nama', 'LIKE', '%'.$search.'%')
                                  ->leftJoin('category_pengumuman', 'category_pengumuman.id', '=', 'pengumumen.kategori_pengumuman')
                                  ->leftJoin('users', 'users.id', '=', 'pengumumen.user_id')
                                  ->select(
                                        'pengumumen.id',
                                        'pengumumen.judul',
                                        'pengumumen.deskripsi',
                                        'pengumumen.file',
                                        'category_pengumuman.nama',
                                        'users.name'
                                         )->get();
        return view('admin.pengumuman.list', compact('pengumumans'),array('user' => $user));
    }
}