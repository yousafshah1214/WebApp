<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 19/4/2016
 * Time: 5:16 PM
 */

namespace App\Repositories;

use App\Contracts\Repositories\BaseRepositoryInterface;
use Exception;

abstract class BaseRepository implements BaseRepositoryInterface{

    /**
     * Fetch all records
     * @return mixed
     * @throws Exception
     */
    public function fetchAll()
    {
        try{
            return $this->model->all();
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Get all records with specified columns
     *
     * @param array $columns
     * @return mixed
     * @throws Exception
     */
    public function getAll(array $columns)
    {
        try{
            return $this->model->all($columns);
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Get all records with all columns and with pagination
     *
     * @param $page
     * @param $perpage
     * @return mixed
     * @throws Exception
     */
    public function paginateAll($page, $perpage)
    {
        try{
            return $this->model->paginate($perpage);
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Delete record of specified ID
     *
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function delete($id)
    {
        try{
            $entity = $this->model->findOrFail($id);
            $entity->delete();
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Update specified columns of given record ID
     *
     * @param $id
     * @param array $column
     * @return mixed
     * @throws Exception
     */
    public function update($id, array $column)
    {
        try{
            $entity = $this->model->findOrFail($id);
            $entity->save($column);
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Get all records with only specified columns with pagination
     *
     * @param array $columns
     * @param $page
     * @param $perpage
     * @return mixed
     * @throws Exception
     */
    public function getAllPaginated(array $columns,$page, $perpage)
    {
        try{
            return $this->model->all($columns)->paginate($perpage);
        }
        catch(Exception $e){
            throw $e;
        }
    }


}

