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
         display: flex;
        justify-content: center; /* Centering Horizantly */
        align-items: center;
        width: 100%;
        margin-bottom: 2px;
    }

    .flex{
        display: flex;
    }

    .image{
        display: flex;
        justify-content: space-around ;
        align-items: baseline;
        margin-left: 10px;

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
    <table class="title">
        <tr>
            
            <th style="border: none">
                <h2>APPLICTION FORM MARRIAGE CERTIFICATE</h2> <br>
                
            </th>
        </tr>
    </table>
    <table class="">
        <tr  >
            <th class="align-middle" width="20% ">Complete Address of Marriage*</th>
            <td class="align-middle" width="40%">{{$show->marriage_address}}</td>
            <td class="align-middle" rowspan="2"  height="200px">
                <div class="image">
                  
                  <img height="200px" width="150px" src="{{ asset($show->husband_image) }}" alt="">
                  <img height="200px" width="150px" src="{{ asset($show->wife_image) }}" alt="">
                </div>
            </td>
        </tr>

        
        <tr>
            <th class="align-middle " height="50px">Date of Marriage*</th>
            <td>{{$show->marriage_date}}</td>
            
        </tr>
        
        <tr class="bg-dark text-white" style=" padding: 100px; width: 2000px;">
            <th></th>
            <th class="text-center">Bride's Details</th>
            <th class="text-center">Groom's Details</th>
        </tr>
        <tr>
            <th>Name*</th>
            
            <th>{{$show->husband_name}}</th>
            <th>{{$show->wife_name}}</th>
        </tr>
       <tr>
            <th>Father's Name*</th>
            <th>{{$show->husband_father_name}}</th>
            <th>{{$show->wife_father_name}}</th>
        </tr>
        <tr>
            <th>Mother's Name*</th>
            <th>{{$show->husband_mother_name}}</th>
            <th>{{$show->wife_mother_name}}</th>
        </tr>
        <tr>
            <th>Date of Birth*</th>
            <th>{{$show->husband_birthday}}</th>
            <th>{{$show->wife_birthday}}</th>
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
            <th>{{$show->husband_contact_number}}</th>
            <th>{{$show->wife_contact_number}}</th>
        </tr>
        <tr>
            <th>Nid No*</th>
            <th>{{$show->husband_nid}}</th>
            <th>{{$show->wife_nid}}</th>
            
        </tr>
        <tr>
            <th>Email Id*</th>
            <th>{{$show->husband_email}}</th>
            <th>{{$show->wife_email}}</th>
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
             <th>{{$show->husband_religion}}</th>
             <th>{{$show->wife_religion}}</th>
            
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
            <th>{{$show->husband_state}}</th>
            <th>{{$show->wife_state}}</th>
            
        </tr>
        <tr>
            <th>Upazila*</th>
            <th>{{$show->husband_city_name}}</th>
            <th>{{$show->wife_city_name}}</th>
        
        </tr>
        <tr>
            <th>Pincode*</th>
            <th>{{$show->husband_pincode}}</th>
            <th>{{$show->wife_pincode}}</th>
        </tr>
        <tr>
            <th>Address*</th>
            <th>{{$show->husband_flat_no}}, {{$show->husband_road_name}} </th>
            <th>{{$show->wife_flat_no}}, {{$show->wife_road_name}} </th>
        </tr>
       
        <tr>
            <td colspan="3">
                <p style="text-align:justify;">
                    It is certified that the information provided above is to the best of my knowledge and belief and nothing has been concealed therein. It is also
                    certified that this marriage has not been registered anywhere in Bangladesh/Abroad and we are not related to each other within the degree of prohibited
                    relationship and neither of us is lunatic. We shall be liable for action as per the law, if we have violated any provision of any law of the land.
                </p>
                 <div style="display: flex; justify-content: space-around;">

                    <div style="display: flex; justify-content: space-around; flex-direction:column" >
                    <img height="150px" width="220px"  src="{{ asset($show->husband_signature) }}" alt="">
                      <strong>Signature with Date: {{$show->marriage_date}} </strong>
                    </div>

                    <div style="display: flex; justify-content: space-around; flex-direction:column" >
                    <img height="150px" width="220px"  src="{{ asset($show->wife_signature) }}" alt="">
                      <strong>Signature with Date: {{$show->marriage_date}} </strong>
                    </div>
                
               

                  
                 </div>
                <span></span>
            </td>
        </tr>
    </table>
    <table class="" style="width: 100%; margin-top:10px margin-bottom:30px">
        <tr>
            <th>Witness Details</th>
            <th>Witness 1 Details</th>
            <th>Witness 2 Details</th>
            <th>Witness 3 Details </th>
            <th>Witness 4 Details </th>
        </tr>
        <tr>
            <th>Name*</th>
            <td>{{$show->witness1_name}}</td>
            <td>{{$show->witness2_name}}</td>
            <td>{{$show->witness3_name}}</td>
            <td>{{$show->witness4_name}}</td>
            
        </tr>

        <tr>
            <th>Number*</th>
            <td>{{$show->witness1_phone}}</td>
            <td>{{$show->witness2_phone}}</td>
            <td>{{$show->witness3_phone}}</td>
            <td>{{$show->witness4_phone}}</td>
            
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
                <div class=" " style="display: flex; justify-content: space-around;">

                    @if ($show->witness1_name)
                    <span><input type="checkbox" value="Grom"
                       {{  ($show->witness1_name ? ' checked' : '') }}
                        >Groom</span>

                         <span><input type="checkbox" value="Groom">Bride</span>
                   
                    @endif
                   
                    
                </div>
            </th>
            <th>
                <div class=" " style="display: flex; justify-content: space-around;">
                    @if ($show->witness2_name)
                    <span><input type="checkbox" value="Groom"   {{  ($show->witness2_name ? ' checked' : '') }}>Groom</span>
                     <span><input type="checkbox" value="Groom">Bride</span>
                    @endif
                    
                </div>
            </th>
            <th>
                <div class="" style="display: flex; justify-content: space-around;">
                    @if ($show->witness3_name)
                    <span><input type="checkbox" value="Groom"   {{  ($show->witness3_name ? ' checked' : '') }}>Bride</span>
                     <span><input type="checkbox" value="Groom">Groom</span>
                    @endif
                </div>
            </th>
            <th>
                <div class="" style="display: flex; justify-content: space-around;">
                    @if ($show->witness4_name)
                    <span><input type="checkbox" value="Groom"   {{  ($show->witness4_name ? ' checked' : '') }}>Bride</span>

                     <span><input type="checkbox" value="Groom">Groom</span>
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
        
        <tr class="mb-5">
            <th>Address*</th>
            <td>{{$show->witness1_address}}</td>
            <td>{{$show->witness2_address}}</td>
            <td>{{$show->witness3_address}}</td>
            <td>{{$show->witness4_address}}</td>
            
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
