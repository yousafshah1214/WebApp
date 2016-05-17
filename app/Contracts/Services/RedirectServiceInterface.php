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

}