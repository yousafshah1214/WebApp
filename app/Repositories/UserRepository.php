<?php

namespace App\Repositories;

use App\Contracts\Models\UserModelInterface;
use App\Contracts\Models\UserProfileModelInterface;
use App\Contracts\Repositories\UserProfileRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Repositories\AbstractRepositories\UserRepositoryAbstract;
use App\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserRepository extends UserRepositoryAbstract implements UserRepositoryInterface{

    /**
     * @var User Model Object
     */
    protected $model;
    /**
     * @var UserId
     */
    public $userId;

    /**
     * @var UserProfile Model Object
     */
    protected $profile;

    /**
     * UserRepository constructor.
     *
     * @param UserModelInterface|User $user
     * @param UserProfileRepositoryInterface $profile
     */
    function __construct(UserModelInterface $user, UserProfileRepositoryInterface $profile){
        //Parent::__construct($user);
        $this->model = $user;
        $this->profile = $profile;
    }

    /**
     * Get User model with only given columns
     *
     * @param array $column
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getByColumn(array $column)
    {
        return $this->model->all($column);
    }

    /**
     * Returns newly inserted User's Id
     *
     * @return mixed
     * @throws Exception
     */
    public function getInsertedUserId(){
        if(is_null($this->userId)){
           throw new Exception("Error: User Id not set");
        }
        return $this->userId;
    }

    /**
     * Returns User with given ID
     *
     * @param int $id
     * @return mixed
     * @throw ModelNotFoundException
     */
    public function getUser(int $id){
        /**
         * findorFail method throws ModelNotFOundException if no User found with given Id
         *
        */
        return $this->model->findOrFail($id);
    }

    /**
     * Creates User in database Table Users.
     *
     * @param array $columns
     * @return mixed|void
     * @throws Exception
     */
    public function create(array $columns,$type)
    {
        $userCredentials = null;

        if($type == "form"){
            $userCredentials = $this->getUserCredentials($columns);
        }
        else if($type = "facebook"){
            $userCredentials = $this->getFacebookUserCredentials($columns);
        }

        $this->createUserWith($userCredentials);

        if(! $this->model->save() ){
            throw new Exception("Error In saving User to Database");
        }

        $this->userId = $this->model->id;
    }

    protected function getUserCredentials(array $columns)
    {
        $credentials = array(
            'username'          =>  $columns['username'],
            'password'          =>  $columns['password'],
            'activate_token'    =>  md5($columns['email'].str_random(8).time())
        );

        return $credentials;
    }

    protected function getFacebookUserCredentials(array $columns)
    {
        $credentials = array(
            'social'            =>  true,
            'active'            =>  true
        );

        return $credentials;
    }

    /**
     * Fill User Model with given data
     *
     * @param array $columns
     */
    protected function createUserWith(array $columns)
    {
        foreach($columns as $columnKey => $columnValue){
            $this->model->{$columnKey}  =   $columnValue;
        }
    }

    /**
     * Attach Profile to User Model Instances and saves to database
     *
     * @param UserProfileModelInterface $profile
     * @return mixed|void
     */
    public function attachProfile(UserProfileModelInterface $profile)
    {
        $this->model->profile()->save($profile);
    }

}