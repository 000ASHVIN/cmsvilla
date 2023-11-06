@extends('layouts.master')

@section('css')
<style>
  .subtitle {
    font-weight: 500 !important;
  }
</style>
@endsection

@section('banner')
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
            <form action="https://sheetdb.io/api/v1/lmmq0z1jmtmeq" method="post" id="sheetdb-form-primary">
              <h2 class="form-header">
                Automate Your Reconciliation Tasks Now!
              </h2>
              <div class="field">
                <div class="control has-icons-left">
                  <input class="input is-medium has-shadow" name="data[Name]" type="text" placeholder="Name" required />
                  <!-- <span class="icon is-small is-left">
                  <i class="sl sl-icon-user"></i>
                </span> -->
                </div>
              </div>

              <div class="field">
                <div class="control has-icons-left">
                  <input class="input is-medium has-shadow" name="data[Company_Name]" placeholder="Company Name"
                    type="text" required />
                  <!-- <span class="icon is-small is-left">
                  <i class="sl sl-icon-ghost"></i>
                </span> -->
                </div>
              </div>

              <div class="field">
                <div class="control has-icons-left">
                  <input placeholder="Email Address" class="input is-medium has-shadow" name="data[Email]" type="email"
                    required />
                  <!-- <span class="icon is-small is-left">
                  <i class="sl sl-icon-envelope-open"></i>
                </span> -->
                </div>
              </div>

              <div class="field">
                <div class="control has-icons-left">
                  <input placeholder="Phone Number" class="input is-medium has-shadow" name="data[Phone]" type="tel"
                    required />
                  <!-- <span class="icon is-small is-left">
                  <i class="sl sl-icon-lock"></i>
                </span> -->
                </div>
              </div>

              <div class="field">
                <div class="control">
                  <button
                    class="button button-cta primary-btn contact-form-btn is-bold is-fullwidth raised primary_form_submit_btn"
                    type="submit">
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
    <path fill="#ffffff" fillOpacity="{1}"
      d="M0,192L120,197.3C240,203,480,213,720,197.3C960,181,1200,139,1320,117.3L1440,96L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z" />
  </svg>
</div>
@endsection

@section('content')


<!-- About -->
@if($page_home->special_status == 'Show')
<div class="section is-medium">

  <div class="container">
    <div class="centered-title mb-30">
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
            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $page_home->special_yt_video }}"
              frameborder="0" allowfullscreen></iframe>
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

<!-- Uses Section -->
<div class="section section-feature-grey is-medium" id="uses">
  <div class="container">
    <div class="centered-title">
      <h2>{{ $page_home->service_title }}</h2>
      <div class="title-divider"></div>
      <!-- <div class="subheading">
          Reconcify bot demonstrating how it can enhance accuracy and
          efficiency across various aspects of business operations
        </div> -->
    </div>

    <div class="content-wrapper">
      <div class="columns services-cards is-vcentered">
        <!-- Card -->
        @foreach($services as $row)
        <div class="column">
          <div class="feature-card card-md hover-inset has-text-centered mb-20 is-card-reveal" style="cursor: default">
            <div class="card-icon">
              <img src="{{ asset('uploads/'.$row->photo) }}" alt="">
            </div>
            <div class="card-title mt-3">
              <a href="{{ url('service/'.$row->slug) }}">
                <h4>{{ $row->name }}</h4>
              </a>
            </div>
            <div class="card-feature-description">
              <span class="">
                {!! nl2br(e($row->short_description)) !!}
              </span>
            </div>
          </div>
        </div>
        @endforeach

        <!-- Card -->

      </div>
    </div>
  </div>
</div>

<!-- Uses Section -->
<div class="section section-feature-grey is-medium" id="financial_reconciliation">
  <div class="container">
    <div class="centered-title" >
      <h2>{{ $page_home->project_title }}</h2>
      <div class="title-divider"></div>
      <!-- <div class="subheading">
          Reconcify bot demonstrating how it can enhance accuracy and
          efficiency across various aspects of business operations
        </div> -->
    </div>

    <div class="content-wrapper">
      <div class="columns services-cards is-vcentered">
        <!-- Card -->
        @foreach($projects as $row)
        <div class="column">
          <div class="feature-card card-md hover-inset has-text-centered mb-20 is-card-reveal" style="cursor: default">
            <div class="card-icon">
              <img src="{{ asset('uploads/'.$row->project_featured_photo) }}" alt="">
            </div>
            <div class="card-title mt-3">
              <a href="{{ url('project/'.$row->project_slug) }}">
                <h4>{{ $row->project_name }}</h4>
              </a>
            </div>
            <div class="card-feature-description">
              <span class="">
                {!! nl2br(e($row->project_content_short)) !!}
              </span>
            </div>
          </div>
        </div>
        @endforeach

        <!-- Card -->

      </div>
    </div>
  </div>
</div>

  <!-- Uses Section -->
  {{-- <div class="section section-feature-grey is-medium">
    <div class="container">
      <div class="centered-title">
        <h2>{{ $page_home->project_title }}</h2>
        <div class="title-divider"></div>
        <!-- <div class="subheading">
          Reconcify bot demonstrating how it can enhance accuracy and
          efficiency across various aspects of business operations
        </div> -->
      </div>

      <div class="content-wrapper">
        <div class="columns services-cards is-vcentered">
          <!-- Card -->
          @foreach($projects as $row)
            <div class="column">
              <div
                class="feature-card card-md hover-inset has-text-centered mb-20 is-card-reveal"
                style="cursor: default"
              >
                <div class="card-icon">
                  <img src="{{ asset('uploads/'.$row->project_featured_photo) }}" alt="">
                </div>
                <div class="card-title mt-3">
                  <a href="{{ url('project/'.$row->project_slug) }}"><h4>{{ $row->project_name }}</h4></a>
                </div>
                <div class="card-feature-description">
                  <span class="">
                    {!! nl2br(e($row->project_content_short)) !!}
                  </span>
                </div>
              </div>
            </div>
          @endforeach
          
          <!-- Card -->
          
        </div>
      </div>
    </div>
  </div> --}}

  <!-- Final CTA section -->
  <div class="section section-feature-grey is-medium">
    <div class="container">
      <div class="centered-title">
        <h2>
          {{ $page_home->financials_title }}
        </h2>
        <div class="title-divider"></div>
      </div>

      <div class="content-wrapper">
        <div class="columns services-cards is-vcentered" style="align-items: flex-start;">
          <!-- Card -->
          @foreach($financials as $row)
          <div class="column">
            <div
              class="feature-card card-md hover-inset has-text-centered mb-20 is-card-reveal"
            >
              <div class="card-icon">
                <img src="{{ asset('uploads/'.$row->project_featured_photo) }}" alt="">
              </div>
              <div class="card-title">
                <a href="{{ url('project/'.$row->project_slug) }}"><h4>{{ $row->project_name }}</h4></a>
              </div>
              <div class="card-feature-description">
                <span class=""
                  > {!! nl2br(e($row->project_content_short)) !!}
                </span>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Learning -->
<div id="learning" class="section is-medium" id="reconciliation">
  <div class="container">
    <!-- Title -->
    <!-- <div class="section-title-wrapper has-text-centered">
        <h2 class="section-title-landing">Reconciliation</h2>
        <h4>We have a dedicated user training section</h4>
      </div> -->

    <div class="centered-title mb-30">
      <h2>Reconciliation</h2>
      <div class="title-divider"></div>
    </div>

    <div class="content-wrapper">
      <div class="columns is-vcentered">
        <!-- Card -->
        @foreach($case_studies as $row)
        <div class="column is-4" style="min-height: 500px">
          <div class="card ressource-card">
            <div class="card-image">
              <div class="card-image-overlay"></div>
              <figure class="image is-4by3 zoomOut">
                <img src="{{ asset('uploads/'.$row->photo) }}" alt=""
                  data-demo-src="assets/img/demo/kit/data-insight.jpeg" />
              </figure>
            </div>
            <div class="card-content">
              <div class="media">
                <div class="media-content">
                  <a class="color-primary is-handwritten" href="{{ route('front.case.study.details', $row->slug ) }}">
                    <h4>{{ $row->name }}</h4>
                  </a>
                  <p class="subtitle is-6 mt-2">
                    {!! nl2br(e($row->short_description)) !!}
                  </p>
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


@include('pages.includes.companies')
@include('pages.includes.testimonial')

<div id="vertical-form-modal-contact" class="modal modal-md">
  <div class="modal-background"></div>
  <form action="https://sheetdb.io/api/v1/lmmq0z1jmtmeq" method="post" id="sheetdb-form">
    <div class="modal-content">
      <div class="flex-card simple-shadow form_container">
        <div class="card-body">
          <h2 class="title has-text-left-aligned mb-40" id="form_head">
            Automate Your Reconciliation Tasks Now!
          </h2>
          <div class="control-material is-accent">
            <input class="material-input" name="data[Name]" type="text" required />
            <span class="material-highlight"></span>
            <span class="bar"></span>
            <label>Name *</label>
          </div>
          <div class="control-material is-accent">
            <input class="material-input" name="data[Company_Name]" type="text" required />
            <span class="material-highlight"></span>
            <span class="bar"></span>
            <label>Company Name *</label>
          </div>
          <div class="control-material is-accent">
            <input class="material-input" name="data[Email]" type="email" required />
            <span class="material-highlight"></span>
            <span class="bar"></span>
            <label> Email Address *</label>
          </div>
          <div class="control-material is-accent">
            <input class="material-input" name="data[Phone]" type="tel" required />
            <span class="material-highlight"></span>
            <span class="bar"></span>
            <label>Phone *</label>
          </div>

          <div class="mt-20" style="
                  display: flex;
                  flex-flow: row wrap;
                  gap: 20px;
                  justify-content: flex-end;
                ">
            <button class="button button-cta btn-align accent-btn raised no-lh" type="submit">
              Submit
            </button>
            <div class="button button-cta btn-align no-lh modal-close is-large is-hidden form_submit_btn"
              aria-label="close">
              Close
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<button class="button button-cta btn-align btn-outlined primary-btn raised modal-trigger navbar-btn"
  data-modal="alert-modal-custom" id="alert-modal-btn" style="display: none;">Open</button>
<div id="alert-modal-custom" class="modal modal-md">
  <div class="modal-background"></div>
  <div class="alert_modal modal-content" style="z-index: 999;">
    <span>Thanks for submitting your details. We shall contact you soon.</span>
    <div class="button button-cta btn-align no-lh modal-close is-large is-hidden form_submit_btn alert_submit_btn"
      aria-label="close">
      Close
    </div>
  </div>
</div>
</div>

@endsection