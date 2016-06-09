<?php

namespace App;

use App\Contracts\Models\ModelBaseInterface;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableInterface;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements ModelBaseInterface, AuthenticatableInterface
{
    use Authenticatable;
}
