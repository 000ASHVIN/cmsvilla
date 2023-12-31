@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Case Study</h1>

    <form action="{{ url('admin/case-study/update/'.$service->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="page" value="case_study">
        <input type="hidden" name="content_id" value="0">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Edit Case Study</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin.case-study.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> View All</a>
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
                    <label for="">Existing Photo</label>
                    <div>
                        <img src="{{ asset('uploads/'.$service->photo) }}" alt="" class="w_200">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Change Photo</label>
                    <div>
                        <input type="file" name="photo">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Select Page</label>
                    <div>
                        <select name="located_page" id="located_page" class="custom-select">
                            <option value="" selected>Select Page</option>
                            <option value="home"  {{ ($service->located_page === 'home') ? 'selected' : '' }} >Home</option>
                            {{-- <option value="industry" {{ ($service->located_page === 'industry') ? 'selected' : '' }}>Industry</option> --}}
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Select Industry</label>
                    <div>
                        <select name="located_industry[]" id="located_industry" class="custom-select select2"  multiple="multiple" data-placeholder="Select Industry">
                            @foreach ($industrys as $industry)
                            <option value="{{ $industry->id }}" @if(in_array($industry->id, $service->industries->pluck('id')->toArray())) selected @endif>{{ $industry->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">SEO Information</h6>
            </div>
            <div class="card-body">
                {{-- <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="seo_title" class="form-control" value="{{ $service->seo_title }}">
                </div>
                <div class="form-group">
                    <label for="">Meta Description</label>
                    <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ $service->seo_meta_description }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Update</button> --}}
                @include('admin.seo.includes.seo_form')
                <button type="submit" class="btn btn-success mt-3">Update</button>
            </div>
            </div>
        </div>
    </form>

@endsection
