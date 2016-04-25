<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Services\EmailServiceInterface;
use App\Contracts\Services\RedirectServiceInterface;
use App\Contracts\Services\RegistrationServiceInterface;
use App\Http\Requests\SignupRequest;
use App\Services\LoggerService;
use Illuminate\Http\Request;
use Illuminate\Session;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class SignupController extends Controller
{

    /**
     * @var UserRepositoryInterface
     */
    private $repository;

    /**
     * @var RedirectServiceInterface
     */
    private $redirectService;

    /**
     * @param UserRepositoryInterface $userRepo
     */
    function __construct(UserRepositoryInterface $userRepo,RedirectServiceInterface $redirectService){
        $this->repository = $userRepo;
        $this->redirectService  =   $redirectService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.signup');
    }


    /**
     * Signs up New User to Our System.
     *
     * @param SignupRequest $request
     * @param RegistrationServiceInterface $registrationService
     * @param UserRepositoryInterface $userRepository
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function doSignup(SignupRequest $request, RegistrationServiceInterface $registrationService, EmailServiceInterface $emailService, UserRepositoryInterface $userRepository){
        try{
            $newRegisteredUser = $registrationService->registerUser($request->all(),$userRepository);

            $emailService->sendWelcomeEmail($newRegisteredUser);

            $messageLangKey = 'auth.welcome';

            return $this->redirectService->redirectToSignup("successMessage",$messageLangKey);
        }
        catch( Exception $e ){

            $logger = new LoggerService();

            $logger->logException($e,"emergency");
        }
    }

    /**
     * @return mixed
     */
    public function facebookSignup(){
        return Socialite::driver('facebook')->scopes([
            'public_profile',
            'email',
            'user_about_me',
            'user_birthday',
            'user_hometown',
            'user_location',
            'user_website',
            'manage_pages',
            'publish_pages'
        ])->redirect();
    }

    /**
     *
     */
    public function facebookCallback(){
        $user = Socialite::driver('facebook')->user();

        return dd($user);
    }

    /**
     * redirect to twitter Oauth url
     *
     * @return mixed
     */
    public function twitterSignup(){
        return Socialite::driver('twitter')->redirect();
    }

    /**
     *  Twitter callback handler
     *
     */
    public function twitterCallback(){
        $user = Socialite::driver('twitter')->user();

        return dd($user);
    }

    public function activate($code){

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
