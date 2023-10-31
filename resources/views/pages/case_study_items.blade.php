@extends('layouts.master')
@section('banner')
<div class="contact-banner">
    <div class="container">
       <center>
        <h1 class="clean-title is-1 mt-5 mb-5" style="color: white">
          {{-- {{ $contact->name }} --}}Analyze, rate and score corporate suppliers at scale.
      </h1>
       </center>
    </div>
</div>
@endsection
@section('content')
<div id="use-cases" class="section mb-6" style="margin-top: 0">
  <div class="container">
      <div class="content-wrapper tabbed-features">
          <div class="columns is-vcentered">
            @foreach ($case_studies_items as $key => $row)
                <div class="column">
                    <div class="">
                        <div class="section is-medium mt-0 pb-0">
                            <div class="container">
                                <div class="columns is-vcentered" style="align-items: flex-start">
                                    @if (intval($key) % 2 == 0)
                                        <div class="column is-6 is-relative is-centered-portrait">
                                            <div class="Reconcify-player-container is-square reversed-play mob-pad-0">
                                                <img src="{{ asset('uploads/'.$row->photo) }}" alt="" width="100%">
                                            </div>
                                        </div>
                                    @endif
                                    <div class="column is-6">
                                        <div class="title">
                                            <h2 class="title" style="margin-bottom: 0">{{ $row->name }}</h2>
                                            <div class="title-divider"></div>
                                        </div>
                                        <p class="side-paragraph is-size-6 mb-10">
                                            {!! $row->description !!}
                                        </p>
                                        <p class="side-paragraph is-size-6 mb-20">
                                            {{ $row->short_description }}
                                        </p>
                                        <div class="buttons">
                                            <button data-modal="vertical-form-modal-contact"
                                                    class="button button-cta is-bold btn-align primary-btn raised modal-trigger">
                                                Get in Touch
                                            </button>
                                        </div>
                                    </div>
                                    @if (intval($key) % 2 != 0)
                                        <div class="column is-6 is-relative is-centered-portrait">
                                            <div class="Reconcify-player-container is-square reversed-play mob-pad-0">
                                                <img src="{{ asset('uploads/'.$row->photo) }}" alt="" width="100%">
                                            </div>
                                        </div>
                                    @endif
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

        <div id="vertical-form-modal-contact" class="modal modal-md" >
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
                   Get In Touch
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
                      class="button button-cta btn-align modal-close no-lh is-large is-hidden form_submit_btn"
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
        @include('pages.includes.testimonial')
@endsection
