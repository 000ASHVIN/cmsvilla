<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required Meta Tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />

  <title>Reconify :: HomePage</title>
  <link rel="icon" type="image/png" href="/assets/img/favicon.png" />

  <!--Core CSS -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
  <link href="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css" rel="stylesheet" />
  <link rel="stylesheet" href="/assets/css/font-awesome.min.css" />
  <link rel="stylesheet" href="/assets/css/app.css" />
  <link id="theme-sheet" rel="stylesheet" href="/assets/css/core.css" />
  <link rel="stylesheet" href="/assets/css/contact.css" />
  <link rel="stylesheet" href="/assets/css/custom.css" />

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
                <a href="industrialusecaes.html">
                  <li>Restaurant Chains</li>
                </a>
                <a href="industrialusecaes.html">
                  <li>Ecommerce and D2C</li>
                </a>
                <a href="industrialusecaes.html">
                  <li>Financial Product Intermediaries</li>
                </a>
              </ul>
            </div>
            <a class="navbar-item is-slide" href="/case-study">
              Case Studies</a>
            <!-- Dropdown -->
            <div id="my-dropdown" class="jq-dropdown jq-dropdown-tip">
              <ul class="jq-dropdown-menu">
                <li><a href="Blogs.html">Blogs</a></li>
                <li><a href="{{ route('front.faq') }}">FAQs</a></li>
              </ul>
            </div>
            <div class="dropdown">
              <a class="navbar-item is-slide isWeb-nav" href="./Blogs.html">
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
            <a class="navbar-item is-slide ismobile-nav" href="./Blogs.html">
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
                <li><a href="/index.html">Home</a></li>
                <li>
                  <a href="/industrialusecaes.html">Industrial Details</a>
                </li>
                <li>
                  <a href="/Industries.html">Indusrial Display</a>
                </li>
                <li><a href="#">Weekly sessions</a></li>
                <li><a href="#">Free trials and demo</a></li>
                <li><a href="/Contact.html">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="column">
            <div class="footer-column">
              <div class="footer-header">
                <h3>Blogs</h3>
              </div>
              <ul class="link-list">
                <li><a href="BlogDetails.html">Blog 1</a></li>
                <li><a href="BlogDetails.html">Blog 2</a></li>
                <li><a href="BlogDetails.html">Blog 3</a></li>
                <li><a href="BlogDetails.html">Blog 4</a></li>
                <li><a href="BlogDetails.html">Blog 5</a></li>
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
        <div class="column">
          <div class="footer-column">
            <div class="footer-logo">
              <img class="switcher-logo-w" src="/assets/img/logos/reconify.png" alt="" />
            </div>
            <div class="footer-header">
              <nav class="level is-mobile">
                <div class="level-left level-social">
                  <a href="#" class="level-item">
                    <span class="icon"><i class="fa fa-facebook" style="color: white"></i></span>
                  </a>
                  <a href="#" class="level-item">
                    <span class="icon"><i class="fa fa-youtube" style="color: white"></i></span>
                  </a>
                  <a href="#" class="level-item">
                    <span class="icon"><i class="fa fa-twitter" style="color: white"></i></span>
                  </a>
                  <a href="#" class="level-item">
                    <span class="icon"><i class="fa fa-linkedin" style="color: white"></i></span>
                  </a>
                  <a href="#" class="level-item">
                    <span class="icon"><i class="fa fa-dribbble" style="color: white"></i></span>
                  </a>
                  <a href="#" class="level-item">
                    <span class="icon"><i class="fa fa-github" style="color: white"></i></span>
                  </a>
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
  <script src="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js"></script>
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
</body>

</html>