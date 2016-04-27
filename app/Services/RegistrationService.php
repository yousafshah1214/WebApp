<?php

namespace App\Services;


use App\Contracts\Repositories\SocialUserRepositoryInterface;
use App\Contracts\Repositories\UserProfileRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Services\RegistrationServiceInterface;
use App\Services\AbstractServices\RegistrationServiceAbstract;
use Exception;

class RegistrationService extends RegistrationServiceAbstract implements RegistrationServiceInterface
{
    /**
     *
     *
     * @param $type
     * @param array $columns
     * @param UserRepositoryInterface $userRepository
     * @param UserProfileRepositoryInterface $userProfileRepository
     * @param SocialUserRepositoryInterface $socialUserRepository
     * @return mixed User Model
     */
    public function registerUser($type, array $columns, UserRepositoryInterface $userRepository, UserProfileRepositoryInterface $userProfileRepository, SocialUserRepositoryInterface $socialUserRepository = null)
    {
        $userRepository->create($columns, $type);

        $profile = $userProfileRepository->make($columns,$type);

        if($this->isSocialUser($type) && $this->isSocialUserRepositoryAvailable($socialUserRepository)){
            $social = $socialUserRepository->make($columns,$type);

            $userRepository->attachSocial($social);
        }

        $userRepository->attachProfile($profile);

        return $userRepository->getUser($userRepository->getInsertedUserId());
    }

    /**
     * @param $type
     * @return bool
     */
    protected function isSocialUser($type)
    {
        return ($type == "facebook" || $type == "twitter");
    }

    /**
     * Make Sure SocialUserRepositoryInterface Object is not null
     *
     * @inheritDoc
     */
    protected function isSocialUserRepositoryAvailable(SocialUserRepositoryInterface $socialUserRepository = null)
    {
        return ( ! is_null($socialUserRepository));
    }

    /**
     * Create New User in Database using UserRepository via signup with Facebook
     *
     * @param array $columns
     * @param UserRepositoryInterface $userRepository
     * @param UserProfileRepositoryInterface $profileRepository
     * @return mixed|void
     */
    public function registerFacebookUser(array $columns, UserRepositoryInterface $userRepository, UserProfileRepositoryInterface $profileRepository)
    {

    }

}