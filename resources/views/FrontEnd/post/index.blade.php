@extends('layouts.style')

@section('title')
    {{$post->title}}
@endsection

@push('jss')
    {{-- <script>
    $(document).ready(function(){
        $(document).on('click' , 'button.rep' , function(){
            var closestDiv = $(this).closest('div'); // also you can use $(this).parent()
            //closestDiv.fadeOut();
            $('.comment_reply').not(closestDiv.next('.comment_reply')).hide();
            //$('.rep').closest('div').not(closestDiv).show()
            closestDiv.next('form.comment_reply').slideToggle(100);
        });
    });
    </script> --}}
@endpush

@section('meta')
<meta name="keywords" content="{{$post->meta_keywords}}">
<meta name="description" content="{{$post->meta_description}}">
<meta name="author" content="@if (setting()) {{setting()->sitename}} @endif">
@endsection

@section('content')
    <!--================Map Area =================-->
    <section class="hero-wrap hero-wrap-2" style="background-image: url({{url('design/FrontEnd/images/bg_1.jpg')}}); background-position: 50% 0%;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
                <h1 class="mb-2 bread">{{$post->title}}</h1>
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
                    <span>{{$post->title}}
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
    <section class="section bg-secondary" style="border-bottom:3px solid #d20505;border-top:3px solid #d20505;">
        <div>
            <div class="card card-profile shadow mt--300 ">
                <div>
                    <!-- Start Show Post -->
                    <div class="text-center mt-5 font-weight-bolder">
                        <img class="img-responsive img-circle rounded w-50" src="{{url('uploads/Posts/'.$post->image)}}" title="{{$post->title}}" alt="{{$post->title}}">
                        <br><br>
                        <ul class="list-unstyled d-inline">
                            <li class="pl-3">
                                <span>
                                    @lang('lang.Category'):
                                </span>
                                <a href="{{route('front.category' , [$post->category->id , str_replace_me($post->category->name) ])}}" title="{{$post->category->name}}">
                                    {{$post->category->name}}
                                </a>
                            </li>
                            <li>
                                <span>@lang('lang.Title'):</span>
                                <a href="{{route('front.post' , [$post->id , str_replace_me($post->title) ])}}" title="{{$post->title}}">
                                    {{$post->title}}
                                </a>
                            </li>
                            <li>
                                <i class="fa fa-history"></i>
                                {{$post->created_at->diffForHumans()}}
                            </li>
                        </ul>
                        <div class="h6">
                            <i class="ni business_briefcase-24 mr-2"></i>
                            <p class="lead">{!! $post->description !!}</p>
                        </div>
                    </div>
                    <!-- End Show Post -->
                </div>
            </div>
        </div>
    </section>
    <!--================End Map Area =================-->

@endsection
