@extends('layouts.master')
@section('banner')
<div class="contact-banner">
    <div class="container">
        <center>
            <h1 class="clean-title is-1 mt-5 mb-5" style="color: white">
                Reconcify is superfast solution to complex and voluminious reconciliations
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
                            <img class="item-featured-image" src="{{ asset('uploads/'.$row->photo) }}" alt=""
                                width="100" />


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
                                    <img src="{{ asset('uploads/'.$row->photo) }}" alt="" class="w-100" alt=""
                                        data-demo-src="assets/img/avatars/alan.jpg" />
                                </div>
                                <div class="title-meta">
                                    <h2 class="post-title">
                                        {{ $row->name }}
                                    </h2>
                                    <h4 class="post-subtitle">
                                        <span>by <a class="author-name" href="#">Alan M.</a></span>
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
@include('pages.includes.companies')
@include('pages.includes.testimonial')
@endsection