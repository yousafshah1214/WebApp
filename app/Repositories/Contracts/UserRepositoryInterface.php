<?php

namespace App\Repositories\Contracts;


interface UserRepositoryInterface extends BaseRepositoryInterface {

    public function create(array $columnss);

    public function getByColumn(array $columns);

    public function getInsertedUserId();

    public function getUser(int $id);

}