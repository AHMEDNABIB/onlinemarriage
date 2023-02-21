@extends('admin.main')

@section('content')
<div class="container">
    <div class="page-wrapper">
			<div class="page-content">
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-9 mx-auto">
						<div class="card border-top border-0 border-4 border-info">
							<div class="card-body">
								@if($errors->any())
									<div class="col-12 my-3 bg-danger text-white py-2">
										<h6 class="pt-2">{{ implode('', $errors->all(':message')) }}</h6>
									</div>
                                @endif
								<div class="border p-4 rounded">
									<form action="{{ route('admin.divorce.pdf') }}" method="GET" enctype="multipart/form-data">
                                    
									<div class="card-title d-flex align-items-center">
										<div><i class="bx bxs-user me-1 font-22 text-info"></i>
										</div>
										<h5 class="mb-0 text-info">Dowanload</h5>
									</div>
									<hr/>
									<div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-4 col-form-label">Enter Divorce Registration No</label>
										<div class="col-sm-8">
											<input type="text" name="divorce_no" class="form-control"  placeholder="Enter Your Divorce Registration No">
										</div>	
									</div>
									
								
									<div class="row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<button type="submit" class="btn btn-info px-5">Dowanload</button>
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

   

</div>
@endsection
