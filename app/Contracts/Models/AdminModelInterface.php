<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 17/6/2016
 * Time: 10:39 AM
 */

namespace App\Contracts\Models;


use Illuminate\Contracts\Auth\Authenticatable;

interface AdminModelInterface extends ModelBaseInterface, Authenticatable
{
    /**
     * Accessor for Admin Slider Relationship
     *
     * @return mixed
     */
    public function slider();

    /**
     * Accessor for Admin Content Relationship
     *
     * @return mixed
     */
    public function content();

    /**
     * Accessor for Admin Icons Relationship
     *
     * @return mixed
     */
    public function icon();
}