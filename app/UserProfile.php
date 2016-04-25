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

    protected $guarded  =   array('id');

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
