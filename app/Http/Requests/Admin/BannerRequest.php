<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
           'title' => 'required',
           'short_description'=>'required',
           'description'=>'required',
           'image'=>'required|mimes:jpeg,png,jpg,svg|dimensions:min_width=1920,min_height=680',

       ];
    }

    public function messages()
    {
        return [
            'image.dimensions' =>'Please upload image min-width:1920 and min-height:680'
        ];

    }
}
