<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RoomlistUpdateRequest extends FormRequest
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
            'name' => 'required',
            'cover_image' => 'nullable',
            'is_active' => 'required',
            'description' => 'required',
            'short_description' => 'required',
            'number_of_rooms' => 'required',
            'price' =>'required'
        ];
    }
    public function  messages(){
        return[
            'name.required' => 'Please Insert The Name',
            'is_active.required' => 'Please Select the Publish',
            'description.required' => 'Please Insert The Description',
            'short_description.required' => 'Please Insert The Short Description',
            'cover_image.required' => 'Please Upload Valid Image File',
            'price.required' =>'Please Insert The Price'
        ];
    }
}
