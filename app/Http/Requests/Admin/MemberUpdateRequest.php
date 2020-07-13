<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MemberUpdateRequest extends FormRequest
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

        if($this->type == 'Executive'){
            $data =[
                'name'=>'required',
                'image'=>'required|mimes:jpeg,png,jpg,svg|dimensions:min_width=1400,min_height=1100',

                'address'=>'required',
                'type'=>'in:Executive,Member',
                'member_type_id'=>'required|exists:member_type,id'

            ];
        }else{
            if($this->member_type_id != ''){
                $data = [
                    'member'=>"required"


                ];
            }else{

                $data =[
                    'name'=>'required',
                    'image'=>'nullable|mimes:jpeg,png,jpg,svg|dimensions:min_width=1400,min_height=1100',

                    'address'=>'required',
                    'type'=>'in:Executive,Member',
                ];
            }

        }

        return $data;

    }

    public function messages()
    {
        return [
            'member_type_id.required'=>'Please select the position of the team member',
            'member.required'=>'if member is select than position field must be empty',
            'image.dimensions' =>'Please upload image min-width:1400 and min-height:1100'

        ];
    }
}
