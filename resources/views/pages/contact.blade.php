@extends('layouts.master')
@section('banner')
<div class="contact-banner">
    <div class="container">
       <center>
        <h1 class="clean-title is-1 mt-5 mb-5" style="color: white">
          {{ $contact->name }}
      </h1>
       </center>
    </div>
</div>
@endsection
@section('content')
  <div class="form-wrapper">
    <div id="main-hero" class="contact-page-container">
      <div class="container has-text-centered">
        <div class="columns is-vcentered">
          <div
            class="column is-6 is-offset-3 has-text-centered is-subheader-caption"
          >
            <h2 class="">
              <p class="subtitle">{!! $contact->detail !!}</p>
            </h2>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="container">
    <!--Contact Page 1-->
    <div class="contact-page-1">
     <div class="columns has-text-centered pt-5 pb-5">
        <div class="column is-hidden-mobile"></div>
        <!-- Icon box -->
        @if($contact->contact_address!=null)
        <div class="column is-3">
          <div class="shadow-icon-box rounded">
            <span><i class="fa fa-map fa-lg"></i></span>
          </div>
          <div class="shadow-title dark-text">{{ ADDRESS }}</div>
          <div class="description shadow-description">
            {!! nl2br(e($contact->contact_address)) !!}
          </div>
        </div>
        @endif
        <!-- Icon box -->
        @if($contact->contact_phone!=null)
        <div class="column is-3">
          <div class="shadow-icon-box rounded">
            <span><i class="fa fa-envelope fa-lg"></i></span>
          </div>
          <div class="shadow-title dark-text">{{ PHONE }}</div>
          <div class="description shadow-description">
            <a href="mailto:info@reconcify.com"> {!! nl2br(e($contact->contact_phone)) !!}</a>
          </div>
        </div>
        @endif
        <!-- Icon box -->
        @if($contact->contact_email!=null)
        <div class="column is-3">
          <div class="shadow-icon-box rounded">
            <span><i class="fa fa-phone-square fa-lg"></i></span>
          </div>
          <div class="shadow-title dark-text">{{ EMAIL_ADDRESS }}</div>
          <div class="description shadow-description">{!! nl2br(e($contact->contact_email)) !!}</div>
        </div>
        @endif
        <div class="column is-hidden-mobile"></div>
      </div>
    </div>
  </div>
    {{-- <div class="page-banner" style="background-image: url({{ asset('uploads/'.$g_setting->banner_contact) }})">
        <div class="bg-page"></div>
        <div class="text">
            <h1>{{ $contact->name }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $contact->name }}</li>
                </ol>
            </nav>
        </div>
    </div> --}}

    <div class="page-content">
        <div class="container">
            {{-- <div class="row">
                <div class="col-md-12">
                    {!! $contact->detail !!}
                </div>
            </div> --}}
            <form action="{{ route('front.contact_form') }}" method="post">
            @csrf
            <div class="hero-form">
              <div class="flex-card">
                @foreach ($dynamic_pages as $item)
                <h2 class="form-header">
                  {{ $item->dynamic_page_name }}
                </h2>
                @endforeach
               
                <div class="field">
                  <div class="control has-icons-left">
                    <input
                      class="input is-medium has-shadow"
                      name="visitor_name"
                      type="text"
                      placeholder="Visitor Name"
                    />
                  </div>
                </div>
      
                <div class="field">
                  <div class="control has-icons-left">
                    <input
                      class="input is-medium has-shadow"
                      name="visitor_email"
                      type="email"
                      required
                      placeholder="Visitor Email "
                    />
                  </div>
                </div>
      
                <div class="field">
                  <div class="control has-icons-left">
                    <input
                      class="input is-medium has-shadow"
                      name="visitor_phone"
                      type="text"
                      placeholder="Visitor Phone"
                    />
                  </div>
                </div>
      
                <div class="field">
                  <div class="control has-icons-left">
                    <input
                      class="input is-medium has-shadow"
                      name="visitor_message"
                      type="text"
                      placeholder="Visitor Message"
                    />
                  </div>
                </div>
                @if($g_setting->google_recaptcha_status == 'Show')
                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="{{ $g_setting->google_recaptcha_site_key }}"></div>
                        </div>
                        @endif
      
                <div class="field">
                  <div class="control" style="text-align: right">
                    <button
                      class="button button-cta primary-btn contact-form-btn is-bold raised primary_form_submit_btn"
                      type="submit"
                    >
                    {{ SEND_MESSAGE }}
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>
            {{-- <div class="row contact-form">
                <div class="col-md-12">
                    <h4 class="contact-form-title mt_50 mb_20">{{ CONTACT_FORM }}</h4>
                    <form action="{{ route('front.contact_form') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ NAME }} ({{ REQUIRED }})</label>
                                    <input type="text" class="form-control" name="visitor_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ EMAIL_ADDRESS }} ({{ REQUIRED }})</label>
                                    <input type="email" class="form-control" name="visitor_email">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ PHONE }}</label>
                                    <input type="text" class="form-control" name="visitor_phone">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ MESSAGE }} ({{ REQUIRED }})</label>
                            <textarea name="visitor_message" class="form-control h-200" cols="30" rows="10"></textarea>
                        </div>

                        @if($g_setting->google_recaptcha_status == 'Show')
                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="{{ $g_setting->google_recaptcha_site_key }}"></div>
                        </div>
                        @endif

                        <button type="submit" class="btn btn-primary mt_10">{{ SEND_MESSAGE }}</button>
                    </form>
                </div>
            </div> --}}
            <div id="vertical-form-modal-contact" class="modal modal-md">
                <div class="modal-background"></div>
                <form action="{{ route('front.contact_form') }}" method="post">
                    @csrf
                  <div class="modal-content">
                    <div class="flex-card simple-shadow form_container">
                      <div class="card-body">
                        <h2 class="title has-text-left-aligned mb-40" id="form_head">
                          Automate Your Reconciliation Tasks Now!
                        </h2>
                        <div class="control-material is-accent">
                          <input
                            class="material-input"
                            name="visitor_name"
                            type="text"
                            required
                          />
                          <span class="material-highlight"></span>
                          <span class="bar"></span>
                          <label>Visitor Name *</label>
                        </div>
                        <div class="control-material is-accent">
                          <input
                            class="material-input"
                            name="visitor_email"
                            type="email"
                            required
                          />
                          <span class="material-highlight"></span>
                          <span class="bar"></span>
                          <label>Visitor Email *</label>
                        </div>
                        <div class="control-material is-accent">
                          <input
                            class="material-input"
                            name="visitor_phone"
                            type="email"
                            required
                          />
                          <span class="material-highlight"></span>
                          <span class="bar"></span>
                          <label>Visitor Phone *</label>
                        </div>
                        <div class="control-material is-accent">
                            <input
                              class="material-input"
                              name="visitor_message"
                              type="text"
                              required
                            />
                            <span class="material-highlight"></span>
                            <span class="bar"></span>
                            <label>visitor Message *</label>
                          </div>
                        
                        @if($g_setting->google_recaptcha_status == 'Show')
                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="{{ $g_setting->google_recaptcha_site_key }}"></div>
                        </div>
                        @endif
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
                          {{ SEND_MESSAGE }}
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
        </div>
    </div>


@endsection
