<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 24/4/2016
 * Time: 9:37 AM
 */

namespace App\Contracts\Models;


interface UserProfileModelInterface extends ModelBaseInterface
{
    /**
     * Accessor for UserProfile User Relationship
     *
     * @return mixed
     */
    public function user();

    /**
     * Accessor for UserProfile Image Relationship
     *
     * @return mixed
     */
    public function image();
}