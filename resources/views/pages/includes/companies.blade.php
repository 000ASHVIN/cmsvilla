@if($page_industry->trusted_company_status == 'Show')
    <div class="feature">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading wow fadeInUp">
                        <h3 class="companies_head">{{ $page_industry->trusted_company_title }}</h3>
                        <h2>{{ $page_industry->trusted_company_subtitle }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="companies-carousel owl-carousel">
                        @foreach($companies as $row)
                            @if ($row->located_page != null)
                                @if ($row->located_page == 'industry')
                                    <div class="companies-item wow fadeInUp">
                                        <div class="photo">
                                            <a href="{{ $row->slug }}"><img src="{{ asset('uploads/'.$row->photo) }}" alt=""></a>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <div class="companies-item wow fadeInUp">
                                    <div class="photo">
                                        <a href="{{ $row->slug }}"><img src="{{ asset('uploads/'.$row->photo) }}" alt=""></a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif