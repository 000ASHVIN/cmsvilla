{{-- @extends('layouts.app')

@section('content')
    <div class="page-banner" style="background-image: url({{ asset('uploads/'.$g_setting->banner_blog) }})">
        <div class="bg-page"></div>
        <div class="text">
            <h1>{{ $blog->name }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $blog->name }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {!! $blog->detail !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="single-section">

                        @foreach($blog_items as $row)
                            <div class="blog-item">
                                <div class="featured-photo">
                                    <a href="{{ url('blog/'.$row->blog_slug) }}"><img src="{{ asset('uploads/'.$row->blog_photo) }}"></a>
                                </div>
                                <div class="text">
                                    <h2><a href="{{ url('blog/'.$row->blog_slug) }}">{{ $row->blog_title }}</a></h2>
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
                    <div>
                        {{ $blog_items->links() }}
                    </div>
                </div>
                <div class="col-md-4">
                    @include('layouts.sidebar_blog')
                </div>
            </div>
        </div>
    </div>

@endsection --}}
@extends('layouts.master')
@section('banner')
<div class="contact-banner">
    <div class="container">
        <center>
            <h1 class="clean-title is-1 mt-5 mb-5" style="color: white">
                {{ $blog->name }}
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
            @foreach($blog_items as $row)
            <div class="column is-4">
                <!--Post Card-->
                <div class="card blog-grid-item is-masonry masonry-size-3">
                    <a href="CaseStudyDetails.html">
                        <div class="card-image">
                            <a href="{{ route('blog.detail', $row->blog_slug) }}">
                              <img class="item-featured-image" src="{{ asset('uploads/'.$row->blog_photo) }}" alt=""
                                width="100" />
                            </a>
                            <div class="post-date">
                                <div class="post-date-inner">
                                    <a href="{{ route('blog.detail', $row->blog_slug) }}">
                                       <span>{{ date('M', strtotime($row->created_at)) }}</span>
                                       <span>{{ date('d', strtotime($row->created_at)) }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="featured-post-title">
                                <div class="title-avatar">
                                    <a href="{{ route('blog.detail', $row->blog_slug) }}">
                                        <img src="{{ asset('uploads/'.$row->blog_photo) }}" alt="" class="w-100" alt=""
                                        data-demo-src="assets/img/avatars/alan.jpg" />
                                    </a>
                                </div>
                                <div class="title-meta">
                                    <a class="read-more-link" href="{{ route('blog.detail', $row->blog_slug ) }}"> 
                                        <h2 class="post-title">{{ $row->blog_title }}</h2>
                                    </a>
                                </div>
                            </div>
                            <p>
                                <p>
                                    {!! nl2br(e($row->blog_content_short)) !!}
                                </p>
                            </p>
                                <a class="read-more-link" href="{{ route('blog.detail', $row->blog_slug ) }}">Read More <span>&#10230;</span></a>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <li class="page-item">
                {{ $blog_items->links() }}
            </li>
            </ul>
        </nav>
    </div>
</div>

@endsection