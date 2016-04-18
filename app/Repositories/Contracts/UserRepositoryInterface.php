<?php

namespace App\Repositories\Contracts;


interface UserRepositoryInterface extends BaseRepositoryInterface {

    public function getByColumn(array $column);

    public function getInsertedUserId();

    public function getUser(int $id);

}