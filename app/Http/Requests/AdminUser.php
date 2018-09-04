<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;

class AdminUser extends FormRequest
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

        if (Input::get('user-type') == 'user'){

            if (!empty(Input::get('idEdit'))){
                $rules  =   [
                    'username'      => 'required|unique:user,username',
                    'user-type'     => 'required|in:user,admin',
                ];
            }else{
                $rules  =   [
                    'username'      => 'required|unique:user,username',
                    'password'      => 'required|min:5|max:16',
                    'user-type'     => 'required|in:user,admin',
                ];
            }

        }else{
            if(!empty(Input::get('idEdit'))){
                $rules  =   [
                    'username'      => 'required|unique:admin,username',
                    'user-type'     => 'required|in:user,admin',
                ];
            }else{
                $rules  =   [
                    'username'      => 'required|unique:admin,username',
                    'password'      => 'required|min:5|max:16',
                    'user-type'     => 'required|in:user,admin',
                ];
            }

        }
        return $rules;
    }
}
