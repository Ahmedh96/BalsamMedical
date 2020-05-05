<nav class="navbar py-4 navbar-expand-lg ftco_navbar navbar-light bg-light flex-row">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
            @if (setting())
                <div class="col-lg-2 pr-4 align-items-center">
                    <a class="navbar-brand" href="{{route('home')}}">
                        <img src="{{url('uploads/Settings/Logo/' . setting()->logo)}}" height="70" width="70" alt="">
                    </a>
                </div>
                <div class="col-lg-10 d-none d-md-block">
                    <div class="row d-flex">
                        <div class="col-md-3 pr-4 d-flex topper align-items-center">
                            <div class="icon bg-white mr-2 d-flex justify-content-center align-items-center"><span class="icon-map"></span></div>
                        <span class="text">Address:{{setting()->address}}</span>
                        </div>
                        <div class="col-md-5 pr-4 d-flex topper align-items-center">
                            <div class="icon bg-white mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                            <span class="text">Email: {{setting()->email}}</span>
                        </div>
                        <div class="col-md-4 pr-4 d-flex topper align-items-center">
                            <div class="icon bg-white mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                            <span class="text">Phone: {{setting()->phone}}</span>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container d-flex align-items-center">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        {{-- <p class="button-custom order-lg-last mb-0">
            <a href="appointment.html" class="btn btn-secondary py-2 px-3">Make An Appointment</a>
        </p> --}}
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a href="{{route('home')}}" class="nav-link pl-0">Home</a></li>
                <!-- Start Category -->
                @foreach ($categories as $category)
                <li class="nav-item">
                    <a href="{{route('front.category' , $category->slug)}}" class="nav-link pl-0">
                        {{$category->name}}
                    </a>
                </li>
                @endforeach
                <!-- End Category -->

                <!-- Start Contact -->
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{route('front.contact')}}">
                        <span class="nav-link-inner--text">@lang('lang.Contact')</span>
                    </a>
                </li>
                <!-- End Contact -->


                <!-- Start Search -->
                <li class="nav-item">
                    <div class="btn-group ">
                        <form action="{{route('front.search')}}" method="post">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" name="search"  class="form-control" placeholder="ابحث عن الخدمة... ">
                                <button type="submit" class="bg-info border-info text-white"  style="display:inline; ">
                                    بحث
                                </button>
                            </div>
                        </form>
                    </div>
                </li>
                <!-- End Search -->
            </ul>
            <ul class="navbar-nav mr-auto navbar-right">
                            <!-- Start Language -->
            <li class="nav-item dropdown">
                    <a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-flag d-lg-none"></i>
                        <span class="nav-link-inner--text">@lang('lang.lang')</span>
                    </a>
                    <div class="dropdown-menu @if(app()->getLocale() == 'ar') dropdown-menu-left @endif " aria-labelledby="navbar-default_dropdown_1">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                <i class="ni ni-collection"></i>
                                <span class="nav-link-inner--text">{{ $properties['native'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </li>
                <!-- End Language -->


                @if ( Auth::user())
                    @if (Auth::user()->admin == 1 || Auth::user()->admin == 2)
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu @if(app()->getLocale() == 'ar') dropdown-menu-left @endif" aria-labelledby="navbarDropdown" >
                            @if (Auth::user()->admin == 1 || Auth::user()->admin == 2 && isset(Auth::user()->email_verified_at))
                            <a href="{{route('admin.dashbord')}}" target="_blank" class="dropdown-item">@lang('lang.Dashbord')</a><br>
                            @endif
                            <a href="{{route('front.profile' , Auth::user()->id)}}"  class="dropdown-item">@lang('lang.Profile')</a><br>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                @lang('lang.Logout')
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</nav>
