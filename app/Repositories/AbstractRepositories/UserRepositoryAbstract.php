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
    abstract protected function getUserCredentials(array $columns);

    abstract protected function getFacebookUserCredentials(array $columns);

    abstract protected function createUserWith(array $columns);
}