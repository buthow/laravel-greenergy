<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminContact extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(auth('admin')->check()){

            return true;

        }else{

            return false;

        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules  =   [

            'company-address'         => 'required',
            'factory-address'         => 'required',
            'contact-email'           => 'required|email',
            'contact-number'          => 'required',

        ];

        return $rules;
    }
}
