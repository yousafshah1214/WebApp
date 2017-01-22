<?php

namespace App\Contracts\Repositories;


use App\Contracts\Models\ImageModelInterface;

interface SliderRepositoryInterface extends BaseRepositoryInterface {

    /**
     * Adds New Main Slider To Database via Model and saves it
     *
     * @param $type
     * @param array $columns
     * @return mixed
     */
    public function createNewSlider($type,array $columns);

    /**
     * Creates Slider Record for database but doesn't save it
     *
     * @param $type
     * @param array $columns
     * @return mixed
     */
    public function makeNewSlider($type,array $columns);

    /**
     * Update Specific type of slider of given ID with given data.
     *
     * @param $type
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function updateSlider($type, $id, array $columns);

    /**
     * return Updated model of slider of given ID with given data but doesn't save it.
     *
     * @param $type
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function makeUpdateSlider($type, $id, array $columns);

    /**
     * Delete Slider at given ID
     *
     * @param $type
     * @param $id
     * @return mixed
     */
    public function deleteSlider($type, $id);

    /**
     * Attach image to Slider Model
     *
     * @param ImageModelInterface $image
     * @return mixed
     */
    public function attachImage(ImageModelInterface $image);

    /**
     * Return Slider Model if found on given ID
     *
     * @param $type
     * @param $id
     * @return mixed
     */
    public function getSliderById($type,$id);

    /**
     * Count Sliders with given type and ID
     *
     * @param $type
     * @param $id
     * @return mixed
     */
    public function getSliderCountWithIdAndType($type, $id);
}