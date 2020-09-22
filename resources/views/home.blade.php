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
        <section class="ftco-section ftco-no-pt" style="border-top:3px solid #d20505;">
            <div class="container">
    		    <div class="row ml-3">
    		        <div class="col-lg-4 mt-3">
		                <img src="{{url('design/FrontEnd/images/jv8hHoRppr.jpg')}}" 
                        title="@lang('lang.About Last')"
                        alt="@lang('lang.About Last')" 
                        class="img-responsive mt-5"
                        width="300" height="200"
                        style="border-radius: 10px;border:3px solid #d20505">
    		        </div>
    		        <div class="col-lg-4 mt-3">
    		          <img src="{{url('design/FrontEnd/images/YUC96soJHM.jpg')}}" 
                        title="@lang('lang.About First')"
                        alt="@lang('lang.About First')" 
                        class="img-responsive mt-5" width="300" height="200"
                        style="border-radius: 10px;border:3px solid #d20505">
    		        </div>
    		        <div class="col-lg-4 mt-3">
    		            <img src="{{url('design/FrontEnd/images/bFJ9fLdpBE.jpg')}}" 
                        title="@lang('lang.About Third')"
                        alt="@lang('lang.About Third')"
                        class="img-responsive mt-5" width="300" height="200"
                        style="border-radius: 10px;border:3px solid #d20505">
    		        </div>
    		    </div>
		    </div>
		</section>

        <section class="ftco-section ftco-no-pt ftc-no-pb" style="background:#17a2b8;color:white;border-top:3px solid #d20505;border-bottom:3px solid #d20505">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-md-12 py-4 py-md-5 ftco-animate fadeInUp ftco-animated">
                        <div class="heading-section mb-5">
                            <div class="pl-md-5 ml-md-5">
                                <h2 class="mb-4 text-center" style="font-size: 28px;color:white">@lang('lang.Who We Are')</h2>
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

		<!-- <section class="ftco-section bg-light ftco-no-pt">
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
                                    <i class="fa fa-heartbeat fa-2x" style="color:white" aria-hidden="true"></i>
                                </div>
                                <div class="media-body p-2 mt-3">
                                    <h3 class="heading">{{$category->name}}</h3>
                                    <p>{{ Str::limit($category->description , 20)}}</p>
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
		</section> -->

		<section class="ftco-section bg-light @if(app()->getLocale() == 'ar') text-right @endif" style="border-bottom:3px solid #d20505;">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2">
                    <div class="col-md-8 text-center heading-section ftco-animate">
                        <h2 class="mb-4" style="color:#d20505">@lang('lang.Last Services')</h2>
                    </div>
                </div>
                <div class="row">
                    @if ($postlatest)
                        @foreach ($postlatest as $post)
                            <div class="col-md-4 ftco-animate">
                                <div class="blog-entry">
                                    <a href="{{route('front.post' , [$post->id , str_replace_me($post->title)])}}" title="{{$post->title}}" class="block-20">
                                        <img class="img-responsive w-100 block-20" src="{{url('uploads/Posts/'.$post->image)}}" title="{{$post->title}}" alt="{{$post->title}}" style="border-radius: 20px;border:3px solid #d20505">
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
