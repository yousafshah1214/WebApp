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

}