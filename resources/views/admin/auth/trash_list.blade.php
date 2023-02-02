@extends('admin.main')

@section('content')
<div class="container">

    <div class="page-wrapper">
        <div class="page-content">
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="lni lni-users"></i></div>
                                <h5 class="mb-0 text-info mx-3"> All Admin (Trash)</h5>
                            </div><hr>
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table mb-0 table-striped">
                                        <thead class="bg-info text-white">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Role</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($alladmin as $key => $value)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $value->name }}</td>
                                                    <td>{{ $value->roles }}</td>
                                                    <td>{{ $value->email }}</td>
                                                    <td class="text-center">
                                                        @if($value->roles != "super")
                                                        <a onclick="return confirm('Are you sure you restore this Admin?');" title="restore"class="mx-2 p-1 bg-success text-white rounded" href="{{ route('admin.restore', $value->id) }}" > <i class="fadeIn animated bx bx-arrow-from-right"></i>
                                                        </a>
                                                        <a onclick="return confirm('Are you sure you trash this Admin?');" title="trash"class="p-1 bg-danger text-white rounded" href="{{ route('admin.trash', $value->id) }}" > <i class="lni lni-trash"></i>
                                                        </a>
                                                        @endif
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
            </div>
            <!--end row-->
        </div>
    </div>
</div>
@endsection
