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
     * Fetch all records
     *
     * @return mixed
     */
    public function fetchAll()
    {
        return $this->model->all();
    }

    /**
     * Get all records with specified columns
     *
     * @param array $columns
     * @return mixed
     */
    public function getAll(array $columns)
    {
        return $this->model->all($columns);
    }

    /**
     * Get all records with all columns and with pagination
     *
     * @param $page
     * @param $perpage
     * @return mixed
     */
    public function paginateAll($page, $perpage)
    {
        return $this->model->paginate($perpage);
    }

    /**
     * Delete record of specified ID
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $entity = $this->model->findOrFail($id);
        $entity->delete();
    }

    /**
     * Update specified columns of given record ID
     *
     * @param $id
     * @param array $column
     * @return mixed
     */
    public function update($id, array $column)
    {
        $entity = $this->model->findOrFail($id);
        $entity->save($column);
    }

    /**
     * Get all records with only specified columns with pagination
     *
     * @param array $columns
     * @param $page
     * @param $perpage
     * @return mixed
     */
    public function getAllPaginated(array $columns,$page, $perpage)
    {
        return $this->model->all($columns)->paginate($perpage);
    }


}

