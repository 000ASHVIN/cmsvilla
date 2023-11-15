@extends('layouts.master')

@section('banner')
<div class="contact-banner">
    <div class="container py-20">
       <h1 class="clean-title is-1">
         {{ $banner->name ?? '' }}
        </h1>
    </div>
</div>
@endsection

@section('css')
<style>
    .blog-grid-item .card-content .featured-post-title .title-meta {
        margin-left: 0;
    }
</style>
@endsection

@section('content')
<!-- Benefits section -->
<div class="section is-medium">
    <div id="start" class="container">
        <!-- Title -->
        <!-- <div class="section-title-wrapper has-text-centered">
        <h2 class="section-title-landing">
          Our team is made of recognized business process experts from all
          over the world
        </h2>
      </div> -->

        <div class="centered-title mb-30">
            <h2>
                Our team is made of recognized business process experts from all over the world
            </h2>
            <div class="title-divider"></div>
        </div>

        <div class="content-wrapper">
            <div class="content-wrapper">
                <div class="columns services-cards is-left is-flex-wrap-wrap" style="align-items: flex-start">
                    <!-- Card -->
                    @foreach ($industries as $industry)
                      {{-- <div class="column">
                        <div class="feature-card card-md hover-inset has-text-centered mb-20 is-card-reveal">
                          <div class="card-image">
                            <img class="item-featured-image" src="{{ asset('uploads/' . $industry->photo) }}" alt="" width="100" />
                        </div>
                            <div class="card-title">
                                <a href="{{ route('front.industry.details', $industry->slug) }}"><h4>{{ $industry->name }}</h4></a>
                            </div>
                            <div class="card-feature-description">
                                <span class="">
                                   {{ $industry->seo_meta_description }}
                                </span>
                            </div>
                        </div>
                    </div> --}}
                    <div class="column is-4">
                      <!--Post Card-->
                      <div class="card blog-grid-item is-masonry masonry-size-3">
                          <a href="CaseStudyDetails.html">
                              <div class="card-image">
                                  <img class="item-featured-image" src="{{ asset('uploads/' . $industry->photo) }}" alt=""
                                      width="100" />
                              </div>
                              <div class="card-content">
                                  <div class="featured-post-title">
                                      <div class="title-meta">
                                          <a class="read-more-link" href="{{ route('front.industry.details', $industry->slug) }}"> 
                                              <h2 class="post-title">{{ $industry->name }}</h2>
                                          </a>
                                      </div>
                                  </div>
                                  <p>
                                  {!! Str::limit(strip_tags($industry->description), 130) !!}
                                  </p>
                              </div>
                          </a>
                      </div>
                  </div>
                    @endforeach
                  </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                      <li class="page-item">
                        {{ $industries->links() }}
                    </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

@include('pages.includes.companies')
@include('pages.includes.testimonial')
@endsection