@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Industry Display Item</h1>

    <form action="{{ url('admin/industry-item/update/'.$industry_item->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Edit Industry Display Item</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin.industry_item.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> View All</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Name *</label>
                    <input type="text" name="name" class="form-control" value="{{ $industry_item->name }}" autofocus>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control h_100" cols="30" rows="10">{{ $industry_item->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Existing Photo</label>
                    <div>
                        <img src="{{ asset('uploads/'.$industry_item->photo) }}" alt="" class="w_100">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Change Photo</label>
                    <div>
                        <input type="file" name="photo">
                    </div>
                </div>                
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
    </form>

@endsection
