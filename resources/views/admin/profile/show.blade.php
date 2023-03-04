@extends('admin.main')

@push('css')

@endpush

@section('content')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page">

         <section class="section mt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-5 " >
            <div class="d-flex align-items-center justify-content-center">
             <img src="{{ asset($show->image) }}" alt=""  style="width: 65%;" class="rounded-circle img-fluid" />
            </div>
          </div>
          <div class="col-md-7  ml-auto d-flex align-items-center justify-content-start mt-4 mt-md-0">
            <div>
             <h1>
					{{$show->name}}
			</h1>

			<h4> {{$show->profession}}</h4>
			<h5>{{$show->profession_place}}</h5>
			<h6> Birthday: {{ date('F d,Y',strtotime($show->birthday));}}</h6>
            <h6>Mobile No: {{$show->mobile}}</h6>
            <h6>Email: {{$show->email}}</h6>
            <div class=" d-flex align-items-center">
               <h6>Address :</h6>
               <h6 class="mx-3"> Village: {{$show->vilage}} ;  Post Office: {{$show->postoffice}} ;</h6>
            </div>
            <div class=" d-flex align-items-center">
               <h4 class="mx-3"></h4>
               <h6 class="mx-5"> Police Station: {{$show->policestation}} ;  District: {{$show->district}} ;</h6>
            </div>



					
            
            </div>
          </div>
        </div>
      </div>
    </section>
		
		<div class="container my-5">
			<table class="table table-sm table-bordered">
				<tr>
					<th class="align-middle text-center   bg-dark"  >
						<h4 class="text-white">Personal Details</h4>
					</th>
					
				</tr>
			</table>

            <div class="row " >
                <div class="col"> 
                    <div class="d-flex justify-content-start mx-5 ">
                        <p class="font-weight-bold">
                        Nick Name
                        </p>
                    </div> 
                </div>
                <div class="col"> {{$show->nickname}}</div>
                <div class="col"> 
                    <div class="d-flex justify-content-start mx-5 ">
                        <p class="font-weight-bold">
                        Age
                        </p>
                    </div> 
                </div>
                <div class="col"> {{$show->age}}</div>
            </div>
            <div class="row" >
                <div class="col"> 
                     <div class="d-flex justify-content-start mx-5 ">
                        <p class="font-weight-bold">
                        Religion
                        </p>
                    </div> 
                </div>
                <div class="col"> {{$show->religion}}</div>
                <div class="col"> 
                     <div class="d-flex justify-content-start mx-5 ">
                        <p class="font-weight-bold">
                        Martial Status
                        </p>
                    </div> 
                </div>
                <div class="col">  {{$show->status}}</div>
            </div>
            <div class="row " >
                <div class="col"> 
                     <div class="d-flex justify-content-start mx-5 ">
                        <p class="font-weight-bold">
                        Height
                        </p>
                    </div> 
                </div>
                <div class="col">  {{$show->height}}</div>
                <div class="col"> 
                     <div class="d-flex justify-content-start mx-5 ">
                        <p class="font-weight-bold">
                        Weight
                        </p>
                    </div> 
                </div>
                <div class="col">  {{$show->weight}}kg</div>
            </div>
            <div class="row " >
                <div class="col"> 
                     <div class="d-flex justify-content-start mx-5 ">
                        <p class="font-weight-bold">
                        Blood Group
                        </p>
                    </div> 
                </div>
                <div class="col"> <p class="text-uppercase"> {{$show->blood_group}}</p></div>

                <div class="col"></div>
                <div class="col"></div>
               
            </div>
           
			
			
		</div>

        <!-- Education Details -->

        @if ($show->university_name || $show->collage_name || $show->school_name)
            <div class="container my-5">
			<table class="table table-sm table-bordered">
				<tr>
					<th class="align-middle text-center bg-dark text-white" >
						<h4 class="text-white">Education Details</h4>
					</th>
					
				</tr>
			</table>

            @if ($show->university_name &&  $show->collage_name)

                <div class="row " >
                <div class="col"> 
                    <div class="d-flex justify-content-center align-items-center flex-column  ">
                        <p class="font-weight-bold">
                        {{$show->university_name}}
                        </p>
                        <p class="font-weight-bold">
                         {{$show->university_subject}}({{$show->university_degree}})
                        </p>
                    </div> 
                </div>
                <div class="col"> 
                    <div class="d-flex justify-content-center align-items-center flex-column  ">
                        <p class="font-weight-bold">
                        {{$show->collage_name}}
                        </p>
                        <p class="font-weight-bold">
                         {{$show->collage_subject}}({{$show->collage_degree}})
                        </p>
                    </div> 
                </div>
                
            </div>
    
            @elseif (!$show->university_name &&  $show->collage_name)

             <div class="row " >
                <div class="col"> 
                    <div class="d-flex justify-content-center align-items-center flex-column  ">
                        <p class="font-weight-bold">
                        {{$show->collage_name}}
                        </p>
                        <p class="font-weight-bold">
                        {{$show->collage_subject}}({{$show->collage_degree}})
                        </p>
                    </div> 
                </div>
                <div class="col"> 
                     
                </div>
                
            </div>

             @elseif ($show->university_name &&  !$show->collage_name)

             <div class="row " >
                <div class="col"> 
                    <div class="d-flex justify-content-center align-items-center flex-column  ">
                        <p class="font-weight-bold">
                        {{$show->university_name}}
                        </p>
                        <p class="font-weight-bold">
                        {{$show->university_subject}}({{$show->university_degree}})
                        </p>
                    </div> 
                </div>
                <div class="col"> 
                     
                </div>
                
            </div>
   
            @else


            

           
    
            @endif

            

                
           

           @if ($show->school_name)

            <div class="row mt-3" >
                <div class="col"> 
                    <div class="d-flex justify-content-center align-items-center flex-column  ">
                        <p class="font-weight-bold">
                        {{$show->school_name}}
                        </p>
                        <p class="font-weight-bold">
                         {{$show->school_subject}}({{$show->school_degree}})
                        </p>
                    </div> 
                </div>
                <div class="col"> 
                    
                </div>
                
            </div>
               
           @endif


           
        
           
         
            
           
            
           
			
			
		</div>
        @endif
		


        <!-- Family Details -->

        <div class="container my-5">
			<table class="table table-sm table-bordered">
				<tr>
					<th class="align-middle text-center bg-dark text-white" >
						<h4 class="text-white">Family  Details</h4>
					</th>
					
				</tr>
			</table>

            

            <div class="row " >
                <div class="col-md-3"> 
                    <div class="d-flex justify-content-start mx-5 ">
                        <p class="font-weight-bold">
                        Father Name:
                        </p>
                    </div> 
                </div>
                <div class="col-md-7"> {{$show->father_name}}({{$show->father_profession}})</div>
                
            </div>

            <div class="row " >
                <div class="col-md-3"> 
                    <div class="d-flex justify-content-start mx-5 ">
                        <p class="font-weight-bold">
                        Mother Name:
                        </p>
                    </div> 
                </div>
                <div class="col-md-7"> {{$show->mother_name}}({{$show->mother_profession}})</div>
                
            </div>

            


             @if ($show->brother1_name && $show->brother1_wife_name )

             <div class="row " >
                <div class="col-md-3"> 
                    <div class="d-flex justify-content-start mx-5 ">
                        <p class="font-weight-bold">
                        Brother Name
                        </p>
                    </div> 
                </div>
                <div class="col-md-7"> {{$show->brother1_name}}({{$show->brother1_profession}})</div>
                
            </div>

            <div class="row " >
                <div class="col-md-3"> 
                    <div class="d-flex justify-content-start mx-5 ">
                        <p class="font-weight-bold">
                        Sister-in-law
                        </p>
                    </div> 
                </div>
                <div class="col-md-7"> {{$show->brother1_wife_name}}({{$show->brother1_wife_name}})</div>
                
            </div>

              @elseif ($show->brother1_name && !$show->brother1_wife_name)

               <div class="row " >
                <div class="col-md-3"> 
                    <div class="d-flex justify-content-start mx-5 ">
                        <p class="font-weight-bold">
                        Brother Name
                        </p>
                    </div> 
                </div>
                <div class="col-md-7"> {{$show->brother1_name}}({{$show->brother1_profession}})</div>
                
            </div>

              @else
              
              @endif


               @if ($show->brother2_name && $show->brother2_wife_name )

             <div class="row " >
                <div class="col-md-3"> 
                    <div class="d-flex justify-content-start mx-5 ">
                        <p class="font-weight-bold">
                        Brother Name
                        </p>
                    </div> 
                </div>
                <div class="col-md-7"> {{$show->brother2_name}}({{$show->brother2_profession}})</div>
                
            </div>

            <div class="row " >
                <div class="col-md-3"> 
                    <div class="d-flex justify-content-start mx-5 ">
                        <p class="font-weight-bold">
                        Sister-in-law
                        </p>
                    </div> 
                </div>
                <div class="col-md-7"> {{$show->brother2_wife_name}}({{$show->brother2_wife_name}})</div>
                
            </div>

              @elseif ($show->brother2_name && !$show->brother2_wife_name)

               <div class="row " >
                <div class="col-md-3"> 
                    <div class="d-flex justify-content-start mx-5 ">
                        <p class="font-weight-bold">
                        Brother Name
                        </p>
                    </div> 
                </div>
                <div class="col-md-7"> {{$show->brother2_name}}({{$show->brother2_profession}})</div>
                
            </div>

              @else
              
              @endif


            @if ($show->brother3_name && $show->brother3_wife_name )

             <div class="row " >
                <div class="col-md-3"> 
                    <div class="d-flex justify-content-start mx-5 ">
                        <p class="font-weight-bold">
                        Brother Name
                        </p>
                    </div> 
                </div>
                <div class="col-md-7"> {{$show->brother3_name}}({{$show->brother3_profession}})</div>
                
            </div>

            <div class="row " >
                <div class="col-md-3"> 
                    <div class="d-flex justify-content-start mx-5 ">
                        <p class="font-weight-bold">
                        Sister-in-law
                        </p>
                    </div> 
                </div>
                <div class="col-md-7"> {{$show->brother3_wife_name}}({{$show->brother3_wife_name}})</div>
                
            </div>

              @elseif ($show->brother3_name && !$show->brother3_wife_name)

               <div class="row " >
                <div class="col-md-3"> 
                    <div class="d-flex justify-content-start mx-5 ">
                        <p class="font-weight-bold">
                        Brother Name
                        </p>
                    </div> 
                </div>
                <div class="col-md-7"> {{$show->brother3_name}}({{$show->brother3_profession}})</div>
                
            </div>

              @else
              
              @endif



             @if ($show->sister1_name && $show->sister1_husband_name )

             <div class="row " >
                <div class="col-md-3"> 
                    <div class="d-flex justify-content-start mx-5 ">
                        <p class="font-weight-bold">
                        Sister Name
                        </p>
                    </div> 
                </div>
                <div class="col-md-7"> {{$show->sister1_name}}({{$show->sister1_profession}})</div>
                
            </div>

            <div class="row " >
                <div class="col-md-3"> 
                    <div class="d-flex justify-content-start mx-5 ">
                        <p class="font-weight-bold">
                        Brother-in-law
                        </p>
                    </div> 
                </div>
                <div class="col-md-7"> {{$show->sister1_husband_name}}({{$show->sister1__husband_profession}})</div>
                
            </div>

              @elseif ($show->sister1_name && !$show->sister1_husband_name)

               <div class="row " >
                <div class="col-md-3"> 
                    <div class="d-flex justify-content-start mx-5 ">
                        <p class="font-weight-bold">
                        Sister Name
                        </p>
                    </div> 
                </div>
                <div class="col-md-7"> {{$show->sister1_name}}({{$show->sister1_profession}})</div>
                
            </div>

              @else
              
              @endif



               @if ($show->sister2_name && $show->sister2_husband_name )

             <div class="row " >
                <div class="col-md-3"> 
                    <div class="d-flex justify-content-start mx-5 ">
                        <p class="font-weight-bold">
                        Sister Name
                        </p>
                    </div> 
                </div>
                <div class="col-md-7"> {{$show->sister2_name}}({{$show->sister2_profession}})</div>
                
            </div>

            <div class="row " >
                <div class="col-md-3"> 
                    <div class="d-flex justify-content-start mx-5 ">
                        <p class="font-weight-bold">
                        Brother-in-law
                        </p>
                    </div> 
                </div>
                <div class="col-md-7"> {{$show->sister2_husband_name}}({{$show->sister2__husband_profession}})</div>
                
            </div>

              @elseif ($show->sister2_name && !$show->sister2_husband_name)

               <div class="row " >
                <div class="col-md-3"> 
                    <div class="d-flex justify-content-start mx-5 ">
                        <p class="font-weight-bold">
                        Sister Name
                        </p>
                    </div> 
                </div>
                <div class="col-md-7"> {{$show->sister2_name}}({{$show->sister2_profession}})</div>
                
            </div>

              @else
              
              @endif


               @if ($show->sister3_name && $show->sister3_husband_name )

             <div class="row " >
                <div class="col-md-3"> 
                    <div class="d-flex justify-content-start mx-5 ">
                        <p class="font-weight-bold">
                        Sister Name
                        </p>
                    </div> 
                </div>
                <div class="col-md-7"> {{$show->sister3_name}}({{$show->sister3_profession}})</div>
                
            </div>

            <div class="row " >
                <div class="col-md-3"> 
                    <div class="d-flex justify-content-start mx-5 ">
                        <p class="font-weight-bold">
                        Brother-in-law
                        </p>
                    </div> 
                </div>
                <div class="col-md-7"> {{$show->sister3_husband_name}}({{$show->sister3__husband_profession}})</div>
                
            </div>

              @elseif ($show->sister3_name && !$show->sister3_husband_name)

               <div class="row " >
                <div class="col-md-3"> 
                    <div class="d-flex justify-content-start mx-5 ">
                        <p class="font-weight-bold">
                        Sister Name
                        </p>
                    </div> 
                </div>
                <div class="col-md-7"> {{$show->sister3_name}}({{$show->sister3_profession}})</div>
                
            </div>

              @else
              
              @endif

              
	
			
		</div>

        <!-- Hobbies -->

        <div class="container my-5">
			<table class="table table-sm table-bordered">
				<tr>
					<th class="align-middle text-center bg-dark text-white" >
						<h4 class="text-white">Hobby And Interest</h4>
					</th>
					
				</tr>
			</table>

           <div class="d-flex justify-content-center align-items-center">

             @if (!$show->hobby4)
                 <h6>{{$show->hobby1}},{{$show->hobby2}} ,{{$show->hobby3}} </h6>

                 @else
                 <h6>{{$show->hobby1}},{{$show->hobby2}} ,{{$show->hobby3}} ,{{$show->hobby4}}</h6>
             @endif
              
           </div>
            

           
            
           
            
           
			
			
		</div>
        
	</div>
    </div>
</div>



@endsection

@push('js')

@endpush
