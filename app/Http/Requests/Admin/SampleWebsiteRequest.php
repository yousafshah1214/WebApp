<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class SampleWebsiteRequest extends Request
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
        $rules = array (
            'title'             =>  'required',
            'intro'             =>  'required',
            'active'            =>  'boolean',
            'image'             =>  'required|image:jpeg,jpg,png|max:5120'
        );

        if($this->getRequestUri() == "/admin/homepage/website/sample/store"){
            // Special Rule for New Sample Website Post Request
            $rules['image'] =   'required|mimes:jpeg,bmp,png,jpg';
        }
        else{
            // Special Rule for Edit Request
            $rules['image'] =   'mimes:jpeg,bmp,png,jpg';
        }

        return $rules;
    }
}
