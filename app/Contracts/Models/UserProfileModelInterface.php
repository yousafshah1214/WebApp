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
    public function user();
}