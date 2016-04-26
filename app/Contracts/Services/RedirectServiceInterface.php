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
    public function toHome(string $messageKey = null, string $messageLangKey = null);

    /**
     * @param string|null $messageKey
     * @param string|null $messageLangKey
     * @return mixed
     */
    public function toSignup(string $messageKey = null, string $messageLangKey = null);

}