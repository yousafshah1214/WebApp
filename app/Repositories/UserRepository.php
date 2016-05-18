<?php

namespace App\Repositories;

use App\Contracts\Models\SocialUserModelInterface;
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
    public function getUser($id){
        /**
         * findorFail method throws ModelNotFoundException if no User found with given Id
         *
        */
        return $this->model->findOrFail($id);
    }

    /**
     * Creates User in database Table Users.
     *
     * @param array $columns
     * @param $type
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

    /**
     * Return User Credentials from given data
     *
     * @param array $columns
     * @return array
     */
    protected function getUserCredentials(array $columns)
    {
        $credentials = array(
            'username'          =>  $columns['username'],
            'password'          =>  $columns['password'],
            'activate_token'    =>  md5($columns['email'].str_random(8).time())
        );

        return $credentials;
    }

    /**
     * Return Facebook User Credential from given data
     *
     * @param array $columns
     * @return array
     */
    protected function getFacebookUserCredentials(array $columns)
    {
        $credentials = array(
            'social'            =>  $columns['social'],
            'active'            =>  $columns['active'],
            'username'          =>  $columns['username']
        );

        return $credentials;
    }

    /**
     * Fill User Model with given data
     *
     * @param array $columns
     * @return mixed
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

    /**
     * @inheritDoc
     */
    public function attachSocial(SocialUserModelInterface $socialUser)
    {
        $this->model->social()->save($socialUser);
    }

    /**
     * returns number of username exists with given username.
     *
     * @param $username
     * @return mixed
     */
    public function usernameCount($username)
    {
        $usernameCount = $this->model->where("username","=",$username)->count();

        return $usernameCount;
    }

    /**
     * Get User via Activation Code.
     *
     * @param $activateCode
     * @return User
     * @throws Exception
     */
    public function getUserFromActivateCode($activateCode)
    {
        try{
            $user = $this->model->where('activate_token','=',$activateCode)->where('active','=',false)->firstOrFail();

            return $user;
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Activate User if found any user with given activation code
     *
     * @param UserModelInterface $user
     * @return mixed
     */
    public function activateUser(UserModelInterface $user)
    {
        $this->model = $user;

        $this->model->active = 1;

        $this->model->save();
    }

}