<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marriage;
use App\Http\Requests\MarriageRequest;
use App\Http\Requests\MarriageUpdateRequest;
use Toastr;
use PDF;
  
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Notification;

class MarriageController extends Controller
{
    public function rules(){
        return view('admin.marriage.rules');
    }
//    export pdf

     public function export_marriage_check(){
          
       return view('admin.marriage.dowanload');
     }

     public function export_marriage_pdf(Request $request){
          
        // dd($request->all());

           $request->validate([
            'reg_no' => 'required|numeric',
            
        ]);
         $check_reg_no= $request->reg_no;
        
        $dowanlaod = Marriage::where('reg_no',$check_reg_no)->where('status', 'married')->first();

        //   dd($dowanlaod);

          if($dowanlaod){

            $data = [
            'title' => 'Welcome to LaravelTuts.com',
            'date' => date('m/d/Y'),
             'dowanload' => $dowanlaod,
        ]; 
         $pdf = PDF::loadView('admin.marriage.marriage_pdf', $data);
        
        return $pdf->download('marriage.pdf');
          } else {
             Toastr::error('Your Registration number is not correct ', 'Danger!');
            // return view('admin.marriage.remarriage.permission');
            return redirect()->back();
        }
     }

    // remarriage
    public function permission(){
      return view('admin.marriage.remarriage.permission');
    }

    public function check_permission(Request $request){

         $request->validate([
            'wife_permission_no' => 'required',
            
        ]);

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

     public function divorce(){
      return view('admin.marriage.remarriage.divorce');
    }

    public function check_divorce(Request $request){

         $request->validate([
            'divorce_no' => 'required|numeric',
            
        ]);
        $check_divorce = $request->divorce_no;
        
        $divorce = Marriage::where('divorce_no',$check_divorce)->where('status', 'divorce')->first();

        // dd($divorce);

        if ( $divorce) {
             Toastr::success('You can Register for New Marriage', 'Success!');
            return view('admin.marriage.add');
        } else {
             Toastr::error('You are not eligible for New marriage ', 'Danger!');
            // return view('admin.marriage.remarriage.permission');
            return redirect()->back();
        }
        
    }


    public function death(){
      return view('admin.marriage.remarriage.death');
    
    }

    public function check_death(Request $request){

        $request->validate([
            'death_no' => 'required',
            
        ]);

        $check_death = $request->death_no;
        
        $death = Marriage::where('death_no',$check_death)->first();

       

        if ( $death) {
             Toastr::success('You can Register for New Marriage', 'Success!');
            return view('admin.marriage.add');
        } else {
             Toastr::error('You are not eligible for New marriage ', 'Danger!');
            // return view('admin.marriage.remarriage.permission');
            return redirect()->back();
        }
        
    }

    // end of remarriage

    public function add(){
         return view('admin.marriage.new_marriage');
    }

    public function check_new(Request $request ){
          $request->validate([
            'husband_nid' => 'required',
            'wife_nid' => 'required',
            
        ]);

        $husband_nid = $request->husband_nid;
        $wife_nid = $request->wife_nid;

        $marriage_husband = Marriage::where('husband_nid',$husband_nid)->where('status','married')->first();

        $marriage_wife = Marriage::where('wife_nid',$wife_nid)->where('status','married')->first();

        if ($marriage_husband == null && $marriage_wife== null) {
         
            Toastr::success('You can Register for New Marriage', 'Success!');
            return view('admin.marriage.new_marriage_from',compact('husband_nid','wife_nid'));
           
         } 
         elseif (($marriage_husband == null && $marriage_wife != null)) {
            Toastr::error('You are not eligible for New marriage ', 'Danger!');
            return view('admin.marriage.new_marriage');

         } 
       elseif ($marriage_husband != null && $marriage_wife == null) {
            Toastr::error('You are not eligible for New marriage ', 'Danger!');
            return view('admin.marriage.new_marriage');
         }
        else {
           
            Toastr::error('You are not eligible for New marriage ', 'Danger!');
            return view('admin.marriage.new_marriage');
         }

    }

     public function index()
    {
        $all_marriage = Marriage::all()->where('status', 'married');

        return view('admin.marriage.index', compact('all_marriage'));
    }

     public function store(MarriageRequest $request)
    {
        
        // Calculate Age
        $dateOfBirthHusband = $request->husband_birthday;
        $today = date("Y-m-d");
        $diff1 = date_diff(date_create($dateOfBirthHusband), date_create($today));

        $dateOfBirthWife = $request->wife_birthday;
        $today = date("Y-m-d");
        $diff2 = date_diff(date_create($dateOfBirthWife), date_create($today));

        $husband_age = (int)$diff1->format('%y');
        $wife_age = (int)$diff2->format('%y');


        //  Email Notification
        $email1 = $request->husband_email;
        $email2 = $request->wife_email;

        $kazi = 'kazi@gmail.com';
        $governer = 'goberner@gmail.com';

        $email = array($email1, $email2,$kazi,$governer);

        // dd($email1, $email2, $email);

     
        $project = [
            // 'greeting' => 'Hi ',
            'greeting' => 'Congratulation '.$request->wife_name.' "And" '.$request->husband_name.',',

            'body' => 'You Are Married',
            
        ];
       
        // Create Image 
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


        $husband_signature = $request->file('husband_signature');
        $image_path = public_path('images/marriage/');
        $husband_signature_name = rand(100000, 999999)."marriage." .$husband_signature->getClientOriginalExtension();
        $husband_signature->move($image_path, $husband_signature_name);
        $husband_signature_name_path = 'images/marriage/'.$husband_signature_name;


        $wife_signature = $request->file('wife_signature');
        $image_path = public_path('images/marriage/');
        $wife_signature_name = rand(100000, 999999)."marriage." .$wife_signature->getClientOriginalExtension();
        $wife_signature->move($image_path, $wife_signature_name);
        $wife_signature_name_path = 'images/marriage/'.$husband_signature_name;


         
        $input= $request->all();



        $input = [            
            'reg_no' => random_int(100000, 999999),
            // 'divorce_no' => random_int(100000, 999999),
           // 'death_no' => random_int(100000, 999999),
            //'wife_permission_no' => random_int(100000, 999999),
            'status'=>'married',

            'husband_nid'=>$request->husband_nid,
            'husband_nid_image'=>$husband_nid_image_name_path,
            'husband_name'=>$request->husband_name,
            'husband_father_name'=>$request->husband_father_name,
            'husband_mother_name'=>$request->husband_mother_name,
            'husband_religion'=>$request->husband_religion,
            'husband_dowery'=>$request->husband_dowery,
            'husband_dowery_paid'=>$request->husband_dowery_paid,
            'husband_dowery_remain'=>$request->husband_dowery_remain,
            'husband_birthday'=>$request->husband_birthday,
            'husband_image'=>$husband_image_name_path,
            'husband_signature'=>$husband_signature_name_path,
            'husband_flat_no'=>$request->husband_flat_no,
            'husband_road_name'=>$request->husband_road_name,
            'husband_state'=>$request->husband_state,
            'husband_city_name'=>$request->husband_city_name,
            'husband_pincode'=>$request->husband_pincode,

            'wife_nid'=>$request->wife_nid,
            'wife_nid_image'=>$wife_nid_image_name_path,
            'wife_name'=>$request->wife_name,
            'wife_father_name'=>$request->wife_father_name,
            'wife_mother_name'=>$request->wife_mother_name,
            'wife_religion'=>$request->wife_religion,
            'wife_birthday'=>$request->wife_birthday,
            'wife_image'=>$wife_image_name_path,
            'wife_signature'=>$wife_signature_name_path,
            'wife_flat_no'=>$request->wife_flat_no,
            'wife_road_name'=>$request->wife_road_name,
            'wife_state'=>$request->wife_state,
            'wife_city_name'=>$request->wife_city_name,
            'wife_pincode'=>$request->wife_pincode,

            'witness1_name'=>$request->witness1_name,
            'witness1_phone'=>$request->witness1_phone,
            'witness1_address'=>$request->witness1_address,
            'witness2_name'=>$request->witness2_name,
            'witness2_phone'=>$request->witness2_phone,
            'witness2_address'=>$request->witness2_address,
            'witness3_name'=>$request->witness3_name,
            'witness3_phone'=>$request->witness3_phone,
            'witness3_address'=>$request->witness3_address,
            'witness4_name'=>$request->witness4_name,
            'witness4_phone'=>$request->witness4_phone,
            'witness4_address'=>$request->witness4_address,
            
            
           'husband_contact_number'=>$request->husband_contact_number,
           'husband_email'=>$request->husband_email,
           'wife_contact_number'=>$request->wife_contact_number,
           'wife_email'=>$request->wife_email,


           'marriage_address'=>$request->marriage_address,
           'marriage_date'=>$request->marriage_date,


            
        ];


        
         if ($husband_age >=21 && $wife_age>= 18){
            foreach($email as $key => $user ){
                Notification::route('mail', $user)->notify(new EmailNotification($project));
            }
            Marriage::create($input);

            Toastr::success('Saved Successfully', 'Success!');
            return redirect()->route('admin.marriage.index');
        }else{  

            Toastr::error('Age should be 21 for husband and 18 for wife ', 'Danger!');
            return redirect()->route('admin.marriage.new');

        }
    
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Marriage::where('id',$id)->where('status', 'married')->first();

        return view('admin.marriage.show', compact('show'));
    }


     public function edit($id)
    {
          $marriage = Marriage::find($id);
         return view('admin.marriage.edit', compact('marriage'));
    }

     public function update(MarriageUpdateRequest $request, $id)
    {
         

        
        Marriage::find($id)->update([
            //'reg_no' => random_int(100000, 999999),
            // 'divorce_no' => 'null',
            //'death_no' => random_int(100000, 999999),
            //'wife_permission_no' => random_int(100000, 999999),
            //'status'=>'divorce',

            'husband_nid'=>$request->husband_nid,
           //  'husband_nid_image'=>$husband_nid_image_name_path,
            'husband_name'=>$request->husband_name,
            'husband_religion'=>$request->husband_religion,
            'husband_birthday'=>$request->husband_birthday,
           // 'husband_image'=>$husband_image_name_path,
            'husband_flat_no'=>$request->husband_flat_no,
            'husband_road_name'=>$request->husband_road_name,
            'husband_state'=>$request->husband_state,
            'husband_city_name'=>$request->husband_city_name,
            'husband_pincode'=>$request->husband_pincode,

            'wife_nid'=>$request->wife_nid,
          //  'wife_nid_image'=>$wife_nid_image_name_path,
            'wife_name'=>$request->wife_name,
            'wife_religion'=>$request->wife_religion,
            'wife_birthday'=>$request->wife_birthday,
           //  'wife_image'=>$wife_image_name_path,
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
        ]);

        Toastr::success('Divorce Updated Successfully', 'Updated!');
        return redirect()->route('admin.marriage.index');
    }

    public function destroy(Request $request,$id)
    {    
        //   dd($id);
         Marriage::findOrFail($id)->delete();
        Toastr::warning('Marriage Deleted Successfully', 'Deleted!');
        return redirect()->route('admin.marriage.index');

       
    }
}
