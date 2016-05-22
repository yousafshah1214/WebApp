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
        try{
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
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Make new User Profile without User Model
     *
     * @param array $columns
     * @param $type
     * @return UserProfileModelInterface|UserProfile
     * @throws Exception
     */
    public function make(array $columns, $type){

        try{
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
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Returns Counts of email records where the given email matches.
     *
     * @param $email
     * @return mixed
     * @throws Exception
     */
    public function emailCounts($email)
    {
        try{
            $emailsCounts = $this->model->where("email", '=', $email)->count();

            return $emailsCounts;
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * return array with profile credentials from given array
     *
     * @param array $columns
     * @return mixed
     * @throws Exception
     */
    protected function getProfileCredentials(array $columns)
    {
        try{
            $credentials = array(
                'email'     =>  $columns['email'],
            );

            return $credentials;
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * return facebook profile credentials array from given array
     *
     * @param array $columns
     * @return mixed
     * @throws Exception
     */
    protected function getFacebookProfileCredentials(array $columns)
    {
        try{
            $credentials = array(
                'email'     =>  $columns['email'],
                'name'      =>  $columns['name']
            );

            return $credentials;
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * return twitter profile credentials array from given array
     *
     * @param array $columns
     * @return mixed
     * @throws Exception
     */
    protected function getTwitterProfileCredentials(array $columns)
    {
        try{
            $credentials = array(
                'name'      =>  $columns['name']
            );

            return $credentials;
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Profile data is filled to model object
     *
     * @param array $columns
     * @return mixed
     * @throws Exception
     */
    protected function getProfileObjectFilled(array $columns)
    {
        try{
            foreach($columns as $key => $column){
                $this->model->{$key} =  $column;
            }
        }
        catch(Exception $e){
            throw $e;
        }
    }

}