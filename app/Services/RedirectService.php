<?php

namespace App\Services;


use App\Contracts\Services\RedirectServiceInterface;
use App\Services\AbstractServices\RedirectServiceAbstract;
use Exception;

class RedirectService extends RedirectServiceAbstract implements RedirectServiceInterface
{

    /**
     * Redirects User back to home page with or without message
     *
     * @param string|null|string $messageKey
     * @param string $messageLangKey
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     * @throws Exception
     */
    public function toHome($messageKey = null, $messageLangKey = null)
    {
        try{
            return $this->makeRedirect('home',$messageKey,$messageLangKey);
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Redirects User back to Signup page with or without message
     *
     * @param string|null $messageKey
     * @param string|null $messageLangKey
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     */
    public function toSignup($messageKey = null, $messageLangKey = null)
    {
        try{
            return $this->makeRedirect('signup.index',$messageKey,$messageLangKey);
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Redirects to DashBoard page
     *
     * @param null $messageKey
     * @param null $messageLangKey
     * @return mixed
     * @throws Exception
     */
    public function toDashboard($messageKey = null, $messageLangKey = null)
    {
        try{
            return $this->makeRedirect('dashboard',$messageKey,$messageLangKey);
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Redirects to Login Page
     *
     * @param null $messageKey
     * @param null $messageLangKey
     * @return mixed
     * @throws Exception
     */
    public function toLogin($messageKey = null, $messageLangKey = null)
    {
        try{
            return $this->makeRedirect('login.index',$messageKey,$messageLangKey);
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Redirects to previous page.
     *
     * @param null $messageKey
     * @param null $messageLangKey
     * @return mixed
     * @throws Exception
     */
    public function toPreviousPage($messageKey = null, $messageLangKey = null)
    {
        try{
            $route = redirect()->back();

            $redirect = $this->setRedirectMessage($route,$messageKey,$messageLangKey);

            return $redirect;
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Redirects User to intended page.
     *
     * @param null $messageKey
     * @param null $messageLangKey
     * @return mixed
     * @throws Exception
     */
    public function toIntendedPage($messageKey = null, $messageLangKey = null)
    {
        try{
            $route = redirect()->intended('dashboard');

            $redirect = $this->setRedirectMessage($route,$messageKey,$messageLangKey);

            return $redirect;
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Redirects User to Main SLiders List Page
     *
     * @param null $messageKey
     * @param null $messageLangKey
     * @return mixed
     * @throws Exception
     */
    public function toMainSlidersListPage($messageKey = null, $messageLangKey = null)
    {
        try{
            return $this->makeRedirect('admin.slider.main',$messageKey,$messageLangKey);
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Redirects User to Main Posts List Page
     *
     * @param null $messageKey
     * @param null $messageLangKey
     * @return mixed
     * @throws Exception
     */
    public function toMainPostsListPage($messageKey = null, $messageLangKey = null)
    {
        try{
            return $this->makeRedirect('admin.homepage.main-post.index',$messageKey,$messageLangKey);
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Redirect User to BuiltIn Features Posts List page
     *
     * @param null $messageKey
     * @param null $messageLangKey
     * @return mixed
     * @throws Exception
     */
    public function toBuiltInFeaturesPostsListPage($messageKey = null, $messageLangKey = null)
    {
        try{
            return $this->makeRedirect('admin.homepage.features.index',$messageKey,$messageLangKey);
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Redirect User to Sample Website Posts List Page
     *
     * @param null $messageKey
     * @param null $messageLangKey
     * @return mixed
     * @throws Exception
     */
    public function toSampleWebsitePostsListPage($messageKey = null, $messageLangKey = null)
    {
        try{
            return $this->makeRedirect('admin.homepage.website.sample.index',$messageKey,$messageLangKey);
        }
        catch(Exception $e){
            throw $e;
        }
    }


    /**
     * Make Redirect to given route with given parameters
     *
     * @param $route
     * @param null $messageKey
     * @param null $messageLangKey
     * @return mixed
     * @throws Exception
     */
    protected function makeRedirect($route, $messageKey = null, $messageLangKey = null)
    {
        try{
            $route = redirect()->route($route);

            $redirect = $this->setRedirectMessage($route,$messageKey,$messageLangKey);

            return $redirect;
        }
        catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Set given variables to redirect object
     *
     * @param $route
     * @param null $messageKey
     * @param null $messageLangKey
     * @return mixed
     * @throws Exception
     */
    protected function setRedirectMessage($route, $messageKey = null, $messageLangKey = null)
    {
        try{
            if (!is_null($messageKey) && !is_null($messageLangKey)) {
                $redirect = $route->with($messageKey, trans($messageLangKey));
                return $redirect;
            }
            return $route;
        }
        catch(Exception $e){
            throw $e;
        }
    }
}