@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit How Help</h1>

    <form action="{{ url('admin/case/study/items/update/'.$service->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Edit How Help</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin.case.study.items.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> View All</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Name *</label>
                    <input type="text" name="name" class="form-control" value="{{ $service->name }}" autofocus>
                </div>
                <div class="form-group">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ $service->slug }}">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control editor" cols="30" rows="10">{{ $service->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Short Description</label>
                    <textarea name="short_description" class="form-control h_100" cols="30" rows="10">{{ $service->short_description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="industry_id">Select Industry</label>
                    <select class="form-control select2" name="industry_id" id="industry_id" data-placeholder="Select Industry">
                        {{-- <option value="" disabled>Select Industry</option> --}}
                        @foreach ($industry as $option)
                            <option value="{{ $option->id }}"  {{ $option->id == $service->industry_id ? 'selected' : '' }}>{{ $option->name }}</option>
                        @endforeach
                    </select>    
                </div>
                <div class="form-group">
                    <label for="">Existing Photo</label>
                    <div>
                        <input type="hidden" value="{{ $service->photo }}" name="current_photo">
                        <img src="{{ asset('uploads/'.$service->photo) }}" alt="" class="w_200">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Change Photo</label>
                    <div>
                        <input type="file" name="photo">
                    </div>
                </div>
            </div>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">SEO Information</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="seo_title" class="form-control" value="{{ $service->seo_title }}">
                </div>
                <div class="form-group">
                    <label for="">Meta Description</label>
                    <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ $service->seo_meta_description }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
    </form>

@endsection
