{{-- @php
    $page_home = \DB::table('page_home_items')->where('id',1)->first();
@endphp
<div class="section is-medium">
    <div class="container">
  
      <div class="centered-title mb-30">
        <h2>{{ $page_home->testimonial_title }}</h2>
        <div class="title-divider"></div>
      </div>
      <div class="content-wrapper">
        <div class="columns">
          <div class="column"></div>
  
          <div class="column is-6">
            <!-- Carousel wrapper -->
            <div class="testimonials is-wavy">
              @foreach($testimonials as $row)
              <div class="testimonial-item">
                <div class="flex-card card-overflow raised">
                  <div class="testimonial-avatar">
                    <img src="{{ asset('uploads/'.$row->photo) }}" alt="">
                  </div>
                  <div class="testimonial-name">
                    <h3>{{ $row->name }}</h3>
                    <span>{{ $row->designation }}</span>
                  </div>
                  <div class="testimonial-content">
                    <p>
                      {!! nl2br(e($row->comment)) !!}
                    </p>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
  
          <div class="column"></div>
        </div>
      </div>
    </div>
  </div> --}}