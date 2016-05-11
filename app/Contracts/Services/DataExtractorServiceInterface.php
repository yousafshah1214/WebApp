<?php

namespace App\Contracts\Services;


interface DataExtractorServiceInterface extends BaseServiceInterface
{

    /**
     * get Facebook User data from given $user object of Socialite
     *
     * @param $user
     * @param $type
     * @return mixed
     */
    public function getFacebookDetails($user, $type);

    /**
     * get Twitter User Data from given $user Object of Socialite
     *
     * @param $user
     * @param $type
     * @return mixed
     */
    public function getTwitterDetails($user, $type);

}