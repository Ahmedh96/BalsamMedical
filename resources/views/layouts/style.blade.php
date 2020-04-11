<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">

    <!--================Header =================-->
    @include('layouts.header')
    <!--================End Header =================-->

<body class="index-page">
  <!--================ Navbar =================-->
  @include('layouts.navbar')
  <!--================ End Navbar =================-->
  <div class="wrapper">
    <!--================ Slider =================-->
    @include('layouts.slider')
    <!--================ End Slider =================-->

    @yield('content')
  </div>
  <div><!-- Typography -->
    <footer class="footer bg-white">
        <div class="container">
        <div class="row row-grid align-items-center my-md">
            <div class="col-lg-12">
                <h3 class="text-primary font-weight-light mb-2">المكان الخاص في الاعلان</h3>
            </div>
        </div>
        <hr>
        <div class="row align-items-center justify-content-md-between">
            <div class="col-md-6">
                <div class="copyright @if(app()->getLocale() == 'ar')
                    pull-right
                @endif">
                    &copy; 2020 <a href="" target="_blank">Enjoy Code</a>.
                </div>
            </div>
            <div class="col-md-6">
                <ul class="nav nav-footer justify-content-end">
                    @foreach ($pages as $page)
                        <li class="nav-item">
                            <a href="{{route('front.page' , $page->slug)}}" class="nav-link">{{$page->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        </div>
    </footer>
  </div>

    <!--================Header =================-->
    @include('layouts.footer')
    <!--================End Header =================-->
</body>

</html>
