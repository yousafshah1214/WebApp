<?php

namespace App;

use App\Contracts\Models\SocialUserModelInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SocialUser Eloquent Model
 *
 * @package App
 */
class SocialUser extends Model implements SocialUserModelInterface
{
    /**
     * Table name for this socialUser Model
     *
     * @var string
     */
    protected   $table        =   "social_users";

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
