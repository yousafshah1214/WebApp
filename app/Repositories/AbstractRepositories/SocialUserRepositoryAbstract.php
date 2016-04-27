<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 26/4/2016
 * Time: 6:06 PM
 */

namespace App\Repositories\AbstractRepositories;


use App\Repositories\BaseRepository;

Abstract class SocialUserRepositoryAbstract extends BaseRepository
{
    /**
     * Get Social Credentials out of given array
     *
     * @param array $columns
     * @return mixed
     */
    abstract protected function getSocialCredentials(array $columns);

    abstract protected function getSocialObjectFilled(array $columns);

    abstract protected function getSocialObjectWithCredentialsFilled(array $columns);
}