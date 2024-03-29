<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryRequest extends FormRequest
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
            'name' => 'required|unique:blog_categories|max:255',
            //'image' => 'mimes:jpeg,jpg,png',
        ];

        if ($this->id) {
            $rules['name'] = 'required|unique:blog_categories,name,' . $this->id . ',id';
        }

        return $rules;
    }
}
