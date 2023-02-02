<div class="rd-navbar-wrap rd-navbar-modern-wrap">
    <nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="70px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
      <div class="rd-navbar-main-outer">
        <div class="rd-navbar-main">
          <!-- RD Navbar Panel-->
          <div class="rd-navbar-panel">
            <!-- RD Navbar Toggle-->
            <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
            <!-- RD Navbar Brand-->
            <div class="rd-navbar-brand">
              <!--Brand--><a class="brand" href="{{ route('main.home') }}"><img class="brand-logo-dark" src="{{ asset(isset(settings()->main_logo)?settings()->main_logo:'') }}" alt="" width="230" height="62" /><img class="brand-logo-light" src="{{ asset(isset(settings()->main_logo)?settings()->main_logo:'') }}" alt="" width="230" height="62" /></a>
            </div>
          </div>
          <div class="rd-navbar-main-element">
            <div class="rd-navbar-nav-wrap">
              <!-- RD Navbar Search-->
              <div class="rd-navbar-search">
                <button class="rd-navbar-search-toggle" data-rd-navbar-toggle=".rd-navbar-search"><span></span></button>
                <form class="rd-search" action="" method="get">
                  <div class="form-wrap">
                    <label class="form-label" for="rd-navbar-search-form-input">Search All Products...</label>
                    <input class="rd-navbar-search-form-input form-input" id="rd-navbar-search-form-input" type="text" name="product_name" autocomplete="off" />
                    {{-- <div class="rd-search-results-live" id="rd-search-results-live"></div> --}}
                    <button class="rd-search-form-submit fl-bigmug-line-search74" type="submit"></button>
                  </div>
                </form>
              </div>
              <!-- Navigation-->
              <ul class="rd-navbar-nav">
                <li class="rd-nav-item {{ request()->path() == '/' ? 'active':'' }}"><a class="rd-nav-link" href="{{ route('main.home') }}">Home</a>
                </li>
                <li class="rd-nav-item {{ request()->path() == 'about-us' ? 'active':'' }}">
                  <a class="rd-nav-link" href="">About Us</a>
                </li>
                <li class="rd-nav-item {{ request()->is('media/*') ? 'active' : '' }}"><a class="rd-nav-link" href="">Media</a>
                  <!-- Media Dropdown-->
                  {{-- <ul class="rd-menu rd-navbar-dropdown">
                    <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{ route('user.media_blog') }}">Blog</a></li>
                    <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{ route('user.media.tvc') }}">TVC</a></li>
                  </ul> --}}
                </li>

                <li class="rd-nav-item {{ request()->is('products/*') ? 'active' : '' }}"><a class="rd-nav-link" href="">Products</a>
                  <!-- Media Dropdown-->

                </li>


                <li class="rd-nav-item {{ request()->path() == 'all/shops' ? 'active':'' }}"><a class="rd-nav-link" href="">Where To Buy</a></li>
                <li class="rd-nav-item {{ request()->path() == 'contact-us' ? 'active':'' }}"><a class="rd-nav-link" href="">Contact Us</a>
                </li>

                <li class="rd-nav-item {{ request()->path() == 'catalogue' ? 'active':'' }}"><a class="rd-nav-link" href=""> Download Catalogue</a></li>
              </ul>
            </div>
            <div class="rd-navbar-project-hamburger" data-multitoggle=".rd-navbar-main" data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate="data-multitoggle-isolate">
              <div class="project-hamburger"><span class="project-hamburger-arrow-top"></span><span class="project-hamburger-arrow-center"></span><span class="project-hamburger-arrow-bottom"></span></div>
              <div class="project-hamburger-2"><span class="project-hamburger-arrow"></span><span class="project-hamburger-arrow"></span><span class="project-hamburger-arrow"></span>
              </div>
              <div class="project-close"><span></span><span></span></div>
            </div>
          </div>
          <div class="rd-navbar-project rd-navbar-modern-project">
            <div class="rd-navbar-project-modern-header">
              <h4 class="rd-navbar-project-modern-title">Follow us</h4>
              <div class="rd-navbar-project-hamburger" data-multitoggle=".rd-navbar-main" data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate="data-multitoggle-isolate">
                <div class="project-close"><span></span><span></span></div>
              </div>
            </div>
            <div class="rd-navbar-project-content rd-navbar-modern-project-content">
              <div>
                <p class="text-spacing-25"> {{ isset(settings()->decription)?settings()->decription:'' }}</p>
                <div class="row row-10 gutters-10" data-lightgallery="group">





                </div>
                <ul class="rd-navbar-modern-contacts">
                  <li>
                    <div class="unit unit-spacing-sm">
                      <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                      <div class="unit-body">
                        @isset(contact_us()->phone)
                        @foreach (explode(",", contact_us()->phone) as $phone)
                        <a class="link-phone" href="tel:{{ $phone }}">{{ $phone }}</a><br>
                        @endforeach
                        @endisset
                    </div>
                    </div>
                  </li>
                  <li>
                    <div class="unit unit-spacing-sm">
                      <div class="unit-left"><span class="icon fa fa-location-arrow"></span></div>
                      <div class="unit-body"><a class="link-location" href="{{ isset(contact_us()->address)?contact_us()->address:'' }}">{{ isset(contact_us()->address)?contact_us()->address:'' }} </a></div>
                    </div>
                  </li>
                  <li>
                    <div class="unit unit-spacing-sm">
                      <div class="unit-left"><span class="icon fa fa-envelope"></span></div>
                      <div class="unit-body"><a class="link-email" href="mailto:{{ isset(contact_us()->email)?contact_us()->email:'' }}">{{ isset(contact_us()->email)?contact_us()->email:'' }}</a></div>
                    </div>
                  </li>
                </ul>
                <ul class="list-inline rd-navbar-modern-list-social">
                    @isset(settings()->fb_link)
                        <li><a class="icon fa fa-facebook" href="{{ settings()->fb_link }}"></a></li>
                    @endisset
                    @isset(settings()->in_link)
                        <li><a class="icon fa fa-linkedin-square" href="{{ settings()->fb_link }}"></a></li>
                    @endisset
                    @isset(settings()->insta_link)
                        <li><a class="icon fa fa-instagram" href="{{ settings()->insta_link }}"></a></li>
                    @endisset
                    @isset(settings()->youtube_link)
                        <li><a class="icon fa fa-youtube" href="{{ settings()->youtube_link }}"></a></li>
                    @endisset
                    @isset(settings()->twitter_link)
                        <li><a class="icon fa fa-twitter" href="{{ settings()->twitter_link }}"></a></li>
                    @endisset
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>
