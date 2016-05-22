<?php

namespace App\Services;


use App\Contracts\Repositories\SocialUserRepositoryInterface;
use App\Contracts\Services\AuthenticationServiceInterface;
use App\Contracts\Services\ExtraValidationServiceInterface;
use Exception;

class AuthenticationService extends BaseService implements AuthenticationServiceInterface
{

    /**
     * @var ExtraValidationServiceInterface
     */
    private $extraValidationService;

    /**
     * AuthenticationService constructor.
     * @param ExtraValidationServiceInterface $extraValidationService
     */
    function __construct(ExtraValidationServiceInterface $extraValidationService)
    {
        $this->extraValidationService = $extraValidationService;
    }

    /**
     * @param $type
     * @param $user
     * @param SocialUserRepositoryInterface $socialRepository
     * @return mixed
     * @throws Exception
     */
    public function loginSocialUserIfExists($type, $user, SocialUserRepositoryInterface $socialRepository)
    {
        try{
            /**
             * This function return true if user exists in database
             * False if User Doesn't Exists in database
             */
            $count = $socialRepository->socialUserCount($type,$user->id);

            if($count > 0){
                // true means user exists in database.
                return true;
            }

            return false;
        }
        catch(Exception $e ){
            throw $e;
        }
    }

    /**
     * Return User Model Obj from Socialite User.
     *
     * @param $type
     * @param $user
     * @param SocialUserRepositoryInterface $socialUserRepository
     * @return mixed
     * @throws Exception
     */
    public function returnUserObjFromSocial($type, $user, SocialUserRepositoryInterface $socialUserRepository)
    {
        try{
            $user = $socialUserRepository->getUserFromSocialite($type,$user->id);

            return $user;
        }
        catch(Exception $e){
            throw $e;
        }
    }


}