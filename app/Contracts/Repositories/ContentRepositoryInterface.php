<?php

namespace App\Contracts\Repositories;


use App\Contracts\Models\ContentModelInterface;

interface ContentRepositoryInterface extends BaseRepositoryInterface {

    /**
     * return all Main Posts models
     *
     * @return mixed
     */
    public function getAllMainPosts();

    /**
     * return all featured main posts models
     *
     * @return mixed
     */
    public function getAllFeaturedMainPosts();

    /**
     * Return Content Model of given ID and Type
     *
     * @param $type
     * @param $id
     * @return mixed
     */
    public function getContentById($type,$id);

    /**
     * Update given Content Type of ID and save it in Database
     *
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function updateMainPostContent($id, array $columns);

    /**
     * Make Content model of Given ID and Given Data but doesn't save to database
     *
     * @param $id
     * @param array $columns
     * @return ContentModelInterface
     */
    public function makeUpdateMainPostContent($id, array $columns);

    /**
     * Return Collection of Built-in-features Posts.
     *
     * @return mixed
     */
    public function getBuiltInFeaturesPosts();

    /**
     * Return instance of Built-In-feature post
     *
     * @param $id
     * @return mixed
     */
    public function getBuiltInFeaturePost($id);

    /**
     * Create built-in-features post and saves it to database
     *
     * @param $columns
     * @return mixed
     */
    public function createBuiltInFeaturesPost($columns);

    /**
     * Updates Built-In-Features post and saves it to database
     *
     * @param $columns
     * @param $id
     * @return mixed
     */
    public function updateBuiltInFeaturesPost($columns,$id);

    /**
     * Delete Built-in-feature on given ID
     *
     * @param $id
     * @return mixed
     */
    public function deleteBuiltInFeaturePost($id);

    /**
     * Return Collection of Sample Website posts from Database
     *
     * @return mixed
     */
    public function getSampleWebsitesPosts();

    /**
     * Return Single Sample Website Post via ID
     *
     * @param $id
     * @return mixed
     */
    public function getSampleWebsitePostByID($id);

    /**
     * Create Sample Websites Post and save it to Database
     *
     * @param array $columns
     * @return mixed
     */
    public function makeSampleWebsitesPost(array $columns);

    /**
     * Return Model of Sample Website Post of given ID with updated values but not save changes to database
     *
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function makeUpdateSampleWebsitePostByID($id, array $columns);

    /**
     * Updates Sample Website and save changes to database
     *
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function updateSampleWebsitePostByID($id, array $columns);

    /**
     * Delete Sample Website via ID
     *
     * @param $id
     * @return mixed
     */
    public function deleteSampleWebsitePostByID($id);

}