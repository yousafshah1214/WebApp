<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 26/4/2016
 * Time: 1:56 PM
 */

namespace App\Repositories\AbstractRepositories;


use App\Repositories\BaseRepository;

abstract class UserRepositoryAbstract extends BaseRepository
{
    /**
     * Return User Credentials from given data
     *
     * @param array $columns
     * @return mixed
     */
    abstract protected function getUserCredentials(array $columns);

    /**
     * Return Facebook User Credential from given data
     *
     * @param array $columns
     * @return array
     */
    abstract protected function getFacebookUserCredentials(array $columns);

    /**
     * Fill User Model with given data
     *
     * @param array $columns
     * @return mixed
     */
    abstract protected function createUserWith(array $columns);
}