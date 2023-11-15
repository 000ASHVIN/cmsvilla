@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Testimonial</h1>

    <form action="{{ url('admin/testimonial/update/'.$testimonial->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Edit Testimonial</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin.testimonial.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> View All</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Name *</label>
                    <input type="text" name="name" class="form-control" value="{{ $testimonial->name }}" autofocus>
                </div>
                <div class="form-group">
                    <label for="">Designation *</label>
                    <input type="text" name="designation" class="form-control" value="{{ $testimonial->designation }}">
                </div>
                <div class="form-group">
                    <label for="">Comment *</label>
                    <textarea name="comment" class="form-control h_100" cols="30" rows="10">{{ $testimonial->comment }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Existing Photo</label>
                    <div>
                        <img src="{{ asset('uploads/'.$testimonial->photo) }}" alt="" class="w_200">
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
                    {{-- <div>
                        <select name="located_page" id="located_page" class="custom-select">
                            <option value="" selected>Select Page</option>
                            <option value="home"  {{ ($testimonial->located_page === 'home') ? 'selected' : '' }} >Home</option>
                        </select>
                    </div> --}}
                    <?php 
                         $data = json_decode($testimonial->located_page);
                    ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="home" id="home" name="located_page[]" {{ ($data != null && (in_array('home',$data)) ? 'checked' : '') }}>Home
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="industry" id="industry" name="located_page[]" {{ ($data != null && (in_array('industry',$data)) ? 'checked' : '') }}>Industry
                    </div> 
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="case_study" id="case_study" name="located_page[]" {{ ($data != null && (in_array('case_study',$data)) ? 'checked' : '') }}>Case Study
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Select Industry</label>
                    <div>
                        <select name="located_industry[]" id="located_industry" class="custom-select select2"  multiple="multiple" data-placeholder="Select Industry">
                            @foreach ($industrys as $industry)
                            <option value="{{ $industry->id }}" @if(in_array($industry->id, $testimonial->industries->pluck('id')->toArray())) selected @endif>{{ $industry->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Select Case Study</label>
                    <div>
                        <select name="located_case_study[]" id="located_case_study" class="custom-select select2"  multiple="multiple" data-placeholder="Select Case Study">
                            @foreach ($case_studies as $industry)
                            <option value="{{ $industry->id }}" @if(in_array($industry->id, $testimonial->caseStudies->pluck('id')->toArray())) selected @endif>{{ $industry->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
    </form>

@endsection
