@extends('layouts.style')

@section('title')
    {{$category->name}}
@endsection

@section('meta')
<meta name="keywords" content="{{$category->meta_keywords}}">
<meta name="description" content="{{$category->meta_description}}">
<meta name="author" content="@if (setting()) {{setting()->sitename}} @endif">
@endsection

@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url({{url('design/FrontEnd/images/bg_1.jpg')}}); background-position: 50% 0%;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
            <h1 class="mb-2 bread">
                {{$category->name}}
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
                    <a href="{{route('front.category' , [$category->id , str_replace_me($category->name)])}}" title="{{$category->name}}">
                        {{$category->name}}
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

<section class="ftco-section" style="border-bottom:3px solid #d20505;border-top:3px solid #d20505;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="text-center">{{$category->name}}</h3><br>
                <p class="lead @if(app()->getLocale() == 'ar') text-right @endif">{!!$category->description!!}</p>
            </div>
            <br><br>
            @foreach ($category->posts as $post)
            <div class="col-xs-12 col-lg-4">
                    <div class="rounded overflow-hidden ">
                        <div style="width: 20rem;">
                            <a href="{{route('front.post' , [$post->id , str_replace_me($post->title) ] )}}" title="{{$post->title}}">
                                <img class="card-img-top" src="{{url('uploads/Posts/'.$post->image)}}" alt="{{$post->title}}" style="max-height: 200px;border-radius: 20px; border:3px solid #d20505">
                            </a>
                            <div class="card-body">
                                <a href="{{route('front.post' , [$post->id , str_replace_me($post->title) ] )}})}}" title="{{$post->title}}">
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
