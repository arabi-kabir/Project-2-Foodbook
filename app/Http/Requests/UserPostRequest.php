<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPostRequest extends FormRequest
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
            'post_data' =>   'required',
            'img1' =>   'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img2' =>   'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img3' =>   'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}