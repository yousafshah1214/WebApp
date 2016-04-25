<?php

namespace App\Contracts\Services;


use App\Contracts\Models\UserModelInterface;
use Illuminate\Database\Eloquent\Model;

interface EmailServiceInterface extends BaseServiceInterface
{
    /**
     * Send Welcome Email to New Registered User
     *
     * @param Model $user
     * @return mixed
     */
    public function sendWelcomeEmail(UserModelInterface $user);
}