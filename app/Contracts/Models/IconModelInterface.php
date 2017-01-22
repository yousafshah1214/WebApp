<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 25/6/2016
 * Time: 5:18 PM
 */

namespace App\Contracts\Models;


interface IconModelInterface extends ModelBaseInterface
{
    /**
     * Accessor for Icon Admin Relationship
     *
     * @return mixed
     */
    public function admin();
}