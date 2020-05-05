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
    <div class="container">
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
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">{{setting()->address}}</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">{{setting()->phone}}</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">{{setting()->email}}</span></a></li>
                        </ul>
                        </div>

                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                        <li class="ftco-animate"><a href="{{setting()->twitter}}" target="_blank"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="{{setting()->facebook}}" target="_blank"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="{{setting()->instagram}}" target="_blank"><span class="icon-instagram"></span></a></li>
                    </ul>
                    </div>
                </div>
            @endif
        <div class="col-md">
            <div class="ftco-footer-widget mb-5 ml-md-4">
            <h2 class="ftco-heading-2">Links</h2>
            <ul class="list-unstyled">
                <li><a href="{{route('home')}}"><span class="ion-ios-arrow-round-forward mr-2"></span>Home</a></li>
                @if ($pages)
                    @foreach ($pages as $page)
                    <li>
                        <a href="{{route('front.page' , $page->slug)}}">
                            <span class="ion-ios-arrow-round-forward mr-2"></span>{{$page->name}}
                        </a>
                    </li>
                    @endforeach
                @endif
                <li><a href="{{route('front.contact')}}"><span class="ion-ios-arrow-round-forward mr-2"></span>@lang('lang.Contact')</a></li>
            </ul>
            </div>
            <div class="ftco-footer-widget mb-5 ml-md-4">
            <h2 class="ftco-heading-2">Services</h2>
            <ul class="list-unstyled">
                <!-- Start Category -->
                @if ($categories)
                    @foreach ($categories as $category)
                    <li>
                        <a href="{{route('front.category' , $category->slug)}}">
                            <span class="ion-ios-arrow-round-forward mr-2"></span>{{$category->name}}
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
            <h2 class="ftco-heading-2">Recent Blog</h2>
                @if ($LatestPosts)
                    @foreach ($LatestPosts as $LatestPost)
                        <div class="block-21 mb-5 d-flex">
                            <a class="blog-img mr-4" style="background-image: url({{url('uploads/Posts/' . $LatestPost->image)}});"></a>
                            <div class="text">
                            <h3 class="heading"><a href="{{route('front.post' , $LatestPost->slug)}}">{{$LatestPost->title}}</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> {{$LatestPost->created_at}}</a></div>
                                <div><a href="#"><span class="icon-person"></span> {{$LatestPost->user->name}}</a></div>
                                <div><a href="#"><span class="icon-chat"></span> {{$LatestPost->comments->count()}}</a></div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col-md">
            <div class="ftco-footer-widget mb-5">
                <h2 class="ftco-heading-2">Opening Hours</h2>
                <h3 class="open-hours pl-4"><span class="ion-ios-time mr-3"></span>We are open 24/7</h3>
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | made with <i class="icon-heart" aria-hidden="true"></i> by <a href="" target="_blank">Enjoy Code</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div>
        </div>
    </div>
</footer>
