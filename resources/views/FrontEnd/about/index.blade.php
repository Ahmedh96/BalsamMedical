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


    <section class="ftco-section ftco-no-pt ftc-no-pb" style="border-bottom:3px solid #d20505;border-top:3px solid #d20505;">
        <div class="container">
            <div class="row no-gutters">
                @if (app()->getLocale() == 'en' || app()->getLocale() == 'tr')
                <img class="col-md-5 pl-5 img-responsive" src="{{url('design/FrontEnd/images/about.jpg')}}" title="@lang('lang.About Us')" alt="@lang('lang.About Us')">
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
                        <div class="accordion" id="accordionExample">
                            <div class="card text-white bg-secondary">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-white text-left @if (app()->getLocale() == 'ar') text-right mr-4 @endif collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                         @lang('lang.About First')
                                         <i class="fa fa-plus fa-2x d-none d-sm-block pull-right @if (app()->getLocale() == 'ar') pull-left @endif"></i>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse @if (app()->getLocale() == 'ar') text-right mr-4 @endif" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                    @lang('lang.About First Desc')
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="card bg-secondary text-white ">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left text-white @if (app()->getLocale() == 'ar') text-right mr-4 @endif collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            @lang('lang.About Last')
                                            <i class="fa fa-plus fa-2x d-none d-sm-block pull-right @if (app()->getLocale() == 'ar') pull-left @endif"></i>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse @if (app()->getLocale() == 'ar') text-right mr-4 @endif" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @lang('lang.About Last Desc')
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="card bg-secondary text-white">
                                <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left text-white @if (app()->getLocale() == 'ar') text-right mr-4 @endif collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            @lang('lang.About Third')
                                            <i class="fa fa-plus fa-2x d-none d-sm-block pull-right @if (app()->getLocale() == 'ar') pull-left @endif"></i>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse @if (app()->getLocale() == 'ar') text-right mr-4 @endif" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @lang('lang.About Third Desc')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (app()->getLocale() == 'ar')
                <img class="col-md-5 pl-5 img-responsive" src="{{url('design/FrontEnd/images/about.jpg')}}" title="@lang('lang.About Us')" alt="@lang('lang.About Us')">
                @endif
            </div>
        
        </div>
    </section>

    <!--================End Map Area =================-->

@endsection

