<?php

namespace App\Repositories;

use App\Contracts\EloquentModelInterface;
use App\Contracts\Models\UserModelInterface;
use App\Contracts\Repositories\UserProfileRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository implements UserRepositoryInterface{

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
    public function create(array $columns)
    {
        $this->model->username          =   $columns['username'];
        $this->model->password          =   Hash::make($columns['password']);
        $this->model->activate_token    =   Hash::make($columns['email'].str_random(8));

        if(! $this->model->save() ){
            throw new Exception("Error In saving User to Database");
        }

        $this->profile->createUserProfile(array('email' =>  $columns['email']), $this->model);

        $this->userId = $this->model->id;
    }
}