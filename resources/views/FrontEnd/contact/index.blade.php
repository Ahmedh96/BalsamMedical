@extends('layouts.style')

@section('title')
    @lang('lang.Contact')
@endsection

@section('meta')
<meta name="keywords" content="@lang('lang.Contact')">
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
                <h1 class="mb-2 bread">@lang('lang.Contact')</h1>
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
                    <span>@lang('lang.Contact')
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
            <div class="row d-flex align-items-stretch no-gutters">
                <div class="col-md-6 p-4 p-md-5 order-md-last bg-light">
                    <form role="form" action="{{route('front.contactSend')}}" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="@lang('lang.Name')" name="name" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="@lang('lang.Email')" name="email" value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="type_message" >
                                <optgroup label="@lang('lang.Type Message')"></optgroup>
                                <option value="0">@lang('lang.Nothing')</option>
                                <option value="1">@lang('lang.Suggestion')</option>
                                <option value="2">@lang('lang.Attention')</option>
                                <option value="3">@lang('lang.Inquiry')</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" placeholder="@lang('lang.Subject')" class="form-control"  value="{{ old('subject') }}">
                        </div>
                        <div class="form-group">
                            <textarea name="bodyMessage" id="" cols="30" rows="10" class="form-control">@lang('lang.Message')</textarea>
                        </div>
                        <div class="form-group">
                        <input type="submit" value="@lang('lang.Send Message')" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>
                <div class="col-md-6 d-flex align-items-stretch">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section">
        <div class="container">
            @if (setting())
            <div class="row d-flex mb-5 contact-info">
                <div class="col-md-12 mb-4">
                    <h2 class="h4">@lang('lang.Contact Information')</h2>
                </div>
                <div class="w-100"></div>
                <div class="col-md-3 d-flex">
                    <div class="bg-light d-flex align-self-stretch box p-4">
                        <p><span>@lang('lang.Address'):</span> {{setting()->address}}</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="bg-light d-flex align-self-stretch box p-4">
                        <p><span>@lang('lang.Phone'):</span> <a href="#" title="{{setting()->phone}}">{{setting()->phone}}</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="bg-light d-flex align-self-stretch box p-4">
                        <p><span>@lang('lang.Email'):</span> <a href="#" title="{{setting()->email}}">{{setting()->email}}</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="bg-light d-flex align-self-stretch box p-4">
                        <p><span>@lang('lang.Website')</span> <a href="{{route('home')}}" title="@lang('lang.Home')">balsam-hcare.com</a></p>
                    </div>
                </div>
            </div>
            @endif
        </div>
        </section>
    <!--================End Map Area =================-->

@endsection
