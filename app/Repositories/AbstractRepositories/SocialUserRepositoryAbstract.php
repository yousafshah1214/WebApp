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

    /**
     * Get Social Data Filled in Model
     *
     * @param array $columns
     * @return mixed
     */
    abstract protected function getSocialObjectFilled(array $columns);

    /**
     * Get Object filled with Social Data in Model Object.
     * This function call getSocialCredentials and getSocialObjectFilled
     *
     * @param array $columns
     * @return mixed
     */
    abstract protected function getSocialObjectWithCredentialsFilled(array $columns);
}