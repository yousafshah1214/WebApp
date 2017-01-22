<?php

namespace App\Services;


use App\Contracts\Services\UploadServiceInterface;
use Exception;

class UploadService extends BaseService implements UploadServiceInterface
{

    /**
     * Upload Image and returns file storage address
     *
     * @param $image
     * @param $destination
     * @return mixed
     * @throws Exception
     */
    public function uploadImage($image,$destination)
    {
        try{
            if($image->isValid()){

                $filename = time().".".$image->getClientOriginalExtension();

                $image->move($destination,$filename);

                return $filename;
            }
            else{
                throw new Exception("Image is inValid");
            }
        }
        catch(Exception $e){
            throw $e;
        }
    }

}