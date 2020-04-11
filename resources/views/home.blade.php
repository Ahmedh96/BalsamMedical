@extends('layouts.style')

@section('content')
    <!--================Map Area =================-->
    <div class="section" style="background-image: url('{{url('design/FrontEnd')}}/assets/img/ill/1.svg');">
        <div class="container py-md d-flex">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-12 mb-lg-auto">
                    <div class="rounded overflow-hidden">
                    <div id="PostCarousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#PostCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#PostCarousel" data-slide-to="1" ></li>
                            <li data-target="#PostCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($postlatest as $key => $post)
                                <div class="carousel-item {{ $key == 0 ? ' active' : '' }}">
                                    <img class="img-fluid w-100 h-100vh" src="{{url('uploads/Posts/'.$post->image)}}" alt="{{$post->title}}">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#PostCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#PostCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                        </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Map Area =================-->

    <!--================Map Area =================-->
    <section class="section section-lg section-shaped">
        <div class="shape shape-style-1 shape-default">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        </div>
        <div class="container py-md">
            <div class="row row-grid justify-content-between align-items-center">
                @if (Auth::user())
                    <div class="col-lg-6">
                        <h3 class="display-3 text-white">@lang('lang.systemLogin')</h3>
                        <p class="lead text-white">@lang('lang.systemDescription')</p>
                    </div>
                @else
                    <div class="col-lg-6">
                        <h3 class="display-3 text-white">@lang('lang.systemLogin')</h3>
                        <p class="lead text-white">@lang('lang.systemDescription')</p>
                        <div class="btn-wrapper">
                            <a href="{{route('login')}}" class="btn btn-success">@lang('lang.Sign In')</a>
                            <a href="{{route('register')}}" class="btn btn-white">@lang('lang.Register')</a>
                        </div>
                    </div>
                @endif
                <div class="col-lg-6 col-10 mx-md-auto">
                    <img class="ml-lg-5" src="{{url('design/FrontEnd')}}/assets/img/ill/ill.png" width="100%">
                </div>
            </div>
        </div>
        <!-- SVG separator -->
        <div class="separator separator-bottom separator-skew">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
        </svg>
        </div>
    </section>
    <!--================Map Area =================-->
@endsection
