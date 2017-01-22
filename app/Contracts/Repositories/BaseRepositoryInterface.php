<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 20/4/2016
 * Time: 10:10 PM
 */

namespace App\Contracts\Repositories;


interface BaseRepositoryInterface {
    /**
     * Fetch all records
     *
     * @return mixed
     */
    public function fetchAll();

    /**
     * Get all records with specified columns
     *
     * @param array $columns
     * @return mixed
     */
    public function getAll(array $columns);

    /**
     * Get all records with only specified columns with pagination
     *
     * @param array $columns
     * @param $page
     * @param $perpage
     * @return mixed
     */
    public function getAllPaginated(array $columns, $page, $perpage);

    /**
     * Get all records with all columns and with pagination
     *
     * @param $page
     * @param $perpage
     * @return mixed
     */
    public function paginateAll($page, $perpage);

    /**
     * Delete record of specified ID
     *
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * Update specified columns of given record ID
     *
     * @param $id
     * @param array $column
     * @return mixed
     */
    public function update($id, array $column);

}