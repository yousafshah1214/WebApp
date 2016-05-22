<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Repositories\SocialUserRepositoryInterface;
use App\Contracts\Repositories\UserProfileRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Services\AuthenticationServiceInterface;
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

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
            if($request->ajax()){
                return $this->ResponseToAjaxRequest('true',$messageLangKey);
            }
            return $this->redirect->toSignup("successMessage",$messageLangKey);
        }
        catch( Exception $e ){
            $this->logger->logException($e,"emergency");
        }
        $messageLangKey = 'auth.error';
        if($request->ajax()){
            return $this->ResponseToAjaxRequest('false',$messageLangKey);
        }
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
            'publish_pages',
        ])->redirect();
    }

    /**
     * Callback function for facebook oAuth api
     * @param Request $request
     * @param RegistrationServiceInterface $registrationService
     * @param ExtraValidationServiceInterface $extraValidations
     * @param AuthenticationServiceInterface $authService
     * @return mixed
     */
    public function facebookCallback(Request $request ,RegistrationServiceInterface $registrationService, ExtraValidationServiceInterface $extraValidations, AuthenticationServiceInterface $authService){
        try{
            $user = Socialite::driver('facebook')->user();
            $type = 'facebook';
            /**
             * logs in Social User if it already signed up before.
             */
            if($authService->loginSocialUserIfExists($type,$user,$this->socialRepository)){
                /**
                 * This function loginSocialUserIfExists return true if user exists
                 * false if user does not exists
                 */
                $userModel = $authService->returnUserObjFromSocial($type,$user,$this->socialRepository);
                Auth::login($userModel);
                return $this->redirect->toDashboard();
            }
            else if (Session::get('facebookLogin')){
                // request is from login page. show proper error message to user.
                $messageLangKey = 'auth.alreadySignedUp';
                return $this->redirect->toLogin("failureMessage",$messageLangKey);
            }
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
    public function twitterCallback(RegistrationServiceInterface $registrationService, ExtraValidationServiceInterface $extraValidations, AuthenticationServiceInterface $authService){
        try{
            $user = Socialite::driver('twitter')->user();
            $type = 'twitter';
            /**
             * logs in Social User if it already signed up before.
             */
            if($authService->loginSocialUserIfExists($type,$user,$this->socialRepository)){
                /**
                 * This function loginSocialUserIfExists return true if user exists
                 * false if user does not exists
                 */
                $userModel = $authService->returnUserObjFromSocial($type,$user,$this->socialRepository);
                Auth::login($userModel);
                return $this->redirect->toDashboard();
            }
            else if (Session::get('twitterLogin')){
                // request is from login page. show proper error message to user.
                $messageLangKey = 'auth.alreadySignedUp';
                return $this->redirect->toLogin("failureMessage",$messageLangKey);
            }
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
            $this->logger->logException($e,"Exception in User Registration");

            $messageLangKey = 'auth.error';
            return $this->redirect->toSignup("failureMessage",$messageLangKey);
        }
    }

    public function activate($code,RegistrationServiceInterface $registrationService){
        try{
            $registrationService->activateUser($code,$this->repository);

            $messageLangKey = 'auth.activated';
            return $this->redirect->toSignup("successMessage",$messageLangKey);
        }
        catch(Exception $e){
            $this->logger->logException($e,"Exception in User Activation");
            $messageLangKey = 'auth.activationError';
            return $this->redirect->toPreviousPage("failureMessage",$messageLangKey);
        }
    }

    /**
     * Set gender to data array if it is set in $user object of Socialite
     *
     * @param $user
     * @param $columns
     * @throws Exception
     */
    private function SetGenderIfFetchFromSocial($user, $columns)
    {
        try{
            if (isset($user->user["gender"])) {
                array_add($columns, "gender", ($user->user["gender"] == "male") ? true : false);
            }
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * @param $status
     * @param $messageLangKey
     * @return array
     * @throws Exception
     */
    private function ResponseToAjaxRequest($status,$messageLangKey)
    {
        try{
            return array('status' => $status, 'message' => trans($messageLangKey));
        }
        catch(Exception $e){
            throw $e;
        }
    }

}
