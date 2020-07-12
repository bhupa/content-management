<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Request;

class SettingStoreRequest extends FormRequest
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


        if($this->type =='1'){
            return [
                'name' => 'required|unique:settings,name',
                'type' => 'required|not_in:0',
                'url' =>'required|url'
            ];
        }
    else if($this->type == '3'){
        return [
            'name' => 'required|unique:settings,name',
            'type' => 'required|not_in:0',
            'image' =>'required|mimes:jpeg,png,jpg,svg',
        ];
    }
    else{
        return [
            'name' => 'required|unique:settings,name',
            'type' => 'required|not_in:0',
            'url' =>'required',
        ];
    }

    }
    public function messages(){
        return [
            'name.required' => 'please Insert then Name',
            'slug.required' => 'please Insert then Slug',
            'value.required' => 'please Insert then Link on link text on text and Image on image',
            'image.required' => 'please Insert then image of jpge,png,jpg',
        ];
    }
}
