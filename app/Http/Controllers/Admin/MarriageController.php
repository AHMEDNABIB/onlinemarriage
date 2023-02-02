<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marriage;
use Toastr;

class MarriageController extends Controller
{    
    public function permission(){
      return view('admin.marriage.remarriage.permission');
    }

    public function check_permission(Request $request){
        $check_permission = $request->wife_permission_no;
        
        $wife_permission = Marriage::where('wife_permission_no',$check_permission)->first();

        // dd($wife_permission);

        if ( $wife_permission) {
             Toastr::success('You can Register for New Marriage', 'Success!');
            return view('admin.marriage.add');
        } else {
             Toastr::error('You are not eligible for New marriage ', 'Danger!');
            // return view('admin.marriage.remarriage.permission');
            return redirect()->back();
        }
        
    }


    public function add(Request $request){

        $husband_nid = $request->husband_nid;
        $wife_nid = $request->wife_nid;

        // dd($husband_nid, $wife_nid);
      
         $marriage = Marriage::where('husband_nid',$husband_nid)->where('wife_nid',$wife_nid)->where('status','married')->first();
           
        //    dd($marriage);
          if ($marriage == null) {
            Toastr::success('You can Register for New Marriage', 'Success!');
            return view('admin.marriage.add');
         } else {
            Toastr::error('You are not eligible for New marriage ', 'Danger!');
            return view('admin.marriage.new_marriage');
         }
         

         
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $all_marriage = Marriage::all()->where('status', 'married');

        
        return view('admin.marriage.index', compact('all_marriage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.marriage.new_marriage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $husband_image = $request->file('husband_image');
        $image_path = public_path('images/marriage/');
        $husband_image_name = rand(100000, 999999)."marriage." . $husband_image->getClientOriginalExtension();
        $husband_image->move($image_path, $husband_image_name);
        $husband_image_name_path = 'images/marriage/'.$husband_image_name;

        $husband_nid_image = $request->file('husband_nid_image');
        $image_path = public_path('images/marriage/');
        $husband_nid_image_name = rand(100000, 999999)."marriage." . $husband_nid_image->getClientOriginalExtension();
        $husband_nid_image->move($image_path, $husband_nid_image_name);
        $husband_nid_image_name_path = 'images/marriage/'.$husband_nid_image_name;

        $wife_image = $request->file('wife_image');
        $image_path = public_path('images/marriage/');
        $wife_image_name = rand(100000, 999999)."marriage." . $wife_image->getClientOriginalExtension();
        $wife_image->move($image_path, $wife_image_name);
        $wife_image_name_path = 'images/marriage/'.$wife_image_name;

        $wife_nid_image = $request->file('wife_nid_image');
        $image_path = public_path('images/marriage/');
        $wife_nid_image_name = rand(100000, 999999)."marriage." . $wife_nid_image->getClientOriginalExtension();
        $wife_nid_image->move($image_path, $wife_nid_image_name);
        $wife_nid_image_name_path = 'images/marriage/'.$wife_nid_image_name;


         
        $input= $request->all();



        $input = [
           
            
            'reg_no' => random_int(100000, 999999),
           
            'status'=>'married',
            'husband_nid'=>$request->husband_nid,
             'husband_nid_image'=>$husband_nid_image_name_path,
            'husband_name'=>$request->husband_name,
            'husband_religion'=>$request->husband_religion,
            'husband_birthday'=>$request->husband_birthday,
            'husband_image'=>$husband_image_name_path,
            'husband_flat_no'=>$request->husband_flat_no,
            'husband_road_name'=>$request->husband_road_name,
            'husband_state'=>$request->husband_state,
            'husband_city_name'=>$request->husband_city_name,
            'husband_pincode'=>$request->husband_pincode,

            'wife_nid'=>$request->wife_nid,
            'wife_nid_image'=>$wife_nid_image_name_path,
            'wife_name'=>$request->wife_name,
            'wife_religion'=>$request->wife_religion,
            'wife_birthday'=>$request->wife_birthday,
             'wife_image'=>$wife_image_name_path,
            'wife_flat_no'=>$request->wife_flat_no,
            'wife_road_name'=>$request->wife_road_name,
            'wife_state'=>$request->wife_state,
            'wife_city_name'=>$request->wife_city_name,
            'wife_pincode'=>$request->wife_pincode,

            'witness1_name'=>$request->witness1_name,
            'witness1_address'=>$request->witness1_address,
            'witness2_name'=>$request->witness2_name,
            'witness2_address'=>$request->witness2_address,
            'witness3_name'=>$request->witness3_name,
            'witness3_address'=>$request->witness3_address,
            'witness4_name'=>$request->witness4_name,
            'witness4_address'=>$request->witness4_address,
            
            
           'husband_contact_number'=>$request->husband_contact_number,
           'husband_email'=>$request->husband_email,
           'wife_contact_number'=>$request->wife_contact_number,
           'wife_email'=>$request->wife_email,
            
        ];
    
         Marriage::create($input);

        Toastr::success('Saved Successfully', 'Success!');
        return redirect()->route('admin.marriage.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
