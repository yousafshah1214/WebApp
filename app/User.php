<?php

namespace App;

use App\Contracts\Models\UserModelInterface;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model implements UserModelInterface
{
    use Authenticatable;

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

    /**
     * Method for User - SocialUser Relationship
     *
     * @return mixed
     */
    public function social(){
        return $this->hasOne('App\SocialUser');
    }

    /**
     *
     *
     */
    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);
    }

}
