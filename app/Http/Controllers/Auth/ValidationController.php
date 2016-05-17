<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Repositories\UserProfileRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Services\ExtraValidationServiceInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ValidationController extends Controller
{

    /**
     * @var UserRepositoryInterface
     */
    private $userRepo;

    /**
     * @var UserProfileRepositoryInterface
     */
    private $userProfileRepo;

    /**
     * @var ExtraValidationServiceInterface
     */
    private $extraValidatorService;

    /**
     * ValidationController constructor.
     * @param UserRepositoryInterface $userRepo
     * @param UserProfileRepositoryInterface $userProfileRepo
     * @param ExtraValidationServiceInterface $extraValidatorService
     */
    function __construct(UserRepositoryInterface $userRepo, UserProfileRepositoryInterface $userProfileRepo, ExtraValidationServiceInterface $extraValidatorService)
    {
        $this->userRepo = $userRepo;
        $this->userProfileRepo = $userProfileRepo;
        $this->extraValidatorService = $extraValidatorService;
    }

    /**
     * @return string
     */
    public function checkUsername(){
        $username = Input::get('username');

        if(strlen($username) > 0){
            $count = $this->extraValidatorService->UsernameExistsOrNot($username,$this->userRepo);

            if($count > 0){
                return "unavailable";
            }
            return "available";
        }
        return null;
    }

    /**
     * @return string
     */
    public function checkEmail(){
        $email = Input::get('email');

        if(strlen($email) > 0){
            $count = $this->extraValidatorService->EmailExistsOrNot($email,$this->userProfileRepo);

            if($count > 0){
                return "unavailable";
            }
            return "available";
        }
        return null;
    }
}
