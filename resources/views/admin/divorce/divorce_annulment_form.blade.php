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
                               <form action="{{ route('admin.divorce.update', $divorce->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <h1></h1>

       <div class="card-header">
        <h5 class=" text-danger">HUSBAND DETAILS</h5>
      </div>
       
      <div class="card-body">
          <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Full Name of the Husband</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="husband_name" class="form-control" placeholder="Please Enter Full Name of the Husband" value="{{ $divorce->husband_name }}" required>
            </div>
        </div>
          <div class="row mb-3">
            <label  class="col-sm-5 col-form-label">Religion</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:200px; height: 35px; " name="husband_religion" class="form-control"  placeholder="Religion" value="{{ $divorce->husband_religion }}" required>
            </div>
        </div>
          <div class="row mb-3">
            <label class="col-sm-5 col-form-label">Date of Birth</label>
            <div class="col-sm-7">
                <input type="date" style="max-width:200px; height: 35px; " name="husband_birthday" value="{{ $divorce->husband_birthday}}"class="form-control" id="inputEmail" placeholder="Email" required>
            </div>
        </div>
          {{-- <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Marital status before the date of Marriage</label>
            <div class="col-sm-7">
              <select id="exampleInput5" class="form-select mb-3 "style="width:200px; " name="husband_marital_status" >
                <option  value="bachelor">Bachelor</option>
                <option value="married">Married</option>
                <option value="divorcee">Divorcee</option>
                <option value="widower">Widower</option>
              </select>
            </div>
        </div> --}}

        <p>Permanent Address</p>
        <hr>

        <div class="row">
          <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-4 form-label">Flat / Room No.</label>
              <div class="col-sm-8">
                <input type="text" class="form-control col-sm-8" id="exampleInput4" name="husband_flat_no" placeholder="Flat / Room No." value="{{ $divorce->husband_flat_no }}" />
              </div>
              
            </div>
          </div>

          <div class="col-md-6">
            <div class="row mb-3">
               <label for="exampleInput4" class="col-sm-5 form-label">Road / Street Name</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="exampleInput4" name="husband_road_name" placeholder="Road / Street Name" value="{{ $divorce->husband_road_name }}" />
            </div>
            </div>
           
            
          </div>
        </div>

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
               <label for="exampleInput4" class="col-sm-5 form-label">City Name</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="exampleInput4" name="husband_city_name" placeholder="City Name" />
            </div>
            </div>
        </div>
      </div>

       <div class="row">
          <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-4 form-label"> Pincode / Zipcode</label>
              <div class="col-sm-8">
                <input type="text" class="form-control col-sm-8" id="exampleInput4" name="husband_pincode" value="{{ $divorce->husband_pincode }}" placeholder=" Pincode / Zipcode" />
              </div>
              
            </div>
          </div>

          
        </div>
       <div class="row mt-3">
          <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-4 form-label"> Nid No</label>
              <div class="col-sm-8">
                <input type="text" class="form-control col-sm-8" id="exampleInput4" name="husband_nid" value="{{ $divorce->husband_nid }}"placeholder=" Nid No" />
              </div>
              
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
                <input type="text" style="max-width:350px; height: 35px; " class="form-control" name="wife_name" value="{{ $divorce->wife_name }}" placeholder="Please Enter Full Name of the Wife"  required>
            </div>
        </div>
          <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Religion</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:200px; height: 35px; " class="form-control" id="inputEmail" name="wife_religion" value="{{ $divorce->wife_religion }}"  placeholder="Religion" required>
            </div>
        </div>
          <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Date of Birth</label>
            <div class="col-sm-7">
                <input type="date" style="max-width:200px; height: 35px; " class="form-control" name="wife_birthday" value="{{ $divorce->wife_birthday}}" required>
            </div>
        </div>
          {{-- <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Marital status before the date of Marriage</label>
            <div class="col-sm-7">
              <select id="exampleInput5" class="form-select mb-3 " name="wife_marital_status" style="width:200px; ">
                <option  value="bachelor">Bachelor</option>
                 <option value="married">Married</option>
                <option value="divorcee">Divorcee</option>
                <option value="widower">Widower</option>
               
              </select>
            </div>
        </div> --}}

        <p>Permanent Address</p>
        <hr>

        <div class="row">
          <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-4 form-label">Flat / Room No.</label>
              <div class="col-sm-8">
                <input type="text" class="form-control col-sm-8" id="exampleInput4" name="wife_flat_no" value="{{ $divorce->wife_flat_no }}"placeholder="Flat / Room No." />
              </div>
              
            </div>
          </div>

          <div class="col-md-6">
            <div class="row mb-3">
               <label for="exampleInput4" class="col-sm-5 form-label">Road / Street Name</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="exampleInput4" value="{{ $divorce->wife_road_name }}" name="wife_road_name" placeholder="Road / Street Name" />
            </div>
            </div>
           
            
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-3">
              <label for="exampleInput4" class="form-label col-sm-4">Select State</label>
              <div class="col-sm-8">
               <select id="exampleInput5" class="form-select mb-3 " value="{{ $divorce->wife_state }}"  name="wife_state" style="width:200px; ">
                <option  value="dhaka">Dhaka</option>
                <option  value="noakhali">Noakhali</option>
                <option  value="berishal">Barishal</option>
              </select>
                 </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="row mb-3">
               <label for="exampleInput4" class="col-sm-5 form-label">City Name</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="exampleInput4" name="wife_city_name" value="{{ $divorce->wife_city_name }}" placeholder="City Name" />
            </div>
            </div>
        </div>
      </div>

       <div class="row">
          <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-4 form-label"> Pincode / Zipcode</label>
              <div class="col-sm-8">
                <input type="text" class="form-control col-sm-8" id="exampleInput4" name="wife_pincode" value="{{ $divorce->wife_pincode }}" placeholder=" Pincode / Zipcode" />
              </div>
              
            </div>
          </div>

          
        </div>
       <div class="row mt-3">
          <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-4 form-label"> Nid No</label>
              <div class="col-sm-8">
                <input type="text" class="form-control col-sm-8" name="wife_nid" id="exampleInput4" value="{{ $divorce->wife_nid }}"  placeholder=" Nid No" />
              </div>
              
            </div>
          </div>

          
        </div>
      </div>

      <div class="card-header">
        <h5 class=" text-danger">WITNESS DETAILS</h5>
      </div>

      <div class="card-body">
         <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Full Name of the Witness</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " class="form-control" name="witness1_name" value="{{ $divorce->witness1_name }}"  placeholder="Please Enter Full Name of the Witness" required>
               
            </div>
        </div>

         <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Address of Witness</label>
            <div class="col-sm-7 ">
              <textarea rows="2" cols="35" id="multiLineInput" name="witness1_address" class="" placeholder="Address of Witness">
                {{ $divorce->witness1_address }}
              </textarea>
               
            </div>
            
        </div>
        <hr>

        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Full Name of the Witness</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="witness2_name" class="form-control" placeholder="Please Enter Full Name of the Witness" value="{{ $divorce->witness2_name }}" required>
               
            </div>
        </div>
        
         <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Address of Witness</label>
            <div class="col-sm-7 ">
              <textarea rows="2" cols="35" id="multiLineInput" name="witness2_address" class="" placeholder="Address of Witness">
                {{ $divorce->witness2_address }}
              </textarea>
               
            </div>
            
        </div>
        <hr>

        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Full Name of the Witness</label>
            <div class="col-sm-7">
                <input type="text" style="max-width:350px; height: 35px; " name="witness3_name" class="form-control" value="{{ $divorce->witness3_name }}" placeholder="Please Enter Full Name of the Witness" required>
               
            </div>
        </div>
        
         <div class="row mb-3">
            <label for="inputEmail" class="col-sm-5 col-form-label">Address of Witness</label>
            <div class="col-sm-7 ">
              <textarea rows="2" cols="35" id="multiLineInput" name="witness3_address" class="" placeholder="Address of Witness">
                {{ $divorce->witness3_address }}
              </textarea>
               
            </div>
            
        </div>
      </div>

      <div class="card-header">
        <h5 class=" text-danger">DELIVERY DETAILS</h5>
      </div>

      <div class="card-body">
        <p>Delivery Address</p>
         <div class="row">
          <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-4 form-label">Flat / Room No.</label>
              <div class="col-sm-8">
                <input type="text" name="delivery_flat_no" value="{{ $divorce->delivery_flat_no }}" class="form-control col-sm-8" id="exampleInput4" placeholder="Flat / Room No." />
              </div>
              
            </div>
          </div>

          <div class="col-md-6">
            <div class="row mb-3">
               <label for="exampleInput4" class="col-sm-5 form-label">Road / Street Name</label>
            <div class="col-sm-7">
              <input type="text" name="delivery_road_name" value="{{ $divorce->delivery_road_name }}"  class="form-control" id="exampleInput4" placeholder="Road / Street Name" />
            </div>
            </div>
           
            
          </div>
        </div>

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
               <label for="exampleInput4" class="col-sm-5 form-label">City Name</label>
            <div class="col-sm-7">
              <input type="text" name="delivery_city_name" value="{{ $divorce->delivery_city_name }}"  class="form-control" id="exampleInput4" placeholder="City Name" />
            </div>
            </div>
        </div>
      </div>

      <div class="row">
          <div class="col-md-6">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-4 form-label"> Pincode / Zipcode</label>
              <div class="col-sm-8">
                <input type="text" name="delivery_pincode" value="{{ $divorce->delivery_pincode }}"  class="form-control col-sm-8" id="exampleInput4" placeholder=" Pincode / Zipcode" />
              </div>
              
            </div>
          </div>

          
      </div>
      <div class="row mt-3">
          <div class="col-md-12">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-4 form-label"> Contact Number</label>
              <div class="col-sm-8">
                <input type="text" class="delivery_pincode" name="delivery_contact_number" value="{{ $divorce->delivery_contact_number }}"  class="form-control col-sm-8" id="exampleInput4" placeholder=" Enter Contact Number" />
              </div>
              
            </div>
          </div>    
      </div>
      <div class="row mt-3">
          <div class="col-md-12">
            <div class=" row mb-3">
              <label for="exampleInput4" class=" col-sm-4 form-label"> Email</label>
              <div class="col-sm-8">
                <input type="email" class="	delivery_email" class="form-control col-sm-8" name="delivery_email" value="{{ $divorce->delivery_email }}" id="exampleInput4" placeholder="abc@example.com" />
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
