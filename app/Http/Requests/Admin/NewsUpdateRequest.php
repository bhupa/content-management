<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsUpdateRequest extends FormRequest
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
            'short_description' => 'required',
            'description' => 'required',
            'published_date' => 'required|date',
            'meta_title'=>'required',
            'keywords'=>'required',
            'type' =>'required|not_in:0'

        ];
        return $rules;
    }
}
