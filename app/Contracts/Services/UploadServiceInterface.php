<?php

namespace App\Contracts\Services;


interface UploadServiceInterface extends BaseServiceInterface
{
    /**
     * Upload Image and returns file storage address
     *
     * @param $image
     * @param $destination
     * @return mixed
     * @throws Exception
     */
    public function uploadImage($image, $destination);
}