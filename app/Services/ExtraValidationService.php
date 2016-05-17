<?php

namespace App\Services;


use App\Contracts\Repositories\SocialUserRepositoryInterface;
use App\Contracts\Repositories\UserProfileRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Services\ExtraValidationServiceInterface;

class ExtraValidationService extends BaseService implements ExtraValidationServiceInterface
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
    public function EmailExistsOrNot($email, UserProfileRepositoryInterface $userProfileRepository)
    {
        $count = $userProfileRepository->emailCounts($email);

        if($count > 0){
            return true;
        }
        return false;
    }

    /**
     * Checks weather given username exists in database (Users Table) or not.
     *
     * @param $username
     * @param UserRepositoryInterface $userRepository
     * @return bool
     */
    public function UsernameExistsOrNot($username, UserRepositoryInterface $userRepository)
    {
        $count = $userRepository->usernameCount($username);

        if($count > 0){
            return true;
        }
        return false;
    }

    /**
     * Checks weather given social user exists in database or not
     *
     * @param $type
     * @param $user
     * @param SocialUserRepositoryInterface $socialRepository
     * @return bool
     */
    public function SocialUserExistsOrNot($type,$user, SocialUserRepositoryInterface $socialRepository)
    {
        $count = $socialRepository->socialUserCount($type,$socialRepository);

        if($count > 0){
            // true means user exists in database.
            return true;
        }

        return false;
    }

}