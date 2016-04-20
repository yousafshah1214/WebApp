<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 20/4/2016
 * Time: 10:11 PM
 */

namespace App\Contracts\Repositories;


interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function create(array $columnss);

    public function getByColumn(array $columns);

    public function getInsertedUserId();

    public function getUser(int $id);
}