@extends('layouts.app')

@section('css')
<style>
    @media only screen and (max-width: 768px) {
        .slider-table.part-2 {
            height: 0;
        }
    }
    .companies_head{
        color: red !important;
    }

    .project {
        padding-top: 70px;
        padding-bottom: 80px;
        overflow: hidden;
        background: #3867D6;
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
        background-attachment: fixed;
        position: relative;
    }

    .project-bg {
        background: #3867D6!important;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: #3867D6;
        opacity: 0.8;
    }
    .project .heading h2 {
        font-size: 36px;
        font-weight: 700;
        color: #fff;
        margin-top: 0;
    }
    .project .heading h3 {
        font-size: 20px;
        font-weight: 500;
        color: #fff;
    }
    /* .project .project-item .text p {
        font-size: 15px;
        color: #fff;
    } */
    .project .project-item .text h3 {
        font-size: 20px;
        font-weight: 700;
        color: #fff;
        position: relative;
        margin-top: 40px;
    }
    .project .project-item .text h4 {
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 15px;
        color: #fff;
    }
</style>
@endsection

@section('content')
{{-- <div class="slider">
    <div class="slide-carousel owl-carousel"> --}}

        @foreach($sliders as $row)
        <div class="slider-item" style="background-image:url({{ asset('uploads/'.$row->slider_photo) }});">
            <div class="slider-bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="slider-table">
                            <div class="slider-text">
                                <div class="text-animated">
                                    <h1>{{ $row->slider_heading }}</h1>
                                </div>
                                <div class="text-animated">
                                    <p>
                                        {!! nl2br(e($row->slider_text)) !!}
                                    </p>
                                </div>
                                <div class="text-animated">
                                    <ul>
                                        <li><a href="{{ $row->slider_button_url }}">{{ $row->slider_button_text }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="slider-table part-2">
                            <div class="slider-text align-bottom">
                                <div class="d-none d-sm-none d-md-block">
                                    <img src="{{ asset('uploads/'.$row->right_side_photo) }}" alt="" class="w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    {{-- </div>
</div> --}}
@if($page_home->trusted_company_status == 'Show')
<div class="feature">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading wow fadeInUp">
                    <h3 class="companies_head">{{ $page_home->trusted_company_title }}</h3>
                    <h2>{{ $page_home->trusted_company_subtitle }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="companies-carousel owl-carousel">
                    @foreach($companies as $row)
                        <?php 
                             $data = json_decode($row->located_page);
                        ?>
                        @if ($data != null)
                            {{-- @if ($row->located_page == 'home') --}}
                            @if(in_array('home',$data))
                                <div class="companies-item wow fadeInUp">
                                    <div class="photo">
                                        <a href="{{ $row->slug }}"><img src="{{ asset('uploads/'.$row->photo) }}" alt=""></a>
                                    </div>
                                </div>
                            @endif
                        {{-- @else
                            <div class="companies-item wow fadeInUp">
                                <div class="photo">
                                    <a href="{{ $row->slug }}"><img src="{{ asset('uploads/'.$row->photo) }}" alt=""></a>
                                </div>
                            </div> --}}
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif

{{-- @if($page_home->why_choose_status == 'Show')
<div class="feature">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading wow fadeInUp">
                    <h2>{{ $page_home->why_choose_title }}</h2>
                    <h3>{{ $page_home->why_choose_subtitle }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($why_choose_items as $row)
            <div class="col-md-4">
                <div class="feature-item wow fadeInUp">
                    <div class="icon">
                        <img src="{{ asset('uploads/'.$row->photo) }}" alt="">
                    </div>
                    <h4>{{ $row->name }}</h4>
                    <p>
                        {!! nl2br(e($row->description)) !!}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif --}}


@if($page_home->special_status == 'Show')
<div class="special" style="background-color: {{ $page_home->special_bg_color }};">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 wow fadeInLeft">
                <h2>{{ $page_home->special_title }}</h2>
                <h3>{{ $page_home->special_subtitle }}</h3>
                <p>
                    {!! nl2br(e($page_home->special_content)) !!}
                </p>
                <div class="read-more">
                    <a href="{{ $page_home->special_btn_url }}" class="btn btn-primary btn-arf">{{ $page_home->special_btn_text }}</a>
                </div>
            </div>
            <div class="col-md-6 wow fadeInRight">
                <div class="video-section" style="background-image: url({{ asset('uploads/'.$page_home->special_video_bg) }})">
                    <div class="bg video-section-bg"></div>
                    <div class="video-button-container">
                        <a class="video-button" href="https://www.youtube.com/watch?v={{ $page_home->special_yt_video }}"><span></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif


@if($page_home->service_status == 'Show')
<div class="service">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading wow fadeInUp">
                    <h2>{{ $page_home->service_title }}</h2>
                    <h3>{{ $page_home->service_subtitle }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="service-carousel owl-carousel">
                    @foreach($services as $row)
                    <div class="service-item wow fadeInUp">
                        <div class="photo">
                            <a href="{{ url('service/'.$row->slug) }}"><img src="{{ asset('uploads/'.$row->photo) }}" alt=""></a>
                        </div>
                        <div class="text">
                            <h3><a href="{{ url('service/'.$row->slug) }}">{{ $row->name }}</a></h3>
                            <p>
                                {!! nl2br(e($row->short_description)) !!}
                            </p>
                            <div class="read-more">
                                <a href="{{ url('service/'.$row->slug) }}">{{ READ_MORE }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if($page_home->project_status == 'Show')
<div class="project" style="background-image: url({{ asset('uploads/'.$page_home->project_bg) }});">
    <div class="project-bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading wow fadeInUp">
                    <h2>{{ $page_home->project_title }}</h2>
                    <h3>{{ $page_home->project_subtitle }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="project-carousel owl-carousel">
                    @foreach($projects as $row)
                    <div class="project-item wow fadeInUp">
                        <div class="photo">
                            <a href="{{ url('project/'.$row->project_slug) }}"><img src="{{ asset('uploads/'.$row->project_featured_photo) }}" alt=""></a>
                        </div>
                        <div class="text">
                            <h3><a href="{{ url('project/'.$row->project_slug) }}">{{ $row->project_name }}</a></h3>
                            <p>
                                {!! nl2br(e($row->project_content_short)) !!}
                            </p>
                            <div class="read-more">
                                <a href="{{ url('project/'.$row->project_slug) }}">{{ READ_MORE }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif


@if($page_home->case_study_status == 'Show')
<div class="service">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading wow fadeInUp">
                    <h2>{{ $page_home->case_study_title }}</h2>
                    <h3>{{ $page_home->case_study_subtitle }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="service-carousel owl-carousel">
                    @foreach($case_studies as $row)
                    @if ($row->located_page != null)
                        @if ($row->located_page == 'home')
                            <div class="service-item wow fadeInUp">
                                <div class="photo">
                                    <a href="{{ url('service/'.$row->slug) }}"><img src="{{ asset('uploads/'.$row->photo) }}" alt=""></a>
                                </div>
                                <div class="text">
                                    <h3><a href="{{ url('service/'.$row->slug) }}">{{ $row->name }}</a></h3>
                                    <p>
                                        {!! nl2br(e($row->short_description)) !!}
                                    </p>
                                    <div class="read-more">
                                        <a href="{{ url('service/'.$row->slug) }}">{{ READ_MORE }}</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="service-item wow fadeInUp">
                            <div class="photo">
                                <a href="{{ url('service/'.$row->slug) }}"><img src="{{ asset('uploads/'.$row->photo) }}" alt=""></a>
                            </div>
                            <div class="text">
                                <h3><a href="{{ url('service/'.$row->slug) }}">{{ $row->name }}</a></h3>
                                <p>
                                    {!! nl2br(e($row->short_description)) !!}
                                </p>
                                <div class="read-more">
                                    <a href="{{ url('service/'.$row->slug) }}">{{ READ_MORE }}</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif



@if($page_home->testimonial_status == 'Show')
<div class="testimonial" style="background-color: {{ $page_home->testimonial_bg_color }};">
    <div></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading wow fadeInUp">
                    <h2>{{ $page_home->testimonial_title }}</h2>
                    <h3>{{ $page_home->testimonial_subtitle }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="testimonial-carousel owl-carousel">
                    @foreach($testimonials as $row)
                        <?php 
                            $data = json_decode($row->located_page);
                        ?>
                        @if ($data != null)
                            {{-- @if ($row->located_page == 'home') --}}
                            @if(in_array('home',$data))
                                <div class="testimonial-item wow fadeInUp">
                                    <div class="photo">
                                        <img src="{{ asset('uploads/'.$row->photo) }}" alt="">
                                    </div>
                                    <div class="text">
                                        <p>
                                            {!! nl2br(e($row->comment)) !!}
                                        </p>
                                        <h3>{{ $row->name }}</h3>
                                        <h4>{{ $row->designation }}</h4>
                                    </div>
                                </div>
                            @endif
                        {{-- @else
                            <div class="testimonial-item wow fadeInUp">
                                <div class="photo">
                                    <img src="{{ asset('uploads/'.$row->photo) }}" alt="">
                                </div>
                                <div class="text">
                                    <p>
                                        {!! nl2br(e($row->comment)) !!}
                                    </p>
                                    <h3>{{ $row->name }}</h3>
                                    <h4>{{ $row->designation }}</h4>
                                </div>
                            </div>    --}}
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif


{{-- @if($page_home->team_member_status == 'Show')
<div class="team bg-lightblue">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading wow fadeInUp">
                    <h2>{{ $page_home->team_member_title }}</h2>
                    <h3>{{ $page_home->team_member_subtitle }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="team-carousel owl-carousel">
                    @foreach($team_members as $row)
                    <div class="team-item wow fadeInUp">
                        <div class="team-photo">
                            <a href="{{ url('team-member/'.$row->slug) }}" class="team-photo-anchor">
                                <img src="{{ asset('uploads/'.$row->photo) }}" alt="Team Member Photo">
                            </a>
                        </div>
                        <div class="team-text">
                            <h4><a href="{{ url('team-member/'.$row->slug) }}">{{ $row->name }}</a></h4>
                            <p>{{ $row->designation }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif --}}



{{-- @if($page_home->appointment_status == 'Show')
<div class="cta" style="background-image: url({{ asset('uploads/'.$page_home->appointment_bg) }});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="cta-box text-center">
                    <h2>{{ $page_home->appointment_title }}</h2>
                    <p class="mt-3">
                        {!! nl2br(e($page_home->appointment_text)) !!}
                    </p>
                    <a href="{{ $page_home->appointment_btn_url }}" class="btn btn-primary">{{ $page_home->appointment_btn_text }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif --}}

{{-- @if($page_home->latest_blog_status == 'Show')
<div class="blog-area">
    <div class="container wow fadeIn">

        <div class="row">
            <div class="col-md-12">
                <div class="heading wow fadeInUp">
                    <h2>{{ $page_home->latest_blog_title }}</h2>
                    <h3>{{ $page_home->latest_blog_subtitle }}</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="blog-carousel owl-carousel">

                    @foreach($blogs as $row)
                    <div class="blog-item wow fadeInUp">
                        <a href="{{ url('blog/'.$row->blog_slug) }}">
                            <div class="blog-image">
                                <img src="{{ asset('uploads/'.$row->blog_photo) }}" alt="Blog Image">
                                <div class="date">
                                    <h3>{{ \Carbon\Carbon::parse($row->created_at)->format('d') }}</h3>
                                    <h4>{{ \Carbon\Carbon::parse($row->created_at)->format('M') }}</h4>
                                </div>
                            </div>
                        </a>
                        <div class="blog-text">
                            <h3><a href="{{ url('blog/'.$row->blog_slug) }}">{{ $row->blog_title }}</a></h3>
                            <p>
                                {!! nl2br(e($row->blog_content_short)) !!}
                            </p>
                            <div class="read-more">
                                <a href="{{ url('blog/'.$row->blog_slug) }}">{{ READ_MORE }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endif --}}

{{-- @if($page_home->newsletter_status == 'Show')
<div class="newsletter-area" style="background-image: url({{ asset('uploads/'.$page_home->newsletter_bg) }});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 newsletter">
                <div class="newsletter-text wow fadeInUp">
                    <h2>{{ $page_home->newsletter_title }}</h2>
                    <p>
                        {!! nl2br(e($page_home->newsletter_text)) !!}
                    </p>
                </div>
                <div class="newsletter-button wow fadeInUp">
                    <form action="{{ route('front.subscription') }}" method="post" class="frm_newsletter justify-content-center">
                        @csrf
                        <input type="text" placeholder="{{ EMAIL_ADDRESS }}" name="subs_email">
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif --}}

@endsection