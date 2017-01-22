<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MainPostRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'     =>  'required',
            'intro'     =>  'required',
            'image'     =>  'mimes:jpeg,bmp,png,jpg'
        ];
    }
}
