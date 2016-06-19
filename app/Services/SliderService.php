<?php

namespace App\Services;


use App\Contracts\Models\SliderModelInterface;
use App\Contracts\Repositories\SliderRepositoryInterface;
use App\Contracts\Services\SliderServiceInterface;
use Exception;

class SliderService extends BaseService implements SliderServiceInterface
{

    /**
     * Creates new Slider in Database via Repository
     *
     * @param array $columns
     * @param SliderRepositoryInterface $sliderRepository
     * @return mixed
     * @throws Exception
     */
    public function createMainSlider(array $columns, SliderRepositoryInterface $sliderRepository)
    {
        try{
            $sliderRepository->addNewMainSlider($columns);
        }
        catch(Exception $e){
            throw $e;
        }
    }
}