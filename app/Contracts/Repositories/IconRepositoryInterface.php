<?php

namespace App\Contracts\Repositories;


interface IconRepositoryInterface extends BaseRepositoryInterface {

    /**
     * Return Collection of All Icons
     *
     * @return mixed
     */
    public function getAllIcons();

    /**
     * Return Collection of Icons containing key value pair of Id and Name of each Icon row.
     *
     * @return mixed
     */
    public function getAllIconsWithIdAndName();

    /**
     * Return Array of Icons containing key value pair of Id and Name of each Icon row.
     *
     * @return mixed
     */
    public function getAllIconsArrayWithIdAndName();

}