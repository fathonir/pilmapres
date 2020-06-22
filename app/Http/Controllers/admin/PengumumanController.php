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

        if (($user) && ($user->hasAnyRole('Index Pengumuman'))) {

            $pengumumans = Pengumuman::orderBy('pengumuman.created_at', 'desc')
                ->leftJoin('category_pengumuman', 'category_pengumuman.id', '=', 'pengumuman.kategori_pengumuman')
                ->leftJoin('users', 'users.id', '=', 'pengumuman.user_id')
                ->select(
                    'pengumuman.id',
                    'pengumuman.judul',
                    'pengumuman.deskripsi',
                    'pengumuman.file',
                    'category_pengumuman.nama',
                    'users.name'
                )
                ->get();
            return view('admin.pengumuman.list', array('pengumumans' => $pengumumans, 'user' => $user));

        } else {
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

        if (($user) && ($user->hasAnyRole('Create Pengumuman'))) {

            $kategori_pengumuman = CategoryPengumuman::pluck('nama', 'id');
            return View::make('admin.pengumuman.create', compact('kategori_pengumuman', 'user'));

        } else {
            // flash()->overlay('Anda tidak bisa melihat halaman ini. Silahkan login sebagai Mahasiswa!', 'Perhatian!')->error();
            return Redirect::action('HomeController@blockAkses');
        }
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $pengumuman = new Pengumuman();
        $pengumuman->user_id = $user->id;
        $pengumuman->judul = Input::get('judul');
        $pengumuman->deskripsi = Input::get('deskripsi');
        $pengumuman->kategori_pengumuman = Input::get('id');

        if ($request->hasFile('file')) {

            $img = $request->file('file');
            $imageName = time() . '.' . $img->getClientOriginalExtension();

            // Create Thumbnail
            $destinationPath = public_path('images/pengumuman/thumbs');

            if (!File::exists($destinationPath)) {
                if (File::makeDirectory($destinationPath, 0777, true)) {
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");
                }
            }

            $image = Image::make($img->getRealPath());
            $image->fit(200, 200);
            $image->save($destinationPath . '/' . $imageName);

            // Original
            $destinationPath = public_path('images/pengumuman');
            $encodedImg = Image::make($img)->encode('jpg', 50);
            $encodedImg->save($destinationPath . '/' . $imageName);

            // Save image name
            $pengumuman->file = $imageName;
        }

        $pengumuman->save();

        return Redirect::action('admin\PengumumanController@index');
    }

    public function show($id)
    {
        $user = Auth::user();

        if (($user) && ($user->hasAnyRole('Show Pengumuman'))) {

            $pengumuman = Pengumuman::where('pengumuman.id', $id)
                ->leftJoin('category_pengumuman', 'category_pengumuman.id', '=', 'pengumuman.kategori_pengumuman')
                ->leftJoin('users', 'users.id', '=', 'pengumuman.user_id')
                ->select(
                    'pengumuman.id',
                    'pengumuman.judul',
                    'pengumuman.deskripsi',
                    'pengumuman.file',
                    'category_pengumuman.nama',
                    'pengumuman.kategori_pengumuman',
                    'users.name')
                ->firstOrFail();
            return view('admin.pengumuman.show', compact('pengumuman'), array('user' => $user));

        } else {
            // flash()->overlay('Anda tidak bisa melihat halaman ini. Silahkan login sebagai Mahasiswa!', 'Perhatian!')->error();
            return Redirect::action('HomeController@blockAkses');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $user = Auth::user();

        if (($user) && ($user->hasAnyRole('Edit Pengumuman'))) {

            $kategori_pengumuman = CategoryPengumuman::pluck('nama', 'id');
            $pengumumans = Pengumuman::where('pengumuman.id', $id)
                ->leftJoin('category_pengumuman', 'category_pengumuman.id', '=', 'pengumuman.kategori_pengumuman')
                ->leftJoin('users', 'users.id', '=', 'pengumuman.user_id')
                ->select(
                    'pengumuman.id as id_pengumuman',
                    'pengumuman.judul',
                    'pengumuman.deskripsi',
                    'pengumuman.file',
                    'category_pengumuman.nama',
                    'category_pengumuman.id',
                    'pengumuman.kategori_pengumuman',
                    'users.name'
                )->firstOrFail();
            return view('admin.pengumuman.edit', compact('pengumumans', 'kategori_pengumuman'), array('user' => $user));

        } else {
            // flash()->overlay('Anda tidak bisa melihat halaman ini. Silahkan login sebagai Mahasiswa!', 'Perhatian!')->error();
            return Redirect::action('HomeController@blockAkses');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $pengumumans = Pengumuman::findOrFail($id);
        $pengumumans->user_id = $user->id;
        $pengumumans->judul = Input::get('judul');
        $pengumumans->deskripsi = Input::get('deskripsi');
        $pengumumans->kategori_pengumuman = Input::get('id');

        $img = $request->file('file');
        $imageName = time() . '.' . $img->getClientOriginalExtension();

        //thumbs
        $destinationPath = public_path('images/pengumuman/thumbs');
        if (!File::exists($destinationPath)) {
            if (File::makeDirectory($destinationPath, 0777, true)) {
                throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");
            }
        }
        $image = Image::make($img->getRealPath());
        $image->fit(200, 200);
        $image->save($destinationPath . '/' . $imageName);

        //original
        $destinationPath = public_path('images/pengumuman');
        $img = Image::make($img)->encode('jpg', 50);
        $img->save($destinationPath . '/' . $imageName);
        //save data image to db
        $pengumumans->file = $imageName;

        $pengumumans->save();
        return Redirect::action('admin\PengumumanController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
        $user = Auth::user();
        $search = $request->get('search');
        $pengumumans = Pengumuman::where('pengumuman.judul', 'LIKE', '%' . $search . '%')
            ->orWhere('pengumuman.deskripsi', 'LIKE', '%' . $search . '%')
            ->orWhere('category_pengumuman.nama', 'LIKE', '%' . $search . '%')
            ->leftJoin('category_pengumuman', 'category_pengumuman.id', '=', 'pengumuman.kategori_pengumuman')
            ->leftJoin('users', 'users.id', '=', 'pengumuman.user_id')
            ->select(
                'pengumuman.id',
                'pengumuman.judul',
                'pengumuman.deskripsi',
                'pengumuman.file',
                'category_pengumuman.nama',
                'users.name'
            )->get();
        return view('admin.pengumuman.list', compact('pengumumans'), array('user' => $user));
    }
}
