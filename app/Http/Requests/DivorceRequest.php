<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DivorceRequest extends FormRequest
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
             
           
            'husband_name' => "required|regex:/^[0-9A-Za-z.\s,'-]*$/",
            'husband_nid' => "required|numeric",
            'husband_nid_image' => 'required||mimes:jpeg,png,jpg||max:1500',
            
            'husband_religion' => "required|regex:/^[0-9A-Za-z.\s,'-]*$/",
            'husband_image' => 'required||mimes:jpeg,png,jpg||max:500',
            'husband_signature' => 'required||mimes:jpeg,png,jpg||max:500',
            'husband_birthday' => 'required',
            'husband_flat_no' => "required|regex:/^[0-9A-Za-z.\s,'-]*$/",
            'husband_road_name' => "required|regex:/^[0-9A-Za-z.\s,'-]*$/",
            'husband_state' => "required|regex:/^[0-9A-Za-z.\s,'-]*$/",
            'husband_city_name' => "required|regex:/^[0-9A-Za-z.\s,'-]*$/",
            'husband_pincode' => 'required|numeric',

            'wife_nid' => "required|numeric|regex:/^[0-9A-Za-z.\s,'-]*$/",
            'wife_nid_image' => 'required||mimes:jpeg,png,jpg||max:1500',
            'wife_name' => "required|regex:/^[0-9A-Za-z.\s,'-]*$/",
            'wife_religion' => "required|regex:/^[0-9A-Za-z.\s,'-]*$/",
            'wife_birthday' => 'required',
            'wife_image' => 'required||mimes:jpeg,png,jpg||max:500',
            'wife_signature' => 'required||mimes:jpeg,png,jpg||max:500',
            'wife_flat_no' => "required|regex:/^[0-9A-Za-z.\s,'-]*$/",
            'wife_road_name' => "required|regex:/^[0-9A-Za-z.\s,'-]*$/",
            'wife_state' => 'required',
            'wife_city_name' => 'required',
            'wife_pincode'=> 'required||numeric',
            
            'witness1_name' => 'required',
            'witness1_phone' => 'required',
            'witness1_address' => 'required',
            'witness2_name' => 'required',
            'witness2_phone' => 'required',
            'witness2_address'=> 'required',
            'witness3_name' => 'required',
            'witness3_phone' => 'required',
            'witness3_address' => 'required',
            'witness4_name' => 'required',
            'witness4_phone' => 'required',
            'witness4_address' => 'required',


            'marriage_address' => 'required',
            'marriage_date' => 'required',
            
            'husband_contact_number' => 'required|numeric',
            'husband_email'=> 'required||email',
            'wife_contact_number' => 'required|||numeric',
            'wife_email' => 'required|email',



        ];
    }
}
