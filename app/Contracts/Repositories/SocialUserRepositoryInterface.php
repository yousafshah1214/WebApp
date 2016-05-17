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

    /**
     * Count Social User via token
     *
     * @param $type
     * @param $token
     * @return integer
     */
    public function socialUserCount($type, $token);

    /**
     * get User Model from Social user table via Token
     *
     * @param $type
     * @param $token
     * @return mixed
     */
    public function getUserFromSocialite($type, $token);
}