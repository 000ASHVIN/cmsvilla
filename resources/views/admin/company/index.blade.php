@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Company</h1>
    <div class="card shadow mb-4 mt-3">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary">Title</h6>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/page/home/11') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="trusted_company_title" class="form-control" value="{{ $page_home->trusted_company_title }}">
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary">View Companies</h6>
            <div class="float-right d-inline">
                <a href="{{ route('admin.company.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Photo</th>
                        <th>Url</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($company as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('uploads/'.$row->photo) }}" alt="" class="w_200"></td>
                            <td>{{ $row->slug }}</td>
                            <td>
                                <a href="{{ URL::to('admin/company/edit/'.$row->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ URL::to('admin/company/delete/'.$row->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
