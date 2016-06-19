<?php

namespace App\Contracts\Services;


use App\Contracts\Repositories\SliderRepositoryInterface;

interface SliderServiceInterface extends BaseServiceInterface
{
    /**
     * Creates new Slider in Database via Repository
     *
     * @param array $columns
     * @param SliderRepositoryInterface $sliderRepository
     * @return mixed
     */
    public function createMainSlider(array $columns , SliderRepositoryInterface $sliderRepository);
}