<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\PerguruanTinggi;

class RegisterPesertaController extends Controller
{
    public function register(PerguruanTinggi $perguruan_tinggi)
    {
        $perguruan_tinggis = $perguruan_tinggi->getPtAktif();

        return view('register-peserta', compact('perguruan_tinggis'));
    }

    public function postRegister(Request $request)
    {
        // $perguruan_tinggis = $perguruan_tinggi->getPtAktif();

        echo "<pre>";
            print_r($request->all());
        echo "</pre>";
        exit();

        // return view('register-peserta', compact('perguruan_tinggis'));
    }
}
