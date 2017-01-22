<?php

namespace App;

use App\Contracts\Models\ImageModelInterface;
use Illuminate\Database\Eloquent\Model;

class Image extends Model implements ImageModelInterface
{

    /**
     * Relationship of Slider Model
     *
     * @return mixed
     */
    public function slider()
    {
        return $this->hasOne('App\Slider');
    }

    /**
     * Relationship of User Profiles Model
     *
     * @return mixed
     */
    public function userProfile()
    {
        return $this->hasOne('App\UserProfile');
    }

    /**
     * Relationship of User Profiles Model
     *
     * @return mixed
     */
    public function content()
    {
        return $this->hasOne('App\Content');
    }
}
