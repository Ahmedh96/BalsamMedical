<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
        <div class="navbar-minimize">
            <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
            <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
            <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
            </button>
        </div>
        <a class="navbar-brand" href="{{route('admin.dashbord')}}">لوحة التحكم</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
            <!-- Start Language -->
            <li class="nav-item dropdown">
                <a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-flag"></i>
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
            <li class="nav-item dropdown">
            <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">person</i>
                <p class="d-lg-none d-md-block">
                Account
                </p>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownProfile">
                <a class="dropdown-item" href="#">{{Auth::user()->name}}</a>
                <a class="dropdown-item" href="{{route('settings.index')}}">Settings</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout' ) }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="feather icon-log-out"></i>@lang('lang.Logout')
                </a>

            <form id="logout-form" action="{{ route('logout' , app()->getLocale()) }}" method="POST" style="display: none;">
                @csrf
            </form>
                {{-- <a class="dropdown-item" href="#">Log out</a> --}}
            </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.dashbord')}}">
                    <i class="material-icons">dashboard</i>
                    <p class="d-lg-none d-md-block">
                    Stats
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.dashbord')}}">
                    balsam
                </a>
            </li>
        </ul>
        </div>
    </div>
</nav>
