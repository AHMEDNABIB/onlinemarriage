<!DOCTYPE html>
<html lang="en">
<head>
  <title>Divorce From</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
   
   <style>

    table ,th,td{
         border: 1px solid;
         border-width: 1px;
         padding: 10px;
         
    }

    .title{
       
    }

    .flex{
        display: flex;
    }

    .image{
        display: flex;
        flex-direction: column;
        justify-content: space-between ;
        align-items: baseline;
        margin-left: 10px;

    }

    .flex-container {
         display: flex;
         flex-direction: row;
        width: 100%;
    }

    .signature{
        display: flex;
        justify-content: space-around;
    }
    .signature_image{
        display: flex;
        flex-direction: column;
        justify-content: space-around;

    }


    @media print {
  body{
        width: 21cm;
        height: 29.7cm;
        margin: 30mm 45mm 30mm 45mm; 
        /* change the margins as you want them to be. */
   } 
}
    

  </style>

</head>
<body >
<div style="width: 80%;  padding-left: 15px; margin-top: 25px; margin-right: auto; margin-left: auto;">
    
    
              <h2 style="margin-left: 40px; margint-bottom:250px"> APPLICTION FORM Divorce CERTIFICATE</h2> 
                
        
            
            
       
    <table class="">
        <tr  >
            <th class="align-middle" width="20% ">Complete Address of Marriage*</th>
            <td class="align-middle" width="40%">{{$dowanload->marriage_address}}</td>
            <td class="align-middle"  height="200px">
                <div class="image">
                  
                  <img height="150px" width="140px" src="{{ public_path($dowanload->husband_image) }}" alt="">
                  <img height="150px" width="140px" src="{{ public_path($dowanload->wife_image) }}" alt="">
                </div>
            </td>
        </tr>

        
        <tr>
            <th class="align-middle " height="50px">Date of Marriage*</th>
            <td>{{$dowanload->marriage_date}}</td>
            <td></td>
            
        </tr>
        
        <tr class="bg-dark text-white">
            <th></th>
            <th class="text-center">Bride's Details</th>
            <th class="text-center">Groom's Details</th>
        </tr>
        <tr>
            <th>Name*</th>
            
            <th>{{$dowanload->husband_name}}</th>
            <th>{{$dowanload->wife_name}}</th>
        </tr>
       <tr>
            <th>Father's Name*</th>
            <th>{{$dowanload->husband_father_name}}</th>
            <th>{{$dowanload->wife_father_name}}</th>
        </tr>
        <tr>
            <th>Mother's Name*</th>
            <th>{{$dowanload->husband_mother_name}}</th>
            <th>{{$dowanload->wife_mother_name}}</th>
        </tr>
        <tr>
            <th>Date of Birth*</th>
            <th>{{$dowanload->husband_birthday}}</th>
            <th>{{$dowanload->wife_birthday}}</th>
        </tr>
        <tr>
            <th>Gender*</th>
            <th>Male</th>
            <th>Female</th>
        </tr>
        {{-- <tr>
            <th>Mark of Identity*</th>
            <th></th>
            <th></th>
        </tr> --}}
        <tr>
            <th>Mobile Number*</th>
            <th>{{$dowanload->husband_contact_number}}</th>
            <th>{{$dowanload->wife_contact_number}}</th>
        </tr>
        <tr>
            <th>Nid No*</th>
            <th>{{$dowanload->husband_nid}}</th>
            <th>{{$dowanload->wife_nid}}</th>
            
        </tr>
        <tr>
            <th>Email Id*</th>
            <th>{{$dowanload->husband_email}}</th>
            <th>{{$dowanload->wife_email}}</th>
        </tr>
        {{-- <tr>
            <th>Marital Status*</th>
            <th>
                <div class="d-flex flex-sm-row-reverse flex-column justify-content-around ">
                    <span><input type="checkbox"> Unmarried</span>
                    <span><input type="checkbox"> Married</span>
                    <span><input type="checkbox"> Divorced</span>
                    <span><input type="checkbox"> Widow</span>
                </div>
            </th>
            <th>
                <div class="d-flex flex-md-row-reverse flex-column  justify-content-around">
                    <span><input type="checkbox"> Unmarried</span>
                    <span><input type="checkbox"> Married</span>
                    <span><input type="checkbox"> Divorced</span>
                    <span><input type="checkbox"> Widow</span>
                </div>
            </th>
        </tr> --}}
        {{-- <tr>
            <th>Nationality*</th>
            <th></th>
            <th></th>
        </tr> --}}
        <tr>
            <th>Religion*</th>
             <th>{{$dowanload->husband_religion}}</th>
             <th>{{$dowanload->wife_religion}}</th>
            
        </tr>
        {{-- <tr>
            <th>Occupation*</th>
            <th></th>
            <th></th>
        </tr> --}}
        <tr class="bg-dark text-white">
            <th></th>
            <th class="text-center">Bride's Address</th>
            <th class="text-center">Groom's Address</th>
        </tr>
        <tr>
            <th>State*</th>
            <th>{{$dowanload->husband_state}}</th>
            <th>{{$dowanload->wife_state}}</th>
            
        </tr>
        <tr>
            <th>Upazila*</th>
            <th>{{$dowanload->husband_city_name}}</th>
            <th>{{$dowanload->wife_city_name}}</th>
        
        </tr>
        <tr>
            <th>Pincode*</th>
            <th>{{$dowanload->husband_pincode}}</th>
            <th>{{$dowanload->wife_pincode}}</th>
        </tr>
        <tr>
            <th>Address*</th>
            <th>{{$dowanload->husband_flat_no}}, {{$dowanload->husband_road_name}} </th>
            <th>{{$dowanload->wife_flat_no}}, {{$dowanload->wife_road_name}} </th>
        </tr>
       
        <tr>
            <td colspan="3">
                <p style="text-align:justify;">
                    It is certified that the information provided above is to the best of my knowledge and belief and nothing has been concealed therein. It is also
                    certified that this marriage has not been registered anywhere in Bangladesh/Abroad and we are not related to each other within the degree of prohibited
                    relationship and neither of us is lunatic. We shall be liable for action as per the law, if we have violated any provision of any law of the land.
                </p>

                <div class="flex-container">

                    <div style="margin-left: 120px" >
                    <img height="150px" width="220px"  src="{{ public_path($dowanload->husband_signature) }}" alt="">
                    <img style="margin-left: 20px" height="150px"  width="220px" src="{{ public_path($dowanload->wife_signature) }}" alt="">
                      
                    </div>

                    <div class="" style="margin-left: 120px" >
                    
                       <strong>Signature with Date: {{$dowanload->marriage_date}} </strong>
                        <strong style="margin-left: 20px">Signature with Date: {{$dowanload->marriage_date}} </strong>
                    </div>
                
               

                  
                 </div>
                
                <span></span>
            </td>
        </tr>
    </table>
    <table class=" mt-2" style="width: 100%;">
        <tr>
            <th>Witness Details</th>
            <th>Witness 1 Details</th>
            <th>Witness 2 Details</th>
            <th>Witness 3 Details </th>
            <th>Witness 4 Details </th>
        </tr>
        <tr>
            <th>Name*</th>
            <td>{{$dowanload->witness1_name}}</td>
            <td>{{$dowanload->witness2_name}}</td>
            <td>{{$dowanload->witness3_name}}</td>
            <td>{{$dowanload->witness4_name}}</td>
            
        </tr>
        <!-- <tr>
            <th>Father's/Husband's Name*</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr> -->
        <tr>
            <th>Relation With*</th>
            <th>
                <div class="d-flex justify-content-around flex-md-row-reverse flex-column ">

                    @if ($dowanload->witness1_name)
                    <span><input type="checkbox" value="Grom"
                       {{  ($dowanload->witness1_name ? ' checked' : '') }}
                        >Groom</span>
                   
                    @endif
                   
                    
                </div>
            </th>
            <th>
                <div class="d-flex justify-content-around flex-md-row-reverse flex-column ">
                    @if ($dowanload->witness2_name)
                    <span><input type="checkbox" value="Groom"   {{  ($dowanload->witness2_name ? ' checked' : '') }}>Groom</span>
                    @endif
                    
                </div>
            </th>
            <th>
                <div class="d-flex justify-content-around flex-md-row-reverse flex-column ">
                    @if ($dowanload->witness3_name)
                    <span><input type="checkbox" value="Groom"   {{  ($dowanload->witness3_name ? ' checked' : '') }}>Bride</span>
                    @endif
                </div>
            </th>
            <th>
                <div class="d-flex justify-content-around flex-md-row-reverse flex-column ">
                    @if ($dowanload->witness4_name)
                    <span><input type="checkbox" value="Groom"   {{  ($dowanload->witness4_name ? ' checked' : '') }}>Bride</span>
                    @endif
                </div>
            </th>
        </tr>
        <!-- <tr>
            <th>Country*</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

        </tr> -->
        <!-- <tr>
            <th>Mobile*</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr> -->
        
        <tr>
            <th>Address*</th>
            <td>{{$dowanload->witness1_address}}</td>
            <td>{{$dowanload->witness2_address}}</td>
            <td>{{$dowanload->witness3_address}}</td>
            <td>{{$dowanload->witness4_address}}</td>
            
        </tr>
        <!-- <tr>
            <th>Signature*</th>
            <td></td>
            <td></td>
            <td></td>
        </tr> -->
    </table>
</div>
</body>
</html>
