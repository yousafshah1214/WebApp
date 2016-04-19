<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 19/4/2016
 * Time: 5:16 PM
 */

namespace App\Repositories;


use App\Repositories\Contracts\BaseRepositoryInterface;

abstract class BaseRepository implements BaseRepositoryInterface{

    public function fetchAll()
    {
        return $this->model->all();
    }

    public function getAll(string $column)
    {
        return $this->model->all($column);
    }

    public function paginateAll(int $page,int $perpage)
    {
        return $this->model->paginate($perpage);
    }

    public function delete(int $id)
    {
        $entity = $this->model->find($id);
        $entity->delete();
    }

    public function update(int $id, array $column)
    {
        $entity = $this->model->find($id);
        $entity->save($column);
    }
}

