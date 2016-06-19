<?php

namespace App;

use App\Contracts\Models\AdminModelInterface;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements AdminModelInterface
{
    use Authenticatable;
}
