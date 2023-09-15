@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Add Company</h1>

    <form action="{{ route('admin.company.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Add Company</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin.company.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> View All</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Url</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
                </div>
                <div class="form-group">
                    <label for="">Photo *</label>
                    <div>
                        <input type="file" name="photo">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Select Page</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="home" id="home" name="located_page[]">Home
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="industry" id="industry" name="located_page[]">Industry</div>
                    </div>
            <div class="card-body">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>

@endsection
