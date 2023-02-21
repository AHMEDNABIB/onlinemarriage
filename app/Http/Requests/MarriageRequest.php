<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarriageRequest extends FormRequest
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
            'husband_dowery' => "required|numeric",
            'husband_dowery_paid' => "required|numeric",
            'husband_dowery_remain' => "required|numeric",
            'husband_nid_image' => 'required||mimes:jpeg,png,jpg||max:1500',
            
            'husband_religion' => "required|regex:/^[0-9A-Za-z.\s,'-]*$/",
            'husband_image' => 'required||mimes:jpeg,png,jpg||max:500',
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
            'wife_flat_no' => "required|regex:/^[0-9A-Za-z.\s,'-]*$/",
            'wife_road_name' => "required|regex:/^[0-9A-Za-z.\s,'-]*$/",
            'wife_state' => 'required',
            'wife_city_name' => 'required',
            'wife_pincode'=> 'required||numeric',
            
            'witness1_name' => 'required',
            'witness1_address' => 'required',
            'witness2_name' => 'required',
            'witness2_address'=> 'required',
            'witness3_name' => 'required',
            'witness3_address' => 'required',
            'witness4_name' => 'required',
            'witness4_address' => 'required',
            
            'husband_contact_number' => 'required|numeric',
            'husband_email'=> 'required||email',
            'wife_contact_number' => 'required|||numeric',
            'wife_email' => 'required|email',

        ];
    }
}


            // husband_nid
            // husband_nid_image
            // husband_name
            // husband_religion 
            // husband_image
            // husband_birthday
            // husband_flat_no
            // husband_road_name
            // husband_state
            // husband_city_name
            // husband_pincode

            // wife_nid
            // wife_nid_image
            // wife_name
            // wife_religion  
            // datewife_birthday
            //  wife_image
            // wife_flat_no
            // wife_road_name
            // wife_state
            // wife_city_name
            // wife_pincode
            // witness1_name
            // witness1_address
            // witness2_name
            // witness2_address
            // witness3_name
            // witness3_address
            // witness4_name
            // witness4_address
            
            // husband_contact_number
            // husband_email
            // wife_contact_number
            // wife_email
