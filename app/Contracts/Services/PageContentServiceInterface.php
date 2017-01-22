<?php

namespace App\Contracts\Services;


use App\Contracts\Repositories\ContentRepositoryInterface;
use App\Contracts\Repositories\IconRepositoryInterface;
use App\Contracts\Repositories\ImageRepositoryInterface;

interface PageContentServiceInterface extends BaseServiceInterface
{
    /**
     * Update Main Post In database
     *
     * @param $id
     * @param array $columns
     * @param ContentRepositoryInterface $contentRepo
     * @return mixed
     */
    public function updateMainPostContent($id, array $columns, ContentRepositoryInterface $contentRepo);

    /**
     * Create Built In Features Post with given column names with values
     *
     * @param array $columns
     * @param ContentRepositoryInterface $contentRepo
     * @return mixed
     */
    public function createBuiltInFeaturePost(array $columns, ContentRepositoryInterface $contentRepo);

    /**
     * return list of Built In Features Posts from Database
     *
     * @param ContentRepositoryInterface $contentRepo
     * @return mixed
     */
    public function getAllBuiltInFeaturePosts(ContentRepositoryInterface $contentRepo);

    /**
     * Return Single Post of Built In Feature from Database
     *
     * @param $id
     * @param ContentRepositoryInterface $contentRepo
     * @return mixed
     */
    public function getBuiltInFeaturePostByID($id, ContentRepositoryInterface $contentRepo);

    /**
     * Updates Built In Feature Post via ID
     *
     * @param $id
     * @param array $columns
     * @param ContentRepositoryInterface $contentRepo
     * @return mixed
     */
    public function updateBuiltInFeaturePostByID($id, array $columns, ContentRepositoryInterface $contentRepo);

    /**
     * Delete Built In Feature Post via ID
     *
     * @param $id
     * @param ContentRepositoryInterface $contentRepo
     * @return mixed
     */
    public function deleteBuiltInFeaturePostByID($id, ContentRepositoryInterface $contentRepo);

    /**
     * return list of Icons from Database
     *
     * @param IconRepositoryInterface $iconRepo
     * @return mixed
     */
    public function getAllIcons(IconRepositoryInterface $iconRepo);

    /**
     * return List of All Sample Website Posts
     *
     * @param ContentRepositoryInterface $contentRepo
     * @return mixed
     */
    public function getAllSampleWebsitePosts(ContentRepositoryInterface $contentRepo);

    /**
     * Create Sample Website Post and Saves to database
     *
     * @param array $columns
     * @param ContentRepositoryInterface $contentRepo
     * @param ImageRepositoryInterface $imageRepo
     * @return mixed
     */
    public function createSampleWebsitePost(array $columns, ContentRepositoryInterface $contentRepo, ImageRepositoryInterface $imageRepo);

    /**
     * Return Single Sample Website Post Via ID
     *
     * @param $id
     * @param ContentRepositoryInterface $contentRepo
     * @return mixed
     */
    public function getSampleWebsitePostByID($id, ContentRepositoryInterface $contentRepo);

    /**
     * Update Sample Website Post and Save changes to Database
     *
     * @param $id
     * @param array $columns
     * @param ContentRepositoryInterface $contentRepo
     * @param ImageRepositoryInterface $imageRepo
     * @return mixed
     */
    public function updateSampleWebsitePostByID($id, array $columns, ContentRepositoryInterface $contentRepo, ImageRepositoryInterface $imageRepo);

    /**
     * Delete Sample Website Post via ID
     *
     * @param $id
     * @param ContentRepositoryInterface $contentRepo
     * @return mixed
     */
    public function deleteSampleWebsitePostByID($id, ContentRepositoryInterface $contentRepo);

}