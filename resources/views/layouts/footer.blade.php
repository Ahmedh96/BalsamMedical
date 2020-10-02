<footer class="ftco-footer" style="position: relative; background-image: url({{asset('design/FrontEnd/images/bg_2.jpg')}});" data-stellar-background-ratio="0.5">
    <div class="overlay" style="
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    content: '';
    opacity: .9;
    background: #091423;
    "></div>
    <div class="container @if(app()->getLocale() == 'ar') text-right @endif">
        <div class="row mb-5">
            @if (setting())
            <div class="col-md-6">
                <div class="ftco-footer-widget mb-5">
                    <h2 class="ftco-heading-2 logo">
                        <img src="{{url('uploads/Settings/Logo/' . setting()->logo)}}" height="100" width="230" alt="{{setting()->sitename}}">
                    </h2>
                    <div class="col-md-12 ftco-animate fadeInUp ftco-animated">
                        <div class="heading-section mb-5">
                            <div class="@if (app()->getLocale() == 'ar') pl-md-5 ml-md-5 text-right @endif">
                                <span class="subheading text-white">
                                    @lang('lang.About Us')
                                </span>
                                <h2 class="mb-4" style="font-size: 28px;">
                                    @lang('lang.About Head')
                                </h2>
                                <p class="lead">
                                    @lang('lang.About Head Desc')
                                </p>
                                <span class="subheading text-white">
                                    @lang('lang.About Name')
                                </span>
                            </div>
                        </div>
                        <div class="@if (app()->getLocale() == 'ar') pl-md-5 ml-md-5 @endif  mb-5">
                            <p class="lead @if (app()->getLocale() == 'ar') text-right @endif">@lang('lang.About Description')</p>
                            <div class="accordion" id="accordionExample">
                                <div class="row">
                                    <div class="col-md-10">
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
                                    </div>
                                    <div class="col-md-2">
                                        <img src="{{url('design/frontEnd/images/dept-1.jpg')}}" class="img-first" width="50" height="70" alt="">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-10">
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
                                    </div>
                                    <div class="col-md-2">
                                        <img src="{{url('design/frontEnd/images/dept-1.jpg')}}" class="img-second" width="50" height="70" alt="">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-10">
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
                                    <div class="col-md-2">
                                        <img src="{{url('design/frontEnd/images/dept-1.jpg')}}" class="img-third" width="50" height="70" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-md-2">
                <div class="ftco-footer-widget mb-5 ml-md-4">
                <h2 class="ftco-heading-2">@lang('lang.Links')</h2>
                <ul class="list-unstyled">
                    <li>
                        <a href="{{route('home')}}" title="@lang('lang.Home')">
                            @if(app()->getLocale() == 'en' || app()->getLocale() == 'tr' )
                                <span class="ion-ios-arrow-round-forward mr-2"></span>
                            @endif
                            @if(app()->getLocale() == 'ar')
                                <span class="ion-ios-arrow-round-back ml-2"></span>
                            @endif
                            @lang('lang.Home')
                        </a>
                    </li>
                    <li>
                        <a href="{{route('front.about')}}" title="@lang('lang.About Us')">
                            @if(app()->getLocale() == 'en' || app()->getLocale() == 'tr' )
                                <span class="ion-ios-arrow-round-forward mr-2"></span>
                            @endif
                            @if(app()->getLocale() == 'ar')
                                <span class="ion-ios-arrow-round-back ml-2"></span>
                            @endif
                            @lang('lang.About Us')
                        </a>
                    </li>
                    <li>
                        <a href="{{route('front.WhoWeAre')}}" title="@lang('lang.Who We Are')">
                            @if(app()->getLocale() == 'en' || app()->getLocale() == 'tr' )
                                <span class="ion-ios-arrow-round-forward mr-2"></span>
                            @endif
                            @if(app()->getLocale() == 'ar')
                                <span class="ion-ios-arrow-round-back ml-2"></span>
                            @endif
                            @lang('lang.Who We Are')
                        </a>
                    </li>
                    <li>
                        <a href="{{route('front.contact')}}" title="@lang('lang.Contact')">
                            @if(app()->getLocale() == 'en' || app()->getLocale() == 'tr' )
                            <span class="ion-ios-arrow-round-forward mr-2"></span>
                            @endif
                            @if(app()->getLocale() == 'ar')
                            <span class="ion-ios-arrow-round-back ml-2"></span>
                            @endif
                            @lang('lang.Contact')
                        </a>
                    </li>
                </ul>
                </div>
                <div class="ftco-footer-widget mb-5 ml-md-4">
                <h2 class="ftco-heading-2">@lang('lang.Services')</h2>
                <ul class="list-unstyled">
                    <!-- Start Category -->
                    @if ($categories)
                        @foreach ($categories as $category)
                        <li>
                            <a href="{{route('front.category' , [$category->id , str_replace_me($category->name) ])}}" title="{{$category->name}}">
                                @if(app()->getLocale() == 'en' || app()->getLocale() == 'tr' )
                                <span class="ion-ios-arrow-round-forward mr-2"></span>
                                @endif
                                @if(app()->getLocale() == 'ar')
                                <span class="ion-ios-arrow-round-back ml-2"></span>
                                @endif{{$category->name}}
                            </a>
                        </li>
                        @endforeach
                    @endif
                    <!-- End Category -->
                </ul>
                </div>
            </div>
            @if ($pages->count() > 0)
            <div class="col-md-2">
                <div class="ftco-footer-widget mb-5 ml-md-4">
                    <h2 class="ftco-heading-2">@lang('lang.Pages')</h2>
                    <ul class="list-unstyled">
                        <!-- Start Pages -->
                            @foreach ($pages as $page)
                            <li>
                                <a href="{{route('front.page' , [$page->id , str_replace_me($page->name) ])}}" title="{{$page->name}}">
                                    @if(app()->getLocale() == 'en' || app()->getLocale() == 'tr' )
                                    <span class="ion-ios-arrow-round-forward mr-2"></span>
                                    @endif
                                    @if(app()->getLocale() == 'ar')
                                    <span class="ion-ios-arrow-round-back ml-2"></span>
                                    @endif{{$page->name}}
                                </a>
                            </li>
                            @endforeach
                        <!-- End Pages -->
                    </ul>
                </div>
            </div>
            @endif
            <div class="col-md-2">
                <div class="ftco-footer-widget mb-5">
                <h2 class="ftco-heading-2">@lang('lang.Recent Posts')</h2>
                    @if ($LatestPosts)
                        @foreach ($LatestPosts as $LatestPost)
                            <div class="block-21 mb-5 d-flex">
                                <a class="blog-img mr-4 @if(app()->getLocale() == 'ar') ml-3 @endif"  style="background-image: url({{url('uploads/Posts/' . $LatestPost->image)}});border-radius:10px;border:2px solid #d20505" title="{{$LatestPost->title}}"></a>
                                <div class="text">
                                    <h3 class="heading"><a href="{{route('front.post' , [$LatestPost->id , str_replace_me($LatestPost->title) ])}}" title="{{$LatestPost->title}}">{{$LatestPost->title}}</a></h3>
                                    <div class="meta">
                                        <div><a href="#"><span class="icon-calendar @if(app()->getLocale() == 'ar') float-right ml-2 @endif"></span> {{$LatestPost->created_at}}</a></div>
                                        <div><a href="#"><span class="icon-person @if(app()->getLocale() == 'ar') float-right ml-2 @endif"></span> {{$LatestPost->user->name}}</a></div>
                                        <div><a href="#"><span class="icon-chat @if(app()->getLocale() == 'ar') float-right ml-2 @endif"></span> {{$LatestPost->comments->count()}}</a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>
                    @lang('lang.Copyright') &copy;<script>document.write(new Date().getFullYear());</script>
                    @lang('lang.All rights reserved') <i class="icon-heart" aria-hidden="true"></i>
                    @lang('lang.By') <a href="" target="_blank">@lang('lang.Enjoy Code')</a>
                </p>
            </div>
        </div>
    </div>
</footer>


