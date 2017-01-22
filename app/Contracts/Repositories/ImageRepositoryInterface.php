<?php

namespace App\Contracts\Repositories;


use App\Contracts\Models\ContentModelInterface;
use App\Contracts\Models\SliderModelInterface;

interface ImageRepositoryInterface extends BaseRepositoryInterface {

    /**
     * Creates Image Record for database but doesn't save it
     *
     * @param $filename
     * @param $destination
     * @return mixed
     */
    public function make($filename, $destination);

    /**
     * Attaches Slider-Image Relationship
     *
     * @param SliderModelInterface $slider
     * @return mixed
     */
    public function attachSlider(SliderModelInterface $slider);

    /**
     * Creates Image Record For Database and saves it
     *
     * @param $filename
     * @param $destination
     * @return mixed
     */
    public function create($filename, $destination);

    /**
     * Attaches Content-Image Relationship
     *
     * @param ContentModelInterface $content
     * @return mixed
     */
    public function attachContent(ContentModelInterface $content);

}