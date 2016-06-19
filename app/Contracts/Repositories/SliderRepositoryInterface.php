<?php

namespace App\Contracts\Repositories;


interface SliderRepositoryInterface extends BaseRepositoryInterface {

    /**
     * Adds New Main Slider To Database via Model
     *
     * @param array $columns
     * @return mixed
     */
    public function addNewMainSlider(array $columns);
}