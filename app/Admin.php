<?php

namespace App;

use App\Contracts\Models\AdminModelInterface;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements AdminModelInterface
{
    use Authenticatable;

    /**
     * Accessor for Admin Slider Relationship
     *
     * @return mixed
     */
    public function slider()
    {
        return $this->hasMany('App\Slider');
    }

    /**
     * Accessor for Admin Content Relationship
     *
     * @return mixed
     */
    public function content()
    {
        return $this->hasMany('App\Content');
    }

    /**
     * Accessor for Admin Icons Relationship
     *
     * @return mixed
     */
    public function icon()
    {
        return $this->hasMany('App\Icon');
    }

}
