@extends('admin.main')

@push('css')

@endpush

@section('content')

<div class="page-wrapper">
    <div class="page-content">
        <!-- ALL Category -->
        <div class="row">
            <div class="col-xl-9 mx-auto">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="card-title d-flex align-items-center">
                        <div class="text-info font-22"><i class="fadeIn animated bx bx-shopping-bag"></i></div>
                        <h5 class="mb-0 text-info mx-1"> All Shop</h5>
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
                                    {{-- <td class="text-center">{{ $value->phone }}</td> --}}
                                    <td class="text-left">{{ $value->url }}</td>
                                    {{-- <td class="text-left">{{ $value->address }}</td> --}}
                                    <td class="text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <div class="recent-product-img">
                                                <img src="{{ asset($value->image) }}" alt="">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex order-actions justify-content-center">
                                            {{-- EDIT --}}
                                            <a href="{{ route('admin.shop.edit', $value->id) }}" class="bg-primary text-white" title="Edit This shop">
                                                <i class='fadeIn animated bx bx-edit'></i>
                                            </a>
                                            {{-- TRASH --}}
                                            <a onclick="return confirm('Are you sure you delete this shop?');" href="{{ route('admin.shop.delete', $value->id) }}" class="p-1 bg-danger text-white mx-1">
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
            <!--end row-->
            </div>
        </div>

    </div>
</div>

@endsection

@push('js')

@endpush
