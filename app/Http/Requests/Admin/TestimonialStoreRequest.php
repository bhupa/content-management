<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialStoreRequest extends FormRequest
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
            'name' =>'required|max:160',
            // 'company_name' =>'required',
            'image' =>'required',
            'description' =>'required',
            'is_active' =>'required',
        ];
    }
    public function messages(){
        return [
            'name.required' =>'Please Insert Your Name',
            // 'company_name.required' =>'Please Insert Your Company Name',
            'image.required' =>'Please Insert Your Image',
            'description.required' =>'Please Insert Description',
            'is_active.required' =>'Please Insert Publish',


        ];
    }
}
