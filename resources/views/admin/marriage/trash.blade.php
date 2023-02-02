@extends('admin.main')

@push('css')

@endpush

@section('content')

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-center">
                            <div class="font-22 text-info"><i class="fadeIn animated bx bx-trash-alt"></i></div>
                            <h5 class="mb-0 text-info mx-2"> Shop (Trash)</h5>
                        </div>
                        <hr/>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead class="bg-info text-white">
                                    <tr>
                                        <th lass="text-center">#</th>
                                        <th lass="text-left">Name</th>
                                        {{-- <th class="text-center">Phone</th> --}}
                                        <th class="text-left">Shop URL</th>
                                        {{-- <th class="text-left">Address</th> --}}
                                        <th class="text-center">Logo</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_shop as $key => $value)
                                    <tr>
                                        <td class="text-center">{{ ++$key }}</td>
                                        <td class="text-left">{{ $value->name }}</td>
                                        {{-- <td>{{ $value->phone }}</td> --}}
                                        {{-- <td class="text-left">{{ $value->address }}</td> --}}
                                        <td class="text-left">{{ $value->url }}</td>
                                        <td class="text-center">image</td>
                                        <td class="text-denter">
                                            <div class="d-flex order-actions justify-content-center">
                                                <a onclick="return confirm('Are you sure to restore this shop?');" href="{{ route('admin.shop.restore', $value->id) }}" class="bg-primary" title="Restore" >
                                                    <i class="fadeIn animated bx bx-undo text-white"></i>
                                                </a>

                                                <a onclick="return confirm('Are you sure to permanenlty delete this shop?');" href="{{ route('admin.shop.forceDelete', $value->id) }}" class="p-1 bg-danger text-white mx-1" title="Permanent Delete">
                                                    <i class="lni lni-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
