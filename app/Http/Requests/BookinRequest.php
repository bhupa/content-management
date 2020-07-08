<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookinRequest extends FormRequest
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
            'email'=>'required|email',
            'address'=>'required',
            'phone' =>'required|digits:10',
            'room_id'=>'required|not_in:0',
            'no_of_room'=>'required',
            'no_of_child'=>'required',
            'no_of_adult'=>'required',
            'check_in'=>'required|date|after:yesterday',
            'check_out'=>'required|date|after:check_in',
            'g-recaptcha-response' => 'required|captcha'
        ];
    }
}
