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
     * Create New User in Database using UserRepository via signup with Facebook
     *
     * @param array $columns
     * @param UserRepositoryInterface $userRepository
     * @param UserProfileRepositoryInterface $profileRepository
     * @return mixed
     */
    public function registerFacebookUser(array $columns, UserRepositoryInterface $userRepository, UserProfileRepositoryInterface $profileRepository);
}