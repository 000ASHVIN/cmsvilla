@extends('admin.admin_layouts')
@section('style')
<style>
.custom-select {
  padding: 10px;
  font-size: 16px; 
  border: 1px solid #ccc; 
  border-radius: 5px; 
  width: 200px; 
  background-color: #fff; 
  color: #333;
}
.custom-select:focus {
  border-color: #007bff; 
  outline: none; 
  box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); 
}
.custom-select::after {
  content: '\25BC'; 
  position: absolute;
  top: 50%;
  right: 10px;
  transform: translateY(-50%);
  pointer-events: none;
}
</style>

@endsection
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Company</h1>

    <form action="{{ url('admin/company/update/'.$company->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Edit Company</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin.company.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> View All</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Url</label>
                    <input type="text" name="slug" class="form-control" value="{{ $company->slug }}">
                </div>
                <div class="form-group">
                    <label for="">Existing Photo</label>
                    <div>
                        <input type="hidden" value="{{ $company->photo }}" name="current_photo">
                        <img src="{{ asset('uploads/'.$company->photo) }}" alt="" class="w_200">
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
                    <?php 
                         $data = json_decode($company->located_page);
                    ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="home" id="home" name="located_page[]" {{ ($data != null && (in_array('home',$data)) ? 'checked' : '') }}>Home
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="industry" id="industry" name="located_page[]" {{ ($data != null && (in_array('industry',$data)) ? 'checked' : '') }}>Industry
                    </div>
                </div>
            </div>
            <div class="card-body">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
    </form>

@endsection
