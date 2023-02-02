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
                            <form action="{{ route('admin.settings.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bx-cog me-1 font-22 text-info"></i>
                                    </div>
                                    <h5 class="mb-0 text-info">Settings</h5>
                                </div>
                                <hr/>

                                <div class="row mb-3">
                                    <label for="title" class="col-sm-3 col-form-label">Title</label>
                                    <div class="col-sm-9">
                                        <input type="title" name="title" class="form-control" value="{{ isset($settings->title)?$settings->title:'' }}" id="title" placeholder="Enter title" >
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="fb_link" class="col-sm-3 col-form-label">Facebook Link</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="fb_link" class="form-control" value="{{ isset($settings->fb_link)?$settings->fb_link:'' }}" id="fb_link" placeholder="Enter fb_link" >
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="in_link" class="col-sm-3 col-form-label">Linkdin Link</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="in_link" class="form-control" value="{{ isset($settings->fb_link)?$settings->in_link:'' }}" id="in_link" placeholder="Enter in_link" >
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="insta_link" class="col-sm-3 col-form-label">Instagram Link</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="insta_link" class="form-control" value="{{ isset($settings->insta_link)?$settings->insta_link:'' }}" id="insta_link" placeholder="Enter insta_link" >
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="youtube_link" class="col-sm-3 col-form-label">Youtube Link</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="youtube_link" class="form-control" value="{{ isset($settings->youtube_link)?$settings->youtube_link:'' }}" id="youtube_link" placeholder="Enter youtube_link" >
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="twitter_link" class="col-sm-3 col-form-label">Twitter Link</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="twitter_link" class="form-control" value="{{ isset($settings->twitter_link)?$settings->twitter_link:'' }}" id="twitter_link" placeholder="Enter twitter_link" >
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="main_logo" class="col-sm-3 col-form-label">Project Logo</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="main_logo" class="form-control" accept=".jpg, .png, image/jpeg, image/png" >

                                        <span class="text-primary">Image dimension must be (230 X 62) pixels and maximum size 50kb. </span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="fev_icon" class="col-sm-3 col-form-label">Fav Icon</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="fev_icon" class="form-control" accept=".jpg, .png, image/jpeg, image/png" >

                                        <span class="text-primary">Image dimension must be (16 X 16) pixels and maximum size 10kb. </span>
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

                        <div class="row">
                            <div class="col-md-2 h6 text-end py-1">Tittle : </div>
                            <div class="col-md-10 h6 py-1">{{ isset($settings->title)?"$settings->title":'' }}</div>

                            <div class="col-md-2 h6 text-end py-1">Facebook Link : </div>
                            <div class="col-md-10 h6 py-1">{{ isset($settings->fb_link)?"$settings->fb_link":'' }}</div>

                            <div class="col-md-2 h6 text-end py-1">Linkdin Link : </div>
                            <div class="col-md-10 h6 py-1">{{ isset($settings->in_link)?"$settings->in_link":'' }}</div>

                            <div class="col-md-2 h6 text-end py-1">Instagram Link : </div>
                            <div class="col-md-10 text-justify py-1">{{ isset($settings->insta_link)?"$settings->insta_link":'' }}
                            </div>

                            <div class="col-md-2 h6 text-end py-1">Youtube Link : </div>
                            <div class="col-md-10 h6 py-1">{{ isset($settings->youtube_link)?"$settings->youtube_link":'' }}</div>

                            <div class="col-md-2 h6 text-end py-1">Twitter Link : </div>
                            <div class="col-md-10 h6 py-1">{{ isset($settings->twitter_link)?"$settings->twitter_link":'' }}</div>

                            <div class="col-md-2 h6 text-end py-1">Main Logo: </div>
                            <div class="col-md-10 py-1">
                                <img src="{{ asset(isset($settings->main_logo)?"$settings->main_logo":'') }}" alt="">
                            </div>

                            <div class="col-md-2 h6 text-end py-1">Fav Icon: </div>
                            <div class="col-md-10 py-1">
                                <img src="{{ asset(isset($settings->fev_icon)?"$settings->fev_icon":'') }}" alt="">
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
