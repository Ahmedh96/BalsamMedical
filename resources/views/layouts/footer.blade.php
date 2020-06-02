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
                <div class="col-md">
                    <div class="ftco-footer-widget mb-5">
                    <h2 class="ftco-heading-2 logo">
                        <img src="{{url('uploads/Settings/Logo/' . setting()->logo)}}" height="70" width="70" alt="">
                    </h2>
                    <p>{{setting()->description}}</p>
                    </div>
                    <div class="ftco-footer-widget mb-5">
                        <h2 class="ftco-heading-2">@lang('lang.Have a Questions')</h2>
                        <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">{{setting()->address}}</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">{{setting()->phone}}</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">{{setting()->email}}</span></a></li>
                        </ul>
                        </div>

                        <ul class="ftco-footer-social list-unstyled @if(app()->getLocale() == 'en' || app()->getLocale() == 'tr') float-md-left float-lft @endif  mt-3 ">
                        <li class="ftco-animate"><a href="{{setting()->twitter}}" rel="nofollow" target="_blank"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="{{setting()->facebook}}" rel="nofollow" target="_blank"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="{{setting()->instagram}}" rel="nofollow" target="_blank"><span class="icon-instagram"></span></a></li>
                    </ul>
                    </div>
                </div>
            @endif
            <div class="col-md">
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
            <div class="col-md">
                <div class="ftco-footer-widget mb-5 ml-md-4">
                    <h2 class="ftco-heading-2">@lang('lang.Pages')</h2>
                    <ul class="list-unstyled">
                        <!-- Start Category -->
                        @if ($pages)
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
                        @endif
                        <!-- End Category -->
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-5">
                <h2 class="ftco-heading-2">@lang('lang.Recent Posts')</h2>
                    @if ($LatestPosts)
                        @foreach ($LatestPosts as $LatestPost)
                            <div class="block-21 mb-5 d-flex">
                                <a class="blog-img mr-4 @if(app()->getLocale() == 'ar') ml-3 @endif" style="background-image: url({{url('uploads/Posts/' . $LatestPost->image)}});"></a>
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
            <div class="col-md">
                <div class="ftco-footer-widget mb-5">
                    <h2 class="ftco-heading-2">@lang('lang.Opening Hours')</h2>
                    <h3 class="open-hours pl-4"><span class="ion-ios-time mr-3 @if(app()->getLocale() == 'ar') ml-3 @endif"></span>@lang('lang.We are open')</h3>
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
