<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 26/6/2016
 * Time: 1:08 PM
 */

namespace App\Repositories\AbstractRepositories;


use App\Repositories\BaseRepository;

abstract class ContentRepositoryAbstract extends BaseRepository
{

    /**
     * Return $credentials of Main Post
     *
     * @param array $columns
     * @return mixed
     */
    abstract protected function getMainPostCredentials(array $columns);

    /**
     * Return credentials array of Built In Features post
     *
     * @param array $columns
     * @return mixed
     */
    abstract protected function getBuiltInFeaturesPostCredentials(array $columns);

    /**
     * Return Credentials array of Sample Website Post
     *
     * @param array $columns
     * @return mixed
     */
    abstract protected function getSampleWebsitePostCredentials(array $columns);

}