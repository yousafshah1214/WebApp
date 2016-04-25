<?php

namespace App\Repositories;

use App\Contracts\Models\UserModelInterface;
use App\Contracts\Models\UserProfileModelInterface;
use App\Contracts\Repositories\UserProfileRepositoryInterface;
use App\UserProfile;
use Exception;

class UserProfileRepository extends BaseRepository implements UserProfileRepositoryInterface{

    protected $model;

    /**
     * UserProfileRepository constructor.
     *
     * @param UserProfileModelInterface|UserProfile $userProfile
     */
    function __construct(UserProfileModelInterface $userProfile)
    {
       $this->model = $userProfile;
    }

    /**
     * @param array $columns
     * @param UserModelInterface $user
     * @return mixed|void
     * @throws Exception
     */
    public function createUserProfile(array $columns, UserModelInterface $user){
        foreach($columns as $key => $column){
            $this->model->{$key} =  $column;
        }
        if(! $user->profile()->save($this->model)){
            throw new Exception("Error: unable to create user profile with user");
        }
    }

}