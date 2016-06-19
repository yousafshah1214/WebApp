<?php

namespace App\Repositories;

use App\Contracts\Models\SliderModelInterface;
use App\Contracts\Repositories\SliderRepositoryInterface;
use App\Repositories\AbstractRepositories\SliderRepositoryAbstract;
use Exception;

class SliderRepository extends SliderRepositoryAbstract implements SliderRepositoryInterface{

    /**
     * @var SliderModelInterface
     */
    protected $model;

    /**
     * @var Uploaded Image destination
     */
    protected $destination;

    /**
     * SliderRepository constructor.
     *
     * @param SliderModelInterface $slider
     */
    function __construct(SliderModelInterface $slider)
    {
        $this->model = $slider;
        $this->destination = resource_path('assets/img/admin');
    }

    /**
     * Adds New Main Slider To Database via Model
     *
     * @param array $columns
     * @return mixed
     * @throws Exception
     */
    public function addNewMainSlider(array $columns)
    {
        try{
            $credentials = $this->getCredentials('main-slider',$columns);

            $filename = $this->uploadImage($columns['image']);

            $credentials['image']   =   $filename;

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
                'tagLine'       =>  $columns['tagline'],
                'button'        =>  isset($columns['button']),
                'buttonText'    =>  isset($columns['buttonText'])?$columns['buttonText']:null,
                'buttonUrl'     =>  isset($columns['buttonUrl'])?$columns['buttonUrl']:null,
                'featured'      =>  isset($columns['featured'])
            );
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Upload Image and returns file storage address
     *
     * @param $image
     * @return mixed
     * @throws Exception
     */
    protected function uploadImage($image)
    {
        try{
            if($image->isValid()){

                $filename = time().".".$image->getClientOriginalExtension();

                $image->move($this->destination,$filename);

                return $filename;
            }
            else{
                throw new Exception("Image is inValid");
            }
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