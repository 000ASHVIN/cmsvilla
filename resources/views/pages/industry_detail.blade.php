@extends('layouts.master')

@section('banner')
<div class="contact-banner">
    <div class="container py-20">
       <h1 class="clean-title is-1">
         {{ $industry->name ?? '' }}
        </h1>
    </div>
</div>
@endsection

@section('content')
<div class="section is-medium mt-0 mb-30 pb-0">
  <!-- <div style="margin: 2rem 0" class="centered-title">
    <h2>Need of Reconcify</h2>
  </div> -->
  @foreach ($industry->howHelp as $key => $row)
    @if($key % 2 == 0)
      <div class="container mt-30">
        <div class="columns is-vcentered" style="align-items: flex-start">
          <div class="column is-6 is-relative is-centered-portrait">
            <!-- Square video -->
            <div
              class="Reconcify-player-container is-square reversed-play mob-pad-0"
            >
              <img src="{{ asset('uploads/'.$row->photo) }}" />
            </div>
          </div>
          <div class="column is-6">
            <div class="side-title mb-10">
              <!-- <h3 class="title" style="margin-bottom: 0">Our Story</h3>
              <div class="section-title-wrapper">
                <h4>Lorem ipsum dolor sit amet.</h4>
              </div> -->
              <div class="title">
                <h2 class="title" style="margin-bottom: 0">{{ $row->name }}</h2>
                <div class="title-divider"></div>
              </div>
            </div>
            {!! $row->description !!}
            <div class="buttons">
              <button
                data-modal="vertical-form-modal-contact"
                class="button button-cta is-bold btn-align primary-btn raised modal-trigger"
              >
                Get in Touch
              </button>
            </div>
          </div>
        </div>
      </div>
    @else
      <div class="container mt-30">
        <div class="columns is-vcentered" style="align-items: flex-start">
          <div class="column is-6">
            <div class="side-title mb-10">
              <!-- <h3 class="title" style="margin-bottom: 0">Our Story</h3>
              <div class="section-title-wrapper">
                <h4>Lorem ipsum dolor sit amet.</h4>
              </div> -->
              <div class="title">
                <h2 class="title" style="margin-bottom: 0">{{ $row->name }}</h2>
                <div class="title-divider"></div>
              </div>
            </div>
            {!! $row->description !!}
            <div class="buttons">
              <button
                data-modal="vertical-form-modal-contact"
                class="button button-cta is-bold btn-align primary-btn raised modal-trigger"
              >
                Get in Touch
              </button>
            </div>
          </div>
          <div class="column is-6 is-relative is-centered-portrait">
            <!-- Square video -->
            <div
              class="Reconcify-player-container is-square reversed-play mob-pad-0"
            >
              <img src="{{ asset('uploads/'.$row->photo) }}" />
            </div>
          </div>
        </div>
      </div>
    @endif
  @endforeach
</div>

<!-- Contact Form -->
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
            Get in Touch
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
<div id="learning" class="section is-medium">
  <div class="container">
    <div class="centered-title">
      <h2>Case Studies ?</h2>
      <div class="title-divider"></div>
    </div>
    <div class="content-wrapper">
      <div class="columns is-vcentered">
        @php $counter = 0 @endphp
        @foreach($case_studies as $row)
          @if ($counter < 3)
            <div class="column is-4">
              <div class="card ressource-card">
                <div class="card-image">
                  <div class="card-image-overlay primary"></div>
                  <figure class="image is-4by3 zoomOut">
                    <img class="item-featured-image" src="{{ asset('uploads/'.$row->photo) }}" alt="" width="100" />
                  </figure>
                </div>
                <div class="card-content">
                  <div class="media">
                    <div class="media-content">
                      <a href="{{ route('front.case.study.details', $row->slug ) }}">
                        {{ $row->name }}
                      </a>
                      <p class="subtitle is-6"><b>{{ $row->short_description }}</b></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @php $counter++ @endphp
          @endif
        @endforeach
      </div>
    </div>
  </div>
</div>

@include('pages.includes.companies')
@include('pages.includes.testimonial')

<button
  class="button button-cta btn-align btn-outlined primary-btn raised modal-trigger navbar-btn"
  data-modal="alert-modal-custom"
  id="alert-modal-btn"
  style="display: none"
>
  Open
</button>
<div id="alert-modal-custom" class="modal modal-md">
  <div class="modal-background"></div>
  <div class="alert_modal modal-content" style="z-index: 999">
    <span
      >Thanks for submitting your details. We shall contact you soon.</span
    >
    <div
      class="button button-cta btn-align no-lh modal-close is-large is-hidden form_submit_btn alert_submit_btn"
      aria-label="close"
    >
      Close
    </div>
  </div>
</div>
@endsection