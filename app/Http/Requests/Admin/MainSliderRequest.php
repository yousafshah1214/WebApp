<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class MainSliderRequest extends Request
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
            'title'         =>  'required',
            'tagline'       =>  'required',
            'buttonText'    =>  'required_with:button,true',
            'buttonUrl'     =>  'required_with:button,true',
            'featured'      =>  'required_if:featured,true|boolean',
            'image'         =>  'required|mimes:jpeg,bmp,png,jpg'
        ];
    }
}
