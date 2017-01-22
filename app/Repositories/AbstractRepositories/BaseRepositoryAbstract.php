<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 26/6/2016
 * Time: 1:40 PM
 */

namespace App\Repositories\AbstractRepositories;


use App\Repositories\BaseRepository;

abstract class BaseRepositoryAbstract
{
    /**
     * Fill Model with given data
     *
     * @param array $columns
     * @return mixed
     */
    abstract protected function getModelFilledWithData(array $columns);
}