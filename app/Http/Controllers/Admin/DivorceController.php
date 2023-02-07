<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marriage;
use App\Http\Requests\MarriageRequest;
use Toastr;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Notification;
class DivorceController extends Controller
{   
    public function add()
    {
        return view('admin.divorce.divorce_annulment');
    }

     public function annulment(Request $request, $id)
    {
        //   $request->validate([
        //     'husband_name' => 'required',
        //     //'phone' => 'required',
        //     //'address' => 'required',
        //     'husband_image' => ['required', 'mimes:jpeg,png,jpg,', 'max:500'],
        // ]);


        //  dd($request->wife_name);

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


        foreach($email as $key => $user ){
            Notification::route('mail', $user)->notify(new EmailNotification($project));
        }

        
        Marriage::find($id)->update([
            'reg_no' => random_int(100000, 999999),
             'divorce_no' => 'null',
            'death_no' => 'null',
            'wife_permission_no' => 'null',
            'status'=>'married',

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

        Toastr::success('Divorce Annuled Successfully', 'Updated!');
        return redirect()->route('admin.divorce.add');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $all_divorce= Marriage::where('status','divorce');
        
         $all_divorce = Marriage::all()->where('status', 'divorce');

        //  dd($all_divorce);
        return view('admin.divorce.index', compact('all_divorce'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.divorce.add');
    }

    public function save(Request $request){

        // dd($request->reg_no);
        $divorce_no = $request->divorce_no;

        // dd($divorce_no);

        $divorce = Marriage::where('divorce_no',$divorce_no)->where('status','divorce')->first();

    //  dd($divorce);

        if($divorce){
            Toastr::success('You can Annual your Divorce', 'Success!');
            return view('admin.divorce.divorce_annulment_form', compact('divorce'));

        }else{
            Toastr::error('Your Registration is incorrect', 'Danger!');
            return redirect()->route('admin.divorce.add');
        }

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarriageRequest $request)
    {    
        // dd($request->all());
        //  $request->validate([
        //     'husband_name' => 'required',
        //     //'phone' => 'required',
        //     //'address' => 'required',
        //     'husband_image' => ['required', 'mimes:jpeg,png,jpg,', 'max:500'],
        // ]);

        $email1 = $request->husband_email;
        $email2 = $request->wife_email;

        $kazi = 'kazi@gmail.com';
        $governer = 'goberner@gmail.com';

        $email = array($email1, $email2,$kazi,$governer);

        // dd($email1, $email2, $email);

     
             $project = [
            // 'greeting' => 'Hi ',
            'greeting' => 'Congratulation '.$request->wife_name.' "And" '.$request->husband_name.',',

            'body' => 'You Are Divorced',
            
        ];

        


        foreach($email as $key => $user ){
            Notification::route('mail', $user)->notify(new EmailNotification($project));
        }

     
    // Notification::route('mail', $email)->notify(new EmailNotification($project));
         

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
           
            
            // 'reg_no' => random_int(100000, 999999),
            'divorce_no' => random_int(100000, 999999),
            // 'death_no' => random_int(100000, 999999),
            // 'wife_permission_no' => random_int(100000, 999999),
            'status'=>'divorce',

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
        return redirect()->route('admin.divorce.index');
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
          $divorce = Marriage::find($id);
         return view('admin.divorce.edit', compact('divorce'));
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
        //   $request->validate([
        //     'husband_name' => 'required',
        //     //'phone' => 'required',
        //     //'address' => 'required',
        //     'husband_image' => ['required', 'mimes:jpeg,png,jpg,', 'max:500'],
        // ]);

        
        Marriage::find($id)->update([
            'reg_no' => random_int(100000, 999999),
            // 'divorce_no' => 'null',
            //'death_no' => random_int(100000, 999999),
            //'wife_permission_no' => random_int(100000, 999999),
            'status'=>'divorce',

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
        return redirect()->route('admin.divorce.add');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {    
        //  dd($id);
         Marriage::findOrFail($id)->delete();
        Toastr::warning('Divorce Deleted Successfully', 'Deleted!');
        return redirect()->route('admin.divorce.index');

        // if ($request->ajax()){

        //     $user = User::findOrFail($id);

        //     if ($user){

        //         $user->delete();

        //         return response()->json(array('success' => true));
        //     }

        // }
    }

    
}
