<?php

namespace App\Http\Controllers\Auth;

use Alert;
use App\UserGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    public function login(Request $request)
    {
        $this->rules($request);
        $field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $request->merge([$field => $request->input('email')]);

        if (Auth::attempt($request->only($field, 'password'))) {
            $user = Auth::user();
            $user_group = UserGroup::where('user_id', $user->id)->first();

            if ($user_group && $user->active) {

                if ($user_group->group_id === 1) {
                    return redirect('/admin');
                } elseif ($user_group->group_id === 2) {

                    return redirect('/dashboard-finalis');
                } elseif ($user_group->group_id === 3) {
                    echo "<pre>";
                    print_r('Juri Login');
                    echo "</pre>";
                    exit();
                    // return redirect('/admin-dashboard');
                }
            } else {
                // Alert::success('Anda tidak bisa melakukan login dengan account ini! silahkan hubungi administrator untuk informasi lebih lanjut.', 'Kesalahan!')->persistent("Tutup");
                Auth::logout();
                // return redirect('/login');
                return redirect('/login')->withErrors([
                    'failed_auth' => 'Anda tidak bisa melakukan login dengan account ini! silahkan hubungi administrator untuk informasi lebih lanjut.',
                ]);
            }
        }

        return redirect('/login')->withErrors([
            'failed_auth' => 'These credentials do not match our records.',
        ]);
    }

    public function rules($request)
    {
        $this->validate($request, [
            'email' => 'required|string',
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
