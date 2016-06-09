<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SignupRequest extends Request
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
            'username'      =>      'required|alpha_dash|min:6|unique:users,username',
            'password'      =>      'required|string|min:6',
            'email'         =>      'required|email|min:6|unique:user_profiles,email'
        ];
    }
}
