<?php

namespace App\Contracts\Services;


use App\Contracts\Repositories\UserProfileRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;

interface ExtraValidationServiceInterface extends BaseServiceInterface
{
    /**
     * Checks weather given email exists in database (User Profile Table) or not.
     *
     * True Email Exists
     * False Email Doesnot Exist
     * @param $email
     * @param UserProfileRepositoryInterface $userProfileRepository
     * @return bool
     */
    public function EmailExistsOrNot($email, UserProfileRepositoryInterface $userProfileRepository);

    /**
     * Checks weather given username exists in database (Users Table) or not.
     *
     * @param $username
     * @param UserRepositoryInterface $userProfileRepository
     * @return bool
     */
    public function UsernameExistsOrNot($username, UserRepositoryInterface $userProfileRepository);
}