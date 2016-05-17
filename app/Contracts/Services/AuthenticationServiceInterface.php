<?php

namespace App\Contracts\Services;


use App\Contracts\Repositories\SocialUserRepositoryInterface;

/**
 * Interface AuthenticationServiceInterface
 * @package App\Contracts\Services
 */
interface AuthenticationServiceInterface extends BaseServiceInterface
{
    /**
     * Check weather a social user already registered or not
     *
     * @param $type
     * @param $user
     * @param SocialUserRepositoryInterface $socialRepository
     * @return bool
     */
    public function loginSocialUserIfExists($type, $user, SocialUserRepositoryInterface $socialRepository);

    /**
     * Return User Model Obj from Socialite User.
     *
     * @param $type
     * @param $user
     * @param SocialUserRepositoryInterface $socialUserRepository
     * @return mixed
     */
    public function returnUserObjFromSocial($type, $user, SocialUserRepositoryInterface $socialUserRepository);
}