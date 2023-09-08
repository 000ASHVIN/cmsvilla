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

        
        @include('pages.includes.need')
        @include('pages.includes.workflow')
        @include('pages.includes.case_study')
        @include('pages.includes.companies')
        @include('pages.includes.testimonial')

@endsection