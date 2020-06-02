@extends('layouts.style')

@section('title')
@lang('lang.Who We Are')
@endsection

@section('meta')
<meta name="keywords" content="@lang('lang.About Us')">
<meta name="description" content="@lang('lang.Who Description')">
<meta name="author" content="@if (setting()) {{setting()->sitename}} @endif">
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


    <section class="ftco-section ftco-no-pt ftc-no-pb">
        <div class="container">
            <div class="row no-gutters">
                @if (app()->getLocale() == 'en' || app()->getLocale() == 'tr')
                <div class="col-md-5 p-md-5 img img-2 mt-5 mt-md-0" style="background-image: url({{url('design/FrontEnd/images/about.jpg')}});">
                </div>
                @endif
                <div class="col-md-7 wrap-about py-4 py-md-5 ftco-animate fadeInUp ftco-animated">
                    <div class="heading-section mb-5">
                        <div class="pl-md-5 ml-md-5 @if (app()->getLocale() == 'ar') text-right @endif">
                            <span class="subheading">
                                @lang('lang.About Us')
                            </span>
                            <h2 class="mb-4" style="font-size: 28px;">
                                @lang('lang.About Head')
                            </h2>
                            <p class="lead">
                                @lang('lang.About Head Desc')
                            </p>
                            <span class="subheading">
                                @lang('lang.About Name')
                            </span>
                        </div>
                    </div>
                    <div class="pl-md-5 ml-md-5 mb-5">
                        <p class="lead @if (app()->getLocale() == 'ar') text-right @endif">@lang('lang.About Description')</p>
                        <div class="row mt-5 pt-2">
                            <div class="col-lg-12">
                                <div class="services-2 d-flex">
                                    <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-first-aid-kit"></span></div>
                                    <div class="text @if (app()->getLocale() == 'ar') text-right mr-4 @endif">
                                        <h3>@lang('lang.About First')</h3>
                                        <p>@lang('lang.About First Desc')</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="services-2 d-flex">
                                    <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-dropper"></span></div>
                                    <div class="text @if (app()->getLocale() == 'ar') text-right mr-4 @endif">
                                        <h3>@lang('lang.About Last')</h3>
                                        <p>@lang('lang.About Last Desc')</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="services-2 d-flex">
                                    <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-experiment-results"></span></div>
                                    <div class="text @if (app()->getLocale() == 'ar') text-right mr-4 @endif">
                                        <h3>@lang('lang.About Third')</h3>
                                        <p>@lang('lang.About Third Desc')</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (app()->getLocale() == 'ar')
                <div class="col-md-5 p-md-5 img img-2 mt-5 mt-md-0" style="background-image: url({{url('design/FrontEnd/images/about.jpg')}});">
                </div>
                @endif
            </div>
        </div>
    </section>

    <!--================End Map Area =================-->

@endsection

