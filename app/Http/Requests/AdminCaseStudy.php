<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCaseStudy extends FormRequest
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
            'case-name'     =>      'required',
            'case-pdf'      =>      'mimes:pdf|max:10000'
        ];

        if($this->request->get('id') !=  "" ){
            $rules['case-image']    =   'image|max:5000|mimes:jpeg,jpg,gif,png';
        }else{
            $rules['case-image']    =   'required|max:5000|image|mimes:jpeg,jpg,gif,png';
        }



        return $rules;
    }
}
