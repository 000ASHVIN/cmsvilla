@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Contact Page Information</h1>

    <form action="{{ url('admin/page/contact/update') }}" method="post">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $page_contact->name }}">
                </div>
                <div class="form-group">
                    <label for="">Detail</label>
                    <textarea name="detail" class="form-control editor" cols="30" rows="10">{{ $page_contact->detail }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="rr1" value="Show" @if($page_contact->status == 'Show') checked @endif>
                            <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="rr2" value="Hide" @if($page_contact->status == 'Hide') checked @endif>
                            <label class="form-check-label font-weight-normal" for="rr2">Hide</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Contact Address</label>
                    <textarea name="contact_address" class="form-control h_100" cols="30" rows="10">{{ $page_contact->contact_address }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Contact Email</label>
                    <textarea name="contact_email" class="form-control h_100" cols="30" rows="10">{{ $page_contact->contact_email }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Contact Phone</label>
                    <textarea name="contact_phone" class="form-control h_100" cols="30" rows="10">{{ $page_contact->contact_phone }}</textarea>
                </div>
            </div>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">SEO Information</h6>
            </div>
            <div class="card-body">
                <input type="hidden" name="page" value="contact">
                <input type="hidden" name="content_id" value="0">
                @include('admin.seo.includes.seo_form')
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
    </form>
@endsection
