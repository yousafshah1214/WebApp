<?php

namespace App\Repositories;

use App\Contracts\Models\SocialUserModelInterface;
use App\Contracts\Models\UserModelInterface;
use App\Contracts\Repositories\SocialUserRepositoryInterface;
use App\Repositories\AbstractRepositories\SocialUserRepositoryAbstract;

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
     * @param array $columns
     */
    protected function getSocialObjectWithCredentialsFilled(array $columns)
    {
        $credentials = $this->getSocialCredentials($columns);

        $this->getSocialObjectFilled($credentials);
    }

    /**
     * Extract Necessary data for SocialUser Model from given array
     *
     * @param array $columns
     * @return mixed|void
     */
    protected function getSocialCredentials(array $columns)
    {
        $credentials = array(
            'network'         =>  $columns['provider'],
            'networkToken'    =>  $columns['token'],
        );

        return $credentials;
    }

    /**
     * Fill SocialUser Model with given array
     *
     * @param array $columns
     */
    protected function getSocialObjectFilled(array $columns)
    {
        foreach($columns as $columnKey => $columnValue){
            $this->model->{$columnKey}  = $columnValue;
        }
    }
}