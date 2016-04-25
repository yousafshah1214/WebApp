<?php

namespace App\Contracts\Services;


use App\Contracts\Repositories\UserRepositoryInterface;

interface RegistrationServiceInterface extends BaseServiceInterface
{
    /**
     * Creates New User in Database via User Repository
     *
     * @param array $columns
     * @param UserRepositoryInterface $userRepository
     * @return mixed
     */
    public function registerUser(array $columns, UserRepositoryInterface $userRepository);
}