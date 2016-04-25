<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 24/4/2016
 * Time: 9:28 AM
 */

namespace App\Contracts\Models;


interface UserModelInterface extends ModelBaseInterface
{
    /**
     * Method for User - UserProfiles Relationship
     *
     * @return mixed
     */
    public function profile();
}