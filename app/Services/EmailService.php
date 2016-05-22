<?php

namespace App\Services;


use App\Contracts\Models\UserModelInterface;
use App\Contracts\Services\EmailServiceInterface;
use App\Events\UserSignedUp;
use Exception;
use Illuminate\Support\Facades\Event;

class EmailService extends BaseService implements EmailServiceInterface
{

    /**
     * Sends Welcome Email to new registered User
     *
     * @param UserModelInterface $user
     * @return mixed
     * @throws Exception
     */
    public function sendWelcomeEmail(UserModelInterface $user)
    {
        try{
            Event::fire(new UserSignedUp($user));
        }
        catch(Exception $e) {
            throw $e;
        }
    }
}