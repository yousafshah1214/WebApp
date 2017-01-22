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
        $rules = array(
            'title'         =>  'required',
            'tagline'       =>  'required',
            'button'        =>  'required_if:button,true|boolean',
            'buttonText'    =>  'required_with:button,true',
            'buttonUrl'     =>  'required_with:button,true',
            'featured'      =>  'required_if:featured,true|boolean',
        );

        if($this->getRequestUri() == "/admin/main-slider/store"){
            // Special Rule for New Slider Request
            $rules['image'] =   'required|mimes:jpeg,bmp,png,jpg';
        }
        else{
            // Special Rule for Edit Slider Request
            $rules['image'] =   'mimes:jpeg,bmp,png,jpg';
        }

        return $rules;
    }
}