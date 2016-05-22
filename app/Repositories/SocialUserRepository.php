<?php

namespace App\Repositories;

use App\Contracts\Models\SocialUserModelInterface;
use App\Contracts\Models\UserModelInterface;
use App\Contracts\Repositories\SocialUserRepositoryInterface;
use App\Repositories\AbstractRepositories\SocialUserRepositoryAbstract;
use Exception;

class SocialUserRepository extends SocialUserRepositoryAbstract implements SocialUserRepositoryInterface{

    /**
     * @var SocialUserModelInterface
     */
    private $model;

    /**
     * SocialUserRepository constructor.
     * @param SocialUserModelInterface $socialModel
     */
    function __construct(SocialUserModelInterface $socialModel)
    {
        $this->model = $socialModel;
    }

    /**
     * Creates Social User Model record
     *
     * @param array $columns
     * @param UserModelInterface $user
     * @return mixed|void
     * @throws Exception
     */
    public function create(array $columns, UserModelInterface $user)
    {
        try{
            /** $this->model is filled with data and ready to be saved with User Model Relation */
            $this->getSocialObjectWithCredentialsFilled($columns);

            if(! $user->social()->save($this->model)){
                throw new Exception("Error: unable to create user profile with user");
            }
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Makes Social User Model
     *
     * @param array $columns
     * @return mixed
     * @throws Exception
     */
    public function make(array $columns)
    {
        try{
            $this->getSocialObjectWithCredentialsFilled($columns);

            return $this->model;
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * @param $type
     * @param $id
     * @return int
     * @throws Exception
     */
    public function socialUserCount($type, $id)
    {
        try{
            $count = $this->model->where('network','=',$type)->where('networkUserId','=',$id)->count();
            return $count;
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * get User Model from Social user table via Token
     *
     * @param $type
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function getUserFromSocialite($type, $id)
    {
        try{
            $socialUser = $this->model->where('network','=',$type)->where('networkUserId','=',$id)->first();

            $user = $socialUser->user;

            return $user;
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Get Object filled with Social Data in Model Object.
     * This function call getSocialCredentials and getSocialObjectFilled
     *
     * @param array $columns
     * @return mixed
     * @throws Exception
     */
    protected function getSocialObjectWithCredentialsFilled(array $columns)
    {
        try{
            $credentials = $this->getSocialCredentials($columns);

            $this->getSocialObjectFilled($credentials);
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Get Social Credentials out of given array
     *
     * @param array $columns
     * @return mixed
     * @throws Exception
     */
    protected function getSocialCredentials(array $columns)
    {
        try{
            $credentials = array(
                'network'           =>  $columns['provider'],
                'networkUserId'     =>  $columns['network_user_id'],
                'networkToken'      =>  $columns['token'],
            );

            return $credentials;
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Get Social Data Filled in Model
     *
     * @param array $columns
     * @return mixed
     * @throws Exception
     */
    protected function getSocialObjectFilled(array $columns)
    {
        try{
            foreach($columns as $columnKey => $columnValue){
                $this->model->{$columnKey}  = $columnValue;
            }
        }
        catch(Exception $e){
            throw $e;
        }
    }

}