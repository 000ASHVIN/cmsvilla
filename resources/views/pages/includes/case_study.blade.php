@if($page_industry->case_study_status == 'Show')
    <div class="service">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading wow fadeInUp">
                        <h2>{{ $page_industry->case_study_title }}</h2>
                        <h3>{{ $page_industry->case_study_subtitle }}</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="service-carousel owl-carousel">
                        @foreach($case_studies as $row)
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