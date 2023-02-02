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
                            <form action="{{ route('admin.contact_us.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-title d-flex align-items-center">
                                    <div><i class="lni lni-phone me-1 font-22 text-info"></i>
                                    </div>
                                    <h5 class="mb-0 text-info">Contact US</h5>
                                </div>
                                <hr/>

                                <div class="row mb-3">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control" value="{{ isset($contact_us->email)?$contact_us->email:'' }}" id="email" placeholder="Enter Email" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="phone" class="form-control" value="{{ isset($contact_us->phone)?$contact_us->phone:'' }}" id="phone" placeholder="Enter phone" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="address" class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <textarea name="address" class="form-control" required > {{ isset($contact_us->address)?$contact_us->address:'' }} </textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="description" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea name="description" class="form-control" required>{{ isset($contact_us->description)?$contact_us->description:'' }}</textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="map" class="col-sm-3 col-form-label">Map Link</label>
                                    <div class="col-sm-9">
                                        <textarea name="map" class="form-control" required>{{ isset($contact_us->map)?$contact_us->map:'' }}</textarea>
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

                <div class="card border-top border-0 border-4 border-info">
                    <div class="card-body">
                        <h5 class="text-info">Contact Us</h5><hr>
                        <div class="row">
                            <div class="col-md-2 h6 text-end py-1">Email : </div>
                            <div class="col-md-10 h6 py-1">{{ isset($contact_us->email)?"$contact_us->email":'' }}</div>

                            <div class="col-md-2 h6 text-end py-1">Phone : </div>
                            <div class="col-md-10 h6 py-1">{{ isset($contact_us->phone)?"$contact_us->phone":'' }}</div>

                            <div class="col-md-2 h6 text-end py-1">Address : </div>
                            <div class="col-md-10 h6 py-1">{{ isset($contact_us->address)?"$contact_us->address":'' }}</div>

                            <div class="col-md-2 h6 text-end py-1">Description : </div>
                            <div class="col-md-10 text-justify py-1">{{ isset($contact_us->description)?"$contact_us->description":'' }}</div>

                            <div class="col-md-2 h6 text-end py-1">Map : </div>
                            <div class="col-md-10 py-1">
                                <iframe src="{{ isset($contact_us->map)?"$contact_us->map":'' }}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
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
