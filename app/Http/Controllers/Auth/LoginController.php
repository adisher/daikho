<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function username()
    {
        return 'username';
    }

    public function login(Request $request)
    {

        $input = $request->all();

        $this->validate($request, [

            'username' => 'required',

            'password' => 'required',

        ]);
        $pas = $request->password;
        
        $user = DB::select('select * from admin_users where username="' . $request->username . '"');
        
        // return $user[0]->password;
        if ($user) {
            if (($user[0]->password == $pas) && ($user[0]->username == $request->username)) {
                \Auth::loginUsingId($user[0]->id);

                return redirect()->route('home');
            } else {
                return redirect()->route('login')

                    ->with('error', 'Password or Username Is Wrong.');
            }

        } else {

            return redirect()->route('login')

                ->with('error', 'User Not Found.');

        }

    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
