<?php

namespace App\Repositories;

use App\Contracts\Models\ContentModelInterface;
use App\Contracts\Repositories\ContentRepositoryInterface;
use App\Repositories\AbstractRepositories\ContentRepositoryAbstract;
use Exception;
use Illuminate\Support\Facades\Auth;

class ContentRepository extends ContentRepositoryAbstract implements ContentRepositoryInterface{

    protected $model;

    function __construct(ContentModelInterface $content)
    {
        $this->model = $content;
    }

    /**
     * return all Main Posts models
     *
     * @return mixed
     * @throws Exception
     */
    public function getAllMainPosts()
    {
        try{
            return $this->model->mainPost()->get();
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * return all featured main posts models
     *
     * @return mixed
     * @throws Exception
     */
    public function getAllFeaturedMainPosts()
    {
        try{
            return $this->model->active()->mainPost()->get();
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Return Content Model of given ID and Type
     *
     * @param $type
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function getContentById($type,$id)
    {
        try{
            return $this->model->where('type','=',$type)->where('uniqueId','=',$id)->first();
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Update given Content Type of ID and save it in Database
     *
     * @param $id
     * @param array $columns
     * @return mixed
     * @throws Exception
     */
    public function updateMainPostContent($id, array $columns)
    {
        try{
            $credentials = $this->getMainPostCredentials($columns);
            $this->model = $this->getContentById('main-post',$id);

            $this->model = $this->getModelFilledWithData($credentials);

            if( ! $this->model->save()){
                throw new Exception("Unable to update main post to database");
            }
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Make Content model of Given ID and Given Data but doesn't save to database
     *
     * @param $id
     * @param array $columns
     * @return ContentModelInterface
     * @throws Exception
     */
    public function makeUpdateMainPostContent($id, array $columns)
    {
        try{
            $credentials = $this->getMainPostCredentials($columns);
            $this->model = $this->getContentById('main-post',$id);

            $this->model = $this->getModelFilledWithData($credentials);

            return $this->model;
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Return Collection of Built-in-features Posts.
     *
     * @return mixed
     * @throws Exception
     */
    public function getBuiltInFeaturesPosts()
    {
        try{
            return $this->model->builtInFeatures()->get();
        }
        catch(Exception $e){
            throw $e;
        }
    }


    /**
     * Return instance of Built-In-feature post
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function getBuiltInFeaturePost($id)
    {
        try{
            return $this->model->builtInFeatures()->where('uniqueId','=',$id)->first();
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Create built-in-features post and saves it to database
     *
     * @param $columns
     * @return mixed
     * @throws Exception
     */
    public function createBuiltInFeaturesPost($columns)
    {
        try{
            $credentials = $this->getBuiltInFeaturesPostCredentials($columns);
            $this->model = $this->getModelFilledWithData($credentials);
            if(! $this->model->save()){
                throw new Exception("Saving BuiltIn features error");
            }
        }
        catch(Exception $e){
            throw $e;
        }
    }


    /**
     * Updates Built-In-Features post and saves it to database
     *
     * @param $columns
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function updateBuiltInFeaturesPost($columns,$id)
    {
        try{

            $this->model = $this->model->builtInFeatures()->where('uniqueId','=',$id)->first();

            $credentials = $this->getBuiltInFeaturesPostCredentials($columns);

            $this->getModelFilledWithData($credentials);

            if( ! $this->model->save()){
                throw new Exception("Saving update BuiltIn features error");
            }
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Delete Built-in-feature on given ID
     *
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function deleteBuiltInFeaturePost($id){
        try{
            return $this->model->builtInFeatures()->where('uniqueId','=',$id)->delete();
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Return Collection of Sample Website Posts from Database
     *
     * @return mixed
     * @throws Exception
     */
    public function getSampleWebsitesPosts()
    {
        try{
            return $this->model->sampleWebsites()->get();
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Return Single Sample Website Post via ID
     *
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function getSampleWebsitePostByID($id)
    {
        try{
            return $this->model->SampleWebsites()->where('uniqueId','=',$id)->first();
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Create Sample Websites Post and save it to Database
     *
     * @param array $columns
     * @return mixed
     * @throws Exception
     */
    public function makeSampleWebsitesPost(array $columns)
    {
        try{
            $credentials = $this->getSampleWebsitePostCredentials($columns);

            $this->getModelFilledWithData($credentials);

            return $this->model;
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Return Model of Sample Website Post of given ID with updated values but not save changes to database
     *
     * @param $id
     * @param array $columns
     * @return mixed
     * @throws Exception
     */
    public function makeUpdateSampleWebsitePostByID($id, array $columns){
        try{

            $this->model = $this->model->sampleWebsites()->where('uniqueId','=',$id)->first();
            $credentials = $this->getSampleWebsitePostCredentials($columns);
            if(isset($columns['image'])){
                unset($columns['image']);
            }
            $this->getModelFilledWithData($credentials);
            return $this->model;

        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Updates Sample Website and save changes to database
     *
     * @param $id
     * @param array $columns
     * @return mixed
     * @throws Exception
     */
    public function updateSampleWebsitePostByID($id, array $columns)
    {
        try{
            $this->model = $this->model->sampleWebsites()->where('uniqueId','=',$id)->first();
            $credentials = $this->getSampleWebsitePostCredentials($columns);
            if(isset($columns['image'])){
                unset($columns['image']);
            }
            $this->getModelFilledWithData($credentials);

            if( ! $this->model->save() ){
                throw new Exception("Error in Updating Sample Website Post");
            }
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Delete Sample Website via ID
     *
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function deleteSampleWebsitePostByID($id)
    {
        try{
            $isDeleted = $this->model->sampleWebsites()->where('uniqueId','=',$id)->delete();
            if(! $isDeleted){
                throw new Exception("Error in deleting Sample Website Post");
            }
            return $isDeleted;
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Return $credentials of Main Post
     *
     * @param array $columns
     * @return mixed
     * @throws Exception
     */
    protected function getMainPostCredentials(array $columns)
    {
        try{
            $credentials = array(
                'title'     =>  $columns['title'],
                'intro'     =>  $columns['intro']
            );
            return $credentials;
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Return credentials array of Built In Features post
     *
     * @param array $columns
     * @return mixed
     * @throws Exception
     */
    protected function getBuiltInFeaturesPostCredentials(array $columns)
    {
        try{
            $credentials = array(
                'title'     =>  $columns['title'],
                'intro'     =>  $columns['intro'],
                'icon_id'   =>  $columns['icon'],
                'admin_id'  =>  Auth::guard('admin')->user()->id,
                'type'      =>  'built-in-feature',
                'page'      =>  'homepage',
                'uniqueId'  =>  uniqid(str_random(2))
            );
            return $credentials;
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Return Credentials array of Sample Website Post
     *
     * @param array $columns
     * @return mixed
     * @throws Exception
     */
    protected function getSampleWebsitePostCredentials(array $columns)
    {
        try{
            if(!isset($columns['active'])){
                $columns['active']    =   false;
            }

            return array(
                'title'             =>  $columns['title'],
                'intro'             =>  $columns['intro'],
                'active'            =>  $columns['active'],
                'admin_id'          =>  Auth::guard('admin')->user()->id,
                'type'              =>  'sample',
                'page'              =>  'homepage',
                'uniqueId'          =>  uniqid(str_random(2))
            );
        }
        catch(Exception $e){
            throw $e;
        }
    }

}