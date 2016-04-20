<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository implements UserRepositoryInterface{

    protected $model;
    public $userId;

    function __construct(User $user){
        //Parent::__construct($user);
        $this->model = $user;
    }

    public function getByColumn(array $column)
    {
        return $this->model->all($column);
    }

    public function getInsertedUserId(){
        return $this->userId;
    }

    public function getUser(int $id){
        return $this->model->findOrFail($id);
    }

    public function create(array $columns)
    {
        $this->model->username      =   $columns['username'];
        $this->model->password      =   Hash::make($columns['password']);
        $this->model->email         =   $columns['email'];

        $this->model->save();

        $this->userId = $this->model->id;
    }
}