<nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
    <div class="container">
      <a class="navbar-brand" href="/">
        @if (setting())
        <img src="{{url('uploads/Settings/Logo/'.setting()->logo)}}" style="width:150px; height:80px!important;" class="img-fluid bg-transparent img-responsive img-thumbnail">
        @endif
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbar_global">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="/">
                @if (setting())
                <img src="{{url('uploads/Settings/Logo/'.setting()->logo)}}">
                @endif
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav navbar-nav-hover align-items-lg-center  @if(app()->getLocale() == 'ar') navbar-left @else navbar-right @endif">

            <!-- Start Category -->
            @foreach ($categories as $category)
            <li class="nav-item dropdown">
                <a href="#" class="nav-link"id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                    <i class="fa fa-list-alt d-lg-none"></i>
                    <span class="nav-link-inner--text">{{$category->name}}</span>
                </a>
                <ul class="dropdown-menu @if(app()->getLocale() == 'ar') dropdown-menu-right @endif ">
                    @foreach ($category->children as $child)
                        <a href="{{route('front.category' , $child->slug)}}" class="dropdown-item">{{$child->name}}</a>
                    @endforeach
                </ul>
            </li>
            @endforeach
            <!-- End Category -->

            <!-- Start Contact -->
            <li class="nav-item">
                <a class="nav-link nav-link-icon" href="{{route('front.contact')}}">
                    <i class="fa fa-address-book d-lg-none"></i>
                    <span class="nav-link-inner--text">@lang('lang.Contact')</span>
                </a>
            </li>
            <!-- End Contact -->

        </ul>
        <!-- Start User -->
        <ul class="navbar-nav navbar-nav-hover align-items-lg-center @if(app()->getLocale() == 'ar') navbar-right @endif">
            <!-- Start Search -->
            <li class="nav-item">
                <div class="btn-group ">
                    <form action="{{route('front.search')}}" method="post">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" name="search" style="width: 8rem;" class="form-control" placeholder="ابحث عن الخدمة... ">
                            <button type="submit" class="btn btn-info bg-orang btn-sm" style="display:inline; ">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </li>
            <!-- End Search -->
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
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
                <a class="nav-link nav-link-icon" href="{{route('login')}}" target="" data-toggle="tooltip" title="Like us on Login">
                <i class="fa fa-sign-in"></i>
                <span class="nav-link-inner--text">@lang('lang.Sign In')</span>
                </a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{route('register')}}" target="" data-toggle="tooltip" title="Like us on Register">
                    <i class="fa fa-sign-out"></i>
                    <span class="nav-link-inner--text">@lang('lang.Register')</span>
                    </a>
                </li>
            @endif
            @else
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
            @endguest
        </ul>
        <!-- End User -->
      </div>
    </div>
</nav>
