@extends('layouts.style')

@section('title')
    @lang('lang.About Us')
@endsection

@section('content')
    <!--================Map Area =================-->
    <section class="hero-wrap hero-wrap-2" style="background-image: url({{url('design/FrontEnd/images/bg_1.jpg')}}); background-position: 50% 0%;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
                <h1 class="mb-2 bread">@lang('lang.About Us')</h1>
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
                    <span>@lang('lang.About Us')
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

    <section class="ftco-section ftco-no-pt bg-light ftc-no-pb">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-12 py-4 py-md-5 ftco-animate fadeInUp ftco-animated">
                    <div class="heading-section mb-5">
                        <div class="pl-md-5 ml-md-5">
                            <h2 class="mb-4 text-center" style="font-size: 28px;">@lang('lang.Who We Are')</h2>
                        </div>
                    </div>
                    <div class="pl-md-5 ml-md-5 mb-5">
                        <p class="lead @if (app()->getLocale() == 'ar') text-right @endif">
                            @lang('lang.Who Description')
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--================End Map Area =================-->

@endsection
