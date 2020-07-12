<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GalleryUpdateRequest extends FormRequest
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
            'title'=>'required',
            'image'=>'nullable|mimes:jpeg,png,jpg,svg|dimensions:min_width=2200,min_height=1500',

            'description' =>'required'
        ];

    }


    public function messages()
    {
       return [
         'image.dimensions' =>'Please upload image min-width:2200 and min-height:1500'
       ];

    }
}
