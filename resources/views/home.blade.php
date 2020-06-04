@extends('layouts.style')

@section('title')
    @lang('lang.Home')
@endsection

@section('slider')
@include('layouts.slider')
@endsection

@section('meta')
<meta name="keywords" content="@if (setting()) {{setting()->keywords}} @endif">
<meta name="description" content="@if (setting()) {{setting()->description}} @endif">
<meta name="author" content="@if (setting()) {{setting()->sitename}} @endif">
@endsection

@section('content')
    <!--================Map Area =================-->
        <section class="ftco-services ftco-no-pb">
			<div class="container">
				<div class="row no-gutters">
                    @foreach ($categories as $category)
                    <div class="col-md-3 d-flex services align-self-stretch p-4 ftco-animate">
                        <div class="media block-6 d-block text-center">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <!--<span class="flaticon-doctor"></span>-->
                                <i class="fa fa-medkit fa-2x" style="color:white"  aria-hidden="true"></i>
                            </div>
                            <div class="media-body p-2 mt-3">
                                <h3 class="heading">{{$category->name}}</h3>
                                <p>{{ Str::limit($category->description , 10)}}</p>
                                <a href="{{route('front.category' , [$category->id , str_replace_me($category->name)])}}" title="{{$category->name}}" class="btn btn-dark">
                                    @lang('lang.Show Details')
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-3 d-flex services align-self-stretch p-4 ftco-animate">
                        <div class="media block-6 d-block text-center">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <!--<span class="flaticon-24-hours"></span>-->
                                 <i class="fa fa-h-square fa-2x" style="color:white" ></i>
                            </div>
                            <div class="media-body p-2 mt-3">
                                <h3 class="heading">@lang('lang.Opening Hours')</h3>
                                <p>@lang('lang.We are open')</p>
                            </div>
                        </div>
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

        <section class="ftco-section ftco-no-pt ftc-no-pb">
            <div class="container">
                <div class="row no-gutters">

					<!--<div class="col-md-5 p-md-5 img img-2 mt-5 mt-md-0 img-responsive" style="background-image: url({{url('design/FrontEnd/images/about.jpg')}});">-->
					<!--</div>                    -->
                    <img class="col-md-5 pl-5 img-responsive" src="{{url('design/FrontEnd/images/about.jpg')}}" title="@lang('lang.About Us')" alt="@lang('lang.About Us')">
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
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="services-2 d-flex">
                                        <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center">
                                            <!--<span class="flaticon-first-aid-kit"></span>-->
                                            <i class="fa fa-h-square fa-2x" style="color:#2f89fc" aria-hidden="true"></i>
                                        </div>
                                        <div class="text @if (app()->getLocale() == 'ar') text-right mr-4 @endif">
                                            <h3>@lang('lang.About First')</h3>
                                            <p>@lang('lang.About First Desc')</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="services-2 d-flex">
                                        <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center">
                                            <!--<span class="flaticon-dropper"></span>-->
                                            <i class="fa fa-stethoscope fa-2x" style="color:#2f89fc" aria-hidden="true"></i>
                                        </div>
                                        <div class="text @if (app()->getLocale() == 'ar') text-right mr-4 @endif">
                                            <h3>@lang('lang.About Last')</h3>
                                            <p>@lang('lang.About Last Desc')</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="services-2 d-flex">
                                        <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center">
                                            <!--<span class="flaticon-experiment-results"></span>-->
                                            <i class="fa fa-ambulance fa-2x" style="color:#2f89fc" aria-hidden="true"></i>
                                        </div>
                                        <div class="text @if (app()->getLocale() == 'ar') text-right mr-4 @endif">
                                            <h3>@lang('lang.About Third')</h3>
                                            <p>@lang('lang.About Third Desc')</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

		<section class="ftco-section bg-light ftco-no-pt">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2">
                    <div class="col-md-8 text-center heading-section ftco-animate">
                        <br><br>
                        <h2 class="mb-4">@lang('lang.Services')</h2>
                        <p>@lang('lang.Sevices Description')</p>
                        <br>
                    </div>
                </div>
                <section class="ftco-services ftco-no-pb">
                    <div class="row no-gutters">
                        @foreach ($categories as $category)
                        <div class="col-md-3 d-flex  mr-5 mb-4 services align-self-stretch p-4 ftco-animate">
                            <div class="media block-6 d-block text-center">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <!--<span class="flaticon-doctor"></span>-->
                                    <i class="fa fa-heartbeat fa-2x" style="color:white" aria-hidden="true"></i>
                                </div>
                                <div class="media-body p-2 mt-3">
                                    <h3 class="heading">{{$category->name}}</h3>
                                    <p>{{ Str::limit($category->description , 10)}}</p>
                                    <a href="{{route('front.category' , [$category->id , str_replace_me($category->name)])}}" title="{{$category->name}}" class="btn btn-dark">
                                        @lang('lang.Show Details')
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>
			</div>
		</section>

		<section class="ftco-section @if(app()->getLocale() == 'ar') text-right @endif">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2">
                    <div class="col-md-8 text-center heading-section ftco-animate">
                        <h2 class="mb-4">@lang('lang.Last Services')</h2>
                    </div>
                </div>
                <div class="row">
                    @if ($postlatest)
                        @foreach ($postlatest as $post)
                            <div class="col-md-4 ftco-animate">
                                <div class="blog-entry">
                                    <a href="{{route('front.post' , [$post->id , str_replace_me($post->title)])}}" title="{{$post->title}}" class="block-20">
                                        <img class="img-responsive w-100 block-20" style="border-radius: 20px;" src="{{url('uploads/Posts/'.$post->image)}}" title="{{$post->title}}" alt="{{$post->title}}">
                                    </a>
                                    <div class="text bg-white p-4">
                                        <h3 class="heading"><a href="{{route('front.post' , [$post->id , str_replace_me($post->title)])}}" title="{{$post->title}}">{{$post->title}}</a></h3>
                                        <p>{!! $post->description !!}</p>
                                        <div class="d-flex align-items-center mt-4">
                                            <p class="mb-0">
                                                <a href="{{route('front.post' , [$post->id , str_replace_me($post->title)])}}" class="btn btn-primary" title="@lang('lang.Show Details')">
                                                @if(app()->getLocale() == 'ar')
                                                <span class="ion-ios-arrow-round-back ml-2"></span>
                                                @endif
                                                @lang('lang.Show Details')
                                                @if(app()->getLocale() == 'en' || app()->getLocale() == 'tr' )
                                                <span class="ion-ios-arrow-round-forward mr-2"></span>
                                                @endif
                                                </a>
                                            </p>
                                            <p class="@if(app()->getLocale() == 'en' || app()->getLocale() == 'tr' ) ml-auto @endif @if(app()->getLocale() == 'ar') mr-auto @endif  mb-0">
                                                <a href="#" class="mr-2 @if(app()->getLocale() == 'ar') float-right ml-2 @endif">{{$post->user->name}}</a>
                                                <a href="#" class="meta-chat"><span class="icon-chat @if(app()->getLocale() == 'ar') float-right ml-2 @endif"></span> {{$post->comments->count()}}</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
			</div>
		</section>
    <!--================Map Area =================-->
@endsection
