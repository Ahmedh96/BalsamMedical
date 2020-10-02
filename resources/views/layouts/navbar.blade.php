<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" style="font-size:20px;
border-bottom:3px solid #d20505;border-top:2px solid #d20505;" id="ftco-navbar">
    <div class="d-flex align-items-center">
        <div>
            <div class="col-lg-12" style="background:#17a2b8;border-bottom:2px solid #d20505;">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="oi oi-menu"></span> @lang('lang.Menu')
                </button>
                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav " style="text-transform:none">
                        <li class="nav-item"><a href="{{route('home' , trans('lang.Home'))}}" class="nav-link text-capitalize text-white" style="font-size:18px" title="{{trans('lang.Home')}}">@lang('lang.Home')</a></li>
                        <!-- Start Category -->
                        @foreach ($categories as $category)
                        <li class="nav-item">
                            <a href="{{route('front.category' , [$category->id , str_replace_me($category->name)])}}" title="{{$category->name}}" class="nav-link text-capitalize text-white" 
                                style="font-size:18px">
                                {{$category->name}}
                            </a>
                        </li>
                        @endforeach
                        <!-- End Category -->

                    </ul>
                    <ul class="navbar-nav navbar-right">
                        <!-- Start Search -->
                        <li class="nav-item mr-2 mt-1">
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
                                <span class="nav-link-inner--text text-white" style="font-size:18px">@lang('lang.lang')</span>
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-capitalize text-white"
                                style="font-size:18px" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                                <span class="nav-link-inner--text text-white" style="font-size:18px">@lang('lang.Contact')</span>
                            </a>
                        </li>
                        <!-- End Contact -->
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
            @if (setting())
                <img src="{{url('public/uploads/Settings/Logo/' . setting()->logo)}}" class="d-none d-lg-block" height="110" width="400" alt="{{setting()->sitename}}">
                @endif
            </div>
        </div>
    </div>
</nav>