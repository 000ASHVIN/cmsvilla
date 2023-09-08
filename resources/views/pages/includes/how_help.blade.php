@if($page_home->trusted_company_status == 'Show')
        <div class="feature">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading wow fadeInUp">
                            <h3 class="companies_head">{{ $page_home->trusted_company_title }}</h3>
                            <h2>{{ $page_home->trusted_company_subtitle }}</h2>
                            <h3>Paresh Rawal is an Indian actor, comedian, film producer and politician known for his works primarily in Hindi films.known for his works primarily in Hindi films </h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            @foreach($companies as $row)
                                <div class="">
                                    <div class="photo">
                                        <a href="{{ $row->slug }}"><img src="{{ asset('uploads/'.$row->photo) }}" alt=""></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="single-section">
                            <div class="featured-photo">
                                <img src="{{ asset('uploads/project-featured-photo-9.png') }}" style="margin-top: 10%">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-item footer-contact">
                            <div class="image-heading-container ">
                                <img src="{{ asset('uploads/fish.png') }}" width="10%">
                                <div>
                                    <p class="font-size">User Interface</p>
                                    <p class="font-color">Rajesh Rawal is an Indian actor and comedian Rajesh Rawal is an Indian actor and comedian.</p>
                                </div>
                            </div>
                            <div class="image-heading-container">
                                <img src="{{ asset('uploads/fish.png') }}" width="10%">
                                <div>
                                    <h1 class="font-size">User Interface</h1>
                                    <p class="font-color">Rajesh Rawal is an Indian actor and comedian Rajesh Rawal is an Indian actor and comedian.</p>
                                </div>
                            </div>
                            <div class="image-heading-container">
                                <img src="{{ asset('uploads/fish.png') }}" width="10%">
                                <div>
                                    <h1 class="font-size">User Interface</h1>
                                    <p class="font-color">Rajesh Rawal is an Indian actor and comedian Rajesh Rawal is an Indian actor and comedian.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif