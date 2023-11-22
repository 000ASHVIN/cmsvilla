@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Add Industry</h1>

    <form action="{{ route('admin.industry.store') }}" method="post" enctype="multipart/form-data">
        @csrf
                <input type="hidden" name="page" value="industry">
                <input type="hidden" name="content_id" value="0">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Add Industry</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin.industry.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> View All</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Name *</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" autofocus>
                </div>
                <div class="form-group">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control h_100" cols="30" rows="10">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Photo *</label>
                    <div>
                        <input type="file" name="photo">
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Select Page</label>
                    <div>
                        <select name="located_page" id="located_page" class="custom-select">
                            <option value="" selected>Select Page</option>
                            <option value="home">Home</option>
                            {{-- <option value="industry">Industry</option> --}}
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
                    <input type="text" name="seo_title" class="form-control" value="{{ old('seo_title') }}">
                </div>
                <div class="form-group">
                    <label for="">Meta Description</label>
                    <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ old('seo_meta_description') }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button> --}}
                <div class="row">
                    <div class="col">
                        <label for="">metaTitle</label>
                        <input type="text" class="form-control" name="meta_title" value="{{ $seo->meta_title ?? '' }}">
                    </div>
                    <div class="col">
                        <label for="">metaDescription</label>
                        <input type="text" class="form-control" name="meta_description" value="{{ $seo->meta_description ?? '' }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="photo">metaImage*</label>
                        <div class="form-group">
                            <div>
                                <input type="file" name="meta_image">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col"></div>
                    </div>
                </div>
                <label for="photo">Facebook</label>
                <div class="row"
                    style="border-top: 2px solid #4E88E7;border-left: 2px solid #4E88E7; border-right: 2px solid #4E88E7;padding: 15px;">
                    <div class="col">
                        <label for="">facebookTitle*</label>
                        <input type="text" class="form-control" name="facebook_title" >
                    </div>
                    <div class="col">
                        <label for="">facebookDescription*</label>
                        <input type="text" class="form-control" name="facebook_description" >
                    </div>
                </div>
                <div class="row"
                    style="border-bottom: 2px solid #4E88E7;border-left: 2px solid #4E88E7;border-right: 2px solid #4E88E7; padding: 15px;">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="photo">facebookImage*</label>
                                <div class="form-group">
                                    <div>
                                        <input type="file" name="facebook_image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col"></div>
                    </div>
                </div>
                <label for="photo" class="mt-2">Twitter</label>
                <div class="row"
                    style="border-top: 2px solid #4E88E7;border-left: 2px solid #4E88E7; border-right: 2px solid #4E88E7;padding: 15px;">
                    <div class="col">
                        <label for="">twitterTitle*</label>
                        <input type="text" class="form-control" name="twitter_title" >
                    </div>
                    <div class="col">
                        <label for="">twitterDescription*</label>
                        <input type="text" class="form-control" name="twitter_description" >
                    </div>
                </div>
                <div class="row"
                    style="border-bottom: 2px solid #4E88E7;border-left: 2px solid #4E88E7;border-right: 2px solid #4E88E7; padding: 15px;">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="photo">twitterImage*</label>
                            <div class="form-group">
                                <div>
                                    <input type="file" name="twitter_image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="" class="mt-2">keyWords</label>
                        <input type="text" class="form-control" name="key_words" >
                    </div>
                    <div class="col">
                        <label for="" class="mt-2">metaRobots</label>
                        <input type="text" class="form-control" name="meta_robots" >
                    </div>
                </div>
                
                <button type="submit" class="btn btn-success mt-3">Submit</button>
            </div>
        </div>
    </form>
@endsection
