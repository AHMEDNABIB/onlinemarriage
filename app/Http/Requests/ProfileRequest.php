<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            
            "name" =>"required|regex:/^[0-9A-Za-z.\s,'-]*$/",
            "profession" =>"required|regex:/^[0-9A-Za-z.\s,'-]*$/", 
            "profession_place" =>"required|regex:/^[0-9A-Za-z.\s,'-]*$/",
                "mobile" =>'required|||numeric',
                "email" =>'required||email',
                "image"=> 'required||mimes:jpeg,png,jpg||max:500',
                "birthday" => 'required',
                'age'=>'required',
                "district" =>"required|regex:/^[0-9A-Za-z.\s,'-]*$/" ,
                "policestation" => "required|regex:/^[0-9A-Za-z.\s,'-]*$/",
                "village" => "required|regex:/^[0-9A-Za-z.\s,'-]*$/",
                "postoffice" => "required|regex:/^[0-9A-Za-z.\s,'-]*$/",
                "nickname" => "required|regex:/^[0-9A-Za-z.\s,'-]*$/",
                "religion" => "required|regex:/^[0-9A-Za-z.\s,'-]*$/",
                'gender'=> 'required',
                'status'=>'required',
               
                "blood_group" => "required|regex:/^[0-9A-Za-z.\s,'-]*$/",
                "height" => 'required|||numeric',
                "weight" => 'required|||numeric',
              
                "father_name" => "required|regex:/^[0-9A-Za-z.\s,'-]*$/",
                "father_profession" => "required|regex:/^[0-9A-Za-z.\s,'-]*$/",
                "mother_name" => "required|regex:/^[0-9A-Za-z.\s,'-]*$/",
                "mother_profession" => "required|regex:/^[0-9A-Za-z.\s,'-]*$/",
               
                "hobby1" => "required|regex:/^[0-9A-Za-z.\s,'-]*$/",
                "hobby2" => "required|regex:/^[0-9A-Za-z.\s,'-]*$/",
                "hobby3" => "required|regex:/^[0-9A-Za-z.\s,'-]*$/",
                
        ];
    }
}
