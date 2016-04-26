<?php

namespace App\Repositories;

use App\Contracts\Models\UserModelInterface;
use App\Contracts\Models\UserProfileModelInterface;
use App\Contracts\Repositories\UserProfileRepositoryInterface;
use App\Repositories\AbstractRepositories\UserProfileRepositoryAbstract;
use App\UserProfile;
use Exception;

class UserProfileRepository extends UserProfileRepositoryAbstract implements UserProfileRepositoryInterface{

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
     * @param $type
     * @param array $columns
     * @param UserModelInterface $user
     * @return mixed|void
     * @throws Exception
     */
    public function create(array $columns, $type, UserModelInterface $user){

        $credentials = null;
        if($type=="form"){
            $credentials = $this->getProfileCredentials($columns);
        }
        elseif($type=="facebook"){
            $credentials = $this->getFacebookProfileCredentials($columns);
        }

        $this->getProfileObjFilled($credentials);

        if(! $user->profile()->save($this->model)){
            throw new Exception("Error: unable to create user profile with user");
        }

    }

    /**
     * @param array $columns
     * @param $type
     * @return UserProfileModelInterface|UserProfile
     */
    public function make(array $columns, $type){

        $credentials = $this->getProfileCredentials($columns);

        $this->getProfileObjFilled($credentials);

        //$this->model->save();

        return $this->model;
    }

    protected function getProfileCredentials(array $columns)
    {
        $credentials = array(
            'email'     =>  $columns['email'],
        );

        return $credentials;
    }

    protected function getFacebookProfileCredentials(array $columns)
    {
        $credentials = array(
            'email'     =>  $columns['email'],
            'name'      =>  $columns['name']
        );

        return $credentials;
    }

    protected function getProfileObjFilled(array $columns)
    {
        foreach($columns as $key => $column){
            $this->model->{$key} =  $column;
        }
    }

}