<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required|exists:blog_categories,id',
            'description' => 'required',
            'short_description' => 'required',
            'image'=>'required|mimes:jpeg,png,jpg,svg|dimensions:ration=3/2',

        ];
        return $rules;
    }
}
