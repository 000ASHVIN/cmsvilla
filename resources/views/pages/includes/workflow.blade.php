@if($page_industry->workflow_status == 'Show')
    <div class="feature">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading wow fadeInUp">
                        <h6 class="colour">{{ $page_industry->workflow_title }}</h6>
                        <div>
                            <h2>{{ $page_industry->workflow_subtitle }}</h2>
                            <h3>
                                {!! nl2br(e($page_industry->workflow_content)) !!}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($why_choose_items as $row)
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