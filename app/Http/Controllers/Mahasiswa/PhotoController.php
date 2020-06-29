<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class PhotoController extends Controller
{
    public function index()
    {
        $mahasiswa = Auth::user()->mahasiswa;

        $photoExist = ($mahasiswa->photo != null);
        $photoUrl = url(env('PHOTO_MAHASISWA_PATH') . '/' . $mahasiswa->photo);

        return view('mahasiswa.photo.index', compact('photoExist', 'photoUrl'));
    }

    public function store(Request $request)
    {
        // Validator
        $validator = Validator::make($request->all(), [
            'photo' => 'required|mimetypes:image/jpeg|max:1024'
        ]);

        if ($validator->fails()) {
            return redirect('mahasiswa/photo')->withErrors($validator);
        }

        $destPath = env('PHOTO_MAHASISWA_PATH');

        // Buat folder-nya jika belum ada
        if ( ! File::exists($destPath)) {
            if ( ! File::makeDirectory($destPath, 777, true)) {
                return "Unable to upload. Make sure {$destPath} is writeable.";
            }
        }

        /** @var Mahasiswa $mahasiswa */
        $mahasiswa = Auth::user()->mahasiswa;

        // rename file
        $filePhoto = $request->file('photo');
        $destFile =
            $mahasiswa->perguruanTinggi->kode_pt . '-' . trim($mahasiswa->nim) .
            '.' . strtolower($filePhoto->getClientOriginalExtension());
        $mahasiswa->photo = $destFile;

        // Memastikan tersave ke DB baru pindah file-nya
        if ($mahasiswa->save()) {
            $filePhoto->move($destPath, $destFile);
        }

        return redirect('mahasiswa/photo')->with('uploadSuccess', true);
    }
}
