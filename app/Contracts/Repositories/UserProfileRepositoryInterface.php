<?php

namespace App\Contracts\Repositories;

use App\Contracts\Models\UserModelInterface;

interface UserProfileRepositoryInterface extends BaseRepositoryInterface {
    /**
     * Create User Profile for newly registered User with given columns.
     *
     * @param array $columns
     * @param UserModelInterface $user
     * @return mixed
     */
    public function createUserProfile(array $columns, UserModelInterface $user);
}