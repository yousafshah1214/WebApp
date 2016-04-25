<?php

namespace App\Services;


use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Services\RegistrationServiceInterface;
use Exception;

class RegistrationService extends BaseService implements RegistrationServiceInterface
{
    /**
     * Register New User to Repository
     *
     * @param array $columns
     * @param UserRepositoryInterface $userRepository
     * @return mixed User Model
     * @throws Exception
     */
    public function registerUser(array $columns,UserRepositoryInterface $userRepository)
    {
        $userRepository->create($columns);

        return $userRepository->getUser($userRepository->getInsertedUserId());
    }
}