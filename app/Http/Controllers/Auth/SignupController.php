<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Repositories\SocialUserRepositoryInterface;
use App\Contracts\Repositories\UserProfileRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Services\DataExtractorServiceInterface;
use App\Contracts\Services\EmailServiceInterface;
use App\Contracts\Services\ExtraValidationServiceInterface;
use App\Contracts\Services\LoggerServiceInterface;
use App\Contracts\Services\RedirectServiceInterface;
use App\Contracts\Services\RegistrationServiceInterface;
use App\Http\Requests\SignupRequest;
use Exception;
use GuzzleHttp\Exception\ClientException;
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
    private $redirect;

    /**
     * @var LoggerServiceInterface
     */
    private $logger;

    /**
     * @var EmailServiceInterface
     */
    private $mailer;

    /**
     * @var DataExtractorServiceInterface
    */
    private $extractor;

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
     * @param DataExtractorServiceInterface $extractor
     * @param UserProfileRepositoryInterface $profileRepository
     * @param SocialUserRepositoryInterface $socialUser
     */
    function __construct(UserRepositoryInterface $userRepo,RedirectServiceInterface $redirectService,LoggerServiceInterface $logger, EmailServiceInterface $mailer, DataExtractorServiceInterface $extractor , UserProfileRepositoryInterface $profileRepository, SocialUserRepositoryInterface $socialUser ){

        /** UserRepository instance */
        $this->repository = $userRepo;

        /** RedirectService instance */
        $this->redirect  =   $redirectService;

        /** LoggerService instance */
        $this->logger   =   $logger;

        /** Email Service instance */
        $this->mailer   =   $mailer;

        /** Data Extractor Service Instance */
        $this->extractor = $extractor;

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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('auth.signup');
    }

    /**
     * Store a newly created resource|user in storage.
     *
     * @param SignupRequest $request
     * @param RegistrationServiceInterface $registrationService
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(SignupRequest $request, RegistrationServiceInterface $registrationService){

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
     * @param ExtraValidationServiceInterface $extraValidations
     * @return mixed
     */
    public function facebookCallback(RegistrationServiceInterface $registrationService, ExtraValidationServiceInterface $extraValidations){
        try{
            $user = Socialite::driver('facebook')->user();
            $type = 'facebook';
            $columns = $this->extractor->getFacebookDetails($user,$type);
            $this->SetGenderIfFetchFromSocial($user, $columns);
            if($extraValidations->EmailExistsOrNot($user->email,$this->profileRepository)){
                /** True if Email Exists */
                $messageLangKey = 'auth.social.emailExists';
                return $this->redirect->toSignup("failureMessage",$messageLangKey);
            }
            $newRegisteredUser = $registrationService->registerUser($type,$columns,$this->repository,$this->profileRepository,$this->socialRepository);
            $this->mailer->sendWelcomeEmail($newRegisteredUser);
            $messageLangKey = 'auth.welcome';
            return $this->redirect->toSignup("successMessage",$messageLangKey);
        }
        catch(ClientException $e){
            $messageLangKey = 'auth.socialError';
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
     * @param RegistrationServiceInterface $registrationService
     * @param ExtraValidationServiceInterface $extraValidations
     * @return mixed
     */
    public function twitterCallback(RegistrationServiceInterface $registrationService, ExtraValidationServiceInterface $extraValidations){
        try{
            $user = Socialite::driver('twitter')->user();
            $type = 'twitter';
            $columns = $this->extractor->getTwitterDetails($user,$type);
            $this->SetGenderIfFetchFromSocial($user, $columns);
//            if($extraValidations->EmailExistsOrNot($user->email,$this->profileRepository)){
//                /** True if Email Exists */
//                $messageLangKey = 'auth.social.emailExists';
//                return $this->redirect->toSignup("failureMessage",$messageLangKey);
//            }
            if($extraValidations->UsernameExistsOrNot($user->nickname, $this->repository )){
                /** True if Username Exists */
                $messageLangKey = 'auth.social.usernameExists';
                return $this->redirect->toSignup("failureMessage",$messageLangKey);
            }
            $newRegisteredUser = $registrationService->registerUser($type,$columns,$this->repository,$this->profileRepository,$this->socialRepository);
            $this->mailer->sendWelcomeEmail($newRegisteredUser);
            $messageLangKey = 'auth.welcome';
            return $this->redirect->toSignup("successMessage",$messageLangKey);
        }
        catch(ClientException $e){
            $messageLangKey = 'auth.socialError';
            return $this->redirect->toSignup("successMessage",$messageLangKey);
        }
        catch(Exception $e){
            $this->logger->logException($e,"emergency");
        }
        $messageLangKey = 'auth.error';
        return $this->redirect->toSignup("failureMessage",$messageLangKey);
    }

    public function activate($code){

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

    /**
     * Set gender to data array if it is set in $user object of Socialite
     *
     * @param $user
     * @param $columns
     */
    private function SetGenderIfFetchFromSocial($user, $columns)
    {
        if (isset($user->user["gender"])) {
            array_add($columns, "gender", ($user->user["gender"] == "male") ? true : false);
        }
    }
}
