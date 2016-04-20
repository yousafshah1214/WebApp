<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 20/4/2016
 * Time: 10:10 PM
 */

namespace App\Contracts\Repositories;


interface BaseRepositoryInterface {
    public function fetchAll();
    public function getAll(String $column);
    public function paginateAll(int $page,int $perpage);
    public function delete(int $id);
    public function update(int $id,array $column);
}