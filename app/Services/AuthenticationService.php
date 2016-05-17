<?php

namespace App\Services;


use App\Contracts\Repositories\SocialUserRepositoryInterface;
use App\Contracts\Services\AuthenticationServiceInterface;
use App\Contracts\Services\ExtraValidationServiceInterface;

class AuthenticationService extends BaseService implements AuthenticationServiceInterface
{

    private $extraValidationService;

    function __construct(ExtraValidationServiceInterface $extraValidationService)
    {
        $this->extraValidationService = $extraValidationService;
    }

    /**
     * @param $type
     * @param $user
     * @param SocialUserRepositoryInterface $socialRepository
     * @return mixed
     */
    public function loginSocialUserIfExists($type, $user, SocialUserRepositoryInterface $socialRepository)
    {
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

    /**
     * Return User Model Obj from Socialite User.
     *
     * @param $type
     * @param $user
     * @param SocialUserRepositoryInterface $socialUserRepository
     * @return mixed
     */
    public function returnUserObjFromSocial($type, $user, SocialUserRepositoryInterface $socialUserRepository)
    {
        $user = $socialUserRepository->getUserFromSocialite($type,$user->id);

        return $user;
    }


}