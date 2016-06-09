<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 24/4/2016
 * Time: 9:30 AM
 */

namespace App\Contracts\Models;

use ArrayAccess;
use JsonSerializable;
use Illuminate\Contracts\Queue\QueueableEntity;
use Illuminate\Contracts\Routing\UrlRoutable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

interface ModelBaseInterface extends ArrayAccess,Arrayable, Jsonable, JsonSerializable, QueueableEntity, UrlRoutable
{

}