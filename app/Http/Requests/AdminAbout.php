<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class AdminAbout extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::guard('admin')->check()){

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
            'about-description'       =>  'required',

        ];
        if($this->request->get('id') !=  "" ){

            $rules['about-image']    =   'image|max:5000|mimes:jpeg,jpg,gif,png';

        }else{

            $rules['about-image']    =   'required|max:5000|image|mimes:jpeg,jpg,gif,png';
        }

        return $rules;
    }
}
