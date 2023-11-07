@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 text-gray-800">Services</h1>
    {{-- <div style="display: flex; justify-content: flex-end;">
        <a href="{{ route('admin.company.index') }}">
            <button type="submit" class="btn btn-primary">List</button>
        </a>
    </div> --}}
    
    <div class="card shadow mb-4 mt-3">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary">Title</h6>
            {{-- <div class="float-right d-inline">
                <a href="{{ route('admin.service.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New</a>
            </div> --}}
        </div>
        <div class="card-body">
            <form action="{{ url('admin/page/home/4') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="service_title" class="form-control" value="{{ $page_home->service_title }}">
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
    <div class="card shadow mb-4 mt-3">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary">View Uses</h6>
            <div class="float-right d-inline">
                <a href="{{ route('admin.service.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($service as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('uploads/'.$row->photo) }}" alt="" class="w_200"></td>
                            <td>{{ $row->name }}</td>
                            <td>
                                <a href="{{ URL::to('admin/service/edit/'.$row->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ URL::to('admin/service/delete/'.$row->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
