<?php

namespace App\Repositories;

use App\Contracts\Models\ImageModelInterface;
use App\Contracts\Models\SliderModelInterface;
use App\Contracts\Repositories\SliderRepositoryInterface;
use App\Contracts\Services\UploadServiceInterface;
use App\Repositories\AbstractRepositories\SliderRepositoryAbstract;
use App\Slider;
use Exception;
use Illuminate\Support\Facades\Auth;

class SliderRepository extends SliderRepositoryAbstract implements SliderRepositoryInterface{

    /**
     * @var SliderModelInterface
     */
    protected $model;

    /**
     * Uploaded Image destination
     *
     * @var
     */
    protected $destination;

    /**
     * @var UploadServiceInterface
     */
    protected $uploader;

    /**
     * SliderRepository constructor.
     *
     * @param SliderModelInterface $slider
     * @param UploadServiceInterface $uploadService
     */
    function __construct(SliderModelInterface $slider,UploadServiceInterface $uploadService)
    {
        $this->model = $slider;
        $this->destination = public_path('adminAssets/img');
        $this->uploader = $uploadService;
    }

    /**
     * Adds New Main Slider To Database via Model
     *
     * @param $type
     * @param array $columns
     * @return mixed
     * @throws Exception
     */
    public function createNewSlider($type,array $columns)
    {
        try{
            $credentials = $this->getCredentials($type,$columns);

            if(isset($columns['image'])){
                unset($columns['image']);
            }

            $this->getSliderModelFilled($credentials);

            if(! $this->model->save()){
                throw new Exception("Main Slider is not getting saved to database");
            }
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Creates Slider Record for database but doesn't save it
     *
     * @param $type
     * @param array $columns
     * @return mixed
     * @throws Exception
     */
    public function makeNewSlider($type, array $columns)
    {
        try{
            $credentials = $this->getCredentials($type,$columns);

            if(isset($columns['image'])){
                unset($columns['image']);
            }

            $this->getSliderModelFilled($credentials);

            return $this->model;
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Update Specific type of slider of given ID with given data.
     *
     * @param $type
     * @param $id
     * @param array $columns
     * @return mixed
     * @throws Exception
     */
    public function updateSlider($type, $id, array $columns)
    {
        try{
            $this->model = $this->model->where('type','=',$type)->where('uniqueId','=',$id)->first();

            $credentials = $this->getCredentials($type,$columns);

            if(isset($columns['image'])){

                unset($columns['image']);

            }

            $this->getSliderModelFilled($credentials);

            if(! $this->model->save()){

                throw new Exception("Main Slider changes are not getting saved to database");

            }

        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Return Updated model of slider of given ID with given data but doesn't save it.
     *
     * @param $type
     * @param $id
     * @param array $columns
     * @return mixed
     * @throws Exception
     */
    public function makeUpdateSlider($type, $id, array $columns)
    {
        try{
            $this->model = $this->model->where('type','=',$type)->where('uniqueId','=',$id)->first();

            $credentials = $this->getCredentials($type,$columns);

            if(isset($columns['image'])){

                unset($columns['image']);

            }

            $this->getSliderModelFilled($credentials);

            return $this->model;

        }
        catch(Exception $e){
            throw $e;
        }
    }


    /**
     * Delete Slider at given ID
     *
     * @param $type
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function deleteSlider($type, $id)
    {
        try{
            $slider = $this->model->where('type','=',$type)->where('uniqueId','=',$id)->first();

            $slider->delete();
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Insert Image to Images table and returns ID of newly inserted Image
     *
     * @param ImageModelInterface $image
     * @return mixed
     * @throws Exception
     * @internal param $filename
     */
    public function attachImage(ImageModelInterface $image)
    {
        try{
            dd($this->model->image()->save($image));
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Count Sliders with given type and ID
     *
     * @param $type
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function getSliderCountWithIdAndType($type, $id)
    {
        try{
            return $this->model->where('type','=',$type)->where('uniqueId','=',$id)->count();
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Return Slider Model if found on given Id
     *
     * @param $type
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function getSliderById($type,$id)
    {
        try{
            return $this->model->where('type','=',$type)->where('uniqueId','=',$id)->first();
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Return array of credentials with database columns names key
     *
     * @param $type
     * @param array $columns
     * @return mixed
     * @throws Exception
     */
    protected function getCredentials($type,array $columns)
    {
        try{
            return array(
                'type'          =>  $type,
                'title'         =>  $columns['title'],
                'tagline'       =>  $columns['tagline'],
                'button'        =>  isset($columns['button']),
                'buttonText'    =>  isset($columns['buttonText'])?$columns['buttonText']:null,
                'buttonUrl'     =>  isset($columns['buttonUrl'])?$columns['buttonUrl']:null,
                'featured'      =>  isset($columns['featured']),
                'uniqueId'      =>  uniqid(str_random(2)),
                'admin_id'      =>  Auth::guard('admin')->user()->id
            );
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Fill Slider Model with given column values
     *
     * @param array $columns
     * @return mixed
     * @throws Exception
     */
    protected function getSliderModelFilled(array $columns)
    {
        try{
            foreach($columns as $key => $value){
                $this->model->{$key}    =   $value;
            }
        }
        catch(Exception $e){
            throw $e;
        }
    }

}