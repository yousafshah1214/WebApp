<?php

namespace App\Contracts\Repositories;

use App\Contracts\Models\UserModelInterface;

interface SocialUserRepositoryInterface extends BaseRepositoryInterface {

    /**
     * Create Social User Model record
     *
     * @param array $columns
     * @param UserModelInterface $user
     * @return mixed
     */
    public function create(array $columns, UserModelInterface $user);

    /**
     * Makes Social User Model
     *
     * @param array $columns
     * @return mixed
     */
    public function make(array $columns);
}