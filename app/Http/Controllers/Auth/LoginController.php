<?php

namespace App\Http\Controllers\Auth;

use App\Group;
use App\UserGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Merubah login menggunakan username
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    public function login(Request $request)
    {
        $this->rules($request);

        $username = $request->input('username');
        $password = $request->input('password');

        if (Auth::attempt(['username' => $username, 'password' => $password])) {

            $user = Auth::user();
            $user_group = UserGroup::where('user_id', $user->id)->first();

            if ($user_group && $user->is_active) {
                if ($user_group->group_id === Group::ADMIN) {
                    return redirect('/admin');
                } elseif ($user_group->group_id === Group::MAHASISWA) {
                    return redirect('/mahasiswa/home');
                } elseif ($user_group->group_id === Group::JURI) {

                }
            } else {
                Auth::logout();
                return redirect('/login')->withErrors([
                    'failed_auth' => 'Anda tidak bisa melakukan login dengan account ini. ' .
                        'Silahkan hubungi administrator untuk informasi lebih lanjut.',
                ]);
            }
        }

        return redirect('/login')->withErrors([
            'failed_auth' => 'Login anda tidak ditemukan',
        ]);
    }

    public function rules($request)
    {
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
