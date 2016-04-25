<?php

namespace App\Listeners;

use App\Events\UserSignedUp;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail implements ShouldQueue
{

    private $mailer;

    /**
     * Create the event listener.
     *
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  UserSignedUp  $event
     * @return void
     */
    public function handle(UserSignedUp $event)
    {
        $user = $event->user;
        $this->mailer->queue('auth.emails.welcome',['user' => $user],function($m) use ($user){
            $m->from('noreply@ismartz.com','Ismartz.com');
            $m->to($user->profile->email, $user->username)->subject('Please Activate your Account');
        });
    }
}
