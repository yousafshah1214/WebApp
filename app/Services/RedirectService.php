<?php

namespace App\Services;


use App\Contracts\Services\RedirectServiceInterface;
use App\Services\AbstractServices\RedirectServiceAbstract;

class RedirectService extends RedirectServiceAbstract implements RedirectServiceInterface
{

    /**
     * Redirects User back to home page with or without message
     *
     * @param string|null|string $messageKey
     * @param string $messageLangKey
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function toHome($messageKey = null, $messageLangKey = null)
    {
        return $this->makeRedirect('home',$messageKey,$messageLangKey);
    }

    /**
     * Redirects User back to Signup page with or without message
     *
     * @param string|null $messageKey
     * @param string|null $messageLangKey
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toSignup($messageKey = null, $messageLangKey = null)
    {
        return $this->makeRedirect('signup.index',$messageKey,$messageLangKey);
    }

    /**
     * Redirects to DashBoard page
     *
     * @param null $messageKey
     * @param null $messageLangKey
     * @return mixed
     */
    public function toDashboard($messageKey = null, $messageLangKey = null)
    {
        return $this->makeRedirect('dashboard',$messageKey,$messageLangKey);
    }

    /**
     * Redirects to Login Page
     *
     * @param null $messageKey
     * @param null $messageLangKey
     * @return mixed
     */
    public function toLogin($messageKey = null, $messageLangKey = null)
    {
        return $this->makeRedirect('login.index',$messageKey,$messageLangKey);
    }

    /**
     * Make Redirect to given route with given parameters
     *
     * @param $route
     * @param null $messageKey
     * @param null $messageLangKey
     * @return mixed
     */
    protected function makeRedirect($route, $messageKey = null, $messageLangKey = null)
    {
        $redirect = redirect()->route($route);

        if(! is_null($messageKey) && ! is_null($messageLangKey)){
            $redirect = $redirect->with($messageKey,trans($messageLangKey));
        }

        return $redirect;
    }

}