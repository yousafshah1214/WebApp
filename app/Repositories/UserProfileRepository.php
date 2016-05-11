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
        else if($type=="twitter"){
            $credentials = $this->getTwitterProfileCredentials($columns);
        }

        $this->getProfileObjectFilled($credentials);

        if(! $user->profile()->save($this->model)){
            throw new Exception("Error: unable to create user profile with user");
        }
    }

    /**
     * Make new User Profile without User Model
     *
     * @param array $columns
     * @param $type
     * @return UserProfileModelInterface|UserProfile
     */
    public function make(array $columns, $type){

        $credentials = null;

        if($type=="form"){
            $credentials = $this->getProfileCredentials($columns);
        }
        elseif($type=="facebook"){
            $credentials = $this->getFacebookProfileCredentials($columns);
        }
        else if($type=="twitter"){
            $credentials = $this->getTwitterProfileCredentials($columns);
        }

        $this->getProfileObjectFilled($credentials);

        return $this->model;
    }

    /**
     * Returns Counts of email records where the given email matches.
     *
     * @param $email
     * @return mixed
     */
    public function emailCounts($email)
    {
        $emailsCounts = $this->model->where("email", '=', $email)->count();

        return $emailsCounts;
    }

    /**
     * return array with profile credentials from given array
     *
     * @param array $columns
     * @return mixed
     */
    protected function getProfileCredentials(array $columns)
    {
        $credentials = array(
            'email'     =>  $columns['email'],
        );

        return $credentials;
    }


    /**
     * return facebook profile credentials array from given array
     *
     * @param array $columns
     * @return mixed
     */
    protected function getFacebookProfileCredentials(array $columns)
    {
        $credentials = array(
            'email'     =>  $columns['email'],
            'name'      =>  $columns['name']
        );

        return $credentials;
    }

    /**
     * return twitter profile credentials array from given array
     *
     * @param array $columns
     * @return mixed
     */
    protected function getTwitterProfileCredentials(array $columns)
    {
        $credentials = array(
            'name'      =>  $columns['name']
        );

        return $credentials;
    }

    /**
     * Profile data is filled to model object
     *
     * @param array $columns
     * @return mixed
     */
    protected function getProfileObjectFilled(array $columns)
    {
        foreach($columns as $key => $column){
            $this->model->{$key} =  $column;
        }
    }

}