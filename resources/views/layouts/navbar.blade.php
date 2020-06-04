<nav class="navbar py-4 navbar-expand-lg ftco_navbar navbar-light bg-light flex-row @if(app()->getLocale() == 'ar') text-right @endif">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
            @if (setting())
                <div class="col-lg-1 pr-4 align-items-center">
                    <a class="navbar-brand" href="{{route('home')}}">
                        <img src="{{url('uploads/Settings/Logo/' . setting()->logo)}}" height="70" width="70" alt="{{setting()->sitename}}">
                    </a>
                </div>
                <div class="col-lg-11 d-none d-md-block">
                    <div class="row d-flex">
                        <div class="col-lg-4 pr-4 d-flex topper align-items-center">
                            <div class="icon bg-white mr-2 @if(app()->getLocale() == 'ar') ml-2 @endif d-flex justify-content-center align-items-center"><span class="icon-map"></span></div>
                            <span class="text" style="font-size:14px">@lang('lang.Address'):{{setting()->address}}</span>
                        </div>
                        <div class="col-lg-5 pr-4 d-flex topper align-items-center">
                            <div class="icon bg-white mr-2 d-flex @if(app()->getLocale() == 'ar') ml-2 @endif justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                            <span class="text" style="font-size:14px">@lang('lang.Email'):{{setting()->email}}</span>
                        </div>
                        <div class="col-lg-3 pr-4 d-flex topper align-items-center">
                            <div class="icon bg-white mr-2 @if(app()->getLocale() == 'ar') ml-2 @endif d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                            <span class="text" style="font-size:14px">@lang('lang.Phone'):{{setting()->phone}}</span>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light font-italic" style="font-size:10px" id="ftco-navbar">
    <div class="container d-flex align-items-center">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> @lang('lang.Menu')
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav mr-auto" style="text-transform:none">
                <li class="nav-item"><a href="{{route('home' , trans('lang.Home'))}}" class="nav-link pl-0 text-capitalize" title="{{trans('lang.Home')}}">@lang('lang.Home')</a></li>
                <!-- Start Category -->
                @foreach ($categories as $category)
                <li class="nav-item">
                    <a href="{{route('front.category' , [$category->id , str_replace_me($category->name)])}}" title="{{$category->name}}" class="nav-link pl-0 text-capitalize">
                        {{$category->name}}
                    </a>
                </li>
                @endforeach
                <!-- End Category -->

            </ul>
            <ul class="navbar-nav mr-auto navbar-right">
                <!-- Start Search -->
                <li class="nav-item mr-2">
                    <div class="btn-group ">
                        <form action="{{route('front.search')}}" method="post">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" name="search"  class="form-control" placeholder="@lang('lang.Search For Service')">
                                <button type="submit" class="bg-info border-info text-white"  style="display:inline; ">
                                    @lang('lang.Search')
                                </button>
                            </div>
                        </form>
                    </div>
                </li>
                <!-- End Search -->
                <!-- Start Language -->
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-icon text-capitalize" href="#" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-flag d-lg-none"></i>
                        <span class="nav-link-inner--text">@lang('lang.lang')</span>
                    </a>
                    <div class="dropdown-menu @if(app()->getLocale() == 'ar') dropdown-menu-left @endif " aria-labelledby="navbar-default_dropdown_1">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a class="dropdown-item text-capitalize" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
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
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-capitalize " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu @if(app()->getLocale() == 'ar') dropdown-menu-left @endif" aria-labelledby="navbarDropdown" >
                            @if (Auth::user()->admin == 1 || Auth::user()->admin == 2 && isset(Auth::user()->email_verified_at))
                            <a href="{{route('admin.dashbord')}}" target="_blank" class="dropdown-item text-capitalize">@lang('lang.Dashbord')</a><br>
                            @endif
                            <a href="{{route('front.profile' , Auth::user()->id)}}"  class="dropdown-item text-capitalize">@lang('lang.Profile')</a><br>

                            <a class="dropdown-item text-capitalize" href="{{ route('logout') }}"
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

                <!-- Start Contact -->
                <li class="nav-item">
                    <a class="nav-link nav-link-icon text-capitalize" href="{{route('front.contact' , str_replace_me(trans('lang.Contact')) )}}" title="@lang('lang.Contact')">
                        <span class="nav-link-inner--text">@lang('lang.Contact')</span>
                    </a>
                </li>
                <!-- End Contact -->
            </ul>
        </div>
    </div>
</nav>
