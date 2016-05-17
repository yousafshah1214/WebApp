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
        /** $this->model is filled with data and ready to be saved with User Model Relation */
        $this->getSocialObjectWithCredentialsFilled($columns);

        if(! $user->social()->save($this->model)){
            throw new Exception("Error: unable to create user profile with user");
        }
    }

    /**
     * Makes Social User Model
     *
     * @param array $columns
     * @return mixed
     */
    public function make(array $columns)
    {
        $this->getSocialObjectWithCredentialsFilled($columns);

        return $this->model;
    }

    /**
     * @param $type
     * @param $id
     * @return integer
     */
    public function socialUserCount($type, $id)
    {
        $count = $this->model->where('network','=',$type)->where('networkUserId','=',$id)->count();
        return $count;
    }

    /**
     * get User Model from Social user table via Token
     *
     * @param $type
     * @param $id
     * @return mixed
     */
    public function getUserFromSocialite($type, $id)
    {
        $socialUser = $this->model->where('network','=',$type)->where('networkUserId','=',$id)->first();

        $user = $socialUser->user;

        return $user;
    }

    /**
     * Get Object filled with Social Data in Model Object.
     * This function call getSocialCredentials and getSocialObjectFilled
     *
     * @param array $columns
     * @return mixed
     */
    protected function getSocialObjectWithCredentialsFilled(array $columns)
    {
        $credentials = $this->getSocialCredentials($columns);

        $this->getSocialObjectFilled($credentials);
    }

    /**
     * Get Social Credentials out of given array
     *
     * @param array $columns
     * @return mixed
     */
    protected function getSocialCredentials(array $columns)
    {
        $credentials = array(
            'network'           =>  $columns['provider'],
            'networkUserId'     =>  $columns['network_user_id'],
            'networkToken'      =>  $columns['token'],
        );

        return $credentials;
    }

    /**
     * Get Social Data Filled in Model
     *
     * @param array $columns
     * @return mixed
     */
    protected function getSocialObjectFilled(array $columns)
    {
        foreach($columns as $columnKey => $columnValue){
            $this->model->{$columnKey}  = $columnValue;
        }
    }


}