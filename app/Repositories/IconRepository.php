<?php

namespace App\Repositories;

use App\Contracts\Repositories\IconRepositoryInterface;
use App\Icon;

class IconRepository extends BaseRepository implements IconRepositoryInterface{

    /**
     * Return Collection of All Icons
     *
     * @return mixed
     */
    public function getAllIcons()
    {
        return Icon::all();
    }

    /**
     * Return Array of Icons containing key value pair of Id and Name of each Icon row.
     *
     * @return mixed
     */
    public function getAllIconsArrayWithIdAndName()
    {
        return Icon::select('id','name')->get()->toArray();
    }

    /**
     * Return Collection of Icons containing key value pair of Id and Name of each Icon row.
     *
     * @return mixed
     */
    public function getAllIconsWithIdAndName()
    {
        return Icon::select('id','name')->get();
    }

}