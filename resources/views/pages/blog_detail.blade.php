@extends('layouts.app')

@section('content')
    {{-- <div class="page-banner" style="background-image: url({{ asset('uploads/'.$g_setting->banner_blog_detail) }})">
        <div class="bg-page"></div>
        <div class="text">
            <h1>{{ $blog_detail->blog_title }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('front.blogs') }}">{{ BLOGS }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $blog_detail->blog_title }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="single-section">
                        <div class="featured-photo">
                            <img src="{{ asset('uploads/'.$blog_detail->blog_photo) }}">
                        </div>
                        <div class="text">
                            <h2>{{ $blog_detail->blog_title }}</h2>
                            <h3>
                                {{ POSTED_ON }} {{ \Carbon\Carbon::parse($blog_detail->created_at)->format('d M, Y') }}
                            </h3>
                            {!!  $blog_detail->blog_content !!}
                        </div>

                        <h2 class="mt_35">{{ SHARE_THIS }}</h2>
                        <div class="share_buttons">
                            <a class="facebook" target="_blank" href="http://www.facebook.com/sharer.php?u={{ url('blog/'.$blog_detail->blog_slug) }}&t={{ $blog_detail->blog_title }}"><i class="fab fa-facebook-f"></i></a>

                            <a class="twitter" target="_blank" href="https://twitter.com/share?text={{ $blog_detail->blog_title }}&url={{ url('blog/'.$blog_detail->blog_slug) }}"><i class="fab fa-twitter"></i></a>

                            <a class="pinterest" target="_blank" href="https://www.pinterest.com/pin/create/button/?description={{ $blog_detail->blog_title }}&media=&url={{ url('blog/'.$blog_detail->blog_slug) }}"><i class="fab fa-pinterest"></i></a>

                            <a class="linkedin" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url={{ url('blog/'.$blog_detail->blog_slug) }}&title={{ $blog_detail->blog_title }}"><i class="fab fa-linkedin-in"></i></a>
                        </div>


                        <!-- Comment Section Started -->
                        <hr class="mt_50">
                        <div class="comment mt_50">

                            <h2 class="mb_40">{{ COMMENTS }} ({{ count($comments) }})</h2>

                            @if(count($comments) == 0)
                                <div class="text-danger">{{ NO_COMMENT_FOUND }}</div>
                            @else
                                @foreach($comments as $row)
                                    <div class="comment-item">
                                        <div class="text">
                                            <h4>{{ $loop->iteration . '. ' . $row->person_name }}</h4>
                                            <div class="date">{{ \Carbon\Carbon::parse($row->created_at)->format('d M, Y') }}</div>
                                            <div class="des">
                                                <p>
                                                    {!! nl2br(e($row->person_message)) !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <hr class="mt_50">

                            <h2 class="mt_35">{{ POST_YOUR_COMMENT }}</h2>
                            <form action="{{ route('front.comment') }}" method="post">
                                @csrf
                                <input type="hidden" name="blog_id" value="{{ $blog_detail->id }}">
                                <input type="hidden" name="blog_slug" value="{{ $blog_detail->blog_slug }}">
                                <input type="hidden" name="comment_status" value="Pending">
                                <div class="row mb_20">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="{{ NAME }}" name="person_name">
                                    </div>
                                    <div class="col">
                                        <input type="email" class="form-control" placeholder="{{ EMAIL_ADDRESS }}" name="person_email">
                                    </div>
                                </div>
                                <div class="row mb_20">
                                    <div class="col">
                                        <textarea name="person_message" class="form-control h-200" cols="30" rows="10" placeholder="{{ COMMENT }}"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">{{ POST_COMMENT }}</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- Comment Section End -->



                    </div>
                </div>
                <div class="col-md-4">
                    @include('layouts.sidebar_blog')
                </div>
            </div>
        </div>
    </div> --}}

    <div class="section blog-section">
        <div class="container">
            <div class="columns">
                <div class="column is-8">
                    <!-- Single Post -->
                    <div class="is-single-post">
                        <div class="featured-post-image">
                            <img src="https://via.placeholder.com/1200x300" data-demo-src="assets/img/demo/posts/post-1.jpg" alt="">
                            <div class="post-date">
                                <div class="post-date-inner">
                                    <span>Oct</span>
                                    <span>23</span>
                                </div>
                            </div>
                        </div>

                        <div class="featured-post-body">
                            <div class="featured-post-title">
                                <div class="title-meta">
                                    <h2 class="post-title">How design has become critical in business Projects</h2>
                                    <h4 class="post-subtitle">
                                        <span>by <a class="author-name" href="#">Alan Maynard</a></span>
                                        <i class="fa fa-circle"></i>
                                        <span>Posted in <a href="#">Web Design</a></span>
                                    </h4>
                                </div>
                            </div>

                            <div class="content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc lacinia euismod urna, in
                                    gravida leo efficitur a. Sed tempus augue risus, eget faucibus urna hendrerit a. Donec
                                    pulvinar maximus dui ut porttitor. Nullam tristique tortor et ipsum tristique, ac
                                    lacinia
                                    diam faucibus. Nunc cursus massa eget consectetur laoreet ...</p>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Non est igitur voluptas bonum.
                                    Facillimum id quidem est, inquam. Quae cum magnifice primo dici viderentur, considerata
                                    minus probabantur. Duo Reges: constructio interrete. Quibus ego vehementer assentior. An
                                    vero, inquit, quisquam potest probare, quod perceptfum, quod. </p>

                                <p>
                                <blockquote>Cum praesertim illa perdiscere ludus esset. Istam voluptatem perpetuam quis
                                    potest
                                    praestare
                                    sapienti? Fortemne possumus dicere eundem illum Torquatum? Quorum altera prosunt, nocent
                                    altera. Hoc ipsum elegantius poni meliusque potuit. Quare conare, quaeso. </blockquote>
                                </p>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Miserum hominem! Si dolor summum
                                    malum est, dici aliter non potest. Multa sunt dicta ab antiquis de contemnendis ac
                                    despiciendis rebus humanis; Duo Reges: constructio interrete. Conferam avum tuum Drusum
                                    cum
                                    C. In quibus doctissimi illi veteres inesse quiddam caeleste et divinum putaverunt. Ergo
                                    illi intellegunt quid Epicurus dicat, ego non intellego? Atqui reperies, inquit, in hoc
                                    quidem pertinacem; Nec vero hoc oratione solum, sed multo magis vita et factis et
                                    moribus
                                    comprobavit. </p>

                                <p>Re mihi non aeque satisfacit, et quidem locis pluribus. Quis Aristidem non mortuum
                                    diligit?
                                    Universa enim illorum ratione cum tota vestra confligendum puto. Quae tamen a te agetur
                                    non
                                    melior, quam illae sunt, quas interdum optines. Quid enim ab antiquis ex eo genere, quod
                                    ad
                                    disserendum valet, praetermissum est? Itaque hoc frequenter dici solet a vobis, non
                                    intellegere nos, quam dicat Epicurus voluptatem. An, partus ancillae sitne in fructu
                                    habendus, disseretur inter principes civitatis.</p>
                            </div>

                            <div class="sharing-links">
                                <span>Share</span>
                                <div class="social-links">
                                    <a><i class="fa fa-facebook-f"></i></a>
                                    <a><i class="fa fa-linkedin-in"></i></a>
                                    <a><i class="fa fa-twitter"></i></a>
                                </div>
                            </div>

                            <div class="post-tags">
                                <span>Tags</span>
                                <div class="tags">
                                    <a class="tag is-medium">Aesthetics</a>
                                    <a class="tag is-medium">Bulkit</a>
                                    <a class="tag is-medium">Envato</a>
                                </div>
                            </div>

                            <div class="post-author">
                                <div class="post-author-avatar">
                                    <img src="https://via.placeholder.com/250x250" alt="" data-demo-src="assets/img/avatars/carolin.png">
                                </div>
                                <div class="post-author-meta">
                                    <h2 class="post-author-title"><a>Melany Cambell</a></h2>
                                    <h4>UI/UX Designer</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc lacinia euismod urna,
                                        in
                                        gravida leo efficitur a. Sed tempus augue risus, eget faucibus urna hendrerit a.
                                        Donec
                                        pulvinar maximus dui ut porttitor.</p>
                                </div>
                            </div>

                            <!--Related Posts-->
                            <div class="related-posts">
                                <h3 class="related-posts-head">You might also like</h3>

                                <div class="columns">

                                    <!--Related Post Card-->
                                    <div class="column is-6">
                                        <div class="card blog-grid-item is-related">
                                            <div class="card-image">
                                                <img class="item-featured-image" src="https://via.placeholder.com/1200x300" data-demo-src="assets/img/demo/posts/post-2.jpg" alt="">
                                                <div class="post-date">
                                                    <div class="post-date-inner">
                                                        <span>Oct</span>
                                                        <span>22</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-content">
                                                <div class="featured-post-title">
                                                    <div class="title-meta">
                                                        <h2 class="post-title">5 Things you should know when planning for a
                                                            new online store</h2>
                                                        <h4 class="post-subtitle">
                                                            <span>Posted in <a href="#">Ecommerce</a></span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <a class="read-more-link">
                                                    Read More <span>&#10230;</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Related Post Card-->
                                    <div class="column is-6">
                                        <div class="card blog-grid-item is-related">
                                            <div class="card-image">
                                                <img class="item-featured-image" src="https://via.placeholder.com/1200x300" data-demo-src="assets/img/demo/posts/post-5.jpg" alt="">
                                                <div class="post-date">
                                                    <div class="post-date-inner">
                                                        <span>Oct</span>
                                                        <span>12</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-content">
                                                <div class="featured-post-title">
                                                    <div class="title-meta">
                                                        <h2 class="post-title">8 Tips to chose the best payment provider for
                                                            your business</h2>
                                                        <h4 class="post-subtitle">
                                                            <span>Posted in <a href="#">Business</a></span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <a class="read-more-link">
                                                    Read More <span>&#10230;</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
