<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 26/4/2016
 * Time: 1:55 PM
 */

namespace App\Repositories\AbstractRepositories;


use App\Repositories\BaseRepository;

abstract class UserProfileRepositoryAbstract extends BaseRepository
{
    /**
     * return array with profile credentials from given array
     *
     * @param array $columns
     * @return mixed
     */
    abstract protected function getProfileCredentials(array $columns);

    /**
     * return facebook profile credentials array from given array
     *
     * @param array $columns
     * @return mixed
     */
    abstract protected function getFacebookProfileCredentials(array $columns);

    /**
     * return twitter profile credentials array from given array
     *
     * @param array $columns
     * @return mixed
     */
    abstract protected function getTwitterProfileCredentials(array $columns);

    /**
     * Profile data is filled to model object
     *
     * @param array $columns
     * @return mixed
     */
    abstract protected function getProfileObjectFilled(array $columns);

}