<?php

namespace App\Services;


use App\Contracts\Services\DataExtractorServiceInterface;

class DataExtractorService extends BaseService implements DataExtractorServiceInterface
{

    /**
     * get Facebook User data from given $user object of Socialite
     *
     * @param $user
     * @param $type
     * @return mixed
     */
    public function getFacebookDetails($user, $type)
    {
        $credentials = array(
            'social'    =>  true,
            'active'    =>  true,
            'email'     =>  $user->email,
            'name'      =>  $user->name,
            'provider'  =>  $type,
            'token'     =>  $user->token,
            'network_user_id'   =>  $user->getId()
        );

        if(isset($user->nickname)){
            $username = uniqid($user->nickname);
            $credentials = array_add($credentials,'username',$username);
        }
        else{
            $username = uniqid(implode("",explode(" ",$user->name)));
            $credentials = array_add($credentials,'username',$username);
        }

        return $credentials;
    }

    /**
     * get Twitter User Data from given $user Object of Socialite
     *
     * @param $user
     * @param $type
     * @return mixed
     */
    public function getTwitterDetails($user, $type)
    {
        return array(
            'social'    =>  true,
            'active'    =>  true,
            'username'  =>  $user->nickname,
            'name'      =>  $user->name,
            'provider'  =>  $type,
            'token'     =>  $user->token,
            'network_user_id'   =>  $user->getId()
        );
    }
}