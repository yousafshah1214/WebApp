<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 24/4/2016
 * Time: 9:28 AM
 */

namespace App\Contracts\Models;


use Illuminate\Contracts\Auth\Authenticatable;

interface UserModelInterface extends ModelBaseInterface,Authenticatable
{
    /**
     * Method for User - UserProfiles Relationship
     *
     * @return mixed
     */
    public function profile();

    /**
     * Method for User - SocialUser Relationship
     *
     * @return mixed
     */
    public function social();
}