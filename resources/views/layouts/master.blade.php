<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Reconify :: HomePage</title>

  <!--Core CSS -->
  <link href="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
  <link href="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/aj.css') }}">
  <link rel="stylesheet" href="{{ asset('css/core.css') }}">
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="assets/img/favicon.png" />

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />

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
            <img
              class="light-logo"
              src="{{ asset('uploads/reconify.png') }}"
              alt=""
            />
            <img
              class="dark-logo switcher-logo"
              src="{{ asset('uploads/reconify.png') }}"
              alt=""
            />
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
            <a class="navbar-item is-slide" href="./CaseStudies.html">
              Case Studies</a>
            <!-- Dropdown -->
            <div id="my-dropdown" class="jq-dropdown jq-dropdown-tip">
              <ul class="jq-dropdown-menu">
                <li><a href="Blogs.html">Blogs</a></li>
                <li><a href="Faqs.html">FAQs</a></li>
              </ul>
            </div>
            <div class="dropdown">
              <a class="navbar-item is-slide isWeb-nav" href="./Blogs.html">
                Resources</a>
              <ul class="dropdown_menu">
                <a href="Blogs.html">
                  <li>Blogs</li>
                </a>
                <a href="Faqs.html">
                  <li>FAQs</li>
                </a>
              </ul>
            </div>
            <a class="navbar-item is-slide ismobile-nav" href="./Blogs.html">
              Blogs</a>
            <a class="navbar-item is-slide ismobile-nav" href="Faqs.html">
              FAQs</a>

            <a class="navbar-item is-slide" href="./Contact.html">
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
        <div class="column">
          <div class="footer-column">
            <div class="footer-logo">
              <img class="switcher-logo-w" src="{{ asset('uploads/reconify.png') }}" alt="" />
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
          </div>
        </div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
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
  {{-- <script src="assets/js/app.js"></script> --}}
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/core.js') }}"></script>
  {{-- <script src="assets/js/core.js"></script> --}}
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