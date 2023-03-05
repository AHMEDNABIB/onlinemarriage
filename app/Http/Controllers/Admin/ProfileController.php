<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\DB;
use Toastr;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function search(Request $request){

      
       $age = $request->input('age');
       $height = $request->input('height');
       $gender = $request->input('gender');

       $data=Profile::get();

    //    dd($data);
      if($age !=null ){
       $data = Profile::where('age', $age)
            ->orderBy('reg_no', 'desc')
            ->get();

      }

      

      if($height !=null ){
       $data = Profile::where('height',$height)
            ->orderBy('reg_no', 'desc')
            ->get();

      }

        if($gender !=null ){
       $data = Profile::where('gender',$gender)
            ->orderBy('reg_no', 'desc')
            ->get();

      }

            

          

        return view('admin.profile.search', compact('data'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $all_profile = Profile::all();

        return view('admin.profile.index', compact('all_profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profile.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileRequest $request)
    {
        
    //   dd($request->all());

       $dateOfBirth = $request->birthday;
        $today = date("Y-m-d");
        $diff1 = date_diff(date_create($dateOfBirth), date_create($today));

    

        $age = (int)$diff1->format('%y');

        //  dd($age);
       
       
        $image = $request->file('image');
        $image_path = public_path('images/profile/');
        $image_name = rand(100000, 999999)."profile." . $image->getClientOriginalExtension();
        $image->move($image_path, $image_name);
        $image_name_path = 'images/profile/'.$image_name;


          $input= $request->all();

          $input =[

                'reg_no' => random_int(100000, 999999),
                "name" =>$request-> name,
                "profession" =>$request->profession, 
                "profession_place" =>$request->profession_place,
                "mobile" =>$request->mobile,
                "email" =>$request-> email,
                "image"=>$image_name_path,
                 "birthday" =>$request->birthday, 
                 "age" =>$age, 
                "district" =>$request->district ,
                "policestation" =>$request->policestation, 
                "village" =>$request->village,
                "postoffice" =>$request->postoffice, 
                "nickname" =>$request->nickname, 
                "religion" =>$request->religion, 
                "gender" =>$request->gender, 
                "status" =>$request->status, 
                
               
                "blood_group" =>$request-> blood_group,
                "height" =>$request-> height,
                "weight" =>$request->weight, 
                "university_name" =>$request->university_name ,
                "university_degree" =>$request->university_degree, 
                "university_subject" =>$request->university_subject, 
                "collage_name" =>$request-> collage_name,
                "collage_degree" =>$request->collage_degree,
                "collage_subject" =>$request->collage_subject,
                "school_name" =>$request->school_name, 
                "school_degree" =>$request-> school_degree,
                "school_subject" =>$request-> school_subject,
                "father_name" =>$request-> father_name,
                "father_profession" =>$request->father_profession ,
                "mother_name" =>$request-> mother_name,
                "mother_profession" =>$request-> mother_profession,
                "brother1_name" =>$request-> brother1_name,
                "brother1_profession" =>$request->brother1_profession ,
                "brother1_wife_name" =>$request-> brother1_wife_name,
                "brother1_wife__profession" =>$request->brother1_wife__profession, 
                "brother2_name" =>$request->brother2_name, 
                "brother2_profession" =>$request->brother2_profession, 
                "brother2_wife_name" =>$request-> brother2_wife_name,
                "brother2_wife__profession" =>$request->brother2_wife__profession, 
                "brother3_name" =>$request->brother3_name, 
                "brother3_profession" =>$request-> brother3_profession,
                "brother3_wife_name" =>$request-> brother3_wife_name,
                "brother3_wife__profession" =>$request->brother3_wife__profession, 

                 "sister1_name" => $request->sister1_name,
                 "sister1_profession" => $request->sister1_profession,
                 "sister1_husband_name" =>$request-> sister1_husband_name,
                 "sister1__husband_profession" =>$request-> sister1__husband_profession,
                 "sister2_name" => $request->sister1_name,
                 "sister2_profession" => $request->sister1_profession,
                 "sister2_husband_name" =>$request-> sister1_husband_name,
                 "sister2__husband_profession" =>$request-> sister1__husband_profession,
                 "sister3_name" => $request->sister1_name,
                 "sister3_profession" => $request->sister1_profession,
                 "sister3_husband_name" =>$request-> sister1_husband_name,
                 "sister3__husband_profession" =>$request-> sister1__husband_profession,
  
                "hobby1" =>$request->hobby1,
                "hobby2" =>$request->hobby2,
                "hobby3" =>$request->hobby3,
                "hobby4" =>$request->hobby4,

            ];


            Profile::create($input);

            Toastr::success('Saved Successfully', 'Success!');
            return redirect()->route('admin.profile.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $show = Profile::where('id',$id)->first();

        //  dd($show);

        return view('admin.profile.show', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, $id)
    {
         Profile::findOrFail($id)->delete();
        Toastr::warning('Marriage Deleted Successfully', 'Deleted!');
        return redirect()->route('admin.marriage.index');
    }
}
