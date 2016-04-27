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
    abstract protected function getProfileCredentials(array $columns);

    abstract protected function getFacebookProfileCredentials(array $columns);

    abstract protected function getProfileObjectFilled(array $columns);
}