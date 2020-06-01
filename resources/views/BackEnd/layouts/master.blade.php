<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocaleName() }}">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/pages/rtl.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jul 2019 13:27:30 GMT -->
<!-- header -->
@include('BackEnd.layouts.header')
<!-- end of header -->

<body class="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div class="wrapper ">
      <!-- sidbar -->
      @include('BackEnd.layouts.sidebar')
      <!-- End  of sidbar -->
    <div class="main-panel">
      <!-- Navbar -->
      @include('BackEnd.layouts.navbar')
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
            @include('BackEnd.layouts.messages')
            @yield('content')
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright">
                @lang('lang.Copyright') &copy;<script>document.write(new Date().getFullYear());</script>
                @lang('lang.All rights reserved') <i class="icon-heart" aria-hidden="true"></i>
                @lang('lang.By') <a href="" target="_blank">@lang('lang.Enjoy Code')</a>
          </div>
        </div>
      </footer>
    </div>
  </div>
<!-- footer -->
@include('BackEnd.layouts.footer')
<!-- end of footer -->
</body>


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/pages/rtl.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jul 2019 13:27:30 GMT -->
</html>
