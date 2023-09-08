@if($page_home->testimonial_status == 'Show')
    <div class="testimonial" style="background-image: url({{ asset('uploads/'.$page_home->testimonial_bg) }});">
        <div class="testimonial-bg"></div>
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif