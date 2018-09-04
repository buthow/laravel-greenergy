<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProduct extends FormRequest
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
        $rules      =   [
            'product-name'              =>      'required',
            'brand-name'                =>      'required|exists:brand,brand_id',
            'model-name'                =>      'required',
            'product-type'              =>      'required|not_in:default',
            'product-descr'             =>      'required',
            'product-pdf'               =>      'mimes:pdf|max:10000',

        ];

        return $rules;
    }
}
