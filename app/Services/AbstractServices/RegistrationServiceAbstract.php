<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 26/4/2016
 * Time: 4:53 PM
 */

namespace App\Services\AbstractServices;


use App\Contracts\Repositories\SocialUserRepositoryInterface;
use App\Services\BaseService;

abstract class RegistrationServiceAbstract extends BaseService
{
    /**
     * Checks weather User is Registering via Social
     *
     * @param $type
     * @return mixed
     */
    abstract protected function isSocialUser($type);

    /**
     * makes sure that SocialUserRepositoryInterface Obj is not null
     *
     * @param SocialUserRepositoryInterface $socialUserRepository
     * @return mixed
     */
    abstract protected function isSocialUserRepositoryAvailable(SocialUserRepositoryInterface $socialUserRepository);
}