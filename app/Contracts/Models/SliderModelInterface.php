<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 17/6/2016
 * Time: 10:38 AM
 */

namespace App\Contracts\Models;


interface SliderModelInterface extends ModelBaseInterface
{

    /**
     * Relationship method for Image Model
     *
     * @return mixed
     */
    public function image();

    /**
     * Relationship method for Admin Model
     *
     * @return mixed
     */
    public function admin();

}