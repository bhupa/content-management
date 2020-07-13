<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EventUpdateRequest extends FormRequest
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
            'title' =>'required',
            'image'=>'nullable|mimes:jpeg,png,jpg,svg|dimensions:min_width=1200,min_height=900',

            'short_description' =>'required',
            'description' =>'required',
            'location'=>'required',
            'date'=>'required|date_format:Y-m-d',
            'location'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'image.dimensions' =>'Please upload image min-width:1200 and min-height:900'
        ];

    }
}
