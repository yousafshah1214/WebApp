<?php

namespace App\Contracts\Services;


interface RedirectServiceInterface extends BaseServiceInterface
{
    /**
     * Redirects to home page
     *
     * @param string|null $messageKey
     * @param string|null $messageLangKey
     * @return mixed
     */
    public function toHome($messageKey = null, $messageLangKey = null);

    /**
     * Redirects to Signup page
     *
     * @param string|null $messageKey
     * @param string|null $messageLangKey
     * @return mixed
     */
    public function toSignup($messageKey = null, $messageLangKey = null);

    /**
     * Redirects to DashBoard page
     *
     * @param null $messageKey
     * @param null $messageLangKey
     * @return mixed
     */
    public function toDashboard($messageKey = null, $messageLangKey = null);

    /**
     * Redirects to Login Page
     *
     * @param null $messageKey
     * @param null $messageLangKey
     * @return mixed
     */
    public function toLogin($messageKey = null, $messageLangKey = null);

    /**
     * Redirects to previous page.
     *
     * @param null $messageKey
     * @param null $messageLangKey
     * @return mixed
     */
    public function toPreviousPage($messageKey = null, $messageLangKey = null);

    /**
     * Redirects User to intended page.
     *
     * @param null $messageKey
     * @param null $messageLangKey
     * @return mixed
     */
    public function toIntendedPage($messageKey = null, $messageLangKey = null);

    /**
     * Redirects User to Main Sliders List Page
     *
     * @param null $messageKey
     * @param null $messageLangKey
     * @return mixed
     */
    public function toMainSlidersListPage($messageKey = null, $messageLangKey = null);

    /**
     * Redirects User to Main Posts List Page
     *
     * @param null $messageKey
     * @param null $messageLangKey
     * @return mixed
     */
    public function toMainPostsListPage($messageKey = null, $messageLangKey = null);

    /**
     * Redirect User to BuiltIn Features Posts List page
     *
     * @param null $messageKey
     * @param null $messageLangKey
     * @return mixed
     */
    public function toBuiltInFeaturesPostsListPage($messageKey = null, $messageLangKey = null);

    /**
     * Redirect User to Sample Website Posts List Page
     *
     * @param null $messageKey
     * @param null $messageLangKey
     * @return mixed
     */
    public function toSampleWebsitePostsListPage($messageKey= null, $messageLangKey = null);
}