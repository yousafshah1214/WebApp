<?php

namespace App\Contracts\Services;


use App\Contracts\Repositories\SocialUserRepositoryInterface;
use App\Contracts\Repositories\UserProfileRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;

interface RegistrationServiceInterface extends BaseServiceInterface
{
    /**
     * Creates New User in Database using UserRepository via Signup form
     *
     * @param $type
     * @param array $columns
     * @param UserRepositoryInterface $userRepository
     * @param UserProfileRepositoryInterface $profileRepository
     * @param SocialUserRepositoryInterface|null $socialUserRepository
     * @return mixed
     */
    public function registerUser($type, array $columns, UserRepositoryInterface $userRepository, UserProfileRepositoryInterface $profileRepository, SocialUserRepositoryInterface $socialUserRepository = null);

    /**
     * Activates User with Given Code.
     *
     * @param $code
     * @param UserRepositoryInterface $userRepository
     * @return mixed
     */
    public function activateUser($code, UserRepositoryInterface $userRepository);
}