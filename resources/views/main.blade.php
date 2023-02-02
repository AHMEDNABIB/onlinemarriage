<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  @yield('meta')
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <link rel="icon" href="{{ asset(isset(settings()->fev_icon)?settings()->fev_icon:'') }}" type="image/x-icon">
  <!-- Stylesheets-->
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Poppins:400,500%7CTeko:300,400,500%7CMaven+Pro:500">
  <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/fonts.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

  @stack('css')
  <!--toastr css-->
  <link rel="stylesheet" href="{{ asset('admin/toastr/css/toastr.min.css') }}">
  <style>
    .ie-panel {
      display: none;
      background: #212121;
      padding: 10px 0;
      box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
      clear: both;
      text-align: center;
      position: relative;
      z-index: 1;
    }

    html.ie-10 .ie-panel,
    html.lt-ie-10 .ie-panel {
      display: block;
    }
  </style>
</head>

<body>
  <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a>
  </div>
  <div class="preloader">
    <div class="preloader-body">
      <div class="cssload-container"><span></span><span></span><span></span><span></span>
      </div>
    </div>
  </div>
  <div class="page">
    <!-- Page Header-->
    <header class="section page-header">
      <!-- RD Navbar-->
      @include('navabar')
    </header>
  </div>

    {{-- start main content --}}
    @yield('content')
    {{-- end main content --}}



    <!-- Page Footer-->
    @include('footer')
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="{{ asset('frontend/js/core.min.js') }}"></script>
    <script src="{{ asset('frontend/js/script.js') }}"></script>

    @stack('js')
    {{-- toastr js --}}
    <script src="{{ asset('admin/toastr/js/toastr.min.js') }}"></script>

    {!! Toastr::message() !!}
</body>

</html>
