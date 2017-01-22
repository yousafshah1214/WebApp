<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 24/6/2016
 * Time: 9:53 PM
 */

namespace App\Contracts\Models;

Interface  ImageModelInterface extends ModelBaseInterface
{
    /**
     * Relationship of Slider Model
     *
     * @return mixed
     */
    public function slider();

    /**
     * Relationship of User Profiles Model
     *
     * @return mixed
     */
    public function userProfile();

    /**
     * Relationship of User Profiles Model
     *
     * @return mixed
     */
    public function content();
}