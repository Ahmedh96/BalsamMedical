@extends('layouts.style')

@section('title')
@lang('lang.Sign In')
@endsection

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url({{url('design/FrontEnd/images/bg_1.jpg')}}); background-position: 50% 0%;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
            <h1 class="mb-2 bread">@lang('lang.Sign In')</h1>
            <p class="breadcrumbs">
                <span class="mr-2">
                    <a href="{{route('home')}}" title="@lang('lang.Home')">@lang('lang.Home')
                        @if (app()->getLocale() == 'ar')
                        <i class="ion-ios-arrow-back"></i>
                        @endif
                        @if (app()->getLocale() == 'en' || app()->getLocale() == 'tr')
                        <i class="ion-ios-arrow-forward"></i>
                        @endif
                    </a>
                </span>
                <span>@lang('lang.Sign In')
                    @if (app()->getLocale() == 'ar')
                    <i class="ion-ios-arrow-back"></i>
                    @endif
                    @if (app()->getLocale() == 'en' || app()->getLocale() == 'tr')
                    <i class="ion-ios-arrow-forward"></i>
                    @endif
                </span>
            </p>
        </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
    <div class="container">
        <br><br>
        <div class="row d-flex align-items-stretch no-gutters">
            <div class="col-md-12 order-md-last bg-light">
                <form role="form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <div class="input-group input-group-alternative">
                        <input id="email" type="email" placeholder="@lang('lang.Email')" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group focused">
                        <div class="input-group input-group-alternative">
                        <input id="password" type="password" placeholder="@lang('lang.Password')" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="custom-control custom-control-alternative custom-checkbox ">
                        <input id="remember" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <div class="clearfix"></div>
                        <label class="" for="remember">
                            @lang('lang.Remember Me')
                        </label>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary my-4">
                            @lang('lang.Sign In')
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <br><br>
@endsection



