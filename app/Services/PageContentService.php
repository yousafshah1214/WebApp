<?php

namespace App\Services;


use App\Contracts\Repositories\ContentRepositoryInterface;
use App\Contracts\Repositories\IconRepositoryInterface;
use App\Contracts\Repositories\ImageRepositoryInterface;
use App\Contracts\Services\PageContentServiceInterface;
use App\Contracts\Services\UploadServiceInterface;
use Exception;

class PageContentService extends BaseService implements PageContentServiceInterface
{
    protected $destination;

    protected $relativeDescription;

    protected $mainPostType;

    protected $uploader;

    protected $directoryForImageUpload;

    protected $relativeDirectoryOfImage;

    protected $imageRepo;

    function __construct(UploadServiceInterface $uploader,ImageRepositoryInterface $imageRepository)
    {
        $this->destination = public_path('adminAssets/img');
        $this->relativeDestination = 'adminAssets/img';

        $this->mainPostType = 'main-post';
        $this->uploader = $uploader;
        $this->directoryForImageUpload = public_path('adminAssets/img');
        $this->relativeDirectoryOfImage = 'adminAssets/img';
        $this->imageRepo = $imageRepository;
    }

    /**
     * Update Main Post In database
     *
     * @param $id
     * @param array $columns
     * @param ContentRepositoryInterface $contentRepo
     * @return mixed
     * @throws Exception
     */
    public function updateMainPostContent($id, array $columns, ContentRepositoryInterface $contentRepo)
    {
        try{
            if(isset($columns['image'])){
                $content = $contentRepo->makeUpdateMainPostContent($id,$columns);

                $filename = $this->uploader->uploadImage($columns['image'],$this->directoryForImageUpload);

                $this->imageRepo->create($filename,$this->relativeDirectoryOfImage);

                $this->imageRepo->attachContent($content);
            }
            else{
                $contentRepo->updateMainPostContent($id,$columns);
            }
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Create Built In Features Post with given column names with values
     *
     * @param array $columns
     * @param ContentRepositoryInterface $contentRepo
     * @return mixed
     * @throws Exception
     */
    public function createBuiltInFeaturePost(array $columns, ContentRepositoryInterface $contentRepo)
    {
        try {
            $contentRepo->createBuiltInFeaturesPost($columns);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * return list of Built In Features Posts
     * @param ContentRepositoryInterface $contentRepo
     * @return mixed
     * @throws Exception
     */
    public function getAllBuiltInFeaturePosts(ContentRepositoryInterface $contentRepo)
    {
        try {
            return $contentRepo->getBuiltInFeaturesPosts();
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Return Single Post of Built In Feature from Database
     *
     * @param $id
     * @param ContentRepositoryInterface $contentRepo
     * @return mixed
     * @throws Exception
     */
    public function getBuiltInFeaturePostByID($id, ContentRepositoryInterface $contentRepo)
    {
        try {
            return $contentRepo->getBuiltInFeaturePost($id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Updates Built In Feature Post via ID
     *
     * @param $id
     * @param array $columns
     * @param ContentRepositoryInterface $contentRepo
     * @return mixed
     * @throws Exception
     */
    public function updateBuiltInFeaturePostByID($id, array $columns , ContentRepositoryInterface $contentRepo)
    {
        try {
            $contentRepo->updateBuiltInFeaturesPost($columns,$id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Delete Built In Feature Post via ID
     *
     * @param $id
     * @param ContentRepositoryInterface $contentRepo
     * @return mixed
     * @throws Exception
     */
    public function deleteBuiltInFeaturePostByID($id, ContentRepositoryInterface $contentRepo)
    {
        try {
            return $contentRepo->deleteBuiltInFeaturePost($id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * return list of Icons from Database
     *
     * @param IconRepositoryInterface $iconRepo
     * @return mixed
     * @throws Exception
     */
    public function getAllIcons(IconRepositoryInterface $iconRepo)
    {
        try {
            return $iconRepo->getAllIconsWithIdAndName();
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * return List of All Sample Website Posts
     *
     * @param ContentRepositoryInterface $contentRepo
     * @return mixed
     * @throws Exception
     */
    public function getAllSampleWebsitePosts(ContentRepositoryInterface $contentRepo)
    {
        try {
            return $contentRepo->getSampleWebsitesPosts();
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Create sample website post and saves to database
     *
     * @param array $columns
     * @param ContentRepositoryInterface $contentRepo
     * @param ImageRepositoryInterface $imageRepository
     * @return mixed|void
     * @throws Exception
     */
    public function createSampleWebsitePost(array $columns, ContentRepositoryInterface $contentRepo, ImageRepositoryInterface $imageRepository ){
        try{
            $sampleWebsite = $contentRepo->makeSampleWebsitesPost($columns);

            $filename = $this->uploader->uploadImage($columns['image'],$this->destination);

            $imageRepository->create($filename,$this->relativeDestination);

            $imageRepository->attachContent($sampleWebsite);
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Return Single Sample Website Post Via ID
     *
     * @param $id
     * @param ContentRepositoryInterface $contentRepo
     * @return mixed
     * @throws Exception
     */
    public function getSampleWebsitePostByID($id, ContentRepositoryInterface $contentRepo)
    {
        try {
            return $contentRepo->getSampleWebsitePostByID($id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Update Sample Website Post and Save changes to Database
     *
     * @param $id
     * @param array $columns
     * @param ContentRepositoryInterface $contentRepo
     * @param ImageRepositoryInterface $imageRepository
     * @return mixed
     * @throws Exception
     * @internal param ImageRepositoryInterface $imageRepo
     */
    public function updateSampleWebsitePostByID($id, array $columns, ContentRepositoryInterface $contentRepo, ImageRepositoryInterface $imageRepository)
    {
        try{
            if(isset($columns['image'])){
                $sampleWebsite = $contentRepo->makeUpdateSampleWebsitePostByID($id,$columns);

                $filename = $this->uploader->uploadImage($columns['image'],$this->destination);

                $imageRepository->create($filename,$this->relativeDestination);

                $imageRepository->attachContent($sampleWebsite);
            }
            else{
                $contentRepo->updateSampleWebsitePostByID($id,$columns);
            }
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Delete Sample Website Post via ID
     *
     * @param $id
     * @param ContentRepositoryInterface $contentRepo
     * @return mixed
     */
    public function deleteSampleWebsitePostByID($id, ContentRepositoryInterface $contentRepo)
    {
        $isDeleted = $contentRepo->deleteSampleWebsitePostByID($id);

        return $isDeleted;
    }


}