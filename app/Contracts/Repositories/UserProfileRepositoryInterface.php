<?php

namespace App\Contracts\Repositories;

use App\Contracts\Models\UserModelInterface;

interface UserProfileRepositoryInterface extends BaseRepositoryInterface {
    /**
     * Create User Profile for newly registered User with given columns With User Model.
     *
     * @param $type
     * @param array $columns
     * @param UserModelInterface $user
     * @return mixed
     */
    public function create(array $columns, $type, UserModelInterface $user);

    /**
     * Make new User Profile without User Model
     *
     * @param array $columns
     * @param $type
     * @return mixed
     */
    public function make(array $columns, $type);


    /**
     * Returns Counts of email records where the given email matches.
     *
     * @param $email
     * @return mixed
     */
    public function emailCounts($email);
}