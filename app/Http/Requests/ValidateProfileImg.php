<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateProfileImg extends FormRequest
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
            'user_image' => 'required|mimes:png,jpeg,jpg|max:2048',
        ];
    }
    public function messages()
    {
        return [

            'user_image.required' => 'CEMS require You To Choose An Image',
            'user_image.mimes' => 'CEMS require You To Choose An Image Of the Format png, jpeg, jpg',
            'user_image.max' => 'Image can not be Greater than 3MB',
        ];
    }
}
