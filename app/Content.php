<?php

namespace App;

use App\Contracts\Models\ContentModelInterface;
use Illuminate\Database\Eloquent\Model;

class Content extends Model implements ContentModelInterface
{

    /**
     * Accessor for Content Image Relationship
     *
     * @return mixed
     */
    public function image()
    {
        return $this->belongsTo('App\Image');
    }

    /**
     * Accessor for Content Admin Relationship
     *
     * @return mixed
     */
    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }

    /**
     * Local scope for main post content
     *
     * @param $query
     * @return mixed
     */
    public function scopeMainPost($query)
    {
        return $query->where('type','=','main-post');
    }

    /**
     * Local scope for Active content
     *
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)

    {
        return $query->where('active','=',1);
    }

    /**
     * Local Scope for Built in feature posts
     *
     * @param $query
     * @return mixed
     */
    public function scopeBuiltInFeatures($query){
        return $query->where('type','=','built-in-feature');
    }

    /**
     * Local scope for Sample websites post content
     *
     * @param $query
     * @return mixed
     */
    public function scopeSampleWebsites($query)
    {
        return $query->where('type','=','sample');
    }
}
