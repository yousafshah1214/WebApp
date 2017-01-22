<?php

namespace App;

use App\Contracts\Models\IconModelInterface;
use Illuminate\Database\Eloquent\Model;

class Icon extends Model implements IconModelInterface
{

    /**
     * Accessor for Icon Admin Relationship
     *
     * @return mixed
     */
    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }
}
