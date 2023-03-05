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
                        <div class="text-info font-22"><i class="bx bxs-user me-1 font-22 text-info"></i></div>
                        <h5 class="mb-0 text-info mx-1"> All Married</h5>
                    </div>
                    <hr/>
             
                    
                   <form action="{{ route('admin.profile.search') }}" method="GET" class="d-flex">
          <input class="form-control me-2" type="search" name="name" placeholder="enter Name" aria-label="Search">
          <input class="form-control me-2" type="search" name="age" placeholder="Age" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>

                    <div class="table-responsive">

                        <table class="table align-middle mb-0">
                            <thead class="bg-info text-white">
                                <tr>
                                    <th lass="text-center">#</th>
                                    <th lass="text-left">Profile No</th>
                                    <th lass="text-left">Full Name</th>
                                    <th class="text-left">Age</th>
                                    <th class="text-left">Height</th>
                                    <th class="text-left">weight</th>
                                    <th class="text-left">Status</th>
                                    
                                   
                                    
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach ($data as $key => $value)
                                <tr>
                                    <td class="text-center">{{ ++$key }}</td>
                                    <td class="text-left">{{ $value->reg_no }}</td>
                                    <td class="text-left">{{ $value->name }}</td>
                                    <td class="text-left">{{ $value->age }}</td>
                                    <td class="text-left">{{ $value->height }}</td>
                                    <td class="text-left">{{ $value->weight }}</td>
                                    <td class="text-left">{{ $value->status }}</td>
                                     
                                    <td class="text-center">

                                        <div class="d-flex order-actions justify-content-center">
                                            {{-- EDIT --}}
                                            <a href="{{ route('admin.profile.edit', $value->id) }}" class="bg-primary text-white" title="Edit This Profile">
                                                <i class='fadeIn animated bx bx-edit'></i>
                                            </a>

                                            <a href="{{ route('admin.profile.show',$value->id) }}" class="bg-primary text-white" title=" Show This Profile">
                                               <i class="lni lni-eye"></i>
                                            </a>
                                            {{-- TRASH --}}
                                            {{-- <a onclick="return confirm('Are you sure you delete this shop?');" href="{{ route('admin.divorce.destroy', $value->id) }}" class="p-1 bg-danger text-white mx-1">
                                                <i class="lni lni-trash"></i>
                                            </a> --}}
                                            
                                            <form  action="{{ route('admin.profile.destroy', $value->id ) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                 <input name="_method" type="hidden" value="DELETE">
                                            <button  type="submit"  class="p-1 btn bg-danger text-white mx-0 show_confirm " ><i class="lni lni-trash"></i></button>
                                           </form>
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
