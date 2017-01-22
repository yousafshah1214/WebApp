<?php

namespace App\Repositories;

use App\Contracts\Models\ContentModelInterface;
use App\Contracts\Models\ImageModelInterface;
use App\Contracts\Models\SliderModelInterface;
use App\Contracts\Repositories\ContentRepositoryInterface;
use App\Contracts\Repositories\ImageRepositoryInterface;
use Exception;

class ImageRepository extends BaseRepository implements ImageRepositoryInterface{

    protected $model;

    function __construct(ImageModelInterface $image)
    {
        $this->model = $image;
    }

    /**
     * Creates Image Record For Database and saves it
     *
     * @param $imageFilename
     * @param $destination
     * @return mixed
     * @throws Exception
     */
    public function create($imageFilename, $destination)
    {
        try{
            $this->getCredentialsOfImageFilledToModel($imageFilename, $destination);

            if( ! $this->model->save()){
                throw new Exception('Unable to save Slider Image to database');
            }
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Creates Image record ready for database but doesn't save it.
     *
     * @param $imageFilename
     * @param $destination
     * @return ImageModelInterface
     * @throws Exception
     */
    public function make($imageFilename,$destination){

        try{
            $this->getCredentialsOfImageFilledToModel($imageFilename, $destination);

            return $this->model;
        }
        catch(Exception $e){
            throw $e;
        }

    }

    /**
     * Attaches Slider-Image Relationship
     *
     * @param SliderModelInterface| $slider
     * @return mixed
     * @throws Exception
     */
    public function attachSlider(SliderModelInterface $slider)
    {
        try{
            $this->model->slider()->save($slider);
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Attaches Content-Image Relationship
     *
     * @param ContentModelInterface $content
     * @return mixed
     * @throws Exception
     */
    public function attachContent(ContentModelInterface $content)
    {
        try{
            $this->model->content()->save($content);
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * @param $imageFilename
     * @param $destination
     * @throws Exception
     */
    protected function getCredentialsOfImageFilledToModel($imageFilename, $destination)
    {
        try{
            $this->model->filename = $imageFilename;
            $this->model->directory = $destination;
        }
        catch(Exception $e){
            throw $e;
        }
    }


}