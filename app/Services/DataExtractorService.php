<?php

namespace App\Services;


use App\Contracts\Services\DataExtractorServiceInterface;
use Exception;

class DataExtractorService extends BaseService implements DataExtractorServiceInterface
{

    /**
     * get Facebook User data from given $user object of Socialite
     *
     * @param $user
     * @param $type
     * @return mixed
     * @throws Exception
     */
    public function getFacebookDetails($user, $type)
    {
        try{
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
        }catch (Exception $e){
            throw $e;
        }
    }

    /**
     * get Twitter User Data from given $user Object of Socialite
     *
     * @param $user
     * @param $type
     * @return mixed
     * @throws Exception
     */
    public function getTwitterDetails($user, $type)
    {
        try{
            return array(
                'social'    =>  true,
                'active'    =>  true,
                'username'  =>  $user->nickname,
                'name'      =>  $user->name,
                'provider'  =>  $type,
                'token'     =>  $user->token,
                'network_user_id'   =>  $user->getId()
            );
        }catch (Exception $e){
            throw $e;
        }
    }
}