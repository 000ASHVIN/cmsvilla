@extends('layouts.master')
@section('content')
<body class="is-theme-core">
    <div class="pageloader"></div>
    <div class="infraloader is-active"></div>
    <!-- Hero and nav -->
    <div class="hero is-theme-primary is-slant" data-page-theme="azur">
     
      <!-- Hero image -->
      <div id="main-hero" class="hero-body">
        @foreach($sliders as $row)
        <div class="container">
          <!-- <div class="contact-banner"> -->
          <div class="columns is-vcentered">
            <div class="column is-5 caption-column">
              <h1 class="clean-title light-text">
                {{ $row->slider_heading }}
              </h1>
              <div class="subtitle is-5 mt-5 banner-subtext">
                {!! nl2br(e($row->slider_text)) !!}
              </div>
            </div>
            <div class="column is-8 banner-form-container hero_form" style="flex: none">
              <!--img class="clean-hero-mockup has-light-shadow" src="assets/img/graphics/apps/app-1-core.png"
                            data-base-url="assets/img/graphics/apps/app-1" data-extension=".png" alt=""-->
              <div class="hero-form">
                <div class="flex-card">
                  <form
                    action="https://sheetdb.io/api/v1/lmmq0z1jmtmeq"
                    method="post"
                    id="sheetdb-form-primary"
                  >
                    <h2 class="form-header">
                      Automate Your Reconciliation Tasks Now!
                    </h2>
                    <div class="field">
                      <div class="control has-icons-left">
                        <input
                          class="input is-medium has-shadow"
                          name="data[Name]"
                          type="text"
                          placeholder="Name"
                          required
                        />
                        <!-- <span class="icon is-small is-left">
                        <i class="sl sl-icon-user"></i>
                      </span> -->
                      </div>
                    </div>

                    <div class="field">
                      <div class="control has-icons-left">
                        <input
                          class="input is-medium has-shadow"
                          name="data[Company_Name]"
                          placeholder="Company Name"
                          type="text"
                          required
                        />
                        <!-- <span class="icon is-small is-left">
                        <i class="sl sl-icon-ghost"></i>
                      </span> -->
                      </div>
                    </div>

                    <div class="field">
                      <div class="control has-icons-left">
                        <input
                          placeholder="Email Address"
                          class="input is-medium has-shadow"
                          name="data[Email]"
                          type="email"
                          required
                        />
                        <!-- <span class="icon is-small is-left">
                        <i class="sl sl-icon-envelope-open"></i>
                      </span> -->
                      </div>
                    </div>

                    <div class="field">
                      <div class="control has-icons-left">
                        <input
                          placeholder="Phone Number"
                          class="input is-medium has-shadow"
                          name="data[Phone]"
                          type="tel"
                          required
                        />
                        <!-- <span class="icon is-small is-left">
                        <i class="sl sl-icon-lock"></i>
                      </span> -->
                      </div>
                    </div>

                    <div class="field">
                      <div class="control">
                        <button
                          class="button button-cta primary-btn contact-form-btn is-bold is-fullwidth raised primary_form_submit_btn"
                          type="submit"
                        >
                          Submit
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- </div> -->
          </div>
        </div>
        @endforeach
      </div>
      <div class="wave-shape-bottom">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 220">
          <path
            fill="#ffffff"
            fillOpacity="{1}"
            d="M0,192L120,197.3C240,203,480,213,720,197.3C960,181,1200,139,1320,117.3L1440,96L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"
          />
        </svg>
      </div>
    </div>

    <!-- About -->
    @if($page_home->special_status == 'Show')
     <div class="section is-medium">
      
      <div class="container">
        <div class="centered-title mb-30" >
            <h2>{{ $page_home->special_title }}</h2>
            <div class="title-divider"></div>
          </div>
        <div class="columns is-vcentered">
          <div class="column is-6 is-relative is-centered-portrait">
             <div class="column is-6 is-relative is-centered-portrait">
                <div class="Reconcify-player-container is-square reversed-play">
                    <div class="custom-video-poster">
                        <!-- Custom poster image here -->
                        <img src="{{ asset('uploads/blog-6') }}" alt="Custom Poster Image">
                    </div>
                    <iframe
                        width="560"
                        height="315"
                        src="https://www.youtube.com/embed/{{ $page_home->special_yt_video }}"
                        frameborder="0"
                        allowfullscreen
                    ></iframe>
                </div>
            </div>
        </div>
            <div class="column is-6">
                <p class="side-paragraph is-size-6 mb-10" style="display: flex">
                    {!! nl2br(e($page_home->special_content)) !!}
                    
                </p>
            </div>
        </div>
      </div>
    </div>
  @endif

    @if($page_home->service_status == 'Show')
    <div id="learning" class="section is-medium">
      <div class="container">
         <div class="centered-title mb-30">
            <h2>{{ $page_home->service_title }}</h2>
            <h3>{{ $page_home->service_subtitle }}</h3>
          <div class="title-divider"></div>
        </div>

        <div class="content-wrapper">
          <div class="columns is-vcentered">
            @foreach($services as $row)
                <div class="column is-4" style="min-height: 500px">
                    <div class="card ressource-card">
                        <div class="card-image">
                        <div class="card-image-overlay primary"></div>
                        <figure class="image is-4by3 zoomOut">
                            <a href="{{ url('service/'.$row->slug) }}"><img src="{{ asset('uploads/'.$row->photo) }}" alt=""></a>
                        </figure>
                        </div>
                        <div class="card-content">
                        <div class="media">
                            <div class="media-content">
                                <a href="{{ url('service/'.$row->slug) }}">{{ $row->name }}</a>
                            <p class="subtitle is-6 mt-2">
                                {!! nl2br(e($row->short_description)) !!}
                            </p>
                            <div class="read-more">
                                <a href="{{ url('service/'.$row->slug) }}">{{ READ_MORE }}</a>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    @endif
    @if($page_home->service_status == 'Show')
    <div id="learning" class="section is-medium">
      <div class="container">
         <div class="centered-title mb-30">
            <h2>{{ $page_home->case_study_title }}</h2>
            <h3>{{ $page_home->case_study_subtitle }}</h3>
          <div class="title-divider"></div>
        </div>
    </div>
    </div>
    @endif
    @if($page_home->service_status == 'Show')
    <div class="centered-title mb-30" >
        <h3 class="companies_head">{{ $page_home->trusted_company_title }}</h3>
                    <h2>{{ $page_home->trusted_company_subtitle }}</h2>

      
      </div>
      @endif
    <!-- Testimonials section -->
    @if($page_home->testimonial_status == 'Show')
    <div class="section is-medium">
      <div class="container">

        <div class="centered-title mb-30">
            <h2>{{ $page_home->testimonial_title }}</h2>
            <h3>{{ $page_home->testimonial_subtitle }}</h3>
          <div class="title-divider"></div>
        </div>
        <div class="content-wrapper">
            <div class="columns">
              <div class="column"></div>
  
              <div class="column is-6">
                <!-- Carousel wrapper -->
                <div class="testimonials is-wavy">
                     @foreach($testimonials as $row)
                        <?php 
                            $data = json_decode($row->located_page);
                        ?>
                        @if ($data != null)
                            @if(in_array('home',$data))
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
                            @endif
                        @endif
                    @endforeach
                </div>
              </div>
  
              <div class="column"></div>
            </div>
          </div>
        {{-- <div class="content-wrapper">
          <div class="columns">
            <div class="column"></div>

            <div class="column is-6">
              <!-- Carousel wrapper -->
              <div class="testimonials is-wavy">
                <!-- Testimonial item -->
                <div class="testimonial-item">
                    
                </div>
              </div>
            </div>

            <div class="column"></div>
          </div>
        </div> --}}
      </div>
    </div>
    @endif

    <div id="vertical-form-modal-contact" class="modal modal-md">
      <div class="modal-background"></div>
      <form
        action="https://sheetdb.io/api/v1/lmmq0z1jmtmeq"
        method="post"
        id="sheetdb-form"
      >
        <div class="modal-content">
          <div class="flex-card simple-shadow form_container">
            <div class="card-body">
              <h2 class="title has-text-left-aligned mb-40" id="form_head">
                Automate Your Reconciliation Tasks Now!
              </h2>
              <div class="control-material is-accent">
                <input
                  class="material-input"
                  name="data[Name]"
                  type="text"
                  required
                />
                <span class="material-highlight"></span>
                <span class="bar"></span>
                <label>Name *</label>
              </div>
              <div class="control-material is-accent">
                <input
                  class="material-input"
                  name="data[Company_Name]"
                  type="text"
                  required
                />
                <span class="material-highlight"></span>
                <span class="bar"></span>
                <label>Company Name *</label>
              </div>
              <div class="control-material is-accent">
                <input
                  class="material-input"
                  name="data[Email]"
                  type="email"
                  required
                />
                <span class="material-highlight"></span>
                <span class="bar"></span>
                <label> Email Address *</label>
              </div>
              <div class="control-material is-accent">
                <input
                  class="material-input"
                  name="data[Phone]"
                  type="tel"
                  required
                />
                <span class="material-highlight"></span>
                <span class="bar"></span>
                <label>Phone *</label>
              </div>

              <div
                class="mt-20"
                style="
                  display: flex;
                  flex-flow: row wrap;
                  gap: 20px;
                  justify-content: flex-end;
                "
              >
                <button
                  class="button button-cta btn-align accent-btn raised no-lh"
                  type="submit"
                >
                  Submit
                </button>
                <div
                  class="button button-cta btn-align no-lh modal-close is-large is-hidden form_submit_btn"
                  aria-label="close"
                >
                  Close
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <button  class="button button-cta btn-align btn-outlined primary-btn raised modal-trigger navbar-btn"
    data-modal="alert-modal-custom" id="alert-modal-btn" style="display: none;">Open</button>
    <div id="alert-modal-custom" class="modal modal-md">
      <div class="modal-background" ></div>
     <div class="alert_modal modal-content" style="z-index: 999;">
        <span>Thanks for submitting your details. We shall contact you soon.</span>
        <div
            class="button button-cta btn-align no-lh modal-close is-large is-hidden form_submit_btn alert_submit_btn"
            aria-label="close"
        >
            Close
        </div>
     </div>
    </div>
  </div>
    
  </body>
@endsection