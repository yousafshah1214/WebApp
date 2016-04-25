<?php

namespace App\Services;


use App\Contracts\Models\UserModelInterface;
use App\Contracts\Services\EmailServiceInterface;
use App\Events\UserSignedUp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;

class EmailService extends BaseService implements EmailServiceInterface
{

    /**
     * Sends Welcome Email to new registered User
     *
     * @param UserModelInterface $user
     * @return mixed
     */
    public function sendWelcomeEmail(UserModelInterface $user)
    {
        Event::fire(new UserSignedUp($user));
    }
}