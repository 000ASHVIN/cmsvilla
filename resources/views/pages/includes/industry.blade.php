@if($page_industry->industry_status == 'Show')
    <div class="feature">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading wow fadeInUp">
                        <h6 class="colour">{{ $page_industry->industry_title }}</h6>
                        <div>
                            <h2>{{ $page_industry->industry_subtitle }}</h2>
                            <h3>
                                {!! nl2br(e($page_industry->industry_content)) !!}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($industry_items as $row)
                <div class="col-md-4">
                    <div class="feature-item wow fadeInUp">
                        <div class="icon">
                            <img src="{{ asset('uploads/'.$row->photo) }}" alt="">
                        </div>
                        <h4>{{ $row->name }}</h4>
                        <p>
                            {!! nl2br(e($row->description)) !!}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endif