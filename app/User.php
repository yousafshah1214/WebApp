<?php

namespace App;

use App\Contracts\Models\UserModelInterface;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements UserModelInterface
{
    protected $guarded = array('');

    /**
     * Method for User - UserProfiles Relationship
     *
     * @return mixed
     */
    public function profile()
    {
        return $this->hasOne('App\UserProfile');
    }
}
