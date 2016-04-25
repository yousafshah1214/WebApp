<?php

namespace App\Services;


use App\Contracts\Services\RedirectServiceInterface;

class RedirectService extends BaseService implements RedirectServiceInterface
{

    /**
     * Redirects User back to home page with or without message
     *
     * @param string|null|string $messageKey
     * @param string $messageLangKey
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function redirectToHome(string $messageKey = null, string $messageLangKey = null)
    {
        if(! is_null($messageKey) && ! is_null($messageLangKey)){
            return redirect()->route('home.index')->with($messageKey,trans($messageLangKey));
        }

        return redirect()->route('home.index');
    }

    /**
     * Redirects User back to Signup page with or without message
     *
     * @param string|null $messageKey
     * @param string|null $messageLangKey
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToSignup(string $messageKey = null, string $messageLangKey = null){
        $redirect = redirect()->route('signup.index');

        if(! is_null($messageKey) && ! is_null($messageLangKey)){
            $redirect = $redirect->with($messageKey,trans($messageLangKey));
        }

        return $redirect;
    }
}