<?php

namespace App\Services;


use App\Contracts\Repositories\UserProfileRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Services\RegistrationServiceInterface;
use Exception;

class RegistrationService extends BaseService implements RegistrationServiceInterface
{
    /**
     *
     *
     * @param $type
     * @param array $columns
     * @param UserRepositoryInterface $userRepository
     * @param UserProfileRepositoryInterface $userProfileRepository
     * @return mixed User Model
     */
    public function registerUser($type, array $columns,UserRepositoryInterface $userRepository, UserProfileRepositoryInterface $userProfileRepository)
    {
        $userRepository->create($columns, $type);

        $profile = $userProfileRepository->make($columns,$type);

        $userRepository->attachProfile($profile);

        return $userRepository->getUser($userRepository->getInsertedUserId());
    }

    /**
     * Create New User in Database using UserRepository via signup with Facebook
     *
     * @param array $columns
     * @param UserRepositoryInterface $userRepository
     * @param UserProfileRepositoryInterface $profileRepository
     * @return mixed|void
     */
    public function registerFacebookUser(array $columns, UserRepositoryInterface $userRepository, UserProfileRepositoryInterface $profileRepository)
    {

    }

}