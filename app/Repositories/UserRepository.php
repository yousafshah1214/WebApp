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
     * @throws Exception
     */
    public function getByColumn(array $column)
    {
        try{
            return $this->model->all($column);
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Returns newly inserted User's Id
     *
     * @return mixed
     * @throws Exception
     */
    public function getInsertedUserId(){
        try{
            if(is_null($this->userId)){
                throw new Exception("Error: User Id not set");
            }
            return $this->userId;
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Returns User with given ID
     *
     * @param int $id
     * @return mixed
     * @throws Exception
     * @throw ModelNotFoundException
     */
    public function getUser($id){
        /**
         * findorFail method throws ModelNotFoundException if no User found with given Id
         *
        */
        try{
            return $this->model->findOrFail($id);
        }
        catch(Exception $e){
            throw $e;
        }
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
        try{
            $userCredentials = null;

            if($type == "form"){
                $userCredentials = $this->getUserCredentials($columns);
            }
            else if($type = "facebook"){
                $userCredentials = $this->getFacebookUserCredentials($columns);
            }

            $this->createUserWith($userCredentials);

            if( ! $this->model->save() ){
                throw new Exception("Error In saving User to Database");
            }

            $this->userId = $this->model->id;
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Return User Credentials from given data
     *
     * @param array $columns
     * @return array
     * @throws Exception
     */
    protected function getUserCredentials(array $columns)
    {
        try{
            $credentials = array(
                'username'          =>  $columns['username'],
                'password'          =>  $columns['password'],
                'activate_token'    =>  md5($columns['email'].str_random(8).time())
            );

            return $credentials;
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Return Facebook User Credential from given data
     *
     * @param array $columns
     * @return array
     * @throws Exception
     */
    protected function getFacebookUserCredentials(array $columns)
    {
        try{
            $credentials = array(
                'social'            =>  $columns['social'],
                'active'            =>  $columns['active'],
                'username'          =>  $columns['username']
            );

            return $credentials;
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Fill User Model with given data
     *
     * @param array $columns
     * @return mixed
     * @throws Exception
     */
    protected function createUserWith(array $columns)
    {
        try{
            foreach($columns as $columnKey => $columnValue){
                $this->model->{$columnKey}  =   $columnValue;
            }
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Attach Profile to User Model Instances and saves to database
     *
     * @param UserProfileModelInterface $profile
     * @return mixed|void
     * @throws Exception
     */
    public function attachProfile(UserProfileModelInterface $profile)
    {
        try{
            $this->model->profile()->save($profile);
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function attachSocial(SocialUserModelInterface $socialUser)
    {
        try{
            $this->model->social()->save($socialUser);
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * returns number of username exists with given username.
     *
     * @param $username
     * @return mixed
     * @throws Exception
     */
    public function usernameCount($username)
    {
        try{
            $usernameCount = $this->model->where("username","=",$username)->count();

            return $usernameCount;
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Count Users with given activation code.
     *
     * @param $activateCode
     * @return int
     * @throws Exception
     */
    public function UserCountWithActivateCode($activateCode)
    {
        try{
            return $this->model->where('activate_token','=',$activateCode)->where('active','=',false)->count();
        }
        catch(Exception $e){
            throw $e;
        }
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
     * @throws Exception
     */
    public function activateUser(UserModelInterface $user)
    {
        try{
            $this->model = $user;

            $this->model->active = 1;

            $this->model->save();
        }
        catch(Exception $e){
            throw $e;
        }
    }

}