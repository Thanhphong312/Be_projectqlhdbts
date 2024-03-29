<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;


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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function getLogin(){
        $title = 'login';
        return view('auth.login',compact('title'));
    }

    public function postLogin(Request $request)
{
    $credentials = $this->getCredentials($request);

    $user = Auth::getProvider()->retrieveByCredentials($credentials);
    // dd($user);

    // Authenticate the user
    if (Auth::attempt(['email'=>'admin@gmail.com','password'=>$request->Password],$request->get('remember'))) {
        return redirect()->route('home');
    } else {
        return redirect()->to('login')
                ->withErrors(trans('app.login-false'));
    }
}


    public function getCredentials(Request $request)
    {
        return [
            'email' => $request->Email,
            'password' => $request->Password
        ];
    }
}
