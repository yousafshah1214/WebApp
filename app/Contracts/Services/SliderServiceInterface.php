<?php

namespace App\Contracts\Services;


use App\Contracts\Repositories\SliderRepositoryInterface;

interface SliderServiceInterface extends BaseServiceInterface
{
    /**
     * Creates new Slider in Database via Repository
     *
     * @param $type
     * @param array $columns
     * @param SliderRepositoryInterface $sliderRepository
     * @return mixed
     */
    public function createSlider($type,array $columns , SliderRepositoryInterface $sliderRepository);

    /**
     * Update Slider info
     *
     * @param $type
     * @param $id
     * @param array $columns
     * @param SliderRepositoryInterface $sliderRepository
     * @return mixed
     */
    public function updateSlider($type, $id, array $columns, SliderRepositoryInterface $sliderRepository);

    /**
     * Delete Slider of given ID
     *
     * @param $type
     * @param $id
     * @param SliderRepositoryInterface $sliderRepository
     * @return mixed
     */
    public function deleteSlider($type, $id, SliderRepositoryInterface $sliderRepository);
    /**
     * Get Slider by Id
     *
     * @param $type
     * @param $id
     * @param SliderRepositoryInterface $sliderRepository
     * @return mixed
     */
    public function getSliderById($type,$id, SliderRepositoryInterface $sliderRepository);
}