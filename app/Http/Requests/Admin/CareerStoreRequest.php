<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CareerStoreRequest extends FormRequest
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
            'position' =>'required',
            'number'=>'required',
            'publish_date'=>'required|date|after:yesterday|before:expire_date',
            'expire_date'=>'required|date|after:publish_date',
            'experience' =>'required',
            'job_description'=>'required',


        ];
    }
}
