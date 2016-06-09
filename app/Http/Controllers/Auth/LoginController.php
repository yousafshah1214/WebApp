<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Services\LoggerServiceInterface;
use App\Contracts\Services\RedirectServiceInterface;
use App\Http\Requests\LoginRequest;
use App\User;
use Exception;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{

    /**
     * @var UserRepositoryInterface
     */
    private $repo;

    /**
     * @var LoggerServiceInterface
     */
    private $logger;

    /**
     * @var RedirectServiceInterface
     */
    private $redirect;

    /**
     * LoginController constructor.
     *
     * @param UserRepositoryInterface $userRepo
     * @param LoggerServiceInterface $logger
     * @param RedirectServiceInterface $redirect
     */
    function __construct(UserRepositoryInterface $userRepo, LoggerServiceInterface $logger, RedirectServiceInterface $redirect)
    {
        $this->repo = $userRepo;

        $this->logger = $logger;

        $this->redirect = $redirect;
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
     * @param RedirectServiceInterface $redirect
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     * @internal param RedirectServiceInterface $redirect
     */
    public function doLogin(LoginRequest $request, RedirectServiceInterface $redirect){

        try{
            $credentials = array(
                'username'  =>  $request->input('username'),
                'password'  =>  $request->input('password')
            );

            if(Auth::attempt($credentials)){

                if($request->ajax()){
                    $langKey = "auth.loginSuccess";
                    return $this->ResponseToAjaxRequest(true,$langKey);
                }

                return redirect()->intended('dashboard');
            }
            else if($request->ajax()){
                $langKey = "auth.loginError";
                return $this->ResponseToAjaxRequest(false,$langKey);
            }
            else {
                $langKey = "auth.loginError";
                return $redirect->toLogin("failureMessage",$langKey);
            }
        }
        catch(Exception $e){
            $this->logger->logException($e,'urgent');
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

    /**
     * @param RedirectServiceInterface $redirect
     * @return mixed
     */
    public function logout(RedirectServiceInterface $redirect){
        try{
            if(Auth::check()){
                Auth::logout();
                $langKey = "auth.logoutSuccess";
                return $redirect->toHome("successMessage",$langKey);
            }

            return $redirect->toPreviousPage();
        }
        catch(Exception $e){
            $this->logger->logException($e,'urgent');
        }
    }

    /**
     * @param $status
     * @param $messageLangKey
     * @return array
     * @throws Exception
     */
    private function ResponseToAjaxRequest($status, $messageLangKey)
    {
        try{
            return array('status' => $status, 'message' => trans($messageLangKey));
        }
        catch(Exception $e){
            throw $e;
        }
    }
}
