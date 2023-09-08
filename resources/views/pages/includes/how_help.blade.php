@if($page_industry->how_help_status == 'Show')
<div class="project" style="background-image: url({{ asset('uploads/'.$page_home->project_bg) }});">
    <div class="project-bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading wow fadeInUp">
                    <h2>{{ $page_industry->how_help_title }}</h2>
                    <h3>{{ $page_industry->how_help_subtitle }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="single-section">
                    <div class="featured-photo">
                        <img src="{{ asset('uploads/'.$page_industry->how_help_bg) }}" style="margin-top: 10%">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="footer-item footer-contact">
                    @foreach($how_helps as $row)
                        <div class="image-heading-container mb-3">
                            <img src="{{ asset('uploads/'.$row->photo) }}" width="10%" style="margin-right: 30px;">
                            <div>
                                <h2 class="font-size mb-1">{{ $row->name }}</h2>
                                <p class="font-color">
                                    {!! $row->description !!}
                                </p>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endif