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
     * @throws Exception
     */
    public function registerUser($type, array $columns, UserRepositoryInterface $userRepository, UserProfileRepositoryInterface $userProfileRepository, SocialUserRepositoryInterface $socialUserRepository = null)
    {
        try{
            $userRepository->create($columns, $type);

            $profile = $userProfileRepository->make($columns,$type);

            if($this->isSocialUser($type) && $this->isSocialUserRepositoryAvailable($socialUserRepository)){

                $social = $socialUserRepository->make($columns,$type);

                $userRepository->attachSocial($social);
            }

            $userRepository->attachProfile($profile);

            return $userRepository->getUser($userRepository->getInsertedUserId());
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Activates User with Given Code.
     *
     * @param $activateCode
     * @param UserRepositoryInterface $userRepository
     * @return mixed
     * @throws Exception
     */
    public function activateUser($activateCode, UserRepositoryInterface $userRepository)
    {
        try{
            if($userRepository->UserCountWithActivateCode($activateCode) > 0){
                $user = $userRepository->getUserFromActivateCode($activateCode);
                $userRepository->activateUser($user);
            }
        }
        catch(Exception $e){
            throw $e;
        }
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

}