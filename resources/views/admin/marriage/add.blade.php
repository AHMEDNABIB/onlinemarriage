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
                               <form action="{{ route('admin.marriage.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
       <div class="card-header">
        <h5 class=" text-danger">HUSBAND DETAILS</h5>
      </div>
       
      <div class="card-body">
          <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Full Name of the Husband</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="husband_name" class="form-control" placeholder="Please Enter Full Name of the Husband"  value="{{old('husband_name')}}" >

                  @if ($errors->has('husband_name'))
                    <span class="text-danger">{{ $errors->first('husband_name') }}</span>
                @endif
            </div>
        </div>

         <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Husband Father Name</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="husband_father_name" class="form-control" placeholder="Please Enter Full Name of the Father"  value="{{old('husband_father_name')}}" >

                  @if ($errors->has('husband_father_name'))
                    <span class="text-danger">{{ $errors->first('husband_father_name') }}</span>
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label"> Husband Mother Name</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="husband_mother_name" class="form-control" placeholder="Please Enter Full Name of the Mother"  value="{{old('husband_mother_name')}}" >

                  @if ($errors->has('husband_mother_name'))
                    <span class="text-danger">{{ $errors->first('husband_mother_name') }}</span>
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Religion</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:200px; height: 35px; " name="husband_religion" class="form-control"  placeholder="Religion" value="{{old('husband_religion')}}" >
                  @if ($errors->has('husband_religion'))
                    <span class="text-danger">{{ $errors->first('husband_religion') }}</span>
                @endif
            </div>
        </div>

          <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Date of Birth</label>
            <div class="col-sm-7">
                <input type="date" style="max-width:200px; height: 35px; " name="husband_birthday" class="form-control" id="inputEmail" placeholder="date" value="{{old('husband_birthday')}}" >
                  @if ($errors->has('husband_birthday'))
                    <span class="text-danger">{{ $errors->first('husband_birthday') }}</span>
                @endif
            </div>
        </div>

          <div class="row mb-3">
            <label for="" class="col-sm-5 col-form-label">Dowery</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:200px; height: 35px; " name="husband_dowery" class="form-control"  placeholder="Dowery Money" value="{{old('husband_dowery')}}" >
                  @if ($errors->has('husband_dowery'))
                    <span class="text-danger">{{ $errors->first('husband_dowery') }}</span>
                @endif
            </div>
        </div>
          <div class="row mb-3">
            <label for="exampleInput4" class="col-sm-5 form-label">Dowery Paid</label>
            <div class="col-sm-7">
              <input type="text" style="max-width:200px; height: 35px; " class="form-control" id="exampleInput4" name="husband_dowery_paid" placeholder="Dowery Paid " value="{{old('husband_dowery_paid')}}" />
                @if ($errors->has('husband_dowery_paid'))
                    <span class="text-danger">{{ $errors->first('husband_dowery_paid') }}</span>
                @endif
            </div>
        </div>

        <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-5 form-label">Dowery Remain</label>
              <div class="col-sm-7">
                <input type="text" style="max-width:200px; height: 35px; " class="form-control col-sm-8" id="exampleInput4" name="husband_dowery_remain" placeholder="Husband Dowery Remain" value="{{old('husband_dowery_remain')}}" />
                  @if ($errors->has('husband_dowery_remain'))
                    <span class="text-danger">{{ $errors->first('husband_dowery_remain') }}</span>
                @endif
              </div>
              
            </div>
          

       

         <div class="row mb-3 ">
            <label for="image" class="col-sm-5 col-form-label">Husband Image</label>
            <div class="col-sm-7">
                <input type="file" class="form-control" id="image" style="max-width:400px; height: 35px; " class="form-control" name="husband_image" >
                 @if ($errors->has('husband_image'))
                    <span class="text-danger">{{ $errors->first('husband_image') }}</span>
                @endif
                 <span class="text-primary" >Image dimension must be (600 X 600) pixels and maximum size 150kb. </span>
            </div>
             
          </div> 

            <div class="row  mt-3">
            <label for="image" class="col-sm-5 col-form-label">Husband Signature</label>
            <div class="col-sm-7">
                <input type="file" class="form-control" id="image" style="max-width:400px; height: 35px; " class="form-control" name="husband_signature" >
                 @if ($errors->has('husband_signature'))
                    <span class="text-danger">{{ $errors->first('husband_signature') }}</span>
                @endif
                 
                 <span class="text-primary" >Image dimension must be (600 X 600) pixels and maximum size 150kb. </span>
                 
            </div>
            
          </div>  

          
          
        <div class="row">
          <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-3 form-label"> Nid No</label>
              <div class="col-sm-7">
                <input type="number" class="form-control col-sm-9" id="exampleInput4" name="husband_nid" placeholder=" Nid No"   />
                 
              </div>
              
            </div>
          </div>

          <div class="col-md-6">
              <div class="row ">
            <label for="image" class="col-sm-4 col-form-label">Husband Nid Image</label>
            <div class="col-sm-8">
                <input type="file" class="form-control" id="image" style="max-width:400px; height: 35px; " class="form-control" name="husband_nid_image" >
                 
                 <span class="text-primary" >Image dimension must be (600 X 600) pixels and maximum size 150kb. </span>
            </div>
             @if ($errors->has('husband_nid_image'))
                    <span class="text-danger">{{ $errors->first('husband_nid_image') }}</span>
                @endif
          </div>
        </div>
        
        </div>
        
      </div>
         
        <h6>Permanent Address</h6>
        <hr>

        
        <div class="row">
          <div class="col-md-6">
            <div class="row mb-3">
              <label for="exampleInput4" class="form-label col-sm-4">Select Division</label>
              <div class="col-sm-8">
              <select id="exampleInput5" class="form-select mb-3 "style="width:200px; "name="husband_state">
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
                  @if ($errors->has('husband_state'))
                    <span class="text-danger">{{ $errors->first('husband_state') }}</span>
                @endif
            </div>
          </div>

          <div class="col-md-6">
            <div class="row mb-3">
               <label for="exampleInput4" class="col-sm-5 form-label">Upazila</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="exampleInput4" name="husband_city_name" placeholder="City Name" value="{{old('husband_city_name')}}" />

               @if ($errors->has('husband_city_name'))
                    <span class="text-danger">{{ $errors->first('husband_city_name') }}</span>
                @endif
               
            </div>
            
            </div>
        </div>
      </div>

        <div class="row">

           <div class="col-md-6">
            <div class="row mb-3">
               <label for="exampleInput4" class="col-sm-6 form-label">Road / Street / Village Name</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="exampleInput4" name="husband_road_name" placeholder="Road / Street Name" value="{{old('husband_road_name')}}" />
                @if ($errors->has('husband_road_name'))
                    <span class="text-danger">{{ $errors->first('husband_road_name') }}</span>
                @endif
            </div>
            </div>
           
            
          </div>
          <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-4 form-label">Flat / Room No.</label>
              <div class="col-sm-8">
                <input type="text" class="form-control col-sm-8" id="exampleInput4" name="husband_flat_no" placeholder="Flat / Room No." value="{{old('husband_flat_no')}}" />
                  @if ($errors->has('husband_flat_no'))
                    <span class="text-danger">{{ $errors->first('husband_flat_no') }}</span>
                @endif
              </div>
              
            </div>
          </div>

         
        </div>


       <div class="row">
          <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-4 form-label"> Pincode / Zipcode</label>
              <div class="col-sm-8">
                <input type="text" class="form-control col-sm-8" id="exampleInput4" name="husband_pincode" placeholder=" Pincode / Zipcode" value="{{old('husband_pincode')}}"/>
                  @if ($errors->has('husband_pincode'))
                    <span class="text-danger">{{ $errors->first('husband_pincode') }}</span>
                @endif
              </div>
              
            </div>
          </div>

          
        </div>
      

      <div class="card-header">
        <h5 class=" text-danger">WIFE DETAILS</h5>
      </div>

        <div class="card-body">

          <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Full Name of the Wife </label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " class="form-control" name="wife_name" placeholder="Please Enter Full Name of the Husband" value="{{old('wife_name')}}">
                  @if ($errors->has('wife_name'))
                    <span class="text-danger">{{ $errors->first('wife_name') }}</span>
                @endif
            </div>
        </div>

          <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Wife Father Name </label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " class="form-control" name="wife_father_name" placeholder="Please Enter Full Name of the Father Name" value="{{old('wife_father_name')}}">
                  @if ($errors->has('wife_father_name'))
                    <span class="text-danger">{{ $errors->first('wife_father_name') }}</span>
                @endif
            </div>
        </div>
          <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label"> Wife Mother Name</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " class="form-control" name="wife_mother_name" placeholder="Please Enter Full Name of the Mother" value="{{old('wife_mother_name')}}">
                  @if ($errors->has('wife_mother_name'))
                    <span class="text-danger">{{ $errors->first('wife_mother_name') }}</span>
                @endif
            </div>
        </div>
          <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Religion</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:200px; height: 35px; " class="form-control" id="inputEmail" name="wife_religion" placeholder="Religion" value="{{old('wife_religion')}}" >
                  @if ($errors->has('wife_religion'))
                    <span class="text-danger">{{ $errors->first('wife_religion') }}</span>
                @endif
            </div>
        </div>
          <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Date of Birth</label>
            <div class="col-sm-7">
                <input type="date" style="max-width:200px; height: 35px; " class="form-control" name="wife_birthday" value="{{old('wife_birthday')}}" >
                  @if ($errors->has('wife_birthday'))
                    <span class="text-danger">{{ $errors->first('wife_birthday') }}</span>
                @endif
            </div>
        </div>

         <div class="row ">
            <label for="image" class="col-sm-5 col-form-label">Wife Image</label>
            <div class="col-sm-7">
                <input type="file" class="form-control" id="image" style="max-width:400px; height: 35px; " class="form-control" name="wife_image" >
                 @if ($errors->has('wife_image'))
                    <span class="text-danger">{{ $errors->first('wife_image') }}</span>
                @endif
                 
                 <span class="text-primary" >Image dimension must be (600 X 600) pixels and maximum size 150kb. </span>
                 
            </div>
            
          </div> 
          
            <div class="row  mt-3">
            <label for="image" class="col-sm-5 col-form-label">Wife Signature</label>
            <div class="col-sm-7">
                <input type="file" class="form-control" id="image" style="max-width:400px; height: 35px; " class="form-control" name="wife_signature" >
                 @if ($errors->has('wife_signature'))
                    <span class="text-danger">{{ $errors->first('wife_signature') }}</span>
                @endif
                 
                 <span class="text-primary" >Image dimension must be (600 X 600) pixels and maximum size 150kb. </span>
                 
            </div>
            
          </div>  

        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-3 form-label"> Nid No</label>
              <div class="col-sm-7">
                <input id="Nid No" type="number" class="form-control col-sm-9" id="exampleInput4" name="wife_nid" placeholder=" Nid No"  />
                  
              </div>
              
            </div>
          </div>

          <div class="col-md-6">
              <div class="row ">
            <label for="image" class="col-sm-4 col-form-label"> Wife Nid Photo</label>
            <div class="col-sm-8">
                <input type="file" class="form-control" id="image" style="max-width:400px; height: 35px; " class="form-control" name="wife_nid_image" >
                
                 <span class="text-primary" >Image dimension must be (600 X 600) pixels and maximum size 150kb. </span>
            </div>
             @if ($errors->has('wife_nid_image'))
                     <span class="text-danger error-text mt-1">{{ $errors->first('wife_nid_image') }}</span>
                @endif
          </div>
        </div>
        

        <h6>Permanent Address</h6>
        <hr>

         <div class="row">
          <div class="col-md-6">
            <div class="row mb-3">
              <label for="exampleInput4" class="form-label col-sm-4">Select State</label>
              <div class="col-sm-8">
               <select id="exampleInput5" class="form-select mb-3 "style="width:200px; "name="wife_state">
                <option value="barishal">Barishal</option>
                <option value="chattogram">Chattogram</option>
                <option value="dhaka">Dhaka</option>
                <option value="khulna">Khulna</option>
                <option value="rajshahi">Rajshahi</option>
                <option value="rangpur">Rangpur</option>
                <option value="mymensingh">Mymensingh</option>
                <option value="sylhet">Sylhet</option>
                
              </select>
                @if ($errors->has('wife_state'))
                    <span class="text-danger">{{ $errors->first('wife_state') }}</span>
                @endif
                 </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="row mb-3">
               <label for="exampleInput4" class="col-sm-5 form-label">Upazila Name</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="exampleInput4" name="wife_city_name" placeholder="City Name" value="{{old('wife_city_name')}}" />
                  @if ($errors->has('wife_city_name'))
                    <span class="text-danger">{{ $errors->first('wife_city_name') }}</span>
                @endif
              </div>
           </div>
        </div>
      </div>

        <div class="row">

          <div class="col-md-6">
            <div class="row mb-3">
               <label for="exampleInput4" class="col-sm-6 form-label">Road / Street / Village Name</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="exampleInput4" name="wife_road_name" placeholder="Road / Street Name" value="{{old('wife_road_name')}}" />
                @if ($errors->has('wife_road_name'))
                    <span class="text-danger">{{ $errors->first('wife_road_name') }}</span>
                @endif
            </div>
            </div>  
          </div>

          <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-4 form-label">Flat / Room No.</label>
              <div class="col-sm-8">
                <input type="text" class="form-control col-sm-8" id="exampleInput4" name="wife_flat_no" placeholder="Flat / Room No."  value="{{old('wife_flat_no')}}"/>
                  @if ($errors->has('wife_flat_no'))
                    <span class="text-danger">{{ $errors->first('wife_flat_no') }}</span>
                @endif
              </div>
              
            </div>
          </div>

          
        </div>

       

       <div class="row">
          <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-4 form-label"> Pincode / Zipcode</label>
              <div class="col-sm-8">
                <input type="text" class="form-control col-sm-8" id="exampleInput4" name="wife_pincode" placeholder=" Pincode / Zipcode" value="{{old('wife_pincode')}}" />
                  @if ($errors->has('wife_pincode'))
                    <span class="text-danger">{{ $errors->first('wife_pincode') }}</span>
                @endif
              </div>
              
            </div>
          </div>

          
        </div>

       

      <div class="card-header">
        <h5 class=" text-danger">WITNESS DETAILS</h5>
      </div>

      <div class="card-body">
         <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Full Name of the Husband Witness</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " class="form-control" name="witness1_name" placeholder="Please Enter Full Name of the Witness" value="{{old('witness1_name')}}" >

                  @if ($errors->has('witness1_name'))
                    <span class="text-danger">{{ $errors->first('witness1_name') }}</span>
                @endif
               
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Contact Number of the Husband Witness</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " class="form-control" name="witness1_phone"  value="{{old('witness1_phone')}}" >

                  @if ($errors->has('witness1_phone'))
                    <span class="text-danger">{{ $errors->first('witness1_phone') }}</span>
                @endif
               
            </div>
        </div>

         <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Address of Husband Witness</label>
            <div class="col-sm-7 ">
              <textarea rows="2" cols="47" id="multiLineInput" name="witness1_address" class="" placeholder="Address of Witness">
                 {{old('witness1_address')}}
                </textarea>  
              
               @if ($errors->has('witness1_address'))
                    <span class="text-danger">{{ $errors->first('witness1_address') }}</span>
                @endif
               
            </div>
            
            
        </div>
        

        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Full Name of the Husband Witness</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="witness2_name" class="form-control" placeholder="Please Enter Full Name of the Witness"  value="{{old('witness2_name')}}">

                  @if ($errors->has('witness2_name'))
                    <span class="text-danger">{{ $errors->first('witenss2_name') }}</span>
                @endif
               
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Contact Number of the Husband Witness</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " class="form-control" name="witness2_phone"  value="{{old('witness2_phone')}}" >

                  @if ($errors->has('witness2_phone'))
                    <span class="text-danger">{{ $errors->first('witness2_phone') }}</span>
                @endif
               
            </div>
        </div>

        
         <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Address of Husband Witness</label>
            <div class="col-sm-7 ">
              <textarea rows="2" cols="47" id="multiLineInput" name="witness2_address" class="" placeholder="Address of Witness">
                 {{old('witness2_address')}}
              </textarea>

                @if ($errors->has('witness2_address'))
                    <span class="text-danger">{{ $errors->first('witness2_address') }}</span>
                @endif
              
            </div>

           
            
            
        </div>
        <hr>

        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Full Name of the Wife Witness</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="witness3_name" class="form-control" placeholder="Please Enter Full Name of the Witness"  value="{{old('witness3_name')}}" >

                  @if ($errors->has('witness3_name'))
                    <span class="text-danger">{{ $errors->first('witness3_name') }}</span>
                @endif
               
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Contact Number of the Wife Witness</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " class="form-control" name="witness3_phone"  value="{{old('witness3_phone')}}" >

                  @if ($errors->has('witness3_phone'))
                    <span class="text-danger">{{ $errors->first('witness3_phone') }}</span>
                @endif
               
            </div>
        </div>

        
         <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Address of Wife Witness</label>
            <div class="col-sm-7 ">
              <textarea rows="2" cols="47" id="multiLineInput" name="witness3_address" class="" placeholder="Address of Witness">
                 {{old('witness3_address')}}
              </textarea>

               @if ($errors->has('witness3_address'))
                    <span class="text-danger">{{ $errors->first('witness3_address') }}</span>
                @endif

               
            </div>
            
               
            
        </div>
        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Full Name of the Wife Witness</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="witness4_name" class="form-control"  value="{{old('witness4_name')}}" >
                  @if ($errors->has('witness4_name'))
                    <span class="text-danger">{{ $errors->first('witness4_name') }}</span>
                @endif
               
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Contact Number of the Wife Witness</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " class="form-control" name="witness4_phone"  value="{{old('witness4_phone')}}" >

                  @if ($errors->has('witness4_phone'))
                    <span class="text-danger">{{ $errors->first('witness4_phone') }}</span>
                @endif
               
            </div>
        </div>

        
         <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Address of Wife Witness</label>
            <div class="col-sm-7 ">
              <textarea rows="2" cols="47" id="multiLineInput" name="witness4_address" class="" placeholder="Address of Witness">
                 {{old('witness1_name')}}
                </textarea> 
              
              @if ($errors->has('witness4_address'))
                    <span class="text-danger">{{ $errors->first('witness4_address') }}</span>
                @endif
            </div>    
        </div>

      </div>

      <div class="card-header">
        <h5 class=" text-danger">DELIVERY DETAILS</h5>
      </div>

    <div class="card-body">
     
       

      <div class="row mt-2">
          <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-5 form-label">Husband Contact Number </label>
              <div class="col-sm-7">
                <input type="text" name="husband_contact_number" class="form-control col-sm-8" id="exampleInput4" placeholder=" Husband Contact Number"  value="{{old('husband_contact_number')}}" />
                  @if ($errors->has('husband_contact_number'))
                    <span class="text-danger">{{ $errors->first('husband_contact_number') }}</span>
                @endif
              </div>
              
            </div>
          </div>
            <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-5 form-label"> Husband Email Address</label>
              <div class="col-sm-7">
                <input type="text" name="husband_email" class="form-control col-sm-8" id="exampleInput4" placeholder=" abc@email.com" value="{{old('husband_email')}}" />
                @if ($errors->has('husband_email'))
                    <span class="text-danger">{{ $errors->first('husband_email') }}</span>
                @endif
              </div>
              
            </div>
          </div>
          
      </div>
      <div class="row mt-2">
          <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-5 form-label">Wife Contact Number </label>
              <div class="col-sm-7">
                <input type="text" name="wife_contact_number" class="form-control col-sm-8" id="exampleInput4" placeholder=" Wife Contact Number" value="{{old('wife_contact_number')}}" />
                @if ($errors->has('wife_contact_number'))
                    <span class="text-danger">{{ $errors->first('wife_contact_number') }}</span>
                @endif
              </div>
              
            </div>
          </div>
            <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-5 form-label"> Wife Email Address</label>
              <div class="col-sm-7">
                <input type="text" name="wife_email" class="form-control col-sm-8" id="exampleInput4" placeholder="abc@gmail.com" value="{{old('wife_email')}}" />
                @if ($errors->has('wife_email'))
                    <span class="text-danger">{{ $errors->first('wife_email') }}</span>
                @endif
              </div>
              
            </div>
          </div>
          
      </div>


     </div>

     <div class="card-header">
       <h5 class="text-danger">Marriage Address and Date</h5>
     </div>

      <div class="card-body">
       
       

      <div class="row mt-2">
          <div class="col">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-5 form-label">Marriage Date </label>
              <div class="col-sm-7">
                <input type="date" style="max-width:275px; height: 35px; " class="form-control" name="marriage_date" value="{{old('marriage_date')}}" >
                  @if ($errors->has('marriage_date'))
                    <span class="text-danger">{{ $errors->first('marriage_date') }}</span>
                @endif
            </div>
              
            </div>
          </div>
            
          </div>
          
      </div>
      <div class="row mt-2">
          <div class="col">
            <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Address of Marriage</label>
            <div class="col-sm-7 ">
              <textarea rows="2" cols="47" id="multiLineInput" name="marriage_address" class="" placeholder="Address of Witness">
                 {{old('marriage_address')}}
                </textarea> 
              
              @if ($errors->has('witness4_address'))
                    <span class="text-danger">{{ $errors->first('marriage_address') }}</span>
                @endif
            </div>    
        </div>
          </div>
            
          
      </div>

     
       
     <button type="submit" class="btn btn-primary btn-block">Submit</button>
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
