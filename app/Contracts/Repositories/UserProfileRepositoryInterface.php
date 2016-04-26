<?php

namespace App\Contracts\Repositories;

use App\Contracts\Models\UserModelInterface;

interface UserProfileRepositoryInterface extends BaseRepositoryInterface {
    /**
     * Create User Profile for newly registered User with given columns.
     *
     * @param $type
     * @param array $columns
     * @param UserModelInterface $user
     * @return mixed
     */
    public function create(array $columns, $type, UserModelInterface $user);

    public function make(array $columns,$type);
}