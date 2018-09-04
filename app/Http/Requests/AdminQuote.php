<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class AdminQuote extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        if(auth::guard('admin')->check()){

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
        $rules = [
            'name'                    =>  'required|string',
            'quote-description'       =>  'required',
            'quote-position'          =>  'string',

        ];

        if(Input::get('id') !=  "" ){

            $rules['quote-image']    =   'image|max:5000|mimes:jpeg,jpg,gif,png';

        }else{

            $rules['quote-image']    =   'required|max:5000|image|mimes:jpeg,jpg,gif,png';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'name.string'   => 'A name is required',
            'quote-image.required'  => 'A image is required',
            'quote-image.max'  => 'A image is required',
            'quote-image.mime'  => 'A image is required',
            'quote-description.required'  => 'A description is required',
        ];
    }
}
