@extends('layouts.master')
@section('banner')
<div class="contact-banner">
    <div class="container">
       <center>
        <h1 class="clean-title is-1 mt-5 mb-5" style="color: white">
          {{-- {{ $contact->name }} --}}sddsdasd
      </h1>
       </center>
    </div>
</div>
@endsection
@section('content')
<div class="section blog-section" style="padding-bottom: 0">
    <div class="container">
        <div class="columns is-multiline">
            <!--First Column-->
            @foreach($case_studies as $row)
        <div class="column is-4">
          <!--Post Card-->
          <div class="card blog-grid-item is-masonry masonry-size-3">
            <a href="CaseStudyDetails.html">
              <div class="card-image">
                <img
                class="item-featured-image"
                src="{{ asset('uploads/'.$row->photo) }}"
                alt=""
                width="100"
            />
            
            
                <div class="post-date">
                  <div class="post-date-inner">
                    <span>{{ date('M', strtotime($row->created_at)) }}</span>
                    <span>{{ date('d', strtotime($row->created_at)) }}</span>
                  </div>
                </div>
              </div>
              <div class="card-content">
                <div class="featured-post-title">
                  <div class="title-avatar">
                    <img
                    src="{{ asset('uploads/'.$row->photo) }}" alt="" class="w-100"
                      alt=""
                      data-demo-src="assets/img/avatars/alan.jpg"
                    />
                  </div>
                  <div class="title-meta">
                    <h2 class="post-title">
                        {{ $row->name }}
                    </h2>
                    <h4 class="post-subtitle">
                      <span
                        >by <a class="author-name" href="#">Alan M.</a></span
                      >
                      <i class="fa fa-circle"></i>
                      <span>Posted in <a href="#">Web Design</a></span>
                    </h4>
                  </div>
                </div>
                <p>
                    {!! Str::limit(strip_tags($row->description), 130) !!}
                </p>
                
                 <a class="read-more-link" href="{{ route('front.case.study.items') }}">
                  Read More <span>&#10230;</span>
                </a>
              </div>
            </a>
          </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $case_studies->links() }}
    </div>

      
    </div>
  </div>

@endsection
{{-- @extends('layouts.app')

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
    .std_head{
        color: red !important;
        font-size: 20px !important;
    }
    .std_sub_head{
        color: black !important;
    }
    .std_p{
        color: black !important;
    }
    .read-more .btn-arf:hover {
        color: black !important; 
        background-color: #3867D6 !important;
    }
    .btn-arf:hover{
        background-color: # !important;
    }
</style>
<style>
    .image-heading-container {
    display: flex;
    align-items: center; /* Center vertically */
    }
    .image-heading-container img {
        margin-right: 10px; /* Add margin for spacing between image and heading */
    }
    .font-size{
        font-size: 200%;
        font-weight:500;
    }
    .font-color{
        color: rgb(143, 139, 139);
    }
</style>
@endsection

@section('content')
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

        @include('pages.includes.industry')
        @include('pages.includes.testimonial')
        
        

@endsection --}}