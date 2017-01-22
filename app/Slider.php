<?php

namespace App;

use App\Contracts\Models\SliderModelInterface;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model implements SliderModelInterface
{

    /**
     * Relationship method for Image Model
     *
     * @return mixed
     */
    public function image()
    {
        return $this->belongsTo('App\Image');
    }

    /**
     * Relationship method for Admin Model
     *
     * @return mixed
     */
    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }
}
