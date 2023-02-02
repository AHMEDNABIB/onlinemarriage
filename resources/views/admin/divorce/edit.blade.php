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
                        <div class="border p-4 rounded">
                            <form action="{{ route('admin.shop.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-title d-flex align-items-center">
                                    <div class="text-info font-22"><i class="fadeIn animated bx bx-shopping-bag"></i></div>
                                    <h5 class="mb-0 text-info"> Edit Shop</h5>
                                </div>
                                <hr/>
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Slider name" value="{{ $data->name }}">
                                    </div>
                                </div>
                                {{-- <div class="row mb-3">
                                    <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Slider phone" value="{{ $data->phone }}">
                                    </div>
                                </div> --}}
                                <div class="row mb-3">
                                    <label for="image" class="col-sm-3 col-form-label">Shop Logo</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" id="image" class="form-control" name="image" >
                                        <span class="text-primary">Image dimension must be (270 X 145) pixels and maximum size 50kb. </span>
                                        <img src="{{ asset($data->image) }}" alt="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="link" class="col-sm-3 col-form-label">Shop URL</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="link" class="form-control" name="url" value="{{ $data->url }}" required>
                                    </div>
                                </div>

                                {{-- <div class="row mb-3">
                                    <label for="link" class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <textarea name="address" id="" class="form-control" cols="30" rows="10">{{ $data->address }}</textarea>
                                    </div>
                                </div> --}}


                                <div class="row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-info px-5">Update</button>
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
<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin">
</script>
<script>
    tinymce.init({
      selector: '#mytextarea'
    });
</script>
@endpush
