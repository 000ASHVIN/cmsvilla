<!DOCTYPE html>
<html lang="en">

<head>
  {{-- @php
  $page = 'home'; // Change this to the current page or get it dynamically
  
  if ($page == 'home') {
      $seo = \DB::table('seos')->where('page', 'home')->first();
  } elseif ($page == 'industry') {
      $seo = \DB::table('seos')->where('page', 'industry')->first();
  } elseif ($page == 'case_study') {
      $seo = \DB::table('seos')->where('page', 'case_study')->first();
  } else {
      $seo = null;
  }
@endphp --}}

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />

@if (isset($seo) && $seo)
    @if (isset($seo->meta_title))
        <title>{{ $seo->meta_title }}</title>
    @else
        <title>Reconify :: HomePage</title>
    @endif

    <meta name="description" content="{{ $seo->meta_description }}" >
    <meta property="image" content="{{ asset('storage/' . $seo->meta_image) }}">
    <meta name="keywords" content="{{ $seo->key_words }}">
    <meta name="robots" content="index, follow" value="{{ $seo->meta_robots }}">

    <meta property="og:title" content="{{ $seo->facebook_title }}">
    <meta property="og:description" content="{{ $seo->facebook_description }}">
    <meta property="og:image" content="{{ asset('storage/' . $seo->facebook_image) }}">

    <meta name="twitter:title" content="{{ $seo->twitter_title }}">
    <meta name="twitter:description" content="{{ $seo->twitter_description }}">
    <meta name="twitter:image" src="{{ asset('storage/' . $seo->twitter_image) }}">

@else
    <title>Reconify :: HomePage</title>
@endif

 
  <link rel="icon" type="image/png" href="/assets/img/favicon.png" />

  <!--Core CSS -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
  <link href="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css" rel="stylesheet" />
  <link rel="stylesheet" href="/assets/css/font-awesome.min.css" />
  <link rel="stylesheet" href="/assets/css/app.css" />
  <link id="theme-sheet" rel="stylesheet" href="/assets/css/core.css" />
  <link rel="stylesheet" href="/assets/css/contact.css" />
  <link rel="stylesheet" href="/assets/css/custom.css" />
  <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->


  @yield('css')
</head>

<body class="is-theme-core">
  <div class="pageloader"></div>
  <div class="infraloader is-active"></div>
  <!-- Hero and nav -->
  <div class="hero is-theme-primary is-slant" data-page-theme="azur">
    <nav class="navbar navbar-wrapper navbar-fade navbar-light navbar-faded">
      <div class="container">
        <!-- Brand -->
        <div class="navbar-brand">
          <a class="navbar-item navbar-logo" href="/">
            <img class="light-logo" src="/assets/img/logos/reconify.png" alt="" />
            <img class="dark-logo switcher-logo" src="/assets/img/logos/reconify.png" alt="" />
          </a>

          <!-- Responsive toggle -->
          <div class="custom-burger" data-target="">
            <a id="" class="responsive-btn" href="javascript:void(0);">
              <span class="menu-toggle">
                <span class="icon-box-toggle">
                  <span class="rotate">
                    <i class="icon-line-top"></i>
                    <i class="icon-line-center"></i>
                    <i class="icon-line-bottom"></i>
                  </span>
                </span>
              </span>
            </a>
          </div>
          <!-- /Responsive toggle -->
        </div>

        <!-- Navbar menu -->
        @php
          $industries_menu = \DB::table('industry')->get();
      @endphp
        <div class="navbar-menu">
          <!-- Navbar Start -->
          <div class="navbar-start">
            <!-- <a class="navbar-item is-slide" href="./index.html"> Home </a> -->
            <!-- Navbar item -->
            <a class="navbar-item is-slide ismobile-nav" href="/industries">
              Industries</a>
            <div class="dropdown">
              <a class="navbar-item is-slide" href="/industries">
                Industries
              </a>

              <ul class="dropdown_menu">
                @foreach ($industries_menu as $industries)
                    <a href="/industries/{{ $industries->slug }}">
                        <li class="dynamic-item">{{ $industries->name }}</li>
                    </a>
                @endforeach
              </ul>
            
              
            </div>
            <a class="navbar-item is-slide" href="/casestudies">
              Case Studies</a>
            <!-- Dropdown -->
            <div id="my-dropdown" class="jq-dropdown jq-dropdown-tip">
              <ul class="jq-dropdown-menu">
                <li><a href="{{ route('front.blogs') }}">Blogs</a></li>
                <li><a href="{{ route('front.faq') }}">FAQs</a></li>
              </ul>
            </div>
            <div class="dropdown">
              <a class="navbar-item is-slide isWeb-nav" href="{{ route('front.blogs') }}">
                Resources</a>
              <ul class="dropdown_menu">
                <a href="{{ route('front.blogs') }}">
                  <li>Blogs</li>
                </a>
                <a href="{{ route('front.faq') }}">
                  <li>FAQs</li>
                </a>
              </ul>
            </div>
            <a class="navbar-item is-slide ismobile-nav" href="{{ route('front.blogs') }}">
              Blogs</a>
            <a class="navbar-item is-slide ismobile-nav" href="{{ route('front.faq') }}">
              FAQs</a>

            <a class="navbar-item is-slide" href="{{ route('front.contact') }}">
              Contact Us
            </a>
          </div>

          <!-- Navbar end -->
          <div class="navbar-end">
            <!-- Signup button -->
            <div class="navbar-item">
              <a class="button button-cta btn-align btn-outlined primary-btn raised modal-trigger navbar-btn"
                data-modal="vertical-form-modal-contact" onclick="openModal('Request Demo')">Request Demo</a>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- Hero image -->
    @yield('banner')
  
  </div>

  @yield('content')


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

  <!-- Footer -->
  <footer id="dark-footer" class="footer footer-dark">
    <div class="container">
      <div class="columns">
        <div class="footer_container">
          <div class="column">
            <div class="footer-column">
              <div class="footer-header">
                <h3>Quick Links</h3>
              </div>
              <ul class="link-list">
                <li><a href="/">Home</a></li>
                <li>
                  <a href="/industry/{{ $industries->slug }}">Industrial Details</a>
                </li>
                <li>
                  <a href="{{ route('front.industries') }}">Indusrial Display</a>
                </li>
                <li><a href="#">Weekly sessions</a></li>
                <li><a href="#">Free trials and demo</a></li>
                <li><a href="{{ route('front.contact') }}">Contact</a></li>
              </ul>
            </div>
          </div>
          @php
           $blog_items_footer = \DB::table('blogs')->take(5)->get();
         @endphp
          
          <div class="column">
            <div class="footer-column">
              <div class="footer-header">
                <h3>Blogs</h3>
              </div>
              <ul class="link-list">
                <ul>
                  @foreach($blog_items_footer as $row)
                      <li><a href="{{ url('blog/'.$row->blog_slug) }}">Blog {{ $loop->iteration }}</a></li>
                  @endforeach
              </ul>
              </ul>
            </div>
          </div>
        </div>
        <!-- <div class="column">
                  <div class="footer-column">
                      <div class="footer-header">
                          <h3>Learning</h3>
                      </div>
                      <ul class="link-list">
                          <li><a href="#">Resources</a></li>
                          <li><a href="#">Blog</a></li>
                          <li><a href="#">FAQ</a></li>
                          <li><a href="#">API documentation</a></li>
                          <li><a href="#">Admin guide</a></li>
                      </ul>
                  </div>
              </div> -->
            @php
              $social_media = \DB::table('social_media_items')->take(6)->get();
            @endphp
             
        <div class="column">
          <div class="footer-column">
            <div class="footer-logo">
              <img class="switcher-logo-w" src="/assets/img/logos/reconify.png" alt="" />
            </div>
            <div class="footer-header">
              <nav class="level is-mobile">
                <div class="level-left level-social">
                    @foreach($social_media as $row)
                    <a href="#" class="level-item">
                      <span class="icon"><i class="{{ $row->social_icon }}" style="color: white"></i></span>
                    </a>
                    @endforeach
                  </div>
              </nav>
            </div>
            <!-- <div class="copyright">
                          <span class="moto light-text">Designed and coded with <i class="fa fa-heart color-red"></i> by <a href="www.heliverse.com"  target="_blank" rel="noopener noreferrer">Heliverse Technologies.</a></span>
                      </div> -->
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- /Chat widget -->
  <!-- <script type="text/javascript" src="https://d3mkw6s8thqya7.cloudfront.net/integration-plugin.js"
    id="aisensy-wa-widget" widget-id="LtmBFL"  >
    </script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    let clientScrollImage1 = document.getElementById("client-scroll-1");
      clientScrollImage1.addEventListener("mouseover", () => {
        clientScrollImage1.src = "assets/img/logos/custom/grubspot-dark.svg";
      });
      clientScrollImage1.addEventListener("mouseleave", () => {
        clientScrollImage1.src = "assets/img/logos/custom/grubspot.svg";
      });
      let clientScrollImage2 = document.getElementById("client-scroll-2");
      clientScrollImage2.addEventListener("mouseover", () => {
        clientScrollImage2.src = "assets/img/logos/custom/phasekit-dark.svg";
      });
      clientScrollImage2.addEventListener("mouseleave", () => {
        clientScrollImage2.src = "assets/img/logos/custom/phasekit.svg";
      });
  </script>
  <script src="/assets/js/app.js"></script>
  <script src="/assets/js/core.js"></script>
  <script>
    let formHead = "";
      const alertBtn = document.getElementById("alert-modal-btn");

      function openModal(newName) {
        const formHeadElement = document.getElementById("form_head");
        formHeadElement.innerText = newName;
      }

      // For Modal form
      var form = document.getElementById("sheetdb-form");
      var closeFormBtn = document.querySelector(".form_submit_btn");
      form.addEventListener("submit", (e) => {
        e.preventDefault();
        fetch(form.action, {
          method: "POST",
          body: new FormData(document.getElementById("sheetdb-form")),
        })
          .then((response) => response.json())
          .then((html) => {
            // you can put any JS code here
            form.reset();
            // alert(
            //   "Thanks for submitting your details. We shall contact you soon."
            // );
            
            closeFormBtn.click();
            setTimeout(()=>{
              alertBtn.click();
            },1000)
          });
      });

      // for hero section form
      var formPrimary = document.getElementById("sheetdb-form-primary");

      formPrimary.addEventListener("submit", (e) => {
        e.preventDefault();
        fetch(formPrimary.action, {
          method: "POST",
          body: new FormData(document.getElementById("sheetdb-form-primary")),
        })
          .then((response) => response.json())
          .then((html) => {
            // you can put any JS code here
            formPrimary.reset();
            // alert(
            //   "Thanks for submitting your details. We shall contact you soon."
            // );
            alertBtn.click()
          });
      });
  </script>
  <script>
    $(document).ready(function() {
        // Hide dynamic list items after the first three
        // $('.dropdown_menu .dynamic-item:gt(2)').hide();
    });
</script>

</body>

</html>