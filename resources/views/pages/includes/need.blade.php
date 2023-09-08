@if($page_industry->need_status == 'Show')
    <div class="special">
        <div></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 wow fadeInLeft">
                    <h3 class="std_head">{{ $page_industry->need_title }}</h3>
                    <h2 class="std_sub_head">{{ $page_industry->need_subtitle }}</h2>
                    <p class="std_p">
                        {!! nl2br(e($page_industry->need_subtitle)) !!}
                    </p>
                    <div class="read-more">
                        <a href="{{ $page_industry->need_btn_url }}" class="btn btn-primary btn-arf">{{ $page_industry->need_btn_text }}</a>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInRight">
                    <div class="video-section" style="background-image: url({{ asset('uploads/'.$page_industry->need_video_bg) }})">
                    <div class="video-section" style="background-image: url({{ asset('uploads/banner_blog_detail.jpeg') }})">
                        <div class="bg video-section-bg"></div>
                        <div class="video-button-container">
                            <a class="video-button" href="https://www.youtube.com/watch?v={{ $page_industry->need_yt_video }}"><span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif