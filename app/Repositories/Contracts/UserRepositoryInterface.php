<?php

namespace App\Repositories\Contracts;


interface UserRepositoryInterface extends BaseRepositoryInterface {

    public function getByColumn(array $column);

}