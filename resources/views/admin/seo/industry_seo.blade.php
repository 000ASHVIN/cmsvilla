@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Industry Seo</h1>
    <div class="card shadow mb-4 mt-3">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary">Title</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.seo.store') }}" method="post" enctype="multipart/form-data">
                {{-- <input type="hidden" name="current_photo"> --}}
                @csrf
                <input type="hidden" name="page" value="industry_seo">
                <input type="hidden" name="content_id" value="0">
                @include('admin.seo.includes.seo_form')
                <button type="submit" class="btn btn-success mt-3">Submit</button>
            </form>
        </div>
    </div>
    
@endsection
