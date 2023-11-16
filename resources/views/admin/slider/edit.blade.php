@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Banner</h1>

    <form action="{{ url('admin/slider/update/'.$slider->id) }}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="current_photo" value="{{ $slider->slider_photo }}">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Edit Banner</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin.slider.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> View All</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Banner Heading</label>
                    <input type="text" name="slider_heading" class="form-control" value="{{ $slider->slider_heading }}" autofocus>
                </div>
                <div class="form-group">
                    <label for="">Banner Text</label>
                    <textarea name="slider_text" class="form-control h_100" cols="30" rows="10">{{ $slider->slider_text }}</textarea>
                </div>
                {{-- <div class="form-group">
                    <label for="">Banner Button Text</label>
                    <input type="text" name="slider_button_text" class="form-control" value="{{ $slider->slider_button_text }}" autofocus>
                </div>
                <div class="form-group">
                    <label for="">Banner Button URL</label>
                    <input type="text" name="slider_button_url" class="form-control" value="{{ $slider->slider_button_url }}" autofocus>
                </div> 

                <div class="form-group">
                    <label for="">Existing Banner Photo</label>
                    <div>
                        <img src="{{ asset('uploads/'.$slider->slider_photo) }}" alt="" class="w_200">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Change Banner Photo</label>
                    <div>
                        <input type="file" name="slider_photo">
                    </div>
                </div>
                @if ($slider->right_side_photo)
                <div class="form-group">
                    <label for="">Existing Right Side Photo</label>
                    <div>
                        <img src="{{ asset('uploads/'.$slider->right_side_photo) }}" alt="" class="w_200">
                    </div>
                </div>
                @endif
                <div class="form-group">
                    <label for="">Change Right Side Photo</label>
                    <div>
                        <input type="file" name="right_side_photo">
                    </div>
                </div> --}}
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
    </form>

@endsection