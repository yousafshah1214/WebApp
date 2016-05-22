<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 17/5/2016
 * Time: 8:14 AM
 */

namespace App\Services\AbstractServices;


use App\Services\BaseService;

abstract class RedirectServiceAbstract extends BaseService
{
    /**
     * Make Redirect to given route with given parameters
     *
     * @param $route
     * @param null $messageKey
     * @param null $messageLangKey
     * @return mixed
     */
    abstract protected function makeRedirect($route, $messageKey = null, $messageLangKey = null);

    /**
     * Set given variables to redirect object
     *
     * @param $redirect
     * @param null $messageKey
     * @param null $messageLangKey
     * @return mixed
     */
    abstract protected function setRedirectMessage($redirect, $messageKey = null, $messageLangKey = null);
}