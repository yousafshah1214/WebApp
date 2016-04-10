<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 08/4/2016
 * Time: 12:37 AM
 */

namespace App\Repositories\Contracts;


interface BaseRepositoryInterface {
    public function fetchAll();
    public function getAll(String $column);
    public function paginateAll(int $page,int $perpage);
    public function create(array $columns);
    public function delete(int $id);
    public function update(int $id,array $column);
} 