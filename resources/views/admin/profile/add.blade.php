@extends('admin.main')

@push('css')

@endpush

@section('content')

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->

        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-12 mx-auto">
                {{-- <h6 class="mb-0 text-uppercase">Horizontal Form</h6>
                <hr/> --}}
                <div class="card border-top border-0 border-4 border-info">
                    <div class="card-body">
                        
                        <div class="border p-4 rounded">
                               <form action="{{ route('admin.profile.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
       <div class="card-header">
        <h5 class=" text-danger">User Info</h5>
      </div>
       
      <div class="card-body">

        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label"> Enter Full Name*</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="name" class="form-control" placeholder="Please Enter Full Name "  value="{{old('name')}}" >

                  @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>

        
        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Profession Name*</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="profession" class="form-control" placeholder="Please Enter Profession name "  value="{{old('profession')}}" >

                  @if ($errors->has('profession'))
                    <span class="text-danger">{{ $errors->first('profession') }}</span>
                @endif
            </div>
        </div>

        
        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Profession Place*</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="profession_place" class="form-control" placeholder="Please Enter Full Name "  value="{{old('profession_place')}}" >

                  @if ($errors->has('profession_place'))
                    <span class="text-danger">{{ $errors->first('profession_place') }}</span>
                @endif
            </div>
        </div>


        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Mobile*</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="mobile" class="form-control" placeholder="Please Mobile Number "  value="{{old('mobile')}}" >

                  @if ($errors->has('mobile'))
                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                @endif
            </div>
        </div>

        {{-- <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label"></label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="" class="form-control" placeholder="Please Enter Full Name "  value="{{old('')}}" >

                  @if ($errors->has(''))
                    <span class="text-danger">{{ $errors->first('') }}</span>
                @endif
            </div>
        </div> --}}


        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Email*</label>
            <div class="col-sm-7">
                <input type="email" style="max-width:350px; height: 35px; " name="email" class="form-control" placeholder="Please Enter Your Email "  value="{{old('email')}}" >

                  @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>

         

           <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Date of Birth*</label>
            <div class="col-sm-7">
                <input type="date" style="max-width:200px; height: 35px; " name="birthday" class="form-control" id="inputEmail" placeholder="date" value="{{old('birthday')}}" >
                  @if ($errors->has('birthday'))
                    <span class="text-danger">{{ $errors->first('birthday') }}</span>
                @endif
            </div>
        </div>

         <div class="row ">
            <label for="image" class="col-sm-5 col-form-label"> Image*</label>
            <div class="col-sm-7">
                <input type="file" class="form-control" id="image" style="max-width:350px; height: 35px; " class="form-control" name="image" >
                 @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
                 
                 <span class="text-primary" >Image dimension must be (600 X 600) pixels and maximum size 150kb. </span>
                 
            </div>
            
          </div>

        <h6>Address</h6>
        <hr>

        
        <div class="row">
          <div class="col-md-6">
            <div class="row mb-3">
              <label for="exampleInput4" class="form-label col-sm-4">Select Division*</label>
              <div class="col-sm-8">
              <select id="exampleInput5" class="form-select mb-3 "style="width:200px; "name="district">
                <option value="barishal">Barishal</option>
                <option value="chattogram">Chattogram</option>
                <option value="dhaka">Dhaka</option>
                <option value="khulna">Khulna</option>
                <option value="rajshahi">Rajshahi</option>
                <option value="rangpur">Rangpur</option>
                <option value="mymensingh">Mymensingh</option>
                <option value="sylhet">Sylhet</option>
                
              </select>

               
                 </div>
                  @if ($errors->has('district'))
                    <span class="text-danger">{{ $errors->first('district') }}</span>
                @endif
            </div>
          </div>

          <div class="col-md-6">
            <div class="row mb-3">
               <label for="exampleInput4" class="col-sm-5 form-label">Police Station*</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="exampleInput4" name="policestation" placeholder="Police Station" value="{{old('policestation')}}" />

               @if ($errors->has('policestation'))
                    <span class="text-danger">{{ $errors->first('policestation') }}</span>
                @endif
               
            </div>
            
            </div>
        </div>
      </div>

        <div class="row">

           <div class="col-md-6">
            <div class="row mb-3">
               <label for="exampleInput4" class="col-sm-6 form-label">Road / Street / Village Name*</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="exampleInput4" name="village" placeholder="Road / Street Name" value="{{old('village')}}" />
                @if ($errors->has('village'))
                    <span class="text-danger">{{ $errors->first('village') }}</span>
                @endif
            </div>
            </div>
           
            
          </div>
          <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-4 form-label">Post Office*</label>
              <div class="col-sm-8">
                <input type="text" class="form-control col-sm-8" id="exampleInput4" name="postoffice" placeholder="Post Office." value="{{old('postoffice')}}" />
                  @if ($errors->has('postoffice'))
                    <span class="text-danger">{{ $errors->first('postoffice') }}</span>
                @endif
              </div>
              
            </div>
          </div>


        <div class="card-header">
        <h5 class=" text-danger">Personal Details</h5>
        </div>

        <div class="card-body">

             <div class="row">
                <div class="col-md-6">

                    <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Nick Name *</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="nickname" class="form-control" placeholder="Please Enter Nick Name "  value="{{old('nickname')}}" >

                  @if ($errors->has('nickname'))
                    <span class="text-danger">{{ $errors->first('nickname') }}</span>
                @endif
            </div>
        </div> 
                    
                </div>
                <div class="col-md-6">

                     <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Religion *</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="religion" class="form-control" placeholder=" Enter Your Religion "  value="islam" readonly > 

                 
            </div>
        </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Age *</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="age" class="form-control" placeholder="Please Enter Your Age "  value="{{old('age')}}" >

                  @if ($errors->has('age'))
                    <span class="text-danger">{{ $errors->first('age') }}</span>
                @endif
            </div>
        </div>
                </div>
                <div class="col-md-6">

                     <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Blood Group *</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="blood_group" class="form-control" placeholder="Please Enter Blood Group "  value="{{old('blood_group')}}" >

                  @if ($errors->has('blood_group'))
                    <span class="text-danger">{{ $errors->first('blood_group') }}</span>
                @endif
            </div>
        </div>

                </div>
            </div>

         
          <div class="row">
            <div class="col-md-6">
                 <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Height(Feet) *</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="height" class="form-control" placeholder="Please Enter Your Height "  value="{{old('height')}}" >

                  @if ($errors->has('height'))
                    <span class="text-danger">{{ $errors->first('height') }}</span>
                @endif
            </div>
        </div>
            </div>
            <div class="col-md-6">
                 <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Weight(KG) *</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="weight" class="form-control" placeholder="Please Enter Your Weight"  value="{{old('weight')}}" >

                  @if ($errors->has('weight'))
                    <span class="text-danger">{{ $errors->first('weight') }}</span>
                @endif
            </div>
        </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-6">
            <div class="row mb-3">
              <label for="exampleInput4" class="form-label col-sm-5">Gender *</label>
              <div class="col-sm-7">
              <select id="exampleInput5" class="form-select mb-3 "style="width:250px; "name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                
                
              </select>

               
                 </div>
                  @if ($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
            </div>
            </div>
            <div class="col-md-6">
                  <div class="row mb-3">
              <label for="exampleInput4" class="form-label col-sm-5">MARITAL STATUS *</label>
              <div class="col-sm-7">
              <select id="exampleInput5" class="form-select mb-3 "style="width:250px; "name="status">
                <option value="unmarried">Never Married</option>
                <option value="divorced">Divorced</option>
                <option value="separated">Separated</option>
                <option value="widow">Widow</option>
                <option value="widower">Widower</option>
                
                
              </select>

               
                 </div>
                  @if ($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
            </div>
            </div>
          </div>
        
         
        
        
        
         



        {{-- Card Body --}}

        </div>


         <div class="card-header">
        <h5 class=" text-danger">Education Details</h5>
        </div>

        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                      <div class="row mb-3">
                <label for="inputEmail" class="col-sm-5 col-form-label">Univercity Name</label>
                <div class="col-sm-7">
                    <input type="text" style="max-width:350px; height: 35px; " name="university_name" class="form-control" placeholder="Enter  Name of Your Higher Education Place Name "  value="{{old('university_name')}}" >

                    @if ($errors->has('university_name'))
                        <span class="text-danger">{{ $errors->first('university_name') }}</span>
                    @endif
                </div>
            </div>
                </div>
                <div class="col-md-6">
                     <div class="row mb-3">
                <label for="inputEmail" class="col-sm-5 col-form-label">Degree Name</label>
                <div class="col-sm-7">
                    <input type="text" style="max-width:350px; height: 35px; " name="university_degree" class="form-control" placeholder=" Enter Your Degree Name "  value="{{old('university_degree')}}" >

                    @if ($errors->has('university_degree'))
                        <span class="text-danger">{{ $errors->first('university_degree') }}</span>
                    @endif
                </div>
            </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">

                     <div class="row mb-3">
                <label for="inputEmail" class="col-sm-5 col-form-label">Subject Name</label>
                <div class="col-sm-7">
                    <input type="text" style="max-width:350px; height: 35px; " name="university_subject" class="form-control" placeholder=" Enter Your Subject Name"  value="{{old('university_subject')}}" >

                    @if ($errors->has('university_subject'))
                        <span class="text-danger">{{ $errors->first('university_subject') }}</span>
                    @endif
                </div>
            </div>

                </div>
                <div class="col-md-6"></div>
            </div>

          
           <div class="row">
            <div class="col-md-6">
                 <div class="row mb-3">
                <label for="inputEmail" class="col-sm-5 col-form-label">Collage Name</label>
                <div class="col-sm-7">
                    <input type="text" style="max-width:350px; height: 35px; " name="collage_name" class="form-control" placeholder="Please Enter Collage Name "  value="{{old('collage_name')}}" >

                    @if ($errors->has('collage_name'))
                        <span class="text-danger">{{ $errors->first('collage_name') }}</span>
                    @endif
                </div>
            </div>
            </div>
            <div class="col-md-6">

                 <div class="row mb-3">
                <label for="inputEmail" class="col-sm-5 col-form-label">Degree Name</label>
                <div class="col-sm-7">
                    <input type="text" style="max-width:350px; height: 35px; " name="collage_degree" class="form-control" placeholder="Please Enter Degree Name "  value="{{old('collage_degree')}}" >

                    @if ($errors->has('collage_degree'))
                        <span class="text-danger">{{ $errors->first('collage_degree') }}</span>
                    @endif
                </div>
            </div>

            </div>
           </div>

           <div class="row">
            <div class="col-md-6">
                 <div class="row mb-3">
                <label for="inputEmail" class="col-sm-5 col-form-label">Subject Name</label>
                <div class="col-sm-7">
                    <input type="text" style="max-width:350px; height: 35px; " name="collage_subject" class="form-control" placeholder="Please Enter Full Name "  value="{{old('collage_subject')}}" >

                    @if ($errors->has('collage_subject'))
                        <span class="text-danger">{{ $errors->first('collage_subject') }}</span>
                    @endif
                </div>
            </div>

            </div>
            <div class="col-md-6"></div>
           </div>


           <div class="row">
            <div class="col-md-6">
                <div class="row mb-3">
                <label for="inputEmail" class="col-sm-5 col-form-label">School Name</label>
                <div class="col-sm-7">
                    <input type="text" style="max-width:350px; height: 35px; " name="school_name" class="form-control" placeholder=" Enter School  Name "  value="{{old('school_name')}}" >

                    @if ($errors->has('school_name'))
                        <span class="text-danger">{{ $errors->first('school_name') }}</span>
                    @endif
                </div>
            </div>
            </div>
            <div class="col-md-6">
                 <div class="row mb-3">
                <label for="inputEmail" class="col-sm-5 col-form-label"> Degree Name</label>
                <div class="col-sm-7">
                    <input type="text" style="max-width:350px; height: 35px; " name="school_degree" class="form-control" placeholder="Please Enter Degree Name "  value="{{old('school_degree')}}" >

                    @if ($errors->has('school_degree'))
                        <span class="text-danger">{{ $errors->first('school_degree') }}</span>
                    @endif
                </div>
            </div>
            </div>
           </div>
           
           <div class="row">
            <div class="col-md-6">
                 <div class="row mb-3">
                <label for="inputEmail" class="col-sm-5 col-form-label">Subject Name</label>
                <div class="col-sm-7">
                    <input type="text" style="max-width:350px; height: 35px; " name="school_subject" class="form-control" placeholder="Please Enter Subject Name "  value="{{old('school_subject')}}" >

                    @if ($errors->has('school_subject'))
                        <span class="text-danger">{{ $errors->first('school_subject') }}</span>
                    @endif
                </div>
            </div>

            </div>
            <div class="col-md-6"></div>
           </div>
           
           
           
           
            
           
           
        </div>

         <div class="card-header">
        <h5 class=" text-danger">Family Details</h5>
        </div>


        <div class="card-body">

           

            <div class="row">
                <div class="col-md-6">

                     <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Father Name *</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="father_name" class="form-control" placeholder=" Enter Father Name "  value="{{old('father_name')}}" >

                  @if ($errors->has('father_name'))
                    <span class="text-danger">{{ $errors->first('father_name') }}</span>
                @endif
            </div>
        </div>
                    
                </div>
                <div class="col-md-6">
           <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Father Profession *</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="father_profession" class="form-control" placeholder="Enter Father Profession "  value="{{old('father_profession')}}" >

                  @if ($errors->has('father_profession'))
                    <span class="text-danger">{{ $errors->first('father_profession') }}</span>
                @endif
            </div>
        </div>

                </div>
            </div>


            <div class="row">
                <div class="col-md-6">

                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-5 col-form-label">Mother Name *</label>
                        <div class="col-sm-7">
                            <input type="text" style="max-width:350px; height: 35px; " name="mother_name" class="form-control" placeholder=" Enter Mother Name "  value="{{old('mother_name')}}" >

                            @if ($errors->has('mother_name'))
                                <span class="text-danger">{{ $errors->first('mother_name') }}</span>
                            @endif
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-6">

                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-5 col-form-label">Mother Profession *</label>
                        <div class="col-sm-7">
                            <input type="text" style="max-width:350px; height: 35px; " name="mother_profession" class="form-control" placeholder="Enter Mother Profession "  value="{{old('mother_profession')}}" >

                            @if ($errors->has('father_profession'))
                                <span class="text-danger">{{ $errors->first('father_profession') }}</span>
                            @endif
                        </div>
                    </div>

                </div>
            </div>


       
             
        <div class="row">
                <div class="col-md-6">

                      <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Brother Name</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="brother1_name" class="form-control" placeholder="Enter Brother Name "  value="{{old('brother1_name')}}" >

                  @if ($errors->has('brother1_name'))
                    <span class="text-danger">{{ $errors->first('brother1_name') }}</span>
                @endif
            </div>
        
        </div>
                    
                </div>
                <div class="col-md-6">

                    <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Brother  Profession</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="brother1_profession" class="form-control" placeholder="Enter Brother Profession "  value="{{old('brother1_profession')}}" >

                  @if ($errors->has('brother1_profession'))
                    <span class="text-danger">{{ $errors->first('brother1_profession') }}</span>
                @endif
            </div>
        </div>

                </div>
            </div>
       

            <div class="row">
                <div class="col-md-6">
                     <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Sister-in-law Name</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="brother1_wife_name" class="form-control" placeholder="Enter Sister-in-Law Name "  value="{{old('brother1_wife_name')}}" >

                  @if ($errors->has('brother1_wife_name'))
                    <span class="text-danger">{{ $errors->first('brother1_wife_name') }}</span>
                @endif
            </div>
        </div>
                </div>
                <div class="col-md-6">
                      <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-5 col-form-label">Sister-in-law Profession</label>
                        <div class="col-sm-7">
                            <input type="text" style="max-width:350px; height: 35px; " name="brother1_wife__profession" class="form-control" placeholder="Enter Sister-in-law Profession "  value="{{old('brother1_wife__profession')}}" >

                            @if ($errors->has('brother1_wife__profession'))
                                <span class="text-danger">{{ $errors->first('brother1_wife__profession') }}</span>
                            @endif
                        </div>
                     </div>
                </div>
            </div>




             <div class="row">
                <div class="col-md-6">

                      <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Brother Name</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="brother2_name" class="form-control" placeholder="Enter Brother Name "  value="{{old('brother2_name')}}" >

                  @if ($errors->has('brother2_name'))
                    <span class="text-danger">{{ $errors->first('brother2_name') }}</span>
                @endif
            </div>
        
        </div>
                    
                </div>
                <div class="col-md-6">

                    <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Brother  Profession</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="brother2_profession" class="form-control" placeholder="Enter Brother Profession "  value="{{old('brother2_profession')}}" >

                  @if ($errors->has('brother2_profession'))
                    <span class="text-danger">{{ $errors->first('brother2_profession') }}</span>
                @endif
            </div>
        </div>

                </div>
            </div>
       

            <div class="row">
                <div class="col-md-6">
                     <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Sister-in-law Name</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="brother2_wife_name" class="form-control" placeholder="Enter Sister-in-Law Name "  value="{{old('brother2_wife_name')}}" >

                  @if ($errors->has('brother2_wife_name'))
                    <span class="text-danger">{{ $errors->first('brother2_wife_name') }}</span>
                @endif
            </div>
        </div>
                </div>
                <div class="col-md-6">
                      <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-5 col-form-label">Sister-in-law Profession</label>
                        <div class="col-sm-7">
                            <input type="text" style="max-width:350px; height: 35px; " name="brother2_wife__profession" class="form-control" placeholder="Enter Sister-in-law Profession "  value="{{old('brother2_wife__profession')}}" >

                            @if ($errors->has('brother2_wife__profession'))
                                <span class="text-danger">{{ $errors->first('brother2_wife__profession') }}</span>
                            @endif
                        </div>
                     </div>
                </div>
            </div>



        <div class="row">
                <div class="col-md-6">

                      <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Brother Name</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="brother3_name" class="form-control" placeholder="Enter Brother Name "  value="{{old('brother3_name')}}" >

                  @if ($errors->has('brother3_name'))
                    <span class="text-danger">{{ $errors->first('brother3_name') }}</span>
                @endif
            </div>
        
        </div>
                    
                </div>
                <div class="col-md-6">

                    <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Brother  Profession</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="brother3_profession" class="form-control" placeholder="Enter Brother Profession "  value="{{old('brother3_profession')}}" >

                  @if ($errors->has('brother3_profession'))
                    <span class="text-danger">{{ $errors->first('brother3_profession') }}</span>
                @endif
            </div>
        </div>

                </div>
            </div>
       

            <div class="row">
                <div class="col-md-6">
                     <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Sister-in-law Name</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="brother3_wife_name" class="form-control" placeholder="Enter Sister-in-Law Name "  value="{{old('brother3_wife_name')}}" >

                  @if ($errors->has('brother3_wife_name'))
                    <span class="text-danger">{{ $errors->first('brother3_wife_name') }}</span>
                @endif
            </div>
        </div>
                </div>
                <div class="col-md-6">
                      <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-5 col-form-label">Sister-in-law Profession</label>
                        <div class="col-sm-7">
                            <input type="text" style="max-width:350px; height: 35px; " name="brother3_wife__profession" class="form-control" placeholder="Enter Sister-in-law Profession "  value="{{old('brother3_wife__profession')}}" >

                            @if ($errors->has('brother3_wife__profession'))
                                <span class="text-danger">{{ $errors->first('brother3_wife__profession') }}</span>
                            @endif
                        </div>
                     </div>
                </div>

                  <div class="row">
                <div class="col-md-6">

                      <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Sister Name</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="sister1_name" class="form-control" placeholder="Enter Brother Name "  value="{{old('sister1_name')}}" >

                  @if ($errors->has('sister1_name'))
                    <span class="text-danger">{{ $errors->first('sister1_name') }}</span>
                @endif
            </div>
        
        </div>
                    
                </div>
                <div class="col-md-6">

                    <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Sister  Profession</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="sister1_profession" class="form-control" placeholder="Enter Brother Profession "  value="{{old('sister1_profession')}}" >

                  @if ($errors->has('sister1_profession'))
                    <span class="text-danger">{{ $errors->first('sister1_profession') }}</span>
                @endif
            </div>
        </div>

                </div>
            </div>


             <div class="row">
                <div class="col-md-6">

                      <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Brother-in-law Name</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="sister1_husband_name" class="form-control" placeholder="Enter Brother Name "  value="{{old('sister1_husband_name')}}" >

                  @if ($errors->has('sister1_husband_name'))
                    <span class="text-danger">{{ $errors->first('sister1_husband_name') }}</span>
                @endif
            </div>
        
        </div>
                    
                </div>
                <div class="col-md-6">

                    <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Brother-in-law  Profession</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="sister1__husband_profession" class="form-control" placeholder="Enter Brother Profession "  value="{{old('sister1__husband_profession')}}" >

                  @if ($errors->has('sister1_profession'))
                    <span class="text-danger">{{ $errors->first('sister1__husband_profession') }}</span>
                @endif
            </div>
        </div>

                </div>
            </div>
        <div class="row">
                <div class="col-md-6">

                      <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Sister Name</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="sister2_name" class="form-control" placeholder="Enter Brother Name "  value="{{old('sister2_name')}}" >

                  @if ($errors->has('sister2_name'))
                    <span class="text-danger">{{ $errors->first('sister2_name') }}</span>
                @endif
            </div>
        
        </div>
                    
                </div>
                <div class="col-md-6">

                    <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Sister  Profession</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="sister2_profession" class="form-control" placeholder="Enter Brother Profession "  value="{{old('sister2_profession')}}" >

                  @if ($errors->has('sister2_profession'))
                    <span class="text-danger">{{ $errors->first('sister2_profession') }}</span>
                @endif
            </div>
        </div>

                </div>
            </div>


             <div class="row">
                <div class="col-md-6">

                      <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Brother-in-law Name</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="sister2_husband_name" class="form-control" placeholder="Enter Brother Name "  value="{{old('sister2_husband_name')}}" >

                  @if ($errors->has('sister1_husband_name'))
                    <span class="text-danger">{{ $errors->first('sister2_husband_name') }}</span>
                @endif
            </div>
        
        </div>
                    
                </div>
                <div class="col-md-6">

                    <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Brother-in-law  Profession</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="sister2__husband_profession" class="form-control" placeholder="Enter Brother Profession "  value="{{old('sister2__husband_profession')}}" >

                  @if ($errors->has('sister2__husband_profession'))
                    <span class="text-danger">{{ $errors->first('sister2__husband_profession') }}</span>
                @endif
            </div>
        </div>

                </div>
            </div>

        <div class="row">
                <div class="col-md-6">

                      <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Sister Name</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="sister3_name" class="form-control" placeholder="Enter Brother Name "  value="{{old('sister3_name')}}" >

                  @if ($errors->has('sister3_name'))
                    <span class="text-danger">{{ $errors->first('sister3_name') }}</span>
                @endif
            </div>
        
        </div>
                    
                </div>
                <div class="col-md-6">

                    <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Sister  Profession</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="sister3_profession" class="form-control" placeholder="Enter Brother Profession "  value="{{old('sister3_profession')}}" >

                  @if ($errors->has('sister3_profession'))
                    <span class="text-danger">{{ $errors->first('sister3_profession') }}</span>
                @endif
            </div>
        </div>

                </div>
            </div>


             <div class="row">
                <div class="col-md-6">

                      <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Brother-in-law Name</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="sister3_husband_name" class="form-control" placeholder="Enter Brother Name "  value="{{old('sister3_husband_name')}}" >

                  @if ($errors->has('sister3_husband_name'))
                    <span class="text-danger">{{ $errors->first('sister3_husband_name') }}</span>
                @endif
            </div>
        
        </div>
                    
                </div>
                <div class="col-md-6">

                    <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Brother-in-law  Profession</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="sister3__husband_profession" class="form-control" placeholder="Enter Brother Profession "  value="{{old('sister3__husband_profession')}}" >

                  @if ($errors->has('sister3__husband_profession'))
                    <span class="text-danger">{{ $errors->first('sister3__husband_profession') }}</span>
                @endif
            </div>
        </div>

                </div>
            </div>



            </div>

        <div class="card-header">
        <h5 class=" text-danger">Hobby And Interest</h5>
        </div>

        <div class="card-body">

             <div class="row">
                <div class="col-md-6">
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-5 col-form-label">Hooby1 Name *</label>
                        <div class="col-sm-7">
                            <input type="text" style="max-width:350px; height: 35px; " name="hobby1" class="form-control" placeholder="Enter Your Hobby "  value="{{old('hobby1')}}" >

                            @if ($errors->has('hobby1'))
                                <span class="text-danger">{{ $errors->first('hobby1') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-5 col-form-label">Hooby2 Name *</label>
                        <div class="col-sm-7">
                            <input type="text" style="max-width:350px; height: 35px; " name="hobby2" class="form-control" placeholder="Enter Your Hobby "  value="{{old('hobby2')}}" >

                            @if ($errors->has('hobby2'))
                                <span class="text-danger">{{ $errors->first('hobby2') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

             <div class="row">
                <div class="col-md-6">
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-5 col-form-label">Hooby3 Name *</label>
                        <div class="col-sm-7">
                            <input type="text" style="max-width:350px; height: 35px; " name="hobby3" class="form-control" placeholder="Enter Your Hobby "  value="{{old('hobby3')}}" >

                            @if ($errors->has('hobby3'))
                                <span class="text-danger">{{ $errors->first('hobby3') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-5 col-form-label">Hooby4 Name </label>
                        <div class="col-sm-7">
                            <input type="text" style="max-width:350px; height: 35px; " name="hobby4" class="form-control" placeholder="Enter Your Hobby "  value="{{old('hobby4')}}" >

                            @if ($errors->has('hobby4'))
                                <span class="text-danger">{{ $errors->first('hobby4') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>




      


            
         
         
         



       

          
       
        
        


        </div>
        
       


        
           <button type="submit" class="btn btn-primary btn-block">Submit</button> 
       
         
        </div>


      



          
        
        </div>
      </div>
      </div>
   
    
    </div>

       

    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->

    </div>
</div>

@endsection

@push('js')

@endpush
