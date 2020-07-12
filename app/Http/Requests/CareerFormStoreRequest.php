<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CareerFormStoreRequest extends FormRequest
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
            'first_name'=>'required',
            'last_name'=>'required',
            'email' =>'required|unique:career_form,email',
            'contact' =>'required|digits:10',
            'degination'=>'required',
            'file' =>'required',
            'salary'=>'required'
        ];
    }
}
