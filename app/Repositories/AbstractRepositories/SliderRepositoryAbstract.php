<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 17/6/2016
 * Time: 11:16 AM
 */

namespace App\Repositories\AbstractRepositories;


use App\Repositories\BaseRepository;

abstract class SliderRepositoryAbstract extends BaseRepository
{
    /**
     * Return array of credentials with database columns names key
     *
     * @param $type
     * @param array $columns
     * @return mixed
     */
    abstract protected function getCredentials($type,array $columns);

    /**
     * Upload Image and returns file storage address
     *
     * @param $image
     * @return mixed
     */
    abstract protected function uploadImage($image);

    /**
     * Fill Slider Model with given column values
     *
     * @param array $columns
     * @return mixed
     */
    abstract protected function getSliderModelFilled(array $columns);
}