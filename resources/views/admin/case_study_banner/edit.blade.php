@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Case Study Page Information</h1>
    
    <div class="card shadow mb-4 t-left">
        <div class="card-body">
            <div class="row">
                {{-- <div class="col-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-edit-tab" data-toggle="pill" href="#v-pills-edit" role="tab" aria-controls="v-pills-edit" aria-selected="false">Edit</a>
                        <a class="nav-link" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="false">Need Section</a>
                        <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Workflow</a>
                        <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Trusted Companies Section</a>
                        <a class="nav-link" id="v-pills-5-tab" data-toggle="pill" href="#v-pills-5" role="tab" aria-controls="v-pills-5" aria-selected="false">How Reconcify Helps</a>
                        <a class="nav-link" id="v-pills-6-tab" data-toggle="pill" href="#v-pills-6" role="tab" aria-controls="v-pills-6" aria-selected="false">Case Study</a>
                    </div>
                </div> --}}
                <div class="col-12">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-edit" role="tabpanel" aria-labelledby="v-pills-edit-tab">
                            <form action="{{ url('admin/case_study/banner/update/'.$industry->id) }}" method="post">
                                @csrf
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 mt-2 font-weight-bold text-primary">Edit Banner</h6>
                                        <div class="float-right d-inline">
                                            <a href="{{ route('admin.case_study.banner.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> View All</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Name *</label>
                                            <input type="text" name="name" class="form-control" value="{{ $industry->name }}" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Meta Description</label>
                                            <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ $industry->seo_meta_description }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
