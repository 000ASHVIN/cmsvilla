@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Home Page Information</h1>
    
    <div class="">
        {{-- card shadow mb-4 t-left --}}
        <div class="card-body">
            <div class="row">
                {{-- <div class="col-3"> --}}
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        {{-- <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Meta Information</a> --}}
                        {{-- <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Why Choose Us Section</a> --}}
                        {{-- <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Special Section</a> --}}
                        {{-- <a class="nav-link" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false">Uses Section</a> --}}
                        {{-- <a class="nav-link" id="v-pills-6-tab" data-toggle="pill" href="#v-pills-6" role="tab" aria-controls="v-pills-6" aria-selected="false">Features Section</a> --}}
                        {{-- <a class="nav-link" id="v-pills-13-tab" data-toggle="pill" href="#v-pills-13" role="tab" aria-controls="v-pills-13" aria-selected="false">Financials Section</a> --}}
                        {{-- <a class="nav-link" id="v-pills-11-tab" data-toggle="pill" href="#v-pills-11" role="tab" aria-controls="v-pills-11" aria-selected="false">Trusted Companies Section</a> --}}
                        {{-- <a class="nav-link" id="v-pills-5-tab" data-toggle="pill" href="#v-pills-5" role="tab" aria-controls="v-pills-5" aria-selected="false">Testimonial Section</a> --}}
                        {{-- <a class="nav-link" id="v-pills-12-tab" data-toggle="pill" href="#v-pills-12" role="tab" aria-controls="v-pills-12" aria-selected="false">Case Studies Section</a> --}}
                        {{-- <a class="nav-link" id="v-pills-7-tab" data-toggle="pill" href="#v-pills-7" role="tab" aria-controls="v-pills-7" aria-selected="false">Team Member Section</a> --}}
                        {{-- <a class="nav-link" id="v-pills-8-tab" data-toggle="pill" href="#v-pills-8" role="tab" aria-controls="v-pills-8" aria-selected="false">Appointment Section</a> --}}
                        {{-- <a class="nav-link" id="v-pills-9-tab" data-toggle="pill" href="#v-pills-9" role="tab" aria-controls="v-pills-9" aria-selected="false">Latest Blog Section</a> --}}
                        {{-- <a class="nav-link" id="v-pills-10-tab" data-toggle="pill" href="#v-pills-10" role="tab" aria-controls="v-pills-10" aria-selected="false">Newsletter Section</a> --}}
                    </div>
                {{-- </div> --}}
                <div class="col-12">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">

                            <!-- Tab 1 -->
                            <form action="{{ url('admin/page/home/1') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="seo_title" class="form-control" value="{{ $page_home->seo_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Meta Description</label>
                                    <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ $page_home->seo_meta_description }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <!-- // Tab 1 -->

                        </div>
                        <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
                            <!-- Tab 2 -->
                            <form action="{{ url('admin/page/home/2') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="why_choose_title" class="form-control" value="{{ $page_home->why_choose_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Subtitle</label>
                                    <input type="text" name="why_choose_subtitle" class="form-control" value="{{ $page_home->why_choose_subtitle }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="why_choose_status" id="rr1" value="Show" @if($page_home->why_choose_status == 'Show') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="why_choose_status" id="rr2" value="Hide" @if($page_home->why_choose_status == 'Hide') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr2">Hide</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <!-- // Tab 2 -->
                        </div>
                        <div class="tab-pane fade show active" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
                            <!-- Tab 3 -->
                           
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <form action="{{ url('admin/page/home/3') }}" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="current_photo" value="{{ $page_home->special_bg }}">
                                        <input type="hidden" name="current_photo1" value="{{ $page_home->special_video_bg }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Title</label>
                                            <input type="text" name="special_title" class="form-control" value="{{ $page_home->special_title }}">
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="">Subtitle</label>
                                            <input type="text" name="special_subtitle" class="form-control" value="{{ $page_home->special_subtitle }}">
                                        </div> --}}
                                        <div class="form-group">
                                            <label for="">Content</label>
                                            <textarea name="special_content" class="form-control h_200" cols="30" rows="10">{{ $page_home->special_content }}</textarea>
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="">Button Text</label>
                                            <input type="text" name="special_btn_text" class="form-control" value="{{ $page_home->special_btn_text }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Button URL</label>
                                            <input type="text" name="special_btn_url" class="form-control" value="{{ $page_home->special_btn_url }}">
                                        </div> --}}
                                        <div class="form-group">
                                            <label for="">YouTube Video Preview</label>
                                            <div class="iframe-container-300">
                                                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $page_home->special_yt_video }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">YouTube Video</label>
                                            <input type="text" name="special_yt_video" class="form-control" value="{{ $page_home->special_yt_video }}">
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="">Existing Background</label>
                                            <div><img src="{{ asset('uploads/'.$page_home->special_bg) }}" alt="" class="w_200"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Change Background</label>
                                            <div><input type="file" name="special_bg"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Existing Video Background</label>
                                            <div><img src="{{ asset('uploads/'.$page_home->special_video_bg) }}" alt="" class="w_200"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Change Video Background</label>
                                            <div><input type="file" name="special_video_bg"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="special_bg_color">Background Color</label>
                                            <div><input type="color" id="special_bg_color" name="special_bg_color" value="{{ $page_home->special_bg_color }}"></div>
                                        </div> --}}
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="special_status" id="rr1" value="Show" @if($page_home->special_status == 'Show') checked @endif>
                                                    <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="special_status" id="rr2" value="Hide" @if($page_home->special_status == 'Hide') checked @endif>
                                                    <label class="form-check-label font-weight-normal" for="rr2">Hide</label>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </form>
                                </div>
                            </div>
                            <!-- // Tab 3 -->
                        </div>
                        <div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">
                            <div style="display: flex; justify-content: flex-end;">
                                <a href="{{ route('admin.company.index') }}">
                                    <button type="submit" class="btn btn-primary">List</button>
                                </a>
                            </div>
                            <!-- Tab 4 -->
                            <form action="{{ url('admin/page/home/4') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="service_title" class="form-control" value="{{ $page_home->service_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Subtitle</label>
                                    <input type="text" name="service_subtitle" class="form-control" value="{{ $page_home->service_subtitle }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="service_status" id="rr1" value="Show" @if($page_home->service_status == 'Show') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="service_status" id="rr2" value="Hide" @if($page_home->service_status == 'Hide') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr2">Hide</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <!-- // Tab 4 -->
                        </div>
                        <div class="tab-pane fade" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-5-tab">
                            <!-- Tab 5 -->
                            <form action="{{ url('admin/page/home/5') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="current_photo" value="{{ $page_home->testimonial_bg }}">
                                @csrf
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="testimonial_title" class="form-control" value="{{ $page_home->testimonial_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Subtitle</label>
                                    <input type="text" name="testimonial_subtitle" class="form-control" value="{{ $page_home->testimonial_subtitle }}">
                                </div>                               
                                <div class="form-group">
                                    <label for="">Existing Background</label>
                                    <div><img src="{{ asset('uploads/'.$page_home->testimonial_bg) }}" alt="" class="w_200"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Change Background</label>
                                    <div><input type="file" name="testimonial_bg"></div>
                                </div>
                                <div class="form-group">
                                    <label for="testimonial_bg_color">Background Color</label>
                                    <div><input type="color" id="testimonial_bg_color" name="testimonial_bg_color" value="{{ $page_home->testimonial_bg_color }}"></div>
                                </div>                                
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="testimonial_status" id="rr1" value="Show" @if($page_home->testimonial_status == 'Show') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="testimonial_status" id="rr2" value="Hide" @if($page_home->testimonial_status == 'Hide') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr2">Hide</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <!-- // Tab 5 -->
                        </div>
                        <div class="tab-pane fade" id="v-pills-6" role="tabpanel" aria-labelledby="v-pills-6-tab">
                            <!-- Tab 6 -->
                            <form action="{{ url('admin/page/home/6') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="current_photo" value="{{ $page_home->project_bg }}">
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="project_title" class="form-control" value="{{ $page_home->project_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Subtitle</label>
                                    <input type="text" name="project_subtitle" class="form-control" value="{{ $page_home->project_subtitle }}">
                                </div>

                                <div class="form-group">
                                    <label for="">Existing Background</label>
                                    <div><img src="{{ asset('uploads/'.$page_home->project_bg) }}" alt="" class="w_200"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Change Background</label>
                                    <div><input type="file" name="project_bg"></div>
                                </div> 

                                <div class="form-group">
                                    <label for="">Status</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="project_status" id="rr1" value="Show" @if($page_home->project_status == 'Show') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="project_status" id="rr2" value="Hide" @if($page_home->project_status == 'Hide') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr2">Hide</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <!-- // Tab 6 -->
                        </div>
                        <div class="tab-pane fade" id="v-pills-13" role="tabpanel" aria-labelledby="v-pills-6-tab">
                            <!-- Tab 6 -->
                            <form action="{{ url('admin/page/home/13') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="current_photo" value="{{ $page_home->project_bg }}">
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="financials_title" class="form-control" value="{{ $page_home->financials_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Subtitle</label>
                                    <input type="text" name="financials_subtitle" class="form-control" value="{{ $page_home->financials_subtitle }}">
                                </div>

                                <div class="form-group">
                                    <label for="">Existing Background</label>
                                    <div><img src="{{ asset('uploads/'.$page_home->financials_bg) }}" alt="" class="w_200"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Change Background</label>
                                    <div><input type="file" name="financials_bg"></div>
                                </div> 

                                <div class="form-group">
                                    <label for="">Status</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="financials_status" id="rr1" value="Show" @if($page_home->financials_status == 'Show') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="financials_status" id="rr2" value="Hide" @if($page_home->financials_status == 'Hide') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr2">Hide</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <!-- // Tab 6 -->
                        </div>
                        <div class="tab-pane fade" id="v-pills-7" role="tabpanel" aria-labelledby="v-pills-7-tab">
                            <!-- Tab 7 -->
                            <form action="{{ url('admin/page/home/7') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="team_member_title" class="form-control" value="{{ $page_home->team_member_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Subtitle</label>
                                    <input type="text" name="team_member_subtitle" class="form-control" value="{{ $page_home->team_member_subtitle }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="team_member_status" id="rr1" value="Show" @if($page_home->team_member_status == 'Show') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="team_member_status" id="rr2" value="Hide" @if($page_home->team_member_status == 'Hide') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr2">Hide</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <!-- // Tab 7 -->
                        </div>
                        <div class="tab-pane fade" id="v-pills-8" role="tabpanel" aria-labelledby="v-pills-8-tab">
                            <!-- Tab 8 -->
                            <form action="{{ url('admin/page/home/8') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="current_photo" value="{{ $page_home->appointment_bg }}">
                                @csrf
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="appointment_title" class="form-control" value="{{ $page_home->appointment_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Text</label>
                                    <textarea name="appointment_text" class="form-control h_100" cols="30" rows="10">{{ $page_home->appointment_text }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Button Text</label>
                                    <input type="text" name="appointment_btn_text" class="form-control" value="{{ $page_home->appointment_btn_text }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Button URL</label>
                                    <input type="text" name="appointment_btn_url" class="form-control" value="{{ $page_home->appointment_btn_url }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Existing Background</label>
                                    <div><img src="{{ asset('uploads/'.$page_home->appointment_bg) }}" alt="" class="w_200"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Change Background</label>
                                    <div><input type="file" name="appointment_bg"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="appointment_status" id="rr1" value="Show" @if($page_home->appointment_status == 'Show') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="appointment_status" id="rr2" value="Hide" @if($page_home->appointment_status == 'Hide') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr2">Hide</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <!-- // Tab 8 -->
                        </div>
                        <div class="tab-pane fade" id="v-pills-9" role="tabpanel" aria-labelledby="v-pills-9-tab">
                            <!-- Tab 9 -->
                            <form action="{{ url('admin/page/home/9') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="latest_blog_title" class="form-control" value="{{ $page_home->latest_blog_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Subtitle</label>
                                    <input type="text" name="latest_blog_subtitle" class="form-control" value="{{ $page_home->latest_blog_subtitle }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="latest_blog_status" id="rr1" value="Show" @if($page_home->latest_blog_status == 'Show') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="latest_blog_status" id="rr2" value="Hide" @if($page_home->latest_blog_status == 'Hide') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr2">Hide</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <!-- // Tab 9 -->
                        </div>
                        <div class="tab-pane fade" id="v-pills-10" role="tabpanel" aria-labelledby="v-pills-10-tab">
                            <!-- Tab 10 -->
                            <form action="{{ url('admin/page/home/10') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="current_photo" value="{{ $page_home->newsletter_bg }}">
                                @csrf
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="newsletter_title" class="form-control" value="{{ $page_home->newsletter_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Text</label>
                                    <textarea name="newsletter_text" class="form-control h_100" cols="30" rows="10">{{ $page_home->newsletter_text }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Existing Background</label>
                                    <div><img src="{{ asset('uploads/'.$page_home->newsletter_bg) }}" alt="" class="w_200"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Change Background</label>
                                    <div><input type="file" name="newsletter_bg"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="newsletter_status" id="rr1" value="Show" @if($page_home->newsletter_status == 'Show') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="newsletter_status" id="rr2" value="Hide" @if($page_home->newsletter_status == 'Hide') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr2">Hide</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <!-- // Tab 10 -->
                        </div>
                        <div class="tab-pane fade" id="v-pills-11" role="tabpanel" aria-labelledby="v-pills-11-tab">
                            <!-- Tab 11 -->
                            <form action="{{ url('admin/page/home/11') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="trusted_company_title" class="form-control" value="{{ $page_home->trusted_company_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Subtitle</label>
                                    <input type="text" name="trusted_company_subtitle" class="form-control" value="{{ $page_home->trusted_company_subtitle }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="trusted_company_status" id="rr1" value="Show" @if($page_home->trusted_company_status == 'Show') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="trusted_company_status" id="rr2" value="Hide" @if($page_home->trusted_company_status == 'Hide') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr2">Hide</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <!-- // Tab 11 -->
                        </div>

                        <div class="tab-pane fade" id="v-pills-12" role="tabpanel" aria-labelledby="v-pills-12-tab">
                            <!-- Tab 9 -->
                            <form action="{{ url('admin/page/home/12') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="case_study_title" class="form-control" value="{{ $page_home->case_study_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Subtitle</label>
                                    <input type="text" name="case_study_subtitle" class="form-control" value="{{ $page_home->case_study_subtitle }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="case_study_status" id="rr1" value="Show" @if($page_home->case_study_status == 'Show') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="case_study_status" id="rr2" value="Hide" @if($page_home->case_study_status == 'Hide') checked @endif>
                                            <label class="form-check-label font-weight-normal" for="rr2">Hide</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <!-- // Tab 9 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection