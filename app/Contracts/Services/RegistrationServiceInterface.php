<?php

namespace App\Contracts\Services;


use App\Contracts\Repositories\UserProfileRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;

interface RegistrationServiceInterface extends BaseServiceInterface
{
    /**
     * Creates New User in Database using UserRepository via Signup form
     *
     * @param array $columns
     * @param UserRepositoryInterface $userRepository
     * @return mixed
     */
    public function registerUser($type, array $columns, UserRepositoryInterface $userRepository, UserProfileRepositoryInterface $profileRepository);

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