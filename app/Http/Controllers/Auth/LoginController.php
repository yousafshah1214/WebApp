<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{

    /**
     * @var UserRepositoryInterface
     */
    private $repo;

    /**
     * LoginController constructor.
     *
     * @param UserRepositoryInterface $userRepo
     */
    function __construct(UserRepositoryInterface $userRepo)
    {
        $this->repo = $userRepo;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Login User to Our System
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function doLogin(LoginRequest $request){
        if(Auth::attempt(['username'    =>  $request->input('username'),    'password'      =>  $request->input('password'),    'active'    =>  1])){
            return redirect()->intended('dsahboard');
        }
    }

    /**
     * Redirect to facebook login and get user info
     *
     * @return mixed
     */
    public function facebookLogin(){
        Session::flash('facebookLogin',true);
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Redirect to twitter login and get user info
     *
     * @return mixed
     */
    public function twitterLogin()
    {
        Session::flash('twitterLogin',true);
        return Socialite::driver('twitter')->redirect();
    }

}
