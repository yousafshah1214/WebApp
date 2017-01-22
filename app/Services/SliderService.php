<?php

namespace App\Services;


use App\Contracts\Models\SliderModelInterface;
use App\Contracts\Repositories\ImageRepositoryInterface;
use App\Contracts\Repositories\SliderRepositoryInterface;
use App\Contracts\Services\SliderServiceInterface;
use App\Contracts\Services\UploadServiceInterface;
use Exception;

class SliderService extends BaseService implements SliderServiceInterface
{

    /**
     * @var ImageRepositoryInterface
     */
    private $imageRepository;

    /**
     * @var UploadServiceInterface
     */
    private $uploader;
    /**
     * @var string
     */
    private $destination;

    /**
     * SliderService constructor.
     * @param ImageRepositoryInterface $imageRepository
     * @param UploadServiceInterface $uploader
     */
    function __construct(ImageRepositoryInterface $imageRepository, UploadServiceInterface $uploader)
    {
        $this->imageRepository = $imageRepository;
        $this->uploader = $uploader;
        $this->destination = public_path('adminAssets/img');
        $this->relativeDestination = 'adminAssets/img';
    }

    /**
     * Creates new Slider in Database via Repository
     *
     * @param $type
     * @param array $columns
     * @param SliderRepositoryInterface $sliderRepository
     * @return mixed
     * @throws Exception
     */
    public function createSlider($type,array $columns, SliderRepositoryInterface $sliderRepository)
    {
        try{
            $slider = $sliderRepository->makeNewSlider($type,$columns);

            $filename = $this->uploader->uploadImage($columns['image'],$this->destination);

            $this->imageRepository->create($filename,$this->relativeDestination);

            $this->imageRepository->attachSlider($slider);
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Update Slider Info
     *
     * @param $type
     * @param $id
     * @param array $columns
     * @param SliderRepositoryInterface $sliderRepository
     * @return mixed|void
     * @throws Exception
     */
    public function updateSlider($type, $id, array $columns, SliderRepositoryInterface $sliderRepository)
    {
        try{

            if(isset($columns['image'])){

                $slider = $sliderRepository->makeUpdateSlider($type, $id,$columns);

                $filename = $this->uploader->uploadImage($columns['image'],$this->destination);

                $this->imageRepository->create($filename,$this->relativeDestination);

                $this->imageRepository->attachSlider($slider);
            }
            else{

                $sliderRepository->updateSlider($type, $id, $columns);

            }
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Delete Slider of given ID
     *
     * @param $type
     * @param $id
     * @param SliderRepositoryInterface $sliderRepository
     * @return mixed
     * @throws Exception
     */
    public function deleteSlider($type, $id, SliderRepositoryInterface $sliderRepository)
    {
        try{
            $sliderRepository->deleteSlider($type,$id);
        }
        catch(Exception $e) {
            throw $e;
        }
    }

    /**
     * Get Slider by Id
     *
     * @param $type
     * @param $id
     * @param SliderRepositoryInterface $sliderRepository
     * @return mixed
     * @throws Exception
     */
    public function getSliderById($type,$id,SliderRepositoryInterface $sliderRepository)
    {
        try{
            if($sliderRepository->getSliderCountWithIdAndType($type,$id) > 0) {
                return $sliderRepository->getSliderById($type,$id);
            }
            else{
                throw new Exception("Slider Not Found");
            }
        }
        catch(Exception $e){
            throw $e;
        }
    }

}