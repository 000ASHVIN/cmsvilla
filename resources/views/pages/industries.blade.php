@extends('layouts.master')

@section('banner')
<div class="contact-banner">
    <div class="container py-20">
       <h1 class="clean-title is-1">
         {{ $banner->name ?? '' }}
        </h1>
    </div>
</div>
@endsection

@section('content')
<!-- Benefits section -->
<div class="section is-medium">
    <div id="start" class="container">
        <!-- Title -->
        <!-- <div class="section-title-wrapper has-text-centered">
        <h2 class="section-title-landing">
          Our team is made of recognized business process experts from all
          over the world
        </h2>
      </div> -->

        <div class="centered-title mb-30">
            <h2>
                Our team is made of recognized business process experts from all over the world
            </h2>
            <div class="title-divider"></div>
        </div>

        <div class="content-wrapper">
            <!-- <div class="columns">

          <div class="column is-4">
            <a href="industrialusecaes.html">
              <div class="flex-card is-feature padding-30">
     
                <div class="icon-container is-first is-icon-reveal">
                  <img
                    src="assets/img/graphics/icons/cash-azur.svg"
                    data-base-url="assets/img/graphics/icons/time"
                    data-extension=".svg"
                    alt=""
                  />
                </div>
        
                <div class="content-container has-text-centered">
                  <h3 style="color: black; text-decoration: none">
                    Restaurant Chains
                  </h3>
                  <p>
                    Reconcify simplifies the process of managing orders,
                    payments, and inventory for restaurant chains, reducing
                    errors, saving time, and improving financial accurancy
                    across multiple locations. Minimize wastage and improve
                    profit margins.
                  </p>
                </div>
              </div>
            </a>
          </div>
  
          <div class="column is-4">
            <a href="industrialusecaes.html">
              <div class="flex-card is-feature padding-30">

                <div class="icon-container is-first is-icon-reveal">
                  <img
                    src="assets/img/graphics/icons/bank-azur.svg"
                    data-base-url="assets/img/graphics/icons/time"
                    data-extension=".svg"
                    alt=""
                  />
                </div>

                <div class="content-container has-text-centered">
                  <h3 style="color: black; text-decoration: none">
                    Ecommerce and D2C
                  </h3>
                  <p>
                    We have successfully deployed Reconcify for different use
                    cases across sectors, more particularly those sectors
                    which are characterized by massive transaction volumes,
                    especially in the online sales and digital payments space.
                    Reconcify automate all E-commerce reconciliation which
                    ensure accurate financial records and efficient operations
                    and enhancing customer experiences.
                  </p>
                </div>
              </div>
            </a>
          </div>

          <div class="column is-4">
            <a href="industrialusecaes.html">
              <div class="flex-card is-feature padding-30">
     
                <div class="icon-container is-first is-icon-reveal">
                  <img
                    src="assets/img/graphics/icons/credit-card-azur.svg"
                    data-base-url="assets/img/graphics/icons/time"
                    data-extension=".svg"
                    alt=""
                  />
                </div>
             
                <div class="content-container has-text-centered">
                  <h3 style="color: black; text-decoration: none">
                    Financial Products intermediaries
                  </h3>
                  <p>
                    Reconcify serves as a valuable tool to improve accuracy,
                    efficiency, and transparency in the financial product
                    intermediaries. Ultimately leading to improved customer
                    satisfaction.
                  </p>
                </div>
              </div>
            </a>
          </div>
        </div> -->
            <div class="content-wrapper">
                <div class="columns services-cards is-vcentered" style="align-items: flex-start">
                    <!-- Card -->
                    @foreach ($industries as $industry)
                      <div class="column">
                        <div class="feature-card card-md hover-inset has-text-centered mb-20 is-card-reveal">
                            <div class="card-icon">
                                <i class="im im-icon-Two-Windows"></i>
                            </div>
                            <div class="card-title">
                                <a href="{{ route('front.industry.details', $industry->slug) }}"><h4>{{ $industry->name }}</h4></a>
                            </div>
                            <div class="card-feature-description">
                                <span class="">
                                   {{ $industry->seo_meta_description }}
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
@include('pages.includes.companies')
@include('pages.includes.testimonial')
@endsection