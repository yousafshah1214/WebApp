<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 19/4/2016
 * Time: 5:16 PM
 */

namespace App\Repositories;

use App\Contracts\Repositories\BaseRepositoryInterface;

abstract class BaseRepository implements BaseRepositoryInterface{

    /**
     * Fetches all records with all columns
     *
     * @return mixed
     */
    public function fetchAll()
    {
        return $this->model->all();
    }

    /**
     * Fetches all records with given columns
     *
     * @param array $columns
     * @return mixed
     */
    public function getAll(array $columns)
    {
        return $this->model->all($columns);
    }

    /**
     * Paginate the collection of model.
     *
     * @param int $page
     * @param int $perpage
     * @return mixed
     */
    public function paginateAll(int $page, int $perpage)
    {
        return $this->model->paginate($perpage);
    }

    /**
     * Deletes entity from database table with given ID
     *
     * @param int $id
     * @throw ModelNotFoundException by FindOrFail method
     */
    public function delete(int $id)
    {
        $entity = $this->model->findOrFail($id);
        $entity->delete();
    }

    /**
     *
     *
     * @param int $id
     * @param array $column
     * @throw ModelNotFoundException by FindOrFail method
     */
    public function update(int $id, array $column)
    {
        $entity = $this->model->findOrFail($id);
        $entity->save($column);
    }

    /**
     * @param array $columns
     * @param int $page
     * @param int $perpage
     * @return mixed
     */
    public function getAllPaginated(array $columns, int $page, int $perpage)
    {
        return $this->model->all($columns)->paginate($perpage);
    }
}

