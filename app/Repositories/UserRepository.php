<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\User;

class UserRepository implements UserRepositoryInterface{

    public function fetchAll()
    {
        return User::all();
    }

    public function getAll(string $column)
    {
        return User::all($column);
    }

    public function paginateAll(int $page,int $perpage)
    {
        return User::paginate($perpage);
    }

    public function create(array $columns)
    {
        $user = new User();
        $user->save($columns);
    }

    public function delete(int $id)
    {
        $user = User::find($id);
        $user->delete();
    }

    public function update(int $id, array $column)
    {
        $user = User::find($id);
        $user->save($column);
    }

    public function getByColumn(array $column)
    {
        return User::all($column);
    }
}