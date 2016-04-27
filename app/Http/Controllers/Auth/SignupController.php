<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Repositories\SocialUserRepositoryInterface;
use App\Contracts\Repositories\UserProfileRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Services\EmailServiceInterface;
use App\Contracts\Services\LoggerServiceInterface;
use App\Contracts\Services\RedirectServiceInterface;
use App\Contracts\Services\RegistrationServiceInterface;
use App\Http\Requests\SignupRequest;
use Exception;
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
     * @var LoggerServiceInterface
     */
    private $logger;

    /**
     * @var EmailServiceInterface
     */
    private $mailer;

    /**
     * @var UserProfileRepositoryInterface
     */
    private $profileRepository;

    /**
     * @var SocialUserRepositoryInterface
     */
    private $socialRepository;

    /**
     * @param UserRepositoryInterface $userRepo
     * @param RedirectServiceInterface $redirectService
     * @param LoggerServiceInterface $logger
     * @param EmailServiceInterface $mailer
     * @param UserProfileRepositoryInterface $profileRepository
     */
    function __construct(UserRepositoryInterface $userRepo,RedirectServiceInterface $redirectService,LoggerServiceInterface $logger, EmailServiceInterface $mailer, UserProfileRepositoryInterface $profileRepository, SocialUserRepositoryInterface $socialUser ){

        /** UserRepository instance */
        $this->repository = $userRepo;

        /** RedirectService instance */
        $this->redirect  =   $redirectService;

        /** LoggerService instance */
        $this->logger   =   $logger;

        /** Email Service instance */
        $this->mailer   =   $mailer;

        /** UserProfileRepository instance */
        $this->profileRepository    =   $profileRepository;

        /** SocialUserRepository instance */
        $this->socialRepository = $socialUser;
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
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function doSignup(SignupRequest $request, RegistrationServiceInterface $registrationService){

        $type = 'form';

        try{
            $newRegisteredUser = $registrationService->registerUser($type,$request->all(),$this->repository,$this->profileRepository);
            $this->mailer->sendWelcomeEmail($newRegisteredUser);
            $messageLangKey = 'auth.welcome';
            return $this->redirect->toSignup("successMessage",$messageLangKey);
        }
        catch( Exception $e ){
            $this->logger->logException($e,"emergency");
        }
        $messageLangKey = 'auth.error';
        return $this->redirect->toSignup("failureMessage",$messageLangKey);
    }

    /**
     * redirects user to facebook oAuth api
     *
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
     * Callback function for facebook oAuth api
     * @param RegistrationServiceInterface $registrationService
     * @return mixed
     */
    public function facebookCallback(RegistrationServiceInterface $registrationService){

        $user = Socialite::driver('facebook')->user();

        $type = 'facebook';

//        dd($user->user);

        $columns = array(
            'social'    =>  true,
            'active'    =>  true,
            'username'  =>  implode("",explode(" ",$user->name)),
            'email'     =>  $user->email,
            'name'      =>  $user->name,
            'provider'  =>  $type,
            'token'     =>  $user->token,
        );

        if(isset($user->user["gender"])){

            array_add($columns,"gender", ($user->user["gender"] == "male")? true : false );

        }

        try{
            $newRegisteredUser = $registrationService->registerUser($type,$columns,$this->repository,$this->profileRepository,$this->socialRepository);

            $this->mailer->sendWelcomeEmail($newRegisteredUser);

            $messageLangKey = 'auth.welcome';

            return $this->redirect->toSignup("successMessage",$messageLangKey);
        }
        catch(Exception $e){

            $this->logger->logException($e,"emergency");
        }

        $messageLangKey = 'auth.error';
        return $this->redirect->toSignup("failureMessage",$messageLangKey);
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
