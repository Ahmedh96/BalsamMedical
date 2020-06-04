@extends('layouts.style')

@section('title')
@lang('lang.Searches')
@endsection

@section('meta')
<meta name="keywords" content="@lang('lang.Searches')"">
<meta name="description" content="@lang('lang.Who Description')">
<meta name="author" content="@if (setting()) {{setting()->sitename}} @endif">
@endsection


@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url({{url('design/FrontEnd/images/bg_1.jpg')}}); background-position: 50% 0%;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
            <h1 class="mb-2 bread">
                @lang('lang.Searches')
            </h1>
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
                <span>
                    <a href="" title="@lang('lang.Searches')">
                        @lang('lang.Searches')
                        @if (app()->getLocale() == 'ar')
                        <i class="ion-ios-arrow-back"></i>
                        @endif
                        @if (app()->getLocale() == 'en' || app()->getLocale() == 'tr')
                        <i class="ion-ios-arrow-forward"></i>
                        @endif
                    </a>
                </span>
            </p>
        </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-xs-12 col-lg-4">
                    <div class="rounded overflow-hidden ">
                        <div style="width: 20rem;">
                            <a href="{{route('front.post' , [$post->id , str_replace_me($post->title) ] )}}" title="{{$post->title}}">
                                <img class="card-img-top" src="{{url('uploads/Posts/'.$post->image)}}" alt="{{$post->title}}" style="max-height: 200px;">
                            </a>
                            <div class="card-body">
                                <a href="{{route('front.post' , [$post->id , str_replace_me($post->title) ] )}}" title="{{$post->title}}">
                                    <h4 class="text-center">{{$post->title}}</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
