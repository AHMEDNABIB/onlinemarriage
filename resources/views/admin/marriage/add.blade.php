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
                        @if($errors->any())
                                <div class="col-12 my-3 bg-danger text-white py-2">
                                        <h6 class="pt-2">{{ implode('', $errors->all(':message')) }}</h6>
                                    </div>
                                @endif
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
                <input type="text" style="max-width:350px; height: 35px; " name="husband_name" class="form-control" placeholder="Please Enter Full Name of the Husband" required>
            </div>
        </div>
          <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Religion</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:200px; height: 35px; " name="husband_religion" class="form-control"  placeholder="Religion" required>
            </div>
        </div>
          <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Date of Birth</label>
            <div class="col-sm-7">
                <input type="date" style="max-width:200px; height: 35px; " name="husband_birthday" class="form-control" id="inputEmail" placeholder="Email" required>
            </div>
        </div>
         <div class="row ">
            <label for="image" class="col-sm-5 col-form-label">Husband Image</label>
            <div class="col-sm-7">
                <input type="file" class="form-control" id="image" style="max-width:400px; height: 35px; " class="form-control" name="husband_image" required>
                 <span class="text-primary" >Image dimension must be (600 X 600) pixels and maximum size 150kb. </span>
            </div>
          </div>  
        </div>
        <div class="row mt-4">
          <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-3 form-label"> Nid No</label>
              <div class="col-sm-7">
                <input type="text" class="form-control col-sm-9" id="exampleInput4" name="husband_nid" placeholder=" Nid No" />
              </div>
              
            </div>
          </div>

          <div class="col-md-6">
              <div class="row ">
            <label for="image" class="col-sm-4 col-form-label">Husband Nid Image</label>
            <div class="col-sm-8">
                <input type="file" class="form-control" id="image" style="max-width:400px; height: 35px; " class="form-control" name="husband_nid_image" required>
                 <span class="text-primary" >Image dimension must be (600 X 600) pixels and maximum size 150kb. </span>
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
            </div>
          </div>

          <div class="col-md-6">
            <div class="row mb-3">
               <label for="exampleInput4" class="col-sm-5 form-label">Upazila</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="exampleInput4" name="husband_city_name" placeholder="City Name" />
            </div>
            </div>
        </div>
      </div>

        <div class="row">

           <div class="col-md-6">
            <div class="row mb-3">
               <label for="exampleInput4" class="col-sm-6 form-label">Road / Street / Village Name</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="exampleInput4" name="husband_road_name" placeholder="Road / Street Name" />
            </div>
            </div>
           
            
          </div>
          <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-4 form-label">Flat / Room No.</label>
              <div class="col-sm-8">
                <input type="text" class="form-control col-sm-8" id="exampleInput4" name="husband_flat_no" placeholder="Flat / Room No." />
              </div>
              
            </div>
          </div>

         
        </div>


       <div class="row">
          <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-4 form-label"> Pincode / Zipcode</label>
              <div class="col-sm-8">
                <input type="text" class="form-control col-sm-8" id="exampleInput4" name="husband_pincode" placeholder=" Pincode / Zipcode" />
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
                <input type="text" style="max-width:350px; height: 35px; " class="form-control" name="wife_name" placeholder="Please Enter Full Name of the Husband" required>
            </div>
        </div>
          <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Religion</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:200px; height: 35px; " class="form-control" id="inputEmail" name="wife_religion" placeholder="Religion" required>
            </div>
        </div>
          <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Date of Birth</label>
            <div class="col-sm-7">
                <input type="date" style="max-width:200px; height: 35px; " class="form-control" name="wife_birthday" required>
            </div>
        </div>

         <div class="row ">
            <label for="image" class="col-sm-5 col-form-label">Wife Image</label>
            <div class="col-sm-7">
                <input type="file" class="form-control" id="image" style="max-width:400px; height: 35px; " class="form-control" name="wife_image" required>
                 <span class="text-primary" >Image dimension must be (600 X 600) pixels and maximum size 150kb. </span>
            </div>
          </div>  
        </div>
        
        <div class="row mt-4">
          <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-3 form-label"> Nid No</label>
              <div class="col-sm-7">
                <input type="text" class="form-control col-sm-9" id="exampleInput4" name="wife_nid" placeholder=" Nid No" />
              </div>
              
            </div>
          </div>

          <div class="col-md-6">
              <div class="row ">
            <label for="image" class="col-sm-4 col-form-label"> Wife Nid Photo</label>
            <div class="col-sm-8">
                <input type="file" class="form-control" id="image" style="max-width:400px; height: 35px; " class="form-control" name="wife_nid_image" required>
                 <span class="text-primary" >Image dimension must be (600 X 600) pixels and maximum size 150kb. </span>
            </div>
          </div>
        </div>

        <h6>Permanent Address</h6>
        <hr>

         <div class="row">
          <div class="col-md-6">
            <div class="row mb-3">
              <label for="exampleInput4" class="form-label col-sm-4">Select State</label>
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
            </div>
          </div>

          <div class="col-md-6">
            <div class="row mb-3">
               <label for="exampleInput4" class="col-sm-5 form-label">Upazila Name</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="exampleInput4" name="wife_city_name" placeholder="City Name" />
              </div>
           </div>
        </div>
      </div>

        <div class="row">

          <div class="col-md-6">
            <div class="row mb-3">
               <label for="exampleInput4" class="col-sm-6 form-label">Road / Street / Village Name</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="exampleInput4" name="wife_road_name" placeholder="Road / Street Name" />
            </div>
            </div>  
          </div>

          <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-4 form-label">Flat / Room No.</label>
              <div class="col-sm-8">
                <input type="text" class="form-control col-sm-8" id="exampleInput4" name="wife_flat_no" placeholder="Flat / Room No." />
              </div>
              
            </div>
          </div>

          
        </div>

       

       <div class="row">
          <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-4 form-label"> Pincode / Zipcode</label>
              <div class="col-sm-8">
                <input type="text" class="form-control col-sm-8" id="exampleInput4" name="wife_pincode" placeholder=" Pincode / Zipcode" />
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
                <input type="text" style="max-width:350px; height: 35px; " class="form-control" name="witness1_name" placeholder="Please Enter Full Name of the Witness" required>
               
            </div>
        </div>

         <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Address of Husband Witness</label>
            <div class="col-sm-7 ">
              <textarea rows="2" cols="35" id="multiLineInput" name="witness1_address" class="" placeholder="Address of Witness"></textarea>
               
            </div>
            
        </div>
        

        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Full Name of the Husband Witness</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="witness2_name" class="form-control" placeholder="Please Enter Full Name of the Witness" required>
               
            </div>
        </div>
        
         <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Address of Husband Witness</label>
            <div class="col-sm-7 ">
              <textarea rows="2" cols="35" id="multiLineInput" name="witness2_address" class="" placeholder="Address of Witness"></textarea>
               
            </div>
            
        </div>
        <hr>

        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Full Name of the Wife Witness</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="witness3_name" class="form-control" placeholder="Please Enter Full Name of the Witness" required>
               
            </div>
        </div>
        
         <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Address of Wife Witness</label>
            <div class="col-sm-7 ">
              <textarea rows="2" cols="35" id="multiLineInput" name="witness3_address" class="" placeholder="Address of Witness"></textarea>
               
            </div>
            
        </div>
        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Full Name of the Wife Witness</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="witness4_name" class="form-control" placeholder="Please Enter Full Name of the Witness" required>
               
            </div>
        </div>
        
         <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Address of Wife Witness</label>
            <div class="col-sm-7 ">
              <textarea rows="2" cols="35" id="multiLineInput" name="witness4_address" class="" placeholder="Address of Witness"></textarea>
               
            </div>
            
        </div>
      </div>

      <div class="card-header">
        <h5 class=" text-danger">DELIVERY DETAILS</h5>
      </div>

      <div class="card-body">
        <h6>Delivery Address</h6>
       

      <div class="row mt-2">
          <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-5 form-label">Husband Contact Number </label>
              <div class="col-sm-7">
                <input type="text" name="husband_contact_number" class="form-control col-sm-8" id="exampleInput4" placeholder=" Husband Contact Number" />
              </div>
              
            </div>
          </div>
            <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-5 form-label"> Husband Email Address</label>
              <div class="col-sm-7">
                <input type="text" name="husband_email" class="form-control col-sm-8" id="exampleInput4" placeholder=" abc@email.com" />
              </div>
              
            </div>
          </div>
          
      </div>
      <div class="row mt-2">
          <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-5 form-label">Wife Contact Number </label>
              <div class="col-sm-7">
                <input type="text" name="wife_contact_number" class="form-control col-sm-8" id="exampleInput4" placeholder=" Wife Contact Number" />
              </div>
              
            </div>
          </div>
            <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-5 form-label"> Wife Email Address</label>
              <div class="col-sm-7">
                <input type="text" name="wife_email" class="form-control col-sm-8" id="exampleInput4" placeholder=" Pincode / Zipcode" />
              </div>
              
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
