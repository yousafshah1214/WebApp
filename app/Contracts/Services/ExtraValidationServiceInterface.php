<?php

namespace App\Contracts\Services;


use App\Contracts\Repositories\SocialUserRepositoryInterface;
use App\Contracts\Repositories\UserProfileRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;

/**
 * Interface ExtraValidationServiceInterface
 * @package App\Contracts\Services
 */
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
     * @param UserRepositoryInterface $userRepository
     * @return bool
     */
    public function UsernameExistsOrNot($username, UserRepositoryInterface $userRepository);

    /**
     * Checks weather given social user exists in database or not
     *
     * @param $type
     * @param $user
     * @param SocialUserRepositoryInterface $socialRepository
     * @return bool
     */
    public function SocialUserExistsOrNot($type,$user, SocialUserRepositoryInterface $socialRepository);
}