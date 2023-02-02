@extends('admin.main')

@push('css')

@endpush

@section('content')

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->

        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-9 mx-auto">
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
                            <form action="{{ route('admin.shop.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-title d-flex align-items-center">
                                    <div class="text-info font-22"><i class="fadeIn animated bx bx-shopping-bag"></i></div>
                                    <h5 class="mb-0 text-info"> Add Shop</h5>
                                </div>
                                <hr/>
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter shop name">
                                    </div>
                                </div>
                                {{-- <div class="row mb-3">
                                    <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="address" class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <textarea name="address" id="" class="form-control" rows="10" required></textarea>
                                    </div>
                                </div> --}}
                                <div class="row mb-3">
                                    <label for="image" class="col-sm-3 col-form-label">Shop Logo</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" id="image" class="form-control" name="image" required>
                                        <span class="text-primary">Image dimension must be (270 X 145) pixels and maximum size 50kb. </span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="link" class="col-sm-3 col-form-label">Shop URL</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="link" class="form-control" name="url" placeholder="Enter Shop URL" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-info px-5">Save</button>
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