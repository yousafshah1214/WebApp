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
     * @param string|null $messageKey
     * @param string|null $messageLangKey
     * @return mixed
     */
    public function toSignup($messageKey = null, $messageLangKey = null);

}