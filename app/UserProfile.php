<?php

namespace App;

use App\Contracts\Models\UserProfileModelInterface;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model implements UserProfileModelInterface
{

    /**
     * Table name for this model
     *
     * @var string
     */
    protected $table    =   "user_profiles";

    /**
     * @var array
     */
    protected $guarded  =   array('id');

    /**
     * Accessor for UserProfile User Relationship
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Accessor for UserProfile Image Relationship
     *
     * @return mixed
     */
    public function image()
    {
        return $this->belongsTo('App\Image');
    }
}
