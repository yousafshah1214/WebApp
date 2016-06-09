<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Repositories\UserProfileRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Services\ExtraValidationServiceInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

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
     * @param Request $request
     * @return string
     */
    public function checkUsername(Request $request){

        $validator = Validator::make($request->all(),[
            'username'     =>  'required|unique:users,username|min:6'
        ]);

        if($validator->fails()){
            // validation fails.
            return "unavailable";
        }
        return "available";
    }

    /**
     * @param Request $request
     * @return string
     */
    public function checkEmail(Request $request){
        $validator = Validator::make($request->all(),[
            'email'     =>  'required|email|unique:user_profiles,email|min:6'
        ]);

        if($validator->fails()){
            return "unavailable";
        }
        return "available";
    }
}
